<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Request;

class UserEditRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
//            'name' => 'required',
//            //'email'      => 'required|email|unique:users,email,'.$user->id,
//            //'email' => 'required|email|unique:users,id,'.$request->get('id'),
//            'email' => 'required|email|unique:users,email,'.$request->get('id'),
//            'password' => 'min:6',
//            'password_confirmation' => 'min:6|same:pass'
        ];
    }
}
