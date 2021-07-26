@extends('admin.utama')
@section('content')
<div class="row">
  <div class="col-lg-4 col-md-6 col-sm-12">
    <div class="card">
      <div class="card-header">
        <h4>Tambah admin</h4>
      </div>
      <div class="card-body">
        <form action="{{route('admin.admin.update', $admin->id)}}" method="post">
          @csrf
          <input type="hidden" name="id" value="{{$admin->id}}">
          <div class="form-group">
            <label class="form-label" for="name">Nama Panggilan</label>
            <input type="text" class="form-control" id="name" value="{{$admin->user->name}}" name="name" required>
          </div>
          <div class="form-group">
            <label class="form-label" for="email">Email</label>
            <input type="email" class="form-control" id="email" value="{{$admin->user->email}}" name="email" required>
          </div>
          <div class="form-group">
            <label class="form-label" for="password">Password <small>*optional</small></label>
            <input type="password" class="form-control" id="password" value="" name="password">
          </div>
          
          <div class="form-group">
            <label class="form-label" for="fullname">Nama Lengkap</label>
            <input type="text" class="form-control" id="fullname" value="{{$admin->fullname}}" name="fullname" required>
          </div>
          <div class="form-group">
            <label class="form-label" for="phone_number">No Telepon</label>
            <input type="number" class="form-control" id="phone_number" value="{{$admin->phone_number}}" name="phone_number" required>
          </div>
          <div class="form-group">
            <label class="form-label" for="fulladdress">Alamat Lengkap</label>
            <textarea class="form-control" id="fulladdress" name="fulladdress" required>{{ $admin->fulladdress }}</textarea>
          </div>
      </div>
      <div class="card-footer bg-whitesmoke text-right">
        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
      </form>
        <a href="{{ route('admin.admin.add') }}" class="btn btn-danger"><i class="fa fa-times"></i> Batal</a>
      </div>
    </div>
  </div>
</div>

@endsection
@section('js')
 <script>
   $(document).ready(function() {
    $('#member_request').DataTable();
      
  });
 </script>   
@endsection