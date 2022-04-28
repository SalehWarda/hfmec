<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ProjectRequest;
use App\Models\Backend\Project;
use App\Models\Backend\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProjectsController extends Controller
{

    public function index()
    {
        //
        $projects = Project::withCount('service','firstMedia')
            ->when(\request()->keyword != null, function ($query) {
                $query->search(\request()->keyword);
            })
            ->when(\request()->status != null, function ($query) {

                $query->whereStatus(\request()->status);
            })
            ->orderBy(\request()->sort_by ?? 'id', \request()->order_by ?? 'desc')
            ->paginate(\request()->limit_by ?? 10);
        return view('pages.backend.projects.index',compact('projects'));
    }


    public function create()
    {
        //
        $services = Service::whereStatus(1)->get(['id','name']);

        return view('pages.backend.projects.create',compact('services'));

    }


    public function store(ProjectRequest $request)
    {
        //
        $input['name'] = ['ar' => $request->name_ar, 'en' => $request->name_en];
        $input['description'] = ['ar' => $request->description_ar, 'en' => $request->description_en];
        $input['status'] = $request->status;
        $input['client'] = $request->client;
        $input['commencement_date'] = $request->commencement_date;
        $input['location'] = $request->location;
        $input['service_id'] = $request->service_id;
        $project = Project::create($input);

        $i=1;
        if($request->images && count($request->images) > 0){
            foreach ($request->images as $image){

                $fie_name = $project->slug.'_'.time().'_'.$i.'.'.$image->getClientOriginalExtension();
                $file_size= $image->getSize();
                $file_type = $image->getMimeType();
                $path = public_path('assets/images/projects/'.$fie_name);
                Image::make($image->getRealPath())->resize(500,null,function ($constraint){
                    $constraint->aspectRatio();
                })->save($path,100);

                $project->media()->create([
                    'file_name' => $fie_name,
                    'file_size' => $file_size,
                    'file_type'=>$file_type,
                    'file_status'=>true,
                    'file_sort'=>$i,
                ]);
                $i++;

            }



        }
        toastr()->success('تم الإضافة بنجاح');
        return redirect()->route('admin.projects');
    }


    public function show($id)
    {
        //
        $project = Project::findOrFail($id);
        return view('pages.backend.projects.show',compact('project'));
    }


    public function edit($id)
    {
        //
        $project = Project::findOrFail($id);
        $services = Service::whereStatus(1)->get(['id','name']);

        return view('pages.backend.projects.edit',compact('project','services'));
    }


    public function update(ProjectRequest $request)
    {
        //
        $project = Project::findOrFail($request->id);

        $input['name'] = ['ar' => $request->name_ar, 'en' => $request->name_en];
        $input['description'] = ['ar' => $request->description_ar, 'en' => $request->description_en];
        $input['status'] = $request->status;
        $input['client'] = $request->client;
        $input['commencement_date'] = $request->commencement_date;
        $input['location'] = $request->location;
        $input['service_id'] = $request->service_id;
        $project->update($input);


        $i= $project->media()->count() +1;
        if($request->images && count($request->images) > 0){
            foreach ($request->images as $image){

                $fie_name = $project->slug.'_'.time().'_'.$i.'.'.$image->getClientOriginalExtension();
                $file_size= $image->getSize();
                $file_type = $image->getMimeType();
                $path = public_path('assets/images/projects/'.$fie_name);
                Image::make($image->getRealPath())->resize(500,null,function ($constraint){
                    $constraint->aspectRatio();
                })->save($path,100);

                $project->media()->create([
                    'file_name' => $fie_name,
                    'file_size' => $file_size,
                    'file_type'=>$file_type,
                    'file_status'=>true,
                    'file_sort'=>$i,
                ]);
                $i++;

            }



        }

        toastr()->success('تم التعديل بنجاح !');
        return back();
    }


    public function destroy(Request $request)
    {
        //
        try {

            $project = Project::findOrFail($request->delete_project_id);

            if ($project->image != null && File::exists('assets/images/projects/' . $project->image)) {
                unlink('assets/images/projects/' . $project->image);
            }
            $project->delete();

            toastr()->error('تم الحذف بنجاح !');
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


        $project = Project::findOrFail($request->project_id);
        $image = $project->media()->whereId($request->image_id)->first();
        if (File::exists('assets/images/projects/' . $image->file_name)) {

            unlink('assets/images/projects/' . $image->file_name);

        }

        $image->delete();
        return true;
    }


}
