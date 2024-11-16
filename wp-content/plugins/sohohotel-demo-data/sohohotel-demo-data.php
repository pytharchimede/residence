<?php

/*
  Plugin Name: Soho Hotel Demo Data
  Plugin URI: http://quitenicestuff.com
  Description: Import Soho Hotel Demo Data
  Version: 4.2.5
  Author: Quite Nice Stuff
  Author URI: http://quitenicestuff.com
*/



/* ----------------------------------------------------------------------------

   Load Files

---------------------------------------------------------------------------- */
if ( ! defined( 'SH_DEMO_DATA_PLUGIN_DIR' ) )
    define( 'SH_DEMO_DATA_PLUGIN_DIR', dirname( __FILE__ ) );

if ( ! defined( 'SH_DEMO_DATA_PLUGIN_URL' ) )
    define( 'SH_DEMO_DATA_PLUGIN_URL', plugin_dir_url( __FILE__ ) );



/* ----------------------------------------------------------------------------

   Set maximum execution time

---------------------------------------------------------------------------- */

function sh_maximum_execution_time_activation(){

	$text = "
	# Maximum execution time
	<IfModule mod_php5.c>
		php_value max_execution_time 3000
	</IfModule>";

	$htaccess = get_home_path().'.htaccess';
	$contents = @file_get_contents($htaccess);
	if(!strpos($htaccess,$text))
	file_put_contents($htaccess,$contents.$text);
}

function sh_maximum_execution_time_deactivation(){

	$text = "
	# Maximum execution time
	<IfModule mod_php5.c>
		php_value max_execution_time 3000
	</IfModule>";

	$htaccess = get_home_path().'.htaccess';
	$contents = @file_get_contents($htaccess);
	file_put_contents($htaccess,str_replace($text,'',$contents));
	
}

register_activation_hook( __FILE__, 'sh_maximum_execution_time_activation' );
register_deactivation_hook( __FILE__, 'sh_maximum_execution_time_deactivation' );



/* ----------------------------------------------------------------------------

   Import Content

---------------------------------------------------------------------------- */
	
add_action( 'admin_menu', 'sh_demo_data_menu' );

function sh_demo_data_menu() {
	
	$parent_slug = 'sh_demo_import';
	
	add_menu_page(
		esc_html__('Demo Import', 'sohohotel_booking'),
		esc_html__('Demo Import', 'sohohotel_booking'),
		'manage_options',
		$parent_slug,
		'sh_demo_data',
		'dashicons-media-default',
		50
	);
	
}

