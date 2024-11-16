<?php



/* ----------------------------------------------------------------------------

   Register post type

---------------------------------------------------------------------------- */
add_action( 'init', 'shb_guestclass_post_type' );
function shb_guestclass_post_type() {
	
	$labels = array(
        'name'                  => __('Guest Class','sohohotel_booking'),
        'singular_name'         => __('Guest Class','sohohotel_booking'),
        'menu_name'             => __('Guest Classes','sohohotel_booking'),
        'parent_item_colon'     => __('Parent Guest Class:','sohohotel_booking'),
        'all_items'             => __('Guest Classes','sohohotel_booking'),
        'view_item'             => __('View Guest Classes','sohohotel_booking'),
        'add_new_item'          => __('Add New Guest Class','sohohotel_booking'),
        'add_new'               => __('Add New','sohohotel_booking'),
        'edit_item'             => __('Edit Guest Class','sohohotel_booking'),
        'update_item'           => __('Update Guest Class','sohohotel_booking'),
        'search_items'          => __('Search Guest Class','sohohotel_booking'),
        'not_found'             => __('Not found','sohohotel_booking'),
        'not_found_in_trash'    => __('Not found in Trash','sohohotel_booking'),
    );

    $args = array(
        'label'                 => __('Guest Class','sohohotel_booking'),
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
		'rewrite' => array('slug' => esc_html__( 'guestclass', 'sohohotel_booking' ),'with_front' => false),
    );

    register_post_type( 'shb_guestclass', $args );
	
}



/* ----------------------------------------------------------------------------

   Meta boxes

---------------------------------------------------------------------------- */
add_action('add_meta_boxes', 'shb_guestclass_meta_init');
function shb_guestclass_meta_init() {
	
	add_meta_box(
		'shb_guestclass_settings',
		__('Guest Class Settings','sohohotel_booking'),
		'shb_guestclass_show_meta_box',
		'shb_guestclass',
		'normal',
		'high'
	);
	
    add_action('save_post','shb_guestclass_meta_save');

}



/* ----------------------------------------------------------------------------

   Meta box content

---------------------------------------------------------------------------- */
function shb_guestclass_show_meta_box() {
	
    global $post;
    $guestclass_data = get_post_meta($post->ID);
    include(SHB_PLUGIN_DIR . '/includes/templates/backend/guestclass/shb-guestclass.htm.php');
    echo '<input type="hidden" name="guestclass_meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';

}



/* ----------------------------------------------------------------------------

   Post type custom columns

---------------------------------------------------------------------------- */
add_filter( 'manage_shb_guestclass_posts_columns', 'shb_guestclass_custom_columns' );
function shb_guestclass_custom_columns($columns) {
	
	unset($columns['date']);
    unset( $columns['author'] );
	$columns['guestclass_title_plural'] = __( 'Title Plural', 'sohohotel_booking' );
    return $columns;
	
}



/* ----------------------------------------------------------------------------

   Custom columns content

---------------------------------------------------------------------------- */
add_action( 'manage_shb_guestclass_posts_custom_column' , 'shb_guestclass_custom_columns_content', 10, 2 );
function shb_guestclass_custom_columns_content( $column, $post_id ) {
	
	$guestclass_meta = get_post_meta(get_the_id());
	$guestclass_ids = shb_get_all_ids('shb_guestclass');
	$season_ids = shb_get_all_ids('shb_season');

    switch ( $column ) {
		
		case 'guestclass_title_plural' :
			echo $guestclass_meta['shb_guestclass_title_plural'][0];
			break;
		
    }
	
}



/* ----------------------------------------------------------------------------

   Disable quick edit

---------------------------------------------------------------------------- */
add_filter( 'post_row_actions', 'shb_guestclass_disable_quick_edit', 10, 2 );
function shb_guestclass_disable_quick_edit( $actions = array(), $post = null ) {

    if ( ! is_post_type_archive( 'shb_guestclass' ) ) {
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
function shb_guestclass_remove_date_filter(){
	
	$screen = get_current_screen();
	
    if ( $screen->post_type == 'shb_guestclass'){
		add_filter('months_dropdown_results', '__return_empty_array');
	}
	
}

add_action('admin_head', 'shb_guestclass_remove_date_filter');



/* ----------------------------------------------------------------------------

   Save meta content

---------------------------------------------------------------------------- */
add_action('save_post', 'shb_guestclass_meta_save');
function shb_guestclass_meta_save( $post_id ){
	
	$prefix = 'shb';

	if ( isset($_POST['guestclass_meta_noncename'])) {
		
		if (!wp_verify_nonce($_POST['guestclass_meta_noncename'],__FILE__)) {
			return $post_id;
		}

		if ( !current_user_can( 'edit_post', $post_id ))
			return $post_id;
		
		$guestclass_data = get_post_meta($post_id);
		foreach($guestclass_data as $key => $val){
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