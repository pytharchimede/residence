<?php

/*
  Plugin Name: Soho Hotel Booking
  Plugin URI: http://quitenicestuff.com
  Description: Accommodation Booking System
  Version: 4.2.5
  Author: Quite Nice Stuff
  Author URI: http://quitenicestuff.com
*/


/* ----------------------------------------------------------------------------

   Register Session

---------------------------------------------------------------------------- */
function shb_register_session(){
	if( !session_id())
		session_start();
}

if(!is_admin()) {
	add_action('init','shb_register_session');
}



/* ----------------------------------------------------------------------------

   Load Files

---------------------------------------------------------------------------- */
if ( ! defined( 'SHB_PLUGIN_DIR' ) )
    define( 'SHB_PLUGIN_DIR', dirname( __FILE__ ) );

if ( ! defined( 'SHB_PLUGIN_URL' ) )
    define( 'SHB_PLUGIN_URL', plugin_dir_url( __FILE__ ) );



/* ----------------------------------------------------------------------------

   Load Language Files

---------------------------------------------------------------------------- */
function shb_init() {
	load_plugin_textdomain( 'sohohotel_booking', false, dirname(plugin_basename( __FILE__ ))  . '/languages/' ); 
}
add_action('init', 'shb_init');



/* ----------------------------------------------------------------------------

   Post types

---------------------------------------------------------------------------- */
include 'includes/post-types/shb-accommodation.php';
include 'includes/post-types/shb-booking.php';
include 'includes/post-types/shb-additionalfee.php';
include 'includes/post-types/shb-condition.php';
include 'includes/post-types/shb-guestclass.php';
include 'includes/post-types/shb-rate.php';
include 'includes/post-types/shb-ratevariation.php';
include 'includes/post-types/shb-season.php';
include 'includes/post-types/shb-offer.php';



/* ----------------------------------------------------------------------------

   Shortcodes

---------------------------------------------------------------------------- */
include 'includes/shortcodes/shb-accommodation-listing-1.php';
include 'includes/shortcodes/shb-accommodation-listing-2.php';
include 'includes/shortcodes/shb-accommodation-listing-3.php';
include 'includes/shortcodes/shb-accommodation-carousel-1.php';
include 'includes/shortcodes/shb-accommodation-carousel-2.php';
include 'includes/shortcodes/shb-booking-form-1.php';
include 'includes/shortcodes/shb-booking-form-with-background-1.php';
include 'includes/shortcodes/shb-booking-form-with-background-2.php';
include 'includes/shortcodes/shb-booking-form-with-background-3.php';
include 'includes/shortcodes/shb-booking-form-single-horizontal.php';
include 'includes/shortcodes/shb-booking-form-single-vertical.php';
include 'includes/shortcodes/shb-title-with-icons.php';
include 'includes/shortcodes/shb-booking-contact.php';
include 'includes/shortcodes/shb-booking-page.php';
include 'includes/shortcodes/shb-offer-carousel.php';



/* ----------------------------------------------------------------------------

   Widgets

---------------------------------------------------------------------------- */
include 'includes/widgets/shb-widget-booking.php';



/* ----------------------------------------------------------------------------

   Core functions

---------------------------------------------------------------------------- */
include 'includes/functions/backend/general/shb-admin-menu.php';
include 'includes/functions/backend/general/shb-css-js.php';
include 'includes/functions/backend/general/shb-admin-fields.php';
include 'includes/functions/backend/general/shb-admin-update-settings.php';
include 'includes/functions/backend/general/shb-settings.php';
include 'includes/functions/backend/general/shb-core-functions.php';
include 'includes/functions/backend/general/shb-admin-booking-custom-form.php';
include 'includes/functions/backend/general/shb-ical.php';
include 'includes/functions/backend/general/shb-calendar.php';
include 'includes/functions/backend/general/shb-image-sizes.php';
include 'includes/functions/frontend/datepicker/shb-datepicker.php';
include 'includes/functions/backend/general/shb-templates.php';



/* ----------------------------------------------------------------------------

   Page builder

---------------------------------------------------------------------------- */
include 'includes/pagebuilder/shb-pagebuilder.php';



/* ----------------------------------------------------------------------------

   Save iCal files

---------------------------------------------------------------------------- */
register_activation_hook(__FILE__, 'shb_activation');
function shb_activation() {
    if (! wp_next_scheduled ( 'shb_ical_cron' )) {
	wp_schedule_event(time(), 'hourly', 'shb_ical_cron');
    }
}

add_action('shb_ical_cron', 'shb_ical_cron_function');
function shb_ical_cron_function() {
	
	$dirname = SHB_PLUGIN_DIR . "/shb_ical";
	if (!is_dir($dirname)) {
	    mkdir($dirname);
	}

	$accommodation_ids = shb_get_all_ids('shb_accommodation');	
	foreach($accommodation_ids as $key => $room_id) {
		shb_ical_export($room_id);
	}
	
}

register_deactivation_hook(__FILE__, 'shb_deactivation');
function shb_deactivation() {
	wp_clear_scheduled_hook('shb_ical_cron');
}