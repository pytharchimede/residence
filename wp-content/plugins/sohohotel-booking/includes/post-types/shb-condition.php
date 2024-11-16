<?php



/* ----------------------------------------------------------------------------

   Register post type

---------------------------------------------------------------------------- */
add_action( 'init', 'shb_condition_post_type' );
function shb_condition_post_type() {
	
	$labels = array(
        'name'                  => __('Conditions','sohohotel_booking'),
        'singular_name'         => __('Condition','sohohotel_booking'),
        'menu_name'             => __('Conditions','sohohotel_booking'),
        'parent_item_colon'     => __('Parent Condition:','sohohotel_booking'),
        'all_items'             => __('Conditions','sohohotel_booking'),
        'view_item'             => __('View Condition','sohohotel_booking'),
        'add_new_item'          => __('Add New Condition','sohohotel_booking'),
        'add_new'               => __('Add New','sohohotel_booking'),
        'edit_item'             => __('Edit Condition','sohohotel_booking'),
        'update_item'           => __('Update Condition','sohohotel_booking'),
        'search_items'          => __('Search Condition','sohohotel_booking'),
        'not_found'             => __('Not found','sohohotel_booking'),
        'not_found_in_trash'    => __('Not found in Trash','sohohotel_booking'),
    );

    $args = array(
        'label'                 => __('Condition','sohohotel_booking'),
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
		'rewrite' => array('slug' => esc_html__( 'condition', 'sohohotel_booking' ),'with_front' => false),
    );

    register_post_type( 'shb_condition', $args );
	
}



/* ----------------------------------------------------------------------------

   Meta boxes

---------------------------------------------------------------------------- */
add_action('add_meta_boxes', 'shb_condition_meta_init');
function shb_condition_meta_init() {
	
	add_meta_box(
		'shb_condition_settings',
		__('Condition Settings','sohohotel_booking'),
		'shb_condition_show_meta_box',
		'shb_condition',
		'normal',
		'high'
	);
	
    add_action('save_post','shb_condition_meta_save');

}



/* ----------------------------------------------------------------------------

   Meta box content

---------------------------------------------------------------------------- */
function shb_condition_show_meta_box() {
	
    global $post;
    $condition_data = get_post_meta($post->ID);
    include(SHB_PLUGIN_DIR . '/includes/templates/backend/condition/shb-condition.htm.php');
    echo '<input type="hidden" name="condition_meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';

}



/* ----------------------------------------------------------------------------

   Post type custom columns

---------------------------------------------------------------------------- */
add_filter( 'manage_shb_condition_posts_columns', 'shb_condition_custom_columns' );
function shb_condition_custom_columns($columns) {
	
	unset($columns['date']);
    unset( $columns['author'] );
	$columns['condition_minmaxstay'] = __( 'Min/Max Stay', 'sohohotel_booking' );
	$columns['condition_notice'] = __( 'Notice', 'sohohotel_booking' );
	$columns['condition_increments'] = __( 'Increments', 'sohohotel_booking' );
    $columns['condition_allowin'] = __( 'Allow In', 'sohohotel_booking' );
    $columns['condition_allowout'] = __( 'Allow Out', 'sohohotel_booking' );
    $columns['condition_applyin'] = __( 'Apply In', 'sohohotel_booking' );
    $columns['condition_applyout'] = __( 'Apply Out', 'sohohotel_booking' );
    $columns['condition_seasons'] = __( 'Seasons', 'sohohotel_booking' );
    $columns['condition_rates'] = __( 'Rates', 'sohohotel_booking' );
    return $columns;
	
}



