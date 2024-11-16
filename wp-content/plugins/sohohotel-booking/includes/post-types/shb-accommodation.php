<?php



/* ----------------------------------------------------------------------------

   Register post type

---------------------------------------------------------------------------- */
add_action( 'init', 'shb_accommodation_post_type' );
function shb_accommodation_post_type() {
	
	$labels = array(
        'name'                  => __('Accommodation','sohohotel_booking'),
        'singular_name'         => __('Accommodation','sohohotel_booking'),
        'menu_name'             => __('Accommodation','sohohotel_booking'),
        'parent_item_colon'     => __('Parent Accommodation:','sohohotel_booking'),
        'all_items'             => __('Accommodation','sohohotel_booking'),
        'view_item'             => __('View Accommodation','sohohotel_booking'),
        'add_new_item'          => __('Add New Room','sohohotel_booking'),
        'add_new'               => __('Add New','sohohotel_booking'),
        'edit_item'             => __('Edit Room','sohohotel_booking'),
        'update_item'           => __('Update Room','sohohotel_booking'),
        'search_items'          => __('Search Accommodation','sohohotel_booking'),
        'not_found'             => __('Not found','sohohotel_booking'),
        'not_found_in_trash'    => __('Not found in Trash','sohohotel_booking'),
    );

    $args = array(
        'label'                 => __('Accommodation','sohohotel_booking'),
        'description'           => '',
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'revisions'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_nav_menus'     => true,
        'show_in_admin_bar'     => true,
        'menu_position'         => 51,
        'menu_icon'             => 'dashicons-admin-home',
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => true,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
		'rewrite' => array('slug' => false,'with_front' => false),
    );

    register_post_type( 'shb_accommodation', $args );
	
}



/* ----------------------------------------------------------------------------

   Tag taxonomy

---------------------------------------------------------------------------- */
add_action( 'init', 'create_tag_taxonomies', 0 );

function create_tag_taxonomies() {

  $labels = array(
    'name' => _x( 'Accommodation Type', 'taxonomy general name' ),
    'singular_name' => _x( 'Accommodation Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search' ),
    'popular_items' => __( 'Popular' ),
    'all_items' => __( 'All' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Type' ), 
    'update_item' => __( 'Update Type' ),
    'add_new_item' => __( 'Add New Type' ),
    'new_item_name' => __( 'New Type Name' ),
    'separate_items_with_commas' => __( 'Separate types with commas' ),
    'add_or_remove_items' => __( 'Add or remove types' ),
    'choose_from_most_used' => __( 'Choose from the most used types' ),
	'not_found' => __( 'No types found' ),
    'menu_name' => __( 'Types' ),
  ); 

  register_taxonomy('accommodation-types','shb_accommodation',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'accommodation-types' ),
  ));
}



/* ----------------------------------------------------------------------------

   Category taxonomy

---------------------------------------------------------------------------- */
add_action( 'init', 'shb_accommodation_taxonomy' );
function shb_accommodation_taxonomy() {	
    register_taxonomy( 'accommodation-categories', 'shb_accommodation', array( 'hierarchical' => true, 'label' => __('Hotel','sohohotel_booking'), 'query_var' => true, 'rewrite' => true ) );
}



/* ----------------------------------------------------------------------------

   Meta boxes

---------------------------------------------------------------------------- */
add_action('add_meta_boxes', 'shb_accommodation_meta_init');
function shb_accommodation_meta_init() {
	
	add_meta_box(
		'shb_accommodation_settings',
		__('Accommodation Settings','sohohotel_booking'),
		'shb_accommodation_show_meta_box',
		'shb_accommodation',
		'normal',
		'high'
	);
	
	add_meta_box(
		'shb_accommodation_pricing_settings',
		__('Accommodation Pricing','sohohotel_booking'),
		'shb_accommodation_pricing_show_meta_box',
		'shb_accommodation',
		'normal',
		'high'
	);
	
    add_action('save_post','shb_accommodation_meta_save');

}



/* ----------------------------------------------------------------------------

   Meta box content

---------------------------------------------------------------------------- */
function shb_accommodation_show_meta_box() {
	
    global $post;
    $accommodation_data = get_post_meta($post->ID);
    include(SHB_PLUGIN_DIR . '/includes/templates/backend/accommodation/shb-accommodation-settings.htm.php');
    echo '<input type="hidden" name="accommodation_meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';

}



/* ----------------------------------------------------------------------------

   Meta box content

---------------------------------------------------------------------------- */
function shb_accommodation_pricing_show_meta_box() {
	
    global $post;
    $accommodation_data = get_post_meta($post->ID);
    include(SHB_PLUGIN_DIR . '/includes/templates/backend/accommodation/shb-accommodation-pricing.htm.php');
    echo '<input type="hidden" name="accommodation_meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';

}



