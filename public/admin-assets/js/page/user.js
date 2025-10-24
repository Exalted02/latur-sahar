/*
Author       : Dreamstechnologies
Template Name: SmartHR - Bootstrap Admin Template
Version      : 4.0
*/

$(document).ready(function() {
	
	$(document).on('click','.save-user', function(){
		let department = $('#department').val().trim();
		let name = $('#name').val().trim();
		let user_type = $('#user_type').val().trim();
		let mobile = $('#mobile').val().trim();
		let email = $('#email').val().trim();
		let password = $('#password').val().trim();
		let ward_prabhag_no = $('#ward_prabhag_no').val().trim();
		let post = $('#post').val().trim();
		let id = $('#id').val().trim();
		let isValid = true;
		$('.invalid-feedback').hide();
		$('.form-control').removeClass('is-invalid');
		
		if (name === '')
		{
			$('#name').addClass('is-invalid');
			$('#name').next('.invalid-feedback').show();
			isValid = false;
		}
		
		if (user_type === '')
		{
			$('#user_type').addClass('is-invalid');
			$('#user_type').next('.invalid-feedback').show();
			isValid = false;
		}
		
		
		if (department === '')
		{
			$('#department').addClass('is-invalid');
			$('#department').next('.invalid-feedback').show();
			isValid = false;
		}
		
		if (mobile === '')
		{
			$('#mobile').addClass('is-invalid');
			$('#mobile').next('.invalid-feedback').show();
			isValid = false;
		}
		
		if (email === '')
		{
			$('#email').addClass('is-invalid');
			$('#email').next('.invalid-feedback').show();
			isValid = false;
		}
		
		if (id == '' && password === '')
		{
			$('#password').addClass('is-invalid');
			$('#password').next('.invalid-feedback').show();
			isValid = false;
		}
		
		if (ward_prabhag_no === '')
		{
			$('#ward_prabhag_no').addClass('is-invalid');
			$('#ward_prabhag_no').next('.invalid-feedback').show();
			isValid = false;
		}
		
		if (post === '')
		{
			$('#post').addClass('is-invalid');
			$('#post').next('.invalid-feedback').show();
			isValid = false;
		}
		
		if (isValid) {
			var form = $("#frmuser");
			var URL = $('#frmuser').attr('action');
			//alert(URL);
			$.ajax({
				url: URL,
				type: "POST",
				data: form.serialize() + '&_token=' + csrfToken,
				//dataType: 'json',
				success: function(response) {
					if (!response.success) {
						$('#name').addClass('is-invalid');
						$('#name').next('.invalid-feedback').text(response.message).show();
					} else {
						$('#add_user').hide();
						if(id == '')
						{
							$('#success_msg').modal('show');
						}
						else{
							$('#updt_success_msg').modal('show');
						}
						
						setTimeout(() => {
							window.location.reload();
						}, "2000");
					}
				},
			});
		}
	});
	
$(document).on('click','.add_user', function(){
	$('#name').val('');
	$('#department').val('').trigger('change');
	$('#user_type').val('').trigger('change');
	$('#mobile').val('');
	$('#email').val('');
	$('#password').val('');
	$('#ward_prabhag_no').val('');
	$('#post').val('');
	$('#id').val('');
	$('#add_user .modal-title').text('Add user');
});

$(document).on('click','.edit-user', function(){
	var id = $(this).data('id');
	var URL = $(this).data('url');
	$('#add_user .modal-title').text('Edit user');
	//alert(URL);
	$.ajax({
		url: URL,
		type: "POST",
		data: {id:id, _token: csrfToken},
		dataType: 'json',
		success: function(response) {
			//alert(response.department);
			$('#id').val(response.id);
			$('#name').val(response.name);
			$('#user_type').val(response.user_type).trigger('change');
			$('#department').val(response.department).trigger('change');
			$('#mobile').val(response.mobile);
			$('#email').val(response.email);
			//$('#password').val(response.password);
			$('#ward_prabhag_no').val(response.ward_prabhag_no);
			$('#post').val(response.post);
			$('#add_user').modal('show');
			//alert(JSON.stringify(response));
			
		},
	});
}); 



$(document).on('click','.delete-user', function(){
	var id = $(this).data('id');
	var URL = $(this).data('url');
	//alert(id);alert(URL);
	$.ajax({
		url: URL,
		type: "POST",
		data: {id:id, _token: csrfToken},
		dataType: 'json',
		success: function(response) {
			//alert(response);
			//var url = "{{ route('deleteContactList') }}";
			$('.data-id-pcode-list').attr('data-id', id);
			$('#list_code_name').html(response);
			$('#delete_product_code').modal('show');
		},
	});
	
});
$(document).on('click','.data-id-pcode-list', function(){
	var id = $(this).data('id');
	var URL = $(this).data('url');
	//alert(URL);
	$.ajax({
		url: URL,
		type: "POST",
		data: {id:id, _token: csrfToken},
		dataType: 'json',
		success: function(response) {
			if(response.result == 'success'){
				$('#delete-prospect-msg').html('<font color="green">Record Deleted Successfully</font>');
			}else{
				$('#data_already_use').modal('show');
			}
			setTimeout(() => {
				window.location.reload();
			}, "2000");
		},
	});
	
});
$(document).on('click','.update-status', function(){
	var id= $(this).data('id');
	var URL = $(this).data('url');
	$.ajax({
		url: URL,
		type: "POST",
		data: {id:id, _token: csrfToken},
		dataType: 'json',
		success: function(response) {
			//alert(response);
			setTimeout(() => {
				window.location.reload();
			}, "1000");
		},
	});
});

$(document).on('click','.search-data', function(){
	$('#search-product-code-frm').submit();
	
});
$('.search-sort-by').on('change' ,function (event) {
	//var sort_by = $(this).val();
	$('#search-sortby').submit();
})


/*$(document).on('click','.contact-details', function(){
	var URL = $(this).data('url');
	window.location = URL;
});*/
$(document).on('click', '.dropdown-toggle, .dropdown-menu, .dropdown-item', function(event) {
    event.stopPropagation(); 
});

$('#exportForm').on('submit', function(e) {
	setTimeout(function() {
		$('#export').modal('hide');
	}, 2000);
});

$('#importForm').on('submit', function(e) {
	setTimeout(function() {
		$('#import').modal('hide');
	}, 2000);
});

$(document).on('click','.downloaddemo', function(){
	setTimeout(function() {
		$('#import').modal('hide');
	}, 1000);
});

$(document).on('click','.p_code_add', function(){
	$('#frmproductcode')[0].reset();
	$('.invalid-feedback').hide();
	$('.form-control').removeClass('is-invalid');
});

});
