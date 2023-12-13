<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        if (request()->routeIs('user.login')) {
            return [
                'email'         => 'required|string|email|max:255',
                'password'      => 'required|min:8',
            ];
        } else if (request()->routeIs('user.store')) {
            return [
                'firstname' => 'required|string|max:255',
                'lastname'  => 'required|string|max:255',
                'email'     => 'required|string|email|unique:users,email|max:255',
                'password'  => 'required|min:8|confirmed',
            ];
        } else if (request()->routeIs('user.update')) {
            return [
                'name'          => 'required|string|max:255',
            ];
        } else if (request()->routeIs('user.email')) {
            return [
                'email'         => 'required|string|email|max:255',
            ];
        } else if (request()->routeIs('user.password')) {
            return [
                'password'      => 'required|confirmed|min:8',
            ];
        } else if (request()->routeIs('user.image') || request()->routeIs('profile.image')) {
            return [
                'image'      => 'required|image|mimes:jpg,bmp,png|max:2048',
            ];
        }
    }
}