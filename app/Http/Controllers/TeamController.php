<?php

namespace App\Http\Controllers;

use App\Helpers\ControllerHelper;
use App\Models\Team;
use App\Services\ImagesUploadService;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()){
            $members = Team::query()->latest();
            return datatables()->of($members)
                ->addColumn('actions', function ($member) {
                    return view('cms.team.partials.actions', compact('member'))->render();
                })
                ->addColumn('checkbox', function ($member) {
                    return '<input class="form-check-input" type="checkbox"  id="select-all"  data-kt-check-target="#kt_members_table .form-check-input" value="1" data-id="'.$member->id.'">';
                })
                ->addColumn('partials',function ($member){
                    return view('cms.team.partials.partials',compact('member'))->render();
                })
                ->addColumn('position',function ($member){
                    return $member->position;
                })
                ->addColumn('phone',function ($member){
                    return $member->phone;
                })
                ->addColumn('role',function ($member){
                    return '<span class="badge badge-info" >'.$member->role->name.'</span>';

                })
                ->addColumn('status',function ($member){
                    if ($member->status == 'Active'){
                        return '<span class="badge badge-success" >'.trans('dashboard_trans.Active').'</span>';
                    }elseif ($member->status == 'InActive'){
                        return '<span class="badge badge-warning" >'.trans('dashboard_trans.InActive').'</span>';
                    }else{
                        return '<span class="badge badge-danger" >'.trans('dashboard_trans.Blocked').'</span>';
                    }

                })
                ->rawColumns(['actions','checkbox','partials','role'])
                ->make(true);

        }
        return view('cms.team.index');

    }

    public function create()
    {
        return view('cms.team.create');

    }

    public function store(Request $request ,ImagesUploadService $imagesUploadService)
    {
        $request->validate([
            'name.*'   => 'required|string|min:3|max:55',
            'role_id'  => 'required|int|exists:roles,id',
            'address'  =>  'nullable|string',
            'phone'    =>  'required|string|min:5|max:15',
            'image'    => 'required|image',
            'position.*' => 'required|string',
            'linkedin' => 'nullable|url',
            'github'   => 'nullable|url',
            'whatsapp' => 'nullable|url',
            'facebook' => 'nullable|url',
            'x'        => 'nullable|url',
        ]);

        $data = $request->only([
            'name', 'facebook', 'x', 'linkedin', 'position', 'github', 'whatsapp' ,'role_id' ,'address','phone'
        ]);

        $image = $imagesUploadService->uploadImage($request,'image','images/members');
        $data['image'] = $image;


        $is_Saved = Team::query()->create($data);

         if ($is_Saved){
             return ControllerHelper::generateResponse('success',trans('dashboard_trans.Member add successfully'),200);
         }else{
             return ControllerHelper::generateResponse('error',trans('dashboard_trans.Failed to add member'),400);
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

        $team = Team::query()->find($id);
        if ($team){
            if ($request->hasFile('image')){
                // إذا كان هناك صورة جديدة، احذف القديمة وقم بتحديث الصورة
                $imagePath = public_path('images/members/' . $team->image);
                if (file_exists($imagePath)){
                    unlink($imagePath);
                }
                $newImage = $request->image->hashName();
                $request->image->move(public_path('images/members'), $newImage);
                $data['image'] = $newImage;

            }else{
                // احتفظ بالصورة القديمة في حالة عدم تحميل صورة جديدة
                $data['image']=$team->image;
            }
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
        $team = Team::find($id);
        if ($team){
            $image = $team->image ;
            if ($image){
                $imagePath = public_path('images/members/' . $image);
                if (file_exists($imagePath)){
                    unlink($imagePath);
                }
            }
        }
        $is_Deleted = $team->delete();

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
