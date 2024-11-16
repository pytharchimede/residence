<?php

$shb_testimonial_fields = array(
	'fields' => array(
		array(
			'id' => 'guest_name',
			'title' => __('Guest name','sohohotel_booking'),
			'type' => 'text',
			'required' => false,
			'class' => ''
		),
		array(
			'id' => 'additional_info',
			'title' => __('Additional info','sohohotel_booking'),
			'type' => 'text',
			'required' => false,
			'class' => ''
		),
	)
);

echo shb_cpt_fields($shb_testimonial_fields,$testimonial_data);

?>