/* ----------------------------------------------------------------------------

   Custom columns content

---------------------------------------------------------------------------- */
add_action( 'manage_shb_condition_posts_custom_column' , 'shb_condition_custom_columns_content', 10, 2 );
function shb_condition_custom_columns_content( $column, $post_id ) {
	
	$condition_meta = get_post_meta(get_the_id());
	$accommodation_ids = shb_get_all_ids('shb_accommodation');
	$season_ids = shb_get_all_ids('shb_season');

    switch ( $column ) {
		
        case 'condition_minmaxstay' :
			echo $condition_meta['shb_min_stay'][0] . ' / ' . $condition_meta['shb_max_stay'][0] . ' ' . __('Night(s)','sohohotel-booking');
			break;
			
		case 'condition_notice' :
			echo $condition_meta['shb_advance_notice'][0] . ' ' . __('Night(s)','sohohotel-booking');
			break;
			
		case 'condition_increments' :
			echo $condition_meta['shb_increments'][0] . ' ' . __('Night(s)','sohohotel-booking');
			break;
		
        case 'condition_allowin' :	
			$open = '<span class="shb-booking-days-column">';
			$close = '<span>, </span></span>';
			if ( !empty($condition_meta['shb_allowed_check_in_1'][0]) ) {echo $open . __('Mo','sohohotel_booking') . $close;}
			if ( !empty($condition_meta['shb_allowed_check_in_2'][0]) ) {echo $open . __('Tu','sohohotel_booking') . $close;}
			if ( !empty($condition_meta['shb_allowed_check_in_3'][0]) ) {echo $open . __('We','sohohotel_booking') . $close;}
			if ( !empty($condition_meta['shb_allowed_check_in_4'][0]) ) {echo $open . __('Th','sohohotel_booking') . $close;}
			if ( !empty($condition_meta['shb_allowed_check_in_5'][0]) ) {echo $open . __('Fr','sohohotel_booking') . $close;}
			if ( !empty($condition_meta['shb_allowed_check_in_6'][0]) ) {echo $open . __('Sa','sohohotel_booking') . $close;}
			if ( !empty($condition_meta['shb_allowed_check_in_0'][0]) ) {echo $open . __('Su','sohohotel_booking') . $close;}
			break;
		
		case 'condition_allowout' :
			$open = '<span class="shb-booking-days-column">';
			$close = '<span>, </span></span>';
			if ( !empty($condition_meta['shb_allowed_check_out_1'][0]) ) {echo $open . __('Mo','sohohotel_booking') . $close;}
			if ( !empty($condition_meta['shb_allowed_check_out_2'][0]) ) {echo $open . __('Tu','sohohotel_booking') . $close;}
			if ( !empty($condition_meta['shb_allowed_check_out_3'][0]) ) {echo $open . __('We','sohohotel_booking') . $close;}
			if ( !empty($condition_meta['shb_allowed_check_out_4'][0]) ) {echo $open . __('Th','sohohotel_booking') . $close;}
			if ( !empty($condition_meta['shb_allowed_check_out_5'][0]) ) {echo $open . __('Fr','sohohotel_booking') . $close;}
			if ( !empty($condition_meta['shb_allowed_check_out_6'][0]) ) {echo $open . __('Sa','sohohotel_booking') . $close;}
			if ( !empty($condition_meta['shb_allowed_check_out_0'][0]) ) {echo $open . __('Su','sohohotel_booking') . $close;}
			break;
			
		case 'condition_applyin' :
			$open = '<span class="shb-booking-days-column">';
			$close = '<span>, </span></span>';
			if ( !empty($condition_meta['shb_apply_check_in_1'][0]) ) {echo $open . __('Mo','sohohotel_booking') . $close;}
			if ( !empty($condition_meta['shb_apply_check_in_2'][0]) ) {echo $open . __('Tu','sohohotel_booking') . $close;}
			if ( !empty($condition_meta['shb_apply_check_in_3'][0]) ) {echo $open . __('We','sohohotel_booking') . $close;}
			if ( !empty($condition_meta['shb_apply_check_in_4'][0]) ) {echo $open . __('Th','sohohotel_booking') . $close;}
			if ( !empty($condition_meta['shb_apply_check_in_5'][0]) ) {echo $open . __('Fr','sohohotel_booking') . $close;}
			if ( !empty($condition_meta['shb_apply_check_in_6'][0]) ) {echo $open . __('Sa','sohohotel_booking') . $close;}
			if ( !empty($condition_meta['shb_apply_check_in_0'][0]) ) {echo $open . __('Su','sohohotel_booking') . $close;}
			break;
			
		case 'condition_applyout' :
			$open = '<span class="shb-booking-days-column">';
			$close = '<span>, </span></span>';
			if ( !empty($condition_meta['shb_apply_check_out_1'][0]) ) {echo $open . __('Mo','sohohotel_booking') . $close;}
			if ( !empty($condition_meta['shb_apply_check_out_2'][0]) ) {echo $open . __('Tu','sohohotel_booking') . $close;}
			if ( !empty($condition_meta['shb_apply_check_out_3'][0]) ) {echo $open . __('We','sohohotel_booking') . $close;}
			if ( !empty($condition_meta['shb_apply_check_out_4'][0]) ) {echo $open . __('Th','sohohotel_booking') . $close;}
			if ( !empty($condition_meta['shb_apply_check_out_5'][0]) ) {echo $open . __('Fr','sohohotel_booking') . $close;}
			if ( !empty($condition_meta['shb_apply_check_out_6'][0]) ) {echo $open . __('Sa','sohohotel_booking') . $close;}
			if ( !empty($condition_meta['shb_apply_check_out_0'][0]) ) {echo $open . __('Su','sohohotel_booking') . $close;}
			break;
			
		case 'condition_seasons' :
			echo shb_get_column_selected_fields($condition_meta,'season');
			break;
			
		case 'condition_rates' :	
			echo shb_get_column_selected_fields($condition_meta,'rate');
			break;
		
    }
	
}



