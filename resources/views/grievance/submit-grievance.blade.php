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
							<span id="msg" class="success-msg"></span>
							<form name="frmgrievanve" action="{{ route('submit-grievance') }}" method="post">
							@csrf
								<div class="row">
								   <div class="col-md-6 col-sm-6 col-xs-12">
									  <label>{{ __('name') }} </label>
									  <input type="text" name="name" id="name" value="{{ old('name')}}" class="form-control margin-bottom-20">
									  @error('name')
											<div class="text-danger">{{ $message }}</div>
									  @enderror
								   </div>
								   <div class="col-md-6 col-sm-6 col-xs-12">
									  <label>{{ __('mobile') }} </label>
									  <input type="text" name="mobile_no" value="{{ old('mobile_no')}}" class="form-control margin-bottom-20" id="mobile_no"id="mobile_no">
									  @error('mobile_no')
											<div class="text-danger">{{ $message }}</div>
									  @enderror
								   </div>
								   <div class="col-md-12 col-sm-12 col-xs-6">  
									  <label>{{ __('ward_prabhag') }} <span class="color-red">*</span></label>
									  <input type="text" name="ward_prabhag" value="{{ old('ward_prabhag')}}" class="form-control margin-bottom-20" id="ward_prabhag">
									  @error('ward_prabhag')
										<div class="text-danger">{{ $message }}</div>
									  @enderror
								   </div>
								   <div class="col-md-6 col-sm-12 col-xs-12 margin-bottom-20">
									  <label>{{ __('department') }} <span class="color-red">*</span></label>
									  <select class="form-control" name="department" id="department">
										 <option value="0"> {{ __('select_department') }}</option>
										 @foreach($departments as $department)
											<option value="{{ $department->id ?? '' }}">{{ $department->name ?? '' }}</option>
										 @endforeach
									  </select>
									  @error('department')
										<div class="text-danger">{{ $message }}</div>
									  @enderror
								   </div>
								   <div class="col-md-6 col-sm-12 col-xs-12 margin-bottom-20">
									  <label>{{ __('grievance_type') }} <span class="color-red">*</span></label>
									  <select class="form-control" name="grievance_type" id="grievance_type">
										 <option value="0"> {{ __('select_grievance_type') }}</option>
									  </select>
									  @error('grievance_type')
										<div class="text-danger">{{ $message }}</div>
									  @enderror
								   </div>
								   <div class="col-md-12 col-sm-12 col-xs-12">
									  <label>{{ __('address') }} <span class="color-red">*</span></label>
									  <textarea class = "form-control margin-bottom-20" rows = "3" name="address" id="address">{{ old('address' )}}</textarea>
									  @error('name')
										<div class="text-danger">{{ $message }}</div>
									  @enderror
								   </div>
								   <div class="col-md-12 col-sm-12 col-xs-6">  
									  <label>{{ __('pin_code') }} <span class="color-red">*</span></label>
									  <input type="text" name="pincode" value="{{ old('pincode')}}" class="form-control margin-bottom-20" id="pincode">
									  @error('pincode')
										<div class="text-danger">{{ $message }}</div>
									  @enderror
								   </div>
								   <div class="col-md-12 col-sm-12 col-xs-12">
									  <label>{{ __('issue_description') }} <span class="color-red">*</span></label>
									  <textarea name="issue_description" id="issue_description" class= "form-control margin-bottom-20" rows = "3">{{ old ('issue_description') }}</textarea>
									  @error('name')
										<div class="text-danger">{{ $message }}</div>
									  @enderror
								   </div>
								</div>
								<div class="row margin-bottom-20">
									<div class="form-group">
										<div class="col-md-9">
										<label for="lo_file"></label>
											<div class="upload-wrapper">
											  <input type="file" name="lo_file[]" id="lo_file" multiple style="display: none;">
											  <label for="lo_file" class="custom-upload-label">
												<span class="upload-text">Upload image</span>
												<i class="fa fa-upload upload-icon"></i>
											  </label>
											</div>
										</div>
										<div class="col-md-8 d-flex flex-wrap gap-2" id="preview-container">
										</div>
									</div>
								</div>
								{{--<div class="row margin-bottom-20">
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
								</div>--}}
								<div class="clearfix"></div>
								<div class="row">
								   <div class="col-md-12 col-sm-12 col-xs-12 text-right">
									  <button type="button" class="btn btn-theme btn-sm submit-greivance">{{ __('submit_grievance') }}</button>
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
<script>
$(document).ready(function() {
	$(document).on('change', '#department', function(){
		var department_id = $(this).val();
		$.ajax({
			url: "{{ route('get-grievance-type') }}",
			type: "POST",
			data: {
				department_id: department_id,
				_token: "{{ csrf_token() }}"
			},
			dataType: 'json',
			success: function(response) {
				//alert(response.html);
				$('#grievance_type').html(response.html);
			},
			error: function(xhr) {
				console.error(xhr.responseText);
			}
		});
	});
	
	let previewContainer = $('#preview-container');
   let selectedFiles = [];
	
	$('#lo_file').on('change', function (e) {
		let files = Array.from(e.target.files);

		selectedFiles = [...selectedFiles, ...files];

		files.forEach((file, index) => {
			let reader = new FileReader();
			reader.onload = function (e) {
				let previewHtml = '';

				if (file.type.startsWith('image/')) {
					previewHtml = '<div class="preview-image-wrapper" data-index="' 
						+ (selectedFiles.length - files.length + index) 
						+ '"><img src="' + e.target.result 
						+ '" class="preview-image" /><button type="button" class="remove-image" data-index="' 
						+ (selectedFiles.length - files.length + index) 
						+ '">&times;</button></div>';
				} else if (file.type.startsWith('video/')) {
					previewHtml = '<div class="preview-image-wrapper" data-index="' 
						+ (selectedFiles.length - files.length + index) 
						+ '"><video src="' + e.target.result 
						+ '" class="preview-image" controls style="max-width: 120px; max-height: 120px;"></video><button type="button" class="remove-image" data-index="' 
						+ (selectedFiles.length - files.length + index) 
						+ '">&times;</button></div>';
				}
				previewContainer.append(previewHtml);
			};
			reader.readAsDataURL(file);
		});

		$(this).val('');
	});
	
	// Remove file from preview & array
	previewContainer.on('click', '.remove-image', function () {
		const indexToRemove = $(this).data('index');
		$(this).parent().remove();
		selectedFiles[indexToRemove] = null;
		selectedFiles = selectedFiles.filter(file => file !== null);
	});
	
	$(document).on('click', '.submit-greivance' , function() {
		
		var name = $('#name').val();
		var mobile_no = $('#mobile_no').val();
		var ward_prabhag = $('#ward_prabhag').val();
		var department = $('#department').val();
		var grievance_type = $('#grievance_type').val();
		var address = $('#address').val();
		var pincode = $('#pincode').val();
		var issue_description = $('#issue_description').val();
		
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(function(position) {
				//document.getElementById('latitude').value = position.coords.latitude;
				//document.getElementById('longitude').value = position.coords.longitude;
				
				var latitude = position.coords.latitude;
				var longitude = position.coords.longitude;
			
		
				let formData = new FormData();
				selectedFiles.forEach(file => {
					formData.append('lo_file[]', file);
				});
				
				formData.append('name', name);
				formData.append('mobile_no', mobile_no);
				formData.append('ward_prabhag', ward_prabhag);
				formData.append('department', department);
				formData.append('grievance_type', grievance_type);
				formData.append('address', address);
				formData.append('pincode', pincode);
				formData.append('latitude', latitude);
				formData.append('longitude', longitude);   
				formData.append('issue_description', issue_description);
				formData.append('_token',"{{ csrf_token() }}");
				
				$.ajax({
					url: "{{ route('submit-grievance') }}",
					type: "POST",
					data: formData,
					dataType: 'json',
					contentType: false,
					processData: false, 
					success: function(response) {
						$('#msg').text('Record added successfully').fadeIn().delay(2000).fadeOut();
						setTimeout(() => {
							window.location.reload();
						}, "2000");
					},
					error: function(xhr) {
						console.error(xhr.responseText);
					}
				});
			});
		}
	})
	
});
</script>
@endsection
