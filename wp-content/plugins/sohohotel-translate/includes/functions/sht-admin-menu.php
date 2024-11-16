<?php

add_action( 'admin_menu', 'shtranslate_menu' );
function shtranslate_menu() {

	$parent_slug = 'sht-settings';

	add_menu_page(
		esc_html__('Translation', 'sohohotel_translation'),
		esc_html__('Translation', 'sohohotel_translation'),
		'manage_options',
		$parent_slug,
		'shtranslate',
		'dashicons-admin-site-alt3',
		50
	);

}