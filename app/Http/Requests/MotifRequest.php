<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MotifRequest extends FormRequest
{
    /**
     * Summary of authorize
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Summary of rules
     * @return string[]
     */
    public function rules()
    {
        return [
            'description' => 'required|string|max:30',
        ];
    }
}
