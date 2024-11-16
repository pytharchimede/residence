<?php 



/* ----------------------------------------------------------------------------

   iCal settings page

---------------------------------------------------------------------------- */
function shb_admin_ical_settings(){ 
	
	echo '<div class="wrap shb-ical-section"><form action="' . get_admin_url() . 'admin.php?page=shb-ical' . '" method="post" class="shb-ical-settings-form">';
	echo '<h1>' . __('Import iCal Data','sohohotel_booking') . '</h1>';
	echo '<p>' . __('This section allows you to import external iCal feeds, you can separate multiple feeds with a comma,','sohohotel_booking') . ' <a target="_blank" href="' . get_home_url() . '/?shb_ical=sync">' . __('click here to import all iCal feeds') . '</a></p>';
	
	$accommodation_ids = shb_get_all_ids('shb_accommodation');	
	$shb_general_fields = array();

	foreach($accommodation_ids as $key => $val) {

		$shb_ical_fields['fields'][$key]['id'] = 'ical_' . $val;
		$shb_ical_fields['fields'][$key]['title'] = get_the_title($val);
		$shb_ical_fields['fields'][$key]['hint'] = __('Seperate multiple feed URLs with a comma ,','sohohotel_booking');
		$shb_ical_fields['fields'][$key]['type'] = 'textarea';
		$shb_ical_fields['fields'][$key]['required'] = false;

	}
	
	$general_data = shb_update_settings($shb_ical_fields);
	echo shb_cpt_fields($shb_ical_fields,$general_data);
	
	echo '<h1>' . __('Export iCal Data','sohohotel_booking') . '</h1>';
	echo '<p>' . __('This section allows you to export your iCal feeds to any external service which supports the iCal format','sohohotel_booking');
	
	echo '<div class="shb-fields-wrapper">';
	
	foreach($accommodation_ids as $key => $val) {
		
		$ical_url = get_site_url() . '/wp-content/plugins/sohohotel-booking/shb_ical/ical_' . $val . '.ics';
		
		echo '<div class="shb-field shb-clearfix">';
			echo '<div class="shb-field-left">';
				echo '<label>' . get_the_title($val) . '</label>';
			echo '</div>';
			echo '<div class="shb-field-right">';
				echo '<a href="' . $ical_url . '">' . $ical_url . '</a>';
			echo '</div>';
		echo '</div>';

	}
	
	echo '</div>';
	echo '<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="' . __('Save Changes', 'sohohotel_booking') . '" /></p>';
	echo '</form></div>';
	
}



/* ----------------------------------------------------------------------------

   Export iCal file

---------------------------------------------------------------------------- */
function shb_ical_export($room_id) {

	$day = date("d");
	$month = date("m");
	$year = date("Y");
	
	$checkin = $year . '-' . $month . '-' . $day;
	$checkout = ($year + 5) . '-' . $month . '-' . $day;
	
	$booking_ids = get_posts(array(
	    'fields'          => 'ids',
	    'posts_per_page'  => -1,
		'post_type' => 'shb_booking',
		'post_status' => array('shb_confirmed','shb_maintenance'),
		'meta_query' => array(
		        'relation' => 'OR',
		        array(
					'key' => 'shb_checkin_sort',
					'value' => array($checkin,$checkout),
					'compare' => 'BETWEEN',
					'type' => 'DATE'
		        ),
		        array(
					'key' => 'shb_checkout_sort',
					'value' => array($checkin,$checkout),
					'compare' => 'BETWEEN',
					'type' => 'DATE'
		        ),
		    )
	));
	
	$dirname = SHB_PLUGIN_DIR . "/shb_ical";
	$ical_file = fopen($dirname . "/ical_" . $room_id . ".ics", "w") or die("Unable to open file!");
	
	$file_content = '';
	$file_content .= "BEGIN:VCALENDAR\r\n";
	$file_content .= "PRODID;X-RICAL-TZSOURCE=TZINFO:-//Soho Hotel Booking//Calendar//EN\r\n";
	$file_content .= "CALSCALE:GREGORIAN\r\n";
	$file_content .= "METHOD:PUBLISH\r\n";
	$file_content .= "VERSION:2.0\r\n";
	
	foreach($booking_ids as $key => $val) {

		$booking_data = get_post_meta($val);
		$booking_data_decoded = json_decode( $booking_data['shb_booking_data'][0], true);
		
		foreach($booking_data_decoded as $key2 => $val2) {
			
			if($room_id == $val2['room_id']) {			
				$file_content .= "BEGIN:VEVENT\r\n";
				$file_content .= "DTSTAMP:" . date("Ymd\THis\Z", time()) . "\r\n";
				$file_content .= "DTSTART;VALUE=DATE:".str_replace("-","",$val2['checkin'])."\r\n";
				$file_content .= "DTEND;VALUE=DATE:".str_replace("-","",$val2['checkout'])."\r\n";
				$file_content .= "UID:".str_replace("-","",$val2['checkin'])."-".str_replace("-","",$val2['checkout'])."-".$room_id."-".$key2."\r\n";
				$file_content .= 'DESCRIPTION:Email: '.$booking_data['shb_custom_form_email'][0].'\nBooking ID: '.$val."\r\n";
				$file_content .= "SUMMARY:".$booking_data['shb_custom_form_first_name'][0] . " " . $booking_data['shb_custom_form_last_name'][0]." - ".get_the_title($room_id)."\r\n";
				$file_content .= "LOCATION:".get_the_title($room_id)."\r\n";
				$file_content .= "END:VEVENT\r\n";
				
			}
		
		}	
		
	}
	
	$file_content .= "END:VCALENDAR";

	fwrite($ical_file, $file_content);
	fclose($ical_file);
	
}



