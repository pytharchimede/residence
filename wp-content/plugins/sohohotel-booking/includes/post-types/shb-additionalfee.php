<?php



/* ----------------------------------------------------------------------------

   Register post type

---------------------------------------------------------------------------- */
add_action( 'init', 'shb_additionalfee_post_type' );
function shb_additionalfee_post_type() {
	
	$labels = array(
        'name'                  => __('Additional Fees','sohohotel_booking'),
        'singular_name'         => __('Additional Fee','sohohotel_booking'),
        'menu_name'             => __('Additional Fees','sohohotel_booking'),
        'parent_item_colon'     => __('Parent Additional Fee:','sohohotel_booking'),
        'all_items'             => __('Additional Fees','sohohotel_booking'),
        'view_item'             => __('View Additional Fee','sohohotel_booking'),
        'add_new_item'          => __('Add New Additional Fee','sohohotel_booking'),
        'add_new'               => __('Add New','sohohotel_booking'),
        'edit_item'             => __('Edit Additional Fee','sohohotel_booking'),
        'update_item'           => __('Update Additional Fee','sohohotel_booking'),
        'search_items'          => __('Search Additional Fee','sohohotel_booking'),
        'not_found'             => __('Not found','sohohotel_booking'),
        'not_found_in_trash'    => __('Not found in Trash','sohohotel_booking'),
    );

    $args = array(
        'label'                 => __('Additional Fee','sohohotel_booking'),
        'description'           => '',
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail'),
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
		'rewrite' => array('slug' => esc_html__( 'additionalfee', 'sohohotel_booking' ),'with_front' => false),
    );

    register_post_type( 'shb_additionalfee', $args );
	
}



/* ----------------------------------------------------------------------------

   Meta boxes

---------------------------------------------------------------------------- */
add_action('add_meta_boxes', 'shb_additionalfee_meta_init');
function shb_additionalfee_meta_init() {
	
	add_meta_box(
		'shb_additionalfee_settings',
		__('Additional Fee Settings','sohohotel_booking'),
		'shb_additionalfee_show_meta_box',
		'shb_additionalfee',
		'normal',
		'high'
	);
	
    add_action('save_post','shb_additionalfee_meta_save');

}



/* ----------------------------------------------------------------------------

   Meta box content

---------------------------------------------------------------------------- */
function shb_additionalfee_show_meta_box() {
	
    global $post;
    $additionalfee_data = get_post_meta($post->ID);
    include(SHB_PLUGIN_DIR . '/includes/templates/backend/additionalfee/shb-additionalfee.htm.php');
    echo '<input type="hidden" name="additionalfee_meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';

}



/* ----------------------------------------------------------------------------

   Post type custom columns

---------------------------------------------------------------------------- */
add_filter( 'manage_shb_additionalfee_posts_columns', 'shb_additionalfee_custom_columns' );
function shb_additionalfee_custom_columns($columns) {
	
	unset($columns['date']);
    unset( $columns['author'] );
	$columns['additionalfee_price'] = __( 'Price', 'sohohotel_booking' );
	$columns['additionalfee_optional'] = __( 'Optional', 'sohohotel_booking' );
	$columns['additionalfee_qty'] = __( 'Qty', 'sohohotel_booking' );
	$columns['additionalfee_minmaxqty'] = __( 'Min/Max Qty', 'sohohotel_booking' );
	$columns['additionalfee_date'] = __( 'Date', 'sohohotel_booking' );
	$columns['additionalfee_time'] = __( 'Time', 'sohohotel_booking' );
    $columns['additionalfee_season'] = __( 'Seasons', 'sohohotel_booking' );
    $columns['additionalfee_rates'] = __( 'Rates', 'sohohotel_booking' );
    return $columns;
	
}



