<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class CreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
      public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'reenterpassword' => 'required|min:8',
            'start_date' => 'required|date|after:tomorrow',
            'end_date' => 'required|date|after:start_date',       //gt:start_date means end date must be grater then the 10 character.
            'phone_no' => 'required|digits:10|ends_with:0|starts_with:1',
          
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        $this->sendValidationFailedResponse($validator->errors(), 'Your request is missing details. Please try again.');
    }
}
