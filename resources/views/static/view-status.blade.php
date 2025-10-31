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
	   <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
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
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
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
								   <div class="col-md-12 col-sm-12 col-xs-12 margin-bottom-20">
									  <label>{{ __('registration_number') }} <span class="text-danger">*</span></label>
									  <input type="text" name="registration_no" id="registration_no" value="{{ old('registration_no') }}" class="form-control">
									  @error('registration_no')
										<div class="text-danger position-absolute">{{ $message }}</div>
									  @enderror
								   </div>
								   {{--<div class="col-md-6 col-sm-6 col-xs-12 margin-bottom-20">
									  <label>{{ __('email_mobile') }} <span class="text-danger">*</span></label>
									  <input type="text" name="mobile_no" value="{{ old('mobile_no') }}" class="form-control" id="mobile_no" >
									  @error('mobile_no')
										<div class="text-danger position-absolute">{{ $message }}</div>
									  @enderror
								   </div>--}}
								   
								</div>
								<div class="clearfix"></div>
								<div class="row margin-top-10">
								   <div class="col-md-12 col-sm-12 col-xs-12 text-center">
									  <button type="submit" class="btn btn-theme btn-lg submit">{{ __('submit') }}</button>
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

