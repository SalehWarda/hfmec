<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ServicesRequest;
use App\Models\Backend\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ServicesController extends Controller
{

    public function index()
    {
        //
        $services = Service::withCount('projects')
            ->when(\request()->keyword != null, function ($query) {
                $query->search(\request()->keyword);
            })
            ->when(\request()->status != null, function ($query) {

                $query->whereStatus(\request()->status);
            })
            ->orderBy(\request()->sort_by ?? 'id', \request()->order_by ?? 'desc')
            ->paginate(\request()->limit_by ?? 10);
        return view('pages.backend.services.index',compact('services'));
    }


    public function create()
    {
        //
        return view('pages.backend.services.create');
    }


    public function store(ServicesRequest $request)
    {
        //
         $input['name'] = ['ar' => $request->name_ar, 'en' => $request->name_en];
         $input['description'] = ['ar' => $request->description_ar, 'en' => $request->description_en];
         $input['status'] = $request->status;

        if ($image = $request->file('image')) {
            $file_name = Str::slug($request->name_en) . "." . $image->getClientOriginalExtension();
            $path = public_path('assets/images/services/' . $file_name);

            Image::make($image->getRealPath())->resize(370, 250, function ($constraint) {

                $constraint->aspectRatio();
            })->save($path, 100);

            $input['image'] = $file_name;

        }
        Service::create($input);

        toastr()->success(trans('dashboard.Created_Successfully'));
        return redirect()->route('admin.services');



    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
        $service = Service::findOrFail($id);
        return view('pages.backend.services.edit',compact('service'));
    }


    public function update(ServicesRequest $request)
    {
        //

        $service = Service::findOrFail($request->id);

        $input['name'] = ['ar' => $request->name_ar, 'en' => $request->name_en];
        $input['description'] = ['ar' => $request->description_ar, 'en' => $request->description_en];
        $input['status'] = $request->status;

        if ($image = $request->file('image')) {

            if ($service->image != null && File::exists('assets/images/services/' . $service->image)) {

                unlink('assets/images/services/' . $service->image);
            }


            $file_name = Str::slug($request->name_en) . "." . $image->getClientOriginalExtension();
            $path = public_path('assets/images/services/' . $file_name);

            Image::make($image->getRealPath())->resize(370, 250, function ($constraint) {

                $constraint->aspectRatio();
            })->save($path, 100);

            $input['image'] = $file_name;

        }
        $service->update($input);

        toastr()->success(trans('dashboard.Updated_Successfully'));
        return back();
    }


    public function destroy(Request $request)
    {
        //
        try {

            $service = Service::findOrFail($request->delete_service_id);

            if ($service->image != null && File::exists('assets/images/services/' . $service->image)) {
                unlink('assets/images/services/' . $service->image);
            }
            $service->delete();

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


        $service = Service::findOrFail($request->service_id);
        if (File::exists('assets/images/services/' . $service->image)) {

            unlink('assets/images/services/' . $service->image);
            $service->image = null;
            $service->save();

        }
        return true;
    }

}
