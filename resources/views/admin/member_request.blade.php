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
        <div class="card-header">
          <h4>Data Request Member</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              <div class="table-responsive">
                <table class="table table-bordered table-md" border="1" id="member_request">
                  <thead>
                    <tr>
                      <th class="text-center">No.</th>
                      <th class="text-center">Nama</th>
                      <th class="text-center">Alamat</th>
                      <th class="text-center">Pendidikan</th>
                      <th class="text-center">Status</th>
                      <th class="text-center"></th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($members as $key => $member)  
                      
                      <tr>
                          <td class="text-center">
                            {{ $key+1 }}
                          </td>
                          <td class="text-center">{{ $member->name }}</td>
                          <td class="text-center">{{ $member->address }}</td> 
                          <td class="text-center">{{ $member->education->education }}</td>  
                          <td class="text-center">{{ $member->is_active == false ? 'Belum Dikonfirmasi' : 'Sudah Dikonfirmasi'}}</td>  
                          <td>
                            <button class="btn btn-sm btn-success"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-sm btn-info" href="{{url('admin/request/detail')}}"><i class="fa fa-search"></i></button>
                            <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                            <button title="Hapus" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#confirmApprove" data-url="{{ route('admin.member.approve', $member->id) }}" title="Hapus"><i class="fas fa-{{ $member->is_active == false ? 'check' : 'ban'  }}"></i></button>
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
  </div>
  
@endsection
@section('modal')
  <div class="modal fade" id="confirmApprove" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <form action="" method="post">
              @csrf
              @method('put')
                  <div class="modal-header">
                      <h5 class="modal-title">Peringatan</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <p>Apakah Anda yakin ?</p>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-danger">Ya</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
@endsection
@section('js')
 <script>
   $(document).ready(function() {
    $('#member_request').DataTable();
      
  });
  $('#confirmApprove').on('show.bs.modal', (e) => {
      var url = $(e.relatedTarget).data('url');
      var confirm = $(e.relatedTarget).data('confirm');

      $(e.currentTarget).find('form').attr('action', url);
  });
 </script>   
@endsection