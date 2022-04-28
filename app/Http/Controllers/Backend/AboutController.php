<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ESRequest;
use App\Http\Requests\Backend\ImsPolicyRequest;
use App\Http\Requests\Backend\IntroductionRequest;
use App\Http\Requests\Backend\IsoCertificateRequest;
use App\Http\Requests\Backend\VVRequest;
use App\Models\Backend\About\ES;
use App\Models\Backend\About\IMSPolicy;
use App\Models\Backend\About\Introduction;
use App\Models\Backend\About\IsoCertificate;
use App\Models\Backend\About\VV;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    //
    public function introduction()
    {

        $introduction = Introduction::first();
        return view('pages.backend.about.introduction',compact('introduction'));
    }

    public function updateIntroduction(IntroductionRequest $request)
    {

        $introduction = Introduction::findOrFail($request->id);

        $input['description'] = ['en'=>$request->description_en, 'ar' => $request->description_ar];

        if ($image = $request->file('image')) {

            if ($introduction->image != null && File::exists('assets/images/about/' . $introduction->image)) {

                unlink('assets/images/about/' . $introduction->image);
            }


            $file_name = 'introduction' . "." . $image->getClientOriginalExtension();
            $path = public_path('assets/images/about/' . $file_name);

            Image::make($image->getRealPath())->resize(500, null, function ($constraint) {

                $constraint->aspectRatio();
            })->save($path, 100);

            $input['image'] = $file_name;

        }
        $introduction->update($input);

        toastr()->success('تم التعديل بنجاح !');
        return back();

    }

    public function introductionRemoveImage(Request $request)
    {


        $introduction = Introduction::findOrFail($request->introduction_id);
        if (File::exists('assets/images/about/' . $introduction->image)) {

            unlink('assets/images/about/' . $introduction->image);
            $introduction->image = null;
            $introduction->save();

        }
        return true;
    }






    public function vv()
    {

        $vv= VV::first();
        return view('pages.backend.about.vv',compact('vv'));
    }

    public function updateVV(VVRequest $request)
    {

        $vv = VV::findOrFail($request->id);

        $input['vv'] = ['en'=>$request->vv_en, 'ar' => $request->vv_ar];

        if ($image = $request->file('image')) {

            if ($vv->image != null && File::exists('assets/images/about/' . $vv->image)) {

                unlink('assets/images/about/' . $vv->image);
            }


            $file_name = 'vv' . "." . $image->getClientOriginalExtension();
            $path = public_path('assets/images/about/' . $file_name);

            Image::make($image->getRealPath())->resize(500, null, function ($constraint) {

                $constraint->aspectRatio();
            })->save($path, 100);

            $input['image'] = $file_name;

        }
        $vv->update($input);

        toastr()->success('تم التعديل بنجاح !');
        return back();

    }

    public function vvRemoveImage(Request $request)
    {


        $vv = VV::findOrFail($request->vv_id);
        if (File::exists('assets/images/about/' . $vv->image)) {

            unlink('assets/images/about/' . $vv->image);
            $vv->image = null;
            $vv->save();

        }
        return true;
    }




    public function expertiseSummary()
    {

        $es= ES::first();
        return view('pages.backend.about.es',compact('es'));
    }

    public function updateExpertiseSummary(ESRequest $request)
    {

        $es = ES::findOrFail($request->id);

        $input['es'] = ['en'=>$request->es_en, 'ar' => $request->es_ar];

        if ($image = $request->file('image')) {

            if ($es->image != null && File::exists('assets/images/about/' . $es->image)) {

                unlink('assets/images/about/' . $es->image);
            }


            $file_name = 'expertiseSummary' . "." . $image->getClientOriginalExtension();
            $path = public_path('assets/images/about/' . $file_name);

            Image::make($image->getRealPath())->resize(500, null, function ($constraint) {

                $constraint->aspectRatio();
            })->save($path, 100);

            $input['image'] = $file_name;

        }
        $es->update($input);

        toastr()->success('تم التعديل بنجاح !');
        return back();

    }

    public function expertiseSummaryRemoveImage(Request $request)
    {


        $es = ES::findOrFail($request->es_id);
        if (File::exists('assets/images/about/' . $es->image)) {

            unlink('assets/images/about/' . $es->image);
            $es->image = null;
            $es->save();

        }
        return true;
    }




    public function imsPolicy()
    {

        $ims= IMSPolicy::first();
        return view('pages.backend.about.ims',compact('ims'));
    }

    public function updateimsPolicy(ImsPolicyRequest $request)
    {

        $ims = IMSPolicy::findOrFail($request->id);

        $input['imsPolicy'] = ['en'=>$request->imsPolicy_en, 'ar' => $request->imsPolicy_ar];
        $ims->update($input);

        $i= $ims->media()->count() +1;
        if($request->images && count($request->images) > 0){
            foreach ($request->images as $image){

                $fie_name = 'ims'.'_'.time().'_'.$i.'.'.$image->getClientOriginalExtension();
                $file_size= $image->getSize();
                $file_type = $image->getMimeType();
                $path = public_path('assets/images/about/'.$fie_name);
                Image::make($image->getRealPath())->resize(500,null,function ($constraint){
                    $constraint->aspectRatio();
                })->save($path,100);

                $ims->media()->create([
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

    public function imsPolicyRemoveImage(Request $request)
    {


        $ims = IMSPolicy::findOrFail($request->ims_id);
        $image = $ims->media()->whereId($request->image_id)->first();

        if (File::exists('assets/images/about/' . $ims->image)) {

            unlink('assets/images/about/' . $ims->image);


        }
        $image->delete();
        return true;

    }



    public function isoCertificates()
    {

        $iso=IsoCertificate::first();
        return view('pages.backend.about.isoCertificate',compact('iso'));
    }

    public function updateIsoCertificates(IsoCertificateRequest $request)
    {

        $iso = IsoCertificate::findOrFail($request->id);

        $input['iso'] = ['en'=>$request->iso_en, 'ar' => $request->iso_ar];
        $iso->update($input);

        $i= $iso->media()->count() +1;
        if($request->images && count($request->images) > 0){
            foreach ($request->images as $image){

                $fie_name = 'iso'.'_'.time().'_'.$i.'.'.$image->getClientOriginalExtension();
                $file_size= $image->getSize();
                $file_type = $image->getMimeType();
                $path = public_path('assets/images/about/'.$fie_name);
                Image::make($image->getRealPath())->resize(500,null,function ($constraint){
                    $constraint->aspectRatio();
                })->save($path,100);

                $iso->media()->create([
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

    public function isoCertificatesRemoveImage(Request $request)
    {


        $iso = IsoCertificate::findOrFail($request->iso_id);
        $image = $iso->media()->whereId($request->image_id)->first();

        if (File::exists('assets/images/about/' . $iso->image)) {

            unlink('assets/images/about/' . $iso->image);


        }
        $image->delete();
        return true;

    }


}
