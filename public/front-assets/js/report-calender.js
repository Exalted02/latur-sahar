/*
Author       : Dreamstechnologies
Template Name: SmartHR - Bootstrap Admin Template
Version      : 4.0
*/

$(document).ready(function() {
	// Date Range Picker FOR Lead Breakup
	if ($('#date_range_expiry_date').length > 0) {
		function booking_range(start, end) {
			// Update the input field with the selected date range in MM/DD/YYYY format
			$('#date_range_expiry_date').val(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
		}

		$('#date_range_expiry_date').daterangepicker({
			autoUpdateInput: false,  // Prevents the input from being auto-filled on initialization
			ranges: {
				'Today': [moment(), moment()],
				'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
				'Next Month': [moment().add(1, 'month').startOf('month'), moment().add(1, 'month').endOf('month')]
			}
		}, booking_range);

		// Event when a date range is selected
		$('#date_range_expiry_date').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
		});

		// Event when the date range picker is canceled
		$('#date_range_expiry_date').on('cancel.daterangepicker', function(ev, picker) {
			$(this).val('');
		});

		// Clear the input initially to keep it blank
		if($('#date_range_expiry_date').val() != ''){
			// $('#date_range_expiry_date').val('MM/DD/YYYY - MM/DD/YYYY');
		}else{
			$('#date_range_expiry_date').val('MM/DD/YYYY - MM/DD/YYYY');
		}
	}
	
	// Date Range Picker FOR Resources Wise Lead Breakup
	if ($('#date_range_followup_date').length > 0) {
		function booking_range(start, end) {
			// Update the input field with the selected date range in MM/DD/YYYY format
			$('#date_range_followup_date').val(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
		}

		$('#date_range_followup_date').daterangepicker({
			autoUpdateInput: false,  // Prevents the input from being auto-filled on initialization
			ranges: {
				'Today': [moment(), moment()],
				'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
				'Next Month': [moment().add(1, 'month').startOf('month'), moment().add(1, 'month').endOf('month')]
			}
		}, booking_range);

		// Event when a date range is selected
		$('#date_range_followup_date').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
		});

		// Event when the date range picker is canceled
		$('#date_range_followup_date').on('cancel.daterangepicker', function(ev, picker) {
			$(this).val('');
		});

		// Clear the input initially to keep it blank
		if($('#date_range_followup_date').val() != ''){
			// $('#date_range_followup_date').val('MM/DD/YYYY - MM/DD/YYYY');
		}else{
			$('#date_range_followup_date').val('MM/DD/YYYY - MM/DD/YYYY');
		}
	}
	
	// Date Range Picker FOR customer search product expiry
	if ($('#src_product_expiry').length > 0) {
		function booking_range(start, end) {
			// Update the input field with the selected date range in MM/DD/YYYY format
			$('#src_product_expiry').val(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
		}

		$('#src_product_expiry').daterangepicker({
			autoUpdateInput: false,  // Prevents the input from being auto-filled on initialization
			ranges: {
				'Today': [moment(), moment()],
				'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
				'Next Month': [moment().add(1, 'month').startOf('month'), moment().add(1, 'month').endOf('month')]
			}
		}, booking_range);

		// Event when a date range is selected
		$('#src_product_expiry').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
		});

		// Event when the date range picker is canceled
		$('#src_product_expiry').on('cancel.daterangepicker', function(ev, picker) {
			$(this).val('');
		});

		// Clear the input initially to keep it blank
		if($('#src_product_expiry').val() != ''){
			// $('#src_product_expiry').val('MM/DD/YYYY - MM/DD/YYYY');
		}else{
			$('#src_product_expiry').val('MM/DD/YYYY - MM/DD/YYYY');
		}
	}
	// Date Range Picker FOR customer search product followup
	if ($('#src_expiry_followup').length > 0) {
		function booking_range(start, end) {
			// Update the input field with the selected date range in MM/DD/YYYY format
			$('#src_expiry_followup').val(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
		}

		$('#src_expiry_followup').daterangepicker({
			autoUpdateInput: false,  // Prevents the input from being auto-filled on initialization
			ranges: {
				'Today': [moment(), moment()],
				'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
				'Next Month': [moment().add(1, 'month').startOf('month'), moment().add(1, 'month').endOf('month')]
			}
		}, booking_range);

		// Event when a date range is selected
		$('#src_expiry_followup').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
		});

		// Event when the date range picker is canceled
		$('#src_expiry_followup').on('cancel.daterangepicker', function(ev, picker) {
			$(this).val('');
		});

		// Clear the input initially to keep it blank
		if($('#src_expiry_followup').val() != ''){
			// $('#src_expiry_followup').val('MM/DD/YYYY - MM/DD/YYYY');
		}else{
			$('#src_expiry_followup').val('MM/DD/YYYY - MM/DD/YYYY');
		}
	}
	
	// referral records
	if ($('#src_reff_record_date_range_dob').length > 0) {
		function booking_range(start, end) {
			// Update the input field with the selected date range in MM/DD/YYYY format
			$('#src_reff_record_date_range_dob').val(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
		}

		$('#src_reff_record_date_range_dob').daterangepicker({
			autoUpdateInput: false,  // Prevents the input from being auto-filled on initialization
			ranges: {
				'Today': [moment(), moment()],
				'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
				'Next Month': [moment().add(1, 'month').startOf('month'), moment().add(1, 'month').endOf('month')]
			}
		}, booking_range);

		// Event when a date range is selected
		$('#src_reff_record_date_range_dob').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
		});

		// Event when the date range picker is canceled
		$('#src_reff_record_date_range_dob').on('cancel.daterangepicker', function(ev, picker) {
			$(this).val('');
		});

		// Clear the input initially to keep it blank
		if($('#src_reff_record_date_range_dob').val() != ''){
			// $('#src_reff_record_date_range_dob').val('MM/DD/YYYY - MM/DD/YYYY');
		}else{
			$('#src_reff_record_date_range_dob').val('MM/DD/YYYY - MM/DD/YYYY');
		}
	}
	// referral records
	if ($('#src_reff_record_date_range_anny').length > 0) {
		function booking_range(start, end) {
			// Update the input field with the selected date range in MM/DD/YYYY format
			$('#src_reff_record_date_range_anny').val(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
		}

		$('#src_reff_record_date_range_anny').daterangepicker({
			autoUpdateInput: false,  // Prevents the input from being auto-filled on initialization
			ranges: {
				'Today': [moment(), moment()],
				'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
				'Next Month': [moment().add(1, 'month').startOf('month'), moment().add(1, 'month').endOf('month')]
			}
		}, booking_range);

		// Event when a date range is selected
		$('#src_reff_record_date_range_anny').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
		});

		// Event when the date range picker is canceled
		$('#src_reff_record_date_range_anny').on('cancel.daterangepicker', function(ev, picker) {
			$(this).val('');
		});

		// Clear the input initially to keep it blank
		if($('#src_reff_record_date_range_anny').val() != ''){
			// $('#src_reff_record_date_range_anny').val('MM/DD/YYYY - MM/DD/YYYY');
		}else{
			$('#src_reff_record_date_range_anny').val('MM/DD/YYYY - MM/DD/YYYY');
		}
	}
	
	// referral resource
	if ($('#src_resource_date_range_dob').length > 0) {
		function booking_range(start, end) {
			// Update the input field with the selected date range in MM/DD/YYYY format
			$('#src_resource_date_range_dob').val(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
		}

		$('#src_resource_date_range_dob').daterangepicker({
			autoUpdateInput: false,  // Prevents the input from being auto-filled on initialization
			ranges: {
				'Today': [moment(), moment()],
				'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
				'Next Month': [moment().add(1, 'month').startOf('month'), moment().add(1, 'month').endOf('month')]
			}
		}, booking_range);

		// Event when a date range is selected
		$('#src_resource_date_range_dob').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
		});

		// Event when the date range picker is canceled
		$('#src_resource_date_range_dob').on('cancel.daterangepicker', function(ev, picker) {
			$(this).val('');
		});

		// Clear the input initially to keep it blank
		if($('#src_resource_date_range_dob').val() != ''){
			// $('#src_resource_date_range_dob').val('MM/DD/YYYY - MM/DD/YYYY');
		}else{
			$('#src_resource_date_range_dob').val('MM/DD/YYYY - MM/DD/YYYY');
		}
	}
	
	if ($('#src_resource_date_range_anny').length > 0) {
		function booking_range(start, end) {
			// Update the input field with the selected date range in MM/DD/YYYY format
			$('#src_resource_date_range_anny').val(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
		}

		$('#src_resource_date_range_anny').daterangepicker({
			autoUpdateInput: false,  // Prevents the input from being auto-filled on initialization
			ranges: {
				'Today': [moment(), moment()],
				'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
				'Next Month': [moment().add(1, 'month').startOf('month'), moment().add(1, 'month').endOf('month')]
			}
		}, booking_range);

		// Event when a date range is selected
		$('#src_resource_date_range_anny').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
		});

		// Event when the date range picker is canceled
		$('#src_resource_date_range_anny').on('cancel.daterangepicker', function(ev, picker) {
			$(this).val('');
		});

		// Clear the input initially to keep it blank
		if($('#src_resource_date_range_anny').val() != ''){
			// $('#src_resource_date_range_anny').val('MM/DD/YYYY - MM/DD/YYYY');
		}else{
			$('#src_resource_date_range_anny').val('MM/DD/YYYY - MM/DD/YYYY');
		}
	}
	
	if ($('#src_product_code_date_range_phone').length > 0) {
		function booking_range(start, end) {
			// Update the input field with the selected date range in MM/DD/YYYY format
			$('#src_product_code_date_range_phone').val(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
		}

		$('#src_product_code_date_range_phone').daterangepicker({
			autoUpdateInput: false,  // Prevents the input from being auto-filled on initialization
			ranges: {
				'Today': [moment(), moment()],
				'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
				'Next Month': [moment().add(1, 'month').startOf('month'), moment().add(1, 'month').endOf('month')]
			}
		}, booking_range);

		// Event when a date range is selected
		$('#src_product_code_date_range_phone').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
		});

		// Event when the date range picker is canceled
		$('#src_product_code_date_range_phone').on('cancel.daterangepicker', function(ev, picker) {
			$(this).val('');
		});

		// Clear the input initially to keep it blank
		if($('#src_product_code_date_range_phone').val() != ''){
			// $('#src_resource_date_range_anny').val('MM/DD/YYYY - MM/DD/YYYY');
		}else{
			$('#src_product_code_date_range_phone').val('MM/DD/YYYY - MM/DD/YYYY');
		}
	}
	
	if ($('#src_product_gr_date_range_phone').length > 0) {
		function booking_range(start, end) {
			// Update the input field with the selected date range in MM/DD/YYYY format
			$('#src_product_gr_date_range_phone').val(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
		}

		$('#src_product_gr_date_range_phone').daterangepicker({
			autoUpdateInput: false,  // Prevents the input from being auto-filled on initialization
			ranges: {
				'Today': [moment(), moment()],
				'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
				'Next Month': [moment().add(1, 'month').startOf('month'), moment().add(1, 'month').endOf('month')]
			}
		}, booking_range);

		// Event when a date range is selected
		$('#src_product_gr_date_range_phone').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
		});

		// Event when the date range picker is canceled
		$('#src_product_gr_date_range_phone').on('cancel.daterangepicker', function(ev, picker) {
			$(this).val('');
		});

		// Clear the input initially to keep it blank
		if($('#src_product_gr_date_range_phone').val() != ''){
			// $('#src_resource_date_range_anny').val('MM/DD/YYYY - MM/DD/YYYY');
		}else{
			$('#src_product_gr_date_range_phone').val('MM/DD/YYYY - MM/DD/YYYY');
		}
	}
	
	if ($('#src_product_unit_date_range_phone').length > 0) {
		function booking_range(start, end) {
			// Update the input field with the selected date range in MM/DD/YYYY format
			$('#src_product_unit_date_range_phone').val(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
		}

		$('#src_product_unit_date_range_phone').daterangepicker({
			autoUpdateInput: false,  // Prevents the input from being auto-filled on initialization
			ranges: {
				'Today': [moment(), moment()],
				'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
				'Next Month': [moment().add(1, 'month').startOf('month'), moment().add(1, 'month').endOf('month')]
			}
		}, booking_range);

		// Event when a date range is selected
		$('#src_product_unit_date_range_phone').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
		});

		// Event when the date range picker is canceled
		$('#src_product_unit_date_range_phone').on('cancel.daterangepicker', function(ev, picker) {
			$(this).val('');
		});

		// Clear the input initially to keep it blank
		if($('#src_product_unit_date_range_phone').val() != ''){
			// $('#src_resource_date_range_anny').val('MM/DD/YYYY - MM/DD/YYYY');
		}else{
			$('#src_product_unit_date_range_phone').val('MM/DD/YYYY - MM/DD/YYYY');
		}
	}
	
	if ($('#src_product_name_date_range_phone').length > 0) {
		function booking_range(start, end) {
			// Update the input field with the selected date range in MM/DD/YYYY format
			$('#src_product_name_date_range_phone').val(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
		}

		$('#src_product_name_date_range_phone').daterangepicker({
			autoUpdateInput: false,  // Prevents the input from being auto-filled on initialization
			ranges: {
				'Today': [moment(), moment()],
				'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
				'Next Month': [moment().add(1, 'month').startOf('month'), moment().add(1, 'month').endOf('month')]
			}
		}, booking_range);

		// Event when a date range is selected
		$('#src_product_name_date_range_phone').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
		});

		// Event when the date range picker is canceled
		$('#src_product_name_date_range_phone').on('cancel.daterangepicker', function(ev, picker) {
			$(this).val('');
		});

		// Clear the input initially to keep it blank
		if($('#src_product_name_date_range_phone').val() != ''){
			// $('#src_resource_date_range_anny').val('MM/DD/YYYY - MM/DD/YYYY');
		}else{
			$('#src_product_name_date_range_phone').val('MM/DD/YYYY - MM/DD/YYYY');
		}
	}
	
	if ($('#src_prospect_stage_date_range_phone').length > 0) {
		function booking_range(start, end) {
			// Update the input field with the selected date range in MM/DD/YYYY format
			$('#src_prospect_stage_date_range_phone').val(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
		}

		$('#src_prospect_stage_date_range_phone').daterangepicker({
			autoUpdateInput: false,  // Prevents the input from being auto-filled on initialization
			ranges: {
				'Today': [moment(), moment()],
				'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
				'Next Month': [moment().add(1, 'month').startOf('month'), moment().add(1, 'month').endOf('month')]
			}
		}, booking_range);

		// Event when a date range is selected
		$('#src_prospect_stage_date_range_phone').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
		});

		// Event when the date range picker is canceled
		$('#src_prospect_stage_date_range_phone').on('cancel.daterangepicker', function(ev, picker) {
			$(this).val('');
		});

		// Clear the input initially to keep it blank
		if($('#src_prospect_stage_date_range_phone').val() != ''){
			// $('#src_resource_date_range_anny').val('MM/DD/YYYY - MM/DD/YYYY');
		}else{
			$('#src_prospect_stage_date_range_phone').val('MM/DD/YYYY - MM/DD/YYYY');
		}
	}
	
	if ($('#src_resrc_potal_date_range_phone').length > 0) {
		function booking_range(start, end) {
			// Update the input field with the selected date range in MM/DD/YYYY format
			$('#src_resrc_potal_date_range_phone').val(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
		}

		$('#src_resrc_potal_date_range_phone').daterangepicker({
			autoUpdateInput: false,  // Prevents the input from being auto-filled on initialization
			ranges: {
				'Today': [moment(), moment()],
				'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
				'Next Month': [moment().add(1, 'month').startOf('month'), moment().add(1, 'month').endOf('month')]
			}
		}, booking_range);

		// Event when a date range is selected
		$('#src_resrc_potal_date_range_phone').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
		});

		// Event when the date range picker is canceled
		$('#src_resrc_potal_date_range_phone').on('cancel.daterangepicker', function(ev, picker) {
			$(this).val('');
		});

		// Clear the input initially to keep it blank
		if($('#src_resrc_potal_date_range_phone').val() != ''){
			// $('#src_resource_date_range_anny').val('MM/DD/YYYY - MM/DD/YYYY');
		}else{
			$('#src_resrc_potal_date_range_phone').val('MM/DD/YYYY - MM/DD/YYYY');
		}
	}
	
	if ($('#src_product_deal_date_range_phone').length > 0) {
		function booking_range(start, end) {
			// Update the input field with the selected date range in MM/DD/YYYY format
			$('#src_product_deal_date_range_phone').val(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
		}

		$('#src_product_deal_date_range_phone').daterangepicker({
			autoUpdateInput: false,  // Prevents the input from being auto-filled on initialization
			ranges: {
				'Today': [moment(), moment()],
				'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
				'Next Month': [moment().add(1, 'month').startOf('month'), moment().add(1, 'month').endOf('month')]
			}
		}, booking_range);

		// Event when a date range is selected
		$('#src_product_deal_date_range_phone').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
		});

		// Event when the date range picker is canceled
		$('#src_product_deal_date_range_phone').on('cancel.daterangepicker', function(ev, picker) {
			$(this).val('');
		});

		// Clear the input initially to keep it blank
		if($('#src_product_deal_date_range_phone').val() != ''){
			// $('#src_resource_date_range_anny').val('MM/DD/YYYY - MM/DD/YYYY');
		}else{
			$('#src_product_deal_date_range_phone').val('MM/DD/YYYY - MM/DD/YYYY');
		}
	}
	
	if ($('#src_reff_category_date_range_phone').length > 0) {
		function booking_range(start, end) {
			// Update the input field with the selected date range in MM/DD/YYYY format
			$('#src_reff_category_date_range_phone').val(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
		}

		$('#src_reff_category_date_range_phone').daterangepicker({
			autoUpdateInput: false,  // Prevents the input from being auto-filled on initialization
			ranges: {
				'Today': [moment(), moment()],
				'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
				'Next Month': [moment().add(1, 'month').startOf('month'), moment().add(1, 'month').endOf('month')]
			}
		}, booking_range);

		// Event when a date range is selected
		$('#src_reff_category_date_range_phone').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
		});

		// Event when the date range picker is canceled
		$('#src_reff_category_date_range_phone').on('cancel.daterangepicker', function(ev, picker) {
			$(this).val('');
		});

		// Clear the input initially to keep it blank
		if($('#src_reff_category_date_range_phone').val() != ''){
			// $('#src_resource_date_range_anny').val('MM/DD/YYYY - MM/DD/YYYY');
		}else{
			$('#src_reff_category_date_range_phone').val('MM/DD/YYYY - MM/DD/YYYY');
		}
	}
	
	if ($('#src_cust_group_date_range_phone').length > 0) {
		function booking_range(start, end) {
			// Update the input field with the selected date range in MM/DD/YYYY format
			$('#src_cust_group_date_range_phone').val(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
		}

		$('#src_cust_group_date_range_phone').daterangepicker({
			autoUpdateInput: false,  // Prevents the input from being auto-filled on initialization
			ranges: {
				'Today': [moment(), moment()],
				'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
				'Next Month': [moment().add(1, 'month').startOf('month'), moment().add(1, 'month').endOf('month')]
			}
		}, booking_range);

		// Event when a date range is selected
		$('#src_cust_group_date_range_phone').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
		});

		// Event when the date range picker is canceled
		$('#src_cust_group_date_range_phone').on('cancel.daterangepicker', function(ev, picker) {
			$(this).val('');
		});

		// Clear the input initially to keep it blank
		if($('#src_cust_group_date_range_phone').val() != ''){
			// $('#src_resource_date_range_anny').val('MM/DD/YYYY - MM/DD/YYYY');
		}else{
			$('#src_cust_group_date_range_phone').val('MM/DD/YYYY - MM/DD/YYYY');
		}
	}
	
	if ($('#src_cust_branch_date_range_phone').length > 0) {
		function booking_range(start, end) {
			// Update the input field with the selected date range in MM/DD/YYYY format
			$('#src_cust_branch_date_range_phone').val(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
		}

		$('#src_cust_branch_date_range_phone').daterangepicker({
			autoUpdateInput: false,  // Prevents the input from being auto-filled on initialization
			ranges: {
				'Today': [moment(), moment()],
				'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
				'Next Month': [moment().add(1, 'month').startOf('month'), moment().add(1, 'month').endOf('month')]
			}
		}, booking_range);

		// Event when a date range is selected
		$('#src_cust_branch_date_range_phone').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
		});

		// Event when the date range picker is canceled
		$('#src_cust_branch_date_range_phone').on('cancel.daterangepicker', function(ev, picker) {
			$(this).val('');
		});

		// Clear the input initially to keep it blank
		if($('#src_cust_branch_date_range_phone').val() != ''){
			// $('#src_resource_date_range_anny').val('MM/DD/YYYY - MM/DD/YYYY');
		}else{
			$('#src_cust_branch_date_range_phone').val('MM/DD/YYYY - MM/DD/YYYY');
		}
	}
	
	if ($('#src_cust_business_entity_date_range_phone').length > 0) {
		function booking_range(start, end) {
			// Update the input field with the selected date range in MM/DD/YYYY format
			$('#src_cust_business_entity_date_range_phone').val(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
		}

		$('#src_cust_business_entity_date_range_phone').daterangepicker({
			autoUpdateInput: false,  // Prevents the input from being auto-filled on initialization
			ranges: {
				'Today': [moment(), moment()],
				'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
				'Next Month': [moment().add(1, 'month').startOf('month'), moment().add(1, 'month').endOf('month')]
			}
		}, booking_range);

		// Event when a date range is selected
		$('#src_cust_business_entity_date_range_phone').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
		});

		// Event when the date range picker is canceled
		$('#src_cust_business_entity_date_range_phone').on('cancel.daterangepicker', function(ev, picker) {
			$(this).val('');
		});

		// Clear the input initially to keep it blank
		if($('#src_cust_business_entity_date_range_phone').val() != ''){
			// $('#src_resource_date_range_anny').val('MM/DD/YYYY - MM/DD/YYYY');
		}else{
			$('#src_cust_business_entity_date_range_phone').val('MM/DD/YYYY - MM/DD/YYYY');
		}
	}
	
	if ($('#src_cust_nature_date_range_phone').length > 0) {
		function booking_range(start, end) {
			// Update the input field with the selected date range in MM/DD/YYYY format
			$('#src_cust_nature_date_range_phone').val(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
		}

		$('#src_cust_nature_date_range_phone').daterangepicker({
			autoUpdateInput: false,  // Prevents the input from being auto-filled on initialization
			ranges: {
				'Today': [moment(), moment()],
				'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
				'Next Month': [moment().add(1, 'month').startOf('month'), moment().add(1, 'month').endOf('month')]
			}
		}, booking_range);

		// Event when a date range is selected
		$('#src_cust_nature_date_range_phone').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
		});

		// Event when the date range picker is canceled
		$('#src_cust_nature_date_range_phone').on('cancel.daterangepicker', function(ev, picker) {
			$(this).val('');
		});

		// Clear the input initially to keep it blank
		if($('#src_cust_nature_date_range_phone').val() != ''){
			// $('#src_resource_date_range_anny').val('MM/DD/YYYY - MM/DD/YYYY');
		}else{
			$('#src_cust_nature_date_range_phone').val('MM/DD/YYYY - MM/DD/YYYY');
		}
	}
	
	if ($('#src_cust_employee_date_range_phone').length > 0) {
		function booking_range(start, end) {
			// Update the input field with the selected date range in MM/DD/YYYY format
			$('#src_cust_employee_date_range_phone').val(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
		}

		$('#src_cust_employee_date_range_phone').daterangepicker({
			autoUpdateInput: false,  // Prevents the input from being auto-filled on initialization
			ranges: {
				'Today': [moment(), moment()],
				'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
				'Next Month': [moment().add(1, 'month').startOf('month'), moment().add(1, 'month').endOf('month')]
			}
		}, booking_range);

		// Event when a date range is selected
		$('#src_cust_employee_date_range_phone').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
		});

		// Event when the date range picker is canceled
		$('#src_cust_employee_date_range_phone').on('cancel.daterangepicker', function(ev, picker) {
			$(this).val('');
		});

		// Clear the input initially to keep it blank
		if($('#src_cust_employee_date_range_phone').val() != ''){
			// $('#src_resource_date_range_anny').val('MM/DD/YYYY - MM/DD/YYYY');
		}else{
			$('#src_cust_employee_date_range_phone').val('MM/DD/YYYY - MM/DD/YYYY');
		}
	}
	
	if ($('#src_cust_accountingBy_date_range_phone').length > 0) {
		function booking_range(start, end) {
			// Update the input field with the selected date range in MM/DD/YYYY format
			$('#src_cust_accountingBy_date_range_phone').val(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
		}

		$('#src_cust_accountingBy_date_range_phone').daterangepicker({
			autoUpdateInput: false,  // Prevents the input from being auto-filled on initialization
			ranges: {
				'Today': [moment(), moment()],
				'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
				'Next Month': [moment().add(1, 'month').startOf('month'), moment().add(1, 'month').endOf('month')]
			}
		}, booking_range);

		// Event when a date range is selected
		$('#src_cust_accountingBy_date_range_phone').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
		});

		// Event when the date range picker is canceled
		$('#src_cust_accountingBy_date_range_phone').on('cancel.daterangepicker', function(ev, picker) {
			$(this).val('');
		});

		// Clear the input initially to keep it blank
		if($('#src_cust_accountingBy_date_range_phone').val() != ''){
			// $('#src_resource_date_range_anny').val('MM/DD/YYYY - MM/DD/YYYY');
		}else{
			$('#src_cust_accountingBy_date_range_phone').val('MM/DD/YYYY - MM/DD/YYYY');
		}
	}
	
	if ($('#src_cust_business_turnover_date_range_phone').length > 0) {
		function booking_range(start, end) {
			// Update the input field with the selected date range in MM/DD/YYYY format
			$('#src_cust_business_turnover_date_range_phone').val(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
		}

		$('#src_cust_business_turnover_date_range_phone').daterangepicker({
			autoUpdateInput: false,  // Prevents the input from being auto-filled on initialization
			ranges: {
				'Today': [moment(), moment()],
				'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
				'Next Month': [moment().add(1, 'month').startOf('month'), moment().add(1, 'month').endOf('month')]
			}
		}, booking_range);

		// Event when a date range is selected
		$('#src_cust_business_turnover_date_range_phone').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
		});

		// Event when the date range picker is canceled
		$('#src_cust_business_turnover_date_range_phone').on('cancel.daterangepicker', function(ev, picker) {
			$(this).val('');
		});

		// Clear the input initially to keep it blank
		if($('#src_cust_business_turnover_date_range_phone').val() != ''){
			// $('#src_resource_date_range_anny').val('MM/DD/YYYY - MM/DD/YYYY');
		}else{
			$('#src_cust_business_turnover_date_range_phone').val('MM/DD/YYYY - MM/DD/YYYY');
		}
	}
	
	if ($('#src_cust_product_family_date_range_phone').length > 0) {
		function booking_range(start, end) {
			// Update the input field with the selected date range in MM/DD/YYYY format
			$('#src_cust_product_family_date_range_phone').val(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
		}

		$('#src_cust_product_family_date_range_phone').daterangepicker({
			autoUpdateInput: false,  // Prevents the input from being auto-filled on initialization
			ranges: {
				'Today': [moment(), moment()],
				'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
				'Next Month': [moment().add(1, 'month').startOf('month'), moment().add(1, 'month').endOf('month')]
			}
		}, booking_range);

		// Event when a date range is selected
		$('#src_cust_product_family_date_range_phone').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
		});

		// Event when the date range picker is canceled
		$('#src_cust_product_family_date_range_phone').on('cancel.daterangepicker', function(ev, picker) {
			$(this).val('');
		});

		// Clear the input initially to keep it blank
		if($('#src_cust_product_family_date_range_phone').val() != ''){
			// $('#src_resource_date_range_anny').val('MM/DD/YYYY - MM/DD/YYYY');
		}else{
			$('#src_cust_product_family_date_range_phone').val('MM/DD/YYYY - MM/DD/YYYY');
		}
	}
	
	if ($('#src_cust_flavor_date_range_phone').length > 0) {
		function booking_range(start, end) {
			// Update the input field with the selected date range in MM/DD/YYYY format
			$('#src_cust_flavor_date_range_phone').val(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
		}

		$('#src_cust_flavor_date_range_phone').daterangepicker({
			autoUpdateInput: false,  // Prevents the input from being auto-filled on initialization
			ranges: {
				'Today': [moment(), moment()],
				'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
				'Next Month': [moment().add(1, 'month').startOf('month'), moment().add(1, 'month').endOf('month')]
			}
		}, booking_range);

		// Event when a date range is selected
		$('#src_cust_flavor_date_range_phone').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
		});

		// Event when the date range picker is canceled
		$('#src_cust_flavor_date_range_phone').on('cancel.daterangepicker', function(ev, picker) {
			$(this).val('');
		});

		// Clear the input initially to keep it blank
		if($('#src_cust_flavor_date_range_phone').val() != ''){
			// $('#src_resource_date_range_anny').val('MM/DD/YYYY - MM/DD/YYYY');
		}else{
			$('#src_cust_flavor_date_range_phone').val('MM/DD/YYYY - MM/DD/YYYY');
		}
	}
	
	if ($('#src_cust_tally_users_date_range_phone').length > 0) {
		function booking_range(start, end) {
			// Update the input field with the selected date range in MM/DD/YYYY format
			$('#src_cust_tally_users_date_range_phone').val(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
		}

		$('#src_cust_tally_users_date_range_phone').daterangepicker({
			autoUpdateInput: false,  // Prevents the input from being auto-filled on initialization
			ranges: {
				'Today': [moment(), moment()],
				'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
				'Next Month': [moment().add(1, 'month').startOf('month'), moment().add(1, 'month').endOf('month')]
			}
		}, booking_range);

		// Event when a date range is selected
		$('#src_cust_tally_users_date_range_phone').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
		});

		// Event when the date range picker is canceled
		$('#src_cust_tally_users_date_range_phone').on('cancel.daterangepicker', function(ev, picker) {
			$(this).val('');
		});

		// Clear the input initially to keep it blank
		if($('#src_cust_tally_users_date_range_phone').val() != ''){
			// $('#src_resource_date_range_anny').val('MM/DD/YYYY - MM/DD/YYYY');
		}else{
			$('#src_cust_tally_users_date_range_phone').val('MM/DD/YYYY - MM/DD/YYYY');
		}
	}
	
	if ($('#src_cust_expiry_reason_date_range_phone').length > 0) {
		function booking_range(start, end) {
			// Update the input field with the selected date range in MM/DD/YYYY format
			$('#src_cust_expiry_reason_date_range_phone').val(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
		}

		$('#src_cust_expiry_reason_date_range_phone').daterangepicker({
			autoUpdateInput: false,  // Prevents the input from being auto-filled on initialization
			ranges: {
				'Today': [moment(), moment()],
				'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
				'Next Month': [moment().add(1, 'month').startOf('month'), moment().add(1, 'month').endOf('month')]
			}
		}, booking_range);

		// Event when a date range is selected
		$('#src_cust_expiry_reason_date_range_phone').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
		});

		// Event when the date range picker is canceled
		$('#src_cust_expiry_reason_date_range_phone').on('cancel.daterangepicker', function(ev, picker) {
			$(this).val('');
		});

		// Clear the input initially to keep it blank
		if($('#src_cust_expiry_reason_date_range_phone').val() != ''){
			// $('#src_resource_date_range_anny').val('MM/DD/YYYY - MM/DD/YYYY');
		}else{
			$('#src_cust_expiry_reason_date_range_phone').val('MM/DD/YYYY - MM/DD/YYYY');
		}
	}
	
	if ($('#src_cust_expiry_reason_date_range_phone').length > 0) {
		function booking_range(start, end) {
			// Update the input field with the selected date range in MM/DD/YYYY format
			$('#src_cust_expiry_reason_date_range_phone').val(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
		}

		$('#src_cust_expiry_reason_date_range_phone').daterangepicker({
			autoUpdateInput: false,  // Prevents the input from being auto-filled on initialization
			ranges: {
				'Today': [moment(), moment()],
				'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
				'Next Month': [moment().add(1, 'month').startOf('month'), moment().add(1, 'month').endOf('month')]
			}
		}, booking_range);

		// Event when a date range is selected
		$('#src_cust_expiry_reason_date_range_phone').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
		});

		// Event when the date range picker is canceled
		$('#src_cust_expiry_reason_date_range_phone').on('cancel.daterangepicker', function(ev, picker) {
			$(this).val('');
		});

		// Clear the input initially to keep it blank
		if($('#src_cust_expiry_reason_date_range_phone').val() != ''){
			// $('#src_resource_date_range_anny').val('MM/DD/YYYY - MM/DD/YYYY');
		}else{
			$('#src_cust_expiry_reason_date_range_phone').val('MM/DD/YYYY - MM/DD/YYYY');
		}
	}
	
	if ($('#src_cust_msme_type_date_range_phone').length > 0) {
		function booking_range(start, end) {
			// Update the input field with the selected date range in MM/DD/YYYY format
			$('#src_cust_msme_type_date_range_phone').val(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
		}

		$('#src_cust_msme_type_date_range_phone').daterangepicker({
			autoUpdateInput: false,  // Prevents the input from being auto-filled on initialization
			ranges: {
				'Today': [moment(), moment()],
				'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
				'Next Month': [moment().add(1, 'month').startOf('month'), moment().add(1, 'month').endOf('month')]
			}
		}, booking_range);

		// Event when a date range is selected
		$('#src_cust_msme_type_date_range_phone').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
		});

		// Event when the date range picker is canceled
		$('#src_cust_msme_type_date_range_phone').on('cancel.daterangepicker', function(ev, picker) {
			$(this).val('');
		});

		// Clear the input initially to keep it blank
		if($('#src_cust_msme_type_date_range_phone').val() != ''){
			// $('#src_resource_date_range_anny').val('MM/DD/YYYY - MM/DD/YYYY');
		}else{
			$('#src_cust_msme_type_date_range_phone').val('MM/DD/YYYY - MM/DD/YYYY');
		}
	}
	
	if ($('#src_cust_tally_tdls_date_range_phone').length > 0) {
		function booking_range(start, end) {
			// Update the input field with the selected date range in MM/DD/YYYY format
			$('#src_cust_tally_tdls_date_range_phone').val(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
		}

		$('#src_cust_tally_tdls_date_range_phone').daterangepicker({
			autoUpdateInput: false,  // Prevents the input from being auto-filled on initialization
			ranges: {
				'Today': [moment(), moment()],
				'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
				'Next Month': [moment().add(1, 'month').startOf('month'), moment().add(1, 'month').endOf('month')]
			}
		}, booking_range);

		// Event when a date range is selected
		$('#src_cust_tally_tdls_date_range_phone').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
		});

		// Event when the date range picker is canceled
		$('#src_cust_tally_tdls_date_range_phone').on('cancel.daterangepicker', function(ev, picker) {
			$(this).val('');
		});

		// Clear the input initially to keep it blank
		if($('#src_cust_tally_tdls_date_range_phone').val() != ''){
			// $('#src_resource_date_range_anny').val('MM/DD/YYYY - MM/DD/YYYY');
		}else{
			$('#src_cust_tally_tdls_date_range_phone').val('MM/DD/YYYY - MM/DD/YYYY');
		}
	}
	
	if ($('#src_cust_adv_feature_date_range_phone').length > 0) {
		function booking_range(start, end) {
			// Update the input field with the selected date range in MM/DD/YYYY format
			$('#src_cust_adv_feature_date_range_phone').val(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
		}

		$('#src_cust_adv_feature_date_range_phone').daterangepicker({
			autoUpdateInput: false,  // Prevents the input from being auto-filled on initialization
			ranges: {
				'Today': [moment(), moment()],
				'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
				'Next Month': [moment().add(1, 'month').startOf('month'), moment().add(1, 'month').endOf('month')]
			}
		}, booking_range);

		// Event when a date range is selected
		$('#src_cust_adv_feature_date_range_phone').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
		});

		// Event when the date range picker is canceled
		$('#src_cust_adv_feature_date_range_phone').on('cancel.daterangepicker', function(ev, picker) {
			$(this).val('');
		});

		// Clear the input initially to keep it blank
		if($('#src_cust_adv_feature_date_range_phone').val() != ''){
			// $('#src_resource_date_range_anny').val('MM/DD/YYYY - MM/DD/YYYY');
		}else{
			$('#src_cust_adv_feature_date_range_phone').val('MM/DD/YYYY - MM/DD/YYYY');
		}
	}
	
	if ($('#src_quatation_stage_date_range_phone').length > 0) {
		function booking_range(start, end) {
			// Update the input field with the selected date range in MM/DD/YYYY format
			$('#src_quatation_stage_date_range_phone').val(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
		}

		$('#src_quatation_stage_date_range_phone').daterangepicker({
			autoUpdateInput: false,  // Prevents the input from being auto-filled on initialization
			ranges: {
				'Today': [moment(), moment()],
				'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
				'Next Month': [moment().add(1, 'month').startOf('month'), moment().add(1, 'month').endOf('month')]
			}
		}, booking_range);

		// Event when a date range is selected
		$('#src_quatation_stage_date_range_phone').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
		});

		// Event when the date range picker is canceled
		$('#src_quatation_stage_date_range_phone').on('cancel.daterangepicker', function(ev, picker) {
			$(this).val('');
		});

		// Clear the input initially to keep it blank
		if($('#src_quatation_stage_date_range_phone').val() != ''){
			// $('#src_resource_date_range_anny').val('MM/DD/YYYY - MM/DD/YYYY');
		}else{
			$('#src_quatation_stage_date_range_phone').val('MM/DD/YYYY - MM/DD/YYYY');
		}
	}
	
	if ($('#src_quatation_term_date_range_phone').length > 0) {
		function booking_range(start, end) {
			// Update the input field with the selected date range in MM/DD/YYYY format
			$('#src_quatation_term_date_range_phone').val(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
		}

		$('#src_quatation_term_date_range_phone').daterangepicker({
			autoUpdateInput: false,  // Prevents the input from being auto-filled on initialization
			ranges: {
				'Today': [moment(), moment()],
				'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
				'Next Month': [moment().add(1, 'month').startOf('month'), moment().add(1, 'month').endOf('month')]
			}
		}, booking_range);

		// Event when a date range is selected
		$('#src_quatation_term_date_range_phone').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
		});

		// Event when the date range picker is canceled
		$('#src_quatation_term_date_range_phone').on('cancel.daterangepicker', function(ev, picker) {
			$(this).val('');
		});

		// Clear the input initially to keep it blank
		if($('#src_quatation_term_date_range_phone').val() != ''){
			// $('#src_resource_date_range_anny').val('MM/DD/YYYY - MM/DD/YYYY');
		}else{
			$('#src_quatation_term_date_range_phone').val('MM/DD/YYYY - MM/DD/YYYY');
		}
	}
	
	if ($('#src_performa_invoice_stage_date_range_phone').length > 0) {
		function booking_range(start, end) {
			// Update the input field with the selected date range in MM/DD/YYYY format
			$('#src_performa_invoice_stage_date_range_phone').val(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
		}

		$('#src_performa_invoice_stage_date_range_phone').daterangepicker({
			autoUpdateInput: false,  // Prevents the input from being auto-filled on initialization
			ranges: {
				'Today': [moment(), moment()],
				'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
				'Next Month': [moment().add(1, 'month').startOf('month'), moment().add(1, 'month').endOf('month')]
			}
		}, booking_range);

		// Event when a date range is selected
		$('#src_performa_invoice_stage_date_range_phone').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
		});

		// Event when the date range picker is canceled
		$('#src_performa_invoice_stage_date_range_phone').on('cancel.daterangepicker', function(ev, picker) {
			$(this).val('');
		});

		// Clear the input initially to keep it blank
		if($('#src_performa_invoice_stage_date_range_phone').val() != ''){
			// $('#src_resource_date_range_anny').val('MM/DD/YYYY - MM/DD/YYYY');
		}else{
			$('#src_performa_invoice_stage_date_range_phone').val('MM/DD/YYYY - MM/DD/YYYY');
		}
	}
	
	if ($('#src_performa_invoice_term_date_range_phone').length > 0) {
		function booking_range(start, end) {
			// Update the input field with the selected date range in MM/DD/YYYY format
			$('#src_performa_invoice_term_date_range_phone').val(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
		}

		$('#src_performa_invoice_term_date_range_phone').daterangepicker({
			autoUpdateInput: false,  // Prevents the input from being auto-filled on initialization
			ranges: {
				'Today': [moment(), moment()],
				'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
				'Next Month': [moment().add(1, 'month').startOf('month'), moment().add(1, 'month').endOf('month')]
			}
		}, booking_range);

		// Event when a date range is selected
		$('#src_performa_invoice_term_date_range_phone').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
		});

		// Event when the date range picker is canceled
		$('#src_performa_invoice_term_date_range_phone').on('cancel.daterangepicker', function(ev, picker) {
			$(this).val('');
		});

		// Clear the input initially to keep it blank
		if($('#src_performa_invoice_term_date_range_phone').val() != ''){
			// $('#src_resource_date_range_anny').val('MM/DD/YYYY - MM/DD/YYYY');
		}else{
			$('#src_performa_invoice_term_date_range_phone').val('MM/DD/YYYY - MM/DD/YYYY');
		}
	}
	
});
