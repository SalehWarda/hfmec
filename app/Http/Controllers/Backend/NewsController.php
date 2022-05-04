<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\NewsRequest;
use App\Models\Backend\NewCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class NewsController extends Controller
{

    public function index()
    {
        //
        $news = NewCompany::with('firstMedia')
            ->when(\request()->keyword != null, function ($query) {
                $query->search(\request()->keyword);
            })
            ->when(\request()->status != null, function ($query) {

                $query->whereStatus(\request()->status);
            })
            ->orderBy(\request()->sort_by ?? 'id', \request()->order_by ?? 'desc')
            ->paginate(\request()->limit_by ?? 10);
        return view('pages.backend.news.index',compact('news'));
    }


    public function create()
    {
        //
        return view('pages.backend.news.create');

    }


    public function store(NewsRequest $request)
    {
        //
        $input['title'] = ['ar' => $request->title_ar, 'en' => $request->title_en];
        $input['content'] = ['ar' => $request->content_ar, 'en' => $request->content_en];

        if ($image = $request->file('image')) {
            $file_name = Str::slug($request->title_en) . "." . $image->getClientOriginalExtension();
            $path = public_path('assets/images/news/' . $file_name);

            Image::make($image->getRealPath())->resize(500, null, function ($constraint) {

                $constraint->aspectRatio();
            })->save($path, 100);

            $input['image'] = $file_name;

        }
        NewCompany::create($input);

        toastr()->success(trans('dashboard.Created_Successfully'));
        return redirect()->route('admin.news');

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
        $new = NewCompany::findOrFail($id);
        return view('pages.backend.news.edit',compact('new'));
    }


    public function update(NewsRequest $request)
    {
        //

        $new = NewCompany::findOrFail($request->id);

        $input['title'] = ['ar' => $request->title_ar, 'en' => $request->title_en];
        $input['content'] = ['ar' => $request->content_ar, 'en' => $request->content_en];

        if ($image = $request->file('image')) {

            if ($new->image != null && File::exists('assets/images/news/' . $new->image)) {

                unlink('assets/images/news/' . $new->image);
            }


            $file_name = Str::slug($request->title_en) . "." . $image->getClientOriginalExtension();
            $path = public_path('assets/images/news/' . $file_name);

            Image::make($image->getRealPath())->resize(500, null, function ($constraint) {

                $constraint->aspectRatio();
            })->save($path, 100);

            $input['image'] = $file_name;

        }
        $new->update($input);

        toastr()->success(trans('dashboard.Updated_Successfully'));
        return back();
    }


    public function destroy(Request $request)
    {
        //
        try {

            $new= NewCompany::findOrFail($request->delete_new_id);

            if ($new->image != null && File::exists('assets/images/news/' . $new->image)) {
                unlink('assets/images/news/' . $new->image);
            }
            $new->delete();

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


        $new = NewCompany::findOrFail($request->news_id);
        if (File::exists('assets/images/news/' . $new->image)) {

            unlink('assets/images/news/' . $new->image);
            $new->image = null;
            $new->save();

        }
        return true;
    }
}
