<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Reports | {{config('app.name')}}</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Bootstrap 4.1.1 -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  <!-- Theme style -->
  <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css">
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="https://unpkg.com/@coreui/icons/css/coreui-icons.min.css"> -->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.3.0/css/flag-icon.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('/js/jquery-toast-plugin/jquery.toast.min.css')}}">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{asset('css/custom-data-table.css')}}">
  <link rel="stylesheet" href="{{asset('css/styles.css')}}">
  <link rel="shortcut icon" type="image/png" href="{{ asset('/image/logo/indomaret.jpg') }}"/>

</head>
<body onload="window.print()">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h5>
						<center> 
							<b>LAPORAN PERHITUNGAN KM PENGIRIMAN</b> 

							<table style="text-align: center">
								<tbody>
									<tr><td style="font-size: 15px"><b> PT. Indomarco Prismatama </b></td></tr>
									<tr><td width="100%" style="font-size: 14px"> Bandar Lampung </td></tr>
								</tbody>
							</table>
						</center>
				</h5>
			</div>

			<div class="col-md-6">
				<table>
					<tbody>
						<tr style="text-align: right"><td>Periode</td> <td width="5%">: </td> <td id="periode"> </td></tr>
					</tbody>
				</table>
			</div>
			<div class="col-md-6">
				<table class="pull-right">
					<tbody>
						<tr style="text-align: right"><td>Tanggal</td> <td width="5%">: </td> <td id="currDate"> </td></tr>
					</tbody>
				</table>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">

				<table class="table table-bordered">
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
				</thead>
				<tbody>
					@php $no = 0; @endphp
					@foreach ($reports as $val)
            @php $no += 1; @endphp
            <tr>
              <td>{{ $no }}</td>
              <td>{{ $val->created_at }}</td>
              <td>{{ $val->sj_number }}</td>
              <td>{{ $val->car->plate_number }}</td>
              <td>{{ $val->driver->nik }}</td>
              <td>{{ $val->driver->name }}</td>
              <td>{{ $val->curr_km }} km</td>
              <td>{{ $val->last_km }} km</td>
              <td>{{ $val->last_km - $val->curr_km }} km</td>
              <td>{{ $val->delivery_location }}</td>
            </tr>
					@endforeach
				</tbody>
			</table>

		</div>

		<div class="col-sm-9"></div>
		<div class="col-sm-3" style="text-align: right; font-weight: bold">
			<font>
        Petugas <br><br><br> 



        .............
      </font>
		</div> <!--/ col-sm-6-->

	</div>
</body>
<!-- jQuery 3.1.1 -->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>

<script>
  $(document).ready(function() {
    const start = moment("{{ $start }}").format('LL');
    const end = moment("{{ $end }}").format('LL');
    const periode = `${start} - ${end}`

    $('#currDate').text(moment().format('LL'));
    $('#periode').text(periode) ;
  })
</script>
</html>
