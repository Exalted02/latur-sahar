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
				<h1>{{ __('view_status') }}</h1>
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
							<h2 class="heading-md">{{ __('view_status') }}</h2>
							<p class="text-danger">{{ __('mandatory_headline') }}</p>
							<div class="clearfix"></div>
							<span id="msg" class="success-msg"></span>
							<form name="frmStatus" action="{{ route('view-status') }}" method="post">
							@csrf
								<div class="row">
								   <div class="col-md-6 col-sm-6 col-xs-12">
									  <label>{{ __('registration_number') }} <span class="text-danger">*</span></label>
									  <input type="text" name="registration_no" id="registration_no" value="{{ old('registration_no') }}" class="form-control margin-bottom-20">
									  @error('registration_no')
										<div class="text-danger">{{ $message }}</div>
									  @enderror
								   </div>
								   <div class="col-md-6 col-sm-6 col-xs-12">
									  <label>{{ __('email_mobile') }} <span class="text-danger">*</span></label>
									  <input type="text" name="mobile_no" value="{{ old('mobile_no') }}" class="form-control margin-bottom-20" id="mobile_no" >
									  @error('mobile_no')
										<div class="text-danger">{{ $message }}</div>
									  @enderror
									  {{--<span id="error_email_mobile" class="text-danger"></span>--}}
								   </div>
								   
								</div>
								<div class="clearfix"></div>
								<div class="row">
								   <div class="col-md-12 col-sm-12 col-xs-12 text-right">
									  <button type="submit" class="btn btn-theme btn-sm submit">{{ __('submit') }}</button>
								   </div>
								</div>
							</form>
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

