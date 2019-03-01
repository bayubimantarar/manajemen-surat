<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'autentikasi'], function(){
    Route::get('/form-login', [
        'uses' => 'Authentication\PenggunaAuthenticationController@loginForm',
        'as' => 'autentikasi.login.form'
    ]);
    Route::post('/login', [
        'uses' => 'Authentication\PenggunaAuthenticationController@login',
        'as' => 'autentikasi.login'
    ]);
    Route::post('/logout', [
        'uses' => 'Authentication\PenggunaAuthenticationController@logout',
        'as' => 'autentikasi.logout'
    ]);
});

Route::group(['middleware' => 'auth:pengguna'], function(){
    Route::group(['prefix' => 'jabatan'], function(){
        Route::get('/', [
            'uses' => 'jabatanController@index',
            'as' => 'jabatan'
        ]);
        Route::get('/form-tambah', [
            'uses' => 'jabatanController@create',
            'as' => 'jabatan.form.create'
        ]);
        Route::get('/form-ubah/{id}', [
            'uses' => 'jabatanController@edit',
            'as' => 'jabatan.form.edit'
        ]);
        Route::post('/simpan', [
            'uses' => 'jabatanController@store',
            'as' => 'jabatan.store'
        ]);
        Route::put('/ubah/{id}', [
            'uses' => 'jabatanController@update',
            'as' => 'jabatan.update'
        ]);
        Route::delete('/hapus/{id}', [
            'uses' => 'jabatanController@destroy',
            'as' => 'jabatan.delete'
        ]);
    });
});
