<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $website_settings = Setting::query()->first();
        return view('cms.settings.index',compact('website_settings'));
    }
    public function create()
    {
        return view('cms.settings.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'logo' => 'required|image',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'about.*' => 'required|string',
            'desc_contact.*' => 'required|string',
            'company_site' => 'required|url',
            'why_us.*' => 'required|string',
            'linkedin' => 'nullable|url',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'x' => 'nullable|url',
        ]);
        $data = $request->only([
            'name', 'logo', 'phone', 'email', 'linkedin', 'company_site',
            'facebook', 'instagram', 'x' , 'desc_contact' , 'about' , 'why_us' , 'meta_title' , 'meta_description' , 'meta_keyword'
        ]);

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '_' . $request->get('name') . '.' . $logo->getClientOriginalExtension();
            $logo->move('images/settings/logo', $logoName);
        }

        $data['logo'] = $logoName;

        $website_settings = Setting::query()->create($data);

        if ($website_settings) {
            session()->flash('alert-type', 'alert-success');
            session()->flash('message', trans('dashboard_trans.Settings Created Successfully'));
            return redirect()->back();
        } else {
            session()->flash('alert-type', 'alert-danger');
            session()->flash('message', trans('dashboard_trans.Failed to create Settings'));
            return redirect()->back();

        }

    }

    public function edit_settings()
    {
        $website_settings = Setting::query()->first();
        return view('cms.settings.edit',compact('website_settings'));
    }


    public function updateSettings(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'logo' => '',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'about.*' => 'required|string',
            'desc_contact.*' => 'required|string',
            'company_site' => 'required|url',
            'why_us.*' => 'required|string',
            'linkedin' => 'nullable|url',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'x' => 'nullable|url',
        ]);
        $data = $request->only([
            'name', 'phone', 'email', 'linkedin', 'company_site' ,
            'facebook', 'instagram', 'x' , 'desc_contact' , 'about' , 'why_us', 'meta_title' , 'meta_description' , 'meta_keyword'
        ]);

        $settings = Setting::query()->first();
        if ($settings){
            if ($request->hasFile('logo')){
                $imagePath = public_path('images/settings/logo/' . $settings->logo);
                if (file_exists($imagePath)){
                    unlink($imagePath);
                }
                $newLogo= $request->image->hashName();
                $request->image->move(public_path('images/settings/logo'), $newLogo);
                $data['logo'] = $newLogo;
            }else{
                // احتفظ بالصورة القديمة في حالة عدم تحميل صورة جديدة
                $data['image']=$settings->image;
            }
        }



        $website_settings = Setting::query()->update($data);

        if ($website_settings) {
            session()->flash('alert-type', 'alert-success');
            session()->flash('message', trans('dashboard_trans.Settings Updated Successfully'));
            return redirect()->back();
        } else {
            session()->flash('alert-type', 'alert-danger');
            session()->flash('message', trans('dashboard_trans.Failed to update Settings'));
            return redirect()->back();
        }

    }

    public function destroy(string $id){

        $settings = Setting::find($id);
        if ($settings){
            $logo = $settings->logo ;
            if ($logo){
                $imagePath = public_path('images/settings/logo/' . $logo);
                if (file_exists($imagePath)){
                    unlink($imagePath);
                }
            }
        }
        $is_Deleted = $settings->delete();
        if ($is_Deleted){
            return response()->json([
                'title' => 'success',
                'icon'   => 'success',
                'text'   => trans('dashboard_trans.Settings deleted Successfully')
            ]);

        }else{
            return response()->json([
                'title' => 'error',
                'icon'   => 'error',
                'text'   => trans('dashboard_trans.Settings deleted Successfully')

            ]);
        }
    }


}
