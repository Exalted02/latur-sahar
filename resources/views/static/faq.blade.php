@extends('layouts.app')
@section('content')
	<!-- Page Wrapper -->
<!-- =-=-=-=-=-=-= Breadcrumb =-=-=-=-=-=-= -->
<div style="background-image: url('{{ asset('front-assets/inner-bg.jpg') }}');
	background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
	;">
<div class="page-header-area-2 gray1">
 <div class="container">
	<div class="row">
	   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		  <div class="small-breadcrumb">
			 <div class="header-page">
				<h1>{{ __('faq_title') }}</h1>
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
	<section class="section-padding no-top">
		<!-- Main Container -->
		<div class="container">
			<div class="row">
				<!-- Middle Content Area -->
				<div class="col-md-12 col-xs-12 col-sm-12">
					<!-- Row -->
					<div class="profile-section margin-bottom-20">
						<div class="profile-edit">
							<div class="clearfix"></div>
							<div class="row">
							<!-- Middle Content Area -->
                  <div class="col-md-12 col-xs-12 col-sm-12">
					@php
						$registerOrDashboardUrl = Auth::check() ? route('dashboard') : route('register');
						$submitGrievanceOrLoginUrl = Auth::check() ? route('submit-grievance') : route('login');
						$viewGrievanceStatusUrl = route('view-status');
						$forgotPasswordUrl = route('password.request');
						$contactUsUrl = route('contact-us');
					@endphp

					{!! __('faq_content', [
						'register_page_url' => $registerOrDashboardUrl,
						'submit_grievance_page_url' => $submitGrievanceOrLoginUrl,
						'view_grievance_status_page_url' => $viewGrievanceStatusUrl,
						'forgot_password_page_url' => $forgotPasswordUrl,
						'contact_us_page_url' => $contactUsUrl,
					]) !!}
                  </div>
                  </div>
                  <!-- Middle Content Area  End -->						
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
</div>

	<!-- /Page Content -->
	  

@endsection 
@section('scripts')
@endsection

