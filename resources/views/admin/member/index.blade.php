@extends('admin.utama')
@section('content')
<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
      <div class="card">
        <div class="card-header">
          <h4>Data Member</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              <div class="table-responsive">
                <table class="table table-bordered table-md" id="member_request">
                  <thead>
                    <tr>
                      <th class="text-center">No.</th>
                      <th class="text-center">Aksi</th>
                      <th class="text-center">Nama</th>
                      <th class="text-center">Alamat</th>
                      <th class="text-center">Jenis Kelamin</th>
                      <th class="text-center">Pendidikan</th>
                    </tr>
                  </thead>
                  <tbody> 
                      @foreach ($members as $key => $member)   
                      <tr>
                          <td class="text-center">
                            {{ $key+1 }}
                          </td>
                          <td class="text-center">
                            <div class="d-flex d-inline justify-content-center">
                            <a href="{{ route('admin.member.edit', $member->id) }}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a href="{{ route('admin.member.edit', $member->id) }}">
                            <a class="btn btn-sm btn-info ml-1" href="{{ route('admin.member.show', $member->id )}}"><i class="fa fa-search"></i></a>
                            <form action="{{ route('admin.member.delete', $member->id) }}" method="POST">
                              @csrf
                              @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger ml-1" onclick="return confirm('Apa Anda yakin ?');"><i class="fa fa-trash"></i></button>
                            </form>
                          </div>
                          </td>
                          <td class="text-center">{{ $member->name }}</td>
                          <td class="text-center">{{ $member->address }}</td> 
                          <td class="text-center">{{ $member->gender }}</td>
                          <td class="text-center">{{ $member->education->education }}</td>  
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
  </div>
@endsection

@section('js')
 <script>
   $(document).ready(function() {
    $('#member_request').DataTable();

  } );
 </script>   
@endsection