@extends('layouts.main')

@section('title')
Dashboard &raquo; Pegawai | Aplikasi Manajemen Surat
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h3 class="card-title">
                    Tambah Pegawai
                </h3>
                <hr />
                <form action="/pegawai/simpan" method="post">
                    <input
                        type="hidden"
                        name="_token"
                        value="{{ csrf_token()}}"
                    />
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-xs-12">
                                <label for="jabatan-id">
                                    Jabatan
                                </label>
                                <select name="jabatan_id" class="form-control">
                                    @foreach($jabatan as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-xs-12">
                                <label for="nama">
                                    Nama Lengkap
                                </label>
                                <input
                                    type="text"
                                    name="nama"
                                    class="form-control {{ $errors->has('nama') ? ' is-invalid' : '' }}"
                                    value="{{ old('nama') }}"
                                />
                                @if($errors->has('nama'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-xs-12">
                                <label for="nomor-telepon">
                                    Nomor Telepon
                                </label>
                                <input
                                    type="number"
                                    name="nomor_telepon"
                                    class="form-control {{ $errors->has('nomor_telepon') ? ' is-invalid' : '' }}"
                                    value="{{ old('nomor_telepon') }}"
                                />
                                @if($errors->has('nomor_telepon'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nomor_telepon') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-xs-12">
                                <label for="email">
                                    Email
                                </label>
                                <input
                                    type="text"
                                    name="email"
                                    class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    value="{{ old('email') }}"
                                />
                                @if($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-xs-12">
                                <label for="alamat">
                                    Alamat
                                </label>
                                <textarea
                                    name="alamat"
                                    id=""
                                    class="form-control {{ $errors->has('alamat') ? ' is-invalid' : '' }}"
                                    rows="5"
                                >{{ old('alamat') }}</textarea>
                                @if($errors->has('alamat'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                </form>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
