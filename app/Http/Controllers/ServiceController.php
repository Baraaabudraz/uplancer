<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Services\ImagesUploadService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::query()->paginate(10);
        return view('cms.service.index', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, ImagesUploadService $imagesUploadService)
    {
        $request->validate([
            'name.*' => 'required|string|max:100',
            'description.*' => 'nullable|string',
            'icon' => 'nullable|string',
            'image' => 'nullable|image',
            'slug' => 'string|unique:services,slug',
        ]);

        $data = $request->only([
            'name', 'description', 'icon' ,'slug'
        ]);

        $image = $imagesUploadService->uploadImage($request, 'image', 'images/projects');
        $data['image'] = $image;


        $service = Service::query()->create($data);

        if ($service) {
            session()->flash('alert-type', 'alert-success');
            session()->flash('message', trans('dashboard_trans.Service Created Successfully'));
            return redirect()->back();
        } else {
            session()->flash('alert-type', 'alert-danger');
            session()->flash('message', trans('dashboard_trans.Failed to create service'));
            return redirect()->back();

        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cms.service.create');

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
        $service = Service::query()->findOrFail($id);
        return view('cms.service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, ImagesUploadService $imagesUploadService)
    {
        $request->request->add(['id' => $id]);
        $request->validate([
            'id' => 'required|int|exists:services',
            'name.*' => 'required|string',
            'description.*' => 'nullable|string',
            'icon' => 'nullable|string',
            'image' => 'nullable|image',
            'slug' => 'string|unique:services,slug',

        ]);
        $data = $request->only([
            'description', 'name', 'icon' ,'slug'
        ]);

        $service = Service::query()->find($id);
        if ($service){
            $image = $service->image ;
            if ($image){
                $imagePath = public_path('storage/' . $image);
                if (file_exists($imagePath)){
                    unlink($imagePath);
                }
                $newImage = $imagesUploadService->uploadImage($request, 'image', 'images/services');
                $data['image'] = $newImage;

            }else{
                $data['image']=$service->image;
            }
        }

       $isUpdated= $service->update($data);

        if ($isUpdated) {
            session()->flash('alert-type', 'alert-success');
            session()->flash('message', trans('dashboard_trans.Service Updated Successfully'));
            return redirect()->back();

        } else {
            session()->flash('alert-type', 'alert-danger');
            session()->flash('message', trans('dashboard_trans.Failed to update service'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::query()->find($id);
        if ($service){
            $image = $service->image ;
            if ($image){
                $imagePath = public_path('storage/' . $image);
                if (file_exists($imagePath)){
                    unlink($imagePath);
                }
            }
        }
        $is_Deleted = $service->delete();

        if ($is_Deleted) {
            return response()->json([
                'title' => 'success',
                'icon' => 'success',
                'text' => trans('dashboard_trans.Service deleted Successfully')
            ]);
        } else {
            return response()->json([
                'title' => 'error',
                'icon' => 'error',
                'text' => trans('dashboard_trans.Failed to delete this service!')
            ]);
        }
    }

    public function getServices(Request $request)
    {

        $page = $request->get('page', 1);
        $services = Service::latest()->paginate(10, ['*'], 'page', $page);

        return response()->json($services);

    }
}
