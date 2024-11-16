<?php

add_action('admin_enqueue_scripts', 'sht_admin_js_css');
function sht_admin_js_css() {

	wp_enqueue_style('sh_css', SHT_PLUGIN_URL . 'assets/css/style.css');

}

add_action('wp_enqueue_scripts', 'sht_front_js_css');
function sht_front_js_css() {
	
	wp_register_script( 'sht_js', SHT_PLUGIN_URL . 'assets/js/scripts.js' );
	wp_enqueue_script( 'sht_js' );
	wp_add_inline_script( 'sht_js', "" );
	
}