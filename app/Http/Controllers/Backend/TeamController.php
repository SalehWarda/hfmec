<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\TeamRequest;
use App\Models\Backend\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class TeamController extends Controller
{

    public function index()
    {
        //
        $teams = Team::query()
            ->when(\request()->keyword != null, function ($query) {
                $query->search(\request()->keyword);
            })
            ->when(\request()->status != null, function ($query) {

                $query->whereStatus(\request()->status);
            })
            ->orderBy(\request()->sort_by ?? 'id', \request()->order_by ?? 'desc')
            ->paginate(\request()->limit_by ?? 10);
        return view('pages.backend.teams.index',compact('teams'));
    }


    public function create()
    {
        //
        return view('pages.backend.teams.create');
    }


    public function store(TeamRequest $request)
    {
        //
        $input['name'] = ['ar' => $request->name_ar, 'en' => $request->name_en];
        $input['job'] = ['ar' => $request->job_ar, 'en' => $request->job_en];
        $input['description'] = ['ar' => $request->description_ar, 'en' => $request->description_en];

        if ($image = $request->file('image')) {
            $file_name = Str::slug($request->name_en) . "." . $image->getClientOriginalExtension();
            $path = public_path('assets/images/team/' . $file_name);

            Image::make($image->getRealPath())->resize(500, null, function ($constraint) {

                $constraint->aspectRatio();
            })->save($path, 100);

            $input['image'] = $file_name;

        }
        Team::create($input);

        toastr()->success(trans('dashboard.Created_Successfully'));
        return redirect()->route('admin.teams');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
        $team = Team::findOrFail($id);
        return view('pages.backend.teams.edit',compact('team'));
    }


    public function update(TeamRequest $request)
    {
        //
        $team = Team::findOrFail($request->id);
        $input['name'] = ['ar' => $request->name_ar, 'en' => $request->name_en];
        $input['job'] = ['ar' => $request->job_ar, 'en' => $request->job_en];
        $input['description'] = ['ar' => $request->description_ar, 'en' => $request->description_en];

        if ($image = $request->file('image')) {

            if ($team->image != null && File::exists('assets/images/team/' . $team->image)) {

                unlink('assets/images/team/' . $team->image);
            }


            $file_name = Str::slug($request->name_en) . "." . $image->getClientOriginalExtension();
            $path = public_path('assets/images/team/' . $file_name);

            Image::make($image->getRealPath())->resize(500, null, function ($constraint) {

                $constraint->aspectRatio();
            })->save($path, 100);

            $input['image'] = $file_name;

        }
        $team->update($input);

        toastr()->success(trans('dashboard.Updated_Successfully'));
        return back();
    }


    public function destroy(Request $request)
    {
        //
        try {

            $team = Team::findOrFail($request->delete_team_id);

            if ($team->image != null && File::exists('assets/images/team/' . $team->image)) {
                unlink('assets/images/team/' . $team->image);
            }
            $team->delete();

            toastr()->error(trans('dashboard.Deleted_Successfully'));
            return redirect()->back();

        } catch (\Exception $ex) {

            return redirect()->back()->with([
                'message' => $ex->getMessage(),
                'alert-type' => 'danger',

            ]);

        }

    }

    public function removeImage(Request $request)
    {


        $team = Team::findOrFail($request->team_id);
        if (File::exists('assets/images/team/' . $team->image)) {

            unlink('assets/images/team/' . $team->image);
            $team->image = null;
            $team->save();

        }
        return true;
    }
}
