<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function index()
    {
        //
        $admins = Admin::query()->with('role')->paginate(10);
        return view('cms.user.admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::all();
        return view('cms.user.admin.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
//        dd($request->all());
        $request->validate([
            'name' => 'required|string|min:3|max:30',
            'email' => 'required|string|email|unique:admins',
            'password' => 'required|string',
            'address' => 'required|string|min:3|max:20',
            'mobile_number' => 'required|string|unique:admins',
            'role_id' => 'required|exists:roles,id',
            'designation' => 'required|string|min:3|max:45',
            'gender' => 'required|string|in:Male,Female',
            'status' => 'in:on',
            'image' => '',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->image->hashName();
            $request->image->move(public_path('images/admin'), $image);
        } else {
            $image = $request->get('image');
        }
        $admins = new Admin();
        $admins->name = $request->name;
        $admins->email = $request->email;
        $admins->password = Hash::make($request->password);
        $admins->address = $request->address;
        $admins->mobile_number = $request->mobile_number;
        $admins->role_id = $request->role_id;
        $admins->designation = $request->designation;
        $admins->status = $request->has('status') ? 'Active' : 'InActive';
        $admins['image'] = $image;
        $isSaved = $admins->save();
        if ($isSaved) {
            session()->flash('alert-type', 'alert-success');
            session()->flash('message', 'Admin created successfully');
            return redirect()->back();
        } else {
            session()->flash('alert-type', 'alert-danger');
            session()->flash('message', 'Failed to create admin');
            return redirect()->back();
        }


    }


    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $roles = Role::all();
        $admins = Admin::query()->findOrFail($id);
        return view('cms.user.admin.edit', compact('admins', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
//        dd($request->all());
        $request->request->add(['id' => $id]);
        $request->validate([
            'id' => 'required|integer|exists:admins,id',
            'name' => 'required|string|min:3|max:30,' . $id,
            'email' => 'required|string|email|unique:admins,email,' . $id,
            'password' => 'required|string',
            'address' => 'required|string|min:3|max:20',
            'mobile_number' => 'required|string|unique:admins,mobile_number,' . $id,
            'role_id' => 'required|exists:roles,id',
            'designation' => 'required|string|min:3|max:45',
            'gender' => 'required|string|in:Male,Female',
            'status' => 'in:on',
            'image' => '',
        ]);

        $data = $request->only([
            'name', 'email', 'password', 'address',
            'mobile_number', 'designation', 'role_id', 'gender',
        ]);

        $admin = Admin::query()->find($id);
        if ($admin) {
            if ($request->hasFile('image')) {
                // إذا كان هناك صورة جديدة، احذف القديمة وقم بتحديث الصورة
                if ($admin->image) {
                    $imagePath = public_path('images/admin/' . $admin->image);
                    if (file_exists($imagePath)) {
                        unlink($imagePath);
                    }
                }
                $newImage = $request->image->hashName();
                $request->image->move(public_path('images/admin'), $newImage);
                $data['image'] = $newImage;
            } else {
                // احتفظ بالصورة القديمة في حالة عدم تحميل صورة جديدة
                $data['image'] = $admin->image;
            }
        }



        $data['status'] = $request->has('status') ? 'Active' : 'InActive';
        $data['password'] = Hash::make($request->password);

        $isUpdated  =  $admin->update($data);
        if ($isUpdated) {
            session()->flash('alert-type', 'alert-success');
            session()->flash('message', 'Admin updated successfully');
            return redirect()->back();
        } else {
            session()->flash('alert-type', 'alert-danger');
            session()->flash('message', 'Failed to update admin');
            return redirect()->back();
        }


    }


    public function destroy($id)
    {
        //
        $admin = Admin::query()->find($id);
        if ($admin){
            $image = $admin->image ;
            if ($image){
                $imagePath = public_path('images/admin/' . $image);
                if (file_exists($imagePath)){
                    unlink($imagePath);
                }
            }
        }
        $isDeleted  =  $admin->delete();
        if ($isDeleted) {
            return response()->json([
                'title' => 'success',
                'icon' => 'success',
                'text' => 'Admin deleted successfully',
            ]);
        } else {
            return response()->json([
                'title' => 'error',
                'icon' => 'error',
                'text' => 'Failed to delete this admin!',
            ]);
        }
    }

}
