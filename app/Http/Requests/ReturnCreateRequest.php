<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReturnCreateRequest extends FormRequest
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
            'issueId'   => ['required'],
            'returnOn'  => ['required'],
            'inputQty'  => ['required'],
            'fines'     => ['required'],
            'remarks'   => ['required'],
        ];
    }
}
