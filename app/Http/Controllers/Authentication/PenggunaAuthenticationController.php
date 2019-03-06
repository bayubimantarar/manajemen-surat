<?php

namespace App\Http\Controllers\Authentication;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PenggunaAuthenticationRequest;

class PenggunaAuthenticationController extends Controller
{
    /**
     * Block comment
     */
    public function loginForm()
    {
        return view('authentication.pengguna.login_form');
    }

    /**
     * Block comment
     */
    public function login(
        PenggunaAuthenticationRequest $penggunaAuthenticationRequest
    ) {
        # code...
        $email = $penggunaAuthenticationRequest->email;
        $password = $penggunaAuthenticationRequest->password;

        $dataLogin = [
            'email' => $email,
            'password' => $password
        ];

        if(Auth::guard('pengguna')->attempt($dataLogin)){
            return redirect()
                ->intended();
        }

        return redirect('/autentikasi/form-login')
            ->withErrors([
                'notification' => 'Akun tidak ditemukan! Periksa kembali email atau kata sandi.'
            ]);
    }

    /**
     * Block comment
     */
    public function logout(Request $request)
    {
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect('/autentikasi/form-login');
    }
}
