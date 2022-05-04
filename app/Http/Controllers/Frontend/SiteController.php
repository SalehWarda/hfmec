<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\About\ES;
use App\Models\Backend\About\IMSPolicy;
use App\Models\Backend\About\Introduction;
use App\Models\Backend\About\IsoCertificate;
use App\Models\Backend\About\VV;
use App\Models\Backend\Career;
use App\Models\Backend\Cover;
use App\Models\Backend\JobPublish;
use App\Models\Backend\Media;
use App\Models\Backend\NewCompany;
use App\Models\Backend\Project;
use App\Models\Backend\Service;
use App\Models\Backend\Settings;
use App\Models\Backend\Team;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    //
    public function index()
    {
        $data['services'] = Service::get();
        $data['covers'] = Cover::get();
        $data['projects'] = Project::with('service','firstMedia')->whereStatus(true)->get();
        $data['introduction'] = Introduction::first();
        $data['settings'] = Settings::first();
        $data['news'] = NewCompany::first();
        $data['vv'] = VV::first();
        $data['es'] = ES::first();


        return view('pages.frontend.index',$data);

    }

    public function introduction()
    {
        $data['introduction'] = Introduction::first();
        return view('pages.frontend.introduction',$data);

    }

    public function vv()
    {
        $data['vv'] = VV::first();
        return view('pages.frontend.vv',$data);

    }
    public function es()
    {
        $data['es'] = ES::first();
        return view('pages.frontend.es',$data);

    }

    public function ims()
    {
        $data['ims'] = IMSPolicy::first();
        return view('pages.frontend.ims',$data);

    }

    public function iso()
    {
        $data['iso'] = IsoCertificate::first();
        return view('pages.frontend.iso',$data);

    }

    public function team()
    {
        $data['teams'] = Team::paginate(12);
        return view('pages.frontend.team',$data);

    }

    public function teamDetails($slug)
    {
        $detail = Team::whereSlug($slug)->firstOrFail();

        return view('pages.frontend.teamDetails',compact('detail'));

    }

    public function service($slug)
    {

       $service = Service::whereSlug($slug)->firstOrFail();
       return view('pages.frontend.serviceDetails',compact('service'));

    }

    public function ongoing()
    {
        $project = Project::with('service','firstMedia')->whereStatus(false)->paginate(12);
            return view('pages.frontend.ongoing',compact('project'));
    }

    public function completed()
    {
        $project = Project::with('service','firstMedia')->whereStatus(true)->paginate(12);
            return view('pages.frontend.completed',compact('project'));
    }

    public function last10years()
    {
        $project = Project::with('service','firstMedia')->whereYear('commencement_date','>=', date('Y', strtotime('-10 year' )))->whereStatus(true)->orderBy('commencement_date','desc')->paginate(12);
            return view('pages.frontend.last10yearsprojects',compact('project'));
    }

   public function clients()
    {
        $clients = Project::query()->paginate(12);
            return view('pages.frontend.client',compact('clients'));
    }

    public function projects($slug)
    {

        $projects = Project::with('service','firstMedia')->whereSlug($slug)->firstOrFail();
        return view('pages.frontend.projectsDetails',compact('projects'));

    }

    public function news()
    {

        $news = NewCompany::get();
        return view('pages.frontend.office_news',compact('news'));

    }

    public function getContact()
    {


        $settings = Settings::first();
        return view('pages.frontend.contact',compact('settings'));

    }

    public function getCareer()
    {

       $jobs = JobPublish::get();
        return view('pages.frontend.career',compact('jobs'));

    }
}
