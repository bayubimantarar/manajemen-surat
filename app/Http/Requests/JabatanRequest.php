<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JabatanRequest extends FormRequest
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
            'kode' => 'required|unique:jabatan,kode,'.$this->id,
            'nama' => 'required|unique:jabatan,nama,'.$this->id
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'kode.required' => 'Kode perlu diisi!',
            'kode.unique' => 'Kode sudah ada!',
            'nama.required' => 'Nama perlu diisi!',
            'nama.unique' => 'Nama sudah ada!'
        ];
    }
}
