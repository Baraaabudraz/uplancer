<?php

namespace App\Http\Controllers;

use App\Helpers\ControllerHelper;
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
            'name.*' => 'required|string',
            'logo' => 'required|image',
            'phone' => 'required|string|min:5|max:15',
            'email' => 'required|email',
            'about.*' => 'required|string',
            'desc_contact.*' => 'nullable|string',
            'url' => 'required|url',
            'why_us.*' => 'required|string',
            'linkedin' => 'nullable|url',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'x' => 'nullable|url',
        ]);
        $data = $request->only([
            'name', 'logo', 'phone', 'email', 'linkedin', 'url',
            'facebook', 'instagram', 'x' , 'desc_contact' , 'about' , 'why_us' , 'meta_title' , 'meta_description' , 'meta_keyword'
        ]);

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '_' . '.' . $logo->getClientOriginalExtension();
            $logo->move('images/settings/logo', $logoName);
            $data['logo'] = $logoName;
        }

        if ($request->hasFile('favicon')) {
            $favicon = $request->file('favicon');
            $favName = time() . '_' . '.' . $favicon->getClientOriginalExtension();
            $favicon->move('images/settings/favicon', $favName);
            $data['favicon'] = $favName;
        }

        $website_settings = Setting::query()->create($data);

        if ($website_settings) {
            return ControllerHelper::generateResponse('success',trans('dashboard_trans.Setting added successfully'),200);

        } else {
            return ControllerHelper::generateResponse('error',trans('dashboard_trans.Failed to added Setting'),400);

        }

    }

    public function edit($id)
    {
        $website_settings = Setting::query()->first();
        return view('cms.settings.edit',compact('website_settings'));
    }


    public function update(Request $request)
    {
        $request->validate([
            'name.*' => 'required|string',
            'logo' => '',
            'phone' => 'required|string|min:5|max:15',
            'email' => 'required|email',
            'about.*' => 'required|string',
            'desc_contact.*' => 'nullable|string',
            'url' => 'required|url',
            'why_us.*' => 'nullable|string',
            'linkedin' => 'nullable|url',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'x' => 'nullable|url',
        ]);
        $data = $request->only([
            'name', 'phone', 'email', 'linkedin', 'url' ,
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
                $data['logo']=$settings->logo;
            }

            if ($request->hasFile('favicon')){
                $imagePath = public_path('images/settings/favicon/' . $settings->favicon);
                if (file_exists($imagePath)){
                    unlink($imagePath);
                }
                $newFavicon= $request->image->hashName();
                $request->image->move(public_path('images/settings/favicon'), $newFavicon);
                $data['favicon'] = $newFavicon;
            }else{
                $data['favicon']=$settings->favicon;
            }
        }

        $website_settings = $settings->update($data);

        if ($website_settings) {
            return ControllerHelper::generateResponse('success',trans('dashboard_trans.Settings Updated Successfully'),200);

        } else {
            return ControllerHelper::generateResponse('error',trans('dashboard_trans.Failed to update Settings'),400);

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
