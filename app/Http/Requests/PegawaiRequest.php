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
            'email' => 'required|email|unique:pegawai',
            'alamat' => 'required'
        ];
    }
}
