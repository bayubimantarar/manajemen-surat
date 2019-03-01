<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Http\Requests\PegawaiRequest;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pegawai.pegawai');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.form_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PegawaiRequest $pegawaiRequest)
    {
        # set variable
        $jabatanID = $pegawaiRequest->jabatan_id;
        $nama = $pegawaiRequest->nama;
        $nomorTelepon = $pegawaiRequest->nomor_telepon;
        $email = $pegawaiRequest->email;
        $alamat = $pegawaiRequest->alamat;

        # set array pegawai data
        $pegawaiData = [
            'jabatan_id' => $jabatanID,
            'nama' => $nama,
            'nomor_telepon' => $nomorTelepon,
            'email' => $email,
            'alamat' => $alamat
        ];

        # store
        $storePegawai = Pegawai::create($pegawaiData);

        return redirect('/pegawai');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $checkPegawaiData = Pegawai::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PegawaiRequest $pegawaiRequest, $id)
    {
        # set variable
        $jabatanID = $pegawaiRequest->jabatan_id;
        $nama = $pegawaiRequest->nama;
        $nomorTelepon = $pegawaiRequest->nomor_telepon;
        $email = $pegawaiRequest->email;
        $alamat = $pegawaiRequest->alamat;

        # set array pegawai data
        $pegawaiData = [
            'jabatan_id' => $jabatanID,
            'nama' => $nama,
            'nomor_telepon' => $nomorTelepon,
            'email' => $email,
            'alamat' => $alamat
        ];

        # store
        $updatePegawai = Pegawai::where('id', $id)
            ->update($pegawaiData);

        return redirect('/pegawai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
