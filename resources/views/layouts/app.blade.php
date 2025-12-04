<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<!--[if IE]>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<![endif]-->
		<meta name="keyword" content="{{ __('project_title') }}">
		<meta name="description" content="{{ __('project_title') }}">
	    <meta name="author" content="{{ __('project_title') }}">
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>{{ __('project_title') }}</title>
		<!-- =-=-=-=-=-=-= Favicons Icon =-=-=-=-=-=-= -->
		<link rel="icon" href="{{ asset('common-assets/img/favicon.png') }}" type="image/x-icon" />
		<!-- =-=-=-=-=-=-= Mobile Specific =-=-=-=-=-=-= -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<!-- ==============> EXALTED SOLUTION CSS <====================== -->
		<link rel="stylesheet" href="{{ asset('front-assets/css/es.css') }}">
		<!-- =-=-=-=-=-=-= Bootstrap CSS Style =-=-=-=-=-=-= -->
		<link rel="stylesheet" href="{{ asset('front-assets/css/bootstrap.css') }}">
		<!-- =-=-=-=-=-=-= Template CSS Style =-=-=-=-=-=-= -->
		<link rel="stylesheet" href="{{ asset('front-assets/css/style.css') }}">
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<!-- =-=-=-=-=-=-= Font Awesome =-=-=-=-=-=-= -->
		<link rel="stylesheet" href="{{ asset('front-assets/css/font-awesome.css') }}" type="text/css">
		<!-- =-=-=-=-=-=-= Flat Icon =-=-=-=-=-=-= -->
		<link href="{{ asset('front-assets/css/flaticon.css') }}" rel="stylesheet">
		<!-- =-=-=-=-=-=-= Et Line Fonts =-=-=-=-=-=-= -->
		<link rel="stylesheet" href="{{ asset('front-assets/css/et-line-fonts.css') }}" type="text/css">
		<!-- =-=-=-=-=-=-= Menu Drop Down =-=-=-=-=-=-= -->
		<link rel="stylesheet" href="{{ asset('front-assets/css/carspot-menu.css') }}" type="text/css">
		<!-- =-=-=-=-=-=-= Animation =-=-=-=-=-=-= -->
		<link rel="stylesheet" href="{{ asset('front-assets/css/animate.min.css') }}" type="text/css">
		<link rel="stylesheet" href="{{ asset('front-assets/css/dropzone.css') }}" type="text/css">
		<!-- =-=-=-=-=-=-= Select Options =-=-=-=-=-=-= -->
		<link href="{{ asset('front-assets/css/select2.min.css') }}" rel="stylesheet" />
		<!-- =-=-=-=-=-=-= noUiSlider =-=-=-=-=-=-= -->
		<link href="{{ asset('front-assets/css/nouislider.min.css') }}" rel="stylesheet">
		<!-- =-=-=-=-=-=-= Listing Slider =-=-=-=-=-=-= -->
		<link href="{{ asset('front-assets/css/slider.css') }}" rel="stylesheet">
		<!-- =-=-=-=-=-=-= Owl carousel =-=-=-=-=-=-= -->
		<link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/owl.carousel.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/owl.theme.css') }}">
		<!-- =-=-=-=-=-=-= Check boxes =-=-=-=-=-=-= -->
		<link href="{{ asset('front-assets/skins/minimal/minimal.css') }}" rel="stylesheet">
		<!-- =-=-=-=-=-=-= PrettyPhoto =-=-=-=-=-=-= -->
		<link rel="stylesheet" href="{{ asset('front-assets/css/jquery.fancybox.min.css') }}" type="text/css" media="screen"/>
		<!-- =-=-=-=-=-=-= Responsive Media =-=-=-=-=-=-= -->
		<link href="{{ asset('front-assets/css/responsive-media.css') }}" rel="stylesheet">
		<!-- =-=-=-=-=-=-= Template Color =-=-=-=-=-=-= -->
		<link rel="stylesheet" id="color" href="{{ asset('front-assets/css/colors/defualt.css') }}">
		<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600%7CSource+Sans+Pro:400,400i,600" rel="stylesheet">
		
		
		<link rel="stylesheet" href="https://unpkg.com/simplebar/dist/simplebar.min.css">
		
		<!-- =-=-=-=-=-=-= Datatables =-=-=-=-=-=-= -->
		<link href="{{ asset('front-assets/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
		
		<!-- Daterangepikcer CSS -->
		<link rel="stylesheet" href="{{ asset('front-assets/plugins/daterangepicker/daterangepicker.css') }}">
		
		<!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdn.datatables.net/2.0.0/css/dataTables.bootstrap.css" rel="stylesheet">--> 
		
		
		<!-- JavaScripts -->
		<script src="{{ asset('front-assets/js/modernizr.js') }}"></script>
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		
		@yield('component-style')
	</head>
	<body>
		@if(!request()->routeIs('login') && !request()->routeIs('register') && !request()->routeIs('password.request') && !request()->routeIs('password.reset') && !request()->routeIs('verification.phone') && !request()->routeIs('verify.phone.otp'))
			@include('_includes/header')
		@endif
		
			@yield('content')
			
		@if(!request()->routeIs('login') && !request()->routeIs('register') && !request()->routeIs('password.request') && !request()->routeIs('password.reset') && !request()->routeIs('verification.phone') && !request()->routeIs('verify.phone.otp'))
			@include('_includes/footer')
		@endif
		<!-- =-=-=-=-=-=-= JQUERY =-=-=-=-=-=-= -->
		<script src="{{ asset('front-assets/js/jquery.min.js') }}"></script>
		<!-- Bootstrap Core Css  -->
		<script src="{{ asset('front-assets/js/bootstrap.min.js') }}"></script>
		<!-- Jquery Easing -->
		<script src="{{ asset('front-assets/js/easing.js') }}"></script>
		<!-- Menu Hover  -->
		<script src="{{ asset('front-assets/js/carspot-menu.js') }}"></script>
		<!-- Jquery Appear Plugin -->
		<script src="{{ asset('front-assets/js/jquery.appear.min.js') }}"></script>
		<!-- Numbers Animation   -->
		<script src="{{ asset('front-assets/js/jquery.countTo.js') }}"></script>
		<!-- Jquery Select Options  -->
		<script src="{{ asset('front-assets/js/select2.min.js') }}"></script>
		<!-- noUiSlider -->
		<script src="{{ asset('front-assets/js/nouislider.all.min.js') }}"></script>
		<!-- Carousel Slider  -->
		<script src="{{ asset('front-assets/js/carousel.min.js') }}"></script>
		<script src="{{ asset('front-assets/js/slide.js') }}"></script>
		<!-- Image Loaded  -->
		<script src="{{ asset('front-assets/js/imagesloaded.js') }}"></script>
		<script src="{{ asset('front-assets/js/isotope.min.js') }}"></script>
		<!-- CheckBoxes  -->
		<script src="{{ asset('front-assets/js/icheck.min.js') }}"></script>
		<!-- Jquery Migration  -->
		<script src="{{ asset('front-assets/js/jquery-migrate.min.js') }}"></script>
		<!-- Style Switcher -->
		<script src="{{ asset('front-assets/js/color-switcher.js') }}"></script>
		<!-- PrettyPhoto -->
		<script src="{{ asset('front-assets/js/jquery.fancybox.min.js') }}"></script>
		<!-- Wow Animation -->
		<script src="{{ asset('front-assets/js/wow.js') }}"></script>
		<!-- Template Core JS -->
		<script src="{{ asset('front-assets/js/custom.js') }}"></script>
		
		<!-- Datatables JS -->
		<script src="{{ asset('front-assets/js/jquery.dataTables.min.js') }}"></script>
		<script src="{{ asset('front-assets/js/dataTables.bootstrap4.min.js') }}"></script>
		
		<script src="https://unpkg.com/simplebar/dist/simplebar.min.js"></script>
		
		<!-- Datetimepicker JS -->
		<script src="{{ asset('front-assets/js/moment.min.js') }}"></script>
		
		<script src="{{ asset('front-assets/js/bootstrap-datetimepicker.min.js') }}"></script>
		
		<!-- Daterangepikcer JS -->
		<script src="{{ asset('front-assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
		
		<link rel="stylesheet" href="{{ asset('common-assets/css/toastr.min.css') }}"/>
		<script src="{{ asset('common-assets/js/toastr.min.js') }}"></script>
			{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script> --}}

		<script type="text/javascript">
			$(function(){
				var url = "{{ route('changeLang') }}";
				$(document).on("click", "ul.languageChange li a", function(e) {
					window.location.href = url + "?lang="+ $(this).data('id');
				});
			});		
		</script>
		<script>
			@if(Session::has('message'))
				var msg = "{{ session('message') }}";
				var type = 'success';
				toastr_msg(msg, type);
			@endif

			@if(Session::has('error'))
				var msg = "{{ session('error') }}";
				var type = 'error';
				toastr_msg(msg, type);
			@endif

			@if(Session::has('info'))
				var msg = "{{ session('info') }}";
				var type = 'info';
				toastr_msg(msg, type);
			@endif

			@if(Session::has('warning'))
				var msg = "{{ session('warning') }}";
				var type = 'warning';
				toastr_msg(msg, type);
			@endif
			function toastr_msg(msg, type){
				toastr.options =
				{
					"closeButton" : true,
					"progressBar" : true
				}
				toastr[type](msg);
			}
		</script>
		@yield('scripts')
		@yield('component-scripts')
	</body>
</html>