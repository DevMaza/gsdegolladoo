<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalificarExamenRequest extends FormRequest
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
        $examen = $this->route('examen');
        $examen->load(['preguntas']);
        return [
            'ids' => 'required|array|size:'.$examen->preguntas->count(),
            'values' => 'required|array|size:'.$examen->preguntas->count(),
            'ids.*' => 'required|in:'.$examen->preguntas->implode('id', ','),
            'values.*' => 'required|in:a,b,c',
        ];
    }
}
