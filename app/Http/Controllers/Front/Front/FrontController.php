<?php

namespace App\Http\Controllers\Front\Front;

use App\Http\Controllers\Controller;
use App\Mail\Contact;
use App\Mail\GetStarted;
use App\Models\Project;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{
    public function index()
    {
        $settings = Setting::query()->first();
        $projects = Project::query()->with('service')->inRandomOrder()->latest()->limit(12)->get();
        $services = Service::query()->with('projects')->get();
//        $members  = Team::query()->get();

        return view('Front.index',compact('services','projects','settings'));
    }

    public function projects(request $request)
    {
        if ($request->ajax()){
            $page = $request->input('page',1);
            $perPage = $request->input('perPage',10);
            $getProjects = Project::query()->with('service')->latest()->paginate($perPage, ['*'], 'page', $page);
            return response()->json($getProjects);
        }
        return view('Front.projects');
    }
    public function showProject($slug){

        $project = Project::query()->with('service')->where('slug',$slug)->first();
//        dd(array($project->features));
        return view('Front.show-project',compact('project'));

    }
    public function services(){
        $services = Service::query()->with('projects')->paginate(20);
        return view('Front.service',compact('services'));
    }
    public function about(){
        $settings = Setting::query()->first();
        return view('Front.about',compact('settings'));
    }

    public function contact(){
        $settings = Setting::query()->first();
        return view('Front.contact',compact('settings'));
    }

    public function sendContactForm(Request $request){
        $request->validate([
           'name' =>'required|string|max:100',
           'email'=>'required|email',
           'topic'=>'required|string|min:3|max:45',
           'message' =>'required|string',
        ]);

      $send = Mail::to('info@uplancerps.com')->send(new Contact(
            $request->name,
            $request->email,
            $request->topic,
            $request->message,
        ));

      if ($send){
          session()->flash('alert-type','alert-success');
          session()->flash('message','Your message has been sent successfully!');
      }else{
          session()->flash('alert-type','alert-danger');
          session()->flash('message','Failed to sent message!');
      }
        return redirect()->back();

    }
    public function getStarted(Request $request){

        $request->validate([
            'company_name'=>'required|string',
            'name'=>'required|string',
            'email'=>'required|string|email',
            'phone'=>'required|numeric',
            'service'=>'required',
            'message' => 'required|string',
            'budget' => 'required',
            'hear' => 'required|string',
        ]);
        $formData = $request->all();

        $send = Mail::to('info@uplancerps.com')->send(new GetStarted($formData));


        if ($send){
            session()->flash('alert-type','alert-success');
            session()->flash('message','Your message has been sent successfully!');
        }else{
            session()->flash('alert-type','alert-danger');
            session()->flash('message','Failed to sent message!');
        }
        return redirect()->back();

    }

}
