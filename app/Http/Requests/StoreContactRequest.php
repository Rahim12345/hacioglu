<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'telfon'=>'required|max:30',
            'telfon_oxunaqli'=>'required|max:30',
            'email'=>'required|email',
            'address_az'=>'required|max:200',
            'address_en'=>'required|max:200',
            'address_ru'=>'required|max:200',
            'youtube_link'=>'required|max:1000',
            'lat'=>'required|numeric',
            'long'=>'required|numeric',
        ];
    }

    public function attributes(): array
    {
        return [
            'telfon'=>'Telfon',
            'telfon_oxunaqli'=>'Telfon oxunaqlı',
            'email'=>'Email',
            'address_az'=>'Ünvan(az)',
            'address_en'=>'Ünvan(en)',
            'address_ru'=>'Ünvan(ru)',
            'youtube_link'=>'Youtube tanıtım linki',
            'lat'=>'Coğrafi enlik',
            'long'=>'Coğrafi uzunluq',
        ];
    }
}
