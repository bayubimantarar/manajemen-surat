<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class jabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        # set variable
        $kode = $request->kode;
        $nama = $request->nama;

        # set data array
        $jabatanData = [
            'kode' => $kode,
            'nama' => $nama
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
        $jabatanData = Jabatan::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $checkJabatanData = Jabatan::findOrFail($id);

        # set variable
        $kode = $request->kode;
        $nama = $request->nama;

        # set data array
        $jabatanData = [
            'kode' => $kode,
            'nama' => $nama
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

        $delete = Jabatan::destroy($id);

        return redirect('/jabatan');
    }
}
