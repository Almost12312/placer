<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;


class FileRequest extends FormRequest
{

    //protected $stopOnFirstFailure = true;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'file' => 'mimes:jpg,pdf,png|required|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'file.required' => 'Файл не был передан',
            'file.mimes' => 'Недопустимый формат файла',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'errors' => $validator->errors()->messages()
            ])
        );
    }
}
