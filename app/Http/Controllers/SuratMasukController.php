<?php

namespace App\Http\Controllers;

use Mail;
use Crypt;
use Storage;
use Carbon\Carbon;
use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\SuratMasuk;
use App\Mail\SuratMasukMail;
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
        $suratMasuk = SuratMasuk::with('jabatan')
            ->orderBy('created_at', 'desc')
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

        $findPegawaiEmail = Pegawai::find($pegawaiID);
        $pegawaiEmail = $findPegawaiEmail->email;
        $pegawaiName = $findPegawaiEmail->nama;

        if (!empty($lampiranFile)) {
            $lampiranFileName = $lampiranFile->getClientOriginalName();
            $lampiranFileExtension = $lampiranFile->getClientOriginalExtension();

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
                ->putFileAs(
                    'documents/surat-masuk',
                    $lampiranFile,
                    $lampiranFileName
                );

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

        Mail::to('bayubimantarar@gmail.com')
            ->send(new SuratMasukMail($pegawaiName));

        return redirect('/surat-masuk')
            ->with([
                'notification' => 'Data berhasil disimpan!'
            ]);
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
        $checkSuratMasuk = SuratMasuk::findOrFail($id);
        $suratMasuk = $checkSuratMasuk;
        $jabatan = Jabatan::all();

        return view('surat_masuk.form_edit', compact('suratMasuk', 'jabatan'));
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
            $lampiranFileExtension = $lampiranFile->getClientOriginalExtension();

            $checkOldLampiranFile = SuratMasuk::find($id);
            $oldLampiranFile = $checkOldLampiranFile->lampiran;

            if(!empty($oldLampiranFile)){
                $deleteLampiranFile = Storage::disk('uploads')
                    ->delete('documents/surat-masuk/'.$oldLampiranFile);

                $uploadFileLampiran = Storage::disk('uploads')
                    ->putFileAs(
                        'documents/surat-masuk',
                        $lampiranFile,
                        $lampiranFileName
                    );
            }else{
                $uploadFileLampiran = Storage::disk('uploads')
                    ->putFileAs(
                        'documents/surat-masuk',
                        $lampiranFile,
                        $lampiranFileName
                    );
            }

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

            $storeSuratMasuk = SuratMasuk::where('id', $id)
                ->update($data);
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

            $storeSuratMasuk = SuratMasuk::where('id', $id)
                ->update($data);
        }

        return redirect('/surat-masuk')
            ->with([
                'notification' => 'Data berhasil disimpan!'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $findSuratMasuk = SuratMasuk::findOrFail($id);

        $suratMasuk = SuratMasuk::find($id);

        # check lampiran file if exist
        if (!empty($suratMasuk->lampiran)) {
            $deleteLampiranFile = Storage::disk('uploads')
                ->delete('documents/surat-masuk/'.$suratMasuk->lampiran);
        }

        $deleteSuratMasuk = SuratMasuk::destroy($id);

        return redirect('/surat-masuk')
            ->with([
                'notification' => 'Data berhasil dihapus!'
            ]);
    }
}
