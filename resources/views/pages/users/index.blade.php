@extends('layouts.app')

@section('content')
  <!-- Breadcrumb-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Master Data</li>
    <li class="breadcrumb-item active">Users</li>
    <!-- Breadcrumb Menu-->
    <li class="breadcrumb-menu d-md-down-none">
      <div class="btn-group" role="group" aria-label="Button group">
        <a class="btn" href="/home">
          <i class="icon-speedometer"></i>
        </a>
        <a style="color: #73818f" href="Javascript:void(0)">/</a>
        <a class="btn" href="Javascript:void(0)">
          <i class="icon-grid"></i>
        </a>
      </div>
    </li>
  </ol>
  <div class="card">
    <div class="card-body">
      <div class="table-responsive">
      <table id="example" class="table table-sm table-striped" style="width:100%; border: 1px solid #e9ecef;">
        <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
            </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
            <tr>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>
                @if($user->role)
                  {{ $user->role }}
                @else
                  Admin
                @endif
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  
  <!-- Button Floating Fix -->
  <div class="footer-buttons">
    <button 
      type="button" 
      class="btn btn-icon btn-warning"
      onClick="window.location.reload();">
        <i class="icon-refresh"></i>
    </button>
    <!-- <a 
      href="{{ url('/users/create') }}" 
      class="btn btn-icon btn-info">
        <i class="icon-plus"></i>
    </a> -->
  </div>

  <!-- Modal Delete -->
  <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalDeleteLabel">Delete Confirmation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <p style="margin: 0">You Want to Delete ?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Cancel
          </button>
          <button type="button" class="btn btn-danger" data-id="" id="btn-confirm">
            Yes
          </button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
<script>
  @if (Session::get('status') == 200)
    $(document).ready(function() {
      let heading = "Success"
      let text = "Data has been saved"
      let icon = 'success';
      let loaderBg = '#007d47';
      
      showToast(heading, text, icon, loaderBg)
    });
  @endif

  // Action Delete
  $(document).on('click', '.btn-delete', function (e) {
    e.preventDefault();

    // alert($(this).attr("data-id") +" "+ $(this).attr("data-name"))
    $("#btn-confirm").attr("data-id", $(this).attr("data-id"))
    $("#modalDelete").modal('show')
  })

  // Action Confirm Delete
  $(document).on('click', '#btn-confirm', function (e) {
    e.preventDefault();
    
    let id = $(this).attr("data-id")

    $("#modalDelete").modal('hide')

    deleteProcess(id)
  })

  function deleteProcess(id) {
    let heading = "Success"
    let text = "Data has been deleted"
    let icon = 'success';
    let loaderBg = '#007d47';

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url: "users/"+id,
      type: 'DELETE',
      dataType: "JSON",
      success: function (resp){        
        showToast(heading, text, icon, loaderBg)

        setTimeout(() => {
          location.reload()
        }, 500);
      },
      error: function(xhr) {
        console.log(xhr.responseText);
      }
    });
  }
</script>
@endsection