<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Section;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        //
        $posts=Post::query()->with('section')->latest()->paginate(10);
        return view('cms.Blog.post.index',compact('posts'));
    }

    public function create()
    {
        //
        $sections=Section::all();
        return view('cms.Blog.post.create',compact('sections'));

    }

    public function store(Request $request)
    {
        //
        $request->validate([
           'name.*'=>'required',
           'post.*'=>'required',
           'section_id'=>'required|integer|exists:sections,id',
           'image'=> 'required|image',
        ]);
        $data=$request->only([
           'name', 'post', 'section_id',
        ]);

        if ($request->hasFile('image')) {
            $Image = $request->file('image');
            $imageName = time(). '_' . $request->get('name.*') . '.' . $Image->getClientOriginalExtension();
            $Image->move('images/post',$imageName);
        }
        $data['image']=$imageName;
        $posts=Post::create($data);
        $isSaved=$posts->save();
        if ($isSaved){
            session()->flash('alert-type','alert-success');
            session()->flash('message',trans('dashboard_trans.Post created successfully'));
            return redirect()->back();
        }else{
            session()->flash('alert-type','alert-danger');
            session()->flash('message',trans('dashboard_trans.Failed to create post!'));
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
        $sections=Section::all();
        $posts=Post::query()->findOrFail($id);
        return view('cms.Blog.post.edit',compact('posts','sections'));
    }

    public function update(Request $request, $id)
    {
            //
        $request->request->add(['id'=>$id]);
            $request->validate([
                'name.*'=>'required|string',
                'post.*'=>'required|string',
                'section_id'=>'required|integer|exists:sections,id',
                'image'=> 'image',
            ]);
        $data=$request->only([
            'name', 'post', 'section_id',
        ]);
            if ($request->hasFile('image')) {
                $Image = $request->file('image');
                $imageName = time(). '_' . $request->get('name.*') . '.' . $Image->getClientOriginalExtension();
                $Image->move('images/post',$imageName);
                $data['image']=$imageName;
            }

            $posts=Post::query()->find($id)->update($data);
            if ($posts){
                session()->flash('alert-type','alert-success');
                session()->flash('message',trans('dashboard_trans.Post updated successfully'));
                return redirect()->back();
            }else{
                session()->flash('alert-type','alert-danger');
                session()->flash('message',trans('dashboard_trans.Failed to update post!'));
                return redirect()->back();
            }
        }

    public function destroy($id)
    {
        //
        $isDeleted=Post::destroy($id);
        if ($isDeleted){
            return response()->json([
                'title'=>'success',
                'icon'=>'success',
                'text'=>trans('dashboard_trans.Post deleted successfully'),
            ]);
        }else{
            return response()->json([
                'title'=>'error',
                'icon'=>'error',
                'text'=>trans('dashboard_trans.Failed to delete this post!'),
            ]);

        }
    }
}
