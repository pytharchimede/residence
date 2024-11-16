<?php



/* ----------------------------------------------------------------------------

   Register post type

---------------------------------------------------------------------------- */
add_action( 'init', 'shb_offer_post_type' );
function shb_offer_post_type() {
	
	$labels = array(
        'name'                  => __('Offers','sohohotel_booking'),
        'singular_name'         => __('Offer','sohohotel_booking'),
        'menu_name'             => __('Offers','sohohotel_booking'),
        'parent_item_colon'     => __('Parent Offer:','sohohotel_booking'),
        'all_items'             => __('Offers','sohohotel_booking'),
        'view_item'             => __('View Offer','sohohotel_booking'),
        'add_new_item'          => __('Add New Offer','sohohotel_booking'),
        'add_new'               => __('Add New','sohohotel_booking'),
        'edit_item'             => __('Edit Offer','sohohotel_booking'),
        'update_item'           => __('Update Offer','sohohotel_booking'),
        'search_items'          => __('Search Offer','sohohotel_booking'),
        'not_found'             => __('Not found','sohohotel_booking'),
        'not_found_in_trash'    => __('Not found in Trash','sohohotel_booking'),
    );

    /*$args = array(
        'label'                 => __('Offer','sohohotel_booking'),
        'description'           => '',
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail'),
        'hierarchical'          => false,
        'public'                => true,
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
		'rewrite' => array('slug' => esc_html__( 'offer', 'sohohotel_booking' ),'with_front' => false),
    );*/
	
    $args = array(
        'label'                 => __('Offer','sohohotel_booking'),
        'description'           => '',
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'revisions'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
		'show_in_menu'          => 'shb_booking_calendar',
        'show_in_nav_menus'     => false,
        'show_in_admin_bar'     => true,
        'menu_position'         => 5,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => true,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
		'rewrite' => array('slug' => esc_html__( 'offer', 'sohohotel_booking' ),'with_front' => false),
    );

    register_post_type( 'shb_offer', $args );
	
}



/* ----------------------------------------------------------------------------

   Meta boxes

---------------------------------------------------------------------------- */
add_action('add_meta_boxes', 'shb_offer_meta_init');
function shb_offer_meta_init() {
	
	add_meta_box(
		'shb_offer_settings',
		__('Offer Settings','sohohotel_booking'),
		'shb_offer_show_meta_box',
		'shb_offer',
		'normal',
		'high'
	);
	
    add_action('save_post','shb_offer_meta_save');

}



/* ----------------------------------------------------------------------------

   Meta box content

---------------------------------------------------------------------------- */
function shb_offer_show_meta_box() {
	
    global $post;
    $offer_data = get_post_meta($post->ID);
    include(SHB_PLUGIN_DIR . '/includes/templates/backend/offer/shb-offer.htm.php');
    echo '<input type="hidden" name="offer_meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';

}



/* ----------------------------------------------------------------------------

   Post type custom columns

---------------------------------------------------------------------------- */
add_filter( 'manage_shb_offer_posts_columns', 'shb_offer_custom_columns' );
function shb_offer_custom_columns($columns) {
	
	unset($columns['date']);
    unset( $columns['author'] );
    $columns['offer_rooms'] = __( 'Room(s)', 'sohohotel_booking' );
    return $columns;
	
}



/* ----------------------------------------------------------------------------

   Custom columns content

---------------------------------------------------------------------------- */
add_action( 'manage_shb_offer_posts_custom_column' , 'shb_offer_custom_columns_content', 10, 2 );
function shb_offer_custom_columns_content( $column, $post_id ) {
	
	$offer_meta = get_post_meta(get_the_id());
	$accommodation_ids = shb_get_all_ids('shb_accommodation');
	$offer_ids = shb_get_all_ids('shb_offer');
	
    switch ( $column ) {
			
		case 'offer_rooms' :
			echo shb_get_column_selected_fields($offer_meta,'accommodation');
			break;
		
    }
	
}



