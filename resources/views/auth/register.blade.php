@extends('layouts.app')
@section('content')
	<!-- =-=-=-=-=-=-= Breadcrumb =-=-=-=-=-=-= -->
	{{--<div class="page-header-area-2 gray">
	 <div class="container">
		<div class="row">
		   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			  <div class="small-breadcrumb">
				 <div class="header-page">
					<h1>{{ __('register') }}</h1>
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
					<div class="d-flex justify-space-between box-header">
						<h4 class="panel-title">{{ __('register') }}</h4>
						<a href="{{ route('login') }}">{{ __('already_registered') }}</a>
					</div>
					<form method="POST" action="{{ route('register') }}" class="box-content">
					@csrf
						<!-- Password Reset Token -->
						<div class="form-group">
							<label for="name">{{ __('name') }}</label>
							<x-text-input id="name" class="form-control block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
							<x-input-error :messages="$errors->get('name')" class="mt-2" />
						</div>
						<div class="form-group">
							<label for="mobile">{{ __('mobile') }}</label>
							<x-text-input id="mobile" class="form-control block mt-1 w-full" type="teext" name="mobile" :value="old('mobile')" required />
							<x-input-error :messages="$errors->get('mobile')" class="mt-2" />
						</div>
						<div class="form-group">
							<label for="email">{{ __('email') }}</label>
							<x-text-input id="email" class="form-control block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
							<x-input-error :messages="$errors->get('email')" class="mt-2" />
						</div>
						<div class="form-group">
							<label for="password">{{ __('password') }}</label>
							<x-text-input id="password" class="form-control block mt-1 w-full"
											type="password"
											name="password"
											required autocomplete="new-password" />

							<x-input-error :messages="$errors->get('password')" class="mt-2" />
						</div>
						<div class="form-group">
							<label for="password_confirmation">{{ __('confirm_password') }}</label>
							<x-text-input id="password_confirmation" class="form-control block mt-1 w-full"
											type="password"
											name="password_confirmation" required autocomplete="new-password" />

							<x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
						</div>
					   <div class="form-group">
						  <div class="row">
							 <div class="col-xs-12 col-sm-12">
								<div class="skin-minimal">
								   <ul class="list">
									  <li>
										 <input  type="checkbox" id="terms" name="terms">
										 <label for="terms">{{ __('i_accept') }} <a href="{{ route('terms-conditions') }}" target="_blank">{{ __('terms_and_condition') }}</a></label>
									  </li>
								   </ul>
								</div>
							 </div>
						  </div>
					   </div>
						<button class="btn btn-theme btn-lg btn-block">{{ __('register') }}</button>
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
