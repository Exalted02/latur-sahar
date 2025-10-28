<div class="modal custom-modal fade" id="delete_product_code" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="success-message text-center">
					<div class="success-popup-icon bg-danger" id="delete-prospect-msg">
						<i class="la la-trash-restore"></i>
					</div>
					<h3>{{ __('Are you sure') }}, {{ __('you want delete') }}</h3>
					<p>{{ __('user') }} "<span id="list_code_name"></span>" {{ __('from your account') }}</p>
					<div class="col-lg-12 text-center form-wizard-button">
						<a href="#" class="button btn-lights" data-bs-dismiss="modal">{{ __('not now') }}</a>
						<a href="javascript:void(0);" class="btn btn-primary data-id-pcode-list" data-url="{{ route('admin.deleteUserAdminList') }}">{{ __('okay') }}</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Add product code -->
<div id="add_user" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">{{ __('Add user') }}</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form id="frmuser" action="{{ route('admin.save-user-admin') }}">
								<input type="hidden" id="id" name="id">
									<div class="row">
										<div class="col-sm-12">
											<div class="input-block mb-3">
												<label class="col-form-label">{{ __('Name') }}<span class="text-danger">*</span></label>
												<input class="form-control" type="text" name="name" id="name">
												<div class="invalid-feedback">{{ __('Please enter') }} {{ __('name')}}.</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<div class="input-block mb-3">
												<label class="col-form-label">{{ __('User type') }}<span class="text-danger">*</span></label>
												<select class="select form-control" name="user_type" id="user_type">
													<option value="">Select user</option>
													<option value="2">SI or Ward Officer</option>
													<option value="3">Department HOD</option>
													<option value="4">Assistant Commissioner</option>
													<option value="5">Deputy Commissioner</option>
													<option value="6">Commissioner</option>
												</select>
												<div class="invalid-feedback">{{ __('Please enter') }} {{ __('user type')}}.</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<div class="input-block mb-3">
												<label class="col-form-label">{{ __('Department') }}<span class="text-danger">*</span></label>
												<select name="department" class="select form-control" id="department">
												<option value="">Select department</option>
												@foreach($departments as $department)
													<option value="{{ $department->id }}">{{ $department->name ?? '' }}</option>
												@endforeach
												</select>
												<div class="invalid-feedback">{{ __('Please enter') }} {{ __('department')}}.</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<div class="input-block mb-3">
												<label class="col-form-label">{{ __('Mobile') }}<span class="text-danger">*</span></label>
												<input class="form-control" type="text" name="mobile" id="mobile">
												<div class="invalid-feedback">{{ __('Please enter') }} {{ __('mobile')}}.</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<div class="input-block mb-3">
												<label class="col-form-label">{{ __('Email') }}<span class="text-danger">*</span></label>
												<input class="form-control" type="text" name="email" id="email">
												<div class="invalid-feedback">{{ __('Please enter') }} {{ __('email')}}.</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<div class="input-block mb-3">
												<label class="col-form-label">{{ __('Password') }}<span class="text-danger">*</span></label>
												<input class="form-control" type="password" name="password" id="password">
												<div class="invalid-feedback">{{ __('Please enter') }} {{ __('password')}}.</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<div class="input-block mb-3">
												<label class="col-form-label">{{ __('Ward prabhag no') }}<span class="text-danger">*</span></label>
												<input class="form-control" type="text" name="ward_prabhag_no" id="ward_prabhag_no">
												<div class="invalid-feedback">{{ __('Please enter') }} {{ __('ward no')}}.</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<div class="input-block mb-3">
												<label class="col-form-label">{{ __('Post') }}<span class="text-danger">*</span></label>
												<input class="form-control" type="text" name="post" id="post">
												<div class="invalid-feedback">{{ __('Please enter') }} {{ __('post')}}.</div>
											</div>
										</div>
									</div>
									
									
									<div class="submit-section">
										<button class="btn btn-primary submit-btn save-user" type="button">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
<!-- /Add product code -->

<!--- edit product code -->
<div id="edit_department" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">{{ __('Edit department') }}</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form id="frmeditproductcode" action="{{ route('admin.save-department-code') }}">
								<input type="hidden" id="id" name="id">
									<div class="row">
										<div class="col-sm-12">
											<div class="input-block mb-3">
												<label class="col-form-label">{{ __('Name') }}<span class="text-danger">*</span></label>
												<input class="form-control" type="text" name="name" id="dname">
												<div class="invalid-feedback">{{ __('please_enter') }} {{ __('name')}}.</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<div class="input-block mb-3">
												<label class="col-form-label">{{ __('Address') }}<span class="text-danger">*</span></label>
												<input class="form-control" type="text" name="address" id="address">
												<div class="invalid-feedback">{{ __('please_enter') }} {{ __('address')}}.</div>
											</div>
										</div>
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn update-product-code-form" type="button">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
<!-- /Edit Contact -->

<!-- Success Contact -->
<div class="modal custom-modal fade" id="success_msg" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="success-message text-center">
					<div class="success-popup-icon">
						<i class="la la-plus"></i>
					</div>
					<h3>{{ __('Record created successfully') }}!!!</h3>
						{{--<p>{{ __('view_details_contact') }}</p>--}}
						{{--<div class="col-lg-12 text-center form-wizard-button">
						<a href="#" class="button btn-lights" data-bs-dismiss="modal">{{ __('close') }}</a>
						<a href="contact-details.html" class="btn btn-primary">{{ __('view_details') }}</a>
					</div>--}}
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Success Contact -->
<div class="modal custom-modal fade" id="data_already_use" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="success-message text-center">
					<div class="success-popup-icon bg-danger">
						<i class="la la-times-circle"></i>
					</div>
					<h3>{{ __('data_already_use') }}!!!</h3>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Success Contact -->
<!-- update Success message -->
<div class="modal custom-modal fade" id="updt_success_msg" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="success-message text-center">
					<div class="success-popup-icon">
						<i class="la la-pencil"></i>
					</div>
					<h3>{{ __('Record updated successfully') }}!!!</h3>
				</div>
			</div>
		</div>
	</div>
</div>

