<?php

$sohohotel_page_fields = array(
	array(
		'id' => 'sohohotel_page_layout',
		'title' => __('Layout','soho-hotel'),
		'type' => 'select',
		'class' => '',
		'options' => array(
			'right-sidebar' => __('Right Sidebar','soho-hotel'),
			'left-sidebar' => __('Left Sidebar','soho-hotel'),
			'full-width' => __('Full Width','soho-hotel'),
			'full-width-unboxed' => __('Full Width Unboxed','soho-hotel')
		)
	),
	array(
		'id' => 'sohohotel_page_title',
		'title' => __('Title','soho-hotel'),
		'type' => 'select',
		'class' => '',
		'options' => array(
			'standard-title' => __('Standard Title','soho-hotel'),
			'no-title' => __('No Title','soho-hotel')
		)
	)
);

echo sohohotel_post_type_fields($sohohotel_page_fields,$post_data); ?>