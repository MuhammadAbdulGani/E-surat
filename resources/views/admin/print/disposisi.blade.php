<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<title>Pengajuan {{ $submission->Letter->name }} oleh {{ $submission->user->name }} | {{ config('app.name') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
	<meta content="Themesbrand" name="author" />
	<!-- App favicon -->
	<link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}">
	<link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" id="bootstrap-light" rel="stylesheet" type="text/css" />
	<style type="text/css">
		body {
			width: 100%;
			height: 100%;
			margin: 0 auto;
			background-color: #FAFAFA;
			font: 12pt "Tahoma";
		}
		* {
			box-sizing: border-box;
			-moz-box-sizing: border-box;
		}

		page {
			background: white;
			display: block;
			margin: 0 auto;
		}

		page[size="A4"] {
			width: 21cm;
		}

		@media print {
			html, body {
				width: 210mm;
				height: 297mm;
				margin: 0;
				padding: 0;
			}
		}
	</style>
</head>

<body>
	<page size="A4">
		<div class="row">
			<div class="col-2">
				<img class="mt-5 ml-2" src="{{ asset(setting('leftlogo')) }}" width="100%">
			</div>
			<div class="col-8">
				<h2 class="mt-5 text-center" style="text-decoration-line: underline">LEMBAR DISPOSISI</h2>
				<h5 class="mt-5 text-center">MAHKAMAH AGUNG  REPUBLIK INDONESIA</h5>
				<h5 class="mt-2 text-center">DIREKTORAT JENDERAL BADAN PERADILAN UMUM</h3>
				<p class="text-center mb-0">JL. Jenderal A. Yani Kav. 58 (Bypass) Cempaka Putih Timur, Jakarta Pusat</p>
				<p class="text-center mb-0">Faksimile  (021) 29079197 atau PO. BOX 1148  Jkt 13011 JAT</p>
			</div>
		</div>
		<hr>
		<div class="pl-3 pr-3 mt-3">
			<div class="row">
				<div class="col-12">
					<h3 class="text-center">{{ $submission->letter->name }}</h3>
					<p class="text-center h5">NOMOR: {{ $submission->number ?? '-' }}</p>
				</div>
			</div>
            <div class="row">
                <div class="col-12">
					<table style="width: 100%">
						<thead>
							<tr>
								<td style="width: 15%;">Surat Dari</td>
								<td style="width: 2%;">:</td>
								<td>{{$submission->user->name}}</td>
							</tr>
							<tr>
								<td style="width: 15%;">Nomor Surat</td>
								<td style="width: 2%;">:</td>
								<td>{{$submission->number}}</td>
							</tr>
							<tr>
								<td style="width: 15%;">Tanggal Surat</td>
								<td style="width: 2%;">:</td>
								<td>{{Format(date('Y-m-d', strtotime($submission->created_at)))}}</td>
							</tr>
							<tr>
								<td style="width: 15%;">Perihal</td>
								<td style="width: 2%;">:</td>
								<td>{{ $submission->letter->name }}</td>
							</tr>
						</thead>
					</table>
                </div>
            </div>
			<hr>
            <div class="row">
                <div class="col-12">
					<p>Status</p>
					@forelse ($log as $item)
					<table style="width: 100%;">
						<tbody>
							<tr>
								<td style="width: 15%;">Tanggal Terima</td>
								<td style="width: 2%;">:</td>
								<td>{{Format(date('Y-m-d', strtotime($item->created_at)))}}</td>
							</tr>
							<tr>
								<td style="width: 15%;">Status</td>
								<td style="width: 2%;">:</td>
								<td>{{$item->activity.' - '.$item->role}}</td>
							</tr>
						</tbody>
					</table>
					<hr>
					@empty
					-
					@endforelse

                </div>
            </div>
			{{-- <div class="row">
				<div class="col-12">
					@yield('content')
					
				</div>
			</div> --}}
				<div class="row justify-content-between">
					<div class="col-6">
					  
					</div>
					<div class="col-6 text-center">
						@if (in_array($submission->approval_status, array(CheckRole::STATUS_STAFF['TO_PT_PTN'], CheckRole::STATUS_DIRJEN['APPROVE'])))
						{{Format(date('Y-m-d', strtotime(now())))}}
						<br>
						<br>
						<br>
						<br>
						<br>
						{{$signature->name}}
						<hr>
						{{$signature->position}}
					@endif
					</div>
				  </div>
		</div>
	</page>
	<script src="{{ URL::asset('assets/libs/jquery/jquery.min.js') }}"></script>
	<script src="{{ URL::asset('assets/libs/bootstrap/bootstrap.min.js') }}"></script>
	{{-- <script type="text/javascript">
		window.print();
	</script> --}}
</body>

</html>
