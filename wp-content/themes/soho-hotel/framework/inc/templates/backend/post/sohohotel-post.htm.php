<?php 

$sohohotel_post_fields = array(
	array(
		'id' => 'sohohotel_post_excerpt',
		'title' => __('Enter a short summary of the post','soho-hotel'),
		'type' => 'textarea',
		'class' => ''
	)
);

echo sohohotel_post_type_fields($sohohotel_post_fields,$post_data); ?>