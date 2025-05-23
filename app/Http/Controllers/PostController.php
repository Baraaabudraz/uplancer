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
        $post = Post::query()->find($id);
        if ($post){
            if ($request->hasFile('image')){
                // إذا كان هناك صورة جديدة، احذف القديمة وقم بتحديث الصورة
                $imagePath = public_path('images/post/' . $post->image);
                if (file_exists($imagePath)){
                    unlink($imagePath);
                }
                $newImage = $request->image->hashName();
                $request->image->move(public_path('images/post'), $newImage);
                $data['image'] = $newImage;
            }else{
                // احتفظ بالصورة القديمة في حالة عدم تحميل صورة جديدة
                $data['image']=$post->image;
            }
        }

            $isUpdated = $post->update($data);
            if ($isUpdated){
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
        $post = Post::query()->find($id);
        if ($post){
            $image = $post->image ;
            if ($image){
                $imagePath = public_path('images/post/' . $image);
                if (file_exists($imagePath)){
                    unlink($imagePath);
                }
            }
        }
        $isDeleted = $post->delete();

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
