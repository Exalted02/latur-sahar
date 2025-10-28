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
				<h1>{{ __('contact_us_title') }}</h1>
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
							<span id="msg" class="success-msg"></span>
							<form name="frmStatus" action="{{ route('contact-us') }}" method="post">
							@csrf
								<div class="row">
									<div class="col-lg-6 col-md-6 col-xs-12">
										<div class="row">
											<div class="col-md-12 col-sm-12 col-xs-12">
											  <input type="text" placeholder="{{ __('name') }}" name="name" id="name" value="{{ old('name') }}" class="form-control margin-bottom-20">
											  @error('name')
												<div class="text-danger">{{ $message }}</div>
											  @enderror
										   </div>
										   <div class="col-md-12 col-sm-12 col-xs-12">
											  <input type="text" placeholder="{{ __('email_mobile') }}" name="mobile_no" value="{{ old('mobile_no') }}" class="form-control margin-bottom-20" id="mobile_no" >
											  @error('mobile_no')
												<div class="text-danger">{{ $message }}</div>
											  @enderror
										   </div>
										   <div class="col-md-12 col-sm-12 col-xs-12">
											  <input type="text" placeholder="{{ __('contact_us_subject') }}" name="subject" id="subject" value="{{ old('subject') }}" class="form-control margin-bottom-20">
											  @error('subject')
												<div class="text-danger">{{ $message }}</div>
											  @enderror
										   </div>
										   <div class="col-md-12 col-sm-12 col-xs-12">
											  <textarea cols="12" rows="7" placeholder="{{ __('contact_us_message') }}" id="message" name="message" class="form-control margin-bottom-20">{{ old('message') }}</textarea>
											  @error('message')
												<div class="text-danger">{{ $message }}</div>
											  @enderror
										   </div>
										   <div class="col-md-12 col-sm-12 col-xs-12 text-left">
											  <button type="submit" class="btn btn-theme btn-lg submit">{{ __('submit') }}</button>
										   </div>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-xs-12">
										
										<div class="contactInfo">
										   <div class="singleContadds">
											  <i class="fa fa-map-marker"></i>
											  <p> Latur City Municipal Corporation, Latur MG Road , Main Road,Latur, Maharashtra 413512 </p>
										   </div>
										   <div class="singleContadds phone">
											  <i class="fa fa-phone"></i>
											  <p> 02382242803 - <span>Office</span> </p>
										   </div>
										   <div class="singleContadds"> <i class="fa fa-envelope"></i> <a href="mailto:mclatur@gmail.com">mclatur@gmail.com</a> </div>
										</div>
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

