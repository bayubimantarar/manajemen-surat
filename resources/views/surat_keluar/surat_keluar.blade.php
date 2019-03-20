@extends('layouts.main')

@section('title')
Dashboard &raquo; Surat Keluar | Aplikasi Manajemen Surat
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h3 class="card-title">
                    Surat Keluar
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
                    <a href="/surat-keluar/form-tambah" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Tambah surat keluar
                    </a>
                </p>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nomor</th>
                                <th scope="col">Tujuan</th>
                                <th scope="col">Asal</th>
                                <th scope="col">Perihal</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($suratKeluar as $item)
                                <tr>
                                    <td>{{ $item->nomor }}</td>
                                    <td>{{ $item->tujuan }}</td>
                                    <td>{{ $item->jabatan->nama }}</td>
                                    <td>{{ $item->perihal }}</td>
                                    <td>{{ $item->tanggal_kirim->formatLocalized('%d %B %Y') }}</td>
                                    <td>
                                        <a
                                            href="/surat-keluar/form-ubah/{{ $item->id }}"
                                            class="btn btn-sm btn-warning text-white"
                                        >
                                            <i class="fa fa-edit"></i> Ubah
                                        </a>
                                        <a
                                            href="/surat-keluar/hapus/{{ $item->id }}"
                                            class="btn btn-sm btn-danger"
                                            onclick="event.preventDefault();
                                            document.getElementById('delete-form').submit();"
                                        >
                                            <i class="fa fa-times"></i> Hapus
                                        </a>
                                        <form
                                            id="delete-form"
                                            action="/surat-keluar/hapus/{{ $item->id }}"
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
                    {{ $suratKeluar->links() }}
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
