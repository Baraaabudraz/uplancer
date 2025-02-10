<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Company;
use App\Models\Trader;
use App\Models\User;
use App\Services\ImagesUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $users = Auth::user()->findOrFail($id);
        return view('cms.profile.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id , ImagesUploadService $imagesUploadService)
    {
        $request->request->add(['id' => $id]);

        if (Auth::guard('web')->check()) {
            $request->validate([
                'id' => 'required|integer|exists:users',
                'name' => 'required|string|min:3|max:30,' . $id,
                'user_name' => 'required|string|unique:users,user_name,' . $id,
                'password' => 'required|string',
            ]);
            $data = $request->only([
                'name', 'user_name', 'password',
            ]);
            $users = User::query()->find($id);
            $users->update($data);
            session()->flash('alert-type', 'alert-success');
            session()->flash('message', 'تم تعديل بيانات المستخدم بنجاح');
            return redirect()->back();

        }
        if (Auth::guard('admin')->check()) {
            $request->validate([
                'id' => 'required|integer|exists:admins,id',
                'name' => 'required|string|min:3|max:30,' . $id,
                'email' => 'required|string|email|unique:admins,email,' . $id,
                'password' => 'required|string',
                'address' => 'required|string|min:3|max:20',
                'mobile_number' => 'required|string|unique:admins,mobile_number,' . $id,
                'gender' => 'required|string|in:Male,Female',
            ]);
            $data = $request->only([
                'name', 'email', 'password', 'address', 'mobile_number', 'gender',
            ]);
            $admin  = Admin::query()->find($id);

            if ($admin){
                if ($request->hasFile('image')){
                    // إذا كان هناك صورة جديدة، احذف القديمة وقم بتحديث الصورة
                    $imagePath = public_path('storage/' . $admin->image);
                    if (file_exists($imagePath)){
                        unlink($imagePath);
                    }
                    $image = $imagesUploadService->uploadImage($request, 'image','images/projects');
                    $data['image'] = $image;
                }else{
                    $data['image']=$admin->image;
                }
            }

            $data['password'] = Hash::make($request->get('password'));

            $isUpdated = $admin->update($data);

            if ($isUpdated) {
                session()->flash('alert-type', 'alert-success');
                session()->flash('message', 'تم تعديل  بيانات المستخدم بنجاح');
                return redirect()->back();
            } else {
                session()->flash('alert-type', 'alert-danger');
                session()->flash('message', 'فشلت عملية التعديل !');
                return redirect()->back();
            }

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
