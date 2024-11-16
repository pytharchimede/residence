<?php



/* ----------------------------------------------------------------------------

   Meta boxes

---------------------------------------------------------------------------- */
add_action('add_meta_boxes', 'sohohotel_post_meta_init');
function sohohotel_post_meta_init() {
	
	$prefix = 'sohohotel';
	
	add_meta_box(
		$prefix . '_post_excerpt',
		__('Post Excerpt','soho-hotel'),
		$prefix . '_post_excerpt_show_meta_box',
		'post',
		'normal',
		'high'
	);
	
    add_action('save_post','sohohotel_post_meta_save');

}



/* ----------------------------------------------------------------------------

   Meta box content

---------------------------------------------------------------------------- */
function sohohotel_post_excerpt_show_meta_box() {
	
    global $post;
    $post_data = get_post_meta($post->ID);
	include( get_template_directory() . '/framework/inc/templates/backend/post/sohohotel-post.htm.php');
    echo '<input type="hidden" name="post_meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';

}



/* ----------------------------------------------------------------------------

   Save meta content

---------------------------------------------------------------------------- */
add_action('save_post', 'sohohotel_post_meta_save');
function sohohotel_post_meta_save( $post_id ){
	
	$prefix = 'sohohotel';

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