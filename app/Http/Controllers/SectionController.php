<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{

    public function index()
    {
        $sections=Section::paginate(10);
        return view('cms.Blog.section.index',compact('sections'));
    }

    public function create()
    {
        return view('cms.Blog.section.create');
    }


    public function store(Request $request)
    {
        //
        $request->validate([
            'name.*'=>'required',
        ]);
        $sections=new Section();
        $sections->name=$request->name;
        $isSaved=$sections->save();
        if ($isSaved){
            session()->flash('alert-type','alert-success');
            session()->flash('message',trans('dashboard_trans.Section created successfully'));
            return redirect()->back();
        }else{
            session()->flash('alert-type','alert-danger');
            session()->flash('message',trans('dashboard_trans.Failed to create section!'));
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
        $sections=Section::query()->findOrFail($id);
        return view('cms.Blog.section.edit',compact('sections'));
    }

    public function update(Request $request, $id)
    {
        //
        $request->request->add(['id'=>$id]);
        $request->validate([
            'name.*'=>'required|string',
        ]);
        $sections=Section::query()->find($id);
        $sections->name=$request->name;
        $isUpdated=$sections->save();
        if ($isUpdated){
            session()->flash('alert-type','alert-success');
            session()->flash('message',trans('dashboard_trans.Section updated successfully'));
            return redirect()->back();
        }else{
            session()->flash('alert-type','alert-danger');
            session()->flash('message',trans('dashboard_trans.Failed to update section!'));
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        //
        $isDeleted=Section::destroy($id);
        if ($isDeleted){
            return response()->json([
                'title'=>'success',
                'icon'=>'success',
                'text'=>trans('dashboard_trans.Section deleted successfully'),
            ]);
        }else{
            return response()->json([
                'title'=>'error',
                'icon'=>'error',
                'text'=>trans('dashboard_trans.Failed to delete this section!'),
            ]);

        }
    }
}
