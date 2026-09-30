<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminLoginRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email je obavezno polje.',
            'email.email' => 'Adresa e-poste mora biti vazeca.',
            'password.required' => 'Lozinka je obavezno polje.',
            'password.string' => 'Lozinka mora biti tipa string.',
        ];
    }
}
