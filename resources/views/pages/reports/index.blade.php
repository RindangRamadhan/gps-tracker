@extends('layouts.app')

@section('content')
  <!-- Breadcrumb-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item active">Reports</li>
    <!-- Breadcrumb Menu-->
    <li class="breadcrumb-menu d-md-down-none">
      <div class="btn-group" role="group" aria-label="Button group">
        <a class="btn" href="Javascript:void(0)">
          <i class="icon-book-open"></i>
        </a>
      </div>
    </li>
  </ol>
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-sm-3">
          <input type="text" class="form-control" name="periode" id="datepicker" />
        </div>
        <div class="col-sm-3" style="padding: 0">
          <button class="btn btn-tumblr" id="btnReport" type="button">
            <i class="icon-magnifier"></i> Search
          </button>
        </div>
      </div>
      <br>
      
      <div class="table-responsive">
        <table id="example" class="table table-sm table-striped" style="width:100%; border: 1px solid #e9ecef;">
          <thead>
            <tr>
              <th>No. </th>
              <th>Waktu </th>
              <th>No. SJ Pengiriman</th>
              <th>No. Mobil</th>
              <th>Nik Driver</th>
              <th>Nama Driver</th>
              <th>Km Awal</th>
              <th>KM Akhir</th>
              <th>Km Pengiriman</th>
              <th>Nama Toko</th>
            </tr>
          </thead>
          <tbody id="tbody">
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
    <button 
      type="button" 
      class="btn btn-icon btn-info"
      id="btnPrint" style="display: none">
        <i class="icon-printer"></i>
    </button>
    </a>
  </div>
@endsection

@section('scripts')
<script> 
  // Action Search
  $(document).on('click', '#btnReport', function (e) {
    const periode = $("#datepicker").val()
    let heading = "Success"
    let text = "Data Found"
    let icon = 'success';
    let loaderBg = '#007d47';
    
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url: "reports/search/"+periode,
      type: 'POST',
      dataType: "JSON",
      success: function (resp){
        if(resp.data.length > 0) {
          showToast(heading, text, icon, loaderBg)
          let html = ""

          resp.data.forEach((val, i) => {
            html += `
              <tr>
                <td>${i+1}</td>
                <td>${val.created_at}</td>
                <td>${val.sj_number}</td>
                <td>${val.car.plate_number}</td>
                <td>${val.driver.nik}</td>
                <td>${val.driver.name}</td>
                <td>${val.curr_km} km</td>
                <td>${val.last_km} km</td>
                <td>${val.last_km - val.curr_km} km</td>
                <td>${val.delivery_location}</td>
              </tr>
            `
          })

          $("#tbody").html(html)
          $("#btnPrint").show()
        } else {
          heading = "Warning"
          text = "Data Not Found"
          icon = "warning"
          loaderBg = "#94000e"
          showToast(heading, text, icon, loaderBg)
          $("#tbody").html()
        }
      },
      error: function(xhr) {
        console.log(xhr.responseText);
      }
    });
  })
  // Action Print
  $(document).on('click', '#btnPrint', function (e) {
    const periode = $("#datepicker").val()

    window.open("reports/print/"+periode, "_blank");
  })
</script>
@endsection