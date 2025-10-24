<!-- =-=-=-=-=-=-= Preloader =-=-=-=-=-=-= -->
<!-- <div class="preloader"></div> -->
<!-- =-=-=-=-=-=-= Color Switcher =-=-=-=-=-=-= -->
<!-- =-=-=-=-=-=-= Main Header =-=-=-=-=-=-= -->
<div class="colored-header">
 <!-- Top Bar -->
 <div class="header-top dark">
	<div class="container">
	   <div class="row">
		  <!-- Header Top Left -->
		  {{--<div class="header-top-left col-md-12">
			 <ul class="listnone">
			 </ul>
		  </div>--}}
		  <!-- Header Top Right Social -->
		  <div class="header-right col-md-12 ">
			 <div class="pull-right">
				<ul class="listnone">
				<li class="dropdown">
					@php
						$lang = 'EN';
					@endphp
					@if(session()->get('locale') == 'en')
						@php
							$lang = 'English';
						@endphp
					@elseif(session()->get('locale') == 'mr')
						@php
							$lang = 'Marathi';
						@endphp
					@endif
					
					
					
				   <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-globe" aria-hidden="true"></i> {{$lang}} <span class="caret"></span></a>
				   <ul class="dropdown-menu languageChange">
					  <li><a href="javascript:void(0)" data-id="en">English</a></li>
					  <li><a href="javascript:void(0)" data-id="mr">Marathi</a></li>
				   </ul>
				</li>
				@if(Auth::user())
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="myname"> {{ Auth::user()->name }} </span> <span class="caret"></span></a>
				  <ul class="dropdown-menu">
					@if(auth()->user()->user_type == 1)
					 <li><a href="{{ route('my-account')}}">{{ __('my_account') }}</a></li>
				    @endif
					 <li><a href="{{ route('change-password')}}">{{ __('change_password') }}</a></li>
					 <li><a href="{{ route('logout') }}">{{ __('log_out') }}</a></li>
				  </ul>
				</li>
				@else
				<li><a href="{{ route('login') }}"><i class="fa fa-sign-in"></i> {{ __('log_in') }}</a></li>
				<li class="hidden-xs1 hidden-sm1"><a href="{{ route('register') }}"><i class="fa fa-unlock" aria-hidden="true"></i> {{ __('register') }}</a></li>
				@endif
				</ul>
			 </div>
		  </div>
	   </div>
	</div>
 </div>
 <!-- Top Bar End -->
 <!-- Navigation Menu -->
 <div class="clearfix"></div>
 <!-- menu start -->
 <nav id="menu-1" class="mega-menu">
	<!-- menu list items container -->
	<section class="menu-list-items">
	   <div class="container">
		  <div class="row">
			 <div class="col-lg-12 col-md-12">
				<!-- menu logo -->
				<ul class="menu-logo">
				   <li>
					  <a href=""><img src="{{ asset('common-assets/img/-logo1.png') }}" style="height: 55px;" alt="logo"> </a>
				   </li>
				</ul>
				<!-- menu links -->
				@if(Auth::user())
				<ul class="menu-links">
					<li>
						<a href="{{ route('dashboard') }}"> {{ __('home') }}</a>
					</li>
					@if(auth()->user()->user_type == 1)
					<li>
						<a href="{{ route('submit-grievance') }}"> {{ __('submit_grievance') }}</a>
					</li>
					@endif
					<li>
						<a href="{{ route('grievance') }}"> {{ __('view_grievance') }}</a>
					</li>
				</ul>
				@endif
			 </div>
		  </div>
	   </div>
	</section>
 </nav>
 <!-- menu end -->
</div>
<!-- =-=-=-=-=-=-= Main Header End  =-=-=-=-=-=-= -->