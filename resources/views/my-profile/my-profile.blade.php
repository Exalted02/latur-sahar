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
				<h1>{{ __('my_account') }}</h1>
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
							<h2 class="heading-md">{{ __('manage_profile') }}</h2>

							<div class="clearfix"></div>
							<span id="msg" class="success-msg"></span>
							<form name="frmgrievanve" action="{{ route('my-account') }}" method="post">
							@csrf
							<input type="hidden" name="id" id="id" value="{{ isset($account) ? $account->id : '' }}">
							
								<div class="row">
								   <div class="col-md-6 col-sm-6 col-xs-12">
									  <label>{{ __('name') }} </label>
									  <input type="text" name="name" id="name" value="{{ isset($account) ? $account->name : old('name')}}" class="form-control margin-bottom-20">
									   @error('name')
										<div class="text-danger">{{ $message }}</div>
									   @enderror
									</div>
								   <div class="col-md-6 col-sm-6 col-xs-12">
									  <label>{{ __('mobile') }} </label>
									  <input type="text" name="mobile" value="{{ isset($account) ? $account->mobile : old('mobile')}}" class="form-control margin-bottom-20" id="mobile">
									  @error('mobile')
										<div class="text-danger">{{ $message }}</div>
									   @enderror
									</div>
								</div>
								<div class="clearfix"></div>
								<div class="row">
								   <div class="col-md-12 col-sm-12 col-xs-12 text-right">
									  <button type="submit" class="btn btn-theme btn-sm">{{ __('submit_account') }}</button>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
<script>
$(document).ready(function() {
	@if(session('success'))
        $.toast({
            heading: 'Success',
            text: "{{ session('success') }}",
            showHideTransition: 'slide',
            icon: 'success',
            position: 'top-right',
            loaderBg: '#5cb85c',
            hideAfter: 3000
        });
    @endif
});
</script>
@endsection
