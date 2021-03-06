<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntryStoreRequest extends FormRequest
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
            'title' => 'required|max:255|unique:entries',
            'body' => 'required'
        ];
    }

    /**
     * Get the attributes names.
     *
     * @return array
     */
    public function attributes() {
        return [
            'body' => '本文',
        ];
    }
}
