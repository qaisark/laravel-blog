<!DOCTYPE html>
<html>
<head>
	<title>QA</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		body{
			background: #f4f7f6;
			color:#202121;
			font-family: helvetica neue,Helvetica,Arial,sans-serif;
		}
		h1,h2,h3,h4,h5,h6{
			color:#337ab7 !important;
		}
		p{
			color:#535353;
			font-size:18px;
			font-family: Helvetica,Arial,sans-serif;
		}
		a{
			text-decoration: none !important;
			outline: none;
			color: #222222;
		}
		a:hover{
			color: #216a94;
		}
	</style>
</head>
<body>
	<div class="container">
		@include('inc.messages')
		<div>
				@yield('content')
		</div>
		<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
		<script>
			CKEDITOR.replace( 'article-ckeditor' );
		</script>
	</div>
</body>
</html>
