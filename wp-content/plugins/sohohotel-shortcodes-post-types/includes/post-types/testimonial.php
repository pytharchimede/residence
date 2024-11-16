<?php

function create_post_type_testimonial() {
	
	register_post_type('testimonial', 
		array(
			'labels' => array(
				'name' => esc_html__( 'Testimonials', 'sohohotel' ),
                'singular_name' => esc_html__( 'Testimonial', 'sohohotel' ),
				'add_new' => esc_html__('Add Testimonial', 'sohohotel' ),
				'add_new_item' => esc_html__('Add New Testimonial' , 'sohohotel' )
			),
		'public' => true,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-admin-post',
		'rewrite' => array(
			'slug' => esc_html__('testimonials','sohohotel')
		), 
		'supports' => array( 'title','editor','thumbnail'),
	));
}

add_action( 'init', 'create_post_type_testimonial' );



/* ----------------------------------------------------------------------------

   Meta boxes

---------------------------------------------------------------------------- */
add_action('add_meta_boxes', 'sohohotel_testimonial_meta_init');
function sohohotel_testimonial_meta_init() {
	
	$prefix = 'sohohotel';
	
	add_meta_box(
		$prefix . '_testimonial_settings',
		__('Testimonial Settings','soho-hotel'),
		$prefix . '_testimonial_settings_show_meta_box',
		'testimonial',
		'normal',
		'high'
	);
	
    add_action('save_post','sohohotel_post_meta_save');

}



/* ----------------------------------------------------------------------------

   Meta box content

---------------------------------------------------------------------------- */
function sohohotel_testimonial_settings_show_meta_box() {
	
    global $post;
    $testimonial_data = get_post_meta($post->ID);
	include( SHSPT_PLUGIN_DIR . '/includes/templates/backend/testimonial/sohohotel-testimonial.htm.php');
    echo '<input type="hidden" name="post_meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';

}



/* ----------------------------------------------------------------------------

   Save meta content

---------------------------------------------------------------------------- */
add_action('save_post', 'sohohotel_testimonial_meta_save');
function sohohotel_testimonial_meta_save( $post_id ){
	
	$prefix = 'shb';

	if ( isset($_POST['post_meta_noncename'])) {
		
		if (!wp_verify_nonce($_POST['post_meta_noncename'],__FILE__)) {
			return $post_id;
		}

		if ( !current_user_can( 'edit_post', $post_id ))
			return $post_id;
		
		$post_data = get_post_meta($post_id);
		foreach($post_data as $key => $val){
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

?>