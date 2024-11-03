<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::query()->with('service')->paginate(10);
        return view('cms.project.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services=Service::query()->get();
        return view('cms.project.create',compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'service_id'=>'required|int|exists:services,id',
            'name.*'=>'required|string',
            'description.*'=>'required|string',
            'features.*'=>'nullable|string',
            'images.*'=>'required|image',
            'technology'=>'required|string',

        ]);
        $data = $request->only([
            'name' ,'description' , 'service_id' , 'features' ,'technology'
        ]);
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $Image = $image;
                $imageName = $Image->getClientOriginalName() . '_' . $Image->getClientOriginalExtension();
                $images[] = $imageName;
                $Image->move('images/projects', $imageName);
            }
        }
        $data['images'] = json_encode($images);

        $data['features'] = json_encode($request->get('features'));

        $project = Project::query()->create($data);

        if ($project){
            session()->flash('alert-type','alert-success');
            session()->flash('message',trans('dashboard_trans.Project Created Successfully'));
            return redirect()->back();
        }else{
            session()->flash('alert-type','alert-danger');
            session()->flash('message',trans('dashboard_trans.Failed to create project'));
            return redirect()->back();

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
        $services=Service::query()->get();
        return view('cms.project.edit',compact('project','services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->request->add(['id' => $id]);
        $request->validate([
            'service_id' => 'required|int|exists:services,id',
            'name.*' => 'required|string',
            'description.*' => 'required|string',
            'features.*' => 'nullable|string',
            'technology' => 'required|string',

        ]);
        $data = $request->only([
            'name', 'description', 'service_id', 'features', 'technology'
        ]);
        $project = Project::find($id);

        if ($project) {
            // الحصول على الصور الحالية من قاعدة البيانات
            $images = json_decode($project->images, true);

            // تحقق من وجود صور جديدة في الطلب
            if ($request->hasFile('images')) {
                // إذا كانت هناك صور جديدة، احذف الصور القديمة أولاً
                if (is_array($images)) {
                    foreach ($images as $image) {
                        $imagePath = public_path('images/projects/' . $image);
                        if (file_exists($imagePath)) {
                            unlink($imagePath);
                        }
                    }
                }

                // الآن قم بتحديث قائمة الصور بالصور الجديدة
                $newImages = [];
                foreach ($request->file('images') as $image) {
                    $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('images/projects'), $imageName);
                    $newImages[] = $imageName;
                }

                // تعيين الصور الجديدة إلى المتغير data لتحديث قاعدة البيانات
                $data['images'] = json_encode($newImages);
            } else {
                // إذا لم يتم تحميل صور جديدة، احتفظ بالصور القديمة كما هي
                $data['images'] = $project->images;
            }
        }


        $data['features'] = json_encode($request->get('features'));

            $project = Project::query()->find($id)->update($data);
            if ($project) {
                session()->flash('alert-type', 'alert-success');
                session()->flash('message', trans('dashboard_trans.Project Created Successfully'));
                return redirect()->back();

            } else {
                session()->flash('alert-type', 'alert-danger');
                session()->flash('message', trans('dashboard_trans.Failed to create project'));
                return redirect()->back();

            }
        }

        /**
         * Remove the specified resource from storage.
         */
        public
        function destroy(string $id)
        {

            $project = Project::find($id);

            if ($project) {
                $images = json_decode($project->images, true);

                if (is_array($images)) {
                    foreach ($images as $image) {

                        $imagePath = public_path('images/projects/'.$image);
                        if (file_exists($imagePath)) {
                            unlink($imagePath);
                        }
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
}
