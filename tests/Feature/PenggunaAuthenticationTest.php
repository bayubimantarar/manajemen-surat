<?php

namespace Tests\Feature;

use Tests\TestCase;
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
        $getLoginForm = $this
            ->post('/autentikasi/login', [
                'email' => 'bayubimantarar@gmail.com',
                'password' => 'secret'
            ])
            ->assertStatus(302);
    }

    /**
     * A basic feature test example.
     * @test
     * @group penggunaAuthenticationTest
     */
    public function attemptLoginEmptyEmail()
    {
        $getLoginForm = $this
            ->post('/autentikasi/login', [
                'email' => NULL,
                'password' => 'secret'
            ])
            ->assertSessionHasErrors()
            ->assertStatus(302);
    }

    /**
     * A basic feature test example.
     * @test
     * @group penggunaAuthenticationTest
     */
    public function attemptLoginInvalidEmailFormat()
    {
        $getLoginForm = $this
            ->post('/autentikasi/login', [
                'email' => 'bayubimantara',
                'password' => 'secret'
            ])
            ->assertSessionHasErrors()
            ->assertStatus(302);
    }

    /**
     * A basic feature test example.
     * @test
     * @group penggunaAuthenticationTest
     */
    public function attemptLoginEmptyPassword()
    {
        $getLoginForm = $this
            ->post('/autentikasi/login', [
                'email' => 'bayubimantarar@gmail.com',
                'password' => NULL
            ])
            ->assertSessionHasErrors()
            ->assertStatus(302);
    }
}
