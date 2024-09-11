<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::query()->paginate(10);
        return view('cms.service.index',compact('services'));
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
            'name.*' => 'required|string|max:100',
            'description.*' => 'nullable|string',
        ]);

        $data = $request->only([
            'name' , 'description'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $request->get('name.*') . '.' . $image->getClientOriginalExtension();
            $image->move('images/services', $imageName);
        }

        $data['image'] = $imageName;

        $service = Service::query()->create($data);

        if ($service){
            session()->flash('alert-type','alert-success');
            session()->flash('message',trans('dashboard_trans.Service Created Successfully'));
            return redirect()->back();
        }else{
            session()->flash('alert-type','alert-danger');
            session()->flash('message',trans('dashboard_trans.Failed to create service'));
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
        $service = Service::query()->findOrFail($id);
        return view('cms.service.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->request->add(['id'=>$id]);
        $request->validate([
            'id'=>'required|int|exists:services',
            'name.*'   =>  'required|string',
            'description.*'    =>  'nullable|string',
        ]);
        $data=$request->only([
           'description'    ,   'name'
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $request->get('name.*') . '.' . $image->getClientOriginalExtension();
            $image->move('images/services', $imageName);
            $data['image'] = $imageName;
        }
        $service= Service::query()->find($id)->update($data);
        if ($service){
            session()->flash('alert-type','alert-success');
            session()->flash('message',trans('dashboard_trans.Service Updated Successfully'));
            return redirect()->back();

        }else{
            session()->flash('alert-type','alert-danger');
            session()->flash('message',trans('dashboard_trans.Failed to update service'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $is_Deleted = Service::destroy($id);
        if ($is_Deleted){
            return response()->json([
               'title' => 'success',
               'icon'   => 'success',
               'text'   => trans('dashboard_trans.Service deleted Successfully')
            ]);
        }else{
            return response()->json([
                'title' => 'error',
                'icon'   => 'error',
                'text'   => trans('dashboard_trans.Failed to delete this service!')
            ]);
        }
    }
}
