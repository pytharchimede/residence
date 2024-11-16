<?php
	
/* ----------------------------------------------------------------------------

   Load Template Chooser

---------------------------------------------------------------------------- */
add_filter( 'template_include', 'sohohotel_booking_template_chooser');
function sohohotel_booking_template_chooser( $template ) {

    $post_id = get_the_ID();
	
	if ( (get_post_type( $post_id ) == 'shb_accommodation') && (is_single()) ) {
		return sohohotel_booking_get_template_hierarchy( 'shb-accommodation-single' );
	} elseif ( (get_post_type( $post_id ) == 'shb_offer') && (is_single()) ) {
		return sohohotel_booking_get_template_hierarchy( 'shb-offer-single' );
	} else {
		return $template;
	}

}



/* ----------------------------------------------------------------------------

   Select Template

---------------------------------------------------------------------------- */
add_filter( 'template_include', 'sohohotel_booking_template_chooser' );
function sohohotel_booking_get_template_hierarchy( $template ) {
 
    $template_slug = rtrim( $template, '.htm.php' );
    $template = $template_slug . '.htm.php';
	
	if ($template == 'shb-offer-single.htm.php') {
		$file = SHB_PLUGIN_DIR . '/includes/templates/frontend/offer/' . $template;
	} elseif ($template == 'shb-ical.htm.php') {
		$file = SHB_PLUGIN_DIR . '/includes/templates/frontend/ical/' . $template;
	} elseif ($template == 'shb-accommodation-single.htm.php') {
		$file = SHB_PLUGIN_DIR . '/includes/templates/frontend/accommodation/' . $template;
	} else {
		$file = $theme_file;
	}
 
    return apply_filters( 'sohohotel_booking_template_' . $template, $file );
}



/* ----------------------------------------------------------------------------

   Select Taxonomy Template

---------------------------------------------------------------------------- */
add_filter('template_include', 'sohohotel_booking_taxonomy_template');
function sohohotel_booking_taxonomy_template( $template ){

	if( is_tax('accommodation-categories')){
  		$template = SHB_PLUGIN_DIR .'/includes/templates/frontend/accommodation/shb-accommodation-single.htm.php';
 	}  
  	
	return $template;

}
	
?>