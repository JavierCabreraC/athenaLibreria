<?php

namespace App\Http\Requests\Productos;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EnciclopediaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'producto_codigo' => ['required', 'string', 'exists:productos,codigo', 
            Rule::unique('revistas', 'producto_codigo')->ignore($this->route('revista'), 'producto_codigo')],
            'volumen' => ['required', 'integer'],
            'edicion' => ['required', 'integer'],
        ];
    }
}
