<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<style type="text/css">
		body, html { heigth: 100%;}
		
		body {
			display: flex;
			justify-content: center;
			align-items: center;
		}
	</style>
</head>
<body class="container">
	<form class="form-horizontal" role="form" method="POST" action="uploadfile" enctype="multipart/form-data">											


		@if ($message = Session::get('success'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button>
		        <strong>{{ $message }}</strong>
				<strong>{{ Session::get('path') }}</strong>	
		</div>
		<img src="/images/{{ Session::get('path') }}" style="width:304px;height:228px;">
		@endif

		<!-- <form action="{{ url('image-upload') }}" enctype="multipart/form-data" method="POST"> -->
			{{ csrf_field() }}
			<div class="row">
				<div class="col-md-12">
					<input type="file" name="image" />
				</div>
				<div class="col-md-12">
					<button type="submit" class="btn btn-success">Upload</button>
				</div>
			</div>										
	</form>

	
	
	
    <!-- Scripts -->
	<!-- jQuery -->
	<script src="//code.jquery.com/jquery.js"></script>
	<!-- Bootstrap JavaScript -->
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <!-- <script src="{{ asset('js/app.js') }}"></script>-->
</body>
</html>