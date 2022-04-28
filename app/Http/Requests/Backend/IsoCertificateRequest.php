<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class IsoCertificateRequest extends FormRequest
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
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'iso_ar' => 'nullable',
                    'iso_en' => 'nullable',
                    'image' => 'nullable|mimes:jpg,jpeg,png|max:5000'

                ];
            }

            default: break;


        }
    }

    public function attributes()
    {
        return [

            'iso_ar' => 'certificate description',
            'iso_en' => 'certificate description',
        ];
    }
}