/* ----------------------------------------------------------------------------

   Post type custom columns

---------------------------------------------------------------------------- */
add_filter( 'manage_shb_accommodation_posts_columns', 'shb_accommodation_custom_columns' );
function shb_accommodation_custom_columns($columns) {
	
	unset($columns['date']);
    unset( $columns['author'] );
	$columns['accommodation_price'] = __( 'Price', 'sohohotel_booking' );
	$columns['accommodation_type'] = __( 'Type', 'sohohotel_booking' );
	$columns['accommodation_occupancy'] = __( 'Occupancy', 'sohohotel_booking' );
	$columns['accommodation_qty'] = __( 'Qty', 'sohohotel_booking' );
	$columns['accommodation_category'] = __( 'Hotel', 'sohohotel_booking' );
	$columns['date'] = __( 'Date', 'sohohotel_booking' );
    return $columns;
	
}



/* ----------------------------------------------------------------------------

   Custom columns content

---------------------------------------------------------------------------- */
add_action( 'manage_shb_accommodation_posts_custom_column' , 'shb_accommodation_custom_columns_content', 10, 2 );
function shb_accommodation_custom_columns_content( $column, $post_id ) {
	
	$accommodation_meta = get_post_meta(get_the_id());
	$accommodation_ids = shb_get_all_ids('shb_accommodation');
	$season_ids = shb_get_all_ids('shb_season');

    switch ( $column ) {
		
		case 'accommodation_price' :
			if(!empty($accommodation_meta['shb_sorting_price'][0])) {
				echo shb_get_price($accommodation_meta['shb_sorting_price'][0]);
			} else {
				echo '-';
			}
			break;
			
		case 'accommodation_type' :
			if(!empty($accommodation_meta['shb_accommodation_type'][0])) {
				echo shb_get_display_text($accommodation_meta['shb_accommodation_type'][0]);
			} else {
				echo '-';
			}	
			break;
		
		case 'accommodation_occupancy' :
		
			if(!empty($accommodation_meta['shb_total_min'][0])) {
				if ($accommodation_meta['shb_accommodation_type'][0] == 'private') {
					echo __('Min','sohohotel_booking') . ' ' . $accommodation_meta['shb_total_min'][0] . ' / ' . __('Max','sohohotel_booking') . ' ' . $accommodation_meta['shb_total_max'][0];
				} else {
					echo '-';
				}
			} else {
				echo '-';
			}
		
			break;
			
		case 'accommodation_qty' :
			if(!empty($accommodation_meta['shb_qty'][0])) {
				echo $accommodation_meta['shb_qty'][0];
			} else {
				echo '-';
			}
			break;
			
		case 'accommodation_category' :
			echo '<div class="shb-accommodation-categories">';
		 	$terms = get_the_terms( $post_id, 'accommodation-categories' );
			if(!empty($terms)) {
				foreach($terms as $term) {
					echo '<span class="shb-accommodation-category"><a href="' . get_admin_url() . 'edit.php?s&post_status=all&post_type=shb_accommodation&shb_cat=' . $term->term_id . '">' . $term->name . '</a><span>, </span></span>';
				}
			} else {
					echo '-';
			}
			echo '</div>';
			break;
		
    }
	
}



/* ----------------------------------------------------------------------------

   Disable quick edit

---------------------------------------------------------------------------- */
add_filter( 'post_row_actions', 'shb_accommodation_disable_quick_edit', 10, 2 );
function shb_accommodation_disable_quick_edit( $actions = array(), $post = null ) {

    if ( ! is_post_type_archive( 'shb_accommodation' ) ) {
        return $actions;
    }

    if ( isset( $actions['inline hide-if-no-js'] ) ) {
        unset( $actions['inline hide-if-no-js'] );
    }

    return $actions;

}



/* ----------------------------------------------------------------------------

   Make custom columns sortable

---------------------------------------------------------------------------- */
add_filter( 'manage_edit-shb_accommodation_sortable_columns', 'sortable_shb_accommodation_column' );
function sortable_shb_accommodation_column( $columns ) {
    
	$columns['accommodation_price'] = 'accommodation_price';
	$columns['accommodation_type'] = 'accommodation_type';
	$columns['accommodation_qty'] = 'accommodation_qty';
    return $columns;
	
}