function sh_demo_data() {
	
	$url = get_admin_url() . 'admin.php?page=sh_demo_import&sh_action=';
	
	if(!empty($_GET['sh_action'])) {
		
		if($_GET['sh_action'] == 'delete_all') {
			sh_delete_all();
			update_option( 'sh_delete_all', '1' );
			update_option( 'sh_import_images_1', '' );
			update_option( 'sh_import_images_2', '' );
			update_option( 'sh_import_images_3', '' );
			update_option( 'sh_import_images_4', '' );
			update_option( 'sh_import_images_5', '' );
			update_option( 'sh_import_images_6', '' );
			update_option( 'sh_import_images_7', '' );
			update_option( 'sh_import_images_8', '' );
			update_option( 'sh_import_images_9', '' );
			update_option( 'sh_import_images_10', '' );
			update_option( 'sh_import_images_11', '' );
			update_option( 'sh_import_images_12', '' );
			update_option( 'sh_import_images_13', '' );
			update_option( 'sh_import_images_14', '' );
			update_option( 'sh_import_images_15', '' );
			update_option( 'sh_import_images_16', '' );
			update_option( 'sh_import_images_17', '' );
			update_option( 'sh_import_images_18', '' );
			update_option( 'sh_import_contactform7', '' );
			update_option( 'sh_import_pages', '' );
			update_option( 'sh_import_posts', '' );
			update_option( 'sh_import_testimonials', '' );
			update_option( 'sh_import_guestclass', '' );
			update_option( 'sh_import_accommodation', '' );
			update_option( 'sh_import_rate', '' );
			update_option( 'sh_import_accommodation_price', '' );
			update_option( 'sh_import_additionalfee', '' );
			update_option( 'sh_import_offer', '' );
			update_option( 'sh_import_menu', '' );
			update_option( 'sh_import_menu_mobile', '' );
			update_option( 'sh_import_menu_left', '' );
			update_option( 'sh_import_menu_right', '' );
			update_option( 'sh_import_homepage', '' );
			update_option( 'sh_import_widgets', '' );
			update_option( 'sh_import_theme_options', '' );
			update_option( 'sh_import_settings', '' );
		}
	
		if($_GET['sh_action'] == 'import_images_1') {
			sh_import_images(1);
			update_option( 'sh_import_images_1', '1' );
		}
		
		if($_GET['sh_action'] == 'import_images_2') {
			sh_import_images(2);
			update_option( 'sh_import_images_2', '1' );
		}
		
		if($_GET['sh_action'] == 'import_images_3') {
			sh_import_images(3);
			update_option( 'sh_import_images_3', '1' );
		}
		
		if($_GET['sh_action'] == 'import_images_4') {
			sh_import_images(4);
			update_option( 'sh_import_images_4', '1' );
		}
		
		if($_GET['sh_action'] == 'import_images_5') {
			sh_import_images(5);
			update_option( 'sh_import_images_5', '1' );
		}
		
		if($_GET['sh_action'] == 'import_images_6') {
			sh_import_images(6);
			update_option( 'sh_import_images_6', '1' );
		}
		
		if($_GET['sh_action'] == 'import_images_7') {
			sh_import_images(7);
			update_option( 'sh_import_images_7', '1' );
		}
		
		if($_GET['sh_action'] == 'import_images_8') {
			sh_import_images(8);
			update_option( 'sh_import_images_8', '1' );
		}
		
		if($_GET['sh_action'] == 'import_images_9') {
			sh_import_images(9);
			update_option( 'sh_import_images_9', '1' );
		}
		
		if($_GET['sh_action'] == 'import_images_10') {
			sh_import_images(10);
			update_option( 'sh_import_images_10', '1' );
		}
		
		if($_GET['sh_action'] == 'import_images_11') {
			sh_import_images(11);
			update_option( 'sh_import_images_11', '1' );
		}
		
		if($_GET['sh_action'] == 'import_images_12') {
			sh_import_images(12);
			update_option( 'sh_import_images_12', '1' );
		}
		
		if($_GET['sh_action'] == 'import_images_13') {
			sh_import_images(13);
			update_option( 'sh_import_images_13', '1' );
		}
		
		if($_GET['sh_action'] == 'import_images_14') {
			sh_import_images(14);
			update_option( 'sh_import_images_14', '1' );
		}
		
		if($_GET['sh_action'] == 'import_images_15') {
			sh_import_images(15);
			update_option( 'sh_import_images_15', '1' );
		}
		
		if($_GET['sh_action'] == 'import_images_16') {
			sh_import_images(16);
			update_option( 'sh_import_images_16', '1' );
		}
		
		if($_GET['sh_action'] == 'import_images_17') {
			sh_import_images(17);
			update_option( 'sh_import_images_17', '1' );
		}
		
		if($_GET['sh_action'] == 'import_images_18') {
			sh_import_images(18);
			update_option( 'sh_import_images_18', '1' );
		}
		
		if($_GET['sh_action'] == 'import_contactform7') {
			sh_import_contactform7();
			update_option( 'sh_import_contactform7', '1' );
		}
		
		if($_GET['sh_action'] == 'import_pages') {
			sh_import_pages();
			update_option( 'sh_import_pages', '1' );
		}
		
		if($_GET['sh_action'] == 'import_posts') {
			sh_import_posts();
			update_option( 'sh_import_posts', '1' );
		}
		
		if($_GET['sh_action'] == 'import_testimonials') {
			sh_import_testimonials();
			update_option( 'sh_import_testimonials', '1' );
		}
		
		if($_GET['sh_action'] == 'import_guestclass') {
			sh_insert_guestclass();
			update_option( 'sh_import_guestclass', '1' );
		}
		
		if($_GET['sh_action'] == 'import_accommodation') {
			sh_import_accommodation();
			update_option( 'sh_import_accommodation', '1' );
		}
		
		if($_GET['sh_action'] == 'import_rate') {
			sh_insert_rate();
			update_option( 'sh_import_rate', '1' );
		}
		
		if($_GET['sh_action'] == 'import_accommodation_price') {
			sh_insert_accommodation_price();
			update_option( 'sh_import_accommodation_price', '1' );
		}
		
		if($_GET['sh_action'] == 'import_additionalfee') {
			sh_insert_additionalfee();
			update_option( 'sh_import_additionalfee', '1' );
		}
		
		if($_GET['sh_action'] == 'import_offer') {
			sh_insert_offer();
			update_option( 'sh_import_offer', '1' );
		}
		
		if($_GET['sh_action'] == 'import_menu') {
			sh_import_menu();
			update_option( 'sh_import_menu', '1' );
		}
		
		if($_GET['sh_action'] == 'import_menu_mobile') {
			sh_import_menu_mobile();
			update_option( 'sh_import_menu_mobile', '1' );
		}
		
		if($_GET['sh_action'] == 'import_menu_left') {
			sh_import_menu_left();
			update_option( 'sh_import_menu_left', '1' );
		}
		
		if($_GET['sh_action'] == 'import_menu_right') {
			sh_import_menu_right();
			update_option( 'sh_import_menu_right', '1' );
		}
		
		if($_GET['sh_action'] == 'import_homepage') {
			sh_set_homepage();
			update_option( 'sh_import_homepage', '1' );
		}
		
		if($_GET['sh_action'] == 'import_widgets') {
			sh_import_widgets();
			update_option( 'sh_import_widgets', '1' );
		}
		
		if($_GET['sh_action'] == 'import_theme_options') {
			sh_import_theme_options();
			update_option( 'sh_import_theme_options', '1' );
		}
		
		if($_GET['sh_action'] == 'import_settings') {
			sh_import_settings();
			update_option( 'sh_import_settings', '1' );
		}
	
	}
	
	if(!empty(get_option('sh_delete_all'))) {
		$sh_delete_all = '(Done)';
	} else {
		$sh_delete_all = '';
	}
	
	if(!empty(get_option('sh_import_images_1'))) {
		$sh_import_images_1 = '(Done)';
	} else {
		$sh_import_images_1 = '';
	}
	
	if(!empty(get_option('sh_import_images_2'))) {
		$sh_import_images_2 = '(Done)';
	} else {
		$sh_import_images_2 = '';
	}
	
	if(!empty(get_option('sh_import_images_3'))) {
		$sh_import_images_3 = '(Done)';
	} else {
		$sh_import_images_3 = '';
	}
	
	if(!empty(get_option('sh_import_images_4'))) {
		$sh_import_images_4 = '(Done)';
	} else {
		$sh_import_images_4 = '';
	}
	
	if(!empty(get_option('sh_import_images_5'))) {
		$sh_import_images_5 = '(Done)';
	} else {
		$sh_import_images_5 = '';
	}
	
	if(!empty(get_option('sh_import_images_6'))) {
		$sh_import_images_6 = '(Done)';
	} else {
		$sh_import_images_6 = '';
	}
	
	if(!empty(get_option('sh_import_images_7'))) {
		$sh_import_images_7 = '(Done)';
	} else {
		$sh_import_images_7 = '';
	}
	
	if(!empty(get_option('sh_import_images_8'))) {
		$sh_import_images_8 = '(Done)';
	} else {
		$sh_import_images_8 = '';
	}
	
	if(!empty(get_option('sh_import_images_9'))) {
		$sh_import_images_9 = '(Done)';
	} else {
		$sh_import_images_9 = '';
	}
	
	if(!empty(get_option('sh_import_images_10'))) {
		$sh_import_images_10 = '(Done)';
	} else {
		$sh_import_images_10 = '';
	}
	
	if(!empty(get_option('sh_import_images_11'))) {
		$sh_import_images_11 = '(Done)';
	} else {
		$sh_import_images_11 = '';
	}
	
	if(!empty(get_option('sh_import_images_12'))) {
		$sh_import_images_12 = '(Done)';
	} else {
		$sh_import_images_12 = '';
	}
	
	if(!empty(get_option('sh_import_images_13'))) {
		$sh_import_images_13 = '(Done)';
	} else {
		$sh_import_images_13 = '';
	}
	
	if(!empty(get_option('sh_import_images_14'))) {
		$sh_import_images_14 = '(Done)';
	} else {
		$sh_import_images_14 = '';
	}
	
	if(!empty(get_option('sh_import_images_15'))) {
		$sh_import_images_15 = '(Done)';
	} else {
		$sh_import_images_15 = '';
	}
	
	if(!empty(get_option('sh_import_images_16'))) {
		$sh_import_images_16 = '(Done)';
	} else {
		$sh_import_images_16 = '';
	}
	
	if(!empty(get_option('sh_import_images_17'))) {
		$sh_import_images_17 = '(Done)';
	} else {
		$sh_import_images_17 = '';
	}
	
	if(!empty(get_option('sh_import_images_18'))) {
		$sh_import_images_18 = '(Done)';
	} else {
		$sh_import_images_18 = '';
	}
	
	if(!empty(get_option('sh_import_contactform7'))) {
		$sh_import_contactform7 = '(Done)';
	} else {
		$sh_import_contactform7 = '';
	}
	
	if(!empty(get_option('sh_import_pages'))) {
		$sh_import_pages = '(Done)';
	} else {
		$sh_import_pages = '';
	}
	
	if(!empty(get_option('sh_import_posts'))) {
		$sh_import_posts = '(Done)';
	} else {
		$sh_import_posts = '';
	}
	
	if(!empty(get_option('sh_import_testimonials'))) {
		$sh_import_testimonials = '(Done)';
	} else {
		$sh_import_testimonials = '';
	}
	
	if(!empty(get_option('sh_import_guestclass'))) {
		$sh_import_guestclass = '(Done)';
	} else {
		$sh_import_guestclass = '';
	}
	
	if(!empty(get_option('sh_import_accommodation'))) {
		$sh_import_accommodation = '(Done)';
	} else {
		$sh_import_accommodation = '';
	}
	
	if(!empty(get_option('sh_import_rate'))) {
		$sh_import_rate = '(Done)';
	} else {
		$sh_import_rate = '';
	}
	
	if(!empty(get_option('sh_import_accommodation_price'))) {
		$sh_import_accommodation_price = '(Done)';
	} else {
		$sh_import_accommodation_price = '';
	}
	
	if(!empty(get_option('sh_import_additionalfee'))) {
		$sh_import_additionalfee = '(Done)';
	} else {
		$sh_import_additionalfee = '';
	}
	
	if(!empty(get_option('sh_import_offer'))) {
		$sh_import_offer = '(Done)';
	} else {
		$sh_import_offer = '';
	}
	
	if(!empty(get_option('sh_import_menu'))) {
		$sh_import_menu = '(Done)';
	} else {
		$sh_import_menu = '';
	}
	
	if(!empty(get_option('sh_import_menu_mobile'))) {
		$sh_import_menu_mobile = '(Done)';
	} else {
		$sh_import_menu_mobile = '';
	}
	
	if(!empty(get_option('sh_import_menu_left'))) {
		$sh_import_menu_left = '(Done)';
	} else {
		$sh_import_menu_left = '';
	}
	
	if(!empty(get_option('sh_import_menu_right'))) {
		$sh_import_menu_right = '(Done)';
	} else {
		$sh_import_menu_right = '';
	}
	
	if(!empty(get_option('sh_import_homepage'))) {
		$sh_import_homepage = '(Done)';
	} else {
		$sh_import_homepage = '';
	}
	
	if(!empty(get_option('sh_import_widgets'))) {
		$sh_import_widgets = '(Done)';
	} else {
		$sh_import_widgets = '';
	}
	
	if(!empty(get_option('sh_import_theme_options'))) {
		$sh_import_theme_options = '(Done)';
	} else {
		$sh_import_theme_options = '';
	}
	
	if(!empty(get_option('sh_import_settings'))) {
		$sh_import_settings = '(Done)';
	} else {
		$sh_import_settings = '';
	} ?>
	
	<!-- BEGIN .wrap -->
	<div class="wrap">

		<h1><?php _e('Demo Import','sohohotel_booking'); ?></h1>
		
		<p><?php _e('To import the demo website, first click on "Delete all existing data", then click on "Import Images 1", then click on "Import Images 2", and so on until you have clicked through all the links.','sohohotel_booking'); ?></p>
		
		<?php if( function_exists('shb_get_all_ids') && class_exists('Vc_Manager') ){ ?>
			
			<ul>
			
				<li><a href="<?php echo $url . 'delete_all'; ?>" onclick="return confirm('Are you sure? This will DELETE all of your existing pages, posts, widgets, settings, e.g. EVERYTHING')"><?php _e('Delete all existing data','sohohotel_booking'); ?></a> <?php echo $sh_delete_all; ?></li>
				
				<?php if(
					(!empty(get_option('sh_delete_all'))) && 
					(empty(get_option('sh_import_images_1'))) 
				) { ?>
					<li><a href="<?php echo $url . 'import_images_1'; ?>"><?php _e('Import Images 1','sohohotel_booking'); ?></a> <?php echo $sh_import_images_1; ?></li>
				<?php } else { ?>
					<li><?php _e('Import Images 1','sohohotel_booking'); ?> <?php echo $sh_import_images_1; ?></li>
				<?php } ?>
				
				<?php if( 
					(!empty(get_option('sh_delete_all'))) &&
					(!empty(get_option('sh_import_images_1'))) && 
					(empty(get_option('sh_import_images_2')))
				) { ?>
					<li><a href="<?php echo $url . 'import_images_2'; ?>"><?php _e('Import Images 2','sohohotel_booking'); ?></a> <?php echo $sh_import_images_2; ?></li>
				<?php } else { ?>
					<li><?php _e('Import Images 2','sohohotel_booking'); ?> <?php echo $sh_import_images_2; ?></li>
				<?php } ?>
				
				<?php if( 
					(!empty(get_option('sh_delete_all'))) &&
					(!empty(get_option('sh_import_images_1'))) &&
					(!empty(get_option('sh_import_images_2'))) && 
					(empty(get_option('sh_import_images_3')))
				) { ?>
					<li><a href="<?php echo $url . 'import_images_3'; ?>"><?php _e('Import Images 3','sohohotel_booking'); ?></a> <?php echo $sh_import_images_3; ?></li>
				<?php } else { ?>
					<li><?php _e('Import Images 3','sohohotel_booking'); ?> <?php echo $sh_import_images_3; ?></li>
				<?php } ?>
				
				<?php if( 
					(!empty(get_option('sh_delete_all'))) &&
					(!empty(get_option('sh_import_images_1'))) &&
					(!empty(get_option('sh_import_images_2'))) && 
					(!empty(get_option('sh_import_images_3'))) &&
					(empty(get_option('sh_import_images_4')))
				) { ?>
					<li><a href="<?php echo $url . 'import_images_4'; ?>"><?php _e('Import Images 4','sohohotel_booking'); ?></a> <?php echo $sh_import_images_4; ?></li>
				<?php } else { ?>
					<li><?php _e('Import Images 4','sohohotel_booking'); ?> <?php echo $sh_import_images_4; ?></li>
				<?php } ?>
				
				<?php if( 
					(!empty(get_option('sh_delete_all'))) &&
					(!empty(get_option('sh_import_images_1'))) &&
					(!empty(get_option('sh_import_images_2'))) && 
					(!empty(get_option('sh_import_images_3'))) &&
					(!empty(get_option('sh_import_images_4'))) &&
					(empty(get_option('sh_import_images_5')))
				) { ?>
					<li><a href="<?php echo $url . 'import_images_5'; ?>"><?php _e('Import Images 5','sohohotel_booking'); ?></a> <?php echo $sh_import_images_5; ?></li>
				<?php } else { ?>
					<li><?php _e('Import Images 5','sohohotel_booking'); ?> <?php echo $sh_import_images_5; ?></li>
				<?php } ?>
				
				<?php if( 
					(!empty(get_option('sh_delete_all'))) &&
					(!empty(get_option('sh_import_images_1'))) &&
					(!empty(get_option('sh_import_images_2'))) && 
					(!empty(get_option('sh_import_images_3'))) &&
					(!empty(get_option('sh_import_images_4'))) &&
					(!empty(get_option('sh_import_images_5'))) &&
					(empty(get_option('sh_import_images_6')))
				) { ?>
					<li><a href="<?php echo $url . 'import_images_6'; ?>"><?php _e('Import Images 6','sohohotel_booking'); ?></a> <?php echo $sh_import_images_6; ?></li>
				<?php } else { ?>
					<li><?php _e('Import Images 6','sohohotel_booking'); ?> <?php echo $sh_import_images_6; ?></li>
				<?php } ?>
				
				<?php if( 
					(!empty(get_option('sh_delete_all'))) &&
					(!empty(get_option('sh_import_images_1'))) &&
					(!empty(get_option('sh_import_images_2'))) && 
					(!empty(get_option('sh_import_images_3'))) &&
					(!empty(get_option('sh_import_images_4'))) &&
					(!empty(get_option('sh_import_images_5'))) &&
					(!empty(get_option('sh_import_images_6'))) &&
					(empty(get_option('sh_import_images_7')))
				) { ?>
					<li><a href="<?php echo $url . 'import_images_7'; ?>"><?php _e('Import Images 7','sohohotel_booking'); ?></a> <?php echo $sh_import_images_7; ?></li>
				<?php } else { ?>
					<li><?php _e('Import Images 7','sohohotel_booking'); ?> <?php echo $sh_import_images_7; ?></li>
				<?php } ?>
				
				<?php if( 
					(!empty(get_option('sh_delete_all'))) &&
					(!empty(get_option('sh_import_images_1'))) &&
					(!empty(get_option('sh_import_images_2'))) && 
					(!empty(get_option('sh_import_images_3'))) &&
					(!empty(get_option('sh_import_images_4'))) &&
					(!empty(get_option('sh_import_images_5'))) &&
					(!empty(get_option('sh_import_images_6'))) &&
					(!empty(get_option('sh_import_images_7'))) &&
					(empty(get_option('sh_import_images_8')))
				) { ?>
					<li><a href="<?php echo $url . 'import_images_8'; ?>"><?php _e('Import Images 8','sohohotel_booking'); ?></a> <?php echo $sh_import_images_8; ?></li>
				<?php } else { ?>
					<li><?php _e('Import Images 8','sohohotel_booking'); ?> <?php echo $sh_import_images_8; ?></li>
				<?php } ?>
				
				<?php if( 
					(!empty(get_option('sh_delete_all'))) &&
					(!empty(get_option('sh_import_images_1'))) &&
					(!empty(get_option('sh_import_images_2'))) && 
					(!empty(get_option('sh_import_images_3'))) &&
					(!empty(get_option('sh_import_images_4'))) &&
					(!empty(get_option('sh_import_images_5'))) &&
					(!empty(get_option('sh_import_images_6'))) &&
					(!empty(get_option('sh_import_images_7'))) &&
					(!empty(get_option('sh_import_images_8'))) &&
					(empty(get_option('sh_import_images_9')))
				) { ?>
					<li><a href="<?php echo $url . 'import_images_9'; ?>"><?php _e('Import Images 9','sohohotel_booking'); ?></a> <?php echo $sh_import_images_9; ?></li>
				<?php } else { ?>
					<li><?php _e('Import Images 9','sohohotel_booking'); ?> <?php echo $sh_import_images_9; ?></li>
				<?php } ?>
			
				<?php if( 
					(!empty(get_option('sh_delete_all'))) &&
					(!empty(get_option('sh_import_images_1'))) &&
					(!empty(get_option('sh_import_images_2'))) && 
					(!empty(get_option('sh_import_images_3'))) &&
					(!empty(get_option('sh_import_images_4'))) &&
					(!empty(get_option('sh_import_images_5'))) &&
					(!empty(get_option('sh_import_images_6'))) &&
					(!empty(get_option('sh_import_images_7'))) &&
					(!empty(get_option('sh_import_images_8'))) &&
					(!empty(get_option('sh_import_images_9'))) &&
					(empty(get_option('sh_import_images_10')))
				) { ?>
					<li><a href="<?php echo $url . 'import_images_10'; ?>"><?php _e('Import Images 10','sohohotel_booking'); ?></a> <?php echo $sh_import_images_10; ?></li>
				<?php } else { ?>
					<li><?php _e('Import Images 10','sohohotel_booking'); ?> <?php echo $sh_import_images_10; ?></li>
				<?php } ?>
				
				<?php if( 
					(!empty(get_option('sh_delete_all'))) &&
					(!empty(get_option('sh_import_images_1'))) &&
					(!empty(get_option('sh_import_images_2'))) && 
					(!empty(get_option('sh_import_images_3'))) &&
					(!empty(get_option('sh_import_images_4'))) &&
					(!empty(get_option('sh_import_images_5'))) &&
					(!empty(get_option('sh_import_images_6'))) &&
					(!empty(get_option('sh_import_images_7'))) &&
					(!empty(get_option('sh_import_images_8'))) &&
					(!empty(get_option('sh_import_images_9'))) &&
					(!empty(get_option('sh_import_images_10'))) &&
					(empty(get_option('sh_import_images_11')))
				) { ?>
					<li><a href="<?php echo $url . 'import_images_11'; ?>"><?php _e('Import Images 11','sohohotel_booking'); ?></a> <?php echo $sh_import_images_11; ?></li>
				<?php } else { ?>
					<li><?php _e('Import Images 11','sohohotel_booking'); ?> <?php echo $sh_import_images_11; ?></li>
				<?php } ?>
				
				<?php if( 
					(!empty(get_option('sh_delete_all'))) &&
					(!empty(get_option('sh_import_images_1'))) &&
					(!empty(get_option('sh_import_images_2'))) && 
					(!empty(get_option('sh_import_images_3'))) &&
					(!empty(get_option('sh_import_images_4'))) &&
					(!empty(get_option('sh_import_images_5'))) &&
					(!empty(get_option('sh_import_images_6'))) &&
					(!empty(get_option('sh_import_images_7'))) &&
					(!empty(get_option('sh_import_images_8'))) &&
					(!empty(get_option('sh_import_images_9'))) &&
					(!empty(get_option('sh_import_images_10'))) &&
					(!empty(get_option('sh_import_images_11'))) &&
					(empty(get_option('sh_import_images_12')))
				) { ?>
					<li><a href="<?php echo $url . 'import_images_12'; ?>"><?php _e('Import Images 12','sohohotel_booking'); ?></a> <?php echo $sh_import_images_12; ?></li>
				<?php } else { ?>
					<li><?php _e('Import Images 12','sohohotel_booking'); ?> <?php echo $sh_import_images_12; ?></li>
				<?php } ?>
				
				<?php if( 
					(!empty(get_option('sh_delete_all'))) &&
					(!empty(get_option('sh_import_images_1'))) &&
					(!empty(get_option('sh_import_images_2'))) && 
					(!empty(get_option('sh_import_images_3'))) &&
					(!empty(get_option('sh_import_images_4'))) &&
					(!empty(get_option('sh_import_images_5'))) &&
					(!empty(get_option('sh_import_images_6'))) &&
					(!empty(get_option('sh_import_images_7'))) &&
					(!empty(get_option('sh_import_images_8'))) &&
					(!empty(get_option('sh_import_images_9'))) &&
					(!empty(get_option('sh_import_images_10'))) &&
					(!empty(get_option('sh_import_images_11'))) &&
					(!empty(get_option('sh_import_images_12'))) &&
					(empty(get_option('sh_import_images_13')))
				) { ?>
					<li><a href="<?php echo $url . 'import_images_13'; ?>"><?php _e('Import Images 13','sohohotel_booking'); ?></a> <?php echo $sh_import_images_13; ?></li>
				<?php } else { ?>
					<li><?php _e('Import Images 13','sohohotel_booking'); ?> <?php echo $sh_import_images_13; ?></li>
				<?php } ?>
				
				<?php if( 
					(!empty(get_option('sh_delete_all'))) &&
					(!empty(get_option('sh_import_images_1'))) &&
					(!empty(get_option('sh_import_images_2'))) && 
					(!empty(get_option('sh_import_images_3'))) &&
					(!empty(get_option('sh_import_images_4'))) &&
					(!empty(get_option('sh_import_images_5'))) &&
					(!empty(get_option('sh_import_images_6'))) &&
					(!empty(get_option('sh_import_images_7'))) &&
					(!empty(get_option('sh_import_images_8'))) &&
					(!empty(get_option('sh_import_images_9'))) &&
					(!empty(get_option('sh_import_images_10'))) &&
					(!empty(get_option('sh_import_images_11'))) &&
					(!empty(get_option('sh_import_images_12'))) &&
					(!empty(get_option('sh_import_images_13'))) &&
					(empty(get_option('sh_import_images_14')))
				) { ?>
					<li><a href="<?php echo $url . 'import_images_14'; ?>"><?php _e('Import Images 14','sohohotel_booking'); ?></a> <?php echo $sh_import_images_14; ?></li>
				<?php } else { ?>
					<li><?php _e('Import Images 14','sohohotel_booking'); ?> <?php echo $sh_import_images_14; ?></li>
				<?php } ?>
				
				<?php if( 
					(!empty(get_option('sh_delete_all'))) &&
					(!empty(get_option('sh_import_images_1'))) &&
					(!empty(get_option('sh_import_images_2'))) && 
					(!empty(get_option('sh_import_images_3'))) &&
					(!empty(get_option('sh_import_images_4'))) &&
					(!empty(get_option('sh_import_images_5'))) &&
					(!empty(get_option('sh_import_images_6'))) &&
					(!empty(get_option('sh_import_images_7'))) &&
					(!empty(get_option('sh_import_images_8'))) &&
					(!empty(get_option('sh_import_images_9'))) &&
					(!empty(get_option('sh_import_images_10'))) &&
					(!empty(get_option('sh_import_images_11'))) &&
					(!empty(get_option('sh_import_images_12'))) &&
					(!empty(get_option('sh_import_images_13'))) &&
					(!empty(get_option('sh_import_images_14'))) &&
					(empty(get_option('sh_import_images_15')))
				) { ?>
					<li><a href="<?php echo $url . 'import_images_15'; ?>"><?php _e('Import Images 15','sohohotel_booking'); ?></a> <?php echo $sh_import_images_15; ?></li>
				<?php } else { ?>
					<li><?php _e('Import Images 15','sohohotel_booking'); ?> <?php echo $sh_import_images_15; ?></li>
				<?php } ?>
				
				<?php if( 
					(!empty(get_option('sh_delete_all'))) &&
					(!empty(get_option('sh_import_images_1'))) &&
					(!empty(get_option('sh_import_images_2'))) && 
					(!empty(get_option('sh_import_images_3'))) &&
					(!empty(get_option('sh_import_images_4'))) &&
					(!empty(get_option('sh_import_images_5'))) &&
					(!empty(get_option('sh_import_images_6'))) &&
					(!empty(get_option('sh_import_images_7'))) &&
					(!empty(get_option('sh_import_images_8'))) &&
					(!empty(get_option('sh_import_images_9'))) &&
					(!empty(get_option('sh_import_images_10'))) &&
					(!empty(get_option('sh_import_images_11'))) &&
					(!empty(get_option('sh_import_images_12'))) &&
					(!empty(get_option('sh_import_images_13'))) &&
					(!empty(get_option('sh_import_images_14'))) &&
					(!empty(get_option('sh_import_images_15'))) &&
					(empty(get_option('sh_import_images_16')))
				) { ?>
					<li><a href="<?php echo $url . 'import_images_16'; ?>"><?php _e('Import Images 16','sohohotel_booking'); ?></a> <?php echo $sh_import_images_16; ?></li>
				<?php } else { ?>
					<li><?php _e('Import Images 16','sohohotel_booking'); ?> <?php echo $sh_import_images_16; ?></li>
				<?php } ?>
				
				<?php if( 
					(!empty(get_option('sh_delete_all'))) &&
					(!empty(get_option('sh_import_images_1'))) &&
					(!empty(get_option('sh_import_images_2'))) && 
					(!empty(get_option('sh_import_images_3'))) &&
					(!empty(get_option('sh_import_images_4'))) &&
					(!empty(get_option('sh_import_images_5'))) &&
					(!empty(get_option('sh_import_images_6'))) &&
					(!empty(get_option('sh_import_images_7'))) &&
					(!empty(get_option('sh_import_images_8'))) &&
					(!empty(get_option('sh_import_images_9'))) &&
					(!empty(get_option('sh_import_images_10'))) &&
					(!empty(get_option('sh_import_images_11'))) &&
					(!empty(get_option('sh_import_images_12'))) &&
					(!empty(get_option('sh_import_images_13'))) &&
					(!empty(get_option('sh_import_images_14'))) &&
					(!empty(get_option('sh_import_images_15'))) &&
					(!empty(get_option('sh_import_images_16'))) &&
					(empty(get_option('sh_import_images_17')))
				) { ?>
					<li><a href="<?php echo $url . 'import_images_17'; ?>"><?php _e('Import Images 17','sohohotel_booking'); ?></a> <?php echo $sh_import_images_17; ?></li>
				<?php } else { ?>
					<li><?php _e('Import Images 17','sohohotel_booking'); ?> <?php echo $sh_import_images_17; ?></li>
				<?php } ?>
				
				<?php if( 
					(!empty(get_option('sh_delete_all'))) &&
					(!empty(get_option('sh_import_images_1'))) &&
					(!empty(get_option('sh_import_images_2'))) && 
					(!empty(get_option('sh_import_images_3'))) &&
					(!empty(get_option('sh_import_images_4'))) &&
					(!empty(get_option('sh_import_images_5'))) &&
					(!empty(get_option('sh_import_images_6'))) &&
					(!empty(get_option('sh_import_images_7'))) &&
					(!empty(get_option('sh_import_images_8'))) &&
					(!empty(get_option('sh_import_images_9'))) &&
					(!empty(get_option('sh_import_images_10'))) &&
					(!empty(get_option('sh_import_images_11'))) &&
					(!empty(get_option('sh_import_images_12'))) &&
					(!empty(get_option('sh_import_images_13'))) &&
					(!empty(get_option('sh_import_images_14'))) &&
					(!empty(get_option('sh_import_images_15'))) &&
					(!empty(get_option('sh_import_images_16'))) &&
					(!empty(get_option('sh_import_images_17'))) &&
					(empty(get_option('sh_import_images_18')))
				) { ?>
					<li><a href="<?php echo $url . 'import_images_18'; ?>"><?php _e('Import Images 18','sohohotel_booking'); ?></a> <?php echo $sh_import_images_18; ?></li>
				<?php } else { ?>
					<li><?php _e('Import Images 18','sohohotel_booking'); ?> <?php echo $sh_import_images_18; ?></li>
				<?php } ?>
				
				<?php if( 
					(!empty(get_option('sh_delete_all'))) &&
					(!empty(get_option('sh_import_images_1'))) &&
					(!empty(get_option('sh_import_images_2'))) && 
					(!empty(get_option('sh_import_images_3'))) &&
					(!empty(get_option('sh_import_images_4'))) &&
					(!empty(get_option('sh_import_images_5'))) &&
					(!empty(get_option('sh_import_images_6'))) &&
					(!empty(get_option('sh_import_images_7'))) &&
					(!empty(get_option('sh_import_images_8'))) &&
					(!empty(get_option('sh_import_images_9'))) &&
					(!empty(get_option('sh_import_images_10'))) &&
					(!empty(get_option('sh_import_images_11'))) &&
					(!empty(get_option('sh_import_images_12'))) &&
					(!empty(get_option('sh_import_images_13'))) &&
					(!empty(get_option('sh_import_images_14'))) &&
					(!empty(get_option('sh_import_images_15'))) &&
					(!empty(get_option('sh_import_images_16'))) &&
					(!empty(get_option('sh_import_images_17'))) &&
					(!empty(get_option('sh_import_images_18'))) &&
					(empty(get_option('sh_import_contactform7')))
				) { ?>
					<li><a href="<?php echo $url . 'import_contactform7'; ?>"><?php _e('Import Contact Forms','sohohotel_booking'); ?></a> <?php echo $sh_import_contactform7; ?></li>
				<?php } else { ?>
					<li><?php _e('Import Contact Forms','sohohotel_booking'); ?> <?php echo $sh_import_contactform7; ?></li>
				<?php } ?>
				
				<?php if( 
					(!empty(get_option('sh_delete_all'))) &&
					(!empty(get_option('sh_import_images_1'))) &&
					(!empty(get_option('sh_import_images_2'))) && 
					(!empty(get_option('sh_import_images_3'))) &&
					(!empty(get_option('sh_import_images_4'))) &&
					(!empty(get_option('sh_import_images_5'))) &&
					(!empty(get_option('sh_import_images_6'))) &&
					(!empty(get_option('sh_import_images_7'))) &&
					(!empty(get_option('sh_import_images_8'))) &&
					(!empty(get_option('sh_import_images_9'))) &&
					(!empty(get_option('sh_import_images_10'))) &&
					(!empty(get_option('sh_import_images_11'))) &&
					(!empty(get_option('sh_import_images_12'))) &&
					(!empty(get_option('sh_import_images_13'))) &&
					(!empty(get_option('sh_import_images_14'))) &&
					(!empty(get_option('sh_import_images_15'))) &&
					(!empty(get_option('sh_import_images_16'))) &&
					(!empty(get_option('sh_import_images_17'))) &&
					(!empty(get_option('sh_import_images_18'))) &&
					(!empty(get_option('sh_import_contactform7'))) &&
					(empty(get_option('sh_import_pages')))
				) { ?>
					<li><a href="<?php echo $url . 'import_pages'; ?>"><?php _e('Import Pages','sohohotel_booking'); ?></a> <?php echo $sh_import_pages; ?></li>
				<?php } else { ?>
					<li><?php _e('Import Pages','sohohotel_booking'); ?> <?php echo $sh_import_pages; ?></li>
				<?php } ?>
				
				<?php if( 
					(!empty(get_option('sh_delete_all'))) &&
					(!empty(get_option('sh_import_images_1'))) &&
					(!empty(get_option('sh_import_images_2'))) && 
					(!empty(get_option('sh_import_images_3'))) &&
					(!empty(get_option('sh_import_images_4'))) &&
					(!empty(get_option('sh_import_images_5'))) &&
					(!empty(get_option('sh_import_images_6'))) &&
					(!empty(get_option('sh_import_images_7'))) &&
					(!empty(get_option('sh_import_images_8'))) &&
					(!empty(get_option('sh_import_images_9'))) &&
					(!empty(get_option('sh_import_images_10'))) &&
					(!empty(get_option('sh_import_images_11'))) &&
					(!empty(get_option('sh_import_images_12'))) &&
					(!empty(get_option('sh_import_images_13'))) &&
					(!empty(get_option('sh_import_images_14'))) &&
					(!empty(get_option('sh_import_images_15'))) &&
					(!empty(get_option('sh_import_images_16'))) &&
					(!empty(get_option('sh_import_images_17'))) &&
					(!empty(get_option('sh_import_images_18'))) &&
					(!empty(get_option('sh_import_contactform7'))) &&
					(!empty(get_option('sh_import_pages'))) &&
					(empty(get_option('sh_import_posts')))
				) { ?>
					<li><a href="<?php echo $url . 'import_posts'; ?>"><?php _e('Import Posts','sohohotel_booking'); ?></a> <?php echo $sh_import_posts; ?></li>
				<?php } else { ?>
					<li><?php _e('Import Posts','sohohotel_booking'); ?> <?php echo $sh_import_posts; ?></li>
				<?php } ?>
				
				<?php if( 
					(!empty(get_option('sh_delete_all'))) &&
					(!empty(get_option('sh_import_images_1'))) &&
					(!empty(get_option('sh_import_images_2'))) && 
					(!empty(get_option('sh_import_images_3'))) &&
					(!empty(get_option('sh_import_images_4'))) &&
					(!empty(get_option('sh_import_images_5'))) &&
					(!empty(get_option('sh_import_images_6'))) &&
					(!empty(get_option('sh_import_images_7'))) &&
					(!empty(get_option('sh_import_images_8'))) &&
					(!empty(get_option('sh_import_images_9'))) &&
					(!empty(get_option('sh_import_images_10'))) &&
					(!empty(get_option('sh_import_images_11'))) &&
					(!empty(get_option('sh_import_images_12'))) &&
					(!empty(get_option('sh_import_images_13'))) &&
					(!empty(get_option('sh_import_images_14'))) &&
					(!empty(get_option('sh_import_images_15'))) &&
					(!empty(get_option('sh_import_images_16'))) &&
					(!empty(get_option('sh_import_images_17'))) &&
					(!empty(get_option('sh_import_images_18'))) &&
					(!empty(get_option('sh_import_contactform7'))) &&
					(!empty(get_option('sh_import_pages'))) &&
					(!empty(get_option('sh_import_posts'))) &&
					(empty(get_option('sh_import_testimonials')))
				) { ?>
					<li><a href="<?php echo $url . 'import_testimonials'; ?>"><?php _e('Import Testimonials','sohohotel_booking'); ?></a> <?php echo $sh_import_testimonials; ?></li>
				<?php } else { ?>
					<li><?php _e('Import Testimonials','sohohotel_booking'); ?> <?php echo $sh_import_testimonials; ?></li>
				<?php } ?>
				
				<?php if( 
					(!empty(get_option('sh_delete_all'))) &&
					(!empty(get_option('sh_import_images_1'))) &&
					(!empty(get_option('sh_import_images_2'))) && 
					(!empty(get_option('sh_import_images_3'))) &&
					(!empty(get_option('sh_import_images_4'))) &&
					(!empty(get_option('sh_import_images_5'))) &&
					(!empty(get_option('sh_import_images_6'))) &&
					(!empty(get_option('sh_import_images_7'))) &&
					(!empty(get_option('sh_import_images_8'))) &&
					(!empty(get_option('sh_import_images_9'))) &&
					(!empty(get_option('sh_import_images_10'))) &&
					(!empty(get_option('sh_import_images_11'))) &&
					(!empty(get_option('sh_import_images_12'))) &&
					(!empty(get_option('sh_import_images_13'))) &&
					(!empty(get_option('sh_import_images_14'))) &&
					(!empty(get_option('sh_import_images_15'))) &&
					(!empty(get_option('sh_import_images_16'))) &&
					(!empty(get_option('sh_import_images_17'))) &&
					(!empty(get_option('sh_import_images_18'))) &&
					(!empty(get_option('sh_import_contactform7'))) &&
					(!empty(get_option('sh_import_pages'))) &&
					(!empty(get_option('sh_import_posts'))) &&
					(!empty(get_option('sh_import_testimonials'))) &&
					(empty(get_option('sh_import_guestclass')))
				) { ?>
					<li><a href="<?php echo $url . 'import_guestclass'; ?>"><?php _e('Import Guest Classes','sohohotel_booking'); ?></a> <?php echo $sh_import_guestclass; ?></li>
				<?php } else { ?>
					<li><?php _e('Import Guest Classes','sohohotel_booking'); ?> <?php echo $sh_import_guestclass; ?></li>
				<?php } ?>
				
				<?php if( 
					(!empty(get_option('sh_delete_all'))) &&
					(!empty(get_option('sh_import_images_1'))) &&
					(!empty(get_option('sh_import_images_2'))) && 
					(!empty(get_option('sh_import_images_3'))) &&
					(!empty(get_option('sh_import_images_4'))) &&
					(!empty(get_option('sh_import_images_5'))) &&
					(!empty(get_option('sh_import_images_6'))) &&
					(!empty(get_option('sh_import_images_7'))) &&
					(!empty(get_option('sh_import_images_8'))) &&
					(!empty(get_option('sh_import_images_9'))) &&
					(!empty(get_option('sh_import_images_10'))) &&
					(!empty(get_option('sh_import_images_11'))) &&
					(!empty(get_option('sh_import_images_12'))) &&
					(!empty(get_option('sh_import_images_13'))) &&
					(!empty(get_option('sh_import_images_14'))) &&
					(!empty(get_option('sh_import_images_15'))) &&
					(!empty(get_option('sh_import_images_16'))) &&
					(!empty(get_option('sh_import_images_17'))) &&
					(!empty(get_option('sh_import_images_18'))) &&
					(!empty(get_option('sh_import_contactform7'))) &&
					(!empty(get_option('sh_import_pages'))) &&
					(!empty(get_option('sh_import_posts'))) &&
					(!empty(get_option('sh_import_testimonials'))) &&
					(!empty(get_option('sh_import_guestclass'))) &&
					(empty(get_option('sh_import_accommodation')))
				) { ?>
					<li><a href="<?php echo $url . 'import_accommodation'; ?>"><?php _e('Import Accommodation','sohohotel_booking'); ?></a> <?php echo $sh_import_accommodation; ?></li>
				<?php } else { ?>
					<li><?php _e('Import Accommodation','sohohotel_booking'); ?> <?php echo $sh_import_accommodation; ?></li>
				<?php } ?>
				
				<?php if( 
					(!empty(get_option('sh_delete_all'))) &&
					(!empty(get_option('sh_import_images_1'))) &&
					(!empty(get_option('sh_import_images_2'))) && 
					(!empty(get_option('sh_import_images_3'))) &&
					(!empty(get_option('sh_import_images_4'))) &&
					(!empty(get_option('sh_import_images_5'))) &&
					(!empty(get_option('sh_import_images_6'))) &&
					(!empty(get_option('sh_import_images_7'))) &&
					(!empty(get_option('sh_import_images_8'))) &&
					(!empty(get_option('sh_import_images_9'))) &&
					(!empty(get_option('sh_import_images_10'))) &&
					(!empty(get_option('sh_import_images_11'))) &&
					(!empty(get_option('sh_import_images_12'))) &&
					(!empty(get_option('sh_import_images_13'))) &&
					(!empty(get_option('sh_import_images_14'))) &&
					(!empty(get_option('sh_import_images_15'))) &&
					(!empty(get_option('sh_import_images_16'))) &&
					(!empty(get_option('sh_import_images_17'))) &&
					(!empty(get_option('sh_import_images_18'))) &&
					(!empty(get_option('sh_import_contactform7'))) &&
					(!empty(get_option('sh_import_pages'))) &&
					(!empty(get_option('sh_import_posts'))) &&
					(!empty(get_option('sh_import_testimonials'))) &&
					(!empty(get_option('sh_import_guestclass'))) &&
					(!empty(get_option('sh_import_accommodation'))) &&
					(empty(get_option('sh_import_rate')))
				) { ?>
					<li><a href="<?php echo $url . 'import_rate'; ?>"><?php _e('Import Rates','sohohotel_booking'); ?></a> <?php echo $sh_import_rate; ?></li>
				<?php } else { ?>
					<li><?php _e('Import Rate','sohohotel_booking'); ?> <?php echo $sh_import_rate; ?></li>
				<?php } ?>
				
				<?php if( 
					(!empty(get_option('sh_delete_all'))) &&
					(!empty(get_option('sh_import_images_1'))) &&
					(!empty(get_option('sh_import_images_2'))) && 
					(!empty(get_option('sh_import_images_3'))) &&
					(!empty(get_option('sh_import_images_4'))) &&
					(!empty(get_option('sh_import_images_5'))) &&
					(!empty(get_option('sh_import_images_6'))) &&
					(!empty(get_option('sh_import_images_7'))) &&
					(!empty(get_option('sh_import_images_8'))) &&
					(!empty(get_option('sh_import_images_9'))) &&
					(!empty(get_option('sh_import_images_10'))) &&
					(!empty(get_option('sh_import_images_11'))) &&
					(!empty(get_option('sh_import_images_12'))) &&
					(!empty(get_option('sh_import_images_13'))) &&
					(!empty(get_option('sh_import_images_14'))) &&
					(!empty(get_option('sh_import_images_15'))) &&
					(!empty(get_option('sh_import_images_16'))) &&
					(!empty(get_option('sh_import_images_17'))) &&
					(!empty(get_option('sh_import_images_18'))) &&
					(!empty(get_option('sh_import_contactform7'))) &&
					(!empty(get_option('sh_import_pages'))) &&
					(!empty(get_option('sh_import_posts'))) &&
					(!empty(get_option('sh_import_testimonials'))) &&
					(!empty(get_option('sh_import_guestclass'))) &&
					(!empty(get_option('sh_import_accommodation'))) &&
					(!empty(get_option('sh_import_rate'))) &&
					(empty(get_option('sh_import_accommodation_price')))
				) { ?>
					<li><a href="<?php echo $url . 'import_accommodation_price'; ?>"><?php _e('Import Accommodation Prices','sohohotel_booking'); ?></a> <?php echo $sh_import_accommodation_price ?></li>
				<?php } else { ?>
					<li><?php _e('Import Accommodation Prices','sohohotel_booking'); ?> <?php echo $sh_import_accommodation_price; ?></li>
				<?php } ?>
				
				<?php if( 
					(!empty(get_option('sh_delete_all'))) &&
					(!empty(get_option('sh_import_images_1'))) &&
					(!empty(get_option('sh_import_images_2'))) && 
					(!empty(get_option('sh_import_images_3'))) &&
					(!empty(get_option('sh_import_images_4'))) &&
					(!empty(get_option('sh_import_images_5'))) &&
					(!empty(get_option('sh_import_images_6'))) &&
					(!empty(get_option('sh_import_images_7'))) &&
					(!empty(get_option('sh_import_images_8'))) &&
					(!empty(get_option('sh_import_images_9'))) &&
					(!empty(get_option('sh_import_images_10'))) &&
					(!empty(get_option('sh_import_images_11'))) &&
					(!empty(get_option('sh_import_images_12'))) &&
					(!empty(get_option('sh_import_images_13'))) &&
					(!empty(get_option('sh_import_images_14'))) &&
					(!empty(get_option('sh_import_images_15'))) &&
					(!empty(get_option('sh_import_images_16'))) &&
					(!empty(get_option('sh_import_images_17'))) &&
					(!empty(get_option('sh_import_images_18'))) &&
					(!empty(get_option('sh_import_contactform7'))) &&
					(!empty(get_option('sh_import_pages'))) &&
					(!empty(get_option('sh_import_posts'))) &&
					(!empty(get_option('sh_import_testimonials'))) &&
					(!empty(get_option('sh_import_guestclass'))) &&
					(!empty(get_option('sh_import_accommodation'))) &&
					(!empty(get_option('sh_import_rate'))) &&
					(!empty(get_option('sh_import_accommodation_price'))) &&
					(empty(get_option('sh_import_additionalfee')))
				) { ?>
					<li><a href="<?php echo $url . 'import_additionalfee'; ?>"><?php _e('Import Additional Fees','sohohotel_booking'); ?></a> <?php echo $sh_import_additionalfee; ?></li>
				<?php } else { ?>
					<li><?php _e('Import Additional Fees','sohohotel_booking'); ?> <?php echo $sh_import_additionalfee; ?></li>
				<?php } ?>
				
				<?php if( 
					(!empty(get_option('sh_delete_all'))) &&
					(!empty(get_option('sh_import_images_1'))) &&
					(!empty(get_option('sh_import_images_2'))) && 
					(!empty(get_option('sh_import_images_3'))) &&
					(!empty(get_option('sh_import_images_4'))) &&
					(!empty(get_option('sh_import_images_5'))) &&
					(!empty(get_option('sh_import_images_6'))) &&
					(!empty(get_option('sh_import_images_7'))) &&
					(!empty(get_option('sh_import_images_8'))) &&
					(!empty(get_option('sh_import_images_9'))) &&
					(!empty(get_option('sh_import_images_10'))) &&
					(!empty(get_option('sh_import_images_11'))) &&
					(!empty(get_option('sh_import_images_12'))) &&
					(!empty(get_option('sh_import_images_13'))) &&
					(!empty(get_option('sh_import_images_14'))) &&
					(!empty(get_option('sh_import_images_15'))) &&
					(!empty(get_option('sh_import_images_16'))) &&
					(!empty(get_option('sh_import_images_17'))) &&
					(!empty(get_option('sh_import_images_18'))) &&
					(!empty(get_option('sh_import_contactform7'))) &&
					(!empty(get_option('sh_import_pages'))) &&
					(!empty(get_option('sh_import_posts'))) &&
					(!empty(get_option('sh_import_testimonials'))) &&
					(!empty(get_option('sh_import_guestclass'))) &&
					(!empty(get_option('sh_import_accommodation'))) &&
					(!empty(get_option('sh_import_rate'))) &&
					(!empty(get_option('sh_import_accommodation_price'))) &&
					(!empty(get_option('sh_import_additionalfee'))) &&
					(empty(get_option('sh_import_offer')))
				) { ?>
					<li><a href="<?php echo $url . 'import_offer'; ?>"><?php _e('Import Offers','sohohotel_booking'); ?></a> <?php echo $sh_import_offer; ?></li>
				<?php } else { ?>
					<li><?php _e('Import Offers','sohohotel_booking'); ?> <?php echo $sh_import_offer; ?></li>
				<?php } ?>
				
				<?php if( 
					(!empty(get_option('sh_delete_all'))) &&
					(!empty(get_option('sh_import_images_1'))) &&
					(!empty(get_option('sh_import_images_2'))) && 
					(!empty(get_option('sh_import_images_3'))) &&
					(!empty(get_option('sh_import_images_4'))) &&
					(!empty(get_option('sh_import_images_5'))) &&
					(!empty(get_option('sh_import_images_6'))) &&
					(!empty(get_option('sh_import_images_7'))) &&
					(!empty(get_option('sh_import_images_8'))) &&
					(!empty(get_option('sh_import_images_9'))) &&
					(!empty(get_option('sh_import_images_10'))) &&
					(!empty(get_option('sh_import_images_11'))) &&
					(!empty(get_option('sh_import_images_12'))) &&
					(!empty(get_option('sh_import_images_13'))) &&
					(!empty(get_option('sh_import_images_14'))) &&
					(!empty(get_option('sh_import_images_15'))) &&
					(!empty(get_option('sh_import_images_16'))) &&
					(!empty(get_option('sh_import_images_17'))) &&
					(!empty(get_option('sh_import_images_18'))) &&
					(!empty(get_option('sh_import_contactform7'))) &&
					(!empty(get_option('sh_import_pages'))) &&
					(!empty(get_option('sh_import_posts'))) &&
					(!empty(get_option('sh_import_testimonials'))) &&
					(!empty(get_option('sh_import_guestclass'))) &&
					(!empty(get_option('sh_import_accommodation'))) &&
					(!empty(get_option('sh_import_rate'))) &&
					(!empty(get_option('sh_import_accommodation_price'))) &&
					(!empty(get_option('sh_import_additionalfee'))) &&
					(!empty(get_option('sh_import_offer'))) &&
					(empty(get_option('sh_import_menu')))
				) { ?>
					<li><a href="<?php echo $url . 'import_menu'; ?>"><?php _e('Import Menus 1','sohohotel_booking'); ?></a> <?php echo $sh_import_menu; ?></li>
				<?php } else { ?>
					<li><?php _e('Import Menus','sohohotel_booking'); ?> <?php echo $sh_import_menu; ?></li>
				<?php } ?>
				
				<?php if( 
					(!empty(get_option('sh_delete_all'))) &&
					(!empty(get_option('sh_import_images_1'))) &&
					(!empty(get_option('sh_import_images_2'))) && 
					(!empty(get_option('sh_import_images_3'))) &&
					(!empty(get_option('sh_import_images_4'))) &&
					(!empty(get_option('sh_import_images_5'))) &&
					(!empty(get_option('sh_import_images_6'))) &&
					(!empty(get_option('sh_import_images_7'))) &&
					(!empty(get_option('sh_import_images_8'))) &&
					(!empty(get_option('sh_import_images_9'))) &&
					(!empty(get_option('sh_import_images_10'))) &&
					(!empty(get_option('sh_import_images_11'))) &&
					(!empty(get_option('sh_import_images_12'))) &&
					(!empty(get_option('sh_import_images_13'))) &&
					(!empty(get_option('sh_import_images_14'))) &&
					(!empty(get_option('sh_import_images_15'))) &&
					(!empty(get_option('sh_import_images_16'))) &&
					(!empty(get_option('sh_import_images_17'))) &&
					(!empty(get_option('sh_import_images_18'))) &&
					(!empty(get_option('sh_import_contactform7'))) &&
					(!empty(get_option('sh_import_pages'))) &&
					(!empty(get_option('sh_import_posts'))) &&
					(!empty(get_option('sh_import_testimonials'))) &&
					(!empty(get_option('sh_import_guestclass'))) &&
					(!empty(get_option('sh_import_accommodation'))) &&
					(!empty(get_option('sh_import_rate'))) &&
					(!empty(get_option('sh_import_accommodation_price'))) &&
					(!empty(get_option('sh_import_additionalfee'))) &&
					(!empty(get_option('sh_import_offer'))) &&
					(!empty(get_option('sh_import_menu'))) &&
					(empty(get_option('sh_import_menu_mobile')))
				) { ?>
					<li><a href="<?php echo $url . 'import_menu_mobile'; ?>"><?php _e('Import Menus 2','sohohotel_booking'); ?></a> <?php echo $sh_import_menu_mobile; ?></li>
				<?php } else { ?>
					<li><?php _e('Import Menus 2','sohohotel_booking'); ?> <?php echo $sh_import_menu_mobile; ?></li>
				<?php } ?>
				
				<?php if( 
					(!empty(get_option('sh_delete_all'))) &&
					(!empty(get_option('sh_import_images_1'))) &&
					(!empty(get_option('sh_import_images_2'))) && 
					(!empty(get_option('sh_import_images_3'))) &&
					(!empty(get_option('sh_import_images_4'))) &&
					(!empty(get_option('sh_import_images_5'))) &&
					(!empty(get_option('sh_import_images_6'))) &&
					(!empty(get_option('sh_import_images_7'))) &&
					(!empty(get_option('sh_import_images_8'))) &&
					(!empty(get_option('sh_import_images_9'))) &&
					(!empty(get_option('sh_import_images_10'))) &&
					(!empty(get_option('sh_import_images_11'))) &&
					(!empty(get_option('sh_import_images_12'))) &&
					(!empty(get_option('sh_import_images_13'))) &&
					(!empty(get_option('sh_import_images_14'))) &&
					(!empty(get_option('sh_import_images_15'))) &&
					(!empty(get_option('sh_import_images_16'))) &&
					(!empty(get_option('sh_import_images_17'))) &&
					(!empty(get_option('sh_import_images_18'))) &&
					(!empty(get_option('sh_import_contactform7'))) &&
					(!empty(get_option('sh_import_pages'))) &&
					(!empty(get_option('sh_import_posts'))) &&
					(!empty(get_option('sh_import_testimonials'))) &&
					(!empty(get_option('sh_import_guestclass'))) &&
					(!empty(get_option('sh_import_accommodation'))) &&
					(!empty(get_option('sh_import_rate'))) &&
					(!empty(get_option('sh_import_accommodation_price'))) &&
					(!empty(get_option('sh_import_additionalfee'))) &&
					(!empty(get_option('sh_import_offer'))) &&
					(!empty(get_option('sh_import_menu'))) &&
					(!empty(get_option('sh_import_menu_mobile'))) &&
					(empty(get_option('sh_import_menu_left')))
				) { ?>
					<li><a href="<?php echo $url . 'import_menu_left'; ?>"><?php _e('Import Menus 3','sohohotel_booking'); ?></a> <?php echo $sh_import_menu_left; ?></li>
				<?php } else { ?>
					<li><?php _e('Import Menus 3','sohohotel_booking'); ?> <?php echo $sh_import_menu_left; ?></li>
				<?php } ?>
				
				<?php if( 
					(!empty(get_option('sh_delete_all'))) &&
					(!empty(get_option('sh_import_images_1'))) &&
					(!empty(get_option('sh_import_images_2'))) && 
					(!empty(get_option('sh_import_images_3'))) &&
					(!empty(get_option('sh_import_images_4'))) &&
					(!empty(get_option('sh_import_images_5'))) &&
					(!empty(get_option('sh_import_images_6'))) &&
					(!empty(get_option('sh_import_images_7'))) &&
					(!empty(get_option('sh_import_images_8'))) &&
					(!empty(get_option('sh_import_images_9'))) &&
					(!empty(get_option('sh_import_images_10'))) &&
					(!empty(get_option('sh_import_images_11'))) &&
					(!empty(get_option('sh_import_images_12'))) &&
					(!empty(get_option('sh_import_images_13'))) &&
					(!empty(get_option('sh_import_images_14'))) &&
					(!empty(get_option('sh_import_images_15'))) &&
					(!empty(get_option('sh_import_images_16'))) &&
					(!empty(get_option('sh_import_images_17'))) &&
					(!empty(get_option('sh_import_images_18'))) &&
					(!empty(get_option('sh_import_contactform7'))) &&
					(!empty(get_option('sh_import_pages'))) &&
					(!empty(get_option('sh_import_posts'))) &&
					(!empty(get_option('sh_import_testimonials'))) &&
					(!empty(get_option('sh_import_guestclass'))) &&
					(!empty(get_option('sh_import_accommodation'))) &&
					(!empty(get_option('sh_import_rate'))) &&
					(!empty(get_option('sh_import_accommodation_price'))) &&
					(!empty(get_option('sh_import_additionalfee'))) &&
					(!empty(get_option('sh_import_offer'))) &&
					(!empty(get_option('sh_import_menu'))) &&
					(!empty(get_option('sh_import_menu_mobile'))) &&
					(!empty(get_option('sh_import_menu_left'))) &&
					(empty(get_option('sh_import_menu_right')))
				) { ?>
					<li><a href="<?php echo $url . 'import_menu_right'; ?>"><?php _e('Import Menus 4','sohohotel_booking'); ?></a> <?php echo $sh_import_menu_right; ?></li>
				<?php } else { ?>
					<li><?php _e('Import Menus 4','sohohotel_booking'); ?> <?php echo $sh_import_menu_right; ?></li>
				<?php } ?>
				
				<?php if( 
					(!empty(get_option('sh_delete_all'))) &&
					(!empty(get_option('sh_import_images_1'))) &&
					(!empty(get_option('sh_import_images_2'))) && 
					(!empty(get_option('sh_import_images_3'))) &&
					(!empty(get_option('sh_import_images_4'))) &&
					(!empty(get_option('sh_import_images_5'))) &&
					(!empty(get_option('sh_import_images_6'))) &&
					(!empty(get_option('sh_import_images_7'))) &&
					(!empty(get_option('sh_import_images_8'))) &&
					(!empty(get_option('sh_import_images_9'))) &&
					(!empty(get_option('sh_import_images_10'))) &&
					(!empty(get_option('sh_import_images_11'))) &&
					(!empty(get_option('sh_import_images_12'))) &&
					(!empty(get_option('sh_import_images_13'))) &&
					(!empty(get_option('sh_import_images_14'))) &&
					(!empty(get_option('sh_import_images_15'))) &&
					(!empty(get_option('sh_import_images_16'))) &&
					(!empty(get_option('sh_import_images_17'))) &&
					(!empty(get_option('sh_import_images_18'))) &&
					(!empty(get_option('sh_import_contactform7'))) &&
					(!empty(get_option('sh_import_pages'))) &&
					(!empty(get_option('sh_import_posts'))) &&
					(!empty(get_option('sh_import_testimonials'))) &&
					(!empty(get_option('sh_import_guestclass'))) &&
					(!empty(get_option('sh_import_accommodation'))) &&
					(!empty(get_option('sh_import_rate'))) &&
					(!empty(get_option('sh_import_accommodation_price'))) &&
					(!empty(get_option('sh_import_additionalfee'))) &&
					(!empty(get_option('sh_import_offer'))) &&
					(!empty(get_option('sh_import_menu'))) &&
					(!empty(get_option('sh_import_menu_mobile'))) &&
					(!empty(get_option('sh_import_menu_left'))) &&
					(!empty(get_option('sh_import_menu_right'))) &&
					(empty(get_option('sh_import_homepage')))
				) { ?>
					<li><a href="<?php echo $url . 'import_homepage'; ?>"><?php _e('Set Homepage','sohohotel_booking'); ?></a> <?php echo $sh_import_homepage; ?></li>
				<?php } else { ?>
					<li><?php _e('Set Homepage','sohohotel_booking'); ?> <?php echo $sh_import_homepage; ?></li>
				<?php } ?>
				
				<?php if( 
					(!empty(get_option('sh_delete_all'))) &&
					(!empty(get_option('sh_import_images_1'))) &&
					(!empty(get_option('sh_import_images_2'))) && 
					(!empty(get_option('sh_import_images_3'))) &&
					(!empty(get_option('sh_import_images_4'))) &&
					(!empty(get_option('sh_import_images_5'))) &&
					(!empty(get_option('sh_import_images_6'))) &&
					(!empty(get_option('sh_import_images_7'))) &&
					(!empty(get_option('sh_import_images_8'))) &&
					(!empty(get_option('sh_import_images_9'))) &&
					(!empty(get_option('sh_import_images_10'))) &&
					(!empty(get_option('sh_import_images_11'))) &&
					(!empty(get_option('sh_import_images_12'))) &&
					(!empty(get_option('sh_import_images_13'))) &&
					(!empty(get_option('sh_import_images_14'))) &&
					(!empty(get_option('sh_import_images_15'))) &&
					(!empty(get_option('sh_import_images_16'))) &&
					(!empty(get_option('sh_import_images_17'))) &&
					(!empty(get_option('sh_import_images_18'))) &&
					(!empty(get_option('sh_import_contactform7'))) &&
					(!empty(get_option('sh_import_pages'))) &&
					(!empty(get_option('sh_import_posts'))) &&
					(!empty(get_option('sh_import_testimonials'))) &&
					(!empty(get_option('sh_import_guestclass'))) &&
					(!empty(get_option('sh_import_accommodation'))) &&
					(!empty(get_option('sh_import_rate'))) &&
					(!empty(get_option('sh_import_accommodation_price'))) &&
					(!empty(get_option('sh_import_additionalfee'))) &&
					(!empty(get_option('sh_import_offer'))) &&
					(!empty(get_option('sh_import_menu'))) &&
					(!empty(get_option('sh_import_menu_mobile'))) &&
					(!empty(get_option('sh_import_menu_left'))) &&
					(!empty(get_option('sh_import_menu_right'))) &&
					(!empty(get_option('sh_import_homepage'))) &&
					(empty(get_option('sh_import_widgets')))
				) { ?>
					<li><a href="<?php echo $url . 'import_widgets'; ?>"><?php _e('Import Widgets','sohohotel_booking'); ?></a> <?php echo $sh_import_widgets; ?></li>
				<?php } else { ?>
					<li><?php _e('Import Widgets','sohohotel_booking'); ?> <?php echo $sh_import_widgets; ?></li>
				<?php } ?>
				
				<?php if( 
					(!empty(get_option('sh_delete_all'))) &&
					(!empty(get_option('sh_import_images_1'))) &&
					(!empty(get_option('sh_import_images_2'))) && 
					(!empty(get_option('sh_import_images_3'))) &&
					(!empty(get_option('sh_import_images_4'))) &&
					(!empty(get_option('sh_import_images_5'))) &&
					(!empty(get_option('sh_import_images_6'))) &&
					(!empty(get_option('sh_import_images_7'))) &&
					(!empty(get_option('sh_import_images_8'))) &&
					(!empty(get_option('sh_import_images_9'))) &&
					(!empty(get_option('sh_import_images_10'))) &&
					(!empty(get_option('sh_import_images_11'))) &&
					(!empty(get_option('sh_import_images_12'))) &&
					(!empty(get_option('sh_import_images_13'))) &&
					(!empty(get_option('sh_import_images_14'))) &&
					(!empty(get_option('sh_import_images_15'))) &&
					(!empty(get_option('sh_import_images_16'))) &&
					(!empty(get_option('sh_import_images_17'))) &&
					(!empty(get_option('sh_import_images_18'))) &&
					(!empty(get_option('sh_import_contactform7'))) &&
					(!empty(get_option('sh_import_pages'))) &&
					(!empty(get_option('sh_import_posts'))) &&
					(!empty(get_option('sh_import_testimonials'))) &&
					(!empty(get_option('sh_import_guestclass'))) &&
					(!empty(get_option('sh_import_accommodation'))) &&
					(!empty(get_option('sh_import_rate'))) &&
					(!empty(get_option('sh_import_accommodation_price'))) &&
					(!empty(get_option('sh_import_additionalfee'))) &&
					(!empty(get_option('sh_import_offer'))) &&
					(!empty(get_option('sh_import_menu'))) &&
					(!empty(get_option('sh_import_menu_mobile'))) &&
					(!empty(get_option('sh_import_menu_left'))) &&
					(!empty(get_option('sh_import_menu_right'))) &&
					(!empty(get_option('sh_import_homepage'))) &&
					(!empty(get_option('sh_import_widgets'))) &&
					(empty(get_option('sh_import_theme_options')))
				) { ?>
					<li><a href="<?php echo $url . 'import_theme_options'; ?>"><?php _e('Import Theme Options','sohohotel_booking'); ?></a> <?php echo $sh_import_theme_options; ?></li>
				<?php } else { ?>
					<li><?php _e('Import Theme Options','sohohotel_booking'); ?> <?php echo $sh_import_theme_options; ?></li>
				<?php } ?>
				
				<?php if( 
					(!empty(get_option('sh_delete_all'))) &&
					(!empty(get_option('sh_import_images_1'))) &&
					(!empty(get_option('sh_import_images_2'))) && 
					(!empty(get_option('sh_import_images_3'))) &&
					(!empty(get_option('sh_import_images_4'))) &&
					(!empty(get_option('sh_import_images_5'))) &&
					(!empty(get_option('sh_import_images_6'))) &&
					(!empty(get_option('sh_import_images_7'))) &&
					(!empty(get_option('sh_import_images_8'))) &&
					(!empty(get_option('sh_import_images_9'))) &&
					(!empty(get_option('sh_import_images_10'))) &&
					(!empty(get_option('sh_import_images_11'))) &&
					(!empty(get_option('sh_import_images_12'))) &&
					(!empty(get_option('sh_import_images_13'))) &&
					(!empty(get_option('sh_import_images_14'))) &&
					(!empty(get_option('sh_import_images_15'))) &&
					(!empty(get_option('sh_import_images_16'))) &&
					(!empty(get_option('sh_import_images_17'))) &&
					(!empty(get_option('sh_import_images_18'))) &&
					(!empty(get_option('sh_import_contactform7'))) &&
					(!empty(get_option('sh_import_pages'))) &&
					(!empty(get_option('sh_import_posts'))) &&
					(!empty(get_option('sh_import_testimonials'))) &&
					(!empty(get_option('sh_import_guestclass'))) &&
					(!empty(get_option('sh_import_accommodation'))) &&
					(!empty(get_option('sh_import_rate'))) &&
					(!empty(get_option('sh_import_accommodation_price'))) &&
					(!empty(get_option('sh_import_additionalfee'))) &&
					(!empty(get_option('sh_import_offer'))) &&
					(!empty(get_option('sh_import_menu'))) &&
					(!empty(get_option('sh_import_menu_mobile'))) &&
					(!empty(get_option('sh_import_menu_left'))) &&
					(!empty(get_option('sh_import_menu_right'))) &&
					(!empty(get_option('sh_import_homepage'))) &&
					(!empty(get_option('sh_import_widgets'))) &&
					(!empty(get_option('sh_import_theme_options'))) &&
					(empty(get_option('sh_import_settings')))
				) { ?>
					<li><a href="<?php echo $url . 'import_settings'; ?>"><?php _e('Import Settings','sohohotel_booking'); ?></a> <?php echo $sh_import_settings; ?></li>
				<?php } else { ?>
					<li><?php _e('Import Settings','sohohotel_booking'); ?> <?php echo $sh_import_settings; ?></li>
				<?php } ?>
				
			</ul>
		
			<p>It's recommended that you delete the demo import plugin after you've finished importing, since it has the ability to delete your entire website in a single click.</p>
			
		<?php } else { ?>
			
			<p>You must activate the following plugins before you can import the demo data:</p>
			<ol>
				<li>Soho Hotel Booking</li>
				<li>Soho Hotel Shortcodes & Post Types</li>
				<li>WPBakery Page Builder</li>
			</ol>
			
		<?php } ?>
		
	<!-- END .wrap -->
	</div>
	
	<?php

}

