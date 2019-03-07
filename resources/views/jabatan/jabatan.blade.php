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
                    Jabatan
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
                    <a href="/jabatan/form-tambah" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Tambah jabatan
                    </a>
                </p>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Kode</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jabatan as $item)
                                <tr>
                                    <td>{{ $item->kode }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>
                                        <a
                                            href="/jabatan/form-ubah/{{ $item->id }}"
                                            class="btn btn-sm btn-warning text-white"
                                        >
                                            <i class="fa fa-edit"></i> Ubah
                                        </a>
                                        <a
                                            href="/jabatan/hapus/{{ $item->id }}"
                                            class="btn btn-sm btn-danger"
                                            onclick="event.preventDefault();
                                            document.getElementById('delete-form-{{ $item->id }}').submit();"
                                        >
                                            <i class="fa fa-times"></i> Hapus
                                        </a>
                                        <form
                                            id="delete-form-{{ $item->id }}"
                                            action="/jabatan/hapus/{{ $item->id }}"
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
                    {{ $jabatan->links() }}
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
