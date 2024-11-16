<?php



/* ----------------------------------------------------------------------------

   Register post type

---------------------------------------------------------------------------- */
add_action( 'init', 'shb_booking_post_type' );
function shb_booking_post_type() {
	
	$labels = array(
        'name'                  => __('Bookings','sohohotel_booking'),
        'singular_name'         => __('Booking','sohohotel_booking'),
        'menu_name'             => __('Bookings','sohohotel_booking'),
        'parent_item_colon'     => __('Parent Booking:','sohohotel_booking'),
        'all_items'             => __('Bookings','sohohotel_booking'),
        'view_item'             => __('View Booking','sohohotel_booking'),
        'add_new_item'          => __('Add New Booking','sohohotel_booking'),
        'add_new'               => __('Add New','sohohotel_booking'),
        'edit_item'             => __('Edit Booking','sohohotel_booking'),
        'update_item'           => __('Update Booking','sohohotel_booking'),
        'search_items'          => __('Search Guest','sohohotel_booking'),
        'not_found'             => __('Not found','sohohotel_booking'),
        'not_found_in_trash'    => __('Not found in Trash','sohohotel_booking'),
    );

    $args = array(
        'label'                 => __('Booking','sohohotel_booking'),
        'description'           => '',
        'labels'                => $labels,
        'supports'              => array('title'),
        'hierarchical'          => false,
        'public'                => false,
        'show_ui'               => true,
        'show_in_menu'          => 'shb_booking_calendar',
        'show_in_nav_menus'     => false,
        'show_in_admin_bar'     => true,
        'menu_position'         => 5,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => true,
        'publicly_queryable'    => false,
        'capability_type'       => 'page',
		'rewrite' => array('slug' => esc_html__( 'booking', 'sohohotel_booking' ),'with_front' => false),
    );

    register_post_type( 'shb_booking', $args );
	
}



/* ----------------------------------------------------------------------------

   Register custom post status

---------------------------------------------------------------------------- */ 
add_action( 'init', 'shb_booking_custom_post_status' );
function shb_booking_custom_post_status(){
    
	register_post_status('shb_pending', array(
        'label'                     => _x( 'Pending', 'post' ),
		'public'                    => true,
		'exclude_from_search'       => false,
		'show_in_admin_all_list'    => true,
		'show_in_admin_status_list' => true,
        'label_count'               => _n_noop( 'Pending <span class="count">(%s)</span>', 'Pending <span class="count">(%s)</span>','sohohotel_booking' ),
    ));
	
	register_post_status('shb_confirmed', array(
        'label'                     => _x( 'Confirmed', 'post' ),
		'public'                    => true,
		'exclude_from_search'       => false,
		'show_in_admin_all_list'    => true,
		'show_in_admin_status_list' => true,
        'label_count'               => _n_noop( 'Confirmed <span class="count">(%s)</span>', 'Confirmed <span class="count">(%s)</span>','sohohotel_booking' ),
    ));
	
	register_post_status('shb_cancelled', array(
        'label'                     => _x( 'Cancelled', 'post' ),
		'public'                    => true,
		'exclude_from_search'       => false,
		'show_in_admin_all_list'    => true,
		'show_in_admin_status_list' => true,
        'label_count'               => _n_noop( 'Cancelled <span class="count">(%s)</span>', 'Cancelled <span class="count">(%s)</span>','sohohotel_booking' ),
    ));
	
	register_post_status('shb_ical', array(
        'label'                     => _x( 'iCal', 'post' ),
		'public'                    => true,
		'exclude_from_search'       => false,
		'show_in_admin_all_list'    => true,
		'show_in_admin_status_list' => true,
        'label_count'               => _n_noop( 'iCal <span class="count">(%s)</span>', 'iCal <span class="count">(%s)</span>','sohohotel_booking' ),
    ));
	
	register_post_status('shb_maintenance', array(
        'label'                     => _x( 'Maintenance', 'post' ),
		'public'                    => true,
		'exclude_from_search'       => false,
		'show_in_admin_all_list'    => true,
		'show_in_admin_status_list' => true,
        'label_count'               => _n_noop( 'Maintenance <span class="count">(%s)</span>', 'Maintenance <span class="count">(%s)</span>','sohohotel_booking' ),
    ));
	
}



