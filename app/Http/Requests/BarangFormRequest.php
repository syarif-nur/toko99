<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BarangFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'nama_barang' => 'required',
            'img_url' => 'required!image!mimes:jpg,png,jpeg,gif,svg|max:2048',
        ];
    }
}
