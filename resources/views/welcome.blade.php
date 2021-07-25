<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Movie') }}</title>

   <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('assets_admin')}}/bootstrap/css/bootstrap.min.css" >
  {{-- <link rel="stylesheet" href="{{asset('assets_admin')}}/all.css"> --}}
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('assets_admin')}}/css/style.css">
  <link rel="stylesheet" href="{{asset('assets_admin')}}/css/components.css">
  <link rel="stylesheet" href="{{asset('assets_admin')}}/css/jquery.dataTables.min.css">

  <!-- General JS Scripts -->
  <script src="{{asset('assets_admin')}}/bootstrap/jquery/jquery.min.js"></script>
  <script src="{{asset('assets_admin')}}/bootstrap/js/bootstrap.min.js"></script>
  <script src="{{asset('assets_admin')}}/jquery.nicescroll.min.js"></script>
  <script src="{{asset('assets_admin')}}/moment.min.js"></script>
  <script src="{{asset('assets_admin')}}/js/stisla.js"></script>

  
  <!-- Template JS File -->
  <script src="{{asset('assets_admin')}}/js/scripts.js"></script>
  <script src="{{asset('assets_admin')}}/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="{{asset('assets_admin')}}/js/page/index.js"></script>
  <script src="{{asset('assets_admin')}}/js/jquery.dataTables.min.js"></script>
  <script src="{{asset('assets_admin')}}/js/dataTables.bootstrap4.min.js"></script>

    <style>
        .select2-selection.select2-selection--multiple {
            min-height: 42px;
            border-color: #e4e6fc;
        }

        .select2-container--default.select2-container--focus .select2-selection--multiple {
            border-color: #95a0f4;
        }
    </style>
