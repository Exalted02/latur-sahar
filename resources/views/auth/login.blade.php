@extends('layouts.app')
@section('content')
	<!-- =-=-=-=-=-=-= Breadcrumb =-=-=-=-=-=-= -->
	{{--<div class="page-header-area-2 gray1">
	 <div class="container">
		<div class="row">
		   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			  <div class="small-breadcrumb">
				 <div class="header-page">
					<h1>{{ __('login_page_sign_your_account') }} </h1>
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
							<a href="{{ route('register') }}">{{ __('click_here_to_sign_up') }} >></a>
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
					<div class="d-flex justify-space-between box-header">
						<h4 class="panel-title">{{ __('log_in') }}</h4>
						<a href="{{ route('register') }}">{{ __('click_here_to_sign_up') }}</a>
					</div>
					<form method="POST" action="{{ route('login') }}" id="loginForm" class="box-content">
					@csrf
					{{--<a class="btn btn-lg btn-block btn-social btn-facebook">
							<span class="fa fa-facebook"></span> Sign in with Facebook
					  </a>
					  
					  <a class="btn btn-lg btn-block btn-social btn-google">
							<span class="fa fa-google"></span> Sign in with Facebook
					  </a>
					  
					  <h2 class="no-span"><b>(OR)</b></h2>--}}
					
						<div class="form-group">
							<label>{{ __('email') }}</label>
							<input type="email" id="email" name="email"  placeholder="{{ __('email') }}" class="form-control" :value="old('email')" autofocus>
							<x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
						</div>
					   <div class="form-group">
						  <label>{{ __('password') }}</label>
						  <input type="password" id="password" name="password" placeholder="{{ __('password') }}" class="form-control">
						  <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
					   </div>
					   <div class="form-group">
						  <div class="row">
							 <div class="col-xs-6 col-sm-6">
								<div class="skin-minimal">
								   <ul class="list">
									  <li>
										 <input  type="checkbox" id="remember_me" name="remember">
										 <label for="remember_me">{{ __('remember_me') }}</label>
									  </li>
								   </ul>
								</div>
							 </div>
							 @if (Route::has('password.request'))
							 <div class="col-xs-6 col-sm-6">
								<p class="help-block text-right"><a href="{{ route('password.request') }}">{{ __('forgot_password') }}</a>
								</p>
							 </div>
							 @endif
						  </div>
					   </div>
					   <button class="btn btn-theme btn-lg btn-block">{{ __('login_us') }}</button>
					</form>
				 </div>
				 <!-- Form -->
                <div class="text-center mt_15 hidden-lg hidden-md hidden-sm">
                  <a href="{{ route('home') }}"><button type="button" class="btn btn-secondary-theme"><< {{ __('back_to_home') }}</button></a>
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
<script>

 </script>
@endsection
