<?php

namespace App\Http\Controllers\Authentication;

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

        return redirect('/autentikasi/form-login');
    }
}
