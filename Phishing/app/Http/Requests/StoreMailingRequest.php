<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMailingRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {

        return [
            'email' => [
                'required',
                'unique:users',
                'max:1000',
                'email'
            ],

            'message' => [
                'required',
                'max:10000',
                'min:1'
            ],

            'name' => [
                'required',
                'max:200',
                'min:1'
            ]
        ];
    }
}
