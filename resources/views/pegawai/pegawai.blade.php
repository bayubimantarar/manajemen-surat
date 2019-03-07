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
                    Pegawai
                </h3>
                <hr />
                @if(session('notification'))
                    <div
                        class="alert alert-success alert-dismissible fade show"
                        role="alert"
                    >
                        {{ session('notification') }}
                        <button
                            type="button"
                            class="close"
                            data-dismiss="alert"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <p>
                    <a href="/pegawai/form-tambah" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Tambah pegawai
                    </a>
                </p>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nama Lengkap</th>
                                <th scope="col">Nomor Telepon</th>
                                <th scope="col">Email</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pegawai as $item)
                                <tr>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->nomor_telepon }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>
                                        <a
                                            href="/pegawai/form-ubah/{{ $item->id }}"
                                            class="btn btn-sm btn-warning text-white"
                                        >
                                            <i class="fa fa-edit"></i> Ubah
                                        </a>
                                        <a
                                            href="/pegawai/hapus/{{ $item->id }}"
                                            class="btn btn-sm btn-danger"
                                            onclick="event.preventDefault();
                                            document.getElementById('delete-form').submit();"
                                        >
                                            <i class="fa fa-times"></i> Hapus
                                        </a>
                                        <form
                                            id="delete-form"
                                            action="/pegawai/hapus/{{ $item->id }}"
                                            method="post"
                                            style="display: none;"
                                        >
                                            <input
                                                type="hidden"
                                                name="_token"
                                                value="{{ csrf_token() }}"
                                            />
                                            <input
                                                type="hidden"
                                                name="_method"
                                                value="delete"
                                            />
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $pegawai->links() }}
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
