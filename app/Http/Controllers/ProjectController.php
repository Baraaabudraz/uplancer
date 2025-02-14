<?php

namespace App\Http\Controllers;

use App\Helpers\ControllerHelper;
use App\Models\Project;
use App\Models\Service;
use App\Services\ImagesUploadService;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected ImagesUploadService $imagesUploadService;

    public function __construct(ImagesUploadService $imagesUploadService)
    {
        $this->imagesUploadService = $imagesUploadService;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Project::query()->with('service')->latest();
            return datatables()->of($query)
                ->addColumn('actions', function ($row) {
                    return view('cms.project.partials.actions', compact('row'))->render();
                })
                ->addColumn('checkbox', function ($row) {
                    return '<input class="form-check-input" type="checkbox"  id="select-all"  data-kt-check-target="#kt_projects_table .form-check-input" value="1" data-id="'.$row->id.'">';
                })
                ->addColumn('partials', function ($row) {
                    return view('cms.project.partials.partials', compact('row'))->render();
                })
                ->addColumn('service', function ($row) {
                    return '<span class="badge badge-info" >'.$row->service->name.'</span>';
                })
                ->rawColumns(['actions', 'checkbox', 'partials', 'service'])
                ->make(true);

        }
        $projects = Project::query()->with('service')->paginate(10);
        return view('cms.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('cms.project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, ImagesUploadService $imagesUploadService)
    {

//        dd($request);

        $request->validate([
            'service_id' => 'required|int|exists:services,id',
            'name.*' => 'required|string',
            'description.*' => 'required|string',
            'features.*' => 'nullable',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'technology' => 'required|string',
            'alt' => 'nullable|string',
            'slug' => 'required|string|unique:projects,slug',
        ]);

        $data = $request->only([
            'name', 'alt', 'thumbnail', 'description', 'service_id', 'technology', 'slug', 'meta_keyword',
            'meta_description', 'features'
        ]);

        $thumbnail = $this->imagesUploadService->uploadImage($request, 'thumbnail', 'images/projects/thumbnails');
        $data['thumbnail'] = $thumbnail;

        $uploadedFiles = session()->get('uploaded_files', []);
        $savedImages = $imagesUploadService->moveImages($uploadedFiles, 'images/projects');
        $data['images'] = json_encode($savedImages);


        // Clear the session
        session()->forget('uploaded_files');

        $request->features = json_encode(array($request->features));

        $project = Project::create($data);

        if ($project) {
            return ControllerHelper::generateResponse('success', trans('dashboard_trans.Project Created Successfully'),
                200);
        } else {
            return ControllerHelper::generateResponse('success', trans('dashboard_trans.Failed to create project'),
                400);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::query()->findOrFail($id);
        $images = json_decode($project->images);
        return view('cms.project.edit', compact('project', 'images'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, ImagesUploadService $imagesUploadService)
    {
        $request->request->add(['id' => $id]);
        $request->validate([
            'service_id' => 'required|int|exists:services,id',
            'name.*' => 'required|string',
            'description.*' => 'required|string',
            'features.*' => 'nullable',
            'technology' => 'required|string',
            'thumbnail' => 'image',

        ]);

        $project = Project::find($id);


        $data = $request->only([
            'name', 'description', 'service_id','images', 'features', 'technology', 'slug', 'meta_keyword', 'meta_description'
        ]);

        if (json_encode($request->hasFile('images'))) {
            if ($project->images) {
                $oldImages = json_decode($project->images, true);
                    foreach ($oldImages as $image) {
                        $imagePath = public_path('storage/'.$image);
                        if (file_exists($imagePath)) {
                            unlink($imagePath);
                        }
                    }
            }
            $uploadedFiles = session()->get('uploaded_files', []);
            $savedImages = $imagesUploadService->moveImages($uploadedFiles, 'images/projects');
            $data['images'] = json_encode($savedImages);
        } else{
            $data['images'] = $project->images;
        }

        // Handle thumbnail
        if ($request->hasFile('thumbnail')) {
            // Delete old thumbnail
            if ($project->thumbnail) {
                $oldThumbnailPath = public_path('storage/' . $project->thumbnail);
                if (file_exists($oldThumbnailPath)) {
                    unlink($oldThumbnailPath);
                }
            }
            $thumbnail = $imagesUploadService->uploadImage($request, 'thumbnail', 'images/projects/thumbnails');
            $data['thumbnail'] = $thumbnail;
        }else{
            $data['thumbnail'] = $project->thumbnail;
        }

        // Clear the session
        session()->forget('uploaded_files');

        $request->features = array(json_encode($request->features));

        $isUpdated = $project->update($data);

        if ($isUpdated) {
            return ControllerHelper::generateResponse('success', trans('dashboard_trans.Project Updated Successfully'), 200);

        } else {
            return ControllerHelper::generateResponse('error', trans('dashboard_trans.Failed to updated project'), 400);
        }
    }    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $project = Project::find($id);

        if ($project) {
            $images = json_decode($project->images, true);
            if (is_array($images)) {
                foreach ($images as $image) {
                    $imagePath = public_path('storage/'.$image);
                    if (file_exists($imagePath)) {
                        unlink($imagePath);
                    }
                }
            }
            if ($project->thumbnail) {
                $imagePath = public_path('storage/'.$project->thumbnail);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            $is_Deleted = $project->delete();

            if ($is_Deleted) {
                return response()->json([
                    'title' => 'success',
                    'icon' => 'success',
                    'text' => trans('dashboard_trans.Project deleted successfully'),
                ]);
            } else {
                return response()->json([
                    'title' => 'error',
                    'icon' => 'error',
                    'text' => trans('dashboard_trans.Failed to delete this project'),
                ]);
            }
        } else {
            return response()->json([
                'title' => 'warning',
                'icon' => 'warning',
                'text' => trans('dashboard_trans.Project not found'),
            ]);
        }

    }

    public function storeMedia(Request $request, ImagesUploadService $imagesUploadService)
    {
        $path = storage_path('tmp/uploads');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('images');

        if (!$file) {
            return response()->json(['error' => 'No file uploaded.'], 400);
        }

        $name = uniqid().'_'.trim($file->hashName());
        $file->move($path, $name);

        // Store the file path in the session (or database)
        $uploadedFiles = session()->get('uploaded_files', []);
        $uploadedFiles[] = $name; // Store the filename
        session()->put('uploaded_files', $uploadedFiles);

        return response()->json([
            'name' => $name,
            'original_name' => $file->hashName(),
        ]);
    }
}
