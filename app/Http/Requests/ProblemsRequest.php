<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProblemsRequest extends FormRequest
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
            'type' => 'in:g-1,g-2,g-3,g-4,g-5,w-1,w-2,w-3',
            'image' => 'image|mimes:jpeg,jpg,png|max:4000',
            'display_name' => 'required|bool',
            'name' => 'required_if:display_name,1',
            'address' => 'required|string',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email je obavezno polje.',
            'type.in' => 'Izabrana opcija nije dobra.',
            'address.required' => 'Adresa je obavezno polje.',
            'name.required' => 'Ime je obavezno. Molimo Vas unesite vaše ime.',
            'display_name.required' => 'Ovo polje je obavezno.',
            'image.image' => 'Datoteka mora biti slika.',
            'image.mimes' => 'Datoteka mora biti slika.',
            'image.upload' => 'Datoteka mora biti slika.',
            'image.size' => 'Datoteka mora maximum 4mb.',
        ];
    }

    protected function getRedirectUrl()
    {
        $url = $this->redirector->getUrlGenerator();
        return $url->previous();
    }
}
