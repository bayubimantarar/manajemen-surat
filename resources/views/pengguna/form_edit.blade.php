@extends('layouts.main')

@section('title')
Dashboard &raquo; Pengguna | Aplikasi Manajemen Surat
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h3 class="card-title">
                    Tambah Pengguna
                </h3>
                <hr />
                <form action="/pengguna/ubah/{{ $pengguna->id }}" method="post">
                    <input
                        type="hidden"
                        name="_token"
                        value="{{ csrf_token()}}"
                    />
                    <input
                        type="hidden"
                        name="_method"
                        value="put"
                    />
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
                                    value="{{ $pengguna->email }}"
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
                            <div class="col-lg-5 col-md-5 col-xs-12">
                                <label for="role">
                                    Role
                                </label>
                                <select name="role" class="form-control">
                                    <option
                                        value="Super Admin"
                                        {{ $pengguna->role == 'Super Admin' ? 'selected' : '' }}
                                    >
                                        Super Admin
                                    </option>
                                    <option
                                        value="Sekretaris"
                                        {{ $pengguna->role == 'Sekretaris' ? 'selected' : '' }}
                                    >
                                        Sekretaris
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-xs-12">
                                <label for="password">
                                    Password
                                </label>
                                <input
                                    type="password"
                                    name="password"
                                    class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                />
                                @if($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-xs-12">
                                <label for="confirmation-password">
                                    Konfirmasi password
                                </label>
                                <input
                                    type="password"
                                    name="password_confirmation"
                                    class="form-control {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                    value="{{ old('password_confirmation') }}"
                                />
                                @if($errors->has('password_confirmation'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <p>
                        <code>
                            Kosongkan Password dan Konfirmasi password jika tidak ingin merubah password
                        </code>
                    </p>
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
