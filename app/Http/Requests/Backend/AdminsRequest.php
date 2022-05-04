<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class AdminsRequest extends FormRequest
{
    /**
     * @var mixed
     */

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

                    'name_ar'  => 'required|max:255' ,
                    'name_en'  => 'required|max:255' ,
                    'email'  => 'required|max:255|unique:admins,email',
                    'mobile'  => 'required|numeric|unique:admins,mobile' ,
                    'role_id' =>'required',
                    'password' =>'nullable|min:8',

                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [

                    'name_ar'  => 'required|max:255' ,
                    'name_en'  => 'required|max:255' ,
                    'email'  => 'required|max:255|unique:admins,email,'.$this->id ,
                    'mobile'  => 'required|numeric|unique:admins,mobile,'.$this->id ,
                    'role_id' =>'required',
                    'password' =>'nullable|min:8',

                ];
            }

            default: break;


        }
    }
}
