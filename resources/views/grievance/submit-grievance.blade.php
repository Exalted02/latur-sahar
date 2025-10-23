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
							<input type="hidden" name="id" id="id" value="{{ isset($grievance) ? $grievance->id : '' }}">
							<input type="hidden" name="get_department_id" id="get_department_id" value="{{ isset($grievance) ?  $grievance->get_department->id : ''}}">
								<div class="row">
								   <div class="col-md-6 col-sm-6 col-xs-12">
									  <label>{{ __('name') }} </label>
									  <input type="text" name="name" id="name" value="{{ isset($grievance) ? $grievance->name : old('name')}}" class="form-control margin-bottom-20">
									  <span id="error_name" class="text-danger"></span>
									  
								   </div>
								   <div class="col-md-6 col-sm-6 col-xs-12">
									  <label>{{ __('mobile') }} </label>
									  <input type="text" name="mobile_no" value="{{ isset($grievance) ? $grievance->mobile_no : old('mobile_no')}}" class="form-control margin-bottom-20" id="mobile_no"id="mobile_no">
									  <span id="error_mobile_no" class="text-danger"></span>
								   </div>
								   <div class="col-md-12 col-sm-12 col-xs-6">  
									  <label>{{ __('ward_prabhag') }} <span class="color-red">*</span></label>
									  <input type="text" name="ward_prabhag" value="{{ isset($grievance) ? $grievance->ward_prabhag : old('ward_prabhag')}}" class="form-control margin-bottom-20" id="ward_prabhag">
									  <span id="error_ward_prabhag" class="text-danger"></span>
								   </div>
								   <div class="col-md-6 col-sm-12 col-xs-12 margin-bottom-20">
									  <label>{{ __('department') }} <span class="color-red">*</span></label>
									  <select class="form-control" name="department" id="department">
										 <option value=""> {{ __('select_department') }}</option>
										 @foreach($departments as $department)
											<option value="{{ $department->id ?? '' }}">{{ $department->name ?? '' }}</option>
										 @endforeach
									  </select>
									  <span id="error_department" class="text-danger"></span>
								   </div>
								   <div class="col-md-6 col-sm-12 col-xs-12 margin-bottom-20">
									  <label>{{ __('grievance_type') }} <span class="color-red">*</span></label>
									  <select class="form-control" name="grievance_type" id="grievance_type">
										 <option value=""> {{ __('select_grievance_type') }}</option>
									  </select>
									  <span id="error_grievance_type" class="text-danger"></span>
								   </div>
								   <div class="col-md-12 col-sm-12 col-xs-12">
									  <label>{{ __('address') }} <span class="color-red">*</span></label>
									  <textarea class = "form-control margin-bottom-20" rows = "3" name="address" id="address">{{ isset($grievance) ? $grievance->address : old('address' )}}</textarea>
									  <span id="error_address" class="text-danger"></span>
								   </div>
								   <div class="col-md-12 col-sm-12 col-xs-6">  
									  <label>{{ __('pin_code') }} <span class="color-red">*</span></label>
									  <input type="text" name="pincode" value="{{ isset($grievance) ? $grievance->pincode : old('pincode')}}" class="form-control margin-bottom-20" id="pincode">
									  <span id="error_pincode" class="text-danger"></span>
								   </div>
								   <div class="col-md-12 col-sm-12 col-xs-12">
									  <label>{{ __('issue_description') }} <span class="color-red">*</span></label>
									  <textarea name="issue_description" id="issue_description" class= "form-control margin-bottom-20" rows = "3">{{ isset($grievance) ? $grievance->issue_description : old ('issue_description') }}</textarea>
									  <span id="error_issue_description" class="text-danger"></span>
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
									@if(!empty($grievance->grievance_image))
										@foreach($grievance->grievance_image as $image)
										@php 
										$urlsExp = explode(".", $image->images);
										$extension = $urlsExp[1];
										$extension = strtolower($extension);
										//echo $extension;
										@endphp
									
										<div class="preview-image-wrapper existing-image" data-id="{{ $image->id }}">
											@if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
											<img src="{{ asset('uploads/greivance_image/'.$image->images) }}" class="preview-image" />
											<button type="button" class="remove-existing-image" data-id="{{ $image->id }}" data-image="{{ $image->images }}">&times;</button>
											@elseif(in_array($extension, ['mp4', 'webm', 'ogg']))
											<video controls src="{{ asset('uploads/greivance_image/'.$image->images) }}" class="preview-image" /></video>
											<button type="button" class="remove-existing-image" data-id="{{ $image->id }}" data-image="{{ $image->images }}">&times;</button>
											@endif
										</div>
										@endforeach
									@endif
									<span id="error_images" class="text-danger"></span>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
