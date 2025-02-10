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

        } elseif (Auth::guard('company')->check()) {
            $request->validate([
                'id' => 'required|integer|exists:companies,id',
                'name' => 'required',
                'user_name' => 'required|string|regex:/^\S*$/|unique:companies,user_name,' . $id,
                'password' => 'required|string',
                'address' => 'required|string',
                'phone' => 'required|numeric|string|unique:companies,phone,' . $id,
            ]);
            $data = $request->only([
                'name', 'user_name', 'address', 'phone',
            ]);
            if ($request->hasFile('image')) {
                $companyImage = $request->file('image');
                $imageName = time() . '_' . $request->get('name') . '.' . $companyImage->getClientOriginalExtension();
                $companyImage->move(public_path('images/companies'), $imageName);
                $data['image'] = $imageName;
            }
            $data['password'] = Hash::make($request->get('password'));
            $company = Company::query()->find($id)->update($data);
            if ($company) {
                session()->flash('alert-type', 'alert-success');
                session()->flash('message', 'تم تعديل بيانات الشركة بنجاح');
                return redirect()->back();
            } else {
                session()->flash('alert-type', 'alert-danger');
                session()->flash('alert-type', 'لم يتم تعديل بيانات الشركة!');
                return redirect()->back();
            }

        } elseif (Auth::guard('trader')->check()) {
            $request->validate([
                'id' => 'required|integer|exists:traders',
                'name' => 'required|string|min:3|max:45',
                'user_name' => 'required|unique:traders,user_name,' . $id,
                'password'  =>'required|string|min:8|max:15',
                'address' => 'required|string|max:30',
                'store.*' => 'required|max:30',
                'mobile_number' => 'required|numeric|string|unique:traders,mobile_number,' . $id,
                'dinar_balance' => 'required|string',
                'dollar_balance' => 'required|string',
            ]);
            $data = $request->only([
                'name', 'user_name', 'address',
                'mobile_number', 'dinar_balance', 'dollar_balance',
            ]);
            $data['store'] = implode(',', $request->get('store'));
            $data['password']=Hash::make($request->password);
            $trader = Trader::query()->find($id)->update($data);
            if ($trader) {
                session()->flash('alert-type', 'alert-success');
                session()->flash('message', 'تم تعديل بيانات التاجر بنجاح');
                return redirect()->back();
            }else{
                session()->flash('alert-type', 'alert-danger');
                session()->flash('message', 'فشلت عملية تعديل بيانات التاجر !');
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
