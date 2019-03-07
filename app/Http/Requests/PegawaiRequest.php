<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PegawaiRequest extends FormRequest
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
            'jabatan_id' => 'required',
            'nama' => 'required',
            'nomor_telepon' => 'required',
            'email' => 'required|email|unique:pegawai,email,'.$this->id,
            'alamat' => 'required'
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
            'jabatan_id.requied' => 'Jabatan perlu dipilih!',
            'nama.required' => 'Nama perlu diisi!',
            'nomor_telepon.required' => 'Nomor telepon perlu diisi!',
            'email.required' => 'Email perlu diisi!',
            'email.email' => 'Format email tidak sesuai!',
            'email.unique' => 'Email sudah ada!',
            'alamat.required' => 'Alamat perlu diisi!'
        ];
    }
}