/* ----------------------------------------------------------------------------

   Meta boxes

---------------------------------------------------------------------------- */
add_action('add_meta_boxes', 'shb_booking_meta_init');
function shb_booking_meta_init() {
	
    global $post;
    $post_status = get_post_status($post->ID);
	
	if($post_status !== 'shb_ical') {
		
		add_meta_box(
			'shb_booking_accommodation',
			__('Accommodation','sohohotel_booking'),
			'shb_booking_accommodation_meta_box',
			'shb_booking',
			'normal',
			'high'
		);
	
		add_meta_box(
			'shb_booking_additionalfee',
			__('Additional Fees','sohohotel_booking'),
			'shb_booking_additionalfee_meta_box',
			'shb_booking',
			'normal',
			'low'
		);
	
		add_meta_box(
			'shb_booking_guest_information',
			__('Guest Information','sohohotel_booking'),
			'shb_booking_guest_information_meta_box',
			'shb_booking',
			'normal',
			'high'
		);
	
		add_meta_box(
			'shb_booking_publish',
			__('Booking Status','sohohotel_booking'),
			'shb_booking_publish_meta_box',
			'shb_booking',
			'side',
			'high'
		);
	
		add_meta_box(
			'shb_booking_sendemail',
			__('Send Email','sohohotel_booking'),
			'shb_booking_sendemail_meta_box',
			'shb_booking',
			'side',
			'low'
		);
		
		if(function_exists('sht_get_selected_language')){
		
			add_meta_box(
				'shb_booking_language',
				__('Customer Language','sohohotel_booking'),
				'shb_booking_language_meta_box',
				'shb_booking',
				'side',
				'low'
			);
		
		}
	
		add_meta_box(
			'shb_booking_summary',
			__('Booking Summary','sohohotel_booking'),
			'shb_booking_summary_meta_box',
			'shb_booking',
			'side',
			'low'
		);
	
		add_meta_box(
			'shb_booking_woocommerce',
			__('WooCommerce','sohohotel_booking'),
			'shb_booking_woocommerce_meta_box',
			'shb_booking',
			'side',
			'low'
		);
		
	} else {
		
		exit();
		
	}
	
    add_action('save_post','shb_booking_meta_save');

}



/* ----------------------------------------------------------------------------

   Meta box content

---------------------------------------------------------------------------- */
function shb_booking_accommodation_meta_box() {
	
    global $post;
    $booking_data = get_post_meta($post->ID);
    include(SHB_PLUGIN_DIR . '/includes/templates/backend/booking/shb-booking-accommodation.htm.php');
    echo '<input type="hidden" name="booking_meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';

}



/* ----------------------------------------------------------------------------

   Meta box content

---------------------------------------------------------------------------- */
function shb_booking_additionalfee_meta_box() {
	
    global $post;
    $booking_data = get_post_meta($post->ID);
    include(SHB_PLUGIN_DIR . '/includes/templates/backend/booking/shb-booking-additionalfee.htm.php');
    echo '<input type="hidden" name="booking_meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';

}



/* ----------------------------------------------------------------------------

   Meta box content

---------------------------------------------------------------------------- */
function shb_booking_guest_information_meta_box() {
	
    global $post;
    $booking_data = get_post_meta($post->ID);
    include(SHB_PLUGIN_DIR . '/includes/templates/backend/booking/shb-booking-guest-information.htm.php');
    echo '<input type="hidden" name="booking_meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';

}



/* ----------------------------------------------------------------------------

   Meta box content

---------------------------------------------------------------------------- */
function shb_booking_publish_meta_box() {
	
    global $post;
    $booking_data = get_post_meta($post->ID);
    include(SHB_PLUGIN_DIR . '/includes/templates/backend/booking/shb-booking-publish.htm.php');
    echo '<input type="hidden" name="booking_meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';

}



/* ----------------------------------------------------------------------------

   Meta box content

---------------------------------------------------------------------------- */
function shb_booking_sendemail_meta_box() {
	
    global $post;
    $booking_data = get_post_meta($post->ID);
    include(SHB_PLUGIN_DIR . '/includes/templates/backend/booking/shb-booking-sendmail.htm.php');
    echo '<input type="hidden" name="booking_meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';

}



/* ----------------------------------------------------------------------------

   Meta box content

---------------------------------------------------------------------------- */
function shb_booking_language_meta_box() {
	
    global $post;
    $booking_data = get_post_meta($post->ID);
    include(SHB_PLUGIN_DIR . '/includes/templates/backend/booking/shb-booking-language.htm.php');
    echo '<input type="hidden" name="booking_meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';

}



/* ----------------------------------------------------------------------------

   Meta box content

---------------------------------------------------------------------------- */
function shb_booking_summary_meta_box() {
	
    global $post;
    $booking_data = get_post_meta($post->ID);
    include(SHB_PLUGIN_DIR . '/includes/templates/backend/booking/shb-booking-summary.htm.php');
    echo '<input type="hidden" name="booking_meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';

}



