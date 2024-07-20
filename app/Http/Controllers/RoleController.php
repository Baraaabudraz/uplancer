<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function index()
    {
        //
        $roles=Role::paginate(10);
        return view('cms.role.index',compact('roles'));
    }

    public function create()
    {
        //
        return view('cms.role.create');
    }

    public function store(Request $request)
    {
        //
        $request->validate([
           'name'=>'required|string|min:3|max:15',

        ]);
        $roles=new Role();
        $roles->name=$request->name;
        $roles->description=$request->description;
        $isSaved=$roles->save();
        if ($isSaved){
            session()->flash('alert-type','alert-success');
            session()->flash('message',trans('dashboard_trans.Role created successfully'));
            return redirect()->back();
        }else{
            session()->flash('alert-type','alert-danger');
            session()->flash('message',trans('dashboard_trans.Failed to create role!'));
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
        $roles=Role::query()->findOrFail($id);
        return view('cms.role.edit',compact('roles'));
    }

    public function update(Request $request, $id)
    {
        //
        $request->request->add(['id'=>$id]);
        $request->validate([
            'id'=>'required|integer|exists:roles,id',
            'name'=>'required|string|min:3|max:15',
        ]);
        $roles=Role::query()->find($id);
        $roles->name=$request->get('name');
        $roles->description=$request->description;
        $isSaved=$roles->save();
        if ($isSaved){
            session()->flash('alert-type','alert-success');
            session()->flash('message',trans('dashboard_trans.Role updated successfully'));
            return redirect()->back();
        }else{
            session()->flash('alert-type','alert-danger');
            session()->flash('message',trans('dashboard_trans.Failed to updated role!'));
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        //

        $isDeleted=Role::destroy($id);
        if($isDeleted){
            return response()->json([
                'title'=>'success',
                'icon'=>'success',
                'text'=>trans('dashboard_trans.Role deleted successfully'),
            ]);
        }else{
            return response()->json([
                'title'=>'error',
                'icon'=>'error',
                'text'=>trans('dashboard_trans.Failed to delete this role!'),
            ]);
        }
    }

}
