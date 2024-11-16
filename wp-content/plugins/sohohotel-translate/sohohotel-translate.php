<?php

/*
  Plugin Name: Soho Hotel Translate
  Plugin URI: http://quitenicestuff.com
  Description: Translate Soho Hotel
  Version: 4.2.5
  Author: Quite Nice Stuff
  Author URI: http://quitenicestuff.com
*/



/* ----------------------------------------------------------------------------

   Register Session

---------------------------------------------------------------------------- */
function sht_register_session(){
	if( !session_id())
		session_start();
}

if(!is_admin()) {
	add_action('init','sht_register_session');
}



/* ----------------------------------------------------------------------------

   Load Files

---------------------------------------------------------------------------- */
if ( ! defined( 'SHT_PLUGIN_DIR' ) )
    define( 'SHT_PLUGIN_DIR', dirname( __FILE__ ) );

if ( ! defined( 'SHT_PLUGIN_URL' ) )
    define( 'SHT_PLUGIN_URL', plugin_dir_url( __FILE__ ) );



/* ----------------------------------------------------------------------------

   Load Language Files

---------------------------------------------------------------------------- */
function sht_init() {
	load_plugin_textdomain( 'sohohotel_translation', false, dirname(plugin_basename( __FILE__ ))  . '/languages/' ); 
}
add_action('init', 'sht_init');



/* ----------------------------------------------------------------------------

   Load Functions

---------------------------------------------------------------------------- */
include 'includes/functions/sht-admin-menu.php';
include 'includes/functions/sht-core-functions.php';
include 'includes/functions/sht-css-js.php';