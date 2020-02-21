<!DOCTYPE HTML>
<html>
<head>
	<title>@yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Mosaic Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	
	<!-- Bootstrap Core CSS -->
	<link href="{{url('web/css/bootstrap.css')}}" rel='stylesheet' type='text/css' />
	<!-- Custom CSS -->
	<link href="{{url('web/css/style.css')}}" rel='stylesheet' type='text/css' />
	<!-- Graph CSS -->
	<link href="{{url('web/css/font-awesome.css')}}" rel="stylesheet"> 
	@yield('before-style')
	<!-- jQuery -->
	<!-- lined-icons -->
	<link rel="stylesheet" href="{{url('web/css/icon-font.css')}}" type='text/css' />
	<link rel="stylesheet" type="text/css" media="all" href="{{url('web/css/audio.css')}}">
	
	<link href="{{url('web/css/jplayer.blue.monday.min.css')}}" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="{{url('web/css/custom.css')}}" type='text/css' />
	<link rel="stylesheet" href="{{url('web/css/rating.css')}}" type='text/css' />
	@yield('after-styles')
	
	<!-- //lined-icons -->
	<!-- Meters graphs -->
	<script src="{{url("web/js/jquery-2.1.4.js")}}"></script>
	<script type="text/javascript" src="{{url('web/js/mediaelement-and-player.min.js')}}"></script>
	
</head> 
<body class="sticky-header left-side-collapsed"  onload="initMap()">
	<section>
		@include('web._partial.leftside')
		<div class="main-content">
			@include('web._partial.header')
			<div id="page-wrapper">
				@yield('content')
			</div>
			
		</div>
		
		@include('web._partial.footer')
	</section>
	@yield('before-scripts')
	<script src="{{url('web/js/jquery.nicescroll.js')}}"></script>
	<script src="{{url('web/js/scripts.js')}}"></script>
	<script src="{{url('web/js/classie.js')}}"></script>
	<script src="{{url('web/js/uisearch.js')}}"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="{{url('web/js/bootstrap.js')}}"></script>
	@yield('after-scripts')
</body>
</html>