<?php

/*
  Plugin Name: Soho Hotel Shortcodes & Post Types
  Plugin URI: http://quitenicestuff.com
  Description: Soho Hotel Shortcodes and Post Types
  Version: 4.2.5
  Author: Quite Nice Stuff
  Author URI: http://quitenicestuff.com
*/



/* ----------------------------------------------------------------------------

   Load Files

---------------------------------------------------------------------------- */
if ( ! defined( 'SHSPT_PLUGIN_DIR' ) )
    define( 'SHSPT_PLUGIN_DIR', dirname( __FILE__ ) );

if ( ! defined( 'SHSPT_PLUGIN_URL' ) )
    define( 'SHSPT_PLUGIN_URL', plugin_dir_url( __FILE__ ) );



/* ----------------------------------------------------------------------------

   Load Language Files

---------------------------------------------------------------------------- */
function shspt_init() {
	load_plugin_textdomain( 'sohohotel', false, dirname(plugin_basename( __FILE__ ))  . '/languages/' ); 
}
add_action('init', 'shspt_init');



/* ----------------------------------------------------------------------------

	Post Types

---------------------------------------------------------------------------- */
include 'includes/post-types/testimonial.php';
include 'includes/post-types/page.php';
include 'includes/post-types/post.php';



/* ----------------------------------------------------------------------------

	Widgets

---------------------------------------------------------------------------- */
include 'includes/widgets/widget-contact.php';
include 'includes/widgets/widget-recent-posts.php';
include 'includes/widgets/widget-social-about.php';



/* ----------------------------------------------------------------------------

   Shortcodes

---------------------------------------------------------------------------- */
include 'includes/shortcodes/shspt-blog-carousel.php';
include 'includes/shortcodes/shspt-blog-page.php';
include 'includes/shortcodes/shspt-gallery.php';
include 'includes/shortcodes/shspt-title.php';
include 'includes/shortcodes/shspt-video-thumbnail.php';
include 'includes/shortcodes/shspt-fixed-height-image.php';
include 'includes/shortcodes/shspt-icon-text.php';
include 'includes/shortcodes/shspt-contact-details.php';
include 'includes/shortcodes/shspt-google-map.php';
include 'includes/shortcodes/shspt-social-media.php';
include 'includes/shortcodes/shspt-testimonials-page.php';
include 'includes/shortcodes/shspt-testimonials-carousel.php';
include 'includes/shortcodes/shspt-hotel-listing.php';
include 'includes/shortcodes/shspt-button.php';
include 'includes/shortcodes/shspt-image-text.php';
include 'includes/shortcodes/shspt-video-text.php';
include 'includes/shortcodes/shspt-call-to-action-video.php';
include 'includes/shortcodes/shspt-single-testimonial.php';
include 'includes/shortcodes/shspt-call-to-action-small.php';
include 'includes/shortcodes/shspt-call-to-action-large.php';
include 'includes/shortcodes/shspt-slideshow.php';



/* ----------------------------------------------------------------------------

   Core functions

---------------------------------------------------------------------------- */
include 'includes/functions/backend/general/shspt-css-js.php';
include 'includes/functions/backend/general/shspt-templates.php';