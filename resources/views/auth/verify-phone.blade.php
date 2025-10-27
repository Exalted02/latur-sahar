@extends('layouts.app')
@section('content')
	<!-- =-=-=-=-=-=-= Breadcrumb =-=-=-=-=-=-= -->
	{{--<div class="page-header-area-2 gray">
	 <div class="container">
		<div class="row">
		   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			  <div class="small-breadcrumb">
				 <div class="header-page">
					<h1>{{ __('verify_phone_number') }}</h1>
				 </div>
			  </div>
		   </div>
		</div>
	 </div>
  </div>--}}
  <!-- =-=-=-=-=-=-= Breadcrumb End =-=-=-=-=-=-= -->
  <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
  <div class="main-content-area auth-body-bg clearfix" style="background-image: url('{{ asset('front-assets/auth-bg.jpg') }}');">
	 <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
		<!-- Main Container -->
		<div class="container">
		   <!-- Row -->
		   <div class="row d-md-flex align-item-center">
			  <!-- Middle Content Area -->
			  <div class="col-md-4 col-sm-4 col-xs-12">
				<div class="text-center mb_10">
					<a href="{{ route('home') }}"><img src="{{ asset('common-assets/img/auth-logo.png') }}" style="height: 125px;" alt="logo"> </a>
					<div class="hidden-xs">
						<p class="text-white mt_30 text-justify hidden-sm">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
						<div class="text-center mt_30">
							<a href="{{ route('login') }}">{{ __('click_here_to_login') }} >></a>
						</div>
						<div class="text-center mt_15">
							<a href="{{ route('home') }}"><button type="button" class="btn btn-secondary-theme"><< {{ __('back_to_home') }}</button></a>
						</div>
					</div>
				</div>
			  </div>
			  <div class="col-md-1 col-sm-1 hidden-xs">
			  </div>
			  <div class="col-md-7 col-sm-7 col-xs-12">
				 <!--  Form -->
				 <div class="form-grid gray box-bg">
					<div class=" box-header">
						<h4 class="panel-title">{{ __('verify_phone_number') }}</h4>
					</div>
					<form method="POST" action="{{ route('verification.phone.verify', $user->id) }}" class="box-content">
					@if(session('status'))
						<div class="text-success">{{ session('status') }}</div>
					@endif
						<h4>{{ __('we_sent') }} <strong>{{ $user->mobile }}</strong>. {{ __('enter_below') }}.</h4>
						<h4>Your OTP is - {{$otp}}</h4>
					@csrf
						<!-- Password Reset Token -->
						<div class="form-group">
							<label for="otp">{{ __('otp') }}</label>
							<input type="text" name="otp" id="otp" class="form-control" required>
							<x-input-error :messages="$errors->get('otp')" class="mt-2" />
						</div>
						<button class="btn btn-theme btn-lg btn-block">{{ __('verify') }}</button>
					</form>
					<form method="POST" action="{{ route('verification.phone.resend', $user->id) }}" class="mt-3 box-content">
						@csrf
						<button type="submit" class="btn btn-theme">Resend OTP</button>
					</form>
				 </div>
				 <!-- Form -->
				<div class="text-center mt_15 hidden-lg hidden-md hidden-sm">
				<a href="{{ route('home') }}"><button type="button" class="btn btn-secondary-theme">{{ __('back_to_home') }}</button></a>
			   </div>
			  </div>
			  <!-- Middle Content Area  End -->
		   </div>
		   <!-- Row End -->
		</div>
		<!-- Main Container End -->
	</div>
@endsection
@section('component-scripts')

@endsection
