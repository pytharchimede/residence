<form action="<?php echo get_admin_url() . 'admin.php?page=shb-settings&tab=payments'; ?>" method="post" class="shb-admin-settings-form">
		
	<?php $shb_get_pages = get_pages();
	$shb_get_page_ids = wp_list_pluck( $shb_get_pages, 'ID' );
	
	foreach($shb_get_page_ids as $val) {
		$shb_page_options[$val] = get_the_title($val);
	}
	
	$shb_general_fields = array(
		'fields' => array(
			array(
				'id' => 'deposit_title',
				'type' => 'custom',
				'custom' => '<h2 class="title">' . __('Deposit','sohohotel_booking') . '</h2>'
			),
			array(
				'id' => 'deposit_due',
				'title' => __('Amount to pay (%)','sohohotel_booking'),
				'hint' => __('Set how many nights in advance of the check in date the user needs to submit their booking','sohohotel_booking'),
				'required' => true,
				'type' => 'select',
				'options' => array(1,100),
				'options_title' => '',
				'options_title_singular' => ''
			),
			array(
				'id' => 'currency_title_1',
				'type' => 'custom',
				'custom' => '<h2 class="title">' . __('Base currency','sohohotel_booking') . '</h2>'
			),
			array(
				'id' => 'currency_code_1',
				'title' => __('Currency code','sohohotel_booking'),
				'hint' => __('E.g. USD','sohohotel_booking'),
				'type' => 'text',
				'required' => true,
			),
			array(
				'id' => 'currency_symbol_1',
				'title' => __('Currency symbol','sohohotel_booking'),
				'hint' => __('E.g. $','sohohotel_booking'),
				'type' => 'text',
				'required' => true,
			),
			array(
				'id' => 'currency_symbol_position_1',
				'title' => __('Currency symbol position','sohohotel_booking'),
				'type' => 'select',
				'required' => true,
				'options' => array(
					'before' => __('Before price','sohohotel_booking'),
					'after' => __('After price','sohohotel_booking')
				)
			),
			array(
				'id' => 'decimal_places_1',
				'title' => __('Decimal places','sohohotel_booking'),
				'type' => 'select',
				'required' => true,
				'options' => array(
					'zero' => '0',
					'one' => '1',
					'two' => '2',
					'three' => '3',
					'four' => '4'
				)
			),
			array(
				'id' => 'decimal_separator_1',
				'title' => __('Decimal separator','sohohotel_booking'),
				'type' => 'text',
				'required' => true,
			),
			array(
				'id' => 'thousand_separator_1',
				'title' => __('Thousand separator','sohohotel_booking'),
				'type' => 'text',
				'required' => true,
			),
			array(
				'id' => 'conversion_multiplier_1',
				'title' => __('Conversion multiplier','sohohotel_booking'),
				'hint' => __('E.g. if your base currency is USD, and converted currency is EUR, go to Google and search \'1 USD to EUR\', the result will be something like \'0.84\', add this in the field. Add \'1\' for the base currency since we\'re not converting it','sohohotel_booking'),
				'type' => 'text',
				'required' => true,
			),
			array(
				'id' => 'currency_title_2',
				'type' => 'custom',
				'custom' => '<h2 class="title">' . __('Converted currency 1','sohohotel_booking') . '</h2>'
			),
			array(
				'id' => 'currency_code_2',
				'title' => __('Currency code','sohohotel_booking'),
				'hint' => __('E.g. USD','sohohotel_booking'),
				'type' => 'text',
				'required' => true,
			),
			array(
				'id' => 'currency_symbol_2',
				'title' => __('Currency symbol','sohohotel_booking'),
				'hint' => __('E.g. $','sohohotel_booking'),
				'type' => 'text',
				'required' => true,
			),
			array(
				'id' => 'currency_symbol_position_2',
				'title' => __('Currency symbol position','sohohotel_booking'),
				'type' => 'select',
				'required' => true,
				'options' => array(
					'before' => __('Before price','sohohotel_booking'),
					'after' => __('After price','sohohotel_booking')
				)
			),
			array(
				'id' => 'decimal_places_2',
				'title' => __('Decimal places','sohohotel_booking'),
				'type' => 'select',
				'required' => true,
				'options' => array(
					'zero' => '0',
					'one' => '1',
					'two' => '2',
					'three' => '3',
					'four' => '4'
				)
			),
			array(
				'id' => 'decimal_separator_2',
				'title' => __('Decimal separator','sohohotel_booking'),
				'type' => 'text',
				'required' => true,
			),
			array(
				'id' => 'thousand_separator_2',
				'title' => __('Thousand separator','sohohotel_booking'),
				'type' => 'text',
				'required' => true,
			),
			
			array(
				'id' => 'conversion_multiplier_2',
				'title' => __('Conversion multiplier','sohohotel_booking'),
				'hint' => __('E.g. if your base currency is USD, and converted currency is EUR, go to Google and search \'1 USD to EUR\', the result will be something like \'0.84\', add this in the field. Add \'1\' for the base currency since we\'re not converting it','sohohotel_booking'),
				'type' => 'text',
				'required' => true,
			),
			array(
				'id' => 'converted_currency_title_3',
				'type' => 'custom',
				'custom' => '<h2 class="title">' . __('Converted currency 2','sohohotel_booking') . '</h2>'
			),
			array(
				'id' => 'currency_code_3',
				'title' => __('Currency code','sohohotel_booking'),
				'hint' => __('E.g. USD','sohohotel_booking'),
				'type' => 'text',
				'required' => true,
			),
			array(
				'id' => 'currency_symbol_3',
				'title' => __('Currency symbol','sohohotel_booking'),
				'hint' => __('E.g. $','sohohotel_booking'),
				'type' => 'text',
				'required' => true,
			),
			array(
				'id' => 'currency_symbol_position_3',
				'title' => __('Currency symbol position','sohohotel_booking'),
				'type' => 'select',
				'required' => true,
				'options' => array(
					'before' => __('Before price','sohohotel_booking'),
					'after' => __('After price','sohohotel_booking')
				)
			),
			array(
				'id' => 'decimal_places_3',
				'title' => __('Decimal places','sohohotel_booking'),
				'type' => 'select',
				'required' => true,
				'options' => array(
					'zero' => '0',
					'one' => '1',
					'two' => '2',
					'three' => '3',
					'four' => '4'
				)
			),
			array(
				'id' => 'decimal_separator_3',
				'title' => __('Decimal separator','sohohotel_booking'),
				'type' => 'text',
				'required' => true,
			),
			array(
				'id' => 'thousand_separator_3',
				'title' => __('Thousand separator','sohohotel_booking'),
				'type' => 'text',
				'required' => true,
			),
			
			array(
				'id' => 'conversion_multiplier_3',
				'title' => __('Conversion multiplier','sohohotel_booking'),
				'hint' => __('E.g. if your base currency is USD, and converted currency is EUR, go to Google and search \'1 USD to EUR\', the result will be something like \'0.84\', add this in the field. Add \'1\' for the base currency since we\'re not converting it','sohohotel_booking'),
				'type' => 'text',
				'required' => true,
			),
		)
	);
	
	$general_data = shb_update_settings($shb_general_fields);
	echo shb_cpt_fields($shb_general_fields,$general_data); ?>
	
	<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="<?php esc_html_e('Save Changes', 'sohohotel_booking'); ?>" /></p>
	
</form>