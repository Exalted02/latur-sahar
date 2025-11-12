@extends('layouts.app')
@section('content')
<!-- Page Wrapper -->


<!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
<div class="main-content-area clearfix">
		<section class="section-padding no-top gray">
			<div class="container">
				<div class="row mt_50">
					@include('_includes/user-sidebar')
					<div class="col-md-8 col-md-push-4- col-lg-9 col-xs-12">
			
			
			<div class="row">
				<!-- Middle Content Area -->
				<div class="col-md-12 col-xs-12 col-sm-12">
					<!-- Row -->

							<h2 class="heading-md">{{ __('my_account') }}</h2>
							<p class="text-danger">{{ __('mandatory_headline') }}</p>
							<div class="clearfix"></div>
							<span id="msg" class="success-msg"></span>
							<form name="frmgrievanve" action="{{ route('my-account') }}" method="post">
							@csrf
							<input type="hidden" name="id" id="id" value="{{ isset($account) ? $account->id : '' }}">
							
								<div class="row">
								   <div class="col-md-12 margin-bottom-20">
									  <label>{{ __('name') }} <span class="text-danger">*</span> </label>
									  <input type="text" name="name" id="name" value="{{ isset($account) ? $account->name : old('name')}}" class="form-control">
									   @error('name')
										<div class="text-danger position-absolute">{{ $message }}</div>
									   @enderror
									</div>
								   <div class="col-md-12 margin-bottom-20">
									  <label>{{ __('mobile') }} <span class="text-danger">*</span> </label>
									  <input type="text" name="mobile" value="{{ isset($account) ? $account->mobile : old('mobile')}}" class="form-control" id="mobile">
									  @error('mobile')
										<div class="text-danger position-absolute">{{ $message }}</div>
									   @enderror
									</div>
								   <div class="col-md-12 margin-bottom-20">
									  <label>{{ __('email') }} <span class="text-danger">*</span> </label>
									  <input type="text" name="email" value="{{ isset($account) ? $account->email : old('email')}}" class="form-control" id="email">
									  @error('email')
										<div class="text-danger position-absolute">{{ $message }}</div>
									   @enderror
									</div>
									@if(auth()->user()->user_type != 1)
									<div class="col-md-12 margin-bottom-20">  
									  <label>{{ __('ward_prabhag') }} <span class="text-danger">*</span></label>
									  <select class="form-control" name="ward_prabhag_no" id="ward_prabhag_no">
										 <option value=""> {{ __('select_ward_prabhag') }}</option>
										 @foreach(get_ward_prabhag_model() as $wardprabhag)
											<option value="{{ $wardprabhag->id ?? '' }}" {{ isset($account) && $account->ward_prabhag_no == $wardprabhag->id ? 'selected' : ''}}>{{ $wardprabhag->name ?? '' }}</option>
										 @endforeach
									  </select>
									  <div class="clearfix"></div>
									  @error('ward_prabhag_no')
										<div class="text-danger position-absolute">{{ $message }}</div>
									   @enderror
									</div>
									<div class="col-md-12 margin-bottom-20">
									  <label>{{ __('post') }} <span class="text-danger">*</span> </label>
									  <input type="text" name="post" value="{{ isset($account) ? $account->post : old('post')}}" class="form-control" id="post">
									  @error('post')
										<div class="text-danger position-absolute">{{ $message }}</div>
									   @enderror
									</div>
									@endif
								</div>
								<div class="clearfix"></div>
								<div class="row margin-top-10">
								   <div class="col-md-12 col-sm-12 col-xs-12 text-center">
									  <button type="submit" class="btn btn-theme btn-lg">{{ __('submit_account') }}</button>
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
