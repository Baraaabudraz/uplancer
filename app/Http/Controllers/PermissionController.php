<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        //
        $permissions=Permission::query()->with('role')->paginate(10);
        return view('cms.permission.index',compact('permissions'));
    }

    public function create()
    {
        $roles=Role::all();
        return view('cms.permission.create',compact('roles'));
    }

    public function store(Request $request)

    {
        //
        $request->validate([
            'role_id'=>'required|integer|exists:roles,id',
        ],[
            'role_id.required'=>'Please select role'
        ]);
        $permissions=new Permission();
        $permissions->role_id=$request->role_id;
        $permissions->name=$request->name;
        $isSaved=$permissions->save();
        if ($isSaved){
            session()->flash('alert-type', 'alert-success');
            session()->flash('message', trans('dashboard_trans.Permissions created successfully'));
            return redirect()->back();
        }else{
            session()->flash('alert-type', 'alert-danger');
            session()->flash('message', trans('dashboard_trans.Failed to create permissions!'));
            return redirect()->back();
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
        $permissions=Permission::query()->with('role')->findOrFail($id);
        return view('cms.permission.edit',compact('permissions'));
    }

    public function update(Request $request, $id)
    {
        //
        $request->request->add(['id'=>$id]);
        $request->validate([
            'name'=>'required',

        ]);
        $permissions=Permission::query()->find($id);
        $permissions->name=$request->name;
        $isUpdated=$permissions->save();
        if ($isUpdated){
            session()->flash('alert-type', 'alert-success');
            session()->flash('message', trans('dashboard_trans.Permissions updated successfully'));
            return redirect()->back();
        }else{
            session()->flash('alert-type', 'alert-danger');
            session()->flash('message', trans('dashboard_trans.Failed to update permissions!'));
            return redirect()->back();
        }
    }
    public function destroy($id)
    {
        //
        $isDeleted=Permission::destroy($id);
        if ($isDeleted){
            return response()->json([
                'title'=>'success',
                'text'=>trans('dashboard_trans.Permission deleted successfully'),
                'icon'=>'success',
            ]);
        }else{
            return response()->json([
                'title'=>'error',
                'text'=>trans('dashboard_trans.Failed to delete this permission!'),
                'icon'=>'error',
            ]);

        }
    }
}
