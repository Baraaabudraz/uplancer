<?php

namespace App\Http\Controllers\Front\Front;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Team;

class FrontController extends Controller
{
    public function index()
    {
        $settings = Setting::query()->first();
        $projects = Project::query()->with('service')->limit(6)->get();
        $services = Service::query()->orderBy('name','asc')->get();
        $sliders  = Slider::query()->get();
        $members  = Team::query()->get();

        return view('Front.index',compact('services','projects','settings','sliders','members'));
    }

    public function projects(){

        $projects =Project::query()->with('service')->paginate(20);
        return view('Front.project',compact('projects'));

    }
    public function services(){
        $services =Service::query()->with('projects')->paginate(20);
        return view('Front.service',compact('services'));
    }

}