/* ----------------------------------------------------------------------------

   Sync all iCal feeds

---------------------------------------------------------------------------- */
function shb_ical_sync() {
	
	shb_ical_cron_function();
	
	include(SHB_PLUGIN_DIR . '/includes/functions/backend/general/shb-ical-reader.php');
	
	// Delete existing iCal bookings
	$booking_ids = get_posts(array(
	    'fields'          => 'ids',
	    'posts_per_page'  => -1,
		'post_type' => 'shb_booking',
		'post_status' => array('shb_ical')
	));
	
	foreach($booking_ids as $id) {
		wp_delete_post( $id );
	}
	
	// Import new iCal bookings
	$accommodation_ids = shb_get_all_ids('shb_accommodation');	
	
	foreach($accommodation_ids as $key => $room_id) {
		
		$ical_feeds = explode(',',get_option('shb_ical_' . $room_id));
		
		foreach($ical_feeds as $ical_feed) {
			
			$ical = new ICal($ical_feed);
			$ical_data = $ical->events();
			
			if(!empty($ical_data)) {
				
				foreach ($ical_data as $key => $val) {
			
					$booking_data = array();
					$checkin = shb_convert_ical_date($val['DTSTART']);
					$checkout = shb_convert_ical_date($val['DTEND']);
		
					$booking_data['status'] = 'shb_ical';
					$booking_data['booking_data'][1]['checkin'] = $checkin;
					$booking_data['booking_data'][1]['checkout'] = $checkout;
					$booking_data['booking_data'][1]['room_id'] = $room_id;
					$booking_data['ical_summary'] = $val['SUMMARY'];
					$booking_data['ical_url'] = $ical_feed;
			
					shb_add_new_booking($booking_data);

				}
				
				echo __('Success','sohohotel_booking') . ': ' . $ical_feed . '<br />';
				
			} else {
				
				echo __('Error','sohohotel_booking') . ': ' . $ical_feed . '<br />';
				
			}
			
			
			
		}
	
	}
	
	exit();
	
}

if ( !empty($_GET['shb_ical']) ) {
	if ( $_GET['shb_ical'] == 'sync' ) {
		add_action( 'wp', 'shb_ical_sync' );
	}
}



/* ----------------------------------------------------------------------------

   Import booking data from external iCal file

---------------------------------------------------------------------------- */
function shb_convert_ical_date($date) {
	$new_date = substr($date, 0, 8);
	$d = DateTime::createFromFormat("Ymd", $new_date);
	return $d->format("Y-m-d");
}



?>