function sh_insert_page($data) {
	
	$post_id = wp_insert_post(array (
	   'post_type' => 'page',
	   'post_title' => $data['post_title'],
	   'post_content' => $data['post_content'],
	   'post_status' => 'publish',
	   'comment_status' => 'closed',
	   'ping_status' => 'closed'
	));
	
	// Save custom fields
	if ($post_id) {
		add_post_meta($post_id, 'sohohotel_page_layout', $data['sohohotel_page_layout'], true);
		add_post_meta($post_id, 'sohohotel_page_title', $data['sohohotel_page_title'], true);
	}
	
	return $post_id;
	
}

function sh_insert_image($url) {
		
	$parts = explode("/",$url);
	$upload_dir = wp_upload_dir();
	$image_data = file_get_contents($url);
	$unique_file_name = wp_unique_filename( $upload_dir['path'], end($parts) );
	$filename = basename( $unique_file_name );

	if( wp_mkdir_p( $upload_dir['path'] ) ) {
	    $file = $upload_dir['path'] . '/' . $filename;
	} else {
	    $file = $upload_dir['basedir'] . '/' . $filename;
	}

	file_put_contents( $file, $image_data );

	$wp_filetype = wp_check_filetype( $filename, null );

	$attachment = array(
	    'post_mime_type' => $wp_filetype['type'],
	    'post_title'     => sanitize_file_name( $filename ),
	    'post_content'   => '',
	    'post_status'    => 'inherit'
	);
	
	$attach_id = wp_insert_attachment( $attachment, $file);
	require_once(ABSPATH . 'wp-admin/includes/image.php');
	$attach_data = wp_generate_attachment_metadata( $attach_id, $file );
	wp_update_attachment_metadata( $attach_id, $attach_data );
	
	return $attach_id;
	
}

function sh_insert_contact_form_7($data) {
	
	if(function_exists('wpcf7_save_contact_form')){
	   
		$post_id = wp_insert_post(array (
		   'post_type' => 'wpcf7_contact_form',
		   'post_title' => $data['post_title'],
		   'post_content' => $data['post_content'],
		   'post_status' => 'publish',
		   'comment_status' => 'closed',
		   'ping_status' => 'closed'
		));
	
		// Save Contact Form 7
		if ($post_id) {
		
			$args['id'] = $post_id;
			$args['title'] = $data['post_title'];
			$args['locale'] = '';
			$args['form'] = $data['post_content'];
			$args['mail'] = '';
			$args['mail_2'] = '';
			$args['messages'] = '';
			$args['additional_settings'] = '';
			$contact_form = wpcf7_save_contact_form( $args );
		
		}
	
		return $post_id;
	
	}
	
}

function sh_import_images($set) {
	
	if($set == 1) {
		$images[1] = 'https://quitenicestuff.com/import/sohohotel/01.jpg';
		$images[2] = 'https://quitenicestuff.com/import/sohohotel/02.jpg';
		$images[3] = 'https://quitenicestuff.com/import/sohohotel/03.jpg';
	}
	
	if($set == 2) {
		$images[4] = 'https://quitenicestuff.com/import/sohohotel/04.jpg';
		$images[5] = 'https://quitenicestuff.com/import/sohohotel/05.jpg';
		$images[6] = 'https://quitenicestuff.com/import/sohohotel/06.jpg';
		$images[7] = 'https://quitenicestuff.com/import/sohohotel/07.jpg';
	}
	
	if($set == 3) {
		$images[8] = 'https://quitenicestuff.com/import/sohohotel/08.jpg';
		$images[9] = 'https://quitenicestuff.com/import/sohohotel/09.jpg';
		$images[10] = 'https://quitenicestuff.com/import/sohohotel/10.jpg';
	}
	
	if($set == 4) {
		$images[11] = 'https://quitenicestuff.com/import/sohohotel/11.jpg';
		$images[12] = 'https://quitenicestuff.com/import/sohohotel/12.jpg';
		$images[13] = 'https://quitenicestuff.com/import/sohohotel/13.jpg';
	}
	
	if($set == 5) {
		$images[14] = 'https://quitenicestuff.com/import/sohohotel/14.jpg';
		$images[15] = 'https://quitenicestuff.com/import/sohohotel/15.jpg';
		$images[16] = 'https://quitenicestuff.com/import/sohohotel/16.jpg';
		$images[17] = 'https://quitenicestuff.com/import/sohohotel/17.jpg';
	}
	
	if($set == 6) {
		$images[18] = 'https://quitenicestuff.com/import/sohohotel/18.jpg';
		$images[19] = 'https://quitenicestuff.com/import/sohohotel/19.jpg';
	}
	
	if($set == 7) {
		$images[20] = 'https://quitenicestuff.com/import/sohohotel/20.jpg';
		$images[21] = 'https://quitenicestuff.com/import/sohohotel/21.jpg';
		$images[22] = 'https://quitenicestuff.com/import/sohohotel/22.jpg';
		$images[23] = 'https://quitenicestuff.com/import/sohohotel/23.jpg';
		$images[24] = 'https://quitenicestuff.com/import/sohohotel/24.jpg';
		$images[25] = 'https://quitenicestuff.com/import/sohohotel/25.jpg';
	}
	
	if($set == 8) {
		$images[26] = 'https://quitenicestuff.com/import/sohohotel/26.jpg';
		$images[27] = 'https://quitenicestuff.com/import/sohohotel/27.jpg';
	}
	
	if($set == 9) {
		$images[28] = 'https://quitenicestuff.com/import/sohohotel/28.jpg';
	}
	
	if($set == 10) {
		$images[29] = 'https://quitenicestuff.com/import/sohohotel/29.jpg';
		$images[30] = 'https://quitenicestuff.com/import/sohohotel/30.jpg';
	}
	
	if($set == 11) {
		$images[31] = 'https://quitenicestuff.com/import/sohohotel/31.jpg';
		$images[32] = 'https://quitenicestuff.com/import/sohohotel/32.jpg';
		$images[33] = 'https://quitenicestuff.com/import/sohohotel/33.jpg';
	}
	
	if($set == 12) {
		$images[34] = 'https://quitenicestuff.com/import/sohohotel/34.jpg';
		$images[35] = 'https://quitenicestuff.com/import/sohohotel/35.jpg';
		$images[36] = 'https://quitenicestuff.com/import/sohohotel/36.jpg';
		$images[37] = 'https://quitenicestuff.com/import/sohohotel/37.jpg';
		$images[38] = 'https://quitenicestuff.com/import/sohohotel/38.jpg';
		$images[39] = 'https://quitenicestuff.com/import/sohohotel/39.jpg';
	}
	
	if($set == 13) {
		$images[40] = 'https://quitenicestuff.com/import/sohohotel/40.jpg';
		$images[41] = 'https://quitenicestuff.com/import/sohohotel/41.jpg';
	}
	
	if($set == 14) {
		$images[42] = 'https://quitenicestuff.com/import/sohohotel/42.jpg';
	}
	
	if($set == 15) {
		$images[43] = 'https://quitenicestuff.com/import/sohohotel/43.jpg';
	}
	
	if($set == 16) {
		$images[44] = 'https://quitenicestuff.com/import/sohohotel/44.jpg';
	}
	
	if($set == 17) {
		$images[45] = 'https://quitenicestuff.com/import/sohohotel/45.jpg';
	}
	
	if($set == 18) {
		$images[46] = 'https://quitenicestuff.com/import/sohohotel/46.jpg';
	}
	
	foreach($images as $key => $val) {		
		update_option( 'shb_demo_image_' . $key, sh_insert_image($images[$key]) );
	}
	
}

function sh_import_contactform7() {
	
	$contactform7['booking_form_1']['post_title'] = 'Booking Form 1';
	$contactform7['booking_form_1']['post_content'] = '<div class="shb-clearfix"><div class="shb-one-half"><label>Your name <span>*</span></label>[text* your-name]</div><div class="shb-one-half"><label>Number of guests <span>*</span></label><div class="sohohotel-select-wrapper">[select number-of-guests "1" "2" "3" "4" "5" "6" "7" "8" "9" "10"]<i class="fas fa-chevron-down"></i></div></div></div><div class="shb-clearfix"><div class="shb-one-half"><label>Check in <span>*</span></label>[date check-in]</div><div class="shb-one-half"><label>Check out <span>*</span></label>[date check-out]</div></div><div class="shb-clearfix"><label>Room <span>*</span></label><div class="sohohotel-select-wrapper">[select room-type "Standard Room" "Deluxe Room" "Deluxe Ensuite Room" "Queen Room" "King Room"]<i class="fas fa-chevron-down"></i></div></div><div class="shb-clearfix"><div class="shb-one-half"><label>Your email <span>*</span></label>[email* your-email]</div><div class="shb-one-half"><label>Your phone <span>*</span></label>[tel your-phone]</div></div><label>Special requirements</label>[textarea special-requirements class:shb-booking-form-special-req][submit "Submit"]';

	update_option( 'shb_contactform7_1', sh_insert_contact_form_7($contactform7['booking_form_1']) );
	
	$contactform7['contact_form_1']['post_title'] = 'Contact Form 1';
	$contactform7['contact_form_1']['post_content'] = '<label> Your name
    [text* your-name] </label>

<label> Your email
    [email* your-email] </label>

<label> Subject
    [text* your-subject] </label>

<label> Your message (optional)
    [textarea your-message] </label>

[submit "Submit"]';

	update_option( 'shb_contactform7_2', sh_insert_contact_form_7($contactform7['contact_form_1']) );
	
}

