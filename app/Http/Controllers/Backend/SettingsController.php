<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ProfileSettingsRequest;
use App\Models\Backend\Admin;
use App\Models\Backend\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class SettingsController extends Controller
{
    //
    public function account_settings()
    {
        return view('pages.backend.account_settings');
    }

    public function updateAccount(ProfileSettingsRequest $request)
    {


        try {

            if ($request->validated())
            {
                $data['name'] = ['ar' => $request->name_ar, 'en'=>$request->name_en] ;
                $data['email'] = $request->email;
                $data['mobile'] = $request->mobile;

                if ($request->password != '')
                {
                    $data['password'] = bcrypt($request->password);

                }

                if ($image = $request->file('user_image')) {


                    if (auth()->user()->user_image != null && File::exists('assets/images/users/' . auth()->user()->user_image)) {

                        unlink('assets/images/users/' .  auth()->user()->user_image);
                    }

                    $file_name = Str::slug($request->name_en) . "." . $image->getClientOriginalExtension();
                    $path = public_path('assets/images/users/' . $file_name);

                    \Intervention\Image\Facades\Image::make($image->getRealPath())->resize(300, null, function ($constraint) {

                        $constraint->aspectRatio();
                    })->save($path, 100);

                    $data['user_image'] = $file_name;

                }
                auth()->user()->update($data);

                toastr()->success(trans('تم التحديث بنجاح !'));
                return redirect()->back();

            }

        }catch (\Exception $ex){

            return redirect()->back()->with([
                'message' => $ex->getMessage(),
                'alert-type' => 'danger',

            ]);
        }
    }


    public function removeImage(Request $request)
    {


        $user = Admin::findOrFail($request->user_id);
        if (File::exists('assets/images/users/' . $user->user_image)) {

            unlink('assets/images/users/' . $user->user_image);
            $user->user_image = null;
            $user->save();

        }
        return true;
    }


    public function settings()
    {
        $settings = Settings::first();
        return view('pages.backend.settings',compact('settings'));
    }

    public function settingsUpdate(Request $request)
    {
        $settings = Settings::findOrFail($request->id);
        $input['office_name'] = $request->office_name;
        $input['office_abbreviation'] = $request->office_abbreviation;
        $input['mobile'] = $request->mobile;
        $input['email'] = $request->email;
        $input['address'] = $request->address;

        if ($logo = $request->file('logo')) {
            $file_name = Str::slug($request->office_name) . "." . $logo->getClientOriginalExtension();
            $request->file('logo')->move('assets/images/logo/' , $file_name);



            $input['logo'] = $file_name;
    }
        if ($logo = $request->file('logo2')) {
            $file_name = Str::slug($request->office_abbreviation) . "." . $logo->getClientOriginalExtension();
            $request->file('logo2')->move('assets/images/logo/' , $file_name);



            $input['logo1'] = $file_name;
    }

        if ($image = $request->file('loginImage')) {

            if ($settings->loginImage != null && File::exists('assets/backend/images/' . $settings->loginImage)) {

                unlink('assets/backend/images/' . $settings->loginImage);
            }


            $file_name = 'login' . "." . $image->getClientOriginalExtension();
            $path = public_path('assets/backend/images/' . $file_name);

            Image::make($image->getRealPath())->resize(1920, null, function ($constraint) {

                $constraint->aspectRatio();
            })->save($path, 100);

            $input['loginImage'] = $file_name;

        }
        $settings->update($input);
        toastr()->success(trans('dashboard.Updated_Successfully'));
        return back();


}

    public function removeLoginImage(Request $request)
    {


        $settings = Settings::findOrFail($request->login_id);
        if (File::exists('assets/backend/images/' . $settings->loginImage)) {

            unlink('assets/backend/images/' . $settings->loginImage);
            $settings->loginImage = null;
            $settings->save();

        }
        return true;
    }
}
