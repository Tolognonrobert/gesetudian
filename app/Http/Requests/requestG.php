<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class requestG extends FormRequest
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
            "nom"=>"required|alpha|min:2",
            "prenom"=>"required|alpha|min:2",
            "pseudo"=>"required|alpha|min:2",
            "email"=>"required|email",
            "password"=>"required|min:8|alpha_num",
            "cpassword"=>"required|same:password|min:8|alpha_num"

        ];
    }

    /**
     * Get the messages  that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            "email"=>"email invalide",
            "min"=>"trop court",
            "required"=>"ce champs est vide",
            "alpha_num"=>"ce champs doit etre alpha_num ",
            "alpha"=>" ce champs doit etre alpha",
            "same"=>"mot de passe non identique"

        ];
    }
}
