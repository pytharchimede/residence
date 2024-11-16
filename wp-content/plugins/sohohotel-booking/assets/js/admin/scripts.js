jQuery( document ).ready(function($) {
	
	'use strict';
	
	$("select.shb-select-tab").each(function() {
		$( this ).closest("div").find( " > .shb-select-tab-section" ).css('display','none');
		var shb_selected = $( this ).val();
		$( this ).closest("div").find(" ." + shb_selected).css('display','block');
	});
	
	$("select.shb-select-tab").on('change', function() {
		$( this ).closest("div").find( " > .shb-select-tab-section" ).css('display','none');
		var shb_selected = $( this ).val();
		$( this ).closest("div").find(" ." + shb_selected).css('display','block');
	});
	
	var shb_datepicker_altformat = 'yy-mm-dd';
	var shb_datepicker_firstday = 1;
	
	$('.shb-readonly,.shb-check-in,.shb-check-out').attr('readonly', true);
	
	jQuery('.shb-check-in').datepicker({
		minDate: new Date(),
		dateFormat: shb_datepicker_format,
		dayNamesMin: shb_datepicker_daynames,
		monthNames: shb_datepicker_monthnames,
		firstDay: shb_datepicker_firstday,
		altFormat: shb_datepicker_altformat,
		altField: '.shb-check-in-alt',
		onSelect: function (date) {
            var date2 = $('.shb-check-in').datepicker('getDate');
            date2.setDate(date2.getDate() +1 );
            $('.shb-check-out').datepicker('option', 'minDate', date2);
        },
		onClose: function (e) {
            var date2 = $('.shb-check-out').datepicker('getDate');
            if (!date2) {
				$('.shb-check-out').datepicker('show');
            }
        }
	});
	
	jQuery('.shb-check-out').datepicker({
		minDate: new Date(),
		dateFormat: shb_datepicker_format,
		dayNamesMin: shb_datepicker_daynames,
		monthNames: shb_datepicker_monthnames,
		firstDay: shb_datepicker_firstday,
		altFormat: shb_datepicker_altformat,
		altField: '.shb-check-out-alt',
		onClose: function () {
            var date1 = $('.shb-check-in').datepicker('getDate');
            var date2 = $('.shb-check-out').datepicker('getDate');
			if (date2 <= date1 && date2) {
                var minDate = $('.shb-check-out').datepicker('option', 'minDate');
                $('.shb-check-out').datepicker('setDate', minDate);
            }
        }
	});
	
	if ($('.shb-check-in').datepicker('getDate')) {
		var date2 = $('.shb-check-in').datepicker('getDate');
		$('.shb-check-out').datepicker('option', 'minDate', date2);
	}
	
	$('.shb-checkall-input-hidden').click(function(){
		$(this).parent().find('.shb-checkall-input:checkbox').not(this).prop('checked', this.checked);
	});
	
	jQuery('.shb-single-date').datepicker({
		minDate: new Date(),
		dateFormat: shb_datepicker_format,
		dayNamesMin: shb_datepicker_daynames,
		monthNames: shb_datepicker_monthnames,
		firstDay: shb_datepicker_firstday,
		altFormat: shb_datepicker_altformat,
		altField: '.shb-single-date-alt',
	});
	
	$('.shb-select-accommodation-button').click(function(){
		var shb_select_accommodation_id = "shb-accommodation-" + $(this).attr("data-val");
		$('.' + shb_select_accommodation_id).val($(this).attr("data-val"));
	});
	
	$(window).on("load scroll resize", function () {
		$(".shb-booking-calendar-sticky-wrapper").toggleClass("shb-booking-calendar-sticky-wrapper-show", ($(window).scrollTop() > 200));
	});

});