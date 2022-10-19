<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileRequest extends FormRequest
{

    protected $redirectRoute = 'authorization';
    protected $stopOnFirstFailure = true;

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
            'original_name' => 'required|unique:posts|max:255',
            'size_bytes' => 'required',
            'location' => 'required',
            'new_hash_name' => 'required',
            'extension' => 'required',
            'loaded_by' => 'loaded_by'
        ];
    }

    public function messages()
    {
        return [
            'original_name.required' => 'A original_name is required',
            'size_bytes.required' => 'A size_bytes is required',
        ];
    }
}
