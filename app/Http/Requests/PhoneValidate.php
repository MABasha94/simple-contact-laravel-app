<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PhoneValidate extends FormRequest
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
            'phone' => ['required',
            Rule::unique('phones')->ignore($this->route('phone'))->where(function ($query) {
                return $query->whereNull('deleted_at');
            }),
            'digits:11',
            'starts_with:010,011,012',
        ],
        ];
    }
}
