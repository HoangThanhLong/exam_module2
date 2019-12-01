<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateStaffRequest extends FormRequest
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
        return [
            'name'=>'required',
            'birthday'=>'required',
            'phone'=>'required|numeric',
            'idCard'=>'required|numeric',
            'email'=>'required|email',
            'address'=>'required'
        ];
    }
    public function messages()
    {
        return[
            'name.required' => 'Không được để trống',
            'birthday.required' => 'Không được để trống',
            'phone.required' => 'Không được để trống',
            'phone.numeric' => 'Không đúng định dạng số',
            'idCard.required' => 'Không được để trống',
            'idCard.numeric' => 'Không đúng định dạng số',
            'email.required' => 'Không được để trống',
            'email.email' => 'Đúng định dạng email',
            'address.required' => 'Không được để trống'
        ];
    }
}