/* ----------------------------------------------------------------------------

   Check for overlapping offers

---------------------------------------------------------------------------- */
function shb_offer_overlap_all_check($id,$offer_ids) {
	
	$overlap_ids = array();
	$output = '';
	
	foreach ($offer_ids as $key => $val) {
		
		if(shb_get_date_range_overlap(
			get_post_meta($val,'shb_start_date_alt',TRUE),
			get_post_meta($val,'shb_end_date_alt',TRUE),
			get_post_meta($id,'shb_start_date_alt',TRUE),
			get_post_meta($id,'shb_end_date_alt',TRUE)) == 1) {
				
				if($val !== $id) {
					$overlap_ids[] = $val;
				}
				
		}
		
	}
	
	if(!empty($overlap_ids)) {
		
		foreach ($overlap_ids as $key => $val) {
			$output .= '<span class="shb-offer-overlap"><span class="dashicons dashicons-no-alt"></span>' . get_the_title($val) . '</span>';
		}
		
	} else {
		
		$output .= '<span class="shb-offer-overlap"><span class="dashicons dashicons-yes"></span>' . __( 'None', 'sohohotel_booking' ) . '</span>';
		
	}
	
	return $output;
	
}



/* ----------------------------------------------------------------------------

   Disable quick edit

---------------------------------------------------------------------------- */
add_filter( 'post_row_actions', 'shb_offer_disable_quick_edit', 10, 2 );
function shb_offer_disable_quick_edit( $actions = array(), $post = null ) {

    if ( ! is_post_type_archive( 'shb_offer' ) ) {
        return $actions;
    }

    if ( isset( $actions['inline hide-if-no-js'] ) ) {
        unset( $actions['inline hide-if-no-js'] );
    }

    return $actions;

}



/* ----------------------------------------------------------------------------

   Remove date filter

---------------------------------------------------------------------------- */ 
function shb_offer_remove_date_filter(){
	
	$screen = get_current_screen();
	
    if ( $screen->post_type == 'shb_offer'){
		add_filter('months_dropdown_results', '__return_empty_array');
	}
	
}

add_action('admin_head', 'shb_offer_remove_date_filter');



/* ----------------------------------------------------------------------------

   Make custom columns sortable

---------------------------------------------------------------------------- */
add_filter( 'manage_edit-shb_offer_sortable_columns', 'sortable_shb_offer_column' );
function sortable_shb_offer_column( $columns ) {
    
	$columns['offer_from'] = 'offer_from';
	$columns['offer_to'] = 'offer_to';
    return $columns;
	
}

add_action( 'pre_get_posts', 'offer_check_in_orderby' );
function offer_check_in_orderby( $query ) {
	
	if( ! is_admin() )
        return;
 
    $orderby = $query->get( 'orderby');
 
    if( 'offer_from' == $orderby ) {
        $query->set('meta_key','shb_start_date_alt');
        $query->set('orderby','meta_value');
    }
	
    if( 'offer_to' == $orderby ) {
        $query->set('meta_key','shb_end_date_alt');
        $query->set('orderby','meta_value');
    }
	
}



/* ----------------------------------------------------------------------------

   Save meta content

---------------------------------------------------------------------------- */
add_action('save_post', 'shb_offer_meta_save');
function shb_offer_meta_save( $post_id ){
	
	$prefix = 'shb';

	if ( isset($_POST['offer_meta_noncename'])) {
		
		if (!wp_verify_nonce($_POST['offer_meta_noncename'],__FILE__)) {
			return $post_id;
		}

		if ( !current_user_can( 'edit_post', $post_id ))
			return $post_id;
		
		$offer_data = get_post_meta($post_id);
		foreach($offer_data as $key => $val){
			$exp_key = explode('_', $key);
			if($exp_key[0] == $prefix){
				if(empty($_POST[$key])) {
					delete_post_meta($post_id,$key);
				} 
		    }
		}
		
		foreach($_POST as $key => $val){
			$exp_key = explode('_', $key);
			if($exp_key[0] == $prefix){
				update_post_meta($post_id,$key,$_POST[$key]);
		    }
		}

	}

}