<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {


        switch ($this->method()){

            case 'POST':
            {
                return [
                    //
                    'name_ar' => 'required|max:255',
                    'name_en' => 'required|max:255',
                    'job_ar' => 'required|max:255',
                    'job_en' => 'required|max:255',
                    'description_ar' => 'required',
                    'description_en' => 'required',
                    'image' => 'nullable|mimes:jpg,jpeg,png|max:5000'

                ];
            }

            case 'PATCH':
            {
                return [
                    'name_ar' => 'required|max:255',
                    'name_en' => 'required|max:255',
                    'job_ar' => 'required|max:255',
                    'job_en' => 'required|max:255',
                    'description_ar' => 'required',
                    'description_en' => 'required',
                    'image' => 'nullable|mimes:jpg,jpeg,png|max:5000'

                ];
            }

            default: break;


        }


    }

    public function attributes()
    {
        return [
            'name_ar' =>'name',
            'name_en' =>'name',
            'job_ar' => 'job',
            'job_en' => 'job',
            'description_ar' => 'description',
            'description_en' => 'description',
        ];
    }
}
