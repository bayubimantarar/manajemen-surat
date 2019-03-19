<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use App\Http\Requests\JabatanRequest;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jabatan = Jabatan::orderByCreatedAtDesc()
            ->paginate(5);

        return view('jabatan.jabatan', compact('jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jabatan.form_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JabatanRequest $jabatanRequest)
    {
        # set variable
        $kode = $jabatanRequest->kode;
        $nama = $jabatanRequest->nama;
        $posisi = $jabatanRequest->posisi;

        # set data array
        $jabatanData = [
            'kode' => $kode,
            'nama' => $nama,
            'posisi' => $posisi
        ];

        $storeJabatan = Jabatan::create($jabatanData);

        return redirect('/jabatan');
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
        # check jabatan and get jabatan data if exist
        $jabatan = Jabatan::findOrFail($id);

        return view('jabatan.form_edit', compact('jabatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JabatanRequest $jabatanRequest, $id)
    {
        $checkJabatanData = Jabatan::findOrFail($id);

        # set variable
        $kode = $jabatanRequest->kode;
        $nama = $jabatanRequest->nama;
        $posisi = $jabatanRequest->posisi;

        # set data array
        $jabatanData = [
            'kode' => $kode,
            'nama' => $nama,
            'posisi' => $posisi
        ];

        $updateJabatan = Jabatan::where('id', $id)
            ->update($jabatanData);

        return redirect('/jabatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $checkJabatanData = Jabatan::findOrFail($id);

        $deleteJabatan = Jabatan::destroy($id);

        return redirect('/jabatan')
            ->with([
                'notification' => 'Data berhasil dihapus!'
            ]);
    }
}
