<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTasksRequest extends FormRequest
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
            'title' => 'required|string|max:255'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Favor preencher o título',
            'title.max' => 'O campo título aceita no máximo 255 caracteres'
        ];
    }
}
