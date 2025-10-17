@extends('layouts.app')
@section('content')
	<!-- =-=-=-=-=-=-= Breadcrumb =-=-=-=-=-=-= -->
  <div class="page-header-area-2 gray">
	 <div class="container">
		<div class="row">
		   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			  <div class="small-breadcrumb">
				 <div class="header-page">
					<h1>{{ __('verify_phone_number') }}</h1>
					<h4>{{ __('we_sent') }} <strong>{{ $user->mobile }}</strong>. {{ __('enter_below') }}.</h4>
				 </div>
			  </div>
		   </div>
		</div>
	 </div>
  </div>
  <!-- =-=-=-=-=-=-= Breadcrumb End =-=-=-=-=-=-= -->
  <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
  <div class="main-content-area clearfix">
	 <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
	 <section class="section-padding no-top gray">
		<!-- Main Container -->
		<div class="container">
		   <!-- Row -->
		   <div class="row">
			  <!-- Middle Content Area -->
			  <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
				 <!--  Form -->
				 <div class="form-grid">
					@if(session('status'))
						<div class="text-success">{{ session('status') }}</div>
					@endif
					<form method="POST" action="{{ route('verification.phone.verify', $user->id) }}">
					@csrf
						<!-- Password Reset Token -->
						<div class="form-group">
							<label for="otp">{{ __('otp') }}</label>
							<input type="text" name="otp" id="otp" class="form-control" required>
							<x-input-error :messages="$errors->get('otp')" class="mt-2" />
						</div>
						<button class="btn btn-theme btn-lg btn-block">{{ __('verify') }}</button>
					</form>
					<form method="POST" action="{{ route('verification.phone.resend', $user->id) }}" class="mt-3">
						@csrf
						<button type="submit" class="btn btn-link">Resend OTP</button>
					</form>
				 </div>
				 <!-- Form -->
			  </div>
			  <!-- Middle Content Area  End -->
		   </div>
		   <!-- Row End -->
		</div>
		<!-- Main Container End -->
	 </section>
	</div>
@endsection
@section('component-scripts')

@endsection
