<?php
/*
 * Projeto: CGN-VIDEO-PORTAL
 * Arquivo: StoreUserRequest.php
 * ---------------------------------------------------------------------
 * Autor: Leonardo Nascimento
 * E-mail: leonardo.nascimento21@gmail.com
 * ---------------------------------------------------------------------
 * Data da criação: 19/05/2021 4:44:27 pm
 * Last Modified:  24/05/2021 3:29:08 pm
 * Modified By: Leonardo Nascimento - <leonardo.nascimento21@gmail.com> / MAC OS
 * ---------------------------------------------------------------------
 * Copyright (c) 2021 Leo
 * HISTORY:
 * Date      	By	Comments
 * ----------	---	---------------------------------------------------------
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class StoreUserRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'unique:users,email,'.$this->usuario,
            'cpf' => 'numeric|min:11|unique:user_profiles,cpf,'.$this->usuario.',user_id',
            'status_user' => 'required',
            'city' => 'required',
            'telephone' => 'min:11|unique:user_profiles,telephone,'.$this->usuario.',user_id',
            'whatsapp' => 'unique:user_profiles,telephone,'.$this->usuario.',user_id',
        ];
    }

    public function messages()
    {
        return [
            'telephone.unique' => 'O telefone informado já foi registrado por outro usuário',
            'whatsapp.unique' => 'O WhatsApp informado já foi registrado por outro usuário',
            'email.unique' => 'O E-mail informado já foi registrado por outro usuário',
            'cpf.unique' => 'O CPF informado já foi registrado por outro usuário',
        ];
    }
}
