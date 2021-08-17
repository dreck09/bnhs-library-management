<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotReturnRequest extends FormRequest
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
            'issueId'         => ['required'],
            'reportOn'        => ['required'],
            'input_qty'       => ['required'],
            'input_fines'     => ['required'],
            'input_remarks'   => ['required'],
        ];
    }
}
