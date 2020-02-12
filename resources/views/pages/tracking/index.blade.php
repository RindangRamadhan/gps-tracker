@extends('layouts.app')

@section('content')
  <!-- Breadcrumb-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item active">Tracking</li>
    <!-- Breadcrumb Menu-->
    <li class="breadcrumb-menu d-md-down-none">
      <div class="btn-group" role="group" aria-label="Button group">
        <a class="btn" href="Javascript:void(0)">
          <i class="icon-map"></i>
        </a>
      </div>
    </li>
  </ol>
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-sm-3" style="display: none">
          <select id="driver" class="form-control select2" name="driver" required autofocus>
            <option></option>
          </select>
        </div>
        <div class="col-sm-3" >
          <button class="btn btn-tumblr" id="btnTracking" type="button">
            <i class="icon-location-pin"></i> Tracking
          </button>
        </div>
      </div>
      <br>

      <!-- <iframe 
        width="100%" 
        height="300" 
        id="mapEmbed" 
        src="https://maps.google.com/maps?q=&t=&z=15&output=embed" 
        frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
      >
      </iframe> -->
      <div id="mymap" style="height: 400px;"></div>
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
  </div>
@endsection

<style>
  .select2-container--default .select2-selection--single {
    height: 37px !important;
  }

  .select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #444;
    line-height: 34px !important;
  }

  .select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 34px !important;
    position: absolute;
    top: 1px;
    right: 1px;
    width: 20px;
  }

</style>


@section('scripts')
<script src="http://maps.google.com/maps/api/js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>

<script>  
  let map
  $(document).ready(function(){
    map = new GMaps({
      el: '#mymap',
      zoom: 16,
      lat: -12.043333,
      lng: -77.028333
    });

    getCurrentLocation();
  });

  $(document).ready(function() {
    let drivers = <?php echo $drivers; ?>;
    let driver = []
        
        drivers.forEach(val => {
          driver.push({
            id: val.driver.user_id,
            text: `${val.driver.name}`,
          })
        });

    $('#driver').select2({
      data: driver,
      placeholder: 'Select Driver',
      allowClear: true
    });
  })

  // Action Tracking
  $(document).on('click', '#btnTracking', function (e) {
    getCurrentLocation();
  })


  function getCurrentLocation() {
    const id = $("#driver").val()
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
      url: "tracking/search/all",
      type: 'GET',
      dataType: "JSON",
      success: function (resp){
        if(resp.data != null) {
          showToast(heading, text, icon, loaderBg)

          $("#mapEmbed").attr("src", `https://maps.google.com/maps?q=${location.address}&t=&z=15&output=embed`)
          
          var infowindow = new google.maps.InfoWindow();
          var bounds = new google.maps.LatLngBounds();

          resp.data.forEach((el, i) => {
            const location = JSON.parse(el.location);

            console.log(bounds)
            map.setCenter(location.lat, location.long);
            map.setZoom(10)
            map.addMarker({
              lat: location.lat,
              lng: location.long,
              title: location.address,
              click: function(e) {
                displayLocation(position.coords.lat,position.coords.long)
              }
            });
          });
        } else {
          heading = "Warning"
          text = "Data Not Found"
          icon = "warning"
          loaderBg = "#94000e"
          showToast(heading, text, icon, loaderBg)
        }
      },
      error: function(xhr) {
        console.log(xhr.responseText);
      }
    });
  }

  function displayLocation(latitude,longitude){
    var geocoder;
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(latitude, longitude);

    geocoder.geocode(
        {'latLng': latlng}, 
        function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    var add= results[0].formatted_address ;
                    var  value=add.split(",");

                    count=value.length;
                    country=value[count-1];
                    state=value[count-2];
                    city=value[count-3];
                    x.innerHTML = "city name is: " + city;
                }
                else  {
                    x.innerHTML = "address not found";
                }
            }
            else {
                x.innerHTML = "Geocoder failed due to: " + status;
            }
        }
    );
  }
</script>
@endsection