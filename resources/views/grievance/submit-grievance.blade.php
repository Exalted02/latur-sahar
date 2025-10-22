@extends('layouts.app')
@section('content')
<!-- Page Wrapper -->
<!-- =-=-=-=-=-=-= Breadcrumb =-=-=-=-=-=-= -->
<div class="page-header-area-2 gray">
 <div class="container">
	<div class="row">
	   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		  <div class="small-breadcrumb">
			 <div class="header-page">
				<h1>{{ __('submit_grievance') }}</h1>
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
			<div class="row">
				<!-- Middle Content Area -->
				<div class="col-md-12 col-xs-12 col-sm-12">
					<!-- Row -->
					<div class="profile-section margin-bottom-20">
						<div class="profile-edit">
							<h2 class="heading-md">{{ __('manage_grievance') }}</h2>
							<p>{{ __('manage_grievance') }}</p>
							<div class="clearfix"></div>
							<form>
								<div class="row">
								   <div class="col-md-6 col-sm-6 col-xs-12">
									  <label>{{ __('name') }} </label>
									  <input type="text" class="form-control margin-bottom-20">
								   </div>
								   <div class="col-md-6 col-sm-6 col-xs-12">
									  <label>{{ __('mobile') }} </label>
									  <input type="text" class="form-control margin-bottom-20">
								   </div>
								   <div class="col-md-12 col-sm-12 col-xs-6">  
									  <label>{{ __('ward_prabhag') }} <span class="color-red">*</span></label>
									  <input type="text" class="form-control margin-bottom-20">
								   </div>
								   <div class="col-md-6 col-sm-12 col-xs-12 margin-bottom-20">
									  <label>{{ __('department') }} <span class="color-red">*</span></label>
									  <select class="form-control">
										 <option value="0"> {{ __('select_department') }}</option>
									  </select>
								   </div>
								   <div class="col-md-6 col-sm-12 col-xs-12 margin-bottom-20">
									  <label>{{ __('grievance_type') }} <span class="color-red">*</span></label>
									  <select class="form-control">
										 <option value="0"> {{ __('select_grievance_type') }}</option>
									  </select>
								   </div>
								   <div class="col-md-12 col-sm-12 col-xs-12">
									  <label>{{ __('address') }} <span class="color-red">*</span></label>
									  <textarea class = "form-control margin-bottom-20" rows = "3"></textarea>
								   </div>
								   <div class="col-md-12 col-sm-12 col-xs-6">  
									  <label>{{ __('pin_code') }} <span class="color-red">*</span></label>
									  <input type="text" class="form-control margin-bottom-20">
								   </div>
								   <div class="col-md-12 col-sm-12 col-xs-12">
									  <label>{{ __('issue_description') }} <span class="color-red">*</span></label>
									  <textarea class = "form-control margin-bottom-20" rows = "3"></textarea>
								   </div>
								</div>
								<div class="row margin-bottom-20">
								   <div class="form-group">
									  <div class="col-md-9">
										 <div class="input-group">
											<span class="input-group-btn">
											<span class="btn btn-default btn-file">
											 {{ __('live_photo') }} <input type="file" id="imgInp">
											</span>
											</span>
											<input type="text" class="form-control" readonly>
										 </div>
									  </div>
									  <div class="col-md-3">
										 <img id="img-upload" class="img-responsive" src="images/users/2.jpg" alt="" />
									  </div>
								   </div>
								</div>
								<div class="clearfix"></div>
								<div class="row">
								   <div class="col-md-12 col-sm-12 col-xs-12 text-right">
									  <button type="submit" class="btn btn-theme btn-sm">{{ __('submit_grievance') }}</button>
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
	<!-- /Page Content -->
@include('modal.user-modal')
@include('modal.common')
@endsection 
@section('scripts')
<script src="{{ url('front-assets/js/page/user.js') }}"></script>
@endsection
