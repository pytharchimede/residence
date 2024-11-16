<form action="<?php echo get_admin_url() . 'admin.php?page=shb-settings&tab=general'; ?>" method="post" class="shb-admin-settings-form">
		
	<?php $shb_get_pages = get_pages();
	$shb_get_page_ids = wp_list_pluck( $shb_get_pages, 'ID' );
	
	foreach($shb_get_page_ids as $val) {
		$shb_page_options[$val] = get_the_title($val);
	}
	
	$shb_general_fields = array(
		'fields' => array(
			array(
				'id' => 'manual_booking_confirmation',
				'title' => __('Booking confirmation','sohohotel_booking'),
				'hint' => __('Booking dates are not blocked until a booking is set to confirmed status, booking dates will be automatically blocked if you set this option to automatic','sohohotel_booking'),
				'type' => 'select',
				'required' => true,
				'options' => array(
					'automatic' => __('Automatic','sohohotel_booking'),
					'manual' => __('Manual','sohohotel_booking')
				)
			),
			array(
				'id' => 'hotel_address',
				'title' => __('Address','sohohotel_booking'),
				'type' => 'text',
				'required' => true,
			),
			array(
				'id' => 'hotel_address_url',
				'title' => __('Address URL','sohohotel_booking'),
				'type' => 'text',
				'required' => true,
			),
			array(
				'id' => 'hotel_phone',
				'title' => __('Phone Number','sohohotel_booking'),
				'type' => 'text',
				'required' => true,
			),
			array(
				'id' => 'date_format',
				'title' => __('Date Format','sohohotel_booking'),
				'type' => 'select',
				'required' => true,
				'options' => array(
					'DD/MM/YYYY' => 'DD/MM/YYYY',
					'MM/DD/YYYY' => 'MM/DD/YYYY',
					'YYYY/MM/DD' => 'YYYY/MM/DD',
					'DD.MM.YYYY' => 'DD.MM.YYYY',
					'MM.DD.YYYY' => 'MM.DD.YYYY',
					'YYYY.MM.DD' => 'YYYY.MM.DD'
				)
			),
			array(
				'id' => 'alt_date_format',
				'title' => __('Alternative Date Format','sohohotel_booking'),
				'hint' => __('Used on the booking page sidebar, you should use a valid PHP date format such as M d, Y','sohohotel_booking'),
				'type' => 'text',
				'required' => true,
			),
			array(
				'id' => 'my_account_page',
				'title' => __('My Account Page','sohohotel_booking'),
				'type' => 'select',
				'required' => true,
				'options' => $shb_page_options
			),
			array(
				'id' => 'booking_page',
				'title' => __('Booking Page','sohohotel_booking'),
				'type' => 'select',
				'required' => true,
				'options' => $shb_page_options
			),
			array(
				'id' => 'checkin_time',
				'title' => __('Check In Time','sohohotel_booking'),
				'type' => 'text',
				'required' => true,
			),
			array(
				'id' => 'checkout_time',
				'title' => __('Check Out Time','sohohotel_booking'),
				'type' => 'text',
				'required' => true,
			),
			array(
				'id' => 'booking_add_ons_step',
				'title' => __('Booking Form Add-Ons step','sohohotel_booking'),
				'hint' => __('This option allows you to show / hide the Add-On step in the booking process','sohohotel_booking'),
				'type' => 'select',
				'required' => true,
				'options' => array(
					'show' => __('Show','sohohotel_booking'),
					'hide' => __('Hide','sohohotel_booking')
				)
			),
		)
	);
	
	$general_data = shb_update_settings($shb_general_fields);
	echo shb_cpt_fields($shb_general_fields,$general_data); ?>
	
	<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="<?php esc_html_e('Save Changes', 'sohohotel_booking'); ?>" /></p>
	
</form>