/* ----------------------------------------------------------------------------

   Disable quick edit

---------------------------------------------------------------------------- */
add_filter( 'post_row_actions', 'shb_condition_disable_quick_edit', 10, 2 );
function shb_condition_disable_quick_edit( $actions = array(), $post = null ) {

    if ( ! is_post_type_archive( 'shb_condition' ) ) {
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
function shb_condition_remove_date_filter(){
	
	$screen = get_current_screen();
	
    if ( $screen->post_type == 'shb_condition'){
		add_filter('months_dropdown_results', '__return_empty_array');
	}
	
}

add_action('admin_head', 'shb_condition_remove_date_filter');



/* ----------------------------------------------------------------------------

   Make custom columns sortable

---------------------------------------------------------------------------- */
add_filter( 'manage_edit-shb_condition_sortable_columns', 'sortable_shb_condition_column' );
function sortable_shb_condition_column( $columns ) {
    
	$columns['condition_price'] = 'condition_price';
    return $columns;
	
}

add_action( 'pre_get_posts', 'condition_orderby' );
function condition_orderby( $query ) {
	
	if( ! is_admin() )
        return;
 
    $orderby = $query->get( 'orderby');
 
    if( 'condition_price' == $orderby ) {
        $query->set('meta_key','shb_condition_price');
        $query->set('orderby','meta_value_num');
    }
	
}



/* ----------------------------------------------------------------------------

   Save meta content

---------------------------------------------------------------------------- */
add_action('save_post', 'shb_condition_meta_save');
function shb_condition_meta_save( $post_id ){
	
	$prefix = 'shb';

	if ( isset($_POST['condition_meta_noncename'])) {
		
		if (!wp_verify_nonce($_POST['condition_meta_noncename'],__FILE__)) {
			return $post_id;
		}

		if ( !current_user_can( 'edit_post', $post_id ))
			return $post_id;
		
		$condition_data = get_post_meta($post_id);
		foreach($condition_data as $key => $val){
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
		$shb_condition_price = $_POST['shb_condition_price'];
		
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

		$shb_condition_price = str_replace($search_strings,$replace_strings,$shb_condition_price);	
		
		update_post_meta($post_id,'shb_condition_price',$shb_condition_price);	

	}

}