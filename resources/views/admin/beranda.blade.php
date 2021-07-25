@extends('admin.utama')
@section('content')

<section class="section">

        <div class="section-header">
          <h4>APLIKASI SOLMET SOLIDARITAS INDONESIA</h4>
        </div>

    @if (Auth::user()->user_type == 'admin')
      <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                  <div class="card-icon bg-primary">
                      <i class="far fa-user"></i>
                  </div>
                  <div class="card-wrap">
                      <div class="card-header">
                          <h4>Menunggu Approve</h4>
                      </div>
                      <div class="card-body">
                        50
                    </div>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                  <div class="card-icon bg-success">
                    <i class="far fa-user"></i>
                  </div>
                  <div class="card-wrap">
                      <div class="card-header">
                          <h4>Jumlah Semua Member</h4>
                      </div>
                      <div class="card-body">
                        50
                    </div>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                  <div class="card-icon bg-warning">
                    <i class="far fa-user"></i>
                  </div>
                  <div class="card-wrap">
                      <div class="card-header">
                          <h4>Jumlah Administrator</h4>
                      </div>
                      <div class="card-body">
                          50
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                  <div class="card-icon bg-success">
                    <i class="far fa-user"></i>
                  </div>
                  <div class="card-wrap">
                      <div class="card-header">
                          <h4>Total Semua Pengguna</h4>
                      </div>
                      <div class="card-body">
                        50
                    </div>
                  </div>
              </div>
          </div>                  
      </div>
    @endif

    @if (Auth::user()->user_type == 'member')
    <h1>Selamat Datang, {{ Auth::user()->name }}</h1>
    @endif
  </section>
  
  
@endsection