/* ----------------------------------------------------------------------------

   Meta box content

---------------------------------------------------------------------------- */
function shb_booking_woocommerce_meta_box() {
	
    global $post;
    $booking_data = get_post_meta($post->ID);
    include(SHB_PLUGIN_DIR . '/includes/templates/backend/booking/shb-booking-woocommerce.htm.php');
    echo '<input type="hidden" name="booking_meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';

}



/* ----------------------------------------------------------------------------

   Meta box content

---------------------------------------------------------------------------- */
function shb_booking_ical_meta_box() {
	
    global $post;
    $booking_data = get_post_meta($post->ID);
    include(SHB_PLUGIN_DIR . '/includes/templates/backend/booking/shb-booking-ical.htm.php');
    echo '<input type="hidden" name="booking_meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';

}



/* ----------------------------------------------------------------------------

   Post type custom columns

---------------------------------------------------------------------------- */
add_filter( 'manage_shb_booking_posts_columns', 'shb_booking_custom_columns' );
function shb_booking_custom_columns($columns) {
	
	unset($columns['title']);
	unset($columns['date']);
    unset( $columns['author'] );
	$columns['booking_title'] = __( 'Title', 'sohohotel_booking' );
    $columns['booking_rooms'] = __( 'Room(s)', 'sohohotel_booking' );
    $columns['booking_checkin'] = __( 'Check In', 'sohohotel_booking' );
	$columns['booking_checkout'] = __( 'Check Out', 'sohohotel_booking' );
	$columns['booking_received'] = __( 'Received', 'sohohotel_booking' );
	$columns['booking_status'] = __( 'Status', 'sohohotel_booking' );
	$columns['booking_wc_payment_id'] = __( 'WC Payment ID', 'sohohotel_booking' );
    return $columns;
	
}



/* ----------------------------------------------------------------------------

   Custom columns content

---------------------------------------------------------------------------- */
add_action( 'manage_shb_booking_posts_custom_column' , 'shb_booking_custom_columns_content', 10, 2 );
function shb_booking_custom_columns_content( $column, $post_id ) {
	
	$booking_data = get_post_meta(get_the_id());
	$accommodation_ids = shb_get_all_ids('shb_accommodation');
	$season_ids = shb_get_all_ids('shb_season');
	$post_status = get_post_status($post_id);
	
	if(!empty($booking_data['shb_booking_data'][0])) {
		$booking_details = json_decode( $booking_data['shb_booking_data'][0], true);
	} else {
		$booking_details = array();
	}
	
    switch ( $column ) {
		
		case 'booking_title' :
		
			$booking_title = '#' . $post_id . ': ' . get_the_title($post_id);
	
			if($post_status == 'shb_ical') {
				echo '<strong class="row-title">#' . $post_id . '</strong>';
				echo '<div class="row-actions"><span class="trash"><a href="' . get_delete_post_link($post_id) . '" class="submitdelete" aria-label="' . __('Move','sohohotel_booking') . ' &ldquo;' . $booking_title . '&rdquo; ' . __('to the Trash','sohohotel_booking') . '">' . __('Trash','sohohotel_booking') . '</a></div>';
			} else {
				echo '<strong><a href="' . get_edit_post_link($post_id) . '" class="row-title">' . $booking_title . '</a></strong>';
				echo '<div class="row-actions"><span class="edit"><a href="' . get_edit_post_link($post_id) . '" aria-label="' . __('Edit','sohohotel_booking') . ' &ldquo;' . $booking_title . '&rdquo;">' . __('Edit','sohohotel_booking') . '</a> | </span><span class="trash"><a href="' . get_delete_post_link($post_id) . '" class="submitdelete" aria-label="' . __('Move','sohohotel_booking') . ' &ldquo;' . $booking_title . '&rdquo; ' . __('to the Trash','sohohotel_booking') . '">' . __('Trash','sohohotel_booking') . '</a></div>';
			}
			
			echo '<button type="button" class="toggle-row"><span class="screen-reader-text">' . __('Show more details','sohohotel_booking') . '</span></button>';
			
			break;
		
		case 'booking_rooms' :
		
			if(!empty($booking_details)) {
			
				if(shb_different_booking_dates_check($booking_details) == true) {
					$different_dates = true;
				} else {
					$different_dates = false;
				}
			
				echo '<div class="shb-booking-details-wrapper">';
			
					foreach($booking_details as $booking_detail) {
				
						echo '<div class="shb-booking-detail">';
							echo '<a target="_blank" href="' . get_edit_post_link($booking_detail['room_id']) . '" class="row-title">' . get_the_title($booking_detail['room_id']) . '</a><br />';
							
							if($post_status !== 'shb_ical') {
							
								echo '<div class="shb-booking-detail-indent">';
									
									echo  '<span>' . get_the_title($booking_detail['rate_id']) . '</span>';
									echo  '<span>' . shb_guestclass_qty_label($booking_detail['guests']) . '</span>';
				
									if($different_dates == true) {
										echo '<span><a href="#" title="' . __('Note: This booking contains rooms booked for different dates','sohohotel-booking') . '" class="shb-different-date-booking">' . shb_get_date($booking_detail['checkin']) . ' - ' . shb_get_date($booking_detail['checkout']) . '</a></span>';
					
									}
								
								echo '</div>';
								
							} else {
								
								if(!empty($booking_data['shb_ical_summary'][0])) {
									
									echo '<div class="shb-booking-detail-indent shb-ical-details">';
										echo  '<span>' . $booking_data['shb_ical_summary'][0] . '</span>';
										echo  '<span>' . $booking_data['shb_ical_url'][0] . '</span>';
									echo '</div>';
									
								}
								
							}
				
							
						echo '</div>';
 				
					}
			
				echo '</div>';
			
			}
			
			break;
			
		case 'booking_checkin' :
			echo shb_get_date($booking_data['shb_checkin_sort'][0]);
			break;
		
		case 'booking_checkout' :
			echo shb_get_date($booking_data['shb_checkout_sort'][0]);
			break;
			
		case 'booking_received' :
			echo shb_get_time_elapsed( get_the_date('Y-m-d H:i:s') );
			break;
		
		case 'booking_status' :
			echo '<span class="' . get_post_status($post_id) . '_wrapper">' . shb_get_display_text( get_post_status($post_id) ) . '</span>';
			break;
			
		case 'booking_wc_payment_id' :
			
			if(!empty($booking_data['shb_woocommerce_id'][0])) {
			
				$wc_button_url = get_admin_url() . 'post.php?post=' . $booking_data['shb_woocommerce_id'][0] . '&action=edit&shb-create-wc-order=1';
				$wc_order_id = $booking_data['shb_woocommerce_id'][0];
				echo '<a href="' . $wc_button_url . '">#' . $wc_order_id . '</a>';
				
			} else {
				
				echo '-';
				
			}
			
			break;
		
    }
	
}



