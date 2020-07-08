<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomResquest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'RoomType' => ['required','max:255','min:8'],
            'Capacity' => ['required','max:255'],
            'BedOption' => ['required','max:255'],
            'Price' => ['required','max:255'],
            'View' => ['required','max:255'],
            'TotalRooms' => ['required','max:255'],
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
