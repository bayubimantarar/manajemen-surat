<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Pengguna;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PenggunaAuthenticationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     * @test
     * @group penggunaAuthenticationTest
     */
    public function visitLoginForm()
    {
        $getLoginForm = $this
            ->get('/autentikasi/form-login')
            ->assertStatus(200);
    }

    /**
     * A basic feature test example.
     * @test
     * @group penggunaAuthenticationTest
     */
    public function attemptLogin()
    {
        $createPengguna = Factory(Pengguna::class)
            ->create();

        $attempLogin = $this
            ->post('/autentikasi/login', [
                'email' => 'bayubimantarar@gmail.com',
                'password' => 'secret'
            ])
            ->assertRedirect('/');
    }

    /**
     * A basic feature test example.
     * @test
     * @group penggunaAuthenticationTest
     */
    public function attemptLoginEmptyEmail()
    {
        $attempLogin = $this
            ->post('/autentikasi/login', [
                'email' => NULL,
                'password' => 'secret'
            ])
            ->assertSessionHasErrors()
            ->assertRedirect('/autentikasi/form-login');
    }

    /**
     * A basic feature test example.
     * @test
     * @group penggunaAuthenticationTest
     */
    public function attemptLoginInvalidEmailFormat()
    {
        $attempLogin = $this
            ->post('/autentikasi/login', [
                'email' => 'bayubimantara',
                'password' => 'secret'
            ])
            ->assertSessionHasErrors()
            ->assertRedirect('/autentikasi/form-login');
    }

    /**
     * A basic feature test example.
     * @test
     * @group penggunaAuthenticationTest
     */
    public function attemptLoginEmptyPassword()
    {
        $attempLogin = $this
            ->post('/autentikasi/login', [
                'email' => 'bayubimantarar@gmail.com',
                'password' => NULL
            ])
            ->assertSessionHasErrors()
            ->assertRedirect('/autentikasi/form-login');
    }

    /**
     * A basic feature test example.
     * @test
     * @group penggunaAuthenticationTest
     */
    public function attemptLoginInvalidEmailFormatandEmptyPassword()
    {
        $attempLogin = $this
            ->post('/autentikasi/login', [
                'email' => 'bayubimantara',
                'password' => NULL
            ])
            ->assertSessionHasErrors()
            ->assertRedirect('/autentikasi/form-login');
    }

    /**
     * A basic feature test example.
     * @test
     * @group penggunaAuthenticationTest
     */
    public function attemptLoginEmptyEmailandPassword()
    {
        $attempLogin = $this
            ->post('/autentikasi/login', [
                'email' => NULL,
                'password' => NULL
            ])
            ->assertSessionHasErrors()
            ->assertRedirect('/autentikasi/form-login');
    }

    /**
     * A basic feature test example.
     * @test
     * @group penggunaAuthenticationTest
     */
    public function logout()
    {
        $createPengguna = Factory(Pengguna::class)
            ->create();

        $logout = $this
            ->post('/autentikasi/logout')
            ->assertRedirect('/autentikasi/form-login');
    }
}
