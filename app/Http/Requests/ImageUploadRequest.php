<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageUploadRequest extends FormRequest
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
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5555',
        ];
    }

    public function messages()
    {
        return [
            'file.image' => 'Fayl formati noto\'g\'ri!',
            'file.required' => 'Rasmni kiriting!',
            'file.mimes' => 'Rasm formati jpg, png, jpeg, gif, svg bo\'lishi kerak!',
            'file.max' => 'Rasm hajmi 5555kb dan kam bo\'lishi kerak!'
        ];
    }
}
