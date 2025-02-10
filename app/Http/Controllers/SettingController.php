<?php

namespace App\Http\Controllers;

use App\Helpers\ControllerHelper;
use App\Models\Setting;
use App\Services\ImagesUploadService;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected ImagesUploadService $imagesUploadService;

    public function __construct(ImagesUploadService $imagesUploadService)
    {
        $this->imagesUploadService = $imagesUploadService;
    }
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

        if ($request->logo) {
            $logo = $this->imagesUploadService->uploadImage($request, 'logo','images/settings/logo');
            $data['logo'] = $logo;
        }
        if($request->favicon){
            $favicon = $this->imagesUploadService->uploadImage($request, 'favicon','images/settings/favicon');
            $data['favicon'] = $favicon;
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
            'name', 'phone', 'email', 'linkedin', 'url' , 'alt',
            'facebook', 'instagram', 'x' , 'desc_contact' , 'about' , 'why_us', 'meta_title' , 'meta_description' , 'meta_keyword'
        ]);

        $settings = Setting::query()->first();

        if ($settings){
            if ($request->hasFile('logo')){
                $imagePath = public_path('storage/' . $settings->logo);
                if (file_exists($imagePath)){
                    unlink($imagePath);
                }
                $logo = $this->imagesUploadService->uploadImage($request, 'logo','images/settings/logo');
                $data['logo'] = $logo;
            }else{
                $data['logo']=$settings->logo;
            }

            if ($request->hasFile('favicon')){
                $imagePath = public_path('storage/' . $settings->favicon);
                if (file_exists($imagePath)){
                    unlink($imagePath);
                }
                $favicon = $this->imagesUploadService->uploadImage($request, 'favicon','images/settings/favicon');
                $data['favicon'] = $favicon;
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
                $imagePath = public_path('storage/' . $logo);
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
