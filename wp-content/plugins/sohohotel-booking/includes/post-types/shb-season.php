<?php



/* ----------------------------------------------------------------------------

   Register post type

---------------------------------------------------------------------------- */
add_action( 'init', 'shb_season_post_type' );
function shb_season_post_type() {
	
	$labels = array(
        'name'                  => __('Seasons','sohohotel_booking'),
        'singular_name'         => __('Season','sohohotel_booking'),
        'menu_name'             => __('Seasones','sohohotel_booking'),
        'parent_item_colon'     => __('Parent Season:','sohohotel_booking'),
        'all_items'             => __('Seasons','sohohotel_booking'),
        'view_item'             => __('View Season','sohohotel_booking'),
        'add_new_item'          => __('Add New Season','sohohotel_booking'),
        'add_new'               => __('Add New','sohohotel_booking'),
        'edit_item'             => __('Edit Season','sohohotel_booking'),
        'update_item'           => __('Update Season','sohohotel_booking'),
        'search_items'          => __('Search Season','sohohotel_booking'),
        'not_found'             => __('Not found','sohohotel_booking'),
        'not_found_in_trash'    => __('Not found in Trash','sohohotel_booking'),
    );

    $args = array(
        'label'                 => __('Season','sohohotel_booking'),
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
		'rewrite' => array('slug' => esc_html__( 'season', 'sohohotel_booking' ),'with_front' => false),
    );

    register_post_type( 'shb_season', $args );
	
}



/* ----------------------------------------------------------------------------

   Meta boxes

---------------------------------------------------------------------------- */
add_action('add_meta_boxes', 'shb_season_meta_init');
function shb_season_meta_init() {
	
	add_meta_box(
		'shb_season_settings',
		__('Season Settings','sohohotel_booking'),
		'shb_season_show_meta_box',
		'shb_season',
		'normal',
		'high'
	);
	
    add_action('save_post','shb_season_meta_save');

}



/* ----------------------------------------------------------------------------

   Meta box content

---------------------------------------------------------------------------- */
function shb_season_show_meta_box() {
	
    global $post;
    $season_data = get_post_meta($post->ID);
    include(SHB_PLUGIN_DIR . '/includes/templates/backend/season/shb-season.htm.php');
    echo '<input type="hidden" name="season_meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';

}



/* ----------------------------------------------------------------------------

   Post type custom columns

---------------------------------------------------------------------------- */
add_filter( 'manage_shb_season_posts_columns', 'shb_season_custom_columns' );
function shb_season_custom_columns($columns) {
	
	unset($columns['date']);
    unset( $columns['author'] );
    $columns['season_from'] = __( 'From', 'sohohotel_booking' );
	$columns['season_to'] = __( 'To', 'sohohotel_booking' );
	//$columns['season_repeat'] = __( 'Repeat Yearly', 'sohohotel_booking' );
    $columns['season_rates'] = __( 'Rates', 'sohohotel_booking' );
	$columns['season_overlap'] = __( 'Overlap', 'sohohotel_booking' ) . ' <a href="#" title="' . __( 'Overlapping seasons should be avoided', 'sohohotel_booking' ) . '">(?)</a>';
    return $columns;
	
}



/* ----------------------------------------------------------------------------

   Custom columns content

---------------------------------------------------------------------------- */
add_action( 'manage_shb_season_posts_custom_column' , 'shb_season_custom_columns_content', 10, 2 );
function shb_season_custom_columns_content( $column, $post_id ) {
	
	$season_meta = get_post_meta(get_the_id());
	$accommodation_ids = shb_get_all_ids('shb_accommodation');
	$season_ids = shb_get_all_ids('shb_season');
	
    switch ( $column ) {
		
		case 'season_from' :
			echo $season_meta['shb_start_date'][0];
			break;
			
		case 'season_to' :
			echo $season_meta['shb_end_date'][0];
			break;
				
		/*case 'season_repeat' :
			echo shb_get_display_text($season_meta['shb_repeat'][0]);
			break;*/
		
		case 'season_rates' :
			echo shb_get_column_selected_fields($season_meta,'rate');
			break;
			
		case 'season_overlap' :
			echo shb_season_overlap_all_check($post_id,$season_ids);
			break;
		
    }
	
}



/* ----------------------------------------------------------------------------

   Check for overlapping seasons

---------------------------------------------------------------------------- */
function shb_season_overlap_all_check($id,$season_ids) {
	
	$overlap_ids = array();
	$output = '';
	
	foreach ($season_ids as $key => $val) {
		
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
			$output .= '<span class="shb-season-overlap"><span class="dashicons dashicons-no-alt"></span>' . get_the_title($val) . '</span>';
		}
		
	} else {
		
		$output .= '<span class="shb-season-overlap"><span class="dashicons dashicons-yes"></span>' . __( 'None', 'sohohotel_booking' ) . '</span>';
		
	}
	
	return $output;
	
}



/* ----------------------------------------------------------------------------

   Disable quick edit

---------------------------------------------------------------------------- */
add_filter( 'post_row_actions', 'shb_season_disable_quick_edit', 10, 2 );
function shb_season_disable_quick_edit( $actions = array(), $post = null ) {

    if ( ! is_post_type_archive( 'shb_season' ) ) {
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
function shb_season_remove_date_filter(){
	
	$screen = get_current_screen();
	
    if ( $screen->post_type == 'shb_season'){
		add_filter('months_dropdown_results', '__return_empty_array');
	}
	
}

add_action('admin_head', 'shb_season_remove_date_filter');



/* ----------------------------------------------------------------------------

   Make custom columns sortable

---------------------------------------------------------------------------- */
add_filter( 'manage_edit-shb_season_sortable_columns', 'sortable_shb_season_column' );
function sortable_shb_season_column( $columns ) {
    
	$columns['season_from'] = 'season_from';
	$columns['season_to'] = 'season_to';
    return $columns;
	
}

add_action( 'pre_get_posts', 'season_check_in_orderby' );
function season_check_in_orderby( $query ) {
	
	if( ! is_admin() )
        return;
 
    $orderby = $query->get( 'orderby');
 
    if( 'season_from' == $orderby ) {
        $query->set('meta_key','shb_start_date_alt');
        $query->set('orderby','meta_value');
    }
	
    if( 'season_to' == $orderby ) {
        $query->set('meta_key','shb_end_date_alt');
        $query->set('orderby','meta_value');
    }
	
}



/* ----------------------------------------------------------------------------

   Save meta content

---------------------------------------------------------------------------- */
add_action('save_post', 'shb_season_meta_save');
function shb_season_meta_save( $post_id ){
	
	$prefix = 'shb';

	if ( isset($_POST['season_meta_noncename'])) {
		
		if (!wp_verify_nonce($_POST['season_meta_noncename'],__FILE__)) {
			return $post_id;
		}

		if ( !current_user_can( 'edit_post', $post_id ))
			return $post_id;
		
		$season_data = get_post_meta($post_id);
		foreach($season_data as $key => $val){
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