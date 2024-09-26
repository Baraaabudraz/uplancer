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
        $data = $this->getArr($request);
        $slider = Slider::query()->create($data);
        if ($slider) {
            session()->flash('alert-type', 'alert-success');
            session()->flash('message', trans('dashboard_trans.Image Uploaded Successfully'));
            return redirect()->back();
        } else {
            session()->flash('alert-type', 'alert-danger');
            session()->flash('message', trans('dashboard_trans.Failed to upload image'));
            return redirect()->back();
        }
    }
       public function edit($id){
        $slider = Slider::query()->findOrFail($id);
        return view('cms.slider.edit',compact('slider'));
       }

       public function update(Request $request, $id){
           $data = $this->getArr($request);
           $slider = Slider::query()->find($id)->update($data);
           if ($slider) {
               session()->flash('alert-type', 'alert-success');
               session()->flash('message', trans('dashboard_trans.Image Uploaded Successfully'));
               return redirect()->back();
           } else {
               session()->flash('alert-type', 'alert-danger');
               session()->flash('message', trans('dashboard_trans.Failed to upload image'));
               return redirect()->back();
           }

       }

    public function destroy($id){
        $slider= Slider::query()->find($id);

        if ($slider) {
            $image = $slider->image;

            if ($image) {
                $imagePath = public_path('images/sliders/' . $image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
        }
        $isDeleted = Slider::destroy($id);
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

    /**
     * @param Request $request
     * @return array
     */
    public function getArr(Request $request): array
    {
        $request->validate([
            'image' => 'required|image',
            'description.*' => 'required|string'
        ]);

        $data = $request->only(['image', 'description']);

        if ($request->hasFile('image')){
            $image = $request->image->hashName();
            $request->image->move(public_path('images/sliders'),$image);
        }else{
            $image=$request->get('image');
        }
        $data['image'] = $image;
        return $data;
    }

}
