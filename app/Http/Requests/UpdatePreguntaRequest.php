<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePreguntaRequest extends FormRequest
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
            'pregunta' => 'required|string|min:2|max:45',
            'opcion_a' => 'required|string|min:2|max:45',
            'opcion_b' => 'required|string|min:2|max:45',
            'opcion_c' => 'required|string|min:2|max:45',
            'correcta' => 'required|in:a,b,c'
        ];
    }
}
