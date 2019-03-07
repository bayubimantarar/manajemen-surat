@extends('layouts.main')

@section('title')
Dashboard | Aplikasi Manajemen Surat
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h3 class="card-title">
                    Dashboard
                </h3>
                <hr />
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <center>
                            <h1><i class="fa fa-envelope"></i></h1>
                            <h3>Surat Masuk</h3>
                            <h4>0</h4>
                        </center>
                    </div>
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <center>
                            <h1><i class="fa fa-envelope-open-text"></i></h1>
                            <h3>Surat Keluar</h3>
                            <h4>0</h4>
                        </center>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
