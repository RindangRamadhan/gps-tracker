@extends('layouts.app')

@section('content')
  <!-- Breadcrumb-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a style="color: #73818f" href="/home"> Dashboard </a>
    </li>
    <li class="breadcrumb-item active">Cars</li>
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
              <th>Plate Number</th>
              <th>Action</th>
            </tr>
        </thead>
        <tbody>
          @foreach($cars as $car)
            <tr>
              <td>{{ $car->name }}</td>
              <td>{{ $car->plate_number }}</td>
              <td style="text-align: center;">
                <a class="btn btn-success" href="#">
                  <i class="icon-pencil"></i>
                </a>
                <a class="btn btn-danger" href="#">
                  <i class="icon-trash"></i>
                </a>
                </a>
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
    <a 
      href="{{ url('/cars/create') }}" 
      class="btn btn-icon btn-info">
        <i class="icon-plus"></i>
    </a>
  </div>
@endsection

@section('scripts')
<script>
  @if (Session::get('status') == 200)
    $(document).ready(function(){
      let heading = "@lang('admin.pages.notif.success')"
      let text = "@lang('admin.pages.notif.msg_success')"
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
    let heading = "@lang('admin.pages.notif.success')"
    let text = "@lang('admin.pages.notif.msg_delete')"
    let text_cancel = "@lang('admin.pages.notif.msg_cancel')"
    let icon = 'success';
    let loaderBg = '#007d47';

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url: "categories/"+id,
      type: 'DELETE',
      dataType: "JSON",
      success: function (resp){
        if(resp.status == 200) {
          showToast(heading, text, icon, loaderBg)

          setTimeout(() => {
            location.reload()
          }, 1000);
        } else {
          showToast("@lang('admin.pages.notif.failed')", text_cancel, "warning", "#bf2400")
        }
      },
      error: function(xhr) {
        console.log(xhr.responseText);
      }
    });
  }
</script>
@endsection