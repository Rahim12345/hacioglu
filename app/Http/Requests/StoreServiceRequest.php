<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
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
            'photo' => \request('action') == 'create' ? 'required|image' : 'nullable|image',
            'name_az' => 'required|max:200',
            'name_en' => 'required|max:200',
            'name_ru' => 'required|max:200',
            'text_az' => 'required|max:10000',
            'text_en' => 'required|max:10000',
            'text_ru' => 'required|max:10000',
            'before_photo' => \request('action') == 'create' ? 'required|image' : 'nullable|image',
            'after_photo' => \request('action') == 'create' ? 'required|image' : 'nullable|image',
        ];
    }

    public function attributes()
    {
        return [
            'photo' => 'Örtük şəkli',
            'name_az' => 'Ad(az)',
            'name_en' => 'Ad(en)',
            'name_ru' => 'Ad(ru)',
            'text_az' => 'Mətn(az)',
            'text_en' => 'Mətn(en)',
            'text_ru' => 'Mətn(ru)',
            'before_photo' => 'Əvvəl',
            'after_photo' => 'Sonra',
        ];
    }
}
