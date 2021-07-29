@extends('admin.utama')
@section('content')
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
<style>
div.hidden
{
   display: none
}
</style>
<div class="row">
  <div class="col-12 col-md-12 col-lg-12">
    <form method="POST" action="{{ route('admin.member.update') }}" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="member_id" value="{{$detail->id}}">
      <div class="card card-primary">
          <div class="card-header">
            <h4>BIODATA ANGGOTA</h4>
          </div>
        <div class="card-body">
            <div class="row">
              <div class="form-group col-6">
                <label for="name">Nama Lengkap (Sesuai KTP)</label>
                <input id="name" type="text" class="form-control" name="name" value="{{$detail->name}}" autofocus>
                <small class="text-danger">{{ $errors->first("name") }}</small>
              </div>
              <div class="form-group col-6">
                <label for="nik">NIK</label>
                <input id="nik" type="number" class="form-control" name="nik" value="{{$detail->nik}}">
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
                      <input type="email" name="email" value="{{$detail->user->email}}" class="form-control">
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
                      <input type="number" name="phone_number" value="{{$detail->phone_number}}" class="form-control">
                      <small class="text-danger">{{ $errors->first("phone_number") }}</small>
                  </div>
              </div>
            </div>
            
            <div class="form-group">
                <label class="form-label">Alamat</label>
                <textarea class="form-control"  name="address" style="height:70px;" required>{{$detail->address}}</textarea>
            </div>
            <div class="row"> 
                <div class="form-group col-4">
                    <label class="form-label">Jenis Kelamin</label> 
                    <div class="form-check">
                        <input type="radio" name="gender" class="form-check-input" value="Laki-Laki" id="gender"  {{$detail->gender == 'Laki-Laki' ? 'checked' : ''}}> 
                        <label class="form-check-label" for="gender1">Laki-Laki</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="gender" class="form-check-input" value="Perempuan" id="gender" {{$detail->gender == 'Perempuan' ? 'checked' : ''}}>
                        <label class="form-check-label" for="gender2">Perempuan</label>
                    </div>
                </div>
                <div class="form-group col-8">
                    <label class="form-label">Status Perkawinan</label> 
                    <div class="form-check">
                        <input type="radio" name="married_status" value="MENIKAH" class="form-check-input" value="MENIKAH" {{$detail->married_status == 'MENIKAH' ? 'checked' : ''}}> 
                        <label class="form-check-label" for="gender1">Menikah</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="married_status" value="BELUM MENIKAH" class="form-check-input" {{$detail->married_status == 'BELUM MENIKAH' ? 'checked' : ''}}> 
                        <label class="form-check-label"  for="gender2">Belum Menikah</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="married_status" value="CERAI" class="form-check-input" {{$detail->married_status == 'CERAI' ? 'checked' : ''}}> 
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
                    <input type="date" name="date_birth" value="{{$detail->date_birth}}" class="form-control" required="">
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
                    <input type="text" name="place_birth" value="{{$detail->place_birth}}" class="form-control">
                </div>
              </div>
            </div>

            <div class="form-divider domisili">
              SESUAIKAN DATA DOMISILI ANDA
              <a href="javascript:void(0)" id="tombol_hide">Hide</a>
              <a href="javascript:void(0)" id="tombol_show">Show</a>
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
            <div class="row ganti hidden">
              <div class="form-group col-6">  
                <label>Province</label>
                <select name="province_id" value="{{$detail->province_id}}" id="wilayahProvinsi" class="form-control province selectric">
                  <option value="">-- Pilih Provinsi --</option>
                  @foreach ($provinces as $province)
                      <option value="{{ $province->id }}">{{ $province->name_province }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-6">
                <label>Kabupaten</label>
                <select name="kabupaten_id" value="{{$detail->kabupaten_id}}" id="kabupaten_id" class="form-control kabupaten selectric">

                </select>
              </div>
            </div>
            <div class="row ganti hidden">
              <div class="form-group col-6">
                  <label>Kecamatan</label>
                  <select name="kecamatan_id" value="{{$detail->kecamatan_id}}" id="kecamatan_id" class="form-control kecamatan selectric">
                    
                  </select>
                </div>
                <div class="form-group col-6">
                  <label>Kelurahan</label>
                  <select name="kelurahan_id" value="{{$detail->kelurahan_id}}" id="kelurahan_id" class="form-control kelurahan selectric">
                    
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
                <option value="SD" {{$detail->jobsEducation->education =='SD' ? 'selected': ''}}>SD</option>
                <option value="SMP" {{$detail->jobsEducation->education =='SMP' ? 'selected': ''}}>SMP</option>
              </select>
          </div>
          <div class="form-group col-8">
              <label for="graduation_year">Tahun Lulus</label>
              <input id="graduation_year" name="graduation_year" value="{{$detail->jobsEducation->graduation_year}}" type="text" class="form-control">
          </div>
          <div class="form-group col-8">
              <label for="university_name">Almamater</label>
              <input id="university_name" type="text" class="form-control" name="university_name" value="{{$detail->jobsEducation->university_name}}">
          </div>
          <div class="form-group col-8">
              <label>Pekerjaan</label>
              <select class="form-control selectric" name="job">
                <option value="PEGAWAI NEGERI" {{$detail->jobsEducation->job =='PEGAWAI NEGERI' ? 'selected' : '' }}>PEGAWAI NEGERI</option>
                <option  value="TNI/POLRI" {{$detail->jobsEducation->job =='TNI/POLRI' ? 'selected' : '' }}>TNI/POLRI</option>
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
                  <input type="number" name="wa_number" value="{{$detail->wa_number}}" class="form-control">
              </div>
          </div>
          <div class="form-group col-8">
              <label for="social_media">Sosial Media</label>
              <input id="social_media" type="text" class="form-control" name="social_media" value="{{$detail->social_media}}">
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
                        <option value="{{$relation->id}}" {{$detail->family->relation_id == $relation->id ? 'selected' : ''}}>
                            {{$relation->relation}}
                        </option>
                  @endforeach
              </select>
            </div>
          <div class="form-group col-8">
              <label for="name_family">Nama Lengkap yang dapat dihubungi</label>
              <input id="name_family" type="text" class="form-control" name="name_family" value="{{$detail->family->name_family}}">
          </div>
          <div class="form-group col-8">
              <label class="form-label">Nomer Handphone (WA)</label> 
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text">
                          <i class="fab fa-whatsapp"></i>
                      </span>
                  </div> 
                  <input type="number" name="phone_number" value="{{$detail->family->phone_number}}" class="form-control">
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
              <label>Pengalaman Jabatan Organisasi</label>
              <select name="title_organitation" class="form-control selectric">
                  <option value="KETUA" {{$detail->organitation->title_organitation == 'KETUA' ? 'selected' : ''}}>KETUA</option>
                  <option value="WAKIL" {{$detail->organitation->title_organitation == 'WAKIL' ? 'selected' : ''}}>WAKIL</option>
                  <option value="SEKRETARIS" {{$detail->organitation->title_organitation == 'SEKRETARIS' ? 'selected' : ''}}>SEKRETARIS</option>
                  <option value="ANGGOTA" {{$detail->organitation->title_organitation == 'ANGGOTA' ? 'selected' : ''}}>ANGGOTA</option>
              </select>
            </div>
          <div class="form-group col-8">
              <label for="organitation_name">Nama organisasi</label>
              <input id="organitation_name" type="text" class="form-control" name="organitation_name" value="{{$detail->organitation->organitation_name}}">
          </div>
          <div class="form-group col-8">
            <label>Jenis Organisasi</label>
            <select name="organitation_type" class="form-control selectric">
              <option value="POLITIK" {{$detail->organitation->organitation_type =='POLITIK' ? 'selected' : ''}}>POLITIK</option>
              <option value="SOSIAL" {{$detail->organitation->organitation_type =='SOSIAL' ? 'selected' : ''}}>SOSIAL</option>
              <option value="AGAMA" {{$detail->organitation->organitation_type =='AGAMA' ? 'selected' : ''}}>AGAMA</option>
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
              <input id="photo" type="file" class="form-control" name="photo" value="{{$detail->photo}}">
              <small id="passwordHelpBlock" class="form-text text-muted">
                Ekstensi yang diperbolehkan hanya JPG,JPEG,SVG dan PNG.
              </small>
          </div>
          
          <div class="form-group col-8">
              <label for="ktp_image">KTP</label>
              <input id="ktp_image" type="file" class="form-control" name="ktp_image" value="{{$detail->ktp_image}}">
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
              <input id="password" type="password" class="form-control" name="password" value="{{$detail->password}}">
              <small id="passwordHelpBlock" class="form-text text-muted">
                Kata sandi Anda harus terdiri dari 8-20 karakter, berisi huruf dan angka, dan tidak boleh mengandung spasi, karakter khusus, atau emoji.
              </small>
          </div>
          
          <div class="form-group col-8">
              <label for="password_confirmation">Masukkan Ulang Password</label>
              <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" value="{{$detail->password_confirmation}}">
              <small id="passwordHelpBlock" class="form-text text-muted">
                Masukkan ulang kata sandi yang baru anda inputkan.
              </small>
          </div>
        </div>
        <div class="card-footer bg-whitesmoke text-left">
          <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block">
                  UBAH
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


@endsection

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
  
  $("#tombol_hide").click(function() {
    $(".ganti").hide(1000);
    $(".province").prop('required',false);
    $(".kabupaten").prop('required',false);
    $(".kecamatan").prop('required',false);
    $(".kelurahan").prop('required',false);
  })

  $("#tombol_show").click(function() {
    $(".ganti").show(1000);
    $(".province").prop('required',true);
    $(".kabupaten").prop('required',true);
    $(".kecamatan").prop('required',true);
    $(".kelurahan").prop('required',true);
  })

});
</script>


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
