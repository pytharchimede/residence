<?php

$shb_tax_fields = array(
	'fields' => array(
		array(
			'id' => 'tax_rate',
			'title' => __('Tax Rate (%)','sohohotel_booking'),
			'type' => 'text',
			'required' => true,
			'class' => 'shb-validation-required shb-validation-number'
		),
	)
);

echo shb_cpt_fields($shb_tax_fields,$tax_data);

?>