/* ----------------------------------------------------------------------------

   Make custom columns sortable

---------------------------------------------------------------------------- */
add_filter( 'manage_edit-shb_booking_sortable_columns', 'sortable_shb_booking_column' );
function sortable_shb_booking_column( $columns ) {
    
	$columns['booking_title'] = 'booking_title';
	$columns['booking_checkin'] = 'booking_checkin';
	$columns['booking_checkout'] = 'booking_checkout';
	$columns['booking_received'] = 'booking_received';
	$columns['booking_wc_payment_id'] = 'booking_wc_payment_id';
    return $columns;
	
}

add_action( 'pre_get_posts', 'booking_columns_orderby' );
function booking_columns_orderby( $query ) {
	
	if( ! is_admin() )
        return;
 
    $orderby = $query->get( 'orderby');
 	
    if( 'booking_title' == $orderby ) {
        $query->set('orderby','date');
    }
	
    if( 'booking_id' == $orderby ) {
        $query->set('orderby','date');
    }
	
    if( 'booking_checkin' == $orderby ) {
        $query->set('meta_key','shb_checkin_sort');
        $query->set('orderby','meta_value');
    }
	
    if( 'booking_checkout' == $orderby ) {
        $query->set('meta_key','shb_checkout_sort');
        $query->set('orderby','meta_value');
    }
	
    if( 'booking_received' == $orderby ) {
        $query->set('orderby','date');
    }
	
}



/* ----------------------------------------------------------------------------

   Disable quick edit

---------------------------------------------------------------------------- */
add_filter( 'post_row_actions', 'shb_booking_disable_quick_edit', 10, 2 );
function shb_booking_disable_quick_edit( $actions = array(), $post = null ) {

    if ( ! is_post_type_archive( 'shb_booking' ) ) {
        return $actions;
    }

    if ( isset( $actions['inline hide-if-no-js'] ) ) {
        unset( $actions['edit'] );
        unset( $actions['view'] );
        unset( $actions['trash'] );
        unset( $actions['inline hide-if-no-js'] );
    }

    return $actions;

}



