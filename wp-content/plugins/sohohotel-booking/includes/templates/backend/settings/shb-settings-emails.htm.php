<form action="<?php echo get_admin_url() . 'admin.php?page=shb-settings&tab=emails'; ?>" method="post" class="shb-admin-settings-form">
		
	<?php $shb_get_pages = get_pages();
	$shb_get_page_ids = wp_list_pluck( $shb_get_pages, 'ID' );
	
	foreach($shb_get_page_ids as $val) {
		$shb_page_options[$val] = get_the_title($val);
	}
	
	$shb_general_fields = array(
		'fields' => array(
			array(
				'id' => 'email_address',
				'title' => __('Email Address','sohohotel_booking'),
				'type' => 'text',
				'required' => true,
			),
			array(
				'id' => 'pending_message_1',
				'title' => __('Pending message 1','sohohotel_booking'),
				'type' => 'textarea',
				'required' => true,
			),
			array(
				'id' => 'pending_message_2',
				'title' => __('Pending message 2','sohohotel_booking'),
				'type' => 'textarea',
				'required' => true,
			),
			array(
				'id' => 'confirmed_message_1',
				'title' => __('Confirmed message 1','sohohotel_booking'),
				'type' => 'textarea',
				'required' => true,
			),
			array(
				'id' => 'confirmed_message_2',
				'title' => __('Confirmed message 2','sohohotel_booking'),
				'type' => 'textarea',
				'required' => true,
			),
			array(
				'id' => 'cancelled_message_1',
				'title' => __('Cancelled message 1','sohohotel_booking'),
				'type' => 'textarea',
				'required' => true,
			),
			array(
				'id' => 'cancelled_message_2',
				'title' => __('Cancelled message 2','sohohotel_booking'),
				'type' => 'textarea',
				'required' => true,
			)
		)
	);
	
	$general_data = shb_update_settings($shb_general_fields);
	echo shb_cpt_fields($shb_general_fields,$general_data); ?>
	
	<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="<?php esc_html_e('Save Changes', 'sohohotel_booking'); ?>" /></p>
	
</form>