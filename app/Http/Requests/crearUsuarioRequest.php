<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class crearUsuarioRequest extends FormRequest
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
            'name' => 'required|string|max:15',
            'username' => 'required|max:15|unique:users',
            'email' => 'required|string|email|max:40|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ];
    }
}
