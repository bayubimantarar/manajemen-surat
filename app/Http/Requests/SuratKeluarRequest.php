<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuratKeluarRequest extends FormRequest
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
            'tujuan' => 'required',
            'jabatan_id' => 'required',
            'pegawai_id' => 'required',
            'perihal' => 'required',
            'tanggal_kirim' => 'required',
            'lampiran' => 'mimes:pdf'
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
            'tujuan.required' => 'Tujuan perlu diisi!',
            'jabatan_id.required' => 'Pilih salah satu tujuan bagian!',
            'pegawai_id.required' => 'Pilih salah satu tujuan pegawai!',
            'perihal.required' => 'Perihal perlu diisi!',
            'tanggal_kirim.required' => 'Tanggal kirim perlu diisi!',
            'lampiran.mimes' => 'Format lampiran harus berformat: pdf!'
        ];
    }
}
