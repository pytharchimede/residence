<form action="<?php echo get_admin_url() . 'admin.php?page=shb-settings&tab=forms'; ?>" method="post" class="shb-admin-settings-form">
		
	<?php 

	$shb_get_pages = get_pages();
	$shb_get_page_ids = wp_list_pluck( $shb_get_pages, 'ID' );
	
	foreach($shb_get_page_ids as $val) {
		$shb_page_options[$val] = get_the_title($val);
	}
	
	$guestclass_ids = shb_get_all_ids('shb_guestclass');
	$shb_general_fields_2 = array();
	$i = 0;

	$number_options = array();
	foreach (range(0, 500) as $r) {
		$number_options['key_' . $r] = $r;
	}
	
	foreach($guestclass_ids as $guestclass_id) {
	
		$i++;
	
		$shb_general_fields_2['fields'][$i]['id'] = $guestclass_id . '_preset';
		$shb_general_fields_2['fields'][$i]['title'] = get_the_title($guestclass_id) . ' ' . __('preset','sohohotel_booking');
		$shb_general_fields_2['fields'][$i]['type'] = 'select';
		$shb_general_fields_2['fields'][$i]['required'] = true;
		$shb_general_fields_2['fields'][$i]['options'] = $number_options;
	
	}
	
	$general_data_2 = shb_update_settings($shb_general_fields_2);
	echo shb_cpt_fields($shb_general_fields_2,$general_data_2); ?>
	
	<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="<?php esc_html_e('Save Changes', 'sohohotel_booking'); ?>" /></p>
	
</form>