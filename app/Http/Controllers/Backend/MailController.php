<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\MailRequest;
use App\Models\Backend\Admin;
use App\Models\Backend\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class MailController extends Controller
{
    public function index()
    {
        $mails = Mail::query()
            ->when(\request()->keyword != null, function ($query) {
                $query->search(\request()->keyword);
            })
            ->when(\request()->status != null, function ($query) {

                $query->whereStatus(\request()->status);
            })
            ->orderBy(\request()->sort_by ?? 'id', \request()->order_by ?? 'desc')
            ->paginate(\request()->limit_by ?? 10);
        return view('pages.backend.mails.index',compact('mails'));
    }


    public function create()
    {
        //
    }

    public function store(MailRequest $request)
    {
        //
        $input['full_name'] = $request->full_name;
        $input['email'] = $request->email;
        $input['mobile'] = $request->mobile;
        $input['subject'] = $request->subject;
        $input['message'] = $request->message;
        $user = Admin::get();
        $mail = Mail::create($input);


//        $user->notify(new \App\Notifications\notifications($mail));
        Notification::send($user, new \App\Notifications\notifications($mail));

        toastr()->success(trans('dashboard.Created_Successfully'));
        return back();
    }

    public function show($id)
    {
        //
        $mail = Mail::findOrFail($id);
        return view('pages.backend.mails.show',compact('mail'));
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
        $mail = Mail::findOrFail($request->delete_mail_id);
        $mail->delete();

        toastr()->error(trans('dashboard.Deleted_Successfully'));
        return back();
    }

    public function markAsRead()
    {
        foreach(auth()->user()->unreadNotifications as $notification){

            if($notification->type == 'App\Notifications\notifications'){



                $notification->markAsRead();

                return back();

            }






        }


    }
}
