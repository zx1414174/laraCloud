<?php

namespace App\Http\Requests\Auth\Login;

use App\Rules\String\Phone;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
				'required','string',new Phone(),'max:255'
			],
			'password' => 'required|string|min:6|confirmed',
        ];
    }
}
