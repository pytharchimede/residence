<?php



/* ----------------------------------------------------------------------------

   Register post type

---------------------------------------------------------------------------- */
add_action( 'init', 'shb_rate_post_type' );
function shb_rate_post_type() {
	
	$labels = array(
        'name'                  => __('Rates','sohohotel_booking'),
        'singular_name'         => __('Rate','sohohotel_booking'),
        'menu_name'             => __('Rates','sohohotel_booking'),
        'parent_item_colon'     => __('Parent Rate:','sohohotel_booking'),
        'all_items'             => __('Rates','sohohotel_booking'),
        'view_item'             => __('View Rate','sohohotel_booking'),
        'add_new_item'          => __('Add New Rate','sohohotel_booking'),
        'add_new'               => __('Add New','sohohotel_booking'),
        'edit_item'             => __('Edit Rate','sohohotel_booking'),
        'update_item'           => __('Update Rate','sohohotel_booking'),
        'search_items'          => __('Search Rate','sohohotel_booking'),
        'not_found'             => __('Not found','sohohotel_booking'),
        'not_found_in_trash'    => __('Not found in Trash','sohohotel_booking'),
    );

    $args = array(
        'label'                 => __('Rate','sohohotel_booking'),
        'description'           => '',
        'labels'                => $labels,
        'supports'              => array('title','editor'),
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
		'rewrite' => array('slug' => esc_html__( 'rate', 'sohohotel_booking' ),'with_front' => false),
    );

    register_post_type( 'shb_rate', $args );
	
}



/* ----------------------------------------------------------------------------

   Meta boxes

---------------------------------------------------------------------------- */
add_action('add_meta_boxes', 'shb_rate_meta_init');
function shb_rate_meta_init() {
	
	add_meta_box(
		'shb_rate_settings',
		__('Rate Settings','sohohotel_booking'),
		'shb_rate_show_meta_box',
		'shb_rate',
		'normal',
		'high'
	);
	
    add_action('save_post','shb_rate_meta_save');

}



/* ----------------------------------------------------------------------------

   Meta box content

---------------------------------------------------------------------------- */
function shb_rate_show_meta_box() {
	
    global $post;
    $rate_data = get_post_meta($post->ID);
    include(SHB_PLUGIN_DIR . '/includes/templates/backend/rate/shb-rate.htm.php');
    echo '<input type="hidden" name="rate_meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';

}



/* ----------------------------------------------------------------------------

   Post type custom columns

---------------------------------------------------------------------------- */
add_filter( 'manage_shb_rate_posts_columns', 'shb_rate_custom_columns' );
function shb_rate_custom_columns($columns) {
	
	unset($columns['date']);
    unset( $columns['author'] );
    $columns['rate_rooms'] = __( 'Accommodation', 'sohohotel_booking' );
    return $columns;
	
}



/* ----------------------------------------------------------------------------

   Custom columns content

---------------------------------------------------------------------------- */
add_action( 'manage_shb_rate_posts_custom_column' , 'shb_rate_custom_columns_content', 10, 2 );
function shb_rate_custom_columns_content( $column, $post_id ) {
	
	$rate_meta = get_post_meta(get_the_id());

    switch ( $column ) {
		
		case 'rate_rooms' :
			echo '<a href="' . get_the_permalink($rate_meta['shb_accommodation_rate'][0]) . '">' . get_the_title($rate_meta['shb_accommodation_rate'][0]) . '</a>';
			break;
		
    }
	
}



/* ----------------------------------------------------------------------------

   Disable quick edit

---------------------------------------------------------------------------- */
add_filter( 'post_row_actions', 'shb_rate_disable_quick_edit', 10, 2 );
function shb_rate_disable_quick_edit( $actions = array(), $post = null ) {

    if ( ! is_post_type_archive( 'shb_rate' ) ) {
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
function shb_rate_remove_date_filter(){
	
	$screen = get_current_screen();
	
    if ( $screen->post_type == 'shb_rate'){
		add_filter('months_dropdown_results', '__return_empty_array');
	}
	
}

add_action('admin_head', 'shb_rate_remove_date_filter');



/* ----------------------------------------------------------------------------

   Make custom columns sortable

---------------------------------------------------------------------------- */
add_filter( 'manage_edit-shb_rate_sortable_columns', 'sortable_shb_rate_column' );
function sortable_shb_rate_column( $columns ) {
    
	$columns['rate_price'] = 'rate_price';
    return $columns;
	
}

add_action( 'pre_get_posts', 'rate_orderby' );
function rate_orderby( $query ) {
	
	if( ! is_admin() )
        return;
 
    $orderby = $query->get( 'orderby');
 
    if( 'rate_price' == $orderby ) {
        $query->set('meta_key','shb_rate_price');
        $query->set('orderby','meta_value_num');
    }
	
}



/* ----------------------------------------------------------------------------

   Save meta content

---------------------------------------------------------------------------- */
add_action('save_post', 'shb_rate_meta_save');
function shb_rate_meta_save( $post_id ){
	
	$prefix = 'shb';

	if ( isset($_POST['rate_meta_noncename'])) {
		
		if (!wp_verify_nonce($_POST['rate_meta_noncename'],__FILE__)) {
			return $post_id;
		}

		if ( !current_user_can( 'edit_post', $post_id ))
			return $post_id;
		
		$rate_data = get_post_meta($post_id);
		foreach($rate_data as $key => $val){
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
		$shb_rate_price = $_POST['shb_rate_price'];
		
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

		$shb_rate_price = str_replace($search_strings,$replace_strings,$shb_rate_price);	
		
		update_post_meta($post_id,'shb_rate_price',$shb_rate_price);	

	}

}