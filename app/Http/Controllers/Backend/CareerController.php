<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Admin;
use App\Models\Backend\Career;
use App\Models\Backend\JobPublish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CareerController extends Controller
{

    public function index()
    {
        $careers = Career::query()
            ->when(\request()->keyword != null, function ($query) {
                $query->search(\request()->keyword);
            })
            ->when(\request()->status != null, function ($query) {

                $query->whereStatus(\request()->status);
            })
            ->orderBy(\request()->sort_by ?? 'id', \request()->order_by ?? 'desc')
            ->paginate(\request()->limit_by ?? 10);
        return view('pages.backend.careers.index',compact('careers'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //

        $input['full_name'] = $request->full_name;
        $input['email'] = $request->email;
        $input['message'] = $request->message;


        if ($cv = $request->file('attachment')) {
            $file_name = Str::slug($request->full_name) . "." . $cv->getClientOriginalExtension();
            $request->file('attachment')->move('assets/attachments/' , $file_name);



            $input['attachment'] = $file_name;

        }
        $user = Admin::get();

        $career = Career::create($input);
        Notification::send($user, new \App\Notifications\CareerNotifications($career));

        toastr()->success(trans('dashboard.Sent_Successfully'));
        return back();
    }


    public function show($id)
    {
        //
        $career = Career::findOrFail($id);
        return view('pages.backend.careers.show',compact('career'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy(Request $request)
    {
        //
        try {

            $career = Career::findOrFail($request->delete_career_id);

            if ($career->attachment != null && File::exists('assets/attachments/' . $career->attachment)) {
                unlink('assets/attachments/' . $career->attachment);
            }
            $career->delete();

            toastr()->error(trans('dashboard.Deleted_Successfully'));
            return redirect()->back();

        } catch (\Exception $ex) {

            return redirect()->back()->with([
                'message' => $ex->getMessage(),
                'alert-type' => 'danger',

            ]);

        }

    }

    public function download_attachment($filename)
    {


        return response()->download(public_path('assets/attachments/'.$filename));
    }


    public function jobsIndex()
    {

        $jobs = JobPublish::paginate(10);
        return view('pages.backend.jobPublishes.index',compact('jobs'));
    }

  public function jobsCreate()
    {


        return view('pages.backend.jobPublishes.create');
    }

  public function jobsStore(Request $request)
    {

        $input['title'] = ['en' => $request->title_en, 'ar'=>$request->title_ar];
        $input['content'] = ['en' => $request->content_en, 'ar'=>$request->content_ar];

        JobPublish::create($input);

        toastr()->success(trans('dashboard.Sent_Successfully'));
        return back();

    }

    public function jobsEdit($id)
    {

        $job = JobPublish::findOrFail($id);
        return view('pages.backend.jobPublishes.edit',compact('job'));


    }

  public function jobsUpdate(Request $request)
    {

        $job = JobPublish::findOrFail($request->id);
        $input['title'] = ['en' => $request->title_en, 'ar'=>$request->title_ar];
        $input['content'] = ['en' => $request->content_en, 'ar'=>$request->content_ar];

        $job->update($input);

        toastr()->success(trans('dashboard.Updated_Successfully'));
        return redirect()->route('admin.jobs');

    }

  public function jobsDestroy(Request $request)
    {

        $job = JobPublish::findOrFail($request->delete_job_id);


        $job->delete();

        toastr()->error(trans('dashboard.Deleted_Successfully'));
        return back();

    }

    public function markAsReadc()
    {

        foreach(auth()->user()->unreadNotifications as $notification){

            if($notification->type == 'App\Notifications\CareerNotifications'){



                $notification->markAsRead();

                return back();

            }






        }

    }


}