function sh_import_pages() {
	
	/* ----------------------------------------------------------------------------

	   My Account

	---------------------------------------------------------------------------- */
	$pages['woocommerce_my_account']['post_title'] = 'My Account';
	$pages['woocommerce_my_account']['sohohotel_page_layout'] = 'full-width';
	$pages['woocommerce_my_account']['sohohotel_page_title'] = 'standard-title';
	$pages['woocommerce_my_account']['post_content'] = '<p>[vc_row][vc_column][woocommerce_my_account order_count="15"][/vc_column][/vc_row]</p>';
	
	$shb_woocommerce_my_account_id = sh_insert_page($pages['woocommerce_my_account']);
	update_option('shb_woocommerce_my_account_id',$shb_woocommerce_my_account_id);
	
	/* ----------------------------------------------------------------------------

	   About Us I

	---------------------------------------------------------------------------- */
	$pages['about_us_i']['post_title'] = 'About Us I';
	$pages['about_us_i']['sohohotel_page_layout'] = 'full-width';
	$pages['about_us_i']['sohohotel_page_title'] = 'standard-title';
	$pages['about_us_i']['post_content'] = '[vc_row el_class="sohohotel-content-inner"][vc_column][sohohotel_title title="Our Hotel" size="25px"][vc_column_text]Maecenas feugiat mattis ipsum, vitae semper massa porttitor sit amet. Nulla mattis, urna et posuere ornare, neque leo dapibus ante, nec dignissim massa felis sed nulla. Donec porttitor nulla et tristique dignissim. Cras vulputate iaculis metus ac rutrum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque vel justo

Nam eget nulla in nibh gravida condimentum non sed nisi. Integer ipsum nisl, porta id venenatis quis, fringilla ac est nulla lorem nunc, viverra at aliquet at. Nunc et tincidunt nisl. Etiam vitae lobortis eros. Cras quis vehicula odio. Ut euismod nunc quis nisi facilisis dapibus. Vestibulum dignissim sem id velit dignissim ornare.[/vc_column_text][vc_empty_space height="40px"][/vc_column][/vc_row][vc_row][vc_column][sohohotel_video_thumbnail thumbnail_url="' . get_option('shb_demo_image_7') . '" video_url="https://www.youtube.com/watch?v=9ATwmA0AZOM"][/vc_column][/vc_row][vc_row el_class="sohohotel-content-inner"][vc_column][sohohotel_title title="Soho Hotel FAQ’s" size="25px"][vc_toggle title="My flight arrives early in the morning, what time can I check in?"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent et rhoncus neque. Maecenas enim nunc, dapibus in mattis eleifend, luctus et magna. Maecenas nunc est, posuere sed convallis tincidunt[/vc_toggle][vc_toggle title="Is breakfast included as standard with all rooms?"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent et rhoncus neque. Maecenas enim nunc, dapibus in mattis eleifend, luctus et magna. Maecenas nunc est, posuere sed convallis tincidunt[/vc_toggle][vc_toggle title="Do you provide a child day care service?"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent et rhoncus neque. Maecenas enim nunc, dapibus in mattis eleifend, luctus et magna. Maecenas nunc est, posuere sed convallis tincidunt[/vc_toggle][vc_toggle title="Are airport pickups available for late night flight arrivals?"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent et rhoncus neque. Maecenas enim nunc, dapibus in mattis eleifend, luctus et magna. Maecenas nunc est, posuere sed convallis tincidunt[/vc_toggle][vc_empty_space height="60px"][/vc_column][/vc_row][vc_row][vc_column][vc_column_text]

[gallery link="file" columns="4" size="full" ids="' . get_option('shb_demo_image_9') . ',' . get_option('shb_demo_image_10') . ',' . get_option('shb_demo_image_11') . ',' . get_option('shb_demo_image_12') . '"]

[/vc_column_text][vc_empty_space height="30px"][/vc_column][/vc_row]';
	
	$shb_about_us_i_id = sh_insert_page($pages['about_us_i']);
	update_option('shb_about_us_i_id',$shb_about_us_i_id);
	
	/* ----------------------------------------------------------------------------

	   About Us II

	---------------------------------------------------------------------------- */
	$pages['about_us_ii']['post_title'] = 'About Us II';
	$pages['about_us_ii']['sohohotel_page_layout'] = 'full-width';
	$pages['about_us_ii']['sohohotel_page_title'] = 'standard-title';
	$pages['about_us_ii']['post_content'] = '<p>[vc_row fixed_width="true" css=".vc_custom_1627562291998{margin-top: 0px !important;margin-bottom: 0px !important;border-top-width: 0px !important;border-bottom-width: 0px !important;padding-top: 10px !important;padding-bottom: 0px !important;}"][vc_column css=".vc_custom_1627562322556{margin-top: 0px !important;margin-bottom: 0px !important;border-top-width: 0px !important;border-bottom-width: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"][sohohotel_fixed_height_text_image image_url="' . get_option('shb_demo_image_13') . '" title="Our Hotel"]</p>
<p>Nullam tincidunt tellus vel nibh facilisis, in vestibulum metus volutpat. Suspendisse vestibulum, purus pulvinar commodo commodo, sem nisi luctus tellus, nec suscipit purus nisi vel tellus.</p>
<p>Ut eget eros cursus augue gravida imperdiet. Sed vitae lobortis tortor. In justo eros, blandit ac dapibus vitae, gravida molestie enim. Praesent dictum ligula vitae.</p>
<p>[/sohohotel_fixed_height_text_image][sohohotel_fixed_height_text_image image_url="' . get_option('shb_demo_image_14') . '" title="The Location" align="image-left"]</p>
<p>Nullam tincidunt tellus vel nibh facilisis, in vestibulum metus volutpat. Suspendisse vestibulum, purus pulvinar commodo commodo, sem nisi luctus tellus, nec suscipit purus nisi vel tellus.</p>
<p>Ut eget eros cursus augue gravida imperdiet. Sed vitae lobortis tortor. In justo eros, blandit ac dapibus vitae, gravida molestie enim. Praesent dictum ligula vitae.</p>
<p>[/sohohotel_fixed_height_text_image][sohohotel_fixed_height_text_image image_url="' . get_option('shb_demo_image_15') . '" title="Hotel Services"]</p>
<p>Nullam tincidunt tellus vel nibh facilisis, in vestibulum metus volutpat. Suspendisse vestibulum, purus pulvinar commodo commodo, sem nisi luctus tellus, nec suscipit purus nisi vel tellus.</p>
<p>Ut eget eros cursus augue gravida imperdiet. Sed vitae lobortis tortor. In justo eros, blandit ac dapibus vitae, gravida molestie enim. Praesent dictum ligula vitae.</p>
<p>[/sohohotel_fixed_height_text_image][/vc_column][/vc_row][vc_row css=".vc_custom_1627553435640{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 45px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][vc_column css=".vc_custom_1627553414681{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][vc_separator color="custom" accent_color="#dedede"][/vc_column][/vc_row][vc_row css=".vc_custom_1627562303197{margin-top: 0px !important;margin-bottom: 10px !important;border-top-width: 0px !important;border-bottom-width: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"][vc_column css=".vc_custom_1627562333686{margin-top: 0px !important;margin-bottom: 0px !important;border-top-width: 0px !important;border-bottom-width: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"][sohohotel_title title="Hotel Facilities" size="28px" align="center"][vc_empty_space height="20px"][sohohotel_icon_text icon1="fa-binoculars" title1="Great Views" content1="Proin felis mauris, fermentum non condimentum id, porttitor in nisl curabitur euismod convallis." icon2="fa-swimming-pool" title2="Swimming Pool" content2="Proin felis mauris, fermentum non condimentum id, porttitor in nisl curabitur euismod convallis." icon3="fa-compass" title3="South Facing" content3="Proin felis mauris, fermentum non condimentum id, porttitor in nisl curabitur euismod convallis." icon4="fa-map-marked-alt" title4="Nice Location" content4="Proin felis mauris, fermentum non condimentum id, porttitor in nisl curabitur euismod convallis."][/vc_column][/vc_row]</p>
';

	$shb_about_us_ii_id = sh_insert_page($pages['about_us_ii']);
	update_option('shb_about_us_ii_id',$shb_about_us_ii_id);
	
	/* ----------------------------------------------------------------------------

	   Accommodation I – 2 Columns

	---------------------------------------------------------------------------- */
	$pages['accommodation_i_2_columns']['post_title'] = 'Accommodation I – 2 Columns';
	$pages['accommodation_i_2_columns']['sohohotel_page_layout'] = 'full-width';
	$pages['accommodation_i_2_columns']['sohohotel_page_title'] = 'standard-title';
	$pages['accommodation_i_2_columns']['post_content'] = '[vc_row][vc_column][shb_accommodation_listing_1 columns="2" posts_per_page="4"][/vc_column][/vc_row]';
	
	$shb_accommodation_i_2_columns_id = sh_insert_page($pages['accommodation_i_2_columns']);
	update_option('shb_accommodation_i_2_columns_id',$shb_accommodation_i_2_columns_id);
	
	/* ----------------------------------------------------------------------------

	   Accommodation I – 3 Columns

	---------------------------------------------------------------------------- */
	$pages['accommodation_i_3_columns']['post_title'] = 'Accommodation I – 3 Columns';
	$pages['accommodation_i_3_columns']['sohohotel_page_layout'] = 'full-width';
	$pages['accommodation_i_3_columns']['sohohotel_page_title'] = 'standard-title';
	$pages['accommodation_i_3_columns']['post_content'] = '[vc_row][vc_column][shb_accommodation_listing_1 posts_per_page="6"][/vc_column][/vc_row]';
	
	$shb_accommodation_i_3_columns_id = sh_insert_page($pages['accommodation_i_3_columns']);
	update_option('shb_accommodation_i_3_columns_id',$shb_accommodation_i_3_columns_id);

	/* ----------------------------------------------------------------------------

	   Accommodation II – 2 Columns

	---------------------------------------------------------------------------- */
	$pages['accommodation_ii_2_columns']['post_title'] = 'Accommodation II – 2 Columns';
	$pages['accommodation_ii_2_columns']['sohohotel_page_layout'] = 'full-width';
	$pages['accommodation_ii_2_columns']['sohohotel_page_title'] = 'standard-title';
	$pages['accommodation_ii_2_columns']['post_content'] = '[vc_row][vc_column][shb_accommodation_listing_2 columns="2" posts_per_page="4"][/vc_column][/vc_row]';
		
	$shb_accommodation_ii_2_columns_id = sh_insert_page($pages['accommodation_ii_2_columns']);
	update_option('shb_accommodation_ii_2_columns_id',$shb_accommodation_ii_2_columns_id);

	/* ----------------------------------------------------------------------------

	   Accommodation II – 3 Columns

	---------------------------------------------------------------------------- */
	$pages['accommodation_ii_3_columns']['post_title'] = 'Accommodation II – 3 Columns';
	$pages['accommodation_ii_3_columns']['sohohotel_page_layout'] = 'full-width';
	$pages['accommodation_ii_3_columns']['sohohotel_page_title'] = 'standard-title';
	$pages['accommodation_ii_3_columns']['post_content'] = '[vc_row][vc_column][shb_accommodation_listing_2 posts_per_page="6"][/vc_column][/vc_row]';

	$shb_accommodation_ii_3_columns_id = sh_insert_page($pages['accommodation_ii_3_columns']);
	update_option('shb_accommodation_ii_3_columns_id',$shb_accommodation_ii_3_columns_id);
	
	/* ----------------------------------------------------------------------------

	   Accommodation III – 2 Columns

	---------------------------------------------------------------------------- */
	$pages['accommodation_iii_2_columns']['post_title'] = 'Accommodation III – 2 Columns';
	$pages['accommodation_iii_2_columns']['sohohotel_page_layout'] = 'full-width';
	$pages['accommodation_iii_2_columns']['sohohotel_page_title'] = 'standard-title';
	$pages['accommodation_iii_2_columns']['post_content'] = '[vc_row][vc_column][shb_accommodation_listing_3 columns="2" posts_per_page="4"][/vc_column][/vc_row]';
	
	$shb_accommodation_iii_2_columns_id = sh_insert_page($pages['accommodation_iii_2_columns']);
	update_option('shb_accommodation_iii_2_columns_id',$shb_accommodation_iii_2_columns_id);
	
	/* ----------------------------------------------------------------------------

	   Accommodation III – 3 Columns

	---------------------------------------------------------------------------- */
	$pages['accommodation_iii_3_columns']['post_title'] = 'Accommodation III – 3 Columns';
	$pages['accommodation_iii_3_columns']['sohohotel_page_layout'] = 'full-width';
	$pages['accommodation_iii_3_columns']['sohohotel_page_title'] = 'standard-title';
	$pages['accommodation_iii_3_columns']['post_content'] = '[vc_row][vc_column][shb_accommodation_listing_3 posts_per_page="6"][/vc_column][/vc_row]';

	$shb_accommodation_iii_3_columns_id = sh_insert_page($pages['accommodation_iii_3_columns']);
	update_option('shb_accommodation_iii_3_columns_id',$shb_accommodation_iii_3_columns_id);
	
	/* ----------------------------------------------------------------------------

	   Blog I

	---------------------------------------------------------------------------- */
	$pages['blog_i']['post_title'] = 'Blog I';
	$pages['blog_i']['sohohotel_page_layout'] = 'full-width';
	$pages['blog_i']['sohohotel_page_title'] = 'standard-title';
	$pages['blog_i']['post_content'] = '<p>[vc_row][vc_column][sohohotel_blog_page posts_per_page="3"][vc_empty_space height="30px"][/vc_column][/vc_row]</p>';

	$shb_blog_i_id = sh_insert_page($pages['blog_i']);
	update_option('shb_blog_i_id',$shb_blog_i_id);
	
	/* ----------------------------------------------------------------------------

	   Blog II

	---------------------------------------------------------------------------- */
	$pages['blog_ii']['post_title'] = 'Blog II';
	$pages['blog_ii']['sohohotel_page_layout'] = 'full-width';
	$pages['blog_ii']['sohohotel_page_title'] = 'standard-title';
	$pages['blog_ii']['post_content'] = '<p>[vc_row][vc_column][sohohotel_blog_page style="2-3" posts_per_page="6"][vc_empty_space height="30px"][/vc_column][/vc_row]</p>';

	$shb_blog_ii_id = sh_insert_page($pages['blog_ii']);
	update_option('shb_blog_ii_id',$shb_blog_ii_id);
	
	/* ----------------------------------------------------------------------------

	   Blog III

	---------------------------------------------------------------------------- */
	$pages['blog_iii']['post_title'] = 'Blog III';
	$pages['blog_iii']['sohohotel_page_layout'] = 'full-width';
	$pages['blog_iii']['sohohotel_page_title'] = 'standard-title';
	$pages['blog_iii']['post_content'] = '<p>[vc_row][vc_column][sohohotel_blog_page style="2-2" posts_per_page="4"][/vc_column][/vc_row]</p>';
	
	$shb_blog_iii_id = sh_insert_page($pages['blog_iii']);
	update_option('shb_blog_iii_id',$shb_blog_iii_id);
	
	/* ----------------------------------------------------------------------------

	   Blog IV

	---------------------------------------------------------------------------- */
	$pages['blog_iv']['post_title'] = 'Blog IV';
	$pages['blog_iv']['sohohotel_page_layout'] = 'full-width';
	$pages['blog_iv']['sohohotel_page_title'] = 'standard-title';
	$pages['blog_iv']['post_content'] = '<p>[vc_row][vc_column][sohohotel_blog_page style="3" posts_per_page="3"][vc_empty_space height="30px"][/vc_column][/vc_row]</p>';

	$shb_blog_iv_id = sh_insert_page($pages['blog_iv']);
	update_option('shb_blog_iv_id',$shb_blog_iv_id);
	
	/* ----------------------------------------------------------------------------

	   Booking

	---------------------------------------------------------------------------- */
	$pages['booking']['post_title'] = 'Bookings';
	$pages['booking']['sohohotel_page_layout'] = 'full-width';
	$pages['booking']['sohohotel_page_title'] = 'no-title';
	$pages['booking']['post_content'] = '<p>[vc_row][vc_column][shb_booking_page][/vc_column][/vc_row]</p>';
	
	$shb_booking_id = sh_insert_page($pages['booking']);
	update_option('shb_booking_id',$shb_booking_id);
	
	/* ----------------------------------------------------------------------------

	   Contact Us I

	---------------------------------------------------------------------------- */
	$pages['contact_us_i']['post_title'] = 'Contact Us I';
	$pages['contact_us_i']['sohohotel_page_layout'] = 'full-width-unboxed';
	$pages['contact_us_i']['sohohotel_page_title'] = 'standard-title';
	$pages['contact_us_i']['post_content'] = '[vc_row fixed_width="true"][vc_column width="1/2"][contact-form-7 id="' . get_option('shb_contactform7_2') . '"][/vc_column][vc_column width="1/2"][sohohotel_title title="Get In Touch"][vc_column_text]Duis commodo ipsum quis ante venenatis rhoncus. Vivamus imperdiet felis ac facilisis hendrerit. Nulla eu elementum ex, ut pulvinar est. Nam aliquet et tortor sed aliquet.[/vc_column_text][vc_empty_space height="35px"][sohohotel_title title="Contact Details"][sohohotel_contact_details address="Soho Hotel Resort &amp; Spa, 55 Columbus Circle, New York, NY" phone="+44 12345 67890" email="bookings@website.com"][sohohotel_title title="Follow Us"][sohohotel_social_media facebook="#" instagram="#" twitter="#" youtube="#" tripadvisor="#"][vc_empty_space height="70px"][/vc_column][/vc_row][vc_row css=".vc_custom_1625655823267{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][vc_column css=".vc_custom_1625655832067{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][sohohotel_googlemap][/vc_column][/vc_row]';
	
	$shb_contact_us_i_id = sh_insert_page($pages['contact_us_i']);
	update_option('shb_contact_us_i_id',$shb_contact_us_i_id);
	
	/* ----------------------------------------------------------------------------

	   Contact Us II

	---------------------------------------------------------------------------- */
	$pages['contact_us_ii']['post_title'] = 'Contact Us II';
	$pages['contact_us_ii']['sohohotel_page_layout'] = 'full-width';
	$pages['contact_us_ii']['sohohotel_page_title'] = 'standard-title';
	$pages['contact_us_ii']['post_content'] = '[vc_row][vc_column width="2/3"][contact-form-7 id="' . get_option('shb_contactform7_2') . '"][/vc_column][vc_column width="1/3"][sohohotel_title title="Get In Touch"][vc_column_text]Duis commodo ipsum quis ante venenatis rhoncus. Vivamus imperdiet felis ac facilisis hendrerit nulla eu elementum ex, ut pulvinar est nam aliquet et.[/vc_column_text][vc_empty_space height="35px"][sohohotel_title title="Contact Details"][sohohotel_contact_details address="Soho Hotel Resort &amp; Spa, 55 Columbus Circle, New York, NY" phone="+44 12345 67890" email="bookings@website.com"][sohohotel_title title="Follow Us"][sohohotel_social_media facebook="#" instagram="#" twitter="#" youtube="#" tripadvisor="#"][vc_empty_space height="70px"][/vc_column][/vc_row][vc_row][vc_column][sohohotel_googlemap][vc_empty_space height="80px"][/vc_column][/vc_row]';

	$shb_contact_us_ii_id = sh_insert_page($pages['contact_us_ii']);
	update_option('shb_contact_us_ii_id',$shb_contact_us_ii_id);
	
	/* ----------------------------------------------------------------------------

	   Contact Us III

	---------------------------------------------------------------------------- */
	$pages['contact_us_iii']['post_title'] = 'Contact Us III';
	$pages['contact_us_iii']['sohohotel_page_layout'] = 'full-width';
	$pages['contact_us_iii']['sohohotel_page_title'] = 'standard-title';
	$pages['contact_us_iii']['post_content'] = '[vc_row][vc_column width="1/2"][sohohotel_title title="Get In Touch"][vc_column_text]Duis commodo ipsum quis ante venenatis rhoncus. Vivamus imperdiet felis ac facilisis hendrerit. Nulla eu elementum ex, ut pulvinar est. Nam aliquet et tortor sed aliquet.[/vc_column_text][vc_empty_space height="35px"][sohohotel_title title="Follow Us"][sohohotel_social_media facebook="#" instagram="#" twitter="#" youtube="#" tripadvisor="#"][vc_empty_space height="60px"][contact-form-7 id="' . get_option('shb_contactform7_2') . '"][/vc_column][vc_column width="1/2"][sohohotel_googlemap height="310px"][vc_empty_space height="35px"][sohohotel_title title="New York City"][sohohotel_contact_details address="Soho Hotel Resort &amp; Spa, 55 Columbus Circle, New York, NY" phone="+44 12345 67890"][sohohotel_googlemap map_id="2" height="310px" latitude="34.081796" longitude="-118.413395"][vc_empty_space height="35px"][sohohotel_title title="Los Angeles"][sohohotel_contact_details address="Soho Hotel Resort &amp; Spa, 55 Columbus Circle, New York, NY" phone="+44 12345 67890"][/vc_column][/vc_row]';
	
	$shb_contact_us_iii_id = sh_insert_page($pages['contact_us_iii']);
	update_option('shb_contact_us_iii_id',$shb_contact_us_iii_id);
	
	/* ----------------------------------------------------------------------------

	   Full Width

	---------------------------------------------------------------------------- */
	$pages['full_width']['post_title'] = 'Full Width';
	$pages['full_width']['sohohotel_page_layout'] = 'full-width';
	$pages['full_width']['sohohotel_page_title'] = 'standard-title';
	$pages['full_width']['post_content'] = '<p>[vc_row css=".vc_custom_1626074544662{margin-bottom: 40px !important;}"][vc_column][vc_column_text]</p>
<h1>H1 Tag</h1>
<p>Nullam erat felis, pellentesque non egestas nec, <a href="#">vulputate id odio</a>. Donec mattis nec orci ut porta. Donec pharetra <a href="#">convallis augue</a> in tincidunt. Nullam eget felis urna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent tincidunt massa porta odio euismod, sit amet cursus quam sagittis. Mauris eget volutpat urna, sit amet ultricies est. Aenean dapibus lacinia risus, nec consectetur purus fringilla eu. Aenean eget congue mauris, id venenatis augue. Maecenas vulputate maximus vehicula.</p>
<h2>H2 Tag</h2>
<p>Nullam erat felis, pellentesque non egestas nec, vulputate id odio. Donec mattis nec orci ut porta. Donec pharetra convallis augue in tincidunt. Nullam eget felis urna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent tincidunt massa porta odio euismod, sit amet cursus quam sagittis. Mauris eget volutpat urna, sit amet ultricies est. Aenean dapibus lacinia risus, nec consectetur purus fringilla eu. Aenean eget congue mauris, id venenatis augue. Maecenas vulputate maximus vehicula.</p>
<h3>H3 Tag</h3>
<p>Nullam erat felis, pellentesque non egestas nec, vulputate id odio. Donec mattis nec orci ut porta. Donec pharetra convallis augue in tincidunt. Nullam eget felis urna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent tincidunt massa porta odio euismod, sit amet cursus quam sagittis. Mauris eget volutpat urna, sit amet ultricies est. Aenean dapibus lacinia risus, nec consectetur purus fringilla eu. Aenean eget congue mauris, id venenatis augue. Maecenas vulputate maximus vehicula.</p>
<h4>H4 Tag</h4>
<p>Nullam erat felis, pellentesque non egestas nec, vulputate id odio. Donec mattis nec orci ut porta. Donec pharetra convallis augue in tincidunt. Nullam eget felis urna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent tincidunt massa porta odio euismod, sit amet cursus quam sagittis. Mauris eget volutpat urna, sit amet ultricies est. Aenean dapibus lacinia risus, nec consectetur purus fringilla eu. Aenean eget congue mauris, id venenatis augue. Maecenas vulputate maximus vehicula.</p>
<h5>H5 Tag</h5>
<p>Nullam erat felis, pellentesque non egestas nec, vulputate id odio. Donec mattis nec orci ut porta. Donec pharetra convallis augue in tincidunt. Nullam eget felis urna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent tincidunt massa porta odio euismod, sit amet cursus quam sagittis. Mauris eget volutpat urna, sit amet ultricies est. Aenean dapibus lacinia risus, nec consectetur purus fringilla eu. Aenean eget congue mauris, id venenatis augue. Maecenas vulputate maximus vehicula.</p>
<h6>H6 Tag</h6>
<p>Nullam erat felis, pellentesque non egestas nec, vulputate id odio. Donec mattis nec orci ut porta. Donec pharetra convallis augue in tincidunt. Nullam eget felis urna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent tincidunt massa porta odio euismod, sit amet cursus quam sagittis. Mauris eget volutpat urna, sit amet ultricies est. Aenean dapibus lacinia risus, nec consectetur purus fringilla eu. Aenean eget congue mauris, id venenatis augue. Maecenas vulputate maximus vehicula.[/vc_column_text][/vc_column][/vc_row]</p>';

	$shb_full_width_id = sh_insert_page($pages['full_width']);
	update_option('shb_full_width_id',$shb_full_width_id);
	
	/* ----------------------------------------------------------------------------

	   Home I

	---------------------------------------------------------------------------- */
	$pages['home_i']['post_title'] = 'Home I';
	$pages['home_i']['sohohotel_page_layout'] = 'full-width-unboxed';
	$pages['home_i']['sohohotel_page_title'] = 'no-title';
	$pages['home_i']['post_content'] = '<p>[vc_row css=".vc_custom_1626770139067{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;background-color: #f2f2f3 !important;}" el_class="sohohotel-slideshow-wrapper-1"][vc_column css=".vc_custom_1626769422811{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][sohohotel_slideshow slide_full_screen="yes" slide_full_screen_offset="220px" slide_image_1="' . get_option('shb_demo_image_28') . '" slide_title_1="Luxurious Hotel Experience" slide_button_text_1="View Rooms" slide_button_url_1="' . get_permalink(get_option('shb_accommodation_i_2_columns_id')) . '" slide_overlay_color_1="#000" slide_overlay_opacity_1="0.5" slide_image_2="' . get_option('shb_demo_image_29') . '" slide_title_2="Convenient City Location" slide_button_text_2="Contact Us" slide_button_url_2="' . get_permalink(get_option('shb_contact_us_i_id')) . '" slide_align_2="left" slide_overlay_color_2="#000" slide_overlay_opacity_2="0.5"][shb_booking_form_1 hotel_selection=""][/vc_column][/vc_row][vc_row css=".vc_custom_1625649513890{margin-top: 0px !important;margin-bottom: 0px !important;border-top-width: 0px !important;border-bottom-width: 0px !important;padding-top: 80px !important;padding-bottom: 80px !important;background-color: #f2f2f3 !important;}"][vc_column css=".vc_custom_1625649524968{margin-top: 0px !important;margin-bottom: 0px !important;border-top-width: 0px !important;border-bottom-width: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"][sohohotel_title title="Welcome To Soho Hotel" size="35px" align="center"][vc_column_text el_class="sohohotel-section-wrapper-1"]</p>
<p style="text-align: center;">Nullam et aliquam leo. Pellentesque eget sapien massa. Cras ac est faucibus, auctor urna sed, mollis magna. Vestibulum a ante porttitor, tincidunt neque in, semper ipsum. Morbi hendrerit sed risus in venenatis.</p>
<p>[/vc_column_text][sohohotel_button text="Learn More" link="#" align="center" background_color="#b99470" text_color="#ffffff" margin="0px"][/vc_column][/vc_row][vc_row css=".vc_custom_1625649537047{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][vc_column css=".vc_custom_1610002239003{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][sohohotel_image_text type="2" image="' . get_option('shb_demo_image_1') . '" title="About Us" button_text="Learn More" button_url="#" button_target="2"]Maecenas feugiat mattis ipsum, vitae semper massa porttitor sit amet. Nulla mattis, urna et posuere ornare, neque leo dapibus ante, nec dignissim massa felis ad nulla donec porttitor nulla et tristique dignissim. [/sohohotel_image_text][/vc_column][/vc_row][vc_row css=".vc_custom_1625643442280{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 80px !important;padding-right: 0px !important;padding-bottom: 80px !important;padding-left: 0px !important;background-color: #f2f2f3 !important;}"][vc_column css=".vc_custom_1625647823481{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][vc_row_inner css=".vc_custom_1625647793106{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][vc_column_inner css=".vc_custom_1627546014696{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][sohohotel_title title="Our Rooms" size="28px" align="center"][vc_column_text el_class="sohohotel-section-wrapper-1"]</p>
<p style="text-align: center;"><span style="color: #656a70;">Maecenas feugiat mattis ipsum, vitae semper massa porttitor sit amet. Nulla mattis, urna et posuere ornare, neque leo dapibus ante, nec dignissim.</span></p>
<p>[/vc_column_text][shb_accommodation_carousel_1][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row css=".vc_custom_1612772834007{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][vc_column css=".vc_custom_1612772857022{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][sohohotel_single_testimonial image_url="' . get_option('shb_demo_image_3') . '" guest_name="Olivia Simons" align="image-left" testimonial_name="Olivia Simons"]We enjoyed our stay at soho hotel greatly, the staff were friendly and attentive to every one of our needs[/sohohotel_single_testimonial][/vc_column][/vc_row][vc_row css=".vc_custom_1626786421882{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 80px !important;padding-right: 0px !important;padding-bottom: 80px !important;padding-left: 0px !important;background-color: #f2f2f3 !important;}"][vc_column css=".vc_custom_1626786371291{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][sohohotel_title title="Special Offers" size="28px" align="center"][shb_offer_carousel posts_per_page="9"][/vc_column][/vc_row][vc_row css=".vc_custom_1610002295243{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;background-color: #f2f2f3 !important;}"][vc_column css=".vc_custom_1610002302971{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][sohohotel_call_to_action_video title="Book online today and look forward to a relaxing stay with us" text="Watch our video tour now and imagine yourself here" video_url="https://www.youtube.com/watch?v=9ATwmA0AZOM" background_url="' . get_option('shb_demo_image_2') . '"][/vc_column][/vc_row][vc_row css=".vc_custom_1627545659074{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 80px !important;padding-right: 0px !important;padding-bottom: 20px !important;padding-left: 0px !important;background-color: #f2f2f3 !important;}"][vc_column css=".vc_custom_1627545669829{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][vc_row_inner css=".vc_custom_1627545677853{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][vc_column_inner css=".vc_custom_1627545830089{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][sohohotel_title title="Hotel Facilities" size="28px" align="center"][sohohotel_icon_text icon1="fa-city" title1="City Views" content1="Proin felis mauris, fermentum non condimentum id, porttitor in nisl curabitur euismod convallis." icon2="fa-swimming-pool" title2="Swimming Pool" content2="Proin felis mauris, fermentum non condimentum id, porttitor in nisl curabitur euismod convallis." icon3="fa-compass" title3="South Facing" content3="Proin felis mauris, fermentum non condimentum id, porttitor in nisl curabitur euismod convallis." icon4="fa-subway" title4="Subway Nearby" content4="Proin felis mauris, fermentum non condimentum id, porttitor in nisl curabitur euismod convallis."][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]</p>
';
	
	$shb_home_i_id = sh_insert_page($pages['home_i']);
	update_option('shb_home_i_id',$shb_home_i_id);
	
	/* ----------------------------------------------------------------------------

	   Home II

	---------------------------------------------------------------------------- */
	$pages['home_ii']['post_title'] = 'Home II';
	$pages['home_ii']['sohohotel_page_layout'] = 'full-width-unboxed';
	$pages['home_ii']['sohohotel_page_title'] = 'no-title';
	$pages['home_ii']['post_content'] = '<p>[vc_row css=".vc_custom_1627371932264{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][vc_column css=".vc_custom_1627371940494{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][shb_booking_form_with_background_1 title_1="Bed & Breakfast" title_2="Luxury Full Service Apartments In A Great City Center Location" background_url="' . get_option('shb_demo_image_29') . '" offset="140px"][/vc_column][/vc_row][vc_row css=".vc_custom_1627296607495{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 40px !important;padding-right: 0px !important;padding-bottom: 80px !important;padding-left: 0px !important;background-color: #f2f2f3 !important;}"][vc_column][sohohotel_title title="Our Facilities" size="28px" align="center"][sohohotel_icon_text type="2" icon1="fa-city" title1="City Views" content1="Cras eu lorem a finibus velit nec felis mollis suscipit" icon2="fa-swimming-pool" title2="Swimming Pool" content2="Cras eu lorem a finibus velit nec felis mollis suscipit" icon3="fa-compass" title3="South Facing" content3="Cras eu lorem a finibus velit nec felis mollis suscipit" icon4="fa-subway" title4="Subway Nearby" content4="Cras eu lorem a finibus velit nec felis mollis suscipit"][/vc_column][/vc_row][vc_row css=".vc_custom_1627296553055{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][vc_column css=".vc_custom_1627296581441{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][sohohotel_image_text type="2" image="' . get_option('shb_demo_image_39') . '" title="About Us" button_text="Learn More" button_url="#" button_target="2"]Maecenas feugiat mattis ipsum, vitae semper massa porttitor sit amet. Nulla mattis, urna et posuere ornare, neque leo dapibus ante, nec dignissim massa felis ad nulla donec porttitor nulla et tristique dignissim. [/sohohotel_image_text][/vc_column][/vc_row][vc_row css=".vc_custom_1627296625592{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][vc_column css=".vc_custom_1627296635144{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][sohohotel_image_text image="' . get_option('shb_demo_image_40') . '" title="Great Location" button_text="Learn More" button_url="#" button_target="2"]Maecenas feugiat mattis ipsum, vitae semper massa porttitor sit amet. Nulla mattis, urna et posuere ornare, neque leo dapibus ante, nec dignissim massa felis ad nulla donec porttitor nulla et tristique dignissim. [/sohohotel_image_text][/vc_column][/vc_row][vc_row css=".vc_custom_1627546759409{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 75px !important;padding-right: 0px !important;padding-bottom: 80px !important;padding-left: 0px !important;background-color: #f2f2f3 !important;}"][vc_column css=".vc_custom_1627546198162{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][sohohotel_title title="Our Rooms" size="28px" align="center"][vc_column_text el_class="sohohotel-section-wrapper-1"]</p>
<p style="text-align: center;">Maecenas feugiat mattis ipsum, vitae semper massa porttitor sit amet. Nulla mattis, urna et posuere ornare, neque leo dapibus ante, nec dignissim.</p>
<p>[/vc_column_text][shb_accommodation_carousel_1 columns="3"][/vc_column][/vc_row][vc_row css=".vc_custom_1627297470652{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][vc_column css=".vc_custom_1627297480272{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][sohohotel_image_text type="2" image="' . get_option('shb_demo_image_41') . '" title="Photo Gallery" button_text="Open Gallery" button_url="#" button_icon="fa-images" gallery_ids="' . get_option('shb_demo_image_17') . ',' . get_option('shb_demo_image_18') . ',' . get_option('shb_demo_image_19') . ',' . get_option('shb_demo_image_20') . ',' . get_option('shb_demo_image_21') . ',' . get_option('shb_demo_image_22') . '" button_target="2"]Maecenas feugiat mattis ipsum, vitae semper massa porttitor sit amet. Nulla mattis, urna et posuere ornare, neque leo dapibus ante, nec dignissim massa felis ad nulla donec porttitor nulla et tristique dignissim. [/sohohotel_image_text][/vc_column][/vc_row][vc_row css=".vc_custom_1627297606085{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 80px !important;padding-right: 0px !important;padding-bottom: 80px !important;padding-left: 0px !important;background-color: #f2f2f3 !important;}"][vc_column css=".vc_custom_1627297553841{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][sohohotel_title title="Latest News" size="28px" align="center"][sohohotel_blog_carousel posts_per_page="12"][/vc_column][/vc_row][vc_row css=".vc_custom_1627297573620{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][vc_column css=".vc_custom_1627297583668{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][sohohotel_testimonials_carousel title="Reviews" type="dark" posts_per_page="3" background_url="' . get_option('shb_demo_image_42') . '"][/vc_column][/vc_row][vc_row css=".vc_custom_1627546801910{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 75px !important;padding-right: 0px !important;padding-bottom: 20px !important;padding-left: 0px !important;background-color: #f2f2f3 !important;}" el_class="sohohotel-section-wrapper-2"][vc_column css=".vc_custom_1627546293270{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][sohohotel_title title="Contact Us" size="28px" align="center"][contact-form-7 id="' . get_option('shb_contactform7_1') . '"][/vc_column][/vc_row]</p>
';

	$shb_home_ii_id = sh_insert_page($pages['home_ii']);
	update_option('shb_home_ii_id',$shb_home_ii_id);
	
	/* ----------------------------------------------------------------------------

	   Home III

	---------------------------------------------------------------------------- */
	$pages['home_iii']['post_title'] = 'Home III';
	$pages['home_iii']['sohohotel_page_layout'] = 'full-width-unboxed';
	$pages['home_iii']['sohohotel_page_title'] = 'no-title';
	$pages['home_iii']['post_content'] = '<p>[vc_row css=".vc_custom_1627375872073{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][vc_column css=".vc_custom_1627375879228{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][shb_booking_form_with_background_2 title_1="Service Apartments  From $2000 / Week" title_2="Luxury Full Service Apartments In A Great City Center Location" background_url="' . get_option('shb_demo_image_29') . '" offset="140px"][/vc_column][/vc_row][vc_row css=".vc_custom_1627299020358{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 75px !important;padding-right: 0px !important;padding-bottom: 10px !important;padding-left: 0px !important;background-color: #f2f2f3 !important;}"][vc_column css=".vc_custom_1627298966705{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][sohohotel_title title="Hotel Facilities" size="28px" align="center"][sohohotel_icon_text icon1="fa-binoculars" title1="Great Views" content1="Proin felis mauris, fermentum non condimentum id, porttitor in nisl curabitur euismod convallis." icon2="fa-swimming-pool" title2="Swimming Pool" content2="Proin felis mauris, fermentum non condimentum id, porttitor in nisl curabitur euismod convallis." icon3="fa-compass" title3="South Facing" content3="Proin felis mauris, fermentum non condimentum id, porttitor in nisl curabitur euismod convallis." icon4="fa-map-marked-alt" title4="Nice Location" content4="Proin felis mauris, fermentum non condimentum id, porttitor in nisl curabitur euismod convallis."][/vc_column][/vc_row][vc_row css=".vc_custom_1627296553055{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][vc_column css=".vc_custom_1627296581441{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][sohohotel_image_text type="2" image="' . get_option('shb_demo_image_39') . '" title="About Us" button_text="Learn More" button_url="#" button_target="2"]Maecenas feugiat mattis ipsum, vitae semper massa porttitor sit amet. Nulla mattis, urna et posuere ornare, neque leo dapibus ante, nec dignissim massa felis ad nulla donec porttitor nulla et tristique dignissim. [/sohohotel_image_text][/vc_column][/vc_row][vc_row css=".vc_custom_1627296625592{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][vc_column css=".vc_custom_1627296635144{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][sohohotel_image_text image="' . get_option('shb_demo_image_40') . '" title="Great Location" button_text="Learn More" button_url="#" button_target="2"]Maecenas feugiat mattis ipsum, vitae semper massa porttitor sit amet. Nulla mattis, urna et posuere ornare, neque leo dapibus ante, nec dignissim massa felis ad nulla donec porttitor nulla et tristique dignissim. [/sohohotel_image_text][/vc_column][/vc_row][vc_row css=".vc_custom_1627296625592{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][vc_column css=".vc_custom_1627296635144{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][sohohotel_image_text type="2" image="' . get_option('shb_demo_image_1') . '" title="Friendly Staff" button_text="Learn More" button_url="#" button_target="2"]Maecenas feugiat mattis ipsum, vitae semper massa porttitor sit amet. Nulla mattis, urna et posuere ornare, neque leo dapibus ante, nec dignissim massa felis ad nulla donec porttitor nulla et tristique dignissim. [/sohohotel_image_text][/vc_column][/vc_row][vc_row css=".vc_custom_1627546877796{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 75px !important;padding-right: 0px !important;padding-bottom: 80px !important;padding-left: 0px !important;background-color: #f2f2f3 !important;}"][vc_column css=".vc_custom_1627546496002{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][sohohotel_title title="Special Offers" size="28px" align="center"][shb_offer_carousel posts_per_page="9"][/vc_column][/vc_row][vc_row css=".vc_custom_1627300627774{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][vc_column css=".vc_custom_1627300635431{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][sohohotel_call_to_action_small text="Book online today and look forward to a relaxing stay with us" button_text="Book Now" button_url="#" background_url="' . get_option('shb_demo_image_43') . '"][/vc_column][/vc_row][vc_row css=".vc_custom_1627301958286{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 75px !important;padding-right: 0px !important;padding-bottom: 75px !important;padding-left: 0px !important;}" el_class="sohohotel-section-wrapper-3"][vc_column css=".vc_custom_1627301846551{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][sohohotel_title title="Hotel Information" size="28px" align="center"][vc_toggle title="My flight arrives early in the morning, what time can I check in?"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent et rhoncus neque. Maecenas enim nunc, dapibus in mattis eleifend, luctus et magna. Maecenas nunc est, posuere sed convallis tincidunt[/vc_toggle][vc_toggle title="Is breakfast included as standard with all rooms?"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent et rhoncus neque. Maecenas enim nunc, dapibus in mattis eleifend, luctus et magna. Maecenas nunc est, posuere sed convallis tincidunt[/vc_toggle][vc_toggle title="Do you provide a child day care service?"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent et rhoncus neque. Maecenas enim nunc, dapibus in mattis eleifend, luctus et magna. Maecenas nunc est, posuere sed convallis tincidunt[/vc_toggle][vc_toggle title="Are airport pickups available for late night flight arrivals?"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent et rhoncus neque. Maecenas enim nunc, dapibus in mattis eleifend, luctus et magna. Maecenas nunc est, posuere sed convallis tincidunt[/vc_toggle][/vc_column][/vc_row][vc_row css=".vc_custom_1627300642575{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][vc_column css=".vc_custom_1627300649718{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][sohohotel_call_to_action_video title="Book online today and look forward to a relaxing stay with us" text="Watch our video tour now and imagine yourself here" video_url="https://www.youtube.com/watch?v=9ATwmA0AZOM" background_url="' . get_option('shb_demo_image_44') . '"][/vc_column][/vc_row][vc_row css=".vc_custom_1627546902924{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 75px !important;padding-right: 0px !important;padding-bottom: 20px !important;padding-left: 0px !important;background-color: #f2f2f3 !important;}" el_class="sohohotel-section-wrapper-2"][vc_column css=".vc_custom_1627546542825{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][sohohotel_title title="Contact Us" size="28px" align="center"][contact-form-7 id="' . get_option('shb_contactform7_1') . '"][/vc_column][/vc_row]</p>
';
	
	$shb_home_iii_id = sh_insert_page($pages['home_iii']);
	update_option('shb_home_iii_id',$shb_home_iii_id);

	/* ----------------------------------------------------------------------------

	   Home IV

	---------------------------------------------------------------------------- */
	$pages['home_iv']['post_title'] = 'Home IV';
	$pages['home_iv']['sohohotel_page_layout'] = 'full-width-unboxed';
	$pages['home_iv']['sohohotel_page_title'] = 'no-title';
	$pages['home_iv']['post_content'] = '[vc_row el_class="sohohotel-slideshow-wrapper-1" css=".vc_custom_1627378064620{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;background-color: #f2f2f3 !important;}"][vc_column css=".vc_custom_1627378072507{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][sohohotel_slideshow slide_full_screen="yes" slide_full_screen_offset="220px" slide_image_1="' . get_option('shb_demo_image_45') . '" slide_title_1="Luxury Service Apartments" slide_button_text_1="View Apartments" slide_button_url_1="' . get_permalink(get_option('shb_accommodation_i_2_columns_id')) . '" slide_align_1="left" slide_overlay_color_1="#000" slide_overlay_opacity_1="0.5" slide_image_2="' . get_option('shb_demo_image_28') . '" slide_title_2="All Bills &amp; Fees Included" slide_button_text_2="View Apartments" slide_button_url_2="' . get_permalink(get_option('shb_accommodation_i_2_columns_id')) . '" slide_overlay_color_2="#000" slide_overlay_opacity_2="0.5"][shb_booking_form_1 hotel_selection="1"][/vc_column][/vc_row][vc_row css=".vc_custom_1627547013867{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 75px !important;padding-right: 0px !important;padding-bottom: 80px !important;padding-left: 0px !important;background-color: #f2f2f3 !important;}"][vc_column css=".vc_custom_1627546983812{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][sohohotel_title title="Our Rooms" size="28px" align="center"][vc_column_text el_class="sohohotel-section-wrapper-1"]
<p style="text-align: center;">Maecenas feugiat mattis ipsum, vitae semper massa porttitor sit amet. Nulla mattis, urna et posuere ornare, neque leo dapibus ante, nec dignissim.</p>
[/vc_column_text][shb_accommodation_carousel_1 columns="3"][/vc_column][/vc_row][vc_row css=".vc_custom_1627363869556{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][vc_column css=".vc_custom_1627363878821{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][sohohotel_video_text type="2" image="' . get_option('shb_demo_image_1') . '" title="The Neighborhood" button_text="Learn More" button_url="#" button_target="2" video_url="https://www.youtube.com/watch?v=9ATwmA0AZOM" text="Maecenas feugiat mattis ipsum, vitae semper massa porttitor sit amet. Nulla mattis, urna et posuere ornare, neque leo dapibus ante, nec dignissim massa felis ad nulla donec porttitor nulla et tristique dignissim."]Maecenas feugiat mattis ipsum, vitae semper massa porttitor sit amet. Nulla mattis, urna et posuere ornare, neque leo dapibus ante, nec dignissim massa felis ad nulla donec porttitor nulla et tristique dignissim. [/sohohotel_video_text][/vc_column][/vc_row][vc_row css=".vc_custom_1627547085739{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 75px !important;padding-right: 0px !important;padding-bottom: 15px !important;padding-left: 0px !important;background-color: #f2f2f3 !important;}"][vc_column css=".vc_custom_1627547077953{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][sohohotel_title title="Our Facilities" size="28px" align="center"][sohohotel_icon_text icon1="fa-binoculars" title1="Great Views" content1="Proin felis mauris, fermentum non condimentum id, porttitor in nisl curabitur euismod convallis." icon2="fa-swimming-pool" title2="Swimming Pool" content2="Proin felis mauris, fermentum non condimentum id, porttitor in nisl curabitur euismod convallis." icon3="fa-compass" title3="South Facing" content3="Proin felis mauris, fermentum non condimentum id, porttitor in nisl curabitur euismod convallis." icon4="fa-map-marked-alt" title4="Nice Location" content4="Proin felis mauris, fermentum non condimentum id, porttitor in nisl curabitur euismod convallis."][/vc_column][/vc_row][vc_row css=".vc_custom_1627296625592{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][vc_column css=".vc_custom_1627296635144{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][sohohotel_image_text image="' . get_option('shb_demo_image_3') . '" title="25% off family bookings in December" button_text="View Offer" button_url="#" button_icon="fa-tag" button_target="2"]Maecenas feugiat mattis ipsum, vitae semper massa porttitor sit amet. Nulla mattis, urna et posuere ornare, neque leo dapibus ante, nec dignissim massa felis ad nulla donec porttitor nulla et tristique dignissim. [/sohohotel_image_text][/vc_column][/vc_row][vc_row css=".vc_custom_1627297606085{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 80px !important;padding-right: 0px !important;padding-bottom: 80px !important;padding-left: 0px !important;background-color: #f2f2f3 !important;}"][vc_column css=".vc_custom_1627297553841{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][sohohotel_title title="Latest News" size="28px" align="center"][sohohotel_blog_carousel posts_per_page="12"][/vc_column][/vc_row][vc_row css=".vc_custom_1627364970910{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][vc_column css=".vc_custom_1627364978693{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][sohohotel_call_to_action_large title="Book online today and look forward to a relaxing stay with us" button_text="Book Now" button_url="#" background_url="' . get_option('shb_demo_image_42') . '"]Call Us On <a href="tel:1800-1111-2222">1800-1111-2222</a> or Email <a href="mailto:booking@website.com">booking@website.com</a>[/sohohotel_call_to_action_large][/vc_column][/vc_row][vc_row css=".vc_custom_1627876526737{padding-top: 40px !important;padding-bottom: 10px !important;background-color: #f2f2f3 !important;}"][vc_column][vc_row_inner fixed_width="true"][vc_column_inner][sohohotel_title title="Photo Gallery" size="28px" align="center"][vc_column_text]

[gallery link="file" size="full" ids="' . get_option('shb_demo_image_16') . ',' . get_option('shb_demo_image_17') . ',' . get_option('shb_demo_image_18') . ',' . get_option('shb_demo_image_19') . ',' . get_option('shb_demo_image_20') . ',' . get_option('shb_demo_image_21') . '"]

[/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]';
	
	$shb_home_iv_id = sh_insert_page($pages['home_iv']);
	update_option('shb_home_iv_id',$shb_home_iv_id);
	
	/* ----------------------------------------------------------------------------

	   Home V

	---------------------------------------------------------------------------- */
	$pages['home_v']['post_title'] = 'Home V';
	$pages['home_v']['sohohotel_page_layout'] = 'full-width-unboxed';
	$pages['home_v']['sohohotel_page_title'] = 'no-title';
	$pages['home_v']['post_content'] = '[vc_row css=".vc_custom_1627455486607{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][vc_column css=".vc_custom_1627455494308{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][shb_booking_form_with_background_3 title_1="Boutique Villa Near The Beach &amp; Town" title_2="5 minutes walk from the beach &amp; town center, book now!" background_url="' . get_option('shb_demo_image_28') . '" offset="140px"][/vc_column][/vc_row][vc_row css=".vc_custom_1627547379689{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 75px !important;padding-right: 0px !important;padding-bottom: 80px !important;padding-left: 0px !important;background-color: #f2f2f3 !important;}"][vc_column css=".vc_custom_1627547372849{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][sohohotel_title title="Our Rooms" size="28px" align="center"][vc_column_text el_class="sohohotel-section-wrapper-1"]
<p style="text-align: center;">Maecenas feugiat mattis ipsum, vitae semper massa porttitor sit amet. Nulla mattis, urna et posuere ornare, neque leo dapibus ante, nec dignissim.</p>
[/vc_column_text][shb_accommodation_carousel_1][/vc_column][/vc_row][vc_row css=".vc_custom_1627296553055{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][vc_column css=".vc_custom_1627296581441{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][sohohotel_image_text type="2" image="' . get_option('shb_demo_image_1') . '" title="The Neighborhood" button_text="Learn More" button_url="#" button_target="2"]Maecenas feugiat mattis ipsum, vitae semper massa porttitor sit amet. Nulla mattis, urna et posuere ornare, neque leo dapibus ante, nec dignissim massa felis ad nulla donec porttitor nulla et tristique dignissim. [/sohohotel_image_text][/vc_column][/vc_row][vc_row css=".vc_custom_1627296625592{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][vc_column css=".vc_custom_1627296635144{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][sohohotel_image_text image="' . get_option('shb_demo_image_40') . '" title="Comfortable Home" button_text="Learn More" button_url="#" button_target="2"]Maecenas feugiat mattis ipsum, vitae semper massa porttitor sit amet. Nulla mattis, urna et posuere ornare, neque leo dapibus ante, nec dignissim massa felis ad nulla donec porttitor nulla et tristique dignissim. [/sohohotel_image_text][/vc_column][/vc_row][vc_row css=".vc_custom_1627547225053{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 75px !important;padding-right: 0px !important;padding-bottom: 80px !important;padding-left: 0px !important;background-color: #f2f2f3 !important;}"][vc_column css=".vc_custom_1627547216241{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][sohohotel_title title="Our Facilities" size="28px" align="center"][sohohotel_icon_text type="2" icon1="fa-city" title1="City Views" content1="Cras eu lorem a finibus velit nec felis mollis suscipit" icon2="fa-swimming-pool" title2="Swimming Pool" content2="Cras eu lorem a finibus velit nec felis mollis suscipit" icon3="fa-compass" title3="South Facing" content3="Cras eu lorem a finibus velit nec felis mollis suscipit" icon4="fa-subway" title4="Subway Nearby" content4="Cras eu lorem a finibus velit nec felis mollis suscipit"][/vc_column][/vc_row][vc_row css=".vc_custom_1627297470652{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][vc_column css=".vc_custom_1627297480272{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][sohohotel_image_text type="2" image="' . get_option('shb_demo_image_39') . '" title="Photo Gallery" button_text="Open Gallery" button_url="#" button_icon="fa-images" gallery_ids="' . get_option('shb_demo_image_17') . ',' . get_option('shb_demo_image_18') . ',' . get_option('shb_demo_image_19') . ',' . get_option('shb_demo_image_20') . ',' . get_option('shb_demo_image_21') . '" button_target="2"]Maecenas feugiat mattis ipsum, vitae semper massa porttitor sit amet. Nulla mattis, urna et posuere ornare, neque leo dapibus ante, nec dignissim massa felis ad nulla donec porttitor nulla et tristique dignissim. [/sohohotel_image_text][/vc_column][/vc_row][vc_row css=".vc_custom_1627297606085{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 80px !important;padding-right: 0px !important;padding-bottom: 80px !important;padding-left: 0px !important;background-color: #f2f2f3 !important;}"][vc_column css=".vc_custom_1627297553841{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][sohohotel_title title="Special Offers" size="28px" align="center"][shb_offer_carousel posts_per_page="9"][/vc_column][/vc_row][vc_row css=".vc_custom_1627297573620{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][vc_column css=".vc_custom_1627297583668{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][sohohotel_testimonials_carousel title="Reviews" type="dark" posts_per_page="3" background_url="' . get_option('shb_demo_image_42') . '"][/vc_column][/vc_row][vc_row css=".vc_custom_1627875760726{padding-top: 40px !important;padding-bottom: 10px !important;background-color: #f2f2f3 !important;}" el_class="sohohotel-section-wrapper-2"][vc_column][vc_row_inner fixed_width="true"][vc_column_inner][sohohotel_title title="Photo Gallery" size="28px" align="center"][vc_column_text]

[gallery link="file" size="full" ids="' . get_option('shb_demo_image_16') . ',' . get_option('shb_demo_image_17') . ',' . get_option('shb_demo_image_18') . ',' . get_option('shb_demo_image_19') . ',' . get_option('shb_demo_image_20') . ',' . get_option('shb_demo_image_21') . '"]

[/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]';
	
	$shb_home_v_id = sh_insert_page($pages['home_v']);
	update_option('shb_home_v_id',$shb_home_v_id);
	
	/* ----------------------------------------------------------------------------

	   Home VI

	---------------------------------------------------------------------------- */
	$pages['home_vi']['post_title'] = 'Home VI';
	$pages['home_vi']['sohohotel_page_layout'] = 'full-width-unboxed';
	$pages['home_vi']['sohohotel_page_title'] = 'no-title';
	$pages['home_vi']['post_content'] = '<p>[vc_row el_class="sohohotel-slideshow-wrapper-1" css=".vc_custom_1627378903950{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;background-color: #f2f2f3 !important;}"][vc_column css=".vc_custom_1627378912257{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][sohohotel_slideshow slide_full_screen="yes" slide_full_screen_offset="220px" slide_image_1="' . get_option('shb_demo_image_46') . '" slide_title_1="Downtown Hotel" slide_text_1="Our Hotel offers you an unparalleled luxury experience, we have top<br />
quality customer service and strive to meet every need you have" slide_button_text_1="View Rooms" slide_button_url_1="' . get_permalink(get_option('shb_accommodation_i_2_columns_id')) . '" slide_overlay_color_1="#000" slide_overlay_opacity_1="0.5" slide_image_2="' . get_option('shb_demo_image_45') . '" slide_title_2="Incredible Views" slide_text_2="Enjoy incredible views over the east river and downtown from the<br />
comfort of your room, or in the rooftop cocktail bar" slide_button_text_2="View Rooms" slide_button_url_2="' . get_permalink(get_option('shb_accommodation_i_2_columns_id')) . '" slide_align_2="left" slide_overlay_color_2="#000" slide_overlay_opacity_2="0.5"][shb_booking_form_1 hotel_selection="1"][/vc_column][/vc_row][vc_row css=".vc_custom_1627547735641{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 40px !important;padding-right: 0px !important;padding-bottom: 40px !important;padding-left: 0px !important;background-color: #f2f2f3 !important;}"][vc_column][vc_row_inner fixed_width="true"][vc_column_inner css=".vc_custom_1627368268007{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][sohohotel_title title="Our Rooms" size="28px" align="center"][vc_column_text el_class="sohohotel-section-wrapper-1"]</p>
<p style="text-align: center;">Maecenas feugiat mattis ipsum, vitae semper massa porttitor sit amet. Nulla mattis, urna et posuere ornare, neque leo dapibus ante, nec dignissim.</p>
<p>[/vc_column_text][shb_accommodation_listing_3 columns="2" posts_per_page="4" hide_pagination="2" hide_filter="2" hide_order="2"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row css=".vc_custom_1627367474142{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][vc_column css=".vc_custom_1627367481980{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][sohohotel_call_to_action_large title="Book online today and look forward to a relaxing stay with us" button_text="Book Now" button_url="#" background_url="' . get_option('shb_demo_image_42') . '"]Call Us On <a href="tel:1800-1111-2222">1800-1111-2222</a> or Email <a href="mailto:booking@website.com">booking@website.com</a>[/sohohotel_call_to_action_large][/vc_column][/vc_row][vc_row css=".vc_custom_1627299020358{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 75px !important;padding-right: 0px !important;padding-bottom: 10px !important;padding-left: 0px !important;background-color: #f2f2f3 !important;}"][vc_column css=".vc_custom_1627298966705{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][sohohotel_title title="Hotel Facilities" size="28px" align="center"][sohohotel_icon_text icon1="fa-binoculars" title1="Great Views" content1="Proin felis mauris, fermentum non condimentum id, porttitor in nisl curabitur euismod convallis." icon2="fa-swimming-pool" title2="Swimming Pool" content2="Proin felis mauris, fermentum non condimentum id, porttitor in nisl curabitur euismod convallis." icon3="fa-compass" title3="South Facing" content3="Proin felis mauris, fermentum non condimentum id, porttitor in nisl curabitur euismod convallis." icon4="fa-map-marked-alt" title4="Nice Location" content4="Proin felis mauris, fermentum non condimentum id, porttitor in nisl curabitur euismod convallis."][/vc_column][/vc_row][vc_row css=".vc_custom_1627300627774{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][vc_column css=".vc_custom_1627300635431{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][sohohotel_call_to_action_small text="Book online today and look forward to a relaxing stay with us" button_text="Book Now" button_url="#" background_url="' . get_option('shb_demo_image_43') . '"][/vc_column][/vc_row][vc_row css=".vc_custom_1627547787592{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 75px !important;padding-right: 0px !important;padding-bottom: 80px !important;padding-left: 0px !important;background-color: #f2f2f3 !important;}"][vc_column css=".vc_custom_1627547780080{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][sohohotel_title title="Special Offers" size="28px" align="center"][shb_offer_carousel posts_per_page="9"][/vc_column][/vc_row][vc_row css=".vc_custom_1627367604203{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][vc_column css=".vc_custom_1627367611967{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][sohohotel_single_testimonial image_url="' . get_option('shb_demo_image_3') . '" guest_name="Olivia Simons" align="image-left"]We enjoyed our stay at soho hotel greatly, the staff were friendly and attentive to every one of our needs[/sohohotel_single_testimonial][/vc_column][/vc_row][vc_row css=".vc_custom_1627547857591{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 75px !important;padding-right: 0px !important;padding-bottom: 20px !important;padding-left: 0px !important;background-color: #f2f2f3 !important;}" el_class="sohohotel-section-wrapper-2"][vc_column css=".vc_custom_1627547850461{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][sohohotel_title title="Contact Us" size="28px" align="center"][contact-form-7 id="' . get_option('shb_contactform7_1') . '"][/vc_column][/vc_row]</p>
';
	
	$shb_home_vi_id = sh_insert_page($pages['home_vi']);
	update_option('shb_home_vi_id',$shb_home_vi_id);
	
	/* ----------------------------------------------------------------------------

	   Left Sidebar

	---------------------------------------------------------------------------- */
	$pages['left_sidebar']['post_title'] = 'Left Sidebar';
	$pages['left_sidebar']['sohohotel_page_layout'] = 'left-sidebar';
	$pages['left_sidebar']['sohohotel_page_title'] = 'standard-title';
	$pages['left_sidebar']['post_content'] = '<p>[vc_row css=".vc_custom_1626074544662{margin-bottom: 40px !important;}"][vc_column][vc_column_text]</p>
<h1>H1 Tag</h1>
<p>Nullam erat felis, pellentesque non egestas nec, <a href="#">vulputate id odio</a>. Donec mattis nec orci ut porta. Donec pharetra <a href="#">convallis augue</a> in tincidunt. Nullam eget felis urna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent tincidunt massa porta odio euismod, sit amet cursus quam sagittis. Mauris eget volutpat urna, sit amet ultricies est. Aenean dapibus lacinia risus, nec consectetur purus fringilla eu. Aenean eget congue mauris, id venenatis augue. Maecenas vulputate maximus vehicula.</p>
<h2>H2 Tag</h2>
<p>Nullam erat felis, pellentesque non egestas nec, vulputate id odio. Donec mattis nec orci ut porta. Donec pharetra convallis augue in tincidunt. Nullam eget felis urna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent tincidunt massa porta odio euismod, sit amet cursus quam sagittis. Mauris eget volutpat urna, sit amet ultricies est. Aenean dapibus lacinia risus, nec consectetur purus fringilla eu. Aenean eget congue mauris, id venenatis augue. Maecenas vulputate maximus vehicula.</p>
<h3>H3 Tag</h3>
<p>Nullam erat felis, pellentesque non egestas nec, vulputate id odio. Donec mattis nec orci ut porta. Donec pharetra convallis augue in tincidunt. Nullam eget felis urna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent tincidunt massa porta odio euismod, sit amet cursus quam sagittis. Mauris eget volutpat urna, sit amet ultricies est. Aenean dapibus lacinia risus, nec consectetur purus fringilla eu. Aenean eget congue mauris, id venenatis augue. Maecenas vulputate maximus vehicula.</p>
<h4>H4 Tag</h4>
<p>Nullam erat felis, pellentesque non egestas nec, vulputate id odio. Donec mattis nec orci ut porta. Donec pharetra convallis augue in tincidunt. Nullam eget felis urna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent tincidunt massa porta odio euismod, sit amet cursus quam sagittis. Mauris eget volutpat urna, sit amet ultricies est. Aenean dapibus lacinia risus, nec consectetur purus fringilla eu. Aenean eget congue mauris, id venenatis augue. Maecenas vulputate maximus vehicula.</p>
<h5>H5 Tag</h5>
<p>Nullam erat felis, pellentesque non egestas nec, vulputate id odio. Donec mattis nec orci ut porta. Donec pharetra convallis augue in tincidunt. Nullam eget felis urna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent tincidunt massa porta odio euismod, sit amet cursus quam sagittis. Mauris eget volutpat urna, sit amet ultricies est. Aenean dapibus lacinia risus, nec consectetur purus fringilla eu. Aenean eget congue mauris, id venenatis augue. Maecenas vulputate maximus vehicula.</p>
<h6>H6 Tag</h6>
<p>Nullam erat felis, pellentesque non egestas nec, vulputate id odio. Donec mattis nec orci ut porta. Donec pharetra convallis augue in tincidunt. Nullam eget felis urna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent tincidunt massa porta odio euismod, sit amet cursus quam sagittis. Mauris eget volutpat urna, sit amet ultricies est. Aenean dapibus lacinia risus, nec consectetur purus fringilla eu. Aenean eget congue mauris, id venenatis augue. Maecenas vulputate maximus vehicula.[/vc_column_text][/vc_column][/vc_row]</p>
';

	$shb_left_sidebar_id = sh_insert_page($pages['left_sidebar']);
	update_option('shb_left_sidebar_id',$shb_left_sidebar_id);
	
	/* ----------------------------------------------------------------------------

	   Our Hotels I

	---------------------------------------------------------------------------- */
	$pages['our_hotels_i']['post_title'] = 'Our Hotels I';
	$pages['our_hotels_i']['sohohotel_page_layout'] = 'full-width';
	$pages['our_hotels_i']['sohohotel_page_title'] = 'standard-title';
	$pages['our_hotels_i']['post_content'] = '<p>[vc_row][vc_column][sohohotel_hotel_listing columns="3" title_1="Los Angeles" link_1="#" image_1="' . get_option('shb_demo_image_16') . '" title_2="New York" link_2="#" image_2="' . get_option('shb_demo_image_17') . '" title_3="San Francisco" link_3="#" image_3="' . get_option('shb_demo_image_18') . '"][sohohotel_hotel_listing columns="3" title_1="Miami" link_1="#" image_1="' . get_option('shb_demo_image_21') . '" title_2="Chicago" link_2="#" image_2="' . get_option('shb_demo_image_19') . '" title_3="Detroit" link_3="#" image_3="' . get_option('shb_demo_image_20') . '"][vc_empty_space height="20px"][/vc_column][/vc_row]</p>
';

	$shb_our_hotels_i_id = sh_insert_page($pages['our_hotels_i']);
	update_option('shb_our_hotels_i_id',$shb_our_hotels_i_id);
	
	/* ----------------------------------------------------------------------------

	   Our Hotels II

	---------------------------------------------------------------------------- */
	$pages['our_hotels_ii']['post_title'] = 'Our Hotels II';
	$pages['our_hotels_ii']['sohohotel_page_layout'] = 'full-width';
	$pages['our_hotels_ii']['sohohotel_page_title'] = 'standard-title';
	$pages['our_hotels_ii']['post_content'] = '<p>[vc_row][vc_column][sohohotel_hotel_listing title_1="Los Angeles" link_1="#" image_1="' . get_option('shb_demo_image_16') . '" title_2="New York" link_2="#" image_2="' . get_option('shb_demo_image_17') . '"][sohohotel_hotel_listing title_1="Miami" link_1="#" image_1="' . get_option('shb_demo_image_18') . '" title_2="Chicago" link_2="#" image_2="' . get_option('shb_demo_image_19') . '"][vc_empty_space height="20px"][/vc_column][/vc_row]</p>

';

	$shb_our_hotels_ii_id = sh_insert_page($pages['our_hotels_ii']);
	update_option('shb_our_hotels_ii_id',$shb_our_hotels_ii_id);
	
	/* ----------------------------------------------------------------------------

	   Photo Gallery I

	---------------------------------------------------------------------------- */
	$pages['photo_gallery_i']['post_title'] = 'Photo Gallery I';
	$pages['photo_gallery_i']['sohohotel_page_layout'] = 'full-width';
	$pages['photo_gallery_i']['sohohotel_page_title'] = 'standard-title';
	$pages['photo_gallery_i']['post_content'] = '<p>[vc_row][vc_column][vc_column_text][gallery link="file" size="full" columns="2" ids="' . get_option('shb_demo_image_16') . ',' . get_option('shb_demo_image_17') . ',' . get_option('shb_demo_image_18') . ',' . get_option('shb_demo_image_19') . ',' . get_option('shb_demo_image_20') . ',' . get_option('shb_demo_image_21') . '"][/vc_column_text][vc_empty_space height="30px"][/vc_column][/vc_row]</p>
';
	
	$shb_photo_gallery_i_id = sh_insert_page($pages['photo_gallery_i']);
	update_option('shb_photo_gallery_i_id',$shb_photo_gallery_i_id);
	
	/* ----------------------------------------------------------------------------

	   Photo Gallery II

	---------------------------------------------------------------------------- */
	$pages['photo_gallery_ii']['post_title'] = 'Photo Gallery II';
	$pages['photo_gallery_ii']['sohohotel_page_layout'] = 'full-width';
	$pages['photo_gallery_ii']['sohohotel_page_title'] = 'standard-title';
	$pages['photo_gallery_ii']['post_content'] = '[vc_row][vc_column][vc_column_text]

[gallery link="file" size="full" ids="' . get_option('shb_demo_image_16') . ',' . get_option('shb_demo_image_17') . ',' . get_option('shb_demo_image_18') . ',' . get_option('shb_demo_image_19') . ',' . get_option('shb_demo_image_20') . ',' . get_option('shb_demo_image_21') . ',' . get_option('shb_demo_image_17') . ',' . get_option('shb_demo_image_16') . ',' . get_option('shb_demo_image_18') . '"]

[/vc_column_text][vc_empty_space height="30px"][/vc_column][/vc_row]';

	$shb_photo_gallery_ii_id = sh_insert_page($pages['photo_gallery_ii']);
	update_option('shb_photo_gallery_ii_id',$shb_photo_gallery_ii_id);
	
	/* ----------------------------------------------------------------------------

	   Photo Gallery III

	---------------------------------------------------------------------------- */
	$pages['photo_gallery_iii']['post_title'] = 'Photo Gallery III';
	$pages['photo_gallery_iii']['sohohotel_page_layout'] = 'full-width';
	$pages['photo_gallery_iii']['sohohotel_page_title'] = 'standard-title';
	$pages['photo_gallery_iii']['post_content'] = '<p>[vc_row][vc_column][vc_column_text][gallery link="file" size="full" columns="4" ids="' . get_option('shb_demo_image_16') . ',' . get_option('shb_demo_image_17') . ',' . get_option('shb_demo_image_18') . ',' . get_option('shb_demo_image_19') . ',' . get_option('shb_demo_image_20') . ',' . get_option('shb_demo_image_21') . ',' . get_option('shb_demo_image_17') . ',' . get_option('shb_demo_image_16') . ',' . get_option('shb_demo_image_18') . ',' . get_option('shb_demo_image_19') . ',' . get_option('shb_demo_image_20') . ',' . get_option('shb_demo_image_21') . '"][/vc_column_text][vc_empty_space height="30px"][/vc_column][/vc_row]</p>
';
	
	$shb_photo_gallery_iii_id = sh_insert_page($pages['photo_gallery_iii']);
	update_option('shb_photo_gallery_iii_id',$shb_photo_gallery_iii_id);
	
	/* ----------------------------------------------------------------------------

	   Right Sidebar

	---------------------------------------------------------------------------- */
	$pages['right_sidebar']['post_title'] = 'Right Sidebar';
	$pages['right_sidebar']['sohohotel_page_layout'] = 'right-sidebar';
	$pages['right_sidebar']['sohohotel_page_title'] = 'standard-title';
	$pages['right_sidebar']['post_content'] = '<p>[vc_row css=".vc_custom_1626074544662{margin-bottom: 40px !important;}"][vc_column][vc_column_text]</p>
<h1>H1 Tag</h1>
<p>Nullam erat felis, pellentesque non egestas nec, <a href="#">vulputate id odio</a>. Donec mattis nec orci ut porta. Donec pharetra <a href="#">convallis augue</a> in tincidunt. Nullam eget felis urna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent tincidunt massa porta odio euismod, sit amet cursus quam sagittis. Mauris eget volutpat urna, sit amet ultricies est. Aenean dapibus lacinia risus, nec consectetur purus fringilla eu. Aenean eget congue mauris, id venenatis augue. Maecenas vulputate maximus vehicula.</p>
<h2>H2 Tag</h2>
<p>Nullam erat felis, pellentesque non egestas nec, vulputate id odio. Donec mattis nec orci ut porta. Donec pharetra convallis augue in tincidunt. Nullam eget felis urna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent tincidunt massa porta odio euismod, sit amet cursus quam sagittis. Mauris eget volutpat urna, sit amet ultricies est. Aenean dapibus lacinia risus, nec consectetur purus fringilla eu. Aenean eget congue mauris, id venenatis augue. Maecenas vulputate maximus vehicula.</p>
<h3>H3 Tag</h3>
<p>Nullam erat felis, pellentesque non egestas nec, vulputate id odio. Donec mattis nec orci ut porta. Donec pharetra convallis augue in tincidunt. Nullam eget felis urna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent tincidunt massa porta odio euismod, sit amet cursus quam sagittis. Mauris eget volutpat urna, sit amet ultricies est. Aenean dapibus lacinia risus, nec consectetur purus fringilla eu. Aenean eget congue mauris, id venenatis augue. Maecenas vulputate maximus vehicula.</p>
<h4>H4 Tag</h4>
<p>Nullam erat felis, pellentesque non egestas nec, vulputate id odio. Donec mattis nec orci ut porta. Donec pharetra convallis augue in tincidunt. Nullam eget felis urna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent tincidunt massa porta odio euismod, sit amet cursus quam sagittis. Mauris eget volutpat urna, sit amet ultricies est. Aenean dapibus lacinia risus, nec consectetur purus fringilla eu. Aenean eget congue mauris, id venenatis augue. Maecenas vulputate maximus vehicula.</p>
<h5>H5 Tag</h5>
<p>Nullam erat felis, pellentesque non egestas nec, vulputate id odio. Donec mattis nec orci ut porta. Donec pharetra convallis augue in tincidunt. Nullam eget felis urna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent tincidunt massa porta odio euismod, sit amet cursus quam sagittis. Mauris eget volutpat urna, sit amet ultricies est. Aenean dapibus lacinia risus, nec consectetur purus fringilla eu. Aenean eget congue mauris, id venenatis augue. Maecenas vulputate maximus vehicula.</p>
<h6>H6 Tag</h6>
<p>Nullam erat felis, pellentesque non egestas nec, vulputate id odio. Donec mattis nec orci ut porta. Donec pharetra convallis augue in tincidunt. Nullam eget felis urna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent tincidunt massa porta odio euismod, sit amet cursus quam sagittis. Mauris eget volutpat urna, sit amet ultricies est. Aenean dapibus lacinia risus, nec consectetur purus fringilla eu. Aenean eget congue mauris, id venenatis augue. Maecenas vulputate maximus vehicula.[/vc_column_text][/vc_column][/vc_row]</p>
';

	$shb_right_sidebar_id = sh_insert_page($pages['right_sidebar']);
	update_option('shb_right_sidebar_id',$shb_right_sidebar_id);
	
	/* ----------------------------------------------------------------------------

	   Testimonials

	---------------------------------------------------------------------------- */
	$pages['testimonials']['post_title'] = 'Testimonials';
	$pages['testimonials']['sohohotel_page_layout'] = 'full-width';
	$pages['testimonials']['sohohotel_page_title'] = 'standard-title';
	$pages['testimonials']['post_content'] = '<p>[vc_row][vc_column][sohohotel_testimonials_page posts_per_page="3"][vc_empty_space height="30px"][/vc_column][/vc_row]</p>';

	$shb_testimonials_id = sh_insert_page($pages['testimonials']);
	update_option('shb_testimonials_id',$shb_testimonials_id);
	
}

function sh_import_posts() {
	
	// Add categories
	$category_city_breaks = wp_create_category( 'City Breaks' );
	$category_cocktail_party = wp_create_category( 'Cocktail Party' );
	$category_fine_dining = wp_create_category( 'Fine Dining' );
	$category_hotels = wp_create_category( 'Hotels' );
	$category_luxury_spas = wp_create_category( 'Luxury Spas' );
	$category_travel = wp_create_category( 'Travel' );
	
	// Add tags
	$tag_accommodation = wp_insert_term( 'Accommodation', 'post_tag' );
	$tag_beaches = wp_insert_term( 'Beaches', 'post_tag' );
	$tag_best_restaurants = wp_insert_term( 'Best Restaurants', 'post_tag' );
	$tag_cities = wp_insert_term( 'Cities', 'post_tag' );
	$tag_cocktail_party = wp_insert_term( 'Cocktail Party', 'post_tag' );
	$tag_hotel = wp_insert_term( 'Hotel', 'post_tag' );
	$tag_luxury = wp_insert_term( 'Luxury', 'post_tag' );
	$tag_mountain_resort = wp_insert_term( 'Mountain Resort', 'post_tag' );
	$tag_relaxing_breaks = wp_insert_term( 'Relaxing Breaks', 'post_tag' );
	$tag_spa = wp_insert_term( 'Spa', 'post_tag' );
	
	$sohohotel_blog_single_image = wp_get_attachment_image_src(get_option('shb_demo_image_22'),'full-size');
	
	$post_content = '<p>[vc_row][vc_column][vc_column_text]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sollicitudin facilisis consequat. Sed in est sed dui maximus tempor. Donec ullamcorper volutpat dolor ac posuere. Vivamus commodo lacus ac ornare tincidunt. Vivamus in lectus orci. Fusce sit amet consectetur nulla. Maecenas non arcu neque. Nam iaculis, nulla pulvinar bibendum accumsan, nulla sapien vestibulum mi, nec interdum velit quam suscipit eros. In vitae lorem mi. Ut nec leo nec augue congue bibendum. Maecenas rutrum nibh gravida enim fermentum consectetur. Quisque semper ultricies finibus. Pellentesque lobortis ante a mi vestibulum molestie.[/vc_column_text][vc_column_text]</p>
<blockquote><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et mauris quis quam ultrices ullamcorper eu id libero. Nunc egestas eget tellus id porttitor. Phasellus commodo quis neque efficitur sodales. Donec lacinia nibh quis urna tristique lobortis. Ut malesuada dictum ipsum, sed porttitor augue rhoncus ac.</p></blockquote>
<p>[/vc_column_text][vc_empty_space height="10px"][vc_column_text]<img class="aligncenter wp-image-213 size-full" src="' . $sohohotel_blog_single_image[0] . '" alt="" width="1560" height="920" />[/vc_column_text][vc_empty_space height="40px"][vc_column_text]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sollicitudin facilisis consequat. Sed in est sed dui maximus tempor. Donec ullamcorper volutpat dolor ac posuere. Vivamus commodo lacus ac ornare tincidunt. Vivamus in lectus orci. Fusce sit amet consectetur nulla. Maecenas non arcu neque. Nam iaculis, nulla pulvinar bibendum accumsan, nulla sapien vestibulum mi, nec interdum velit quam suscipit eros. In vitae lorem mi. Ut nec leo nec augue congue bibendum. Maecenas rutrum nibh gravida enim fermentum consectetur. Quisque semper ultricies finibus. Pellentesque lobortis ante a mi vestibulum molestie.</p>
<p>Donec vel porttitor est, eget fermentum metus. Sed blandit, purus at sodales placerat, ex ante sodales felis, id gravida mauris nisl rhoncus diam. Quisque hendrerit varius arcu, non dignissim diam egestas eget. Integer id magna eu urna eleifend luctus. Donec fermentum eros non lobortis placerat. Aenean lacus sapien, pharetra tempor enim eget, interdum interdum neque. Aliquam mattis lacinia velit, sed semper mi ornare non. Aenean vulputate vulputate diam. Maecenas vitae arcu vitae sem tincidunt blandit et vel augue. Curabitur ut tortor vestibulum, mollis purus eget, faucibus erat.[/vc_column_text][/vc_column][/vc_row]</p>';
	
	$post_excerpt = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sollicitudin facilisis consequat. Sed in est sed dui maximus tempor. Donec ullamcorper volutpat dolor ac posuere. Vivamus commodo lacus ac ornare tincidunt. Vivamus in lectus orci.';
	
	$data = array(
		0 => array(
			'post_title' => 'Celebrating 20th Anniversary Of Soho Hotel',
			'post_content' => $post_content,
			'post_category' => array($category_city_breaks),
			'tags_input' => array($tag_accommodation['term_id']),
			'featured_image' => get_option('shb_demo_image_16'),
			'post_excerpt' => $post_excerpt
		),
		1 => array(
			'post_title' => 'Our New York Hotel Has Been Newly Renovated!',
			'post_content' => $post_content,
			'post_category' => array($category_cocktail_party),
			'tags_input' => array($tag_beaches['term_id']),
			'featured_image' => get_option('shb_demo_image_21'),
			'post_excerpt' => $post_excerpt
		),
		2 => array(
			'post_title' => 'All Rooms Now Equipped With High Speed Wifi',
			'post_content' => $post_content,
			'post_category' => array($category_fine_dining),
			'tags_input' => array($tag_best_restaurants['term_id']),
			'featured_image' => get_option('shb_demo_image_20'),
			'post_excerpt' => $post_excerpt
		),
		3 => array(
			'post_title' => 'Our New Soho Hotel Miami Beach Branch Is Open!',
			'post_content' => $post_content,
			'post_category' => array($category_hotels),
			'tags_input' => array($tag_cities['term_id']),
			'featured_image' => get_option('shb_demo_image_19'),
			'post_excerpt' => $post_excerpt
		),
		4 => array(
			'post_title' => 'Cocktail Party For All Guests This Saturday',
			'post_content' => $post_content,
			'post_category' => array($category_luxury_spas),
			'tags_input' => array($tag_cocktail_party['term_id']),
			'featured_image' => get_option('shb_demo_image_18'),
			'post_excerpt' => $post_excerpt
		),
		5 => array(
			'post_title' => 'This Month Only 10% Discounts On Fridays',
			'post_content' => $post_content,
			'post_category' => array($category_travel),
			'tags_input' => array($tag_hotel['term_id']),
			'featured_image' => get_option('shb_demo_image_17'),
			'post_excerpt' => $post_excerpt
		),
		6 => array(
			'post_title' => 'Celebrating 20th Anniversary Of Soho Hotel',
			'post_content' => $post_content,
			'post_category' => array($category_city_breaks),
			'tags_input' => array($tag_luxury['term_id']),
			'featured_image' => get_option('shb_demo_image_16'),
			'post_excerpt' => $post_excerpt
		)
	);
	
	foreach($data as $val) {
		$post_id = sh_insert_post($val);
	}	
	
}

function sh_insert_post($data) {
	
	$post_id = wp_insert_post(array (
	   'post_type' => 'post',
	   'post_title' => $data['post_title'],
	   'post_content' => $data['post_content'],
	   'post_status' => 'publish',
	   'comment_status' => 'open',
	   'ping_status' => 'closed',
	   'post_category' => $data['post_category'],
	   'tags_input' => $data['tags_input']
	));
	
	add_post_meta($post_id, 'sohohotel_post_excerpt', $data['post_excerpt'], true);
	
	set_post_thumbnail( $post_id, $data['featured_image'] );
	
	return $post_id;
	
}

function sh_import_testimonials() {
	
	$post_content = 'Sed sollicitudin, sem id imperdiet semper, enim ante tempor sapien, a commodo nisl dolor at elit. Aliquam suscipit egestas velit at elementum. Nulla sit amet ligula at dolor rhoncus rhoncus. Aenean molestie est tortor. Mauris dictum magna sit amet velit ornare.
<!--more-->
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque risus tortor, ultricies vitae venenatis id, convallis ut tellus. Integer at elit tellus. Suspendisse potenti. Vestibulum eleifend mauris ac massa vulputate porta. Curabitur diam massa, tincidunt eu cursus sit amet, rhoncus in orci. Curabitur fermentum vehicula urna. Sed mattis nulla eget felis rutrum viverra. Vestibulum hendrerit tempor lacus ut venenatis. Donec ac sollicitudin mi, sit amet posuere ante. Vestibulum imperdiet maximus cursus.

Sed dignissim velit lorem, vel rutrum sem viverra non. Praesent venenatis dolor neque, eu laoreet neque scelerisque non. Ut aliquam, nisl ac porttitor tristique, ipsum nisl rhoncus nunc, quis porta eros purus sed eros. Phasellus sapien eros, pretium et lorem et, scelerisque laoreet magna. Vestibulum non dolor arcu. Curabitur in ex sapien. Nullam mollis turpis in odio sodales dapibus. Duis nec tellus felis. Sed at ex aliquet, bibendum nulla eget, rhoncus magna. Nulla ac vulputate magna. Vestibulum sed pellentesque orci, eget pellentesque leo. Curabitur gravida laoreet felis, eget lobortis elit molestie ut. Proin congue odio sed risus malesuada accumsan. Vestibulum feugiat tincidunt ullamcorper. Vestibulum tempor laoreet urna eget egestas.';
	
	$data = array(
		0 => array(
			'post_title' => 'Testimonial #1',
			'post_content' => $post_content,
			'shb_guest_name' => 'Maria Clarke',
			'shb_additional_info' => 'Standard Room',
			'featured_image' => get_option('shb_demo_image_23'),
		),
		1 => array(
			'post_title' => 'Testimonial #2',
			'post_content' => $post_content,
			'shb_guest_name' => 'Dave Jones',
			'shb_additional_info' => 'King Room',
			'featured_image' => get_option('shb_demo_image_24'),
		),
		2 => array(
			'post_title' => 'Testimonial #3',
			'post_content' => $post_content,
			'shb_guest_name' => 'Gary Oldham',
			'shb_additional_info' => 'Ensuite Room',
			'featured_image' => get_option('shb_demo_image_25'),
		),
		3 => array(
			'post_title' => 'Testimonial #4',
			'post_content' => $post_content,
			'shb_guest_name' => 'Maria Clarke',
			'shb_additional_info' => 'Standard Room',
			'featured_image' => get_option('shb_demo_image_23'),
		)
	);
	
	foreach($data as $val) {
		$post_id = sh_insert_testimonial($val);
	}	
	
}

function sh_insert_testimonial($data) {
	
	$post_id = wp_insert_post(array (
	   'post_type' => 'testimonial',
	   'post_title' => $data['post_title'],
	   'post_content' => $data['post_content'],
	   'post_status' => 'publish',
	   'comment_status' => 'closed',
	   'ping_status' => 'closed'
	));
	
	// Save custom fields
	if ($post_id) {
		add_post_meta($post_id, 'shb_guest_name', $data['shb_guest_name'], true);
		add_post_meta($post_id, 'shb_additional_info', $data['shb_additional_info'], true);
		set_post_thumbnail( $post_id, $data['featured_image'] );
	}
	
	return $post_id;
	
}

function sh_import_accommodation() {
	
	// Set accommodation single short description content
	$shb_short_description = '<ul>
<li><i class="fas fa-user"></i><span>Capacity:</span> 2 Adults</li>
<li><i class="fas fa-ruler-combined"></i><span>Size:</span> 35sqm</li>
<li><i class="fas fa-binoculars"></i><span>View:</span> City</li>
</ul>';
	
	// Accommodation types
	$type_rooms = wp_insert_term( 'Rooms', 'accommodation-types' );
	$type_suites = wp_insert_term( 'Suites', 'accommodation-types' );
	
	// Accommodation hotels
	$hotel_los_angeles = wp_insert_term( 'Los Angeles', 'accommodation-categories' );
	$hotel_miami = wp_insert_term( 'Miami', 'accommodation-categories' );
	$hotel_new_york_city = wp_insert_term( 'New York City', 'accommodation-categories' );
	
	// Accommodation data
	$accommodation_data = array(
		1 => array(
			'post_title' => 'Deluxe Queen Room',
			'post_content' => '',
			'featured_image' => get_option('shb_demo_image_4'),
			'shb_short_description' => $shb_short_description,
			'shb_accommodation_type' => 'private',
			'shb_price_scheme' => 'per_room',
			'shb_qty' => 10,
			'shb_price_intro' => 'From [price] / Night',
			'shb_sorting_price' => 300,
			'shb_room_category' => $type_rooms['term_id'],
			'shb_hotel_category' => $hotel_los_angeles['term_id'],
		),
		2 => array(
			'post_title' => 'King Ensuite Room',
			'post_content' => '',
			'featured_image' => get_option('shb_demo_image_37'),
			'shb_short_description' => $shb_short_description,
			'shb_accommodation_type' => 'private',
			'shb_price_scheme' => 'per_room',
			'shb_qty' => 10,
			'shb_price_intro' => 'From [price] / Night',
			'shb_sorting_price' => 250,
			'shb_room_category' => $type_suites['term_id'],
			'shb_hotel_category' => $hotel_los_angeles['term_id'],
		),
		3 => array(
			'post_title' => 'Queen Room',
			'post_content' => '',
			'featured_image' => get_option('shb_demo_image_34'),
			'shb_short_description' => $shb_short_description,
			'shb_accommodation_type' => 'private',
			'shb_price_scheme' => 'per_room',
			'shb_qty' => 10,
			'shb_price_intro' => 'From [price] / Night',
			'shb_sorting_price' => 150,
			'shb_room_category' => $type_rooms['term_id'],
			'shb_hotel_category' => $hotel_miami['term_id'],
		),
		4 => array(
			'post_title' => 'Deluxe Ensuite Room',
			'post_content' => '',
			'featured_image' => get_option('shb_demo_image_35'),
			'shb_short_description' => $shb_short_description,
			'shb_accommodation_type' => 'private',
			'shb_price_scheme' => 'per_room',
			'shb_qty' => 10,
			'shb_price_intro' => 'From [price] / Night',
			'shb_sorting_price' => 200,
			'shb_room_category' => $type_rooms['term_id'],
			'shb_hotel_category' => $hotel_miami['term_id'],
		),
		5 => array(
			'post_title' => 'Ensuite Room',
			'post_content' => '',
			'featured_image' => get_option('shb_demo_image_34'),
			'shb_short_description' => $shb_short_description,
			'shb_accommodation_type' => 'private',
			'shb_price_scheme' => 'per_room',
			'shb_qty' => 10,
			'shb_price_intro' => 'From [price] / Night',
			'shb_sorting_price' => 450,
			'shb_room_category' => $type_suites['term_id'],
			'shb_hotel_category' => $hotel_new_york_city['term_id'],
		),
		6 => array(
			'post_title' => 'King Room',
			'post_content' => '',
			'featured_image' => get_option('shb_demo_image_5'),
			'shb_short_description' => $shb_short_description,
			'shb_accommodation_type' => 'private',
			'shb_price_scheme' => 'per_room',
			'shb_qty' => 10,
			'shb_price_intro' => 'From [price] / Night',
			'shb_sorting_price' => 300,
			'shb_room_category' => $type_suites['term_id'],
			'shb_hotel_category' => $hotel_new_york_city['term_id'],
		),
		7 => array(
			'post_title' => 'Standard Room',
			'post_content' => '',
			'featured_image' => get_option('shb_demo_image_4'),
			'shb_short_description' => $shb_short_description,
			'shb_accommodation_type' => 'private',
			'shb_price_scheme' => 'per_room',
			'shb_qty' => 10,
			'shb_price_intro' => 'From [price] / Night',
			'shb_sorting_price' => 200,
			'shb_room_category' => $type_rooms['term_id'],
			'shb_hotel_category' => $hotel_new_york_city['term_id'],
		)
	);
	
	// Insert accommodation data
	foreach($accommodation_data as $key => $val) {
		$accommodation_id = sh_insert_accommodation($key,$val,$guestclass_ids);
	}
	
}

function sh_insert_accommodation($key,$data,$guestclass_ids) {
	
	// Insert post
	$post_id = wp_insert_post(array (
	   'post_type' => 'shb_accommodation',
	   'post_title' => $data['post_title'],
	   'post_content' => $data['post_content'],
	   'post_status' => 'publish',
	   'comment_status' => 'closed',
	   'ping_status' => 'closed',
	));
		
	if(!empty($data['shb_room_category'])) {
		$room_category_id = array( $data['shb_room_category'] );
		wp_set_object_terms( $post_id, $room_category_id, 'accommodation-types' );
	}
	
	if(!empty($data['shb_hotel_category'])) {
		$hotel_category_id = array( $data['shb_hotel_category'] );
		wp_set_object_terms( $post_id, $hotel_category_id, 'accommodation-categories' );
	}
 	
	// Save custom fields
	if ($post_id) {
		add_post_meta($post_id, 'shb_short_description', $data['shb_short_description'], true);
		add_post_meta($post_id, 'shb_accommodation_type', $data['shb_accommodation_type'], true);
		add_post_meta($post_id, 'shb_price_scheme', $data['shb_price_scheme'], true);
		add_post_meta($post_id, 'shb_qty', $data['shb_qty'], true);
		add_post_meta($post_id, 'shb_price_intro', $data['shb_price_intro'], true);
		add_post_meta($post_id, 'shb_sorting_price', $data['shb_sorting_price'], true);
		add_post_meta($post_id, 'shb_' . get_option('shb_demo_guestclass_adult') . '_min', 1, true);
		add_post_meta($post_id, 'shb_' . get_option('shb_demo_guestclass_adult') . '_max', 10, true);
		add_post_meta($post_id, 'shb_' . get_option('shb_demo_guestclass_child') . '_min', 0, true);
		add_post_meta($post_id, 'shb_' . get_option('shb_demo_guestclass_child') . '_max', 10, true);
		add_post_meta($post_id, 'shb_total_min', 1, true);
		add_post_meta($post_id, 'shb_total_max', 10, true);
		set_post_thumbnail( $post_id, $data['featured_image'] );
	}
	
	if($key == 1) {
		
		$post_content = '<p>[vc_row fixed_width="true" el_class="shb-accommodation-single-2-wrapper" css=".vc_custom_1627550306821{margin-top: 80px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][vc_column width="2/3" css=".vc_custom_1627549995000{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][shb_title_with_icons main_title="' . $data['post_title'] . '" icon_1="fa-bed" title_1="Sleeps" value_1="2 Adults" icon_2="fa-ruler-combined" title_2="Size" value_2="35sqm" icon_3="fa-binoculars" title_3="City" value_3="View" hotel_selection="1"][sohohotel_slideshow slide_image_1="' . get_option('shb_demo_image_30') . '" slide_image_2="' . get_option('shb_demo_image_31') . '"][vc_empty_space height="80px"][sohohotel_title title="Room Description" size="25px" align="center"][vc_column_text]Etiam at hendrerit sem. Quisque porta velit quis dolor interdum, sit amet imperdiet leo posuere. Nam id nisl scelerisque, commodo ex vel, vulputate eros. Aenean sit amet rutrum odio. Suspendisse faucibus ac turpis et tincidunt. Cras non quam mauris. Nullam commodo a urna sed faucibus. Nam dolor odio, eleifend quis dictum aliquet, ultrices vel purus.</p>
	<p>Phasellus at congue lectus, sit amet tincidunt nunc. Vivamus fermentum nunc ac dui faucibus consequat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Proin hendrerit sit amet est at laoreet. Nam auctor rhoncus accumsan. Morbi et turpis ac ligula tempor tincidunt.[/vc_column_text][vc_empty_space height="30px"][sohohotel_title title="Facilities" size="25px" align="center"][vc_column_text]</p>
	<table>
	<tbody>
	<tr>
	<td><i class="fas fa-wifi"></i>High speed in-room wifi</td>
	<td><i class="fas fa-cocktail"></i>Mini bar</td>
	</tr>
	<tr>
	<td><i class="fas fa-swimming-pool"></i>Swimming pool</td>
	<td><i class="fas fa-child"></i>Child friendly</td>
	</tr>
	<tr>
	<td><i class="fas fa-hot-tub"></i>Hot tub</td>
	<td><i class="fas fa-table-tennis"></i>Games room</td>
	</tr>
	<tr>
	<td><i class="fa fa-bath"></i>Bath</td>
	<td><i class="fa fa-wheelchair"></i>Wheelchair access</td>
	</tr>
	</tbody>
	</table>
	<p>[/vc_column_text][vc_empty_space height="40px"][sohohotel_title title="Video Tour" size="25px" align="center"][sohohotel_video_thumbnail thumbnail_url="' . get_option('shb_demo_image_6') . '" video_url="https://www.youtube.com/watch?v=9ATwmA0AZOM"][sohohotel_title title="Booking Policy" size="25px" align="center"][vc_toggle title="My flight arrives early in the morning, what time can I check in?"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent et rhoncus neque. Maecenas enim nunc, dapibus in mattis eleifend, luctus et magna. Maecenas nunc est, posuere sed convallis tincidunt[/vc_toggle][vc_toggle title="Is breakfast included as standard with all rooms?"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent et rhoncus neque. Maecenas enim nunc, dapibus in mattis eleifend, luctus et magna. Maecenas nunc est, posuere sed convallis tincidunt[/vc_toggle][vc_toggle title="Do you provide a child day care service?"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent et rhoncus neque. Maecenas enim nunc, dapibus in mattis eleifend, luctus et magna. Maecenas nunc est, posuere sed convallis tincidunt[/vc_toggle][vc_empty_space height="70px"][/vc_column][vc_column width="1/3" css=".vc_custom_1627550000545{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][vc_row_inner css=".vc_custom_1627550361331{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 30px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][vc_column_inner css=".vc_custom_1627550351645{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][shb_booking_form_single_vertical accommodation_id="' . $post_id . '"][/vc_column_inner][/vc_row_inner][vc_row_inner css=".vc_custom_1627550370142{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][vc_column_inner css=".vc_custom_1627550377299{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][shb_booking_contact title="Need Assistance?" main_content="Our dedicated reservations team is ready around the clock." address="55 Columbus Circle, New York, NY" address_url="http://google.com" phone="1111-2222-3333" email="booking@example.com"][/vc_column_inner][/vc_row_inner][vc_empty_space height="80px"][/vc_column][/vc_row][vc_row css=".vc_custom_1627561433056{margin-top: 0px !important;margin-bottom: 0px !important;border-top-width: 1px !important;border-bottom-width: 0px !important;padding-top: 75px !important;padding-bottom: 80px !important;border-top-color: #dedede !important;border-top-style: solid !important;border-bottom-color: #dedede !important;border-bottom-style: solid !important;}"][vc_column css=".vc_custom_1627561469177{margin-top: 0px !important;margin-bottom: 0px !important;border-top-width: 0px !important;border-bottom-width: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"][vc_row_inner fixed_width="true" css=".vc_custom_1627561442029{margin-top: 0px !important;margin-bottom: 0px !important;border-top-width: 0px !important;border-bottom-width: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"][vc_column_inner css=".vc_custom_1627561458940{margin-top: 0px !important;margin-bottom: 0px !important;border-top-width: 0px !important;border-bottom-width: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"][sohohotel_title title="Other Rooms" size="25px" align="center"][shb_accommodation_carousel_2 columns="3"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]</p>
	';
		
	} else {
		
		$post_content = '<p>[vc_row css=".vc_custom_1627561827928{margin-top: 70px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}" el_class="shb-accommodation-single-header-wrapper"][vc_column css=".vc_custom_1627561834249{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][shb_title_with_icons main_title="' . $data['post_title'] . '" icon_1="fa-bed" title_1="Sleeps" value_1="2 Adults" icon_2="fa-ruler-combined" title_2="Size" value_2="35sqm" icon_3="fa-binoculars" title_3="City" value_3="View" hotel_selection="1"][sohohotel_slideshow slide_image_1="' . get_option('shb_demo_image_32') . '" slide_image_2="' . get_option('shb_demo_image_33') . '"][shb_booking_form_single_horizontal accommodation_id="' . $post_id . '"][/vc_column][/vc_row][vc_row el_class="shb-accommodation-single-1-wrapper" css=".vc_custom_1627561638914{margin-top: 40px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][vc_column css=".vc_custom_1627561647148{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][vc_empty_space height="80px"][sohohotel_title title="Room Description" size="25px" align="center"][vc_column_text]Etiam at hendrerit sem. Quisque porta velit quis dolor interdum, sit amet imperdiet leo posuere. Nam id nisl scelerisque, commodo ex vel, vulputate eros. Aenean sit amet rutrum odio. Suspendisse faucibus ac turpis et tincidunt. Cras non quam mauris. Nullam commodo a urna sed faucibus. Nam dolor odio, eleifend quis dictum aliquet, ultrices vel purus.</p>
	<p>Phasellus at congue lectus, sit amet tincidunt nunc. Vivamus fermentum nunc ac dui faucibus consequat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Proin hendrerit sit amet est at laoreet. Nam auctor rhoncus accumsan. Morbi et turpis ac ligula tempor tincidunt.[/vc_column_text][vc_empty_space height="30px"][sohohotel_title title="Facilities" size="25px" align="center"][vc_column_text]</p>
	<table>
	<tbody>
	<tr>
	<td><i class="fas fa-wifi"></i>High speed in-room wifi</td>
	<td><i class="fas fa-cocktail"></i>Mini bar</td>
	</tr>
	<tr>
	<td><i class="fas fa-swimming-pool"></i>Swimming pool</td>
	<td><i class="fas fa-child"></i>Child friendly</td>
	</tr>
	<tr>
	<td><i class="fas fa-hot-tub"></i>Hot tub</td>
	<td><i class="fas fa-table-tennis"></i>Games room</td>
	</tr>
	<tr>
	<td><i class="fa fa-bath"></i>Bath</td>
	<td><i class="fa fa-wheelchair"></i>Wheelchair access</td>
	</tr>
	</tbody>
	</table>
	<p>[/vc_column_text][vc_empty_space height="40px"][sohohotel_title title="Video Tour" size="25px" align="center"][sohohotel_video_thumbnail thumbnail_url="' . get_option('shb_demo_image_6') . '" video_url="https://www.youtube.com/watch?v=9ATwmA0AZOM"][sohohotel_title title="Booking Policy" size="25px" align="center"][vc_toggle title="My flight arrives early in the morning, what time can I check in?"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent et rhoncus neque. Maecenas enim nunc, dapibus in mattis eleifend, luctus et magna. Maecenas nunc est, posuere sed convallis tincidunt[/vc_toggle][vc_toggle title="Is breakfast included as standard with all rooms?"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent et rhoncus neque. Maecenas enim nunc, dapibus in mattis eleifend, luctus et magna. Maecenas nunc est, posuere sed convallis tincidunt[/vc_toggle][vc_toggle title="Do you provide a child day care service?"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent et rhoncus neque. Maecenas enim nunc, dapibus in mattis eleifend, luctus et magna. Maecenas nunc est, posuere sed convallis tincidunt[/vc_toggle][vc_empty_space height="40px"][/vc_column][/vc_row][vc_row css=".vc_custom_1627556117764{border-top-width: 1px !important;padding-top: 40px !important;padding-bottom: 80px !important;border-top-color: #dedede !important;border-top-style: solid !important;}"][vc_column][vc_row_inner fixed_width="true"][vc_column_inner css=".vc_custom_1627556159425{margin-top: 0px !important;margin-bottom: 0px !important;border-top-width: 0px !important;border-bottom-width: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"][sohohotel_title title="Other Rooms" size="25px" align="center"][shb_accommodation_carousel_2 columns="3"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]</p>
	';
		
	}
	
	$update_post = array(
		'ID' => $post_id,
		'post_content' => $post_content,
	);
	
	wp_update_post( $update_post );

	update_option( 'shb_demo_accommodation_' . $key, $post_id );	
	
	return $post_id;
	
}

function sh_insert_guestclass() {
	
	// Insert guest classes
	$guestclass_data = array(
		1 => array(
			'post_title' => 'Adult',
			'shb_guestclass_title_plural' => 'Adults',
			'shb_guestclass_description' => 'Ages 13 or above'
		),
		2 => array(
			'post_title' => 'Child',
			'shb_guestclass_title_plural' => 'Children',
			'shb_guestclass_description' => 'Ages 12 or below'
		)
	);
	
	foreach($guestclass_data as $key => $val) {
		
		$post_id = wp_insert_post(array (
		   'post_type' => 'shb_guestclass',
		   'post_title' => $val['post_title'],
		   'post_content' => '',
		   'post_status' => 'publish',
		   'comment_status' => 'closed',
		   'ping_status' => 'closed',
		));

		// Save custom fields
		if ($post_id) {
			add_post_meta($post_id, 'shb_guestclass_title_plural', $val['shb_guestclass_title_plural'], true);
			add_post_meta($post_id, 'shb_guestclass_description', $val['shb_guestclass_description'], true);
		}
		
		if($key == 1) {
			update_option( 'shb_demo_guestclass_adult', $post_id );
		}
		
		if($key == 2) {
			update_option( 'shb_demo_guestclass_child', $post_id );
		}
		
	}
	
	return $post_id;
	
}

function sh_insert_rate() {
	
	$post_content = '[vc_row css=".vc_custom_1627468299463{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][vc_column css=".vc_custom_1627468295112{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][shb_title_with_icons main_title="{room_title}" secondary_title="{rate_title}" icon_1="fa-user" title_1="Sleeps" value_1="2 Adults" icon_2="fa-ruler-combined" title_2="Size" value_2="35sqm" icon_3="fa-binoculars" title_3="View" value_3="City"][sohohotel_slideshow slide_image_1="' . get_option('shb_demo_image_30') . '" slide_image_2="' . get_option('shb_demo_image_31') . '"][vc_empty_space height="80px"][sohohotel_title title="Room Description" size="25px" align="center"][vc_column_text]Etiam at hendrerit sem. Quisque porta velit quis dolor interdum, sit amet imperdiet leo posuere. Nam id nisl scelerisque, commodo ex vel, vulputate eros. Aenean sit amet rutrum odio. Suspendisse faucibus ac turpis et tincidunt.[/vc_column_text][vc_empty_space height="30px"][sohohotel_title title="{rate_title}" size="25px" align="center"][vc_column_text]
<table>
<tbody>
<tr>
<td>Cooked breakfast every morning</td>
<td>Free access to the pool and spa</td>
</tr>
<tr>
<td>Complimentary fruit basket</td>
<td>Complimentary message in the spa</td>
</tr>
<tr>
<td>Airport greeting and transfer service</td>
<td>1 cocktail per guest, per evening</td>
</tr>
</tbody>
</table>
[/vc_column_text][vc_empty_space height="40px"][sohohotel_title title="Booking Policy" size="25px" align="center"][vc_toggle title="My flight arrives early in the morning, what time can I check in?"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent et rhoncus neque. Maecenas enim nunc, dapibus in mattis eleifend, luctus et magna. Maecenas nunc est, posuere sed convallis tincidunt[/vc_toggle][vc_toggle title="Is breakfast included as standard with all rooms?"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent et rhoncus neque. Maecenas enim nunc, dapibus in mattis eleifend, luctus et magna. Maecenas nunc est, posuere sed convallis tincidunt[/vc_toggle][vc_toggle title="Do you provide a child day care service?"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent et rhoncus neque. Maecenas enim nunc, dapibus in mattis eleifend, luctus et magna. Maecenas nunc est, posuere sed convallis tincidunt[/vc_toggle][vc_empty_space height="80px"][/vc_column][/vc_row]';

$shb_short_description = '<p>Nulla non rhoncus metus, nec tincidunt nisl. Mauris lacinia enim diam, nec porta velit blandit vel vestibulum.</p>';
	
	// Insert guest classes
	$rate_data = array(
		0 => array(
			'post_title' => 'Full Board',
			'post_content' => str_replace(["{room_title}", "{rate_title}"], [get_the_title(get_option('shb_demo_accommodation_1')), "Full Board"], $post_content),
			'shb_short_description' => $shb_short_description,
			'shb_accommodation_rate' => get_option('shb_demo_accommodation_1'),
		),
		1 => array(
			'post_title' => 'Half Board',
			'post_content' => str_replace(["{room_title}", "{rate_title}"], [get_the_title(get_option('shb_demo_accommodation_1')), "Half Board"], $post_content),
			'shb_short_description' => $shb_short_description,
			'shb_accommodation_rate' => get_option('shb_demo_accommodation_1'),
		),
		2 => array(
			'post_title' => 'Full Board',
			'post_content' => str_replace(["{room_title}", "{rate_title}"], [get_the_title(get_option('shb_demo_accommodation_2')), "Full Board"], $post_content),
			'shb_short_description' => $shb_short_description,
			'shb_accommodation_rate' => get_option('shb_demo_accommodation_2'),
		),
		3 => array(
			'post_title' => 'Half Board',
			'post_content' => str_replace(["{room_title}", "{rate_title}"], [get_the_title(get_option('shb_demo_accommodation_2')), "Half Board"], $post_content),
			'shb_short_description' => $shb_short_description,
			'shb_accommodation_rate' => get_option('shb_demo_accommodation_2'),
		),
		4 => array(
			'post_title' => 'Full Board',
			'post_content' => str_replace(["{room_title}", "{rate_title}"], [get_the_title(get_option('shb_demo_accommodation_3')), "Full Board"], $post_content),
			'shb_short_description' => $shb_short_description,
			'shb_accommodation_rate' => get_option('shb_demo_accommodation_3'),
		),
		5 => array(
			'post_title' => 'Half Board',
			'post_content' => str_replace(["{room_title}", "{rate_title}"], [get_the_title(get_option('shb_demo_accommodation_3')), "Half Board"], $post_content),
			'shb_short_description' => $shb_short_description,
			'shb_accommodation_rate' => get_option('shb_demo_accommodation_3'),
		),
		6 => array(
			'post_title' => 'Full Board',
			'post_content' => str_replace(["{room_title}", "{rate_title}"], [get_the_title(get_option('shb_demo_accommodation_4')), "Full Board"], $post_content),
			'shb_short_description' => $shb_short_description,
			'shb_accommodation_rate' => get_option('shb_demo_accommodation_4'),
		),
		7 => array(
			'post_title' => 'Half Board',
			'post_content' => str_replace(["{room_title}", "{rate_title}"], [get_the_title(get_option('shb_demo_accommodation_4')), "Half Board"], $post_content),
			'shb_short_description' => $shb_short_description,
			'shb_accommodation_rate' => get_option('shb_demo_accommodation_4'),
		),
		8 => array(
			'post_title' => 'Full Board',
			'post_content' => str_replace(["{room_title}", "{rate_title}"], [get_the_title(get_option('shb_demo_accommodation_5')), "Full Board"], $post_content),
			'shb_short_description' => $shb_short_description,
			'shb_accommodation_rate' => get_option('shb_demo_accommodation_5'),
		),
		9 => array(
			'post_title' => 'Half Board',
			'post_content' => str_replace(["{room_title}", "{rate_title}"], [get_the_title(get_option('shb_demo_accommodation_5')), "Half Board"], $post_content),
			'shb_short_description' => $shb_short_description,
			'shb_accommodation_rate' => get_option('shb_demo_accommodation_5'),
		),
		10 => array(
			'post_title' => 'Full Board',
			'post_content' => str_replace(["{room_title}", "{rate_title}"], [get_the_title(get_option('shb_demo_accommodation_6')), "Full Board"], $post_content),
			'shb_short_description' => $shb_short_description,
			'shb_accommodation_rate' => get_option('shb_demo_accommodation_6'),
		),
		11 => array(
			'post_title' => 'Half Board',
			'post_content' => str_replace(["{room_title}", "{rate_title}"], [get_the_title(get_option('shb_demo_accommodation_6')), "Half Board"], $post_content),
			'shb_short_description' => $shb_short_description,
			'shb_accommodation_rate' => get_option('shb_demo_accommodation_6'),
		),
		12 => array(
			'post_title' => 'Full Board',
			'post_content' => str_replace(["{room_title}", "{rate_title}"], [get_the_title(get_option('shb_demo_accommodation_7')), "Full Board"], $post_content),
			'shb_short_description' => $shb_short_description,
			'shb_accommodation_rate' => get_option('shb_demo_accommodation_7'),
		),
		13 => array(
			'post_title' => 'Half Board',
			'post_content' => str_replace(["{room_title}", "{rate_title}"], [get_the_title(get_option('shb_demo_accommodation_7')), "Half Board"], $post_content),
			'shb_short_description' => $shb_short_description,
			'shb_accommodation_rate' => get_option('shb_demo_accommodation_7'),
		),
	);
	
	foreach($rate_data as $key => $val) {
		
		$post_id = wp_insert_post(array (
		   'post_type' => 'shb_rate',
		   'post_title' => $val['post_title'],
		   'post_content' => $val['post_content'],
		   'post_status' => 'publish',
		   'comment_status' => 'closed',
		   'ping_status' => 'closed',
		));

		// Save custom fields
		if ($post_id) {
			add_post_meta($post_id, 'shb_accommodation_rate', $val['shb_accommodation_rate'], true);
			add_post_meta($post_id, 'shb_short_description', $val['shb_short_description'], true);
		}
		
		
		
		
		update_option( 'shb_demo_rate_' . $key, $post_id );
		
		
		
		
	}
	
	return $post_id;
	
}

function sh_insert_accommodation_price() {
	
	// Accommodation 1
	$price_1 = 300;
	
	$prices_1[get_option('shb_demo_rate_0')]['default']['default'][1]['room'][1] = $price_1;
	$prices_1[get_option('shb_demo_rate_0')]['default']['default'][2]['room'][1] = $price_1;
	$prices_1[get_option('shb_demo_rate_0')]['default']['default'][3]['room'][1] = $price_1;
	$prices_1[get_option('shb_demo_rate_0')]['default']['default'][4]['room'][1] = $price_1;
	$prices_1[get_option('shb_demo_rate_0')]['default']['default'][5]['room'][1] = $price_1;
	$prices_1[get_option('shb_demo_rate_0')]['default']['default'][6]['room'][1] = $price_1;
	$prices_1[get_option('shb_demo_rate_0')]['default']['default'][0]['room'][1] = $price_1;
	
	$prices_1[get_option('shb_demo_rate_1')]['default']['default'][1]['room'][1] = $price_1;
	$prices_1[get_option('shb_demo_rate_1')]['default']['default'][2]['room'][1] = $price_1;
	$prices_1[get_option('shb_demo_rate_1')]['default']['default'][3]['room'][1] = $price_1;
	$prices_1[get_option('shb_demo_rate_1')]['default']['default'][4]['room'][1] = $price_1;
	$prices_1[get_option('shb_demo_rate_1')]['default']['default'][5]['room'][1] = $price_1;
	$prices_1[get_option('shb_demo_rate_1')]['default']['default'][6]['room'][1] = $price_1;
	$prices_1[get_option('shb_demo_rate_1')]['default']['default'][0]['room'][1] = $price_1;
	
	update_post_meta( get_option('shb_demo_accommodation_1'), 'shb_pricing', $prices_1 );
	
	// Accommodation 2
	$price_2 = 250;
	
	$prices_2[get_option('shb_demo_rate_2')]['default']['default'][1]['room'][1] = $price_2;
	$prices_2[get_option('shb_demo_rate_2')]['default']['default'][2]['room'][1] = $price_2;
	$prices_2[get_option('shb_demo_rate_2')]['default']['default'][3]['room'][1] = $price_2;
	$prices_2[get_option('shb_demo_rate_2')]['default']['default'][4]['room'][1] = $price_2;
	$prices_2[get_option('shb_demo_rate_2')]['default']['default'][5]['room'][1] = $price_2;
	$prices_2[get_option('shb_demo_rate_2')]['default']['default'][6]['room'][1] = $price_2;
	$prices_2[get_option('shb_demo_rate_2')]['default']['default'][0]['room'][1] = $price_2;
	
	$prices_2[get_option('shb_demo_rate_3')]['default']['default'][1]['room'][1] = $price_2;
	$prices_2[get_option('shb_demo_rate_3')]['default']['default'][2]['room'][1] = $price_2;
	$prices_2[get_option('shb_demo_rate_3')]['default']['default'][3]['room'][1] = $price_2;
	$prices_2[get_option('shb_demo_rate_3')]['default']['default'][4]['room'][1] = $price_2;
	$prices_2[get_option('shb_demo_rate_3')]['default']['default'][5]['room'][1] = $price_2;
	$prices_2[get_option('shb_demo_rate_3')]['default']['default'][6]['room'][1] = $price_2;
	$prices_2[get_option('shb_demo_rate_3')]['default']['default'][0]['room'][1] = $price_2;
	
	update_post_meta( get_option('shb_demo_accommodation_2'), 'shb_pricing', $prices_2 );
	
	// Accommodation 3
	$price_3 = 150;
	
	$prices_3[get_option('shb_demo_rate_4')]['default']['default'][1]['room'][1] = $price_3;
	$prices_3[get_option('shb_demo_rate_4')]['default']['default'][2]['room'][1] = $price_3;
	$prices_3[get_option('shb_demo_rate_4')]['default']['default'][3]['room'][1] = $price_3;
	$prices_3[get_option('shb_demo_rate_4')]['default']['default'][4]['room'][1] = $price_3;
	$prices_3[get_option('shb_demo_rate_4')]['default']['default'][5]['room'][1] = $price_3;
	$prices_3[get_option('shb_demo_rate_4')]['default']['default'][6]['room'][1] = $price_3;
	$prices_3[get_option('shb_demo_rate_4')]['default']['default'][0]['room'][1] = $price_3;
	
	$prices_3[get_option('shb_demo_rate_5')]['default']['default'][1]['room'][1] = $price_3;
	$prices_3[get_option('shb_demo_rate_5')]['default']['default'][2]['room'][1] = $price_3;
	$prices_3[get_option('shb_demo_rate_5')]['default']['default'][3]['room'][1] = $price_3;
	$prices_3[get_option('shb_demo_rate_5')]['default']['default'][4]['room'][1] = $price_3;
	$prices_3[get_option('shb_demo_rate_5')]['default']['default'][5]['room'][1] = $price_3;
	$prices_3[get_option('shb_demo_rate_5')]['default']['default'][6]['room'][1] = $price_3;
	$prices_3[get_option('shb_demo_rate_5')]['default']['default'][0]['room'][1] = $price_3;
	
	update_post_meta( get_option('shb_demo_accommodation_3'), 'shb_pricing', $prices_3 );
	
	// Accommodation 4
	$price_4 = 200;
	
	$prices_4[get_option('shb_demo_rate_6')]['default']['default'][1]['room'][1] = $price_4;
	$prices_4[get_option('shb_demo_rate_6')]['default']['default'][2]['room'][1] = $price_4;
	$prices_4[get_option('shb_demo_rate_6')]['default']['default'][3]['room'][1] = $price_4;
	$prices_4[get_option('shb_demo_rate_6')]['default']['default'][4]['room'][1] = $price_4;
	$prices_4[get_option('shb_demo_rate_6')]['default']['default'][5]['room'][1] = $price_4;
	$prices_4[get_option('shb_demo_rate_6')]['default']['default'][6]['room'][1] = $price_4;
	$prices_4[get_option('shb_demo_rate_6')]['default']['default'][0]['room'][1] = $price_4;
	
	$prices_4[get_option('shb_demo_rate_7')]['default']['default'][1]['room'][1] = $price_4;
	$prices_4[get_option('shb_demo_rate_7')]['default']['default'][2]['room'][1] = $price_4;
	$prices_4[get_option('shb_demo_rate_7')]['default']['default'][3]['room'][1] = $price_4;
	$prices_4[get_option('shb_demo_rate_7')]['default']['default'][4]['room'][1] = $price_4;
	$prices_4[get_option('shb_demo_rate_7')]['default']['default'][5]['room'][1] = $price_4;
	$prices_4[get_option('shb_demo_rate_7')]['default']['default'][6]['room'][1] = $price_4;
	$prices_4[get_option('shb_demo_rate_7')]['default']['default'][0]['room'][1] = $price_4;
	
	update_post_meta( get_option('shb_demo_accommodation_4'), 'shb_pricing', $prices_4 );
	
	// Accommodation 5
	$price_5 = 450;
	
	$prices_5[get_option('shb_demo_rate_8')]['default']['default'][1]['room'][1] = $price_5;
	$prices_5[get_option('shb_demo_rate_8')]['default']['default'][2]['room'][1] = $price_5;
	$prices_5[get_option('shb_demo_rate_8')]['default']['default'][3]['room'][1] = $price_5;
	$prices_5[get_option('shb_demo_rate_8')]['default']['default'][4]['room'][1] = $price_5;
	$prices_5[get_option('shb_demo_rate_8')]['default']['default'][5]['room'][1] = $price_5;
	$prices_5[get_option('shb_demo_rate_8')]['default']['default'][6]['room'][1] = $price_5;
	$prices_5[get_option('shb_demo_rate_8')]['default']['default'][0]['room'][1] = $price_5;
	
	$prices_5[get_option('shb_demo_rate_9')]['default']['default'][1]['room'][1] = $price_5;
	$prices_5[get_option('shb_demo_rate_9')]['default']['default'][2]['room'][1] = $price_5;
	$prices_5[get_option('shb_demo_rate_9')]['default']['default'][3]['room'][1] = $price_5;
	$prices_5[get_option('shb_demo_rate_9')]['default']['default'][4]['room'][1] = $price_5;
	$prices_5[get_option('shb_demo_rate_9')]['default']['default'][5]['room'][1] = $price_5;
	$prices_5[get_option('shb_demo_rate_9')]['default']['default'][6]['room'][1] = $price_5;
	$prices_5[get_option('shb_demo_rate_9')]['default']['default'][0]['room'][1] = $price_5;
	
	update_post_meta( get_option('shb_demo_accommodation_5'), 'shb_pricing', $prices_5 );
	
	// Accommodation 6
	$price_6 = 300;
	
	$prices_6[get_option('shb_demo_rate_10')]['default']['default'][1]['room'][1] = $price_6;
	$prices_6[get_option('shb_demo_rate_10')]['default']['default'][2]['room'][1] = $price_6;
	$prices_6[get_option('shb_demo_rate_10')]['default']['default'][3]['room'][1] = $price_6;
	$prices_6[get_option('shb_demo_rate_10')]['default']['default'][4]['room'][1] = $price_6;
	$prices_6[get_option('shb_demo_rate_10')]['default']['default'][5]['room'][1] = $price_6;
	$prices_6[get_option('shb_demo_rate_10')]['default']['default'][6]['room'][1] = $price_6;
	$prices_6[get_option('shb_demo_rate_10')]['default']['default'][0]['room'][1] = $price_6;
	
	$prices_6[get_option('shb_demo_rate_11')]['default']['default'][1]['room'][1] = $price_6;
	$prices_6[get_option('shb_demo_rate_11')]['default']['default'][2]['room'][1] = $price_6;
	$prices_6[get_option('shb_demo_rate_11')]['default']['default'][3]['room'][1] = $price_6;
	$prices_6[get_option('shb_demo_rate_11')]['default']['default'][4]['room'][1] = $price_6;
	$prices_6[get_option('shb_demo_rate_11')]['default']['default'][5]['room'][1] = $price_6;
	$prices_6[get_option('shb_demo_rate_11')]['default']['default'][6]['room'][1] = $price_6;
	$prices_6[get_option('shb_demo_rate_11')]['default']['default'][0]['room'][1] = $price_6;
	
	update_post_meta( get_option('shb_demo_accommodation_6'), 'shb_pricing', $prices_6 );
	
	// Accommodation 7
	$price_7 = 200;
	
	$prices_7[get_option('shb_demo_rate_12')]['default']['default'][1]['room'][1] = $price_7;
	$prices_7[get_option('shb_demo_rate_12')]['default']['default'][2]['room'][1] = $price_7;
	$prices_7[get_option('shb_demo_rate_12')]['default']['default'][3]['room'][1] = $price_7;
	$prices_7[get_option('shb_demo_rate_12')]['default']['default'][4]['room'][1] = $price_7;
	$prices_7[get_option('shb_demo_rate_12')]['default']['default'][5]['room'][1] = $price_7;
	$prices_7[get_option('shb_demo_rate_12')]['default']['default'][6]['room'][1] = $price_7;
	$prices_7[get_option('shb_demo_rate_12')]['default']['default'][0]['room'][1] = $price_7;
	
	$prices_7[get_option('shb_demo_rate_13')]['default']['default'][1]['room'][1] = $price_7;
	$prices_7[get_option('shb_demo_rate_13')]['default']['default'][2]['room'][1] = $price_7;
	$prices_7[get_option('shb_demo_rate_13')]['default']['default'][3]['room'][1] = $price_7;
	$prices_7[get_option('shb_demo_rate_13')]['default']['default'][4]['room'][1] = $price_7;
	$prices_7[get_option('shb_demo_rate_13')]['default']['default'][5]['room'][1] = $price_7;
	$prices_7[get_option('shb_demo_rate_13')]['default']['default'][6]['room'][1] = $price_7;
	$prices_7[get_option('shb_demo_rate_13')]['default']['default'][0]['room'][1] = $price_7;
	
	update_post_meta( get_option('shb_demo_accommodation_7'), 'shb_pricing', $prices_7 );
	
}

function sh_insert_additionalfee() {
	
	$post_content = '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vel libero id sem sagittis fringilla. Sed porta tortor et tellus bibendum imperdiet. Aliquam erat volutpat. Nunc pulvinar mi id eros suscipit, vitae ullamcorper quam ullamcorper. Sed pretium, quam aliquet dignissim vestibulum, mi justo elementum ligula, eget interdum elit velit a lectus. Morbi dignissim rhoncus lectus dictum rhoncus. Nunc auctor tincidunt nisi, vitae tempor massa placerat sed. Curabitur sem metus, finibus in dictum nec, posuere ut dolor.</p>

<p>Integer dictum blandit neque, in iaculis lorem pretium eget. Mauris sed enim nec nisl molestie consectetur ac sed nisi. Maecenas malesuada est id nisl hendrerit fermentum. Morbi vel nisl non urna dignissim placerat. Suspendisse commodo leo at facilisis sollicitudin. Donec commodo, orci sed suscipit hendrerit, orci eros sollicitudin augue, ac tristique tellus mauris id tellus. Proin imperdiet condimentum felis, nec fringilla elit fermentum at. Suspendisse in lacus tempor, eleifend ante non, aliquam sapien. Nam est nisi, mollis ut diam vitae, scelerisque aliquet ligula. Vivamus neque lorem, accumsan et ex nec, euismod cursus sapien. Ut semper suscipit ex id cursus. </p>';
	
	// Insert additional fees
	$additionalfee_data = array(
		0 => array(
			'post_title' => 'Airport Pickup',
			'post_content' => $post_content,
			'shb_charge' => 'per_person',
			'shb_per' => 'booking',
			'shb_optional' => 'yes',
			'shb_qty_select' => 'yes',
			'shb_qty_min' => '0',
			'shb_qty_max' => '10',
			'shb_qty_name' => 'People',
			'shb_select_date' => 'yes',
			'shb_select_time' => 'yes',
			'shb_price' => '135',
			'shb_price_name' => 'Per Person',
			'featured_image' => get_option('shb_demo_image_37'),
		),
		1 => array(
			'post_title' => 'City Guided Tour',
			'post_content' => $post_content,
			'shb_charge' => 'per_person',
			'shb_per' => 'booking',
			'shb_optional' => 'yes',
			'shb_qty_select' => 'yes',
			'shb_qty_min' => '0',
			'shb_qty_max' => '10',
			'shb_qty_name' => 'People',
			'shb_select_date' => 'yes',
			'shb_select_time' => 'no',
			'shb_price' => '95',
			'shb_price_name' => 'Per Person',
			'featured_image' => get_option('shb_demo_image_5'),
		),
		2 => array(
			'post_title' => 'Welcome Fruit Basket',
			'post_content' => $post_content,
			'shb_charge' => 'per_room',
			'shb_per' => 'booking',
			'shb_optional' => 'yes',
			'shb_qty_select' => 'yes',
			'shb_qty_min' => '0',
			'shb_qty_max' => '10',
			'shb_qty_name' => 'Baskets',
			'shb_select_date' => 'no',
			'shb_select_time' => 'no',
			'shb_price' => '25',
			'shb_price_name' => 'Per Basket',
			'featured_image' => get_option('shb_demo_image_4'),
		)
	);
	
	foreach($additionalfee_data as $val) {
		
		$post_id = wp_insert_post(array (
		   'post_type' => 'shb_additionalfee',
		   'post_title' => $val['post_title'],
		   'post_content' => $val['post_content'],
		   'post_status' => 'publish',
		   'comment_status' => 'closed',
		   'ping_status' => 'closed',
		));

		// Save custom fields
		if ($post_id) {
			add_post_meta($post_id, 'shb_charge', $val['shb_charge'], true);
			add_post_meta($post_id, 'shb_per', $val['shb_per'], true);
			add_post_meta($post_id, 'shb_optional', $val['shb_optional'], true);
			add_post_meta($post_id, 'shb_qty_select', $val['shb_qty_select'], true);
			add_post_meta($post_id, 'shb_qty_min', $val['shb_qty_min'], true);
			add_post_meta($post_id, 'shb_qty_max', $val['shb_qty_max'], true);
			add_post_meta($post_id, 'shb_qty_name', $val['shb_qty_name'], true);
			add_post_meta($post_id, 'shb_select_date', $val['shb_select_date'], true);
			add_post_meta($post_id, 'shb_select_time', $val['shb_select_time'], true);
			add_post_meta($post_id, 'shb_price', $val['shb_price'], true);
			add_post_meta($post_id, 'shb_price_name', $val['shb_price_name'], true);
			
			set_post_thumbnail( $post_id, $val['featured_image'] );
			
			// Add to default season
			add_post_meta($post_id, 'shb_season_default', 'default', true);
			
			// Add to all rates and rooms
			add_post_meta($post_id, 'shb_accommodation_rate_' . get_option('shb_demo_accommodation_1') . '_' . get_option('shb_demo_rate_0') , $post_id, true);
			add_post_meta($post_id, 'shb_accommodation_rate_' . get_option('shb_demo_accommodation_1') . '_' . get_option('shb_demo_rate_1') , $post_id, true);
			
			add_post_meta($post_id, 'shb_accommodation_rate_' . get_option('shb_demo_accommodation_2') . '_' . get_option('shb_demo_rate_2') , $post_id, true);
			add_post_meta($post_id, 'shb_accommodation_rate_' . get_option('shb_demo_accommodation_2') . '_' . get_option('shb_demo_rate_3') , $post_id, true);
			
			add_post_meta($post_id, 'shb_accommodation_rate_' . get_option('shb_demo_accommodation_3') . '_' . get_option('shb_demo_rate_4') , $post_id, true);
			add_post_meta($post_id, 'shb_accommodation_rate_' . get_option('shb_demo_accommodation_3') . '_' . get_option('shb_demo_rate_5') , $post_id, true);
				
			add_post_meta($post_id, 'shb_accommodation_rate_' . get_option('shb_demo_accommodation_4') . '_' . get_option('shb_demo_rate_6') , $post_id, true);
			add_post_meta($post_id, 'shb_accommodation_rate_' . get_option('shb_demo_accommodation_4') . '_' . get_option('shb_demo_rate_7') , $post_id, true);
			
			add_post_meta($post_id, 'shb_accommodation_rate_' . get_option('shb_demo_accommodation_5') . '_' . get_option('shb_demo_rate_8') , $post_id, true);
			add_post_meta($post_id, 'shb_accommodation_rate_' . get_option('shb_demo_accommodation_5') . '_' . get_option('shb_demo_rate_9') , $post_id, true);
			
			add_post_meta($post_id, 'shb_accommodation_rate_' . get_option('shb_demo_accommodation_6') . '_' . get_option('shb_demo_rate_10') , $post_id, true);
			add_post_meta($post_id, 'shb_accommodation_rate_' . get_option('shb_demo_accommodation_6') . '_' . get_option('shb_demo_rate_11') , $post_id, true);
			
			add_post_meta($post_id, 'shb_accommodation_rate_' . get_option('shb_demo_accommodation_7') . '_' . get_option('shb_demo_rate_12') , $post_id, true);
			add_post_meta($post_id, 'shb_accommodation_rate_' . get_option('shb_demo_accommodation_7') . '_' . get_option('shb_demo_rate_13') , $post_id, true);
				
		}
		
	}
	
	return $post_id;
	
}

function sh_insert_offer() {
	
	$post_content = '<p>[vc_row css=".vc_custom_1626851985211{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][vc_column css=".vc_custom_1626851977595{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][sohohotel_title title="Offer Details" size="25px" align="center"][vc_column_text]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sollicitudin facilisis consequat. Sed in est sed dui maximus tempor. Donec ullamcorper volutpat dolor ac posuere. Vivamus commodo lacus ac ornare tincidunt. Vivamus in lectus orci. Fusce sit amet consectetur nulla.</p>
<p>Maecenas non arcu neque. Nam iaculis, nulla pulvinar bibendum accumsan, nulla sapien vestibulum mi, nec interdum velit quam suscipit eros. In vitae lorem mi. Ut nec leo nec augue congue bibendum. Maecenas rutrum nibh gravida enim fermentum consectetur.[/vc_column_text][vc_empty_space height="30px"][sohohotel_title title="Offer Includes" size="25px" align="center"][vc_column_text]</p>
<table>
<tbody>
<tr>
<td>Cooked breakfast every morning</td>
<td>Local telephone calls</td>
</tr>
<tr>
<td>Daily fruit basket</td>
<td>Airport transfer</td>
</tr>
<tr>
<td>Unlimited high-speed wifi access</td>
<td>Access to swimming pool</td>
</tr>
<tr>
<td>Local daily newspaper</td>
<td>Access to gym in basement</td>
</tr>
</tbody>
</table>
<p>[/vc_column_text][/vc_column][/vc_row]</p>';
	
	// Insert offers
	$offer_data = array(
		0 => array(
			'post_title' => 'Summer Couples Offer',
			'post_content' => $post_content,
			'shb_short_description' => '20% off August bookings for couples',
			'featured_image' => get_option('shb_demo_image_38'),
		),
		1 => array(
			'post_title' => 'Buy One Get One Free',
			'post_content' => $post_content,
			'shb_short_description' => '1 Adult is free when booking in July',
			'featured_image' => get_option('shb_demo_image_17'),
		),
		2 => array(
			'post_title' => 'Family Discount',
			'post_content' => $post_content,
			'shb_short_description' => '10% off for families in March',
			'featured_image' => get_option('shb_demo_image_18'),
		),
		3 => array(
			'post_title' => 'Honeymoon Offer',
			'post_content' => $post_content,
			'shb_short_description' => 'Special honeymoon suite and items',
			'featured_image' => get_option('shb_demo_image_16'),
		),
		4 => array(
			'post_title' => 'Weekend Getaway',
			'post_content' => $post_content,
			'shb_short_description' => 'Book 2 nights on Fri, Sat or Sun',
			'featured_image' => get_option('shb_demo_image_19'),
		),
		5 => array(
			'post_title' => '1 Week Package Offer',
			'post_content' => $post_content,
			'shb_short_description' => '30% off 1 week+ stays',
			'featured_image' => get_option('shb_demo_image_20'),
		),
		6 => array(
			'post_title' => 'Family of 4 Special Offer',
			'post_content' => $post_content,
			'shb_short_description' => '10% off for children at weekends',
			'featured_image' => get_option('shb_demo_image_21'),
		),
		7 => array(
			'post_title' => '20% Off 3+ Nights Bookings',
			'post_content' => $post_content,
			'shb_short_description' => 'Offer valid for suites only',
			'featured_image' => get_option('shb_demo_image_16'),
		),
		8 => array(
			'post_title' => '10% When Booking Full Board',
			'post_content' => $post_content,
			'shb_short_description' => 'Offer valid in August only',
			'featured_image' => get_option('shb_demo_image_17'),
		),
	);
	
	foreach($offer_data as $val) {
		
		$post_id = wp_insert_post(array (
		   'post_type' => 'shb_offer',
		   'post_title' => $val['post_title'],
		   'post_content' => $val['post_content'],
		   'post_status' => 'publish',
		   'comment_status' => 'closed',
		   'ping_status' => 'closed',
		));

		// Save custom fields
		if ($post_id) {
			add_post_meta($post_id, 'shb_short_description', $val['shb_short_description'], true);
			set_post_thumbnail( $post_id, $val['featured_image'] );
			
			// Add to default season
			add_post_meta($post_id, 'shb_season_default', 'default', true);
			
			// Add to rooms
			add_post_meta($post_id, 'shb_accommodation_' . get_option('shb_demo_accommodation_1'), get_option('shb_demo_accommodation_1'), true);
			add_post_meta($post_id, 'shb_accommodation_' . get_option('shb_demo_accommodation_2'), get_option('shb_demo_accommodation_2'), true);
			add_post_meta($post_id, 'shb_accommodation_' . get_option('shb_demo_accommodation_3'), get_option('shb_demo_accommodation_3'), true);
			add_post_meta($post_id, 'shb_accommodation_' . get_option('shb_demo_accommodation_4'), get_option('shb_demo_accommodation_4'), true);
			add_post_meta($post_id, 'shb_accommodation_' . get_option('shb_demo_accommodation_5'), get_option('shb_demo_accommodation_5'), true);
			add_post_meta($post_id, 'shb_accommodation_' . get_option('shb_demo_accommodation_6'), get_option('shb_demo_accommodation_6'), true);
			add_post_meta($post_id, 'shb_accommodation_' . get_option('shb_demo_accommodation_7'), get_option('shb_demo_accommodation_7'), true);	
			
		}
		
	}
	
	return $post_id;
	
}

function sh_import_menu() {
	
	/* ----------------------------------------------------------------------------

	   Primary Navigation

	---------------------------------------------------------------------------- */
	
	$primary_navigation_name = 'Primary Navigation';
	$primary_navigation_exists = wp_get_nav_menu_object($primary_navigation_name);

	if( !$primary_navigation_exists){
	    $primary_navigation_id = wp_create_nav_menu($primary_navigation_name);
	}
	
	$primary_navigation_object = wp_get_nav_menu_object('Primary Navigation');
	$primary_navigation_id = (int) $primary_navigation_object->term_id;
	
	$menu_item_1_data = array(
		'menu-item-object-id' => get_option('shb_home_i_id'),
		'menu-item-title' => 'Home',
		'menu-item-parent-id' => 0,
		'menu-item-position'  => 1,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_1_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_1_data);
	
	$menu_item_2_data = array(
		'menu-item-object-id' => get_option('shb_home_i_id'),
		'menu-item-parent-id' => $menu_item_1_id,
		'menu-item-position'  => 2,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_2_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_2_data);
	
	$menu_item_3_data = array(
		'menu-item-object-id' => get_option('shb_home_ii_id'),
		'menu-item-parent-id' => $menu_item_1_id,
		'menu-item-position'  => 3,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_3_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_3_data);
	
	$menu_item_4_data = array(
		'menu-item-object-id' => get_option('shb_home_iii_id'),
		'menu-item-parent-id' => $menu_item_1_id,
		'menu-item-position'  => 4,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_4_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_4_data);
	
	$menu_item_5_data = array(
		'menu-item-object-id' => get_option('shb_home_iv_id'),
		'menu-item-parent-id' => $menu_item_1_id,
		'menu-item-position'  => 5,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_5_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_5_data);
	
	$menu_item_6_data = array(
		'menu-item-object-id' => get_option('shb_home_v_id'),
		'menu-item-parent-id' => $menu_item_1_id,
		'menu-item-position'  => 6,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_6_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_6_data);
	
	$menu_item_7_data = array(
		'menu-item-object-id' => get_option('shb_home_vi_id'),
		'menu-item-parent-id' => $menu_item_1_id,
		'menu-item-position'  => 7,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_7_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_7_data);
	
	$menu_item_8_data = array(
		'menu-item-object-id' => get_option('shb_accommodation_i_2_columns_id'),
		'menu-item-title' => 'Accommodation',
		'menu-item-parent-id' => 0,
		'menu-item-position'  => 2,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_8_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_8_data);

	$menu_item_9_data = array(
		'menu-item-object-id' => get_option('shb_accommodation_i_2_columns_id'),
		'menu-item-title' => 'Accommodation I',
		'menu-item-parent-id' => $menu_item_8_id,
		'menu-item-position'  => 1,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_9_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_9_data);
	
	$menu_item_10_data = array(
		'menu-item-object-id' => get_option('shb_accommodation_i_2_columns_id'),
		'menu-item-title' => '2 Columns',
		'menu-item-parent-id' => $menu_item_9_id,
		'menu-item-position'  => 1,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_10_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_10_data);
	
	$menu_item_11_data = array(
		'menu-item-object-id' => get_option('shb_accommodation_i_3_columns_id'),
		'menu-item-title' => '3 Columns',
		'menu-item-parent-id' => $menu_item_9_id,
		'menu-item-position'  => 2,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_11_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_11_data);
	
	$menu_item_12_data = array(
		'menu-item-object-id' => get_option('shb_accommodation_ii_2_columns_id'),
		'menu-item-title' => 'Accommodation II',
		'menu-item-parent-id' => $menu_item_8_id,
		'menu-item-position'  => 2,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_12_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_12_data);
	
	$menu_item_13_data = array(
		'menu-item-object-id' => get_option('shb_accommodation_ii_2_columns_id'),
		'menu-item-title' => '2 Columns',
		'menu-item-parent-id' => $menu_item_12_id,
		'menu-item-position'  => 1,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_13_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_13_data);
	
	$menu_item_14_data = array(
		'menu-item-object-id' => get_option('shb_accommodation_ii_3_columns_id'),
		'menu-item-title' => '3 Columns',
		'menu-item-parent-id' => $menu_item_12_id,
		'menu-item-position'  => 2,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_14_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_14_data);
	
	$menu_item_15_data = array(
		'menu-item-object-id' => get_option('shb_accommodation_iii_2_columns_id'),
		'menu-item-title' => 'Accommodation III',
		'menu-item-parent-id' => $menu_item_8_id,
		'menu-item-position'  => 3,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_15_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_15_data);
	
	$menu_item_16_data = array(
		'menu-item-object-id' => get_option('shb_accommodation_iii_2_columns_id'),
		'menu-item-title' => '2 Columns',
		'menu-item-parent-id' => $menu_item_15_id,
		'menu-item-position'  => 1,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_16_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_16_data);
	
	$menu_item_17_data = array(
		'menu-item-object-id' => get_option('shb_accommodation_iii_3_columns_id'),
		'menu-item-title' => '3 Columns',
		'menu-item-parent-id' => $menu_item_15_id,
		'menu-item-position'  => 2,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_17_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_17_data);
	
	$menu_item_18_data = array(
		'menu-item-object-id' => get_option( 'shb_demo_accommodation_1' ),
		'menu-item-title' => 'Accommodation Single',
		'menu-item-parent-id' => $menu_item_8_id,
		'menu-item-position'  => 4,
		'menu-item-object' => 'shb_accommodation',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_18_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_18_data);
	
	$menu_item_19_data = array(
		'menu-item-object-id' => get_option( 'shb_demo_accommodation_1' ),
		'menu-item-title' => 'Style I',
		'menu-item-parent-id' => $menu_item_18_id,
		'menu-item-position'  => 1,
		'menu-item-object' => 'shb_accommodation',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_19_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_19_data);
	
	$menu_item_20_data = array(
		'menu-item-object-id' => get_option( 'shb_demo_accommodation_2' ),
		'menu-item-title' => 'Style II',
		'menu-item-parent-id' => $menu_item_18_id,
		'menu-item-position'  => 2,
		'menu-item-object' => 'shb_accommodation',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_20_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_20_data);
	
	$menu_item_21_data = array(
		'menu-item-object-id' => get_option('shb_blog_i_id'),
		'menu-item-title' => 'Blog',
		'menu-item-parent-id' => 0,
		'menu-item-position'  => 3,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_21_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_21_data);
	
	$menu_item_22_data = array(
		'menu-item-object-id' => get_option('shb_blog_i_id'),
		'menu-item-title' => 'Blog I',
		'menu-item-parent-id' => $menu_item_21_id,
		'menu-item-position'  => 1,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_22_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_22_data);
	
	$menu_item_23_data = array(
		'menu-item-object-id' => get_option('shb_blog_ii_id'),
		'menu-item-title' => 'Blog II',
		'menu-item-parent-id' => $menu_item_21_id,
		'menu-item-position'  => 2,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_23_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_23_data);
	
	$menu_item_24_data = array(
		'menu-item-object-id' => get_option('shb_blog_iii_id'),
		'menu-item-title' => 'Blog III',
		'menu-item-parent-id' => $menu_item_21_id,
		'menu-item-position'  => 3,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_24_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_24_data);
	
	$menu_item_25_data = array(
		'menu-item-object-id' => get_option('shb_blog_iv_id'),
		'menu-item-title' => 'Blog IV',
		'menu-item-parent-id' => $menu_item_21_id,
		'menu-item-position'  => 4,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_25_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_25_data);
	
	$menu_item_26_data = array(
		'menu-item-object-id' => get_option('shb_photo_gallery_i_id'),
		'menu-item-title' => 'Gallery',
		'menu-item-parent-id' => 0,
		'menu-item-position'  => 4,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_26_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_26_data);
	
	$menu_item_27_data = array(
		'menu-item-object-id' => get_option('shb_photo_gallery_i_id'),
		'menu-item-title' => 'Photo Gallery I',
		'menu-item-parent-id' => $menu_item_26_id,
		'menu-item-position'  => 1,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_27_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_27_data);
	
	$menu_item_28_data = array(
		'menu-item-object-id' => get_option('shb_photo_gallery_ii_id'),
		'menu-item-title' => 'Photo Gallery II',
		'menu-item-parent-id' => $menu_item_26_id,
		'menu-item-position'  => 2,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_28_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_28_data);
	
	$menu_item_29_data = array(
		'menu-item-object-id' => get_option('shb_photo_gallery_iii_id'),
		'menu-item-title' => 'Photo Gallery III',
		'menu-item-parent-id' => $menu_item_26_id,
		'menu-item-position'  => 3,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_29_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_29_data);

	$menu_item_30_data = array(
		'menu-item-object-id' => get_option('shb_about_us_i_id'),
		'menu-item-title' => 'About Us',
		'menu-item-parent-id' => 0,
		'menu-item-position'  => 5,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_30_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_30_data);
	
	$menu_item_31_data = array(
		'menu-item-object-id' => get_option('shb_about_us_i_id'),
		'menu-item-title' => 'About Us I',
		'menu-item-parent-id' => $menu_item_30_id,
		'menu-item-position'  => 1,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_31_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_31_data);
	
	$menu_item_32_data = array(
		'menu-item-object-id' => get_option('shb_about_us_ii_id'),
		'menu-item-title' => 'About Us II',
		'menu-item-parent-id' => $menu_item_30_id,
		'menu-item-position'  => 2,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_32_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_32_data);
	
	$menu_item_33_data = array(
		'menu-item-object-id' => get_option('shb_our_hotels_i_id'),
		'menu-item-title' => 'Our Hotels I',
		'menu-item-parent-id' => $menu_item_30_id,
		'menu-item-position'  => 3,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_33_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_33_data);
	
	$menu_item_34_data = array(
		'menu-item-object-id' => get_option('shb_our_hotels_ii_id'),
		'menu-item-title' => 'Our Hotels II',
		'menu-item-parent-id' => $menu_item_30_id,
		'menu-item-position'  => 4,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_34_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_34_data);

	$menu_item_35_data = array(
		'menu-item-object-id' => get_option('shb_contact_us_i_id'),
		'menu-item-title' => 'Contact Us',
		'menu-item-parent-id' => 0,
		'menu-item-position'  => 6,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_35_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_35_data);
	
	$menu_item_36_data = array(
		'menu-item-object-id' => get_option('shb_contact_us_i_id'),
		'menu-item-title' => 'Contact Us I',
		'menu-item-parent-id' => $menu_item_35_id,
		'menu-item-position'  => 1,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_36_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_36_data);
	
	$menu_item_37_data = array(
		'menu-item-object-id' => get_option('shb_contact_us_ii_id'),
		'menu-item-title' => 'Contact Us II',
		'menu-item-parent-id' => $menu_item_35_id,
		'menu-item-position'  => 2,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_37_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_37_data);
	
	$menu_item_38_data = array(
		'menu-item-object-id' => get_option('shb_contact_us_iii_id'),
		'menu-item-title' => 'Contact Us III',
		'menu-item-parent-id' => $menu_item_35_id,
		'menu-item-position'  => 3,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_38_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_38_data);

}

function sh_import_menu_mobile() {

	/* ----------------------------------------------------------------------------

	   Primary Navigation Mobile

	---------------------------------------------------------------------------- */
	
	$primary_navigation_name = 'Primary Navigation Mobile';
	$primary_navigation_exists = wp_get_nav_menu_object($primary_navigation_name);

	if( !$primary_navigation_exists){
	    $primary_navigation_id = wp_create_nav_menu($primary_navigation_name);
	}
	
	$primary_navigation_object = wp_get_nav_menu_object('Primary Navigation Mobile');
	$primary_navigation_id = (int) $primary_navigation_object->term_id;
	
	$menu_item_1_data = array(
		'menu-item-object-id' => get_option('shb_home_i_id'),
		'menu-item-title' => 'Home',
		'menu-item-parent-id' => 0,
		'menu-item-position'  => 1,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_1_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_1_data);
	
	$menu_item_2_data = array(
		'menu-item-object-id' => get_option('shb_home_i_id'),
		'menu-item-parent-id' => $menu_item_1_id,
		'menu-item-position'  => 2,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_2_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_2_data);
	
	$menu_item_3_data = array(
		'menu-item-object-id' => get_option('shb_home_ii_id'),
		'menu-item-parent-id' => $menu_item_1_id,
		'menu-item-position'  => 3,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_3_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_3_data);
	
	$menu_item_4_data = array(
		'menu-item-object-id' => get_option('shb_home_iii_id'),
		'menu-item-parent-id' => $menu_item_1_id,
		'menu-item-position'  => 4,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_4_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_4_data);
	
	$menu_item_5_data = array(
		'menu-item-object-id' => get_option('shb_home_iv_id'),
		'menu-item-parent-id' => $menu_item_1_id,
		'menu-item-position'  => 5,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_5_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_5_data);
	
	$menu_item_6_data = array(
		'menu-item-object-id' => get_option('shb_home_v_id'),
		'menu-item-parent-id' => $menu_item_1_id,
		'menu-item-position'  => 6,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_6_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_6_data);
	
	$menu_item_7_data = array(
		'menu-item-object-id' => get_option('shb_home_vi_id'),
		'menu-item-parent-id' => $menu_item_1_id,
		'menu-item-position'  => 7,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_7_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_7_data);
	
	$menu_item_8_data = array(
		'menu-item-object-id' => get_option('shb_accommodation_i_2_columns_id'),
		'menu-item-title' => 'Accommodation',
		'menu-item-parent-id' => 0,
		'menu-item-position'  => 2,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_8_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_8_data);

	$menu_item_9_data = array(
		'menu-item-object-id' => get_option('shb_accommodation_i_2_columns_id'),
		'menu-item-title' => 'Accommodation I',
		'menu-item-parent-id' => $menu_item_8_id,
		'menu-item-position'  => 1,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_9_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_9_data);
	
	$menu_item_10_data = array(
		'menu-item-object-id' => get_option('shb_accommodation_i_2_columns_id'),
		'menu-item-title' => '2 Columns',
		'menu-item-parent-id' => $menu_item_9_id,
		'menu-item-position'  => 1,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_10_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_10_data);
	
	$menu_item_11_data = array(
		'menu-item-object-id' => get_option('shb_accommodation_i_3_columns_id'),
		'menu-item-title' => '3 Columns',
		'menu-item-parent-id' => $menu_item_9_id,
		'menu-item-position'  => 2,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_11_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_11_data);
	
	$menu_item_12_data = array(
		'menu-item-object-id' => get_option('shb_accommodation_ii_2_columns_id'),
		'menu-item-title' => 'Accommodation II',
		'menu-item-parent-id' => $menu_item_8_id,
		'menu-item-position'  => 2,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_12_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_12_data);
	
	$menu_item_13_data = array(
		'menu-item-object-id' => get_option('shb_accommodation_ii_2_columns_id'),
		'menu-item-title' => '2 Columns',
		'menu-item-parent-id' => $menu_item_12_id,
		'menu-item-position'  => 1,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_13_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_13_data);
	
	$menu_item_14_data = array(
		'menu-item-object-id' => get_option('shb_accommodation_ii_3_columns_id'),
		'menu-item-title' => '3 Columns',
		'menu-item-parent-id' => $menu_item_12_id,
		'menu-item-position'  => 2,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_14_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_14_data);
	
	$menu_item_15_data = array(
		'menu-item-object-id' => get_option('shb_accommodation_iii_2_columns_id'),
		'menu-item-title' => 'Accommodation III',
		'menu-item-parent-id' => $menu_item_8_id,
		'menu-item-position'  => 3,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_15_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_15_data);
	
	$menu_item_16_data = array(
		'menu-item-object-id' => get_option('shb_accommodation_iii_2_columns_id'),
		'menu-item-title' => '2 Columns',
		'menu-item-parent-id' => $menu_item_15_id,
		'menu-item-position'  => 1,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_16_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_16_data);
	
	$menu_item_17_data = array(
		'menu-item-object-id' => get_option('shb_accommodation_iii_3_columns_id'),
		'menu-item-title' => '3 Columns',
		'menu-item-parent-id' => $menu_item_15_id,
		'menu-item-position'  => 2,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_17_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_17_data);
	
	$menu_item_18_data = array(
		'menu-item-object-id' => get_option( 'shb_demo_accommodation_1' ),
		'menu-item-title' => 'Accommodation Single',
		'menu-item-parent-id' => $menu_item_8_id,
		'menu-item-position'  => 4,
		'menu-item-object' => 'shb_accommodation',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_18_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_18_data);
	
	$menu_item_19_data = array(
		'menu-item-object-id' => get_option( 'shb_demo_accommodation_1' ),
		'menu-item-title' => 'Style I',
		'menu-item-parent-id' => $menu_item_18_id,
		'menu-item-position'  => 1,
		'menu-item-object' => 'shb_accommodation',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_19_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_19_data);
	
	$menu_item_20_data = array(
		'menu-item-object-id' => get_option( 'shb_demo_accommodation_2' ),
		'menu-item-title' => 'Style II',
		'menu-item-parent-id' => $menu_item_18_id,
		'menu-item-position'  => 2,
		'menu-item-object' => 'shb_accommodation',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_20_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_20_data);
	
	$menu_item_21_data = array(
		'menu-item-object-id' => get_option('shb_blog_i_id'),
		'menu-item-title' => 'Blog',
		'menu-item-parent-id' => 0,
		'menu-item-position'  => 3,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_21_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_21_data);
	
	$menu_item_22_data = array(
		'menu-item-object-id' => get_option('shb_blog_i_id'),
		'menu-item-title' => 'Blog I',
		'menu-item-parent-id' => $menu_item_21_id,
		'menu-item-position'  => 1,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_22_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_22_data);
	
	$menu_item_23_data = array(
		'menu-item-object-id' => get_option('shb_blog_ii_id'),
		'menu-item-title' => 'Blog II',
		'menu-item-parent-id' => $menu_item_21_id,
		'menu-item-position'  => 2,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_23_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_23_data);
	
	$menu_item_24_data = array(
		'menu-item-object-id' => get_option('shb_blog_iii_id'),
		'menu-item-title' => 'Blog III',
		'menu-item-parent-id' => $menu_item_21_id,
		'menu-item-position'  => 3,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_24_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_24_data);
	
	$menu_item_25_data = array(
		'menu-item-object-id' => get_option('shb_blog_iv_id'),
		'menu-item-title' => 'Blog IV',
		'menu-item-parent-id' => $menu_item_21_id,
		'menu-item-position'  => 4,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_25_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_25_data);
	
	$menu_item_26_data = array(
		'menu-item-object-id' => get_option('shb_photo_gallery_i_id'),
		'menu-item-title' => 'Gallery',
		'menu-item-parent-id' => 0,
		'menu-item-position'  => 4,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_26_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_26_data);
	
	$menu_item_27_data = array(
		'menu-item-object-id' => get_option('shb_photo_gallery_i_id'),
		'menu-item-title' => 'Photo Gallery I',
		'menu-item-parent-id' => $menu_item_26_id,
		'menu-item-position'  => 1,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_27_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_27_data);
	
	$menu_item_28_data = array(
		'menu-item-object-id' => get_option('shb_photo_gallery_ii_id'),
		'menu-item-title' => 'Photo Gallery II',
		'menu-item-parent-id' => $menu_item_26_id,
		'menu-item-position'  => 2,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_28_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_28_data);
	
	$menu_item_29_data = array(
		'menu-item-object-id' => get_option('shb_photo_gallery_iii_id'),
		'menu-item-title' => 'Photo Gallery III',
		'menu-item-parent-id' => $menu_item_26_id,
		'menu-item-position'  => 3,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_29_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_29_data);

	$menu_item_30_data = array(
		'menu-item-object-id' => get_option('shb_about_us_i_id'),
		'menu-item-title' => 'About Us',
		'menu-item-parent-id' => 0,
		'menu-item-position'  => 5,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_30_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_30_data);
	
	$menu_item_31_data = array(
		'menu-item-object-id' => get_option('shb_about_us_i_id'),
		'menu-item-title' => 'About Us I',
		'menu-item-parent-id' => $menu_item_30_id,
		'menu-item-position'  => 1,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_31_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_31_data);
	
	$menu_item_32_data = array(
		'menu-item-object-id' => get_option('shb_about_us_ii_id'),
		'menu-item-title' => 'About Us II',
		'menu-item-parent-id' => $menu_item_30_id,
		'menu-item-position'  => 2,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_32_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_32_data);
	
	$menu_item_33_data = array(
		'menu-item-object-id' => get_option('shb_our_hotels_i_id'),
		'menu-item-title' => 'Our Hotels I',
		'menu-item-parent-id' => $menu_item_30_id,
		'menu-item-position'  => 3,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_33_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_33_data);
	
	$menu_item_34_data = array(
		'menu-item-object-id' => get_option('shb_our_hotels_ii_id'),
		'menu-item-title' => 'Our Hotels II',
		'menu-item-parent-id' => $menu_item_30_id,
		'menu-item-position'  => 4,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_34_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_34_data);

	$menu_item_35_data = array(
		'menu-item-object-id' => get_option('shb_contact_us_i_id'),
		'menu-item-title' => 'Contact Us',
		'menu-item-parent-id' => 0,
		'menu-item-position'  => 6,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_35_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_35_data);
	
	$menu_item_36_data = array(
		'menu-item-object-id' => get_option('shb_contact_us_i_id'),
		'menu-item-title' => 'Contact Us I',
		'menu-item-parent-id' => $menu_item_35_id,
		'menu-item-position'  => 1,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_36_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_36_data);
	
	$menu_item_37_data = array(
		'menu-item-object-id' => get_option('shb_contact_us_ii_id'),
		'menu-item-title' => 'Contact Us II',
		'menu-item-parent-id' => $menu_item_35_id,
		'menu-item-position'  => 2,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_37_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_37_data);
	
	$menu_item_38_data = array(
		'menu-item-object-id' => get_option('shb_contact_us_iii_id'),
		'menu-item-title' => 'Contact Us III',
		'menu-item-parent-id' => $menu_item_35_id,
		'menu-item-position'  => 3,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_38_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_38_data);

}


function sh_import_menu_left() {
	
	/* ----------------------------------------------------------------------------

	   Primary Navigation Left

	---------------------------------------------------------------------------- */
	
	$primary_navigation_name = 'Primary Navigation Left';
	
	$primary_navigation_exists = wp_get_nav_menu_object($primary_navigation_name);

	if( !$primary_navigation_exists){
	    $primary_navigation_id = wp_create_nav_menu($primary_navigation_name);
	}
	
	$primary_navigation_object = wp_get_nav_menu_object('Primary Navigation Left');
	$primary_navigation_id = (int) $primary_navigation_object->term_id;
	
	$menu_item_1_data = array(
		'menu-item-object-id' => get_option('shb_home_i_id'),
		'menu-item-title' => 'Home',
		'menu-item-parent-id' => 0,
		'menu-item-position'  => 1,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_1_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_1_data);
	
	$menu_item_2_data = array(
		'menu-item-object-id' => get_option('shb_home_i_id'),
		'menu-item-parent-id' => $menu_item_1_id,
		'menu-item-position'  => 2,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_2_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_2_data);
	
	$menu_item_3_data = array(
		'menu-item-object-id' => get_option('shb_home_ii_id'),
		'menu-item-parent-id' => $menu_item_1_id,
		'menu-item-position'  => 3,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_3_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_3_data);
	
	$menu_item_4_data = array(
		'menu-item-object-id' => get_option('shb_home_iii_id'),
		'menu-item-parent-id' => $menu_item_1_id,
		'menu-item-position'  => 4,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_4_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_4_data);
	
	$menu_item_5_data = array(
		'menu-item-object-id' => get_option('shb_home_iv_id'),
		'menu-item-parent-id' => $menu_item_1_id,
		'menu-item-position'  => 5,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_5_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_5_data);
	
	$menu_item_6_data = array(
		'menu-item-object-id' => get_option('shb_home_v_id'),
		'menu-item-parent-id' => $menu_item_1_id,
		'menu-item-position'  => 6,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_6_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_6_data);
	
	$menu_item_7_data = array(
		'menu-item-object-id' => get_option('shb_home_vi_id'),
		'menu-item-parent-id' => $menu_item_1_id,
		'menu-item-position'  => 7,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_7_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_7_data);
	
	$menu_item_8_data = array(
		'menu-item-object-id' => get_option('shb_accommodation_i_2_columns_id'),
		'menu-item-title' => 'Accommodation',
		'menu-item-parent-id' => 0,
		'menu-item-position'  => 2,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_8_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_8_data);

	$menu_item_9_data = array(
		'menu-item-object-id' => get_option('shb_accommodation_i_2_columns_id'),
		'menu-item-title' => 'Accommodation I',
		'menu-item-parent-id' => $menu_item_8_id,
		'menu-item-position'  => 1,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_9_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_9_data);
	
	$menu_item_10_data = array(
		'menu-item-object-id' => get_option('shb_accommodation_i_2_columns_id'),
		'menu-item-title' => '2 Columns',
		'menu-item-parent-id' => $menu_item_9_id,
		'menu-item-position'  => 1,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_10_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_10_data);
	
	$menu_item_11_data = array(
		'menu-item-object-id' => get_option('shb_accommodation_i_3_columns_id'),
		'menu-item-title' => '3 Columns',
		'menu-item-parent-id' => $menu_item_9_id,
		'menu-item-position'  => 2,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_11_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_11_data);
	
	$menu_item_12_data = array(
		'menu-item-object-id' => get_option('shb_accommodation_ii_2_columns_id'),
		'menu-item-title' => 'Accommodation II',
		'menu-item-parent-id' => $menu_item_8_id,
		'menu-item-position'  => 2,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_12_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_12_data);
	
	$menu_item_13_data = array(
		'menu-item-object-id' => get_option('shb_accommodation_ii_2_columns_id'),
		'menu-item-title' => '2 Columns',
		'menu-item-parent-id' => $menu_item_12_id,
		'menu-item-position'  => 1,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_13_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_13_data);
	
	$menu_item_14_data = array(
		'menu-item-object-id' => get_option('shb_accommodation_ii_3_columns_id'),
		'menu-item-title' => '3 Columns',
		'menu-item-parent-id' => $menu_item_12_id,
		'menu-item-position'  => 2,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_14_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_14_data);
	
	$menu_item_15_data = array(
		'menu-item-object-id' => get_option('shb_accommodation_iii_2_columns_id'),
		'menu-item-title' => 'Accommodation III',
		'menu-item-parent-id' => $menu_item_8_id,
		'menu-item-position'  => 3,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_15_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_15_data);
	
	$menu_item_16_data = array(
		'menu-item-object-id' => get_option('shb_accommodation_iii_2_columns_id'),
		'menu-item-title' => '2 Columns',
		'menu-item-parent-id' => $menu_item_15_id,
		'menu-item-position'  => 1,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_16_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_16_data);
	
	$menu_item_17_data = array(
		'menu-item-object-id' => get_option('shb_accommodation_iii_3_columns_id'),
		'menu-item-title' => '3 Columns',
		'menu-item-parent-id' => $menu_item_15_id,
		'menu-item-position'  => 2,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_17_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_17_data);
	
	$menu_item_18_data = array(
		'menu-item-object-id' => get_option( 'shb_demo_accommodation_1' ),
		'menu-item-title' => 'Accommodation Single',
		'menu-item-parent-id' => $menu_item_8_id,
		'menu-item-position'  => 4,
		'menu-item-object' => 'shb_accommodation',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_18_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_18_data);
	
	$menu_item_19_data = array(
		'menu-item-object-id' => get_option( 'shb_demo_accommodation_1' ),
		'menu-item-title' => 'Style I',
		'menu-item-parent-id' => $menu_item_18_id,
		'menu-item-position'  => 1,
		'menu-item-object' => 'shb_accommodation',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_19_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_19_data);
	
	$menu_item_20_data = array(
		'menu-item-object-id' => get_option( 'shb_demo_accommodation_2' ),
		'menu-item-title' => 'Style II',
		'menu-item-parent-id' => $menu_item_18_id,
		'menu-item-position'  => 2,
		'menu-item-object' => 'shb_accommodation',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_20_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_20_data);
	
	$menu_item_21_data = array(
		'menu-item-object-id' => get_option('shb_blog_i_id'),
		'menu-item-title' => 'Blog',
		'menu-item-parent-id' => 0,
		'menu-item-position'  => 3,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_21_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_21_data);
	
	$menu_item_22_data = array(
		'menu-item-object-id' => get_option('shb_blog_i_id'),
		'menu-item-title' => 'Blog I',
		'menu-item-parent-id' => $menu_item_21_id,
		'menu-item-position'  => 1,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_22_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_22_data);
	
	$menu_item_23_data = array(
		'menu-item-object-id' => get_option('shb_blog_ii_id'),
		'menu-item-title' => 'Blog II',
		'menu-item-parent-id' => $menu_item_21_id,
		'menu-item-position'  => 2,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_23_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_23_data);
	
	$menu_item_24_data = array(
		'menu-item-object-id' => get_option('shb_blog_iii_id'),
		'menu-item-title' => 'Blog III',
		'menu-item-parent-id' => $menu_item_21_id,
		'menu-item-position'  => 3,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_24_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_24_data);
	
	$menu_item_25_data = array(
		'menu-item-object-id' => get_option('shb_blog_iv_id'),
		'menu-item-title' => 'Blog IV',
		'menu-item-parent-id' => $menu_item_21_id,
		'menu-item-position'  => 4,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_25_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_25_data);

}

function sh_import_menu_right() {

	/* ----------------------------------------------------------------------------

	   Primary Navigation Right

	---------------------------------------------------------------------------- */
	
	$primary_navigation_name = 'Primary Navigation Right';
	$primary_navigation_exists = wp_get_nav_menu_object($primary_navigation_name);

	if( !$primary_navigation_exists){
	    $primary_navigation_id = wp_create_nav_menu($primary_navigation_name);
	}
	
	$primary_navigation_object = wp_get_nav_menu_object('Primary Navigation Right');
	$primary_navigation_id = (int) $primary_navigation_object->term_id;
	
	$menu_item_26_data = array(
		'menu-item-object-id' => get_option('shb_photo_gallery_i_id'),
		'menu-item-title' => 'Gallery',
		'menu-item-parent-id' => 0,
		'menu-item-position'  => 4,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_26_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_26_data);
	
	$menu_item_27_data = array(
		'menu-item-object-id' => get_option('shb_photo_gallery_i_id'),
		'menu-item-title' => 'Photo Gallery I',
		'menu-item-parent-id' => $menu_item_26_id,
		'menu-item-position'  => 1,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_27_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_27_data);
	
	$menu_item_28_data = array(
		'menu-item-object-id' => get_option('shb_photo_gallery_ii_id'),
		'menu-item-title' => 'Photo Gallery II',
		'menu-item-parent-id' => $menu_item_26_id,
		'menu-item-position'  => 2,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_28_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_28_data);
	
	$menu_item_29_data = array(
		'menu-item-object-id' => get_option('shb_photo_gallery_iii_id'),
		'menu-item-title' => 'Photo Gallery III',
		'menu-item-parent-id' => $menu_item_26_id,
		'menu-item-position'  => 3,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_29_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_29_data);

	$menu_item_30_data = array(
		'menu-item-object-id' => get_option('shb_about_us_i_id'),
		'menu-item-title' => 'About Us',
		'menu-item-parent-id' => 0,
		'menu-item-position'  => 5,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_30_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_30_data);
	
	$menu_item_31_data = array(
		'menu-item-object-id' => get_option('shb_about_us_i_id'),
		'menu-item-title' => 'About Us I',
		'menu-item-parent-id' => $menu_item_30_id,
		'menu-item-position'  => 1,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_31_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_31_data);
	
	$menu_item_32_data = array(
		'menu-item-object-id' => get_option('shb_about_us_ii_id'),
		'menu-item-title' => 'About Us II',
		'menu-item-parent-id' => $menu_item_30_id,
		'menu-item-position'  => 2,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_32_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_32_data);
	
	$menu_item_33_data = array(
		'menu-item-object-id' => get_option('shb_our_hotels_i_id'),
		'menu-item-title' => 'Our Hotels I',
		'menu-item-parent-id' => $menu_item_30_id,
		'menu-item-position'  => 3,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_33_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_33_data);
	
	$menu_item_34_data = array(
		'menu-item-object-id' => get_option('shb_our_hotels_ii_id'),
		'menu-item-title' => 'Our Hotels II',
		'menu-item-parent-id' => $menu_item_30_id,
		'menu-item-position'  => 4,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_34_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_34_data);

	$menu_item_35_data = array(
		'menu-item-object-id' => get_option('shb_contact_us_i_id'),
		'menu-item-title' => 'Contact Us',
		'menu-item-parent-id' => 0,
		'menu-item-position'  => 6,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_35_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_35_data);
	
	$menu_item_36_data = array(
		'menu-item-object-id' => get_option('shb_contact_us_i_id'),
		'menu-item-title' => 'Contact Us I',
		'menu-item-parent-id' => $menu_item_35_id,
		'menu-item-position'  => 1,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_36_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_36_data);
	
	$menu_item_37_data = array(
		'menu-item-object-id' => get_option('shb_contact_us_ii_id'),
		'menu-item-title' => 'Contact Us II',
		'menu-item-parent-id' => $menu_item_35_id,
		'menu-item-position'  => 2,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_37_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_37_data);
	
	$menu_item_38_data = array(
		'menu-item-object-id' => get_option('shb_contact_us_iii_id'),
		'menu-item-title' => 'Contact Us III',
		'menu-item-parent-id' => $menu_item_35_id,
		'menu-item-position'  => 3,
		'menu-item-object' => 'page',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish'
	);
	$menu_item_38_id = wp_update_nav_menu_item($primary_navigation_id, 0, $menu_item_38_data);

}

function sh_set_homepage() {
	
	update_option( 'page_on_front', get_option('shb_home_i_id') );
	update_option( 'show_on_front', 'page' );
	
}

function sh_delete_widgets() {
	
    $new_active_widgets = array(
        'sohohotel-primary-widget-area' => array(),
        'sohohotel-footer-widget-area' => array()
    );
	
    update_option('sidebars_widgets', $new_active_widgets);
	
}

function sh_import_widgets() {
	
	update_option('widget_shb_booking_widget', array(
	    1 => array(
	        'title' => 'Booking Form',
			'hotel_select' => 'yes'
	    ),
		'_multiwidget' => 1
	));
	
	update_option('widget_sohohotel_recent_posts_widget', array(
	    1 => array(
	        'title' => 'Recent Posts',
			'post_limit' => '3'
	    ),
		'_multiwidget' => 1
	));
	
	update_option('widget_categories', array(
	    1 => array(
	        'title' => 'Categories'
	    ),
		'_multiwidget' => 1
	));
	
	update_option('widget_tag_cloud', array(
	    1 => array(
	        'title' => 'Tags'
	    ),
		'_multiwidget' => 1
	));
	
	update_option('widget_sohohotel_social_about_widget', array(
	    1 => array(
	        'title' => 'Follow Us',
			'about_us' => '<p>And keep up to date with Soho Hotel</p>',
			'facebook' => '#',
			'twitter' => '#',
			'instagram' => '#',
			'yelp' => '',
			'youtube' => '#',
			'tripadvisor' => '#',
			'pinterest' => '',
			'skype' => '',
			'flickr' => '',
			'googleplus' => '',
			'tumblr' => '',
			'vimeo' => ''
	    ),
		'_multiwidget' => 1
	));
	
	update_option('widget_sohohotel_contact_widget', array(
	    1 => array(
	        'title' => 'Contact',
			'contact_address' => '55 Columbus Circle, New York, NY',
			'contact_phone' => '1111-2222-3333',
			'contact_email' => 'booking@example.com'
	    ),
		'_multiwidget' => 1
	));
	
	update_option('widget_newsletterwidget', array(
	    1 => array(
	        'title' => 'Newsletter',
			'text' => '<p>Sign up to our newsletter for exclusive offers.</p>'
	    ),
		'_multiwidget' => 1
	));
	
    $new_active_widgets = array(
        'sohohotel-primary-widget-area' => array(
            'shb_booking_widget-1',
			'sohohotel_recent_posts_widget-1',
			'categories-1',
			'tag_cloud-1'
        ),
        'sohohotel-footer-widget-area' => array(
            'sohohotel_social_about_widget-1',
			'sohohotel_contact_widget-1',
			'newsletterwidget-1'
        )
    );
	
    update_option('sidebars_widgets', $new_active_widgets);
	
}

function sh_import_theme_options() {

	$sohohotel_default_header_image = wp_get_attachment_image_src(get_option('shb_demo_image_8'),'full-size');
	set_theme_mod('sohohotel_default_header_image',$sohohotel_default_header_image[0]);

	set_theme_mod('sohohotel_address','55 Columbus Circle, New York, NY');
	set_theme_mod('sohohotel_header_style','header-1');
	set_theme_mod('sohohotel_phone_number','1111-2222-3333');
	set_theme_mod('sohohotel_address','55 Columbus Circle, New York, NY');
	set_theme_mod('sohohotel_button_label_1','My Account');
	set_theme_mod('sohohotel_button_link_1',get_permalink(get_option('shb_woocommerce_my_account_id')));
	set_theme_mod('sohohotel_button_icon_1','fa-user');
	set_theme_mod('sohohotel_button_target_1','self');
	set_theme_mod('sohohotel_button_label_2','Book Now');
	set_theme_mod('sohohotel_button_link_2',get_permalink(get_option('shb_booking_id')));
	set_theme_mod('sohohotel_button_icon_2','fa-concierge-bell');
	set_theme_mod('sohohotel_button_target_2','self');
	set_theme_mod('sohohotel_header_language','no');
	set_theme_mod('sohohotel_header_currency','yes');
	set_theme_mod('sohohotel_footer_msg','&copy; ' . date("Y") . ' Soho Hotel. All Rights Reserved');
	set_theme_mod('sohohotel_footer_columns','3');
	set_theme_mod('sohohotel_footer_language','no');
	set_theme_mod('sohohotel_footer_currency','yes');
	set_theme_mod('sohohotel_category_layout','right-sidebar');
	set_theme_mod('sohohotel_search_layout','full-width');
	set_theme_mod('sohohotel_main_color','#b99470');
	set_theme_mod('sohohotel_primary_font_family',"'Work Sans', sans-serif");
	set_theme_mod('sohohotel_primary_font_weights',"Work+Sans:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500");
	set_theme_mod('sohohotel_secondary_font_family',"'Work Sans', sans-serif");
	set_theme_mod('sohohotel_secondary_font_weights',"Work+Sans:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500");
	
	$ids = get_option('shb_home_i_id') . ',' . get_option('shb_home_ii_id') . ',' . get_option('shb_home_iii_id') . ',' . get_option('shb_home_iv_id') . ',' . get_option('shb_home_v_id') . ',' . get_option('shb_home_vi_id');
	
	set_theme_mod('transparent-header-page-ids',$ids);
	
}

function sh_import_settings() {

	update_option( 'shb_manual_booking_confirmation', 'automatic' );
	update_option( 'shb_hotel_address', 'Soho Hotel Resort & Spa, 55 Columbus Circle, New York, NY' );
	update_option( 'shb_hotel_phone', '1111-2222-3333' );
	update_option( 'shb_date_format', 'DD/MM/YYYY' );
	update_option( 'shb_my_account_page', get_option('shb_woocommerce_my_account_id') );
	update_option( 'shb_booking_page', get_option('shb_booking_id') );
	update_option( 'shb_checkin_time', '4:00pm' );
	update_option( 'shb_checkout_time', '11:00am' );
	update_option( 'shb_display_hotel_selection', 'no' );
	
	$guestclass_ids = shb_get_all_ids('shb_guestclass');
	
	foreach($guestclass_ids as $guestclass_id) {
		update_option( 'shb_' . $guestclass_id . '_preset', '2' );
		update_option( 'shb_' . $guestclass_id . '_preset', '2' );
	}
	
	update_option( 'shb_email_address', get_option('admin_email') );
	update_option( 'shb_pending_message_1', 'Thank you for booking with Soho Hotel, we look forward to welcoming you to our hotel soon. In the meantime if you have any questions please do not hesitate to get in touch with us.' );
	update_option( 'shb_pending_message_2', 'Thank you for booking with Soho Hotel!' );
	update_option( 'shb_confirmed_message_1', 'Thank you for booking with Soho Hotel, we look forward to welcoming you to our hotel soon. In the meantime if you have any questions please do not hesitate to get in touch with us.' );
	update_option( 'shb_confirmed_message_2', 'Thank you for booking with Soho Hotel!' );
	update_option( 'shb_cancelled_message_1', 'Thank you for booking with Soho Hotel, we look forward to welcoming you to our hotel soon. In the meantime if you have any questions please do not hesitate to get in touch with us.' );
	update_option( 'shb_cancelled_message_2', 'Thank you for booking with Soho Hotel!' );
	update_option( 'shb_booking_success_message', 'Thank you for booking, we look forward to welcoming you to our hotel soon, and in the meantime if you have any questions please do not hesitate to get in touch with us via phone or email and we’ll be happy to hear from you.' );
	
	update_option( 'shb_booking_page_sidebar_title', 'Need Assistance?' );
	update_option( 'shb_booking_page_sidebar_message', 'Our dedicated reservations team is ready to help you around the clock.' );
	
	update_option( 'shb_currency_code_1', 'USD' );
	update_option( 'shb_currency_symbol_1', '$' );
	update_option( 'shb_currency_symbol_position_1', 'before' );
	update_option( 'shb_decimal_places_1', '2' );
	update_option( 'shb_decimal_separator_1', '.' );
	update_option( 'shb_thousand_separator_1', ',' );
	update_option( 'shb_conversion_multiplier_1', '1' );
	
	update_option( 'shb_currency_code_2', 'EUR' );
	update_option( 'shb_currency_symbol_2', '€' );
	update_option( 'shb_currency_symbol_position_2', 'before' );
	update_option( 'shb_decimal_places_2', '2' );
	update_option( 'shb_decimal_separator_2', ',' );
	update_option( 'shb_thousand_separator_2', '.' );
	update_option( 'shb_conversion_multiplier_2', '0.85' );
	
	update_option( 'shb_currency_code_3', 'GBP' );
	update_option( 'shb_currency_symbol_3', '£' );
	update_option( 'shb_currency_symbol_position_3', 'before' );
	update_option( 'shb_decimal_places_3', '2' );
	update_option( 'shb_decimal_separator_3', '.' );
	update_option( 'shb_thousand_separator_3', ',' );
	update_option( 'shb_conversion_multiplier_3', '0.72' );
	
	// WP Bakery Page Builder
	update_option('wpb_js_use_custom','1');
	update_option('wpb_js_margin','35px');
	update_option('wpb_js_gutter','30');
	
	// WooCommerce
	update_option( 'woocommerce_checkout_page_id', get_option('shb_booking_id') );
	update_option( 'woocommerce_myaccount_page_id', get_option('shb_woocommerce_my_account_id') );
	
}

function sh_delete_all() {
	
	// Delete all post type posts
	$post_ids = get_posts(array(
	    'fields'          => 'ids',
	    'posts_per_page'  => -1,
		'post_type' => array('page','post','testimonial','shb_accommodation','shb_additionalfee','shb_booking','shb_condition','shb_guestclass','shb_offer','shb_rate','shb_ratevariation','shb_season','wpcf7_contact_form')
	));
	
	foreach ($post_ids as $post_id) {
		wp_delete_post( $post_id, true );
	}
	
	// Delete all media files
	$attachment_ids = get_posts(array(
	    'fields'          => 'ids',
	    'posts_per_page'  => -1,
		'post_type' => 'attachment'
	));
	
	foreach ($attachment_ids as $attachment_id) {
		wp_delete_attachment( $attachment_id );
	}
	
	// Delete post categories
	$args = array(
	    "hide_empty" => 0,
	    "type"       => "post",
	    "orderby"    => "name",
	    "order"      => "ASC"
	);
	$types = get_categories($args);

	foreach ( $types as $type) {
	    wp_delete_category( $type->term_id );
	}
	
	// Delete tags
	$tags = get_tags(array(
		'hide_empty' => false
	));
	
	foreach ($tags as $tag) {
		wp_delete_term( $tag->term_id, 'post_tag' );
	}
	
	// Delete slides
	global $wpdb;
	$wpdb->query("TRUNCATE TABLE `wp_revslider_css`");
	$wpdb->query("TRUNCATE TABLE `wp_revslider_layer_animations`");
	$wpdb->query("TRUNCATE TABLE `wp_revslider_navigations`");
	$wpdb->query("TRUNCATE TABLE `wp_revslider_sliders`");
	$wpdb->query("TRUNCATE TABLE `wp_revslider_slides`");
	$wpdb->query("TRUNCATE TABLE `wp_revslider_static_slides`");
	
	// Delete menus
	$primary_navigation_name = 'Primary Navigation';
	wp_delete_nav_menu($primary_navigation_name);
	
	// Delete widgets
    $new_active_widgets = array(
        'sohohotel-primary-widget-area' => array(),
        'sohohotel-footer-widget-area' => array()
    );
	
    update_option('sidebars_widgets', $new_active_widgets);
	
	// Delete settings
	update_option( 'shb_manual_booking_confirmation', '' );
	update_option( 'shb_hotel_address', '' );
	update_option( 'shb_hotel_phone', '' );
	update_option( 'shb_date_format', '' );
	update_option( 'shb_my_account_page', '' );
	update_option( 'shb_booking_page', '' );
	update_option( 'shb_checkin_time', '' );
	update_option( 'shb_checkout_time', '' );
	update_option( 'shb_display_hotel_selection', '' );
	
	$guestclass_ids = shb_get_all_ids('shb_guestclass');
	
	foreach($guestclass_ids as $guestclass_id) {
		update_option( 'shb_' . $guestclass_id . '_preset', '' );
		update_option( 'shb_' . $guestclass_id . '_preset', '' );
	}
	
	update_option( 'shb_email_address', '' );
	update_option( 'shb_pending_message_1', '' );
	update_option( 'shb_pending_message_2', '' );
	update_option( 'shb_confirmed_message_1', '' );
	update_option( 'shb_confirmed_message_2', '' );
	update_option( 'shb_cancelled_message_1', '' );
	update_option( 'shb_cancelled_message_2', '' );
	update_option( 'shb_booking_success_message', '' );
	
	update_option( 'shb_currency_code_1', '' );
	update_option( 'shb_currency_symbol_1', '' );
	update_option( 'shb_currency_symbol_position_1', '' );
	update_option( 'shb_decimal_places_1', '' );
	update_option( 'shb_decimal_separator_1', '' );
	update_option( 'shb_thousand_separator_1', '' );
	update_option( 'shb_conversion_multiplier_1', '' );
	
	update_option( 'shb_currency_code_2', '' );
	update_option( 'shb_currency_symbol_2', '' );
	update_option( 'shb_currency_symbol_position_2', '' );
	update_option( 'shb_decimal_places_2', '' );
	update_option( 'shb_decimal_separator_2', '' );
	update_option( 'shb_thousand_separator_2', '' );
	update_option( 'shb_conversion_multiplier_2', '' );
	
	update_option( 'shb_currency_code_3', '' );
	update_option( 'shb_currency_symbol_3', '' );
	update_option( 'shb_currency_symbol_position_3', '' );
	update_option( 'shb_decimal_places_3', '' );
	update_option( 'shb_decimal_separator_3', '' );
	update_option( 'shb_thousand_separator_3', '' );
	update_option( 'shb_conversion_multiplier_3', '' );
	
	update_option('wpb_js_use_custom','');
	update_option('wpb_js_margin','');
	update_option('wpb_js_gutter','');
	
	// Delete theme options
	set_theme_mod('sohohotel_default_header_image','');
	set_theme_mod('sohohotel_address','');
	set_theme_mod('sohohotel_header_style','');
	set_theme_mod('sohohotel_phone_number','');
	set_theme_mod('sohohotel_address','');
	set_theme_mod('sohohotel_button_label_1','');
	set_theme_mod('sohohotel_button_link_1','');
	set_theme_mod('sohohotel_button_icon_1','');
	set_theme_mod('sohohotel_button_target_1','');
	set_theme_mod('sohohotel_button_label_2','');
	set_theme_mod('sohohotel_button_link_2','');
	set_theme_mod('sohohotel_button_icon_2','');
	set_theme_mod('sohohotel_button_target_2','');
	set_theme_mod('sohohotel_header_language','');
	set_theme_mod('sohohotel_header_currency','');
	set_theme_mod('sohohotel_footer_msg','');
	set_theme_mod('sohohotel_footer_columns','');
	set_theme_mod('sohohotel_footer_language','');
	set_theme_mod('sohohotel_footer_currency','');
	set_theme_mod('sohohotel_category_layout','');
	set_theme_mod('sohohotel_search_layout','');
	set_theme_mod('sohohotel_main_color','');
	set_theme_mod('sohohotel_header_bg_color','');
	set_theme_mod('sohohotel_header_primary_text_color','');
	set_theme_mod('sohohotel_header_secondary_text_color','');
	set_theme_mod('sohohotel_header_border_color','');
	set_theme_mod('sohohotel_top_right_button_background_color','');
	set_theme_mod('sohohotel_top_right_button_text_color','');
	set_theme_mod('sohohotel_booking_form_button_bg_color','');
	set_theme_mod('sohohotel_booking_form_button_text_color','');
	set_theme_mod('sohohotel_booking_form_icon_color','');
	set_theme_mod('sohohotel_footer_background_color','');
	set_theme_mod('sohohotel_footer_text_color','');
	set_theme_mod('sohohotel_footer_bottom_bar_background_color','');
	set_theme_mod('sohohotel_footer_bottom_bar_text_color','');
	set_theme_mod('sohohotel_slideshow_button_background_color','');
	set_theme_mod('sohohotel_slideshow_button_text_color','');
	set_theme_mod('sohohotel_title_line_color','');
	set_theme_mod('sohohotel_datepicker_hover_color','');
	set_theme_mod('sohohotel_datepicker_select_color_1','');
	set_theme_mod('sohohotel_datepicker_select_color_2','');
	set_theme_mod('sohohotel_booking_background_color','');
	set_theme_mod('sohohotel_booking_primary_text_color','');
	set_theme_mod('sohohotel_booking_secondary_text_color','');
	set_theme_mod('sohohotel_booking_border_color','');
	set_theme_mod('sohohotel_footer_alt_text_color','');
	set_theme_mod('transparent-header-page-ids','');
	set_theme_mod('sohohotel_primary_font_family','');
	set_theme_mod('sohohotel_primary_font_weights','');
	set_theme_mod('sohohotel_secondary_font_family','');
	set_theme_mod('sohohotel_secondary_font_weights','');
	
	// Delete accommodation types
	$accommodation_types = get_terms(array(
		'taxonomy' => 'accommodation-types',
		'hide_empty' => false
	));

	foreach ($accommodation_types as $term) {
		wp_delete_term($term->term_id, 'accommodation-types');
	}
	
	// Delete accommodation hotels
	$accommodation_hotels = get_terms(array(
		'taxonomy' => 'accommodation-categories',
		'hide_empty' => false
	));
	
	foreach ($accommodation_hotels as $term) {
		wp_delete_term($term->term_id, 'accommodation-categories');
	}

}