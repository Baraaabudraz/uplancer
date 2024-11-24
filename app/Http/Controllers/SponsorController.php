<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;

class SponsorController extends Controller
{

    public function index()
    {

        $sponsors = Sponsor::latest()->paginate(10);
        return view('cms.sponsor.index', compact('sponsors'));
    }


    public function create()
    {
        //
        return view('cms.sponsor.create');

    }

    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string',
            'image' => 'required|image',
        ]);
        $data = $request->only([
            'image', 'name',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->image->hashName();
            $request->image->move(public_path('images/sponsors'), $image);
        }
        $data['image'] = $image;
        $sponsors = Sponsor::create($data);
        $isSaved = $sponsors->save();
        if ($isSaved) {
            session()->flash('alert-type', 'alert-success');
            session()->flash('message', trans('dashboard_trans.Sponsor logo created successfully'));
            return redirect()->back();
        } else {
            session()->flash('alert-type', 'alert-danger');
        }
        session()->flash('message', trans('dashboard_trans.Failed to create sponsor logo'));
        return redirect()->back();
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $sponsor = Sponsor::query()->findOrFail($id);
        return view('cms.sponsor.edit', compact('sponsor'));
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string',
            'image' => 'required|image',
        ]);
        $sponsor = Sponsor::query()->findOrFail($id);
        $data = $request->only([
            'name', 'image',
        ]);
        if ($sponsor){
            if ($request->hasFile('image')) {
                if ($sponsor->image) {
                    $imagePath = public_path('images/sponsors/') . $sponsor->image;
                    if (file_exists($imagePath)) {
                        unlink($imagePath);
                    }
                }
                if ($request->hasFile('image')) {
                    $image = $request->image->hashName();
                    $request->image->move(public_path('images/sponsors'), $image);
                    $data['image'] = $image;
                }else{
                    $data['image'] = $sponsor->image;
                }

            }
        }

        $isUpdated = $sponsor->update($data);
        if ($isUpdated) {
            session()->flash('alert-type', 'alert-success');
            session()->flash('message', trans('dashboard_trans.Sponsor logo updated successfully'));
            return redirect()->back();
        } else {
            session()->flash('alert-type', 'alert-danger');
        }
        session()->flash('message', trans('dashboard_trans.Failed to update sponsor logo'));
        return redirect()->back();
    }

    public function destroy($id)
    {
        //
        $isDeleted = Sponsor::destroy($id);
        if ($isDeleted) {
            return response()->json([
                'title' => 'success',
                'icon' => 'success',
                'text' => trans('dashboard_trans.Sponsor deleted successfully'),
            ]);
        } else {
            return response()->json([
                'title' => 'error',
                'icon' => 'error',
                'text' => trans('dashboard_trans.Failed to delete this sponsor logo'),
            ]);

        }
    }
}
