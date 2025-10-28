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
				<h1>{{ __('confirmation') }}</h1>
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
							<h2 class="heading-md margin-bottom-20">{{ __('grievance_submitted_successfully') }}</h2>
							<h4 class="text-success">
								{{ __('grievance_success_msg1') }} <br/>
								{{ __('grievance_success_msg2_1') }} <span  style="font-size: 24px; color: #0E5185;">
									{{ $rgt_no ?? '' }}</span> {{ __('grievance_success_msg2_2') }} <br/>
								{{ __('grievance_success_msg3') }}
							</h4>
							<div class="text-center mt_15">
								<a href="{{ route('home') }}"><button type="button" class="btn btn-secondary-theme">{{ __('back_to_home') }}</button></a>
							</div>							
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

