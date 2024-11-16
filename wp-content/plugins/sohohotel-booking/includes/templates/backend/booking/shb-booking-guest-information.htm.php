<?php

$shb_booking_fields = array(
	'fields' => array(
		array(
			'type' => 'custom',
			'custom' => shb_custom_form($booking_data)
		),
		array(
			'type' => 'custom',
			'custom' => '<input name="save" type="submit" class="button button-primary button-large" id="publish" value="' . __('Update','sohohotel_booking') . '" />'
		)
	)
);

echo shb_cpt_fields($shb_booking_fields,$booking_data);

?>