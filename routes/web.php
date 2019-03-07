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
    Route::get('/', [
        'uses' => 'DashboardController@index',
        'as' => 'dashboard'
    ]);
    Route::group([
        'prefix' => 'jabatan',
        'middleware' => 'role-super-admin'
    ], function() {
        Route::get('/', [
            'uses' => 'JabatanController@index',
            'as' => 'jabatan'
        ]);
        Route::get('/form-tambah', [
            'uses' => 'JabatanController@create',
            'as' => 'jabatan.form.create'
        ]);
        Route::get('/form-ubah/{id}', [
            'uses' => 'JabatanController@edit',
            'as' => 'jabatan.form.edit'
        ]);
        Route::post('/simpan', [
            'uses' => 'JabatanController@store',
            'as' => 'jabatan.store'
        ]);
        Route::put('/ubah/{id}', [
            'uses' => 'JabatanController@update',
            'as' => 'jabatan.update'
        ]);
        Route::delete('/hapus/{id}', [
            'uses' => 'JabatanController@destroy',
            'as' => 'jabatan.delete'
        ]);
    });
    Route::group([
            'prefix' => 'pegawai',
            'middleware' => 'role-super-admin'
        ], function() {
            Route::get('/', [
                'uses' => 'PegawaiController@index',
                'as' => 'pegawai'
            ]);
            Route::get('/form-tambah', [
                'uses' => 'PegawaiController@create',
                'as' => 'pegawai.form.create'
            ]);
            Route::get('/form-ubah/{id}', [
                'uses' => 'PegawaiController@edit',
                'as' => 'pegawai.form.edit'
            ]);
            Route::post('/simpan', [
                'uses' => 'PegawaiController@store',
                'as' => 'pegawai.store'
            ]);
            Route::put('/ubah/{id}', [
                'uses' => 'PegawaiController@update',
                'as' => 'pegawai.update'
            ]);
            Route::delete('/hapus/{id}', [
                'uses' => 'PegawaiController@destroy',
                'as' => 'pegawai.delete'
            ]);
    });
});
