<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookCreateRequest extends FormRequest
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
            'book_id'       => 'required|unique:books',
            'title'         => ['required'],
            'description'   => ['required'],
            'author'        => ['required'],
            'quantity'      => ['required'],
            'categories'    => ['required'],
            'image'         => 'nullable|image|file|max:5000'
        ];
    }
}
