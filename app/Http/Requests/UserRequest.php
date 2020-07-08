<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'password' => ['required','max:255','min:8'],
            'name' => ['required','max:255','min:5'],
            'email' => 'required','max:255','email','unique:users,email'.$this->id,
        ];
    }

    public function attributes()
    {
        return [
            'password' => 'Password',
            'name' => 'Name',
            'email' => 'Email'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'name' => preg_replace("/^['s　']+/u", '', $this->name),
            'email' => preg_replace("/^['s　']+/u", '', $this->email),
            'password' => preg_replace("/^['s　']+/u", '', $this->password),
        ]);
    }

}
