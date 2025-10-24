@extends('layouts.app')
@section('content')
<div class="page-wrapper">
    <!-- Page Content -->
    <div class="content container-fluid">
        <div class="change-password-wrapper">
            <div class="col-md-6">
				<form name="frmChangePassword" action="{{ route('change-password') }}" method="post">
				@csrf
					<h4 class="page-title">{{ __('change_password') }}</h4>
					<div class="row">
                        <div class="col-md-12">
                            <div class="input-block mb-3">
                                <label class="col-form-label">{{ __('old_password') }}<span class="color-red">*</span></label>
                                <input type="password" class="form-control" id="old_password" name="old_password">
								@error('old_password')
									<div class="text-danger">{{ $message }}</div>
							    @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="input-block mb-3">
                                <label class="col-form-label">{{ __('new_password') }}<span class="color-red">*</span></label>
                                <input type="password" class="form-control" id="new_password" name="new_password">
								@error('new_password')
									<div class="text-danger">{{ $message }}</div>
							    @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="input-block mb-3">
                                <label class="col-form-label">{{ __('confirm_new_password') }}<span class="color-red">*</span></label>
                                <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation">
								@error('new_password_confirmation')
									<div class="text-danger">{{ $message }}</div>
							    @enderror
                            </div>
                        </div>
                    </div>
                    
					
					<div class="row">
						<div class="submit-section">
							<div class="col-md-12">
								<div class="input-block mb-3">
								<button class="btn btn-primary" type="submit" >{{ __('update_password') }}</button>
								</div>
							</div>
						</div>
                    </div>
				</form>
			</div>
		</div>
	</div>
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
