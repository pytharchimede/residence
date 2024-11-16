<?php



/* ----------------------------------------------------------------------------

   Frontend CSS & JS

---------------------------------------------------------------------------- */
add_action('wp_enqueue_scripts', 'shb_front_js_css');
function shb_front_js_css() {
	
	if(!empty(get_option('shb_date_format'))) {
		$shb_date_format = get_option('shb_date_format');
	} else {
		$shb_date_format = 'DD/MM/YYYY';
	}
	
	if(!empty(get_option('shb_booking_page'))) {
		$booking_page_url = get_permalink(get_option('shb_booking_page'));
	} else {
		$booking_page_url = '';
	}
	
	// Frontend CSS
	wp_enqueue_style('shb_plugin_css', SHB_PLUGIN_URL . 'assets/css/style.css');
	wp_enqueue_style('shb_datepicker', SHB_PLUGIN_URL . 'includes/functions/frontend/datepicker/shb-datepicker.css');
	
	// Frontend JS
	wp_enqueue_script( array( 'jquery', 'jquery-ui-core', 'jquery-ui-datepicker', 'jquery-ui-accordion', 'jquery-ui-tabs', 'jquery-effects-core' ) );
	wp_register_script( 'shb_datepicker', SHB_PLUGIN_URL . 'includes/functions/frontend/datepicker/shb-datepicker.js' );
	wp_enqueue_script( 'shb_datepicker' );
	
	wp_register_script( 'shb_js', SHB_PLUGIN_URL . 'assets/js/scripts.js' );
	wp_enqueue_script( 'shb_js' );
	
	wp_add_inline_script( 'shb_js', "var shbdp_format = '" . $shb_date_format . "';
	var shbdp_format_placeholder = '" . shb_localize_dateformat($shb_date_format) . "';
	var shb_booking_page_url = '" . $booking_page_url . "';
	var shb_err_msg_dates = '" . __('Please select a check in and check out date','sohohotel_booking') . "';
	var shb_err_msg_guests = '" . __('Please select at least 1 guest','sohohotel_booking') . "';
	var shb_datepicker_daynames = ['" . __('Su','sohohotel_booking') . "', '" . __('Mo','sohohotel_booking') . "', '" . __('Tu','sohohotel_booking') . "', '" . __('We','sohohotel_booking') . "', '" . __('Th','sohohotel_booking') . "', '" . __('Fr','sohohotel_booking') . "', '" . __('Sa','sohohotel_booking') . "'];
	var shb_datepicker_monthnames = ['" . __('January','sohohotel_booking') . "', '" . __('February','sohohotel_booking') . "', '" . __('March','sohohotel_booking') . "', '" . __('April','sohohotel_booking') . "', '" . __('May','sohohotel_booking') . "', '" . __('June','sohohotel_booking') . "', '" . __('July','sohohotel_booking') . "', '" . __('August','sohohotel_booking') . "', '" . __('September','sohohotel_booking') . "', '" . __('October','sohohotel_booking') . "', '" . __('November','sohohotel_booking') . "', '" . __('December','sohohotel_booking') . "'];" );
	
}



/* ----------------------------------------------------------------------------

   Localize date format

---------------------------------------------------------------------------- */
function shb_localize_dateformat($dateformat) {
	
	if($dateformat == 'MM/DD/YYYY') {
		$o = __('MM/DD/YYYY','sohohotel_booking');
	} elseif($dateformat == 'YYYY/MM/DD') {
		$o = __('YYYY/MM/DD','sohohotel_booking');
	} elseif($dateformat == 'DD.MM.YYYY') {
		$o = __('DD.MM.YYYY','sohohotel_booking');
	} elseif($dateformat == 'MM.DD.YYYY') {
		$o = __('MM.DD.YYYY','sohohotel_booking');
	} elseif($dateformat == 'YYYY.MM.DD') {
		$o = __('YYYY.MM.DD','sohohotel_booking');
	} else {
		$o = __('DD/MM/YYYY','sohohotel_booking');
	}
	
	return $o;
	
}



/* ----------------------------------------------------------------------------

   Admin CSS & JS

---------------------------------------------------------------------------- */
add_action('admin_enqueue_scripts', 'shb_admin_js_css');
function shb_admin_js_css() {
	
	if(!empty(get_option('shb_date_format'))) {
		
		if(get_option('shb_date_format') == 'DD/MM/YYYY') {
			$shb_date_format = 'dd/mm/yy';
		}
		
		if(get_option('shb_date_format') == 'MM/DD/YYYY') {
			$shb_date_format = 'mm/dd/yy';
		}
		
		if(get_option('shb_date_format') == 'YYYY/MM/DD') {
			$shb_date_format = 'yy/mm/dd';
		}
		
		if(get_option('shb_date_format') == 'DD.MM.YYYY') {
			$shb_date_format = 'dd.mm.yy';
		}
		
		if(get_option('shb_date_format') == 'MM.DD.YYYY') {
			$shb_date_format = 'mm.dd.yy';
		}
		
		if(get_option('shb_date_format') == 'YYYY.MM.DD') {
			$shb_date_format = 'yy.mm.dd';
		}
	
	} else {
		$shb_date_format = 'dd/yy/yy';
	}
	
	// Admin CSS
	wp_enqueue_style('shb_css', SHB_PLUGIN_URL . 'assets/css/admin/style.css');
	wp_enqueue_style('shb_fontawesome', SHB_PLUGIN_URL .'assets/css/admin/fontawesome/css/all.min.css');
	
	// Admin JS
	wp_enqueue_script( 'jquery-ui-datepicker' );
	wp_enqueue_script( 'jquery-ui-accordion' );
	wp_enqueue_script( 'jquery-ui-tabs' );
	wp_register_script( 'shb_js', SHB_PLUGIN_URL . 'assets/js/admin/scripts.js' );
	wp_enqueue_script( 'shb_js' );
	
	if( get_post_type() == 'shb_accommodation' ) {
		wp_register_script( 'shb_accommodation_js', SHB_PLUGIN_URL . 'assets/js/admin/accommodation.js' );
		wp_enqueue_script( 'shb_accommodation_js' );
	}
	
	if( get_post_type() == 'shb_booking' ) {
		wp_register_script( 'shb_booking_js', SHB_PLUGIN_URL . 'assets/js/admin/booking.js' );
		wp_enqueue_script( 'shb_booking_js' );
	}
	
	// Admin Custom JS Variables
	wp_add_inline_script( 'shb_js', "var shb_datepicker_format = '" . $shb_date_format . "';
	var shb_edit_booking_url = '" . get_admin_url() . "post.php?post=" . get_the_ID() . "&action=edit';
	var shb_datepicker_daynames = ['" . __('Su','sohohotel_booking') . "', '" . __('Mo','sohohotel_booking') . "', '" . __('Tu','sohohotel_booking') . "', '" . __('We','sohohotel_booking') . "', '" . __('Th','sohohotel_booking') . "', '" . __('Fr','sohohotel_booking') . "', '" . __('Sa','sohohotel_booking') . "'];
	var shb_datepicker_monthnames = ['" . __('January','sohohotel_booking') . "', '" . __('February','sohohotel_booking') . "', '" . __('March','sohohotel_booking') . "', '" . __('April','sohohotel_booking') . "', '" . __('May','sohohotel_booking') . "', '" . __('June','sohohotel_booking') . "', '" . __('July','sohohotel_booking') . "', '" . __('August','sohohotel_booking') . "', '" . __('September','sohohotel_booking') . "', '" . __('October','sohohotel_booking') . "', '" . __('November','sohohotel_booking') . "', '" . __('December','sohohotel_booking') . "'];" );

}