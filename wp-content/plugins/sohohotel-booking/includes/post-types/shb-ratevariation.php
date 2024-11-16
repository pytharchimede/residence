<?php



/* ----------------------------------------------------------------------------

   Register post type

---------------------------------------------------------------------------- */
add_action( 'init', 'shb_ratevariation_post_type' );
function shb_ratevariation_post_type() {
	
	$labels = array(
        'name'                  => __('Rate Variations','sohohotel_booking'),
        'singular_name'         => __('Rate Variation','sohohotel_booking'),
        'menu_name'             => __('Rate Variations','sohohotel_booking'),
        'parent_item_colon'     => __('Parent Rate Variation:','sohohotel_booking'),
        'all_items'             => __('Rate Variations','sohohotel_booking'),
        'view_item'             => __('View Rate Variation','sohohotel_booking'),
        'add_new_item'          => __('Add New Rate Variation','sohohotel_booking'),
        'add_new'               => __('Add New','sohohotel_booking'),
        'edit_item'             => __('Edit Rate Variation','sohohotel_booking'),
        'update_item'           => __('Update Rate Variation','sohohotel_booking'),
        'search_items'          => __('Search Rate Variation','sohohotel_booking'),
        'not_found'             => __('Not found','sohohotel_booking'),
        'not_found_in_trash'    => __('Not found in Trash','sohohotel_booking'),
    );

    $args = array(
        'label'                 => __('Rate Variation','sohohotel_booking'),
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
		'rewrite' => array('slug' => esc_html__( 'ratevariation', 'sohohotel_booking' ),'with_front' => false),
    );

    register_post_type( 'shb_ratevariation', $args );
	
}



/* ----------------------------------------------------------------------------

   Meta boxes

---------------------------------------------------------------------------- */
add_action('add_meta_boxes', 'shb_ratevariation_meta_init');
function shb_ratevariation_meta_init() {
	
	add_meta_box(
		'shb_ratevariation_settings',
		__('Rate Variation Settings','sohohotel_booking'),
		'shb_ratevariation_show_meta_box',
		'shb_ratevariation',
		'normal',
		'high'
	);
	
    add_action('save_post','shb_ratevariation_meta_save');

}



/* ----------------------------------------------------------------------------

   Meta box content

---------------------------------------------------------------------------- */
function shb_ratevariation_show_meta_box() {
	
    global $post;
    $ratevariation_data = get_post_meta($post->ID);
    include(SHB_PLUGIN_DIR . '/includes/templates/backend/ratevariation/shb-ratevariation.htm.php');
    echo '<input type="hidden" name="ratevariation_meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';

}



/* ----------------------------------------------------------------------------

   Post type custom columns

---------------------------------------------------------------------------- */
add_filter( 'manage_shb_ratevariation_posts_columns', 'shb_ratevariation_custom_columns' );
function shb_ratevariation_custom_columns($columns) {
	
	unset($columns['date']);
    unset( $columns['author'] );
	$columns['ratevariation_type'] = __( 'Type', 'sohohotel_booking' );
	$columns['ratevariation_applied_to'] = __( 'Applied To', 'sohohotel_booking' );
    $columns['ratevariation_season'] = __( 'Seasons', 'sohohotel_booking' );
    $columns['ratevariation_rates'] = __( 'Rates', 'sohohotel_booking' );
    return $columns;
	
}



/* ----------------------------------------------------------------------------

   Custom columns content

---------------------------------------------------------------------------- */
add_action( 'manage_shb_ratevariation_posts_custom_column' , 'shb_ratevariation_custom_columns_content', 10, 2 );
function shb_ratevariation_custom_columns_content( $column, $post_id ) {
	
	$ratevariation_meta = get_post_meta(get_the_id());
	$accommodation_ids = shb_get_all_ids('shb_accommodation');
	$season_ids = shb_get_all_ids('shb_season');

    switch ( $column ) {
		
        case 'ratevariation_type' :
			echo shb_get_display_text($ratevariation_meta['shb_type'][0]);
			break;
			
		case 'ratevariation_applied_to' :
			echo $ratevariation_meta['shb_applied_to'][0] . ' ' . __('Night(s)','sohohotel-booking');
			break;
			
        case 'ratevariation_season' :	
			echo shb_get_column_selected_fields($ratevariation_meta,'season');
			break;
		
		case 'ratevariation_rates' :
			echo shb_get_column_selected_fields($ratevariation_meta,'rate');
			break;
		
    }
	
}



/* ----------------------------------------------------------------------------

   Disable quick edit

---------------------------------------------------------------------------- */
add_filter( 'post_row_actions', 'shb_ratevariation_disable_quick_edit', 10, 2 );
function shb_ratevariation_disable_quick_edit( $actions = array(), $post = null ) {

    if ( ! is_post_type_archive( 'shb_ratevariation' ) ) {
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
function shb_ratevariation_remove_date_filter(){
	
	$screen = get_current_screen();
	
    if ( $screen->post_type == 'shb_ratevariation'){
		add_filter('months_dropdown_results', '__return_empty_array');
	}
	
}

add_action('admin_head', 'shb_ratevariation_remove_date_filter');



/* ----------------------------------------------------------------------------

   Make custom columns sortable

---------------------------------------------------------------------------- */
add_filter( 'manage_edit-shb_ratevariation_sortable_columns', 'sortable_shb_ratevariation_column' );
function sortable_shb_ratevariation_column( $columns ) {
    
	$columns['ratevariation_price'] = 'ratevariation_price';
    return $columns;
	
}

add_action( 'pre_get_posts', 'ratevariation_orderby' );
function ratevariation_orderby( $query ) {
	
	if( ! is_admin() )
        return;
 
    $orderby = $query->get( 'orderby');
 
    if( 'ratevariation_price' == $orderby ) {
        $query->set('meta_key','shb_ratevariation_price');
        $query->set('orderby','meta_value_num');
    }
	
}



/* ----------------------------------------------------------------------------

   Save meta content

---------------------------------------------------------------------------- */
add_action('save_post', 'shb_ratevariation_meta_save');
function shb_ratevariation_meta_save( $post_id ){
	
	$prefix = 'shb';

	if ( isset($_POST['ratevariation_meta_noncename'])) {
		
		if (!wp_verify_nonce($_POST['ratevariation_meta_noncename'],__FILE__)) {
			return $post_id;
		}

		if ( !current_user_can( 'edit_post', $post_id ))
			return $post_id;
		
		$ratevariation_data = get_post_meta($post_id);
		foreach($ratevariation_data as $key => $val){
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
		$shb_ratevariation_price = $_POST['shb_ratevariation_price'];
		
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
		$shb_ratevariation_price = str_replace($search_strings,$replace_strings,$shb_ratevariation_price);	
		
		update_post_meta($post_id,'shb_ratevariation_price',$shb_ratevariation_price);	

	}

}