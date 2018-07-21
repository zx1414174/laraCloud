<?php

namespace App\Http\Requests\Auth\Register;

use App\Rules\String\Phone;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'verification_code' => 'required|string',
            'phone' => [
                'required','string',new Phone(),'max:255','unique:users'
            ],
            'password' => 'required|string|min:6|confirmed',
        ];
    }
    public function messages()
    {
        return [
            'phone.unique'=> '手机'
        ];
    }
}
