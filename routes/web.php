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
    Route::group(['prefix' => 'pegawai',], function() {
        Route::group(['middleware' => 'role-super-admin'], function(){
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
        Route::group(['prefix' => 'api'], function(){
            Route::get('/cari-pegawai-dari-bagian/{jabatan_id}', [
                'uses' => 'PegawaiController@apiFindPegawaiByBagian',
                'as' => 'pegawai.api.cari.pegawai.dari.bagian'
            ]);
        });
    });
    Route::group([
        'prefix' => 'pengguna',
        'middleware' => 'role-super-admin'
    ], function() {
        Route::get('/', [
            'uses' => 'PenggunaController@index',
            'as' => 'pengguna'
        ]);
        Route::get('/form-tambah', [
            'uses' => 'PenggunaController@create',
            'as' => 'pengguna.form.create'
        ]);
        Route::get('/form-ubah/{id}', [
            'uses' => 'PenggunaController@edit',
            'as' => 'pengguna.form.edit'
        ]);
        Route::post('/simpan', [
            'uses' => 'PenggunaController@store',
            'as' => 'pengguna.store'
        ]);
        Route::put('/ubah/{id}', [
            'uses' => 'PenggunaController@update',
            'as' => 'pengguna.update'
        ]);
        Route::delete('/hapus/{id}', [
            'uses' => 'PenggunaController@destroy',
            'as' => 'pengguna.delete'
        ]);
    });
    Route::group(['prefix' => 'surat-masuk'], function() {
        Route::get('/', [
            'uses' => 'SuratMasukController@index',
            'as' => 'surat.masuk'
        ]);
        Route::get('/form-tambah', [
            'uses' => 'SuratMasukController@create',
            'as' => 'surat.masuk.form.create'
        ]);
        Route::get('/form-ubah/{id}', [
            'uses' => 'SuratMasukController@edit',
            'as' => 'surat.masuk.form.edit'
        ]);
        Route::get('/kirim-email/{id}', [
            'uses' => 'SuratMasukController@sendEmail',
            'as' => 'surat.masuk.send_email'
        ]);
        Route::post('/simpan', [
            'uses' => 'SuratMasukController@store',
            'as' => 'surat.masuk.store'
        ]);
        Route::put('/ubah/{id}', [
            'uses' => 'SuratMasukController@update',
            'as' => 'surat.masuk.update'
        ]);
        Route::delete('/hapus/{id}', [
            'uses' => 'SuratMasukController@destroy',
            'as' => 'surat.masuk.delete'
        ]);
    });
    Route::group(['prefix' => 'surat-keluar'], function() {
        Route::get('/', [
            'uses' => 'SuratKeluarController@index',
            'as' => 'surat.keluar'
        ]);
        Route::get('/form-tambah', [
            'uses' => 'SuratKeluarController@create',
            'as' => 'surat.keluar.form.create'
        ]);
        Route::get('/form-ubah/{id}', [
            'uses' => 'SuratKeluarController@edit',
            'as' => 'surat.keluar.form.edit'
        ]);
        Route::post('/simpan', [
            'uses' => 'SuratKeluarController@store',
            'as' => 'surat.keluar.store'
        ]);
        Route::put('/ubah/{id}', [
            'uses' => 'SuratKeluarController@update',
            'as' => 'surat.keluar.update'
        ]);
        Route::delete('/hapus/{id}', [
            'uses' => 'SuratKeluarController@destroy',
            'as' => 'surat.keluar.delete'
        ]);
    });
});
