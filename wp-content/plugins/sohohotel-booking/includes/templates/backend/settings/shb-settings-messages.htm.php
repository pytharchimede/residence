<form action="<?php echo get_admin_url() . 'admin.php?page=shb-settings&tab=messages'; ?>" method="post" class="shb-admin-settings-form">
		
	<?php $shb_get_pages = get_pages();
	$shb_get_page_ids = wp_list_pluck( $shb_get_pages, 'ID' );
	
	foreach($shb_get_page_ids as $val) {
		$shb_page_options[$val] = get_the_title($val);
	}
	
	$shb_general_fields = array(
		'fields' => array(
			array(
				'id' => 'booking_success_message',
				'title' => __('Booking success','sohohotel_booking'),
				'type' => 'textarea',
				'required' => true,
			),
			array(
				'id' => 'booking_page_sidebar_title',
				'title' => __('Booking page sidebar title','sohohotel_booking'),
				'type' => 'textarea',
				'required' => true,
			),
			array(
				'id' => 'booking_page_sidebar_message',
				'title' => __('Booking page sidebar message','sohohotel_booking'),
				'type' => 'textarea',
				'required' => true,
			),
		)
	);
	
	$general_data = shb_update_settings($shb_general_fields);
	echo shb_cpt_fields($shb_general_fields,$general_data); ?>
	
	<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="<?php esc_html_e('Save Changes', 'sohohotel_booking'); ?>" /></p>
	
</form>