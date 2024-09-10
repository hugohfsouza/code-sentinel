<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalvarClienteRequest extends FormRequest
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
            'nome'      => 'required|max:255',
            'endereco'   => 'required|max:255',
            'token_acesso'   => 'required|max:255',
        ];
    }

    public function messages (): array
    {
        return [
            'nome.required' => 'Por favor, preencha este campo',
            'cliente.required' => 'Por favor, preencha este campo',
            'token_acesso.required' => 'Por favor, preencha este campo',
        ];
    }
}
