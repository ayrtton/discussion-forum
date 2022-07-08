<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->user->id)],
            'role_id' => 'required',
        ];
    }
}
