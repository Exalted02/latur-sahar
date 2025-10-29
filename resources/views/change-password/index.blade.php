@extends('layouts.app')
@section('content')
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
			
				<form name="frmChangePassword" action="{{ route('change-password') }}" method="post">
				@csrf
					<h2 class="heading-md">{{ __('change_password') }}</h2>
							<p class="text-danger">{{ __('mandatory_headline') }}</p>
					<div class="row">
                        <div class="col-md-12">
                            <div class="input-block margin-bottom-20">
                                <label class="col-form-label">{{ __('old_password') }} <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="old_password" name="old_password">
								@error('old_password')
									<div class="text-danger position-absolute">{{ $message }}</div>
							    @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="input-block margin-bottom-20">
                                <label class="col-form-label">{{ __('new_password') }} <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="new_password" name="new_password">
								@error('new_password')
									<div class="text-danger position-absolute">{{ $message }}</div>
							    @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="input-block margin-bottom-20">
                                <label class="col-form-label">{{ __('confirm_new_password') }} <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation">
								@error('new_password_confirmation')
									<div class="text-danger position-absolute">{{ $message }}</div>
							    @enderror
                            </div>
                        </div>
                    </div>
                    
					
					<div class="row">
						<div class="submit-section">
							<div class="col-md-12 text-center">
								<div class="input-block">
								<button class="btn btn-theme btn-lg" type="submit" >{{ __('update_password') }}</button>
								</div>
							</div>
						</div>
                    </div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
<section>
</div>
<!-- update Success message -->
<div class="modal custom-modal fade" id="updt_success_msg" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="success-message text-center">
					<div class="success-popup-icon">
						<i class="la la-pencil"></i>
					</div>
					<h3>{{ __('password_updated_successfully') }}!!!</h3>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection 
@section('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
<script>
//var csrfToken = "{{ csrf_token() }}";
$( document ).ready(function() {
	
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
