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
                    action="/surat-keluar/ubah/{{ $suratKeluar->id }}"
                    method="post"
                    enctype="multipart/form-data"
                >
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
                    @foreach($errors->all() as $error)
                        {{ $error }}
                    @endforeach
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
                                    value="{{ $suratKeluar->nomor }}"
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
                                <label for="tujuan">
                                    Tujuan *
                                </label>
                                <input
                                    type="text"
                                    name="tujuan"
                                    class="form-control {{ $errors->has('tujuan') ? ' is-invalid' : '' }}"
                                    value="{{ $suratKeluar->tujuan }}"
                                />
                                @if($errors->has('tujuan'))
                                    <span class="invalid-feedback">
                                        <strong>
                                            {{ $errors->first('tujuan') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-xs-12">
                                <label for="asal-bagian">
                                    Tujuan Bagian *
                                </label>
                                <select
                                    name="jabatan_id"
                                    id="asal-bagian"
                                    class="form-control {{ $errors->has('jabatan_id') ? ' is-invalid' : '' }}"
                                >
                                    <option value="">
                                        --- Pilih Bagian ---
                                    </option>
                                    @foreach($jabatan as $item)
                                        <option
                                            value="{{ $item->id }}"
                                            {{ $suratKeluar->jabatan_id == $item->id ? 'selected' : ''}}
                                        >
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
                                    class="form-control {{ $errors->has('pegawai_id') ? ' is-invalid' : '' }}"
                                    id="asal-pegawai"
                                    readonly
                                >
                                    <option value="">
                                        --- Pilih Bagian Terlebih Dahulu ---
                                    </option>
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
                                    value="{{ $suratKeluar->perihal }}"
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
                                <label for="tanggal-kirim">
                                    Tanggal Terima *
                                </label>
                                <div class="input-group">
                                    <input
                                        type="text"
                                        class="form-control tanggal_kirim {{ $errors->has('tanggal_kirim') ? ' is-invalid' : '' }}"
                                        id="tanggal-kirim"
                                        value="{{ $suratKeluar->tanggal_kirim->format('d/m/Y') }}"
                                        style="cursor: pointer"
                                        readonly
                                    />
                                    <input
                                        type="hidden"
                                        name="tanggal_kirim"
                                        id="input-tanggal-kirim"
                                        value="{{ $suratKeluar->tanggal_kirim->toDateString() }}"
                                    />
                                  <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fa fa-clock"></i>
                                    </span>
                                  </div>
                                    @if($errors->has('tanggal_kirim'))
                                        <span class="invalid-feedback">
                                            <strong>
                                                {{ $errors->first('tanggal_kirim') }}
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
                                        class="{{ $errors->has('lampiran') ? ' is-invalid' : '' }}"
                                    />
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
    var jabatan_id = $("#asal-bagian").val();
    var old_pegawai_id = {{ $suratKeluar->pegawai_id }};

    if (jabatan_id != '') {
        $.ajax({
            url: '/pegawai/api/cari-pegawai-dari-bagian/'+jabatan_id,
            data: 'get',
            success: function(result) {
                console.log(result);
                if(result != undefined){
                    if (result.length != 0) {
                        // empty the options on select
                        $('#asal-pegawai').empty();
                        $('#asal-pegawai').removeAttr('readonly');

                        // foreach the result assign insto variable
                        $.each(result, function(key, value) {
                            pegawai_options =
                                '<option value="'+value.id+'"'+(old_pegawai_id == value.id ? 'selected' : '')+'>'
                                    +value.nama+
                                '</option>';

                            // append into select tujuan pegawai
                            $('#asal-pegawai').append(pegawai_options);
                        });
                    }else{
                        $('#asal-pegawai').empty();

                        pegawai_options =
                            '<option value="">'+
                                '--- Belum Ada Pegawai Di Bagian Ini ---'+
                            '</option>';

                        $('#asal-pegawai').append(pegawai_options);
                        $('#asal-pegawai').attr('readonly', true);
                    }
                }
            }
        })
    }

    $('#asal-bagian').click(function(){
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
                        if (result.length != 0) {
                            // empty the options on select
                            $('#asal-pegawai').empty();
                            $('#asal-pegawai').removeAttr('readonly');

                            // foreach the result assign insto variable
                            $.each(result, function(key, value) {
                                pegawai_options =
                                    '<option value="'+value.id+'">'
                                        +value.nama+
                                    '</option>';
                            });

                            // append into select tujuan pegawai
                            $('#asal-pegawai').append(pegawai_options);
                        }else{
                            $('#asal-pegawai').empty();

                            pegawai_options =
                                '<option value="">'+
                                    '--- Belum Ada Pegawai Di Bagian Ini ---'+
                                '</option>';

                            $('#asal-pegawai').append(pegawai_options);
                            $('#asal-pegawai').attr('readonly', true);
                        }
                    }
                },
                error: function(result) {
                    alert(result);
                }
            });
        }else{
            $('#asal-pegawai').empty();

            pegawai_options =
                '<option value="">'+
                    '--- Pilih Bagian Terlebih Dahulu ---'+
                '</option>';

            $('#asal-pegawai').append(pegawai_options);
            $('#asal-pegawai').attr('readonly', true);
        }
    });

    $('#tanggal-kirim').datepicker({
        language: 'id',
        todayHighlight: true,
        format: {
            toDisplay: function (date, format, language) {
                var day                 = date.getDate();
                var month               = date.getMonth()+1;
                var year                = date.getFullYear();
                var full_date           = day+'/'+month+'/'+year
                var real_full_date      = year+'-'+month+'-'+day;

                $('#input-tanggal-kirim').val(real_full_date);

                return full_date;
            },
            toValue: function (date, format, language) {
                //
            }
        }
    });
</script>
@endsection
