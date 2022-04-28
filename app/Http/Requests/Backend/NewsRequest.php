<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {


        switch ($this->method()){

            case 'POST':
            {
                return [
                    //
                    'title_ar' => 'required|max:255',
                    'title_en' => 'required|max:255',
                    'content_ar' => 'required',
                    'content_en' => 'required',
                    'image' => 'nullable|mimes:jpg,jpeg,png|max:5000'

                ];
            }

            case 'PATCH':
            {
                return [
                    'title_ar' => 'required|max:255',
                    'title_en' => 'required|max:255',
                    'content_ar' => 'required',
                    'content_en' => 'required',
                    'image' => 'nullable|mimes:jpg,jpeg,png|max:5000'

                ];
            }

            default: break;


        }


    }

    public function attributes()
    {
        return [
            'title_ar' =>'title',
            'title_en' =>'title',
            'content_ar' => 'content',
            'content_en' => 'content',
        ];
    }
}
