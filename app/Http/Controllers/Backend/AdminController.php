<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AdminsRequest;
use App\Models\Backend\Admin;
use App\Models\Backend\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{

    public function index()
    {
        $users = Admin::query()->where('id','<>',auth()->id())
            ->when(\request()->keyword != null, function ($query) {
                $query->search(\request()->keyword);
            })
            ->when(\request()->status != null, function ($query) {

                $query->whereStatus(\request()->status);
            })
            ->orderBy(\request()->sort_by ?? 'id', \request()->order_by ?? 'desc')
            ->paginate(\request()->limit_by ?? 10);
        return view('pages.backend.users.index',compact('users'));
    }


    public function create()
    {
        //
        $roles = Role::get();
        return view('pages.backend.users.create',compact('roles'));
    }


    public function store(AdminsRequest $request)
    {
        $input['name']     = ['ar' => $request->name_ar, 'en'=> $request->name_en];
        $input['email']    = $request->email;
        $input['mobile']   = $request->mobile;
        $input['role_id']  = $request->role_id;
        $input['password'] = bcrypt($request->password);

         Admin::create($input);

        toastr()->success(trans('dashboard.Created_Successfully'));
        return redirect()->route('admin.users');
    }


    public function show($id)
    {
        //

    }


    public function edit($id)
    {
        //
        $user = Admin::findOrFail($id);
        $roles = Role::get();

        return view('pages.backend.users.edit',compact('user','roles'));
    }


    public function update(AdminsRequest $request)
    {
        //

        try {

            $user = Admin::findOrFail($request->id);

            $input['name']     = ['ar' => $request->name_ar, 'en'=> $request->name_en];
            $input['email'] = $request->email;
            $input['role_id'] = $request->role_id;
            $input['mobile'] = $request->mobile;

            if (trim($request->password != '')){
                $input['password'] = bcrypt($request->password) ;

            }


            $user->update($input);

            toastr()->success(trans('dashboard.Updated_Successfully'));
            return redirect()->back();

        } catch (\Exception $ex) {

            return redirect()->back()->with([
                'message' => $ex->getMessage(),
                'alert-type' => 'danger',

            ]);


        }

    }

    public function destroy(Request $request)
    {
        //
        try {

            $user = Admin::findOrFail($request->delete_user_id);

            if ($user->image != null && File::exists('assets/images/users/' . $user->image)) {
                unlink('assets/images/users/' . $user->image);
            }
            $user->delete();

            toastr()->error(trans('dashboard.Deleted_Successfully'));
            return redirect()->back();

        } catch (\Exception $ex) {

            return redirect()->back()->with([
                'message' => $ex->getMessage(),
                'alert-type' => 'danger',

            ]);

        }

    }

}
