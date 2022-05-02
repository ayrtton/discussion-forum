<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTagRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'title' => 'required|unique:tags',
        ];
    }
}
