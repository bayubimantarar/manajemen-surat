@extends('layouts.main')

@section('title')
Dashboard &raquo; Jabatan | Aplikasi Manajemen Surat
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h3 class="card-title">
                    Tambah jabatan
                </h3>
                <hr />
                <form action="/jabatan/simpan" method="post">
                    <input
                        type="hidden"
                        name="_token"
                        value="{{ csrf_token()}}"
                    />
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-xs-12">
                                <label for="kode">
                                    Kode *
                                </label>
                                <input
                                    type="text"
                                    name="kode"
                                    class="form-control {{ $errors->has('kode') ? ' is-invalid' : '' }}"
                                    value="{{ old('kode') }}"
                                />
                                @if($errors->has('kode'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('kode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-xs-12">
                                <label for="nama">
                                    Nama *
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
                                <label for="posisi">
                                    Posisi
                                </label>
                                <select
                                    name="posisi"
                                    class="form-control"
                                    id="posisi"
                                >
                                    <option value="Pimpinan">
                                        Pimpinan
                                    </option>
                                    <option value="Non-pimpinan">
                                        Non-pimpinan
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <p>
                        <code>
                            Label bertanda (*) wajib diisi atau dipilih
                        </code>
                    </p>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-check"></i> Simpan
                    </button>
                </form>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