/* ----------------------------------------------------------------------------

   Remove date filter

---------------------------------------------------------------------------- */ 
function shb_booking_remove_date_filter(){
	
	$screen = get_current_screen();
	
    if ( $screen->post_type == 'shb_booking'){
		add_filter('months_dropdown_results', '__return_empty_array');
	}
	
}

add_action('admin_head', 'shb_booking_remove_date_filter');



/* ----------------------------------------------------------------------------

   Remove publish meta box

---------------------------------------------------------------------------- */ 
add_action( 'admin_menu', function () {
    remove_meta_box( 'submitdiv', 'shb_booking', 'side' );
});



/* ----------------------------------------------------------------------------

   Filter bookings by date

---------------------------------------------------------------------------- */ 
add_filter( 'pre_get_posts', 'shb_filter_booking_dates' );
function shb_filter_booking_dates( $query ) {
	
	global $pagenow;
	
	if ( is_admin() && $pagenow == 'edit.php') {
	
		if(!empty($_GET['shb_in2']) && !empty($_GET['shb_out2'])) {
		
			$shb_check_in_alt = wp_specialchars_decode($_GET['shb_in2']);
			$shb_check_out_alt = wp_specialchars_decode($_GET['shb_out2']);
			
			$meta_query = array(
				'post_type' => 'shb_booking',
				'relation' => 'OR',
				array(
					'key' => 'shb_checkin_sort',
					'value' => array($shb_check_in_alt, $shb_check_out_alt),
					'compare' => 'BETWEEN',
					'type' => 'DATE'
				),
				array(
					'key' => 'shb_checkout_sort',
					'value' => array($shb_check_in_alt, $shb_check_out_alt),
					'compare' => 'BETWEEN',
					'type' => 'DATE'
				)
			);
	
			$query->set( 'meta_query', $meta_query );
					
		}
	
	}
	
}

add_action( 'restrict_manage_posts', 'shb_filter_booking_dates_restrict_manage_posts' );
function shb_filter_booking_dates_restrict_manage_posts() {
	
	global $pagenow;
	
	if ( is_admin() && $pagenow=='edit.php' && get_post_type() == 'shb_booking') {
		
		if(!empty($_GET['shb_in2']) && !empty($_GET['shb_out2'])) {
			$shb_check_in = wp_specialchars_decode($_GET['shb_in1']);
			$shb_check_out = wp_specialchars_decode($_GET['shb_out1']);
			$shb_check_in_alt = wp_specialchars_decode($_GET['shb_in2']);
			$shb_check_out_alt = wp_specialchars_decode($_GET['shb_out2']);
		} else {
			$shb_check_in = '';
			$shb_check_out = '';
			$shb_check_in_alt = '';
			$shb_check_out_alt = '';
		}

		echo '<input type="text" class="shb-check-in" name="shb_in1" value="' . $shb_check_in . '" placeholder="' . esc_html__('Check In','sohohotel_booking') . '" />';
		echo '<input type="text" class="shb-check-out" name="shb_out1" value="' . $shb_check_out . '" placeholder="' . esc_html__('Check Out','sohohotel_booking') . '" />';
		
		echo '<input type="hidden" class="shb-check-in-alt" name="shb_in2" value="' . $shb_check_in_alt . '" />';
		echo '<input type="hidden" class="shb-check-out-alt" name="shb_out2" value="' . $shb_check_out_alt . '" />';
	
	}

}



/* ----------------------------------------------------------------------------

   Save meta content

---------------------------------------------------------------------------- */
add_action('save_post', 'shb_booking_meta_save');
function shb_booking_meta_save( $post_id ){
	
	$prefix = 'shb';
	
	if ( isset($_POST['booking_meta_noncename'])) {
		
		if (!wp_verify_nonce($_POST['booking_meta_noncename'],__FILE__)) {
			return $post_id;
		}

		if ( !current_user_can( 'edit_post', $post_id ))
			return $post_id;
		
		$booking_data = get_post_meta($post_id);
		foreach($booking_data as $key => $val){
			$exp_key = explode('_', $key);
			if($exp_key[0] == $prefix){
				if(empty($_POST[$key])) {
					delete_post_meta($post_id,$key);
				} 
		    }
		}
		
		foreach($_POST as $key => $val){
			$exp_key = explode('_', $key);
			if($key == 'shb_additionalfee') {
				update_post_meta($post_id,$key,json_encode($_POST[$key]));
			} elseif($exp_key[0] == $prefix){
				update_post_meta($post_id,$key,$_POST[$key]);
		    }
		}

	}

}