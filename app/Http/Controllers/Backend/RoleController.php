<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::query()
            ->when(\request()->keyword != null, function ($query) {
                $query->search(\request()->keyword);
            })
            ->when(\request()->status != null, function ($query) {

                $query->whereStatus(\request()->status);
            })
            ->orderBy(\request()->sort_by ?? 'id', \request()->order_by ?? 'desc')
            ->paginate(\request()->limit_by ?? 10);
        return view('pages.backend.roles.index',compact('roles'));
    }


    public function create()
    {
        //
        $roles = Role::get();
        return view('pages.backend.roles.create',compact('roles'));
    }


    public function store(Request $request)
    {


        $input['name'] = ['en' =>$request->name_en, 'ar'=>$request->name_ar,];
        $input['permissions'] = json_encode($request->permissions);
        Role::create($input);
        toastr()->success(trans('dashboard.Created_Successfully'));
        return redirect()->route('admin.roles');


    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
        $role = Role::findOrFail($id);
        return view('pages.backend.roles.edit',compact('role'));
    }


    public function update(Request $request)
    {
        //

        $role = Role::findOrFail($request->id);

        $input['name'] = ['en' =>$request->name_en, 'ar'=>$request->name_ar,];
        $input['permissions'] = json_encode($request->permissions);
        $role->update($input);
        toastr()->success(trans('dashboard.Updated_Successfully'));
        return back();

    }


    public function destroy(Request $request)
    {
        //
        $role = Role::findOrFail($request->delete_role_id);
        $role->delete();
        toastr()->error(trans('dashboard.Deleted_Successfully'));
        return redirect()->route('admin.roles');
    }


}
