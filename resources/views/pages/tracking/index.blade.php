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
      <iframe width="100%" height="300" src="https://maps.google.com/maps?q=Jl. Sahabat No.23, RT.002%2FRW.007, Jatimakmur, Kec. Pondokgede, Kota Bks, Jawa Barat 17413&t=&z=15&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
      </iframe>
      <div id="mymap" style="height: 400px; display: none"></div>
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
      map.addControl({
        position: 'top_right',
        content: 'Geolocate',
        style: {
          margin: '5px',
          padding: '1px 6px',
          border: 'solid 1px #717B87',
          background: '#fff'
        },
        events: {
          click: function(){
            GMaps.geolocate({
              success: function(position){
                map.setCenter(position.coords.latitude, position.coords.longitude);
                map.addMarker({
                  lat: position.coords.latitude,
                  lng: position.coords.longitude,
                  title: "City Name",
                  click: function(e) {
                    displayLocation(position.coords.latitude,position.coords.longitude)
                  }
                });
              },
              error: function(error){
                alert('Geolocation failed: ' + error.message);
              },
              not_supported: function(){
                alert("Your browser does not support geolocation");
              }
            });
          }
        }
      });
    });

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

  // $(document).ready(function() {
  //   let mymap = new GMaps({
  //     el: '#mymap',
  //     lat: -6.2804876,
  //     lng: 106.9266031,
  //     zoom: 19
  //   });
    
  //   mymap.addControl({
  //     position: 'top_right',
  //     content: 'My Location',
  //     style: {
  //       margin: '5px',
  //       padding: '1px 6px',
  //       border: 'solid 1px #717B87',
  //       background: '#fff'
  //     },
  //     events: {
  //       click: function(){
  //         navigator.geolocation.getCurrentPosition(showPosition);
  //       }
  //     }
  //   })

  // })
</script>
@endsection