<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnimRequest extends FormRequest
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
            'num.year' => 'required|integer|between:2014,2023',
            'num.cule' => 'required|integer|between:1,4',
        ];
    }
}
