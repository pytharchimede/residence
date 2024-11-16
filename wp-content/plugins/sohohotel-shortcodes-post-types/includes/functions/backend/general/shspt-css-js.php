<?php



/* ----------------------------------------------------------------------------

   Admin CSS & JS

---------------------------------------------------------------------------- */
add_action('admin_enqueue_scripts', 'shspt_admin_js_css');
function shspt_admin_js_css() {
	
	// Admin CSS
	wp_enqueue_style('shspt_css', SHSPT_PLUGIN_URL . 'assets/css/admin/style.css');
	
	// Admin JS
	wp_enqueue_script( 'jquery-ui-datepicker' );
	wp_enqueue_script( 'jquery-ui-accordion' );
	wp_enqueue_script( 'jquery-ui-tabs' );
	wp_register_script( 'shspt_js', SHSPT_PLUGIN_URL . 'assets/js/admin/scripts.js' );
	wp_enqueue_script( 'shspt_js' );

}



/* ----------------------------------------------------------------------------

   Load JS

---------------------------------------------------------------------------- */
add_action('wp_enqueue_scripts', 'shspt_shortcodes_scripts');
function shspt_shortcodes_scripts() {
	
	wp_enqueue_script('jquery');
	
	if ( !empty(get_theme_mod('sohohotel_google_api_key')) ) {
		wp_register_script('googlesearch', 'https://maps.googleapis.com/maps/api/js?key=' . get_theme_mod('sohohotel_google_api_key'));
		wp_enqueue_script('googlesearch');
	}
	
	wp_enqueue_script( array( 'jquery-ui-core', 'jquery-ui-tabs', 'jquery-effects-core' ) );

}