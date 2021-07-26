@extends('admin.utama')
@section('content')
<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <strong>{{ $message }}</strong>
        </div>
        @endif
      <div class="card">
        <div class="card-header d-flex d-inline">
            <div class="col"><h4>Data Admin</h4></div>
            <div class="col text-right"><a href="{{route('admin.admin.add')}}"><i class="fas fa-plus"></i></a></div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              <table class="table table-bordered table-md" border="1" id="member_request">
                <thead>
                  <tr>
                    <th class="text-center">No.</th>
                    <th class="text-center">Nama Lengkap</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($admin as $key => $adm)  
                    
                    <tr>
                        <td class="text-center">
                          {{ $key+1 }}
                        </td>
                        <td class="text-center">{{ $adm->fullname }}</td>
                        <td class="text-center">{{ $adm->user->email }}</td> 
                        <td class="text-center">
                          <div class="d-flex d-inline justify-content-center">
                          <a href="{{ route('admin.admin.edit', $adm->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                          <form action="{{ route('admin.admin.delete', $adm->id) }}" method="POST">
                            @csrf
                            @method('delete'  )
                          <button type="submit" class="btn btn-sm btn-danger ml-1" onclick="return confirm('Apa Anda yakin ?');"><i class="fa fa-trash"></i></button>
                          </form> 
                        </div>
                        </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
            </div>
          </div>
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