/* ----------------------------------------------------------------------------

   Custom columns content

---------------------------------------------------------------------------- */
add_action( 'manage_shb_additionalfee_posts_custom_column' , 'shb_additionalfee_custom_columns_content', 10, 2 );
function shb_additionalfee_custom_columns_content( $column, $post_id ) {
	
	$additionalfee_meta = get_post_meta(get_the_id());
	$accommodation_ids = shb_get_all_ids('shb_accommodation');
	$season_ids = shb_get_all_ids('shb_season');

    switch ( $column ) {
		
        case 'additionalfee_price' :
			$price_type1 = shb_get_display_text($additionalfee_meta['shb_charge'][0]);
			$price_type2 = shb_get_display_text($additionalfee_meta['shb_per'][0]);
			echo shb_get_price($additionalfee_meta['shb_price'][0],'') . ' / ' . $price_type1 . ' / ' . __( 'Per', 'sohohotel_booking' ) . ' ' . $price_type2;
			break;
			
		case 'additionalfee_optional' :
			echo shb_get_display_text($additionalfee_meta['shb_optional'][0]);
			break;
			
		case 'additionalfee_qty' :
			if($additionalfee_meta['shb_qty_select'][0] == 'yes') {
				echo shb_get_display_text($additionalfee_meta['shb_qty_select'][0]);
			} else {
				echo '-';
			}
			break;
		
		case 'additionalfee_minmaxqty' :
			if($additionalfee_meta['shb_optional'][0] == 'yes') {
				echo $additionalfee_meta['shb_qty_min'][0] . ' / ' . $additionalfee_meta['shb_qty_max'][0];
			} else {
				echo '-';
			}
			break;
		
		case 'additionalfee_date' :
			if($additionalfee_meta['shb_select_date'][0] == 'yes') {
				echo shb_get_display_text($additionalfee_meta['shb_select_date'][0]);
			} else {
				echo '-';
			}
			break;
		
		
		case 'additionalfee_time' :
			if($additionalfee_meta['shb_select_time'][0] == 'yes') {
				echo shb_get_display_text($additionalfee_meta['shb_select_time'][0]);
			} else {
				echo '-';
			}
			break;
		
        case 'additionalfee_season' :	
			echo shb_get_column_selected_fields($additionalfee_meta,'season');
			break;
		
		case 'additionalfee_rates' :
			echo shb_get_column_selected_fields($additionalfee_meta,'rate');
			break;
	
	}
	
}



/* ----------------------------------------------------------------------------

   Disable quick edit

---------------------------------------------------------------------------- */
add_filter( 'post_row_actions', 'shb_additionalfee_disable_quick_edit', 10, 2 );
function shb_additionalfee_disable_quick_edit( $actions = array(), $post = null ) {

    if ( ! is_post_type_archive( 'shb_additionalfee' ) ) {
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
function shb_additionalfee_remove_date_filter(){
	
	$screen = get_current_screen();
	
    if ( $screen->post_type == 'shb_additionalfee'){
		add_filter('months_dropdown_results', '__return_empty_array');
	}
	
}

add_action('admin_head', 'shb_additionalfee_remove_date_filter');



/* ----------------------------------------------------------------------------

   Make custom columns sortable

---------------------------------------------------------------------------- */
add_filter( 'manage_edit-shb_additionalfee_sortable_columns', 'sortable_shb_additionalfee_column' );
function sortable_shb_additionalfee_column( $columns ) {
    
	$columns['additionalfee_price'] = 'additionalfee_price';
    return $columns;
	
}

add_action( 'pre_get_posts', 'additionalfee_orderby' );
function additionalfee_orderby( $query ) {
	
	if( ! is_admin() )
        return;
 
    $orderby = $query->get( 'orderby');
 
    if( 'additionalfee_price' == $orderby ) {
        $query->set('meta_key','shb_additionalfee_price');
        $query->set('orderby','meta_value_num');
    }
	
}



/* ----------------------------------------------------------------------------

   Save meta content

---------------------------------------------------------------------------- */
add_action('save_post', 'shb_additionalfee_meta_save');
function shb_additionalfee_meta_save( $post_id ){
	
	$prefix = 'shb';

	if ( isset($_POST['additionalfee_meta_noncename'])) {
		
		if (!wp_verify_nonce($_POST['additionalfee_meta_noncename'],__FILE__)) {
			return $post_id;
		}

		if ( !current_user_can( 'edit_post', $post_id ))
			return $post_id;
		
		$additionalfee_data = get_post_meta($post_id);
		foreach($additionalfee_data as $key => $val){
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
		
		// Find and replace decimal and thousand separators
		$shb_additionalfee_price = $_POST['shb_additionalfee_price'];
		
		if(!empty(get_option('shb_price_thousand_separator'))) {
			$thousand_separator = get_option('shb_price_thousand_separator');
		} else {
			$thousand_separator = ',';
		}
		
		if(!empty(get_option('shb_price_decimal_separator'))) {
			$decimal_separator = get_option('shb_price_decimal_separator');
		} else {
			$decimal_separator = '.';
		}
		
		$search_strings = array($thousand_separator,$decimal_separator);
		$replace_strings = array('','.');

		$shb_additionalfee_price = str_replace($search_strings,$replace_strings,$shb_additionalfee_price);	
		
		update_post_meta($post_id,'shb_additionalfee_price',$shb_additionalfee_price);	

	}

}