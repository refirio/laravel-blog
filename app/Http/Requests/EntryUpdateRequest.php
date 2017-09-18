<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntryUpdateRequest extends FormRequest
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
        $id = $this->route()->parameter('id');
        return [
            'title' => 'required|max:255|unique:entries,title,' . $id,
            'body' => 'required'
        ];
    }
}