</head>
<body class="layout-3">
    <div id="app">
        <div class="container">
            
        <div class="main-content" style="margin-top: -165px !important">
    
    <section class="section">
        <div class="section-header">
        <h1>Detail Biodata Anggota</h1>
        </div>

        <div class="section-body">
        <h2 class="section-title">Detail Biodata</h2>
                
        <form>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                <h4 class="card-title">Biodata Akun</h4>
                </div>
                <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        <div class="pull-right">
                        <img style="margin-bottom: 5px;" src="{{ url('images/foto_member/'. $detail->photo) }}" width="80%" height="300" class="rounded">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Tanggal Pembuatan</label>
                        <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                        </div>
                        <input type="text" class="form-control" value="{{ $detail->created_at}}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Status User :</label>
                        <div class="badge">
                        <span class="badge badge-success"> {{$detail->is_active == false ? 'Belum Diverifikasi' : 'Terverifikasi' }} </span>
                        </div>
                    </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" value="{{ $detail->name }}" readonly>
                    </div>
                    <div class="form-group">
                        <label class="form-label">NIK</label>
                        <div class="input-group">
                        <input type="text" class="form-control" value="{{ $detail->nik }}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-envelope"></i></span>
                        </div>
                        <input type="text" class="form-control" value="{{ $detail->user->email }}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Nomer HP</label>
                        <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>
                        <input type="text" class="form-control" value="{{ $detail->phone_number}}" readonly>
                        </div>
                    </div>
                    </div>

                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                <h4 class="card-title">Biodata Lengkap</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                        <label class="form-label">Alamat</label>
                        <textarea class="form-control" style="height:100px;" readonly>{{ $detail->address }}</textarea>
                        </div>
                        <div class="form-group">
                        <label class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" value="{{ $detail->place_birth }}" readonly>
                        </div>
                        <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                            <label class="form-label">Tanggal Lahir</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text" class="form-control" value="{{ $detail->date_birth }}" readonly>
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                            <label class="form-label">Umur</label>
                            <div class="input-group">
                                <input type="text" class="form-control text-right" value="22" readonly>
                                <div class="input-group-append">
                                <span class="input-group-text">Tahun</span>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label>Province</label>
                                <input type="text" class="form-control" value="{{ $detail->kelurahan->kecamatan->kabupaten->province->name_province }}" readonly>
                            </div>
                            <div class="form-group col-6">
                                <label>Kabupaten</label>
                                <input type="text" class="form-control" value="{{ $detail->kelurahan->kecamatan->kabupaten->name_kabupaten }}" readonly>
                            </div>
                            </div>
                            <div class="row">
                            <div class="form-group col-6">
                                <label>Kecamatan</label>
                                <input type="text" class="form-control" value="{{ $detail->kelurahan->kecamatan->name_kecamatan }}" readonly>
                            </div>
                            <div class="form-group col-6">
                                <label>Kelurahan</label>
                                <input type="text" class="form-control" value="{{ $detail->kelurahan->name_kelurahan }}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                        <label class="form-label">Jenis Kelamin</label>
                        <input type="text" class="form-control" value="{{ $detail->gender }}" readonly>
                        </div>
                        <div class="form-group">
                        <label class="form-label">Status Perkawinan</label>
                        <input type="text" class="form-control" value="{{ $detail->married_status }}" readonly>
                        </div>
                    </div>
                    </div>
                
                    <div class="row">
                    <div class="col-lg-12">
                        <h2 class="section-title">Riwayat Pendidikan</h2>
                        <div class="table-responsive">
                        
                            <table class="table table-bordered table-md">
                            <thead>
                                <tr>
                                <th class="text-center">Pendidikan Terakhir</th>
                                <th class="text-center">Tahun Lulus</th>
                                <th class="text-center">Kampus</th>
                                <th class="text-center">Pekerjaan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">{{ $detail->education->education }}</td>
                                    <td class="text-center">{{ $detail->education->graduation_year }}</td>
                                    <td class="text-center">{{ $detail->education->university_name }}</td>
                                    <td class="text-center">{{ $detail->education->job }}</td>
                                </tr>
                                </tbody>
                            </table>
                        
                        </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-lg-12">
                        <h2 class="section-title">Data Komunikasi</h2>
                        <div class="table-responsive">
                        <div class="gallery">
                            <table class="table table-bordered table-md">
                            <thead>
                                <tr>
                                <th class="text-center">Nomer Whatsapp</th>
                                <th class="text-center">Sosisal Media</th>
                                <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-center">{{ $detail->wa_number }}</td>
                                <td class="text-center">{{ $detail->social_media }}</td>
                                <td class="text-center">
                                    <div class="buttons">
                                    <a href="#" class="btn btn-outline-success">Hubungi</a>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-lg-12">
                        <h2 class="section-title">Data Anggota Keluarga</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                            <thead>
                                <tr>
                                <th class="text-center">Hubungan Keluarga</th>
                                <th class="text-center">Nama Lengkap Keluarga</th>
                                <th class="text-center">Nomer Whatsapp</th>
                                <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">{{ $family->relation->relation }}</td>
                                    <td class="text-center">{{ $family->name_family }}</td>
                                    <td class="text-center">{{ $family->phone_number }}</td>
                                    <td class="text-center">
                                    <div class="buttons">
                                        <a href="#" class="btn btn-outline-success">Hubungi</a>
                                    </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>


                    <div class="row">
                    <div class="col-lg-12">
                        <h2 class="section-title">Data Organisasi </h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                            <thead>
                                <tr>
                                <th class="text-center">Jabatan Organisasi</th>
                                <th class="text-center">Nama Organisasi</th>
                                <th class="text-center">Jenis Organisasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">{{ $organization->title_organitation }}</td>
                                    <td class="text-center">{{ $organization->organitation_name }}</td>
                                    <td class="text-center">{{ $organization->organitation_type }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-lg-6">
                        <h2 class="section-title">KTP</h2>
                        <div id="qrcode" style="display:inline-block;">
                        <img style="margin-bottom: 5px;" src="{{ url('images/foto_ktp/'. $detail->ktp_image) }}" width="80%" height="300" class="rounded">
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        </form>

        </div>
    </section>
    </div>
</div>
        </div>
    </div>
</body>


</html>