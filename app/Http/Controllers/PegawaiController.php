<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Pegawai;
use Faker\Factory as Faker;
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
        $pegawai = Pegawai::orderByCreatedAtDesc()
            ->paginate(5);

        return view('pegawai.pegawai', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        # set all jabatan data
        $jabatan = Jabatan::all();

        # return to jabatan with array jabatan data
        return view('pegawai.form_create', compact('jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PegawaiRequest $pegawaiRequest)
    {
        # set faker
        $faker = Faker::create();

        # set variable
        $jabatanID = $pegawaiRequest->jabatan_id;
        $nama = $pegawaiRequest->nama;
        $nomorTelepon = $pegawaiRequest->nomor_telepon;
        $email = $pegawaiRequest->email;
        $alamat = $pegawaiRequest->alamat;
        $password = bcrypt($faker->password);

        # set array pegawai data
        $pegawaiData = [
            'jabatan_id' => $jabatanID,
            'nama' => $nama,
            'nomor_telepon' => $nomorTelepon,
            'email' => $email,
            'alamat' => $alamat,
            'password' => $password
        ];

        # store
        $storePegawai = Pegawai::create($pegawaiData);

        # return to pegawai
        return redirect('/pegawai')
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
        $checkPegawaiData = Pegawai::findOrFail($id);
        $pegawai = $checkPegawaiData;
        $jabatan = Jabatan::all();

        return view('pegawai.form_edit', compact('pegawai', 'jabatan'));
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
        $deletePegawai = Pegawai::destroy($id);

        return redirect('/pegawai')
            ->with([
                'notification' => 'Data berhasil dihapus!'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function apiFindPegawaiByBagian($jabatan_id)
    {
        $pegawai = Pegawai::where('jabatan_id', $jabatan_id)
            ->get();

        return response()
            ->json($pegawai);
    }
}
