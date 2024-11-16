jQuery( document ).ready(function($) {
	
	"use strict";
	
	// Copy first and last name fields to title for search
	$("#first_name").keyup(function () {
		var first_name_val = $("#first_name").val();
		var last_name_val = $("#last_name").val();
		$("#title").val(first_name_val + ' ' + last_name_val);
	}).keyup();
	
	$("#last_name").keyup(function () {
		var first_name_val = $("#first_name").val();
		var last_name_val = $("#last_name").val();
		$("#title").val(first_name_val + ' ' + last_name_val);
	}).keyup();
	
	$('.shb-booking-summary-expand').click(function(){
		$(this).parent().find('.shb-booking-summary-details').toggle();
		return false;
	});
	
	$('.shb-additionalfee-select').click(function(){
		var shb_additionalfee_id = $(this).attr('data-additionalfee');
		var shb_accommodation_num = $(this).attr('data-accommodation');
		$(this).parent().append('<input type="hidden" name="shb_additionalfee_selected" value="' + shb_additionalfee_id + '" />');
		$(this).parent().append('<input type="hidden" name="shb_additionalfee_accommodation_selected" value="' + shb_accommodation_num + '" />');
	});

	$('.shb-accommodation-select').click(function(){
		var shb_accommodation_id = $(this).attr('data-accommodation');
		var shb_rate_id = $(this).attr('data-rate');
		$(this).parent().append('<input type="hidden" name="shb_accommodation_selected" value="' + shb_accommodation_id + '" />');
		$(this).parent().append('<input type="hidden" name="shb_rate_selected" value="' + shb_rate_id + '" />');
	});
	
	$('.shb-email-select').click(function(){
		var shb_email_val = $('#shb-send-email').val();
		$(this).parent().append('<input type="hidden" name="shb_send_email" value="' + shb_email_val + '" />');
	});

});