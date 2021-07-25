
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" href="{{asset('assets_admin')}}/img/logo.PNG" />
  <title>Form Register Solmet</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  {{-- <link rel="stylesheet" href="{{asset('assets_admin')}}/node_modules/selectric/public/selectric.css"> --}}

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('assets_admin')}}/css/style.css">
  <link rel="stylesheet" href="{{asset('assets_admin')}}/css/components.css">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="{{asset('assets_admin')}}/img/logo.png" alt="logo" width="100">
            </div>

            <!-- Section biodata -->
            <div class="section-body">
              <strong>
                {{Session::get('msg')}}      
              </strong>
                <h2 class="section-title">PENDAFTARAN ANGGOTA</h2>
                <p class="section-lead">Form ini adalah Pendaftaran Awal sebagai Anggota dalam Persaudaraan Solidaritas Merah Putih.</p>
            </div>
            <div class="card card-primary">
                <div class="card-header">
                  <h4>BIODATA ANGGOTA</h4>
                </div>
              <div class="card-body">

                <form method="POST" action="{{ route('register_submit') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="name">Nama Lengkap (Sesuai KTP)</label>
                      <input id="name" type="text" value="{{ old('name') }}" class="form-control" name="name" autofocus>
                      <small class="text-danger">{{ $errors->first("name") }}</small>
                    </div>
                    <div class="form-group col-6">
                      <label for="nik">NIK</label>
                      <input id="nik" value="{{ old('nik') }}" type="number" class="form-control" name="nik">
                      <small class="text-danger">{{ $errors->first("nik") }}</small>

                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                        <label class="form-label">Email</label> 
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-envelope"></i>
                                </span>
                            </div> 
                            <input type="email" value="{{ old('email') }}" name="email" class="form-control">
                            <small class="text-danger">{{ $errors->first("email") }}</small>
                        </div>
                    </div>
                    <div class="form-group col-6">
                        <label class="form-label">Nomer Handphone</label> 
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-phone"></i>
                                </span>
                            </div> 
                            <input type="number" value="{{ old('phone_number') }}" name="phone_number" class="form-control">
                            <small class="text-danger">{{ $errors->first("phone_number") }}</small>
                        </div>
                    </div>
                  </div>
                  
                    <div class="form-group">
                        <label class="form-label">Alamat</label>
                        <textarea class="form-control"  name="address" style="height:70px;" required>{{ old('address') }}</textarea>
                    </div>
                    <div class="row"> 
                        <div class="form-group col-4">
                            <label class="form-label">Jenis Kelamin</label> 
                            <div class="form-check">
                                <input type="radio" name="gender" class="form-check-input" value="Laki-Laki" id="gender" checked> 
                                <label class="form-check-label" for="gender1">Laki-Laki</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="gender" class="form-check-input" value="Perempuan" id="gender"> 
                                <label class="form-check-label" for="gender2">Perempuan</label>
                            </div>
                        </div>
                        <div class="form-group col-8">
                            <label class="form-label">Status Perkawinan</label> 
                            <div class="form-check">
                                <input type="radio" name="married_status" class="form-check-input" value="MENIKAH" checked> 
                                <label class="form-check-label" for="gender1">Menikah</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="married_status" class="form-check-input" value="BELUM MENIKAH"> 
                                <label class="form-check-label"  for="gender2">Belum Menikah</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="married_status" class="form-check-input" value="CERAI"> 
                                <label class="form-check-label" for="gender2">Cerai</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Tanggal Lahir</label> 
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </div>
                                <input type="date" name="date_birth" value="{{ old('date_birth') }}" class="form-control" required="">
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Tempat Lahir</label> 
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </span>
                                </div> 
                                <input type="text" name="place_birth" value="{{ old('place_birth') }}" class="form-control">
                            </div>
                        </div>
                      </div>

                  <div class="form-divider">
                    SESUAIKAN DATA DOMISILI ANDA
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                        <label>Province</label>
                        <select name="province_id" id="wilayahProvinsi" class="form-control selectric">
                          <option value="">-- Pilih Provinsi --</option>
                         @foreach ($provinces as $province)
                             <option value="{{ $province->id }}">{{ $province->name_province }}</option>
                         @endforeach
                        </select>
                      </div>
                    <div class="form-group col-6">
                      <label>Kabupaten</label>
                      <select name="kabupaten_id" id="kabupaten_id" class="form-control selectric">

                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                        <label>Kecamatan</label>
                        <select name="kecamatan_id" id="kecamatan_id" class="form-control selectric">
                          
                        </select>
                      </div>
                      <div class="form-group col-6">
                        <label>Kelurahan</label>
                        <select name="kelurahan_id" id="kelurahan_id" class="form-control selectric">
                          
                        </select>
                      </div>
                  </div>
              </div>
            </div>
            <!-- End Section Biodata -->



            <!-- Section Pendidikan dan Pekerjaan -->
            <div class="section-body">
                <h2 class="section-title">RIWAYAT PENDIDIKAN</h2>
                <p class="section-lead">Pilih dan Isi data Pendidikan Terakhir dan Pekerjaan.</p>
            </div>
            <div class="card card-primary">
                <div class="card-header">
                  <h4>PENDIDIKAN DAN PEKERJAAN</h4>
                </div>
              <div class="card-body">
                <div class="form-group col-8">
                    <label>Pendidikan Terakhir</label>
                    <select class="form-control selectric" name="education">
                      <option value="SD">SD</option>
                      <option value="SMP">SMP</option>
                    </select>
                </div>
                <div class="form-group col-8">
                    <label for="graduation_year">Tahun Lulus</label>
                    <input id="graduation_year" value="{{ old('graduation_year') }}" name="graduation_year" type="text" class="form-control">
                </div>
                <div class="form-group col-8">
                    <label for="university_name">Almamater</label>
                    <input id="university_name" type="text" value="{{ old('university_name') }}" class="form-control" name="university_name">
                </div>
                <div class="form-group col-8">
                    <label>Pekerjaan</label>
                    <select class="form-control selectric" name="job">
                      <option value="PEGAWAI NEGERI">PEGAWAI NEGERI</option>
                      <option  value="TNI/POLRI">TNI/POLRI</option>
                    </select>
                </div>
              </div>
            </div>   
            <!-- End Section Pendidikan dan Pekerjaan -->


            <!-- Section Komunikasi dan Sosial Media -->
              <div class="section-body">
                <h2 class="section-title">KOMUNIKASI DAN SOSIAL MEDIA</h2>
                <p class="section-lead">Isi Data Komunikasi anda Dan Data Sosial Media yang anda miliki.</p>
            </div>
            <div class="card card-primary">
                <div class="card-header">
                  <h4>KOMUNIKASI DAN SOSIAL MEDIA</h4>
                </div>
              <div class="card-body">
                
                <div class="form-group col-8">
                    <label class="form-label">Nomer Handphone (WA)</label> 
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fab fa-whatsapp"></i>
                            </span>
                        </div> 
                        <input type="number" name="wa_number" value="{{ old('wa_number') }}" class="form-control">
                    </div>
                </div>
                <div class="form-group col-8">
                    <label for="social_media">Sosial Media</label>
                    <input id="social_media" type="text" class="form-control" value="{{ old('social_media') }}" name="social_media">
                </div>
              </div>
            </div>   
            <!-- End Section Komunikasi dan Sosial Media -->

            <!-- Section Data keluarga -->
            <div class="section-body">
                <h2 class="section-title">DALAM KEADAAN DARURAT</h2>
                <p class="section-lead">Data Keluarga (Orang tua/Istri/Suami/anak) yang dapat dihubungi.</p>
            </div>
            <div class="card card-primary">
                <div class="card-header">
                  <h4>DATA ANGGOTA KELUARGA</h4>
                </div>
              <div class="card-body">
                <div class="form-group col-8">
                    <label>Hubungan Keluarga</label>
                    <select name="relation_id" class="form-control selectric">
                        @foreach ($relations as $relation)
                              <option value="{{$relation->id}}">
                                  {{$relation->relation}}
                              </option>
                        @endforeach
                    </select>
                  </div>
                <div class="form-group col-8">
                    <label for="name_family">Nama Lengkap yang dapat dihubungi</label>
                    <input id="name_family" type="text" class="form-control" value="{{ old('name_family') }}" name="name_family">
                </div>
                <div class="form-group col-8">
                    <label class="form-label">Nomer Handphone (WA)</label> 
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fab fa-whatsapp"></i>
                            </span>
                        </div> 
                        <input type="number" name="phone_number" value="{{ old('phone_number') }}" class="form-control">
                    </div>
                </div>
              </div>
            </div>   
            <!-- End Section Data keluarga -->
        
            
            <!-- Section Data organisasi -->
            <div class="section-body">
                <h2 class="section-title">DATA ORGANISASI</h2>
                <p class="section-lead">Isi Data Pengalaman Organisasi yang pernah anda miliki.</p>
            </div>
            <div class="card card-primary">
                <div class="card-header">
                  <h4>DATA ORGANISASI</h4>
                </div>
              <div class="card-body">
                <div class="form-group col-8">
                    <label>Penglaman Jabatan Organisasi</label>
                    <select name="title_organitation" class="form-control selectric">
                        <option value="KETUA">KETUA</option>
                        <option value="WAKIL">WAKIL</option>
                        <option value="SEKRETARIS">SEKRETARIS</option>
                        <option value="ANGGOTA">ANGGOTA</option>
                    </select>
                  </div>
                <div class="form-group col-8">
                    <label for="organitation_name">Nama organisasi</label>
                    <input id="organitation_name" type="text" value="{{ old('organitation_name') }}" class="form-control" name="organitation_name">
                </div>
                <div class="form-group col-8">
                  <label>Jenis Organisasi</label>
                  <select name="organitation_type" class="form-control selectric">
                     <option value="POLITIK">POLITIK</option>
                     <option value="SOSIAL">SOSIAL</option>
                     <option value="AGAMA">AGAMA</option>
                  </select>
                </div>
              </div>
            </div>   
            <!-- End Section Data organisasi -->

            <!-- Section Pas photo -->
            <div class="section-body">
                <h2 class="section-title">UPLOAD PAS PHOTO DAN KTP</h2>
                <p class="section-lead">Upload pas Foto setengah badan menghadap kedepan untuk Kartu Anggota.</p>
            </div>
            <div class="card card-primary">
                <div class="card-header">
                  <h4>UPLOAD PAS PHOTO DAN KTP</h4>
                </div>
              <div class="card-body">
                <div class="form-group col-8">
                    <label for="photo">PAS PHOTO</label>
                    <input id="photo" type="file" class="form-control" name="photo">
                    <small id="passwordHelpBlock" class="form-text text-muted">
                      Ekstensi yang diperbolehkan hanya JPG,JPEG,SVG dan PNG.
                    </small>
                </div>
                
                <div class="form-group col-8">
                    <label for="ktp_image">KTP</label>
                    <input id="ktp_image" type="file" class="form-control" name="ktp_image">
                    <small id="passwordHelpBlock" class="form-text text-muted">
                      Ekstensi yang diperbolehkan hanya JPG/JPEG/SVG dan PNG.
                    </small>
                </div>
              </div>
            </div>   
            <!-- End Section pas photo -->    
            
            <!-- Section Data Pengguna -->
            <div class="section-body">
              <h2 class="section-title">DATA AKUN PENGGUNA</h2>
              <p class="section-lead">Isi data dibawah ini untuk akun pengguna anda.</p>
          </div>
          <div class="card card-primary">
              <div class="card-header">
                <h4>DATA AKUN PENGGUNA</h4>
              </div>
            <div class="card-body">
              
              <div class="form-group col-8">
                  <label for="password">Password</label>
                  <input id="password" type="password" value="{{ old('password') }}" class="form-control" name="password">
                  <small id="passwordHelpBlock" class="form-text text-muted">
                    Kata sandi Anda harus terdiri dari 8-20 karakter, berisi huruf dan angka, dan tidak boleh mengandung spasi, karakter khusus, atau emoji.
                  </small>
              </div>
              
              <div class="form-group col-8">
                  <label for="password_confirmation">Masukkan Ulang Password</label>
                  <input id="password_confirmation" type="password" value="{{ old('password_confirm') }}" class="form-control" name="password_confirmation">
                  <small id="passwordHelpBlock" class="form-text text-muted">
                    Masukkan ulang kata sandi yang baru anda inputkan.
                  </small>
              </div>
            </div>
            <div class="card-footer bg-whitesmoke text-left">
              <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="agree" class="custom-control-input" id="agree" required>
                      <label class="custom-control-label" for="agree">Saya menyetujui untuk melakukan pendaftaran</label>
                    </div>
              </div>
              <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      REGISTER
                    </button>
              </div>
            </div>
          </div>   
          <!-- End Section Data Pengguna -->
        
      </form>

            <div class="simple-footer">
              Copyright &copy; SOLMET 2021
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{asset('assets_admin')}}/assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  

  <!-- Template JS File -->
  <script src="{{asset('assets_admin')}}/assets/js/scripts.js"></script>
  <script src="{{asset('assets_admin')}}/assets/js/custom.js"></script>


  <script>
    $(document).ready(function(){
      $('#wilayahProvinsi').change(function() { 
                let id=$(this).val();
                $.ajax({
                    url : "{{ route('kabupaten') }}",
                    method : "POST",
                    data : {province_id: id, _token: $('#csrf-token')[0].content},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                         
                        let html = '<option>-Pilih Kabupaten-</option>';
                        $.each(data, function(i, item){
                            html += '<option value='+item.id+'>'+item.name_kabupaten+'</option>';
                        })
                       
                        $('#kabupaten_id').html(html);
 
                    }
                });
                return false;
        });

        $('#kabupaten_id').change(function(){
          let id=$(this).val();
                $.ajax({
                    url : "{{ route('kecamatan') }}",
                    method : "POST",
                    data : {kabupaten_id: id, _token: $('#csrf-token')[0].content},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                         
                        let html = '<option>-Pilih Kecamatan-</option>';
                        $.each(data, function(i, item){
                            html += '<option value='+item.id+'>'+item.name_kecamatan+'</option>';
                        })
                       
                        $('#kecamatan_id').html(html);
 
                    }
                });
                return false;
        });

        $('#kecamatan_id').change(function(){
          let id=$(this).val();
                $.ajax({
                    url : "{{ route('kelurahan') }}",
                    method : "POST",
                    data : {kecamatan_id: id, _token: $('#csrf-token')[0].content},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                         
                        let html = '<option>-Pilih Kelurahan-</option>';
                        $.each(data, function(i, item){
                            html += '<option value='+item.id+'>'+item.name_kelurahan+'</option>';
                        })
                       
                        $('#kelurahan_id').html(html);
 
                    }
                });
                return false;
        });
    })
  </script>


</body>
</html>
