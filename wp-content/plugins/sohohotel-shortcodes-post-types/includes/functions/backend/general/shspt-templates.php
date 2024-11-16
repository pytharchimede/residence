<?php
	
	
	
/* ----------------------------------------------------------------------------

   Load Template Chooser

---------------------------------------------------------------------------- */
add_filter( 'template_include', 'sohohotel_spt_template_chooser');
function sohohotel_spt_template_chooser( $template ) {
 
    if ( is_search() ) {
		
		return $template;
		
	} else {
		
		$post_id = get_the_ID();

		if ( get_post_type( $post_id ) == 'testimonial' ) {
			return sohohotel_spt_get_template_hierarchy( 'shspt-testimonial-single' );
		} else {
			return $template;
		}
		
	}

}



/* ----------------------------------------------------------------------------

   Select Template

---------------------------------------------------------------------------- */
add_filter( 'template_include', 'sohohotel_spt_template_chooser' );
function sohohotel_spt_get_template_hierarchy( $template ) {
 
	if ( is_search() ) {
		
		$file = SHSPT_PLUGIN_DIR . '/includes/templates/frontend/testimonial/' . $template;
		return apply_filters( 'sohohotel_template_' . $template, $file );
	
	} else {

    	$template_slug = rtrim( $template, '.htm.php' );
	    $template = $template_slug . '.htm.php';

	    if ( $theme_file = locate_template( array( 'includes/templates/frontend/testimonial/' . $template ) ) ) {
	        $file = $theme_file;
	    }
	    else {
	        $file = SHSPT_PLUGIN_DIR . '/includes/templates/frontend/testimonial/' . $template;
	    }

	    return apply_filters( 'sohohotel_template_' . $template, $file );
	
	}

}


	
?>