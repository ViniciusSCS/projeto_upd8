<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
        $cliente = $this->route('id');

        return [
            'nome' => 'required|string|max:50',
            'cpf' => [
                'required',
                'string',
                'max:14',
                'min:14',
                Rule::unique('clientes')->ignore($cliente)
            ],
            'sexo' => 'required|string',
            'data_nascimento' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório.',
            'string' => 'O campo :attribute deve ser uma string.',
            'max' => 'O campo :attribute deve ter no máximo :max.',
            'unique' => 'O campo :attribute deve ser único.',
        ];
    }
}
