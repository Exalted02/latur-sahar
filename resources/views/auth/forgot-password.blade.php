@extends('layouts.app')
@section('content')
	<!-- =-=-=-=-=-=-= Breadcrumb =-=-=-=-=-=-= -->
  {{--<div class="page-header-area-2 gray">
	 <div class="container">
		<div class="row">
		   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			  <div class="small-breadcrumb">
				 <div class="header-page">
					<h4>{{ __('forgot_password_text') }}</h4>
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
						<p class="text-white mt_30 text-justify hidden-sm">{{ __('forgot_password_text') }}</p>
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
						<h4 class="panel-title">{{ __('forgot_password') }}</h4>
					</div>
					<form method="POST" action="{{ route('password.email') }}" class="box-content">
					<x-auth-session-status class="text-success" :status="session('status')" />
					@csrf
						<div class="form-group">
							<label>{{ __('email') }}</label>
							<input type="email" id="email" name="email"  placeholder="{{ __('email') }}" class="form-control" :value="old('email')"  required autofocus >
							<x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
						</div>
						<button class="btn btn-theme btn-lg btn-block">{{ __('email_password_reset_link') }}</button>
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

