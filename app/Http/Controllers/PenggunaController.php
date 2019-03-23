<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use App\Http\Requests\PenggunaRequest;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengguna = Pengguna::orderBy('created_at', 'desc')
            ->paginate(5);

        return view('pengguna.pengguna', compact('pengguna'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengguna.form_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PenggunaRequest $penggunaRequest)
    {
        # set variable
        $email = $penggunaRequest->email;
        $password = $penggunaRequest->password;
        $role = $penggunaRequest->role;
        $encryptPassword = bcrypt($password);

        # set array
        $data = [
            'email' => $email,
            'password' => $encryptPassword,
            'role' => $role
        ];

        # store pengguna
        $storePengguna = Pengguna::create($data);

        return redirect('/pengguna')
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
        $checkPengguna = Pengguna::findOrFail($id);

        $pengguna = Pengguna::find($id);

        return view('pengguna.form_edit', compact('pengguna'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PenggunaRequest $penggunaRequest, $id)
    {
        # set variable
        $email = $penggunaRequest->email;
        $password = $penggunaRequest->password;
        $role = $penggunaRequest->role;

        if(!empty($password)) {
            $encryptPassword = bcrypt($password);

            # set array
            $data = [
                'email' => $email,
                'password' => $encryptPassword,
                'role' => $role
            ];

            # update pengguna
            $updatePengguna = Pengguna::where('id', $id)
                ->update($data);
        }else{
            # set array
            $data = [
                'email' => $email,
                'role' => $role
            ];

            # update pengguna
            $updatePengguna = Pengguna::where('id', $id)
                ->update($data);
        }

        return redirect('/pengguna')
            ->with([
                'notification' => 'Data berhasil diubah!'
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
        $checkPengguna = Pengguna::findOrFail($id);

        $deletePengguna = Pengguna::destroy($id);

        return redirect('/pengguna')
            ->with([
                'notification' => 'Data berhasil dihapus!'
            ]);
    }
}
