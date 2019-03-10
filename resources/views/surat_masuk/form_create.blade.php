@extends('layouts.main')

@section('title')
Dashboard &raquo; Surat Masuk | Aplikasi Manajemen Surat
@endsection

@section('css')
<link
    rel="stylesheet"
    href="/assets/bootstrap-datepicker/css/bootstrap-datepicker3.css"
/>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h3 class="card-title">
                    Tambah surat masuk
                </h3>
                <hr />
                <form
                    action="/surat-masuk/simpan"
                    method="post"
                    enctype="multipart/form-data"
                >
                    <input
                        type="hidden"
                        name="_token"
                        value="{{ csrf_token()}}"
                    />
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-xs-12">
                                <label for="nomor">
                                    Nomor Surat
                                </label>
                                <input
                                    type="text"
                                    name="nomor"
                                    class="form-control {{ $errors->has('nomor') ? ' is-invalid' : '' }}"
                                    value="{{ old('nomor') }}"
                                />
                                @if($errors->has('nomor'))
                                    <span class="invalid-feedback">
                                        <strong>
                                            {{ $errors->first('nomor') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-xs-12">
                                <label for="asal">
                                    Asal *
                                </label>
                                <input
                                    type="text"
                                    name="asal"
                                    class="form-control {{ $errors->has('asal') ? ' is-invalid' : '' }}"
                                    value="{{ old('asal') }}"
                                />
                                @if($errors->has('asal'))
                                    <span class="invalid-feedback">
                                        <strong>
                                            {{ $errors->first('asal') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-xs-12">
                                <label for="tujuan-bagian">
                                    Tujuan Bagian *
                                </label>
                                <select
                                    name="jabatan_id"
                                    id="tujuan-bagian"
                                    class="form-control {{ $errors->has('jabatan_id') ? ' is-invalid' : '' }}"
                                >
                                    <option value="">
                                        --- Pilih Bagian ---
                                    </option>
                                    @foreach($jabatan as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->has('jabatan_id'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('jabatan_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-lg-5 col-md-5 col-xs-12">
                                <label for="tujuan">
                                    Tujuan Pegawai *
                                </label>
                                <select
                                    name="pegawai_id"
                                    class="form-control"
                                    id="tujuan-pegawai"
                                    readonly
                                >
                                    <option value="">--- Pilih Bagian Terlebih Dahulu ---</option>
                                </select>
                                @if($errors->has('pegawai_id'))
                                    <span class="invalid-feedback">
                                        <strong>
                                            {{ $errors->first('pegawai_id') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-xs-12">
                                <label for="perihal">
                                    Perihal *
                                </label>
                                <input
                                    type="text"
                                    name="perihal"
                                    class="form-control {{ $errors->has('perihal') ? ' is-invalid' : '' }}"
                                    value="{{ old('perihal') }}"
                                />
                                @if($errors->has('perihal'))
                                    <span class="invalid-feedback">
                                        <strong>
                                            {{ $errors->first('perihal') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-xs-12">
                                <label for="tanggal-terima">
                                    Tanggal Terima *
                                </label>
                                <div class="input-group">
                                    <input
                                        type="text"
                                        name="tanggal_terima"
                                        class="form-control {{ $errors->has('tanggal_terima') ? ' is-invalid' : '' }}"
                                        id="tanggal-terima"
                                        readonly
                                    />
                                  <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fa fa-clock"></i>
                                    </span>
                                  </div>
                                    @if($errors->has('tanggal_terima'))
                                        <span class="invalid-feedback">
                                            <strong>
                                                {{ $errors->first('tanggal_terima') }}
                                            </strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-xs-12">
                                <label for="lampiran">
                                    Lampiran
                                </label>
                                <div class="custom-file">
                                    <input
                                        type="file"
                                        name="lampiran"
                                        class="custom-file-input"
                                        id="lampiran"
                                    >
                                    <label
                                        class="custom-file-label"
                                        for="customFile"
                                    >
                                        Pilih file
                                    </label>
                                    <code>
                                        Maksimal ukuran file lampiran 5 Megabyte
                                    </code>
                                </div>
                                @if($errors->has('lampiran'))
                                    <span class="invalid-feedback">
                                        <strong>
                                            {{ $errors->first('lampiran') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr />
                    <p>
                        <code>
                            Label bertanda (*) wajib diisi atau dipilih
                        </code>
                    </p>
                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        <i class="fa fa-check"></i> Simpan
                    </button>
                </form>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script
    type="text/javascript"
    src="/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"
></script>
<script type="text/javascript">
    $('#tujuan-bagian').click(function(){
        // set variable
        var jabatan_id = $(this).val();
        var pegawai_options = '';

        if(jabatan_id != 0){
            // set ajax
            $.ajax({
                url : '/pegawai/api/cari-pegawai-dari-bagian/'+jabatan_id,
                data : 'get',
                success: function(result) {
                    if(result != undefined){
                        // empty the options on select
                        $('#tujuan-pegawai').empty();
                        $('#tujuan-pegawai').removeAttr('readonly');

                        // foreach the result assign insto variable
                        $.each(result, function(key, value) {
                            pegawai_options = '<option value="'+value.id+'">'+value.nama+'</option>';
                        });

                        // append into select tujuan pegawai
                        $('#tujuan-pegawai').append(pegawai_options);
                    }
                },
                error: function(result) {
                    alert(result);
                }
            });
        }else{
            $('#tujuan-pegawai').empty();

            pegawai_options =
                '<option value="">'+
                    '--- Pilih Bagian Terlebih Dahulu ---'+
                '</option>';

            $('#tujuan-pegawai').append(pegawai_options);
            $('#tujuan-pegawai').attr('readonly', true);
        }
    });

    $('#tanggal-terima').datepicker({
        format: 'dd/mm/yyyy',
        todayHighlight: true
    });
</script>
@endsection
