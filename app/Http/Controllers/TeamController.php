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
                ->rawColumns(['actions','checkbox','partials','role','status'])
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
            'status'   => 'required|in:Active,InActive,Blocked',

        ]);

        $data = $request->only([
            'name', 'facebook', 'x', 'linkedin', 'position', 'github', 'whatsapp' ,'role_id' ,'address','phone'
        ]);

        $image = $imagesUploadService->uploadImage($request,'image','images/members');
        $data['image'] = $image;

        $data['status'] = $request->input('status') === 'Active' ? 'Active' : ($request->has('status') ? 'InActive' : 'Blocked');


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

    public function update(Request $request, $id ,ImagesUploadService $imagesUploadService)
    {
        $request->request->add(['id'=>$id]);

        $request->validate([
            'id'=>'required|int|exists:teams',
            'name.*'     => 'required|string|min:3|max:55',
            'role_id'    => 'required|int|exists:roles,id',
            'position.*' => 'required|string',
            'linkedin' => 'nullable|url',
            'github'   => 'nullable|url',
            'whatsapp' => 'nullable|url',
            'facebook' => 'nullable|url',
            'x'        => 'nullable|url',
            'image'    => 'nullable',
            'status'   => 'required|in:Active,InActive,Blocked',
        ]);
        $data = $request->only([
            'name', 'facebook', 'x', 'linkedin', 'position', 'github', 'whatsapp' ,'role_id' ,'address','phone'
        ]);
        $status = $request->input('status');

        $data['status'] = ($status === 'Active') ? 'Active' : (($status === 'InActive') ? 'InActive' : 'Blocked');

        $member = Team::query()->find($id);

        if ($member){
            if ($request->hasFile('image')){
                // إذا كان هناك صورة جديدة، احذف القديمة وقم بتحديث الصورة
                $imagePath = public_path('storage/' . $member->image);
                if (file_exists($imagePath)){
                    unlink($imagePath);
                }
                $image = $imagesUploadService->uploadImage($request,'image','images/members');
                $data['image'] = $image;

            }else{
                // احتفظ بالصورة القديمة في حالة عدم تحميل صورة جديدة
                $data['image']=$member->image;
            }
        }

        $is_Updated = $member->update($data);

        if ($is_Updated){
            return ControllerHelper::generateResponse('success',trans('dashboard_trans.Member update successfully'),200);
        }else{
            return ControllerHelper::generateResponse('success',trans('dashboard_trans.Failed to update member'),400);
        }
    }

    public function destroy($id)
    {
        $member = Team::find($id);
        if ($member){
            $image = $member->image ;
            if ($image){
                $imagePath = public_path('storage/' . $image);
                if (file_exists($imagePath)){
                    unlink($imagePath);
                }
            }
        }
        $is_Deleted = $member->delete();

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
