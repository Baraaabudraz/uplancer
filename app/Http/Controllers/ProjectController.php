<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::query()->paginate(10);
        return view('cms.project.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cms.service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'service_id'=>'required|int|exists:services',
            'name.*'=>'required|string',
            'description.*'=>'required|string',
        ]);
        $data = $request->only([
            'name' ,'description' , 'service_id'
        ]);
        if ($request->hasFile('images')){
            foreach ($request->file('images') as $image){
                $Image=$image;
                $imageName=$Image->getClientOriginalName().'-'.$Image->getClientOriginalExtension();
                $images[]=$imageName;
                $Image->move('images/projects',$imageName);
            }
        }
        $data['images'] = json_encode($images);
        $project = Project::query()->create($data);
        if ($project){
            session()->flash('alert-type','alert-success');
            session()->flash('message',trans('dashboard_trans.Project Created Successfully'));
        }else{
            session()->flash('alert-type','alert-danger');
            session()->flash('message',trans('dashboard_trans.Failed to create project'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::query()->findOrFail($id);
        return view('cms.project.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->request->add(['id'=>$id]);
        $request->validate([
            'service_id'=>'required|int|exists:services',
            'name.*'=>'required|string',
            'description.*'=>'required|string',
        ]);
        $data = $request->only([
            'name' ,'description' ,'service_id'
        ]);
        if ($request->hasFile('images')){
            foreach ($request->file('images') as $image){
                $Image=$image;
                $imageName=$Image->getClientOriginalName().'-'.$Image->getClientOriginalExtension();
                $images[]=$imageName;
                $Image->move('images/projects',$imageName);
            }
            $data['images'] = json_encode($images);
        }

        $project = Project::query()->find($id)->update($data);
        if ($project){
            session()->flash('alert-type','alert-success');
            session()->flash('message',trans('dashboard_trans.Project Created Successfully'));
        }else{
            session()->flash('alert-type','alert-danger');
            session()->flash('message',trans('dashboard_trans.Failed to create project'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
