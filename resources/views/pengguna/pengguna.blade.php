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
                    Pengguna
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
                    <a href="/pengguna/form-tambah" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Tambah pengguna
                    </a>
                </p>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pengguna as $item)
                                <tr>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        @if($item->role == 'Super Admin')
                                            <span class="badge badge-success">
                                                {{ $item->role }}
                                            </span>
                                        @else
                                            <span class="badge badge-info">
                                                {{ $item->role }}
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <a
                                            href="/pengguna/form-ubah/{{ $item->id }}"
                                            class="btn btn-sm btn-warning text-white"
                                        >
                                            <i class="fa fa-edit"></i> Ubah
                                        </a>
                                        <a
                                            href="/pengguna/hapus/{{ $item->id }}"
                                            class="btn btn-sm btn-danger"
                                            onclick="event.preventDefault();
                                            document.getElementById('delete-form').submit();"
                                        >
                                            <i class="fa fa-times"></i> Hapus
                                        </a>
                                        <form
                                            id="delete-form"
                                            action="/pengguna/hapus/{{ $item->id }}"
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
                    {{ $pengguna->links() }}
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
