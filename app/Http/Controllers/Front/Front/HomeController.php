<?php

namespace App\Http\Controllers\Front\Front;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Slider;

class HomeController extends Controller
{
    public function index()
    {
        $settings = Setting::query()->first();
        $projects = Project::query()->with('service')->get();
        $services = Service::query()->orderBy('name','asc')->get();
        $sliders =  Slider::query()->get();
        return view('Front.index',compact('services','projects','settings','sliders'));
    }

}