<script src="{{ url('front-assets/js/page/user.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
<script>
$(document).ready(function() {
	let get_department_id = $('#get_department_id').val();
	if(get_department_id !='')
	{
		setTimeout(function () {
			$('#department').val(get_department_id).trigger('change');
		}, 1000);
	}
	
	
	$(document).on('change', '#department', function(){
		var department_id = $(this).val();
		var edit_id = $('#id').val();
		//alert(edit_id);
		//alert(department_id);
		$.ajax({
			url: "{{ route('get-grievance-type') }}",
			type: "POST",
			data: {
				edit_id: edit_id,
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
		
		var id = $('#id').val();
		var name = $('#name').val();
		var mobile_no = $('#mobile_no').val();
		var ward_prabhag = $('#ward_prabhag').val();
		var department = $('#department').val();
		var grievance_type = $('#grievance_type').val();
		var address = $('#address').val();
		var pincode = $('#pincode').val();
		var issue_description = $('#issue_description').val();
		
		if (name == '') {
			$('#error_name').text('Please enter name').fadeIn().delay(2000).fadeOut();
			return false;
		}
		
		if (mobile_no == '') {
			$('#error_mobile_no').text('Please enter mobile').fadeIn().delay(2000).fadeOut();
			return false;
		}
		
		if (ward_prabhag == '') {
			$('#error_ward_prabhag').text('Please enter ward prabhag').fadeIn().delay(2000).fadeOut();
			return false;
		}
		
		
		if (department == '') {
			$('#error_department').text('Please select department').fadeIn().delay(2000).fadeOut();
			return false;
		}
		
		if (grievance_type == '') {
			$('#error_grievance_type').text('Please select grievance type').fadeIn().delay(2000).fadeOut();
			return false;
		}
		
		if (address == '') {
			$('#error_address').text('Please enter address').fadeIn().delay(2000).fadeOut();
			return false;
		}
		
		if (pincode == '') {
			$('#error_pincode').text('Please enter pincode').fadeIn().delay(2000).fadeOut();
			return false;
		}
		
		if (issue_description == '') {
			$('#error_issue_description').text('Please enter issur desc.').fadeIn().delay(2000).fadeOut();
			return false;
		}
		
		if(id == '')
		{
			if (selectedFiles.length === 0) {
				$('#error_images').text('Please select image').fadeIn().delay(2000).fadeOut();
				return false;
			}
		}
		
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
				
				formData.append('id', id);
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
						//alert(id);
						let textmsg = '';
						if(id == '')
						{
							textmsg = 'Record added successfully!';
						}
						else
						{
							textmsg = 'Record updated successfully!';
						}
						
						
						$.toast({
							heading: 'Success',
							text: textmsg,
							showHideTransition: 'slide',
							icon: 'success',
							position: 'top-right',
							loaderBg: '#5cb85c',
							hideAfter: 2000 
						});
						
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
	
	// Remove existing file from preview & array
	previewContainer.on('click', '.remove-existing-image', function () {
		let imageId = $(this).data('id');
		let imagename = $(this).data('image');
		//alert(imagename);
		$(this).parent().remove(); // Remove visually

		// Optionally: keep track of deleted image IDs to delete later in backend
		let deleted = $('#deleted_images').val() ? $('#deleted_images').val().split(',') : [];
		deleted.push(imageId);
		$('#deleted_images').val(deleted.join(','));
		
		
		
		$.ajax({
			url: "{{ route('delete-grievance-image') }}",
			type: "POST",
			data: {imageId:imageId, imagename:imagename, _token : "{{ csrf_token() }}"},
			//dataType: 'json',
			//contentType: false,
			//processData: false, 
			success: function(response) {
				
			},
			error: function(xhr) {
				console.error(xhr.responseText);
			}
		});
	});
	
});
</script>
@endsection
