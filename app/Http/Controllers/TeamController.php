<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $members = Team::query()->paginate(10);
        return view('cms.team.index',compact('members'));

    }

    public function create()
    {
        return view('cms.team.create');

    }

    public function store(Request $request)
    {
        $request->validate([
            'name.*'   => 'required|string|min:3|max:55',
            'position.*' => 'required|string',
            'linkedin' => 'nullable|url',
            'github'   => 'nullable|url',
            'whatsapp' => 'nullable|url',
            'facebook' => 'nullable|url',
            'x'        => 'nullable|url',
        ]);

        $data = $request->only([
            'name', 'facebook', 'x', 'linkedin',
            'position', 'github', 'whatsapp'
        ]);

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time() . ('_') . $request->get('name.') . ('.') . $image->getClientOriginalExtension();
            $image->move('images/members',$imageName);

        }
        $data['image'] = $imageName;

        $is_Saved = Team::query()->create($data);

         if ($is_Saved){
             session()->flash('alert-type','alert-success');
             session()->flash('message',trans('dashboard_trans.Member add successfully'));
             return redirect()->back();
         }else{
             session()->flash('alert-type','alert-danger');
             session()->flash('message' , trans('dashboard_trans.Failed to add member'));
             return redirect()->back();

         }
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $member = Team::query()->findOrFail($id);
        return view('cms.team.edit',compact('member'));

    }

    public function update(Request $request, $id)
    {
        $request->request->add(['id'=>$id]);

        $request->validate([
            'id'=>'required|int|exists:teams',
            'name.*'     => 'required|string|min:3|max:55',
            'position.*' => 'required|string',
            'linkedin' => 'nullable|url',
            'github'   => 'nullable|url',
            'whatsapp' => 'nullable|url',
            'facebook' => 'nullable|url',
            'x'        => 'nullable|url',
            'image'    => 'image',
        ]);
        $data = $request->only([
            'name', 'facebook', 'x', 'linkedin',
            'position', 'github', 'whatsapp'
        ]);

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time() . ('_') . $data['name'] . ('.') . $image->getClientOriginalExtension();
            $image->move('images/members',$imageName);
            $data['image'] = $imageName;
        }


        $is_Updated = Team::query()->find($id)->update($data);

        if ($is_Updated){
            session()->flash('alert-type','alert-success');
            session()->flash('message',trans('dashboard_trans.Member update successfully'));
            return redirect()->back();
        }else{
            session()->flash('alert-type','alert-danger');
            session()->flash('message' , trans('dashboard_trans.Failed to update member'));
            return redirect()->back();

        }
    }

    public function destroy($id)
    {
        $is_Deleted = Team::destroy($id);

        if ($is_Deleted){
            return response()->json([
                'title'  => 'success',
                'icon'   => 'success',
                'text'   => trans('dashboard_trans.Member Deleted Successfully')
            ]);
        }else{
            return response()->json([
                'title'  => 'error',
                'icon'   => 'error',
                'text'   => trans('dashboard_trans.Failed to delete this member')
            ]);

        }
    }
}
