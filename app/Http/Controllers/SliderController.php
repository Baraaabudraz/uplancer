<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    //
    public function index(){
        $sliders=Slider::paginate(10);
        return view('cms.slider.index',compact('sliders'));
    }
    public function create(){
        return view('cms.slider.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,jpeg,png'
        ]);
        if ($request->hasFile('image')) {
            $image = $request->image->hashName();
            $request->image->move(public_path('images/slider'), $image);
        }
            Slider::create([
                'image' => $image
            ]);
        session()->flash('alert-type','alert-success');
        session()->flash('message',trans('dashboard_trans.Image Uploaded Successfully'));
        return redirect()->back();


    }
    public function destroy($id){
        $isDeleted=Slider::destroy($id);
        if ($isDeleted){
            return response()->json([
                'title'=>'success',
                'icon'=>'success',
                'text'=>trans('dashboard_trans.Image deleted successfully'),
            ]);
        }else{
            return response()->json([
                'title'=>'error',
                'icon'=>'error',
                'text'=>trans('dashboard_trans.Failed to delete this image!'),
            ]);
        }


    }

}
