<?php

namespace App\Http\Controllers;

use Storage;
use App\Models\Jabatan;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use App\Http\Requests\SuratMasukRequest;

class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suratMasuk = SuratMasuk::orderBy('created_at', 'desc')
            ->paginate(5);

        return view('surat_masuk.surat_masuk', compact('suratMasuk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan = Jabatan::all();

        return view('surat_masuk.form_create', compact('jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SuratMasukRequest $suratMasukRequest)
    {
        # set variable
        $nomor = $suratMasukRequest->nomor;
        $asal = $suratMasukRequest->asal;
        $jabatanID = $suratMasukRequest->jabatan_id;
        $pegawaiID = $suratMasukRequest->pegawai_id;
        $perihal = $suratMasukRequest->perihal;
        $tanggalTerima = $suratMasukRequest->tanggal_terima;
        $lampiranFile = $suratMasukRequest->lampiran;

        if (!empty($lampiranFile)) {
            $lampiranFileName = $lampiranFile->getClientOriginalName();

            # set array data
            $data = [
                'jabatan_id' => $jabatanID,
                'pegawai_id' => $pegawaiID,
                'nomor' => $nomor,
                'asal' => $asal,
                'perihal' => $perihal,
                'tanggal_terima' => $tanggalTerima,
                'lampiran' => $lampiranFileName
            ];

            $uploadFileLampiran = Storage::disk('uploads')
                ->put($lampiranFileName, $lampiranFile);

            $storeSuratMasuk = SuratMasuk::create($data);
        }else{
            # set array data
            $data = [
                'jabatan_id' => $jabatanID,
                'pegawai_id' => $pegawaiID,
                'nomor' => $nomor,
                'asal' => $asal,
                'perihal' => $perihal,
                'tanggal_terima' => $tanggalTerima
            ];

            $storeSuratMasuk = SuratMasuk::create($data);
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SuratMasukRequest $suratMasukRequest, $id)
    {
        //
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