add_action( 'pre_get_posts', 'accommodation_orderby' );
function accommodation_orderby( $query ) {
	
	if( ! is_admin() )
        return;
 
    $orderby = $query->get( 'orderby');
 
    if( 'accommodation_price' == $orderby ) {
        $query->set('meta_key','shb_sorting_price');
        $query->set('orderby','meta_value_num');
    }
	
    if( 'accommodation_type' == $orderby ) {
        $query->set('meta_key','shb_room_type');
        $query->set('orderby','meta_value');
    }
	
    if( 'accommodation_qty' == $orderby ) {
        $query->set('meta_key','shb_room_quantity');
        $query->set('orderby','meta_value_num');
    }
	
}



/* ----------------------------------------------------------------------------

   Remove date filter

---------------------------------------------------------------------------- */ 
function shb_accommodation_remove_date_filter(){
	
	$screen = get_current_screen();
	
    if ( $screen->post_type == 'shb_accommodation'){
		add_filter('months_dropdown_results', '__return_empty_array');
	}
	
}

add_action('admin_head', 'shb_accommodation_remove_date_filter');



/* ----------------------------------------------------------------------------

   Filter accommodation by category

---------------------------------------------------------------------------- */ 
add_filter( 'pre_get_posts', 'shb_filter_accommodation_category' );
function shb_filter_accommodation_category( $query ) {
	
	global $pagenow;
	
	if ( is_admin() && $pagenow == 'edit.php') {
	
		if(!empty($_GET['shb_cat'])) {
		
			$shb_cat = wp_specialchars_decode($_GET['shb_cat']);
			
			$meta_query = array(
				'post_type' => 'shb_accommodation',
			    array(
			    'taxonomy' => 'accommodation-categories',
			    'field' => 'term_id',
			    'terms' => $shb_cat
				)
			);
	
			$query->set( 'tax_query', $meta_query );
					
		}
	
	}
	
}

add_action( 'restrict_manage_posts', 'shb_filter_accommodation_category_restrict_manage_posts' );
function shb_filter_accommodation_category_restrict_manage_posts() {
	
	global $pagenow;
	
	if ( is_admin() && $pagenow=='edit.php' && get_post_type() == 'shb_accommodation') {
		
		if(!empty($_GET['shb_cat'])) {
			$shb_cat = wp_specialchars_decode($_GET['shb_cat']);
		} else {
			$shb_cat = '';
		}
		
	    global $post;
		
		$args = array(
			'taxonomy' => 'accommodation-categories',
			'orderby' => 'name',
			'order'   => 'ASC'
		);
		
		$cats = get_categories($args);
		
		if(!empty($cats)) {
			
			echo '<select name="shb_cat">';
			echo '<option value="">' . __('All Hotels','sohohotel_booking') . '</option>';
		
			foreach($cats as $cat) {
	   			if ($shb_cat == $cat->term_id) {
	   				echo '<option value="' . $cat->term_id . '" selected>' . $cat->name . '</option>';
	   			} else {
	   				echo '<option value="' . $cat->term_id . '">' . $cat->name . '</option>';
	   			}
			}
		
			echo '</select>';
			
		}
	
	}

}



/* ----------------------------------------------------------------------------

   Save meta content

---------------------------------------------------------------------------- */
add_action('save_post', 'shb_accommodation_meta_save');
function shb_accommodation_meta_save( $post_id ){
	
	$prefix = 'shb';

	if ( isset($_POST['accommodation_meta_noncename'])) {
		
		if (!wp_verify_nonce($_POST['accommodation_meta_noncename'],__FILE__)) {
			return $post_id;
		}

		if ( !current_user_can( 'edit_post', $post_id ))
			return $post_id;
		
		$accommodation_data = get_post_meta($post_id);
		foreach($accommodation_data as $key => $val){
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
		if(!empty($_POST['shb_pricing'])) {
			
			$shb_pricing = $_POST['shb_pricing'];
		
			array_walk_recursive($shb_pricing, function(&$shb_pricing) {
			
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
	
				$shb_pricing = str_replace($search_strings,$replace_strings,$shb_pricing);	
			});
	
			update_post_meta($post_id,'shb_pricing',$shb_pricing);	
			
		}
		
	}

}



/* ----------------------------------------------------------------------------

   Remove post type slug from accommodation URL

---------------------------------------------------------------------------- */
function sht_remove_accommodation_post_slug($post_link, $post, $leavename) {

    if ($post->post_type != 'shb_accommodation' || $post->post_status != 'publish') {
        return $post_link;
    }

    $post_link = str_replace('/' . $post->post_type . '/', '/', $post_link);
    return $post_link;
}

add_filter('post_type_link', 'sht_remove_accommodation_post_slug', 10, 3);

function sht_set_posts($query) {

    if(isset($query->query['post_type'])){
        return;
    }

    if (!empty($query->query['name'])) {
        $query->set('post_type', array('post', 'shb_accommodation', 'page'));
    }
}

add_action('pre_get_posts', 'sht_set_posts');