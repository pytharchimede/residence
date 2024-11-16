<?php

function sohohotel_testimonials_page_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
		'posts_per_page' => '',
		'order' => ''
	), $atts ) );
	
	ob_start();
	
	global $post;
	global $wp_query;
	
	// Set Testimonials Displayed Per Page
	if ( $posts_per_page != '' ) {
		$posts_per_page = $posts_per_page;
	} else {
		$posts_per_page = '1';
	}
	
	// Set Testimonials Display Order
	if ( $order == 'newest' ) {
		$testimonials_order = 'DESC';
	} elseif ( $order == 'oldest' ) {
		$testimonials_order = 'ASC';
	} else {
		$testimonials_order = 'DESC';
	}
	
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	
	$args = array(
	'post_type' => 'testimonial',
	'posts_per_page' => $posts_per_page,
	'paged' => $paged,
	);
	
	$wp_query = new WP_Query( $args );
	if ($wp_query->have_posts()) : ?>
	
		<!-- BEGIN .sohohotel-testimonial-wrapper -->
		<div class="sohohotel-testimonial-wrapper sohohotel-testimonial-wrapper-light">
			
		<!-- BEGIN .sohohotel-testimonial-list- -->
		<div class="sohohotel-testimonial-list sohohotel-testimonial-listing-page">
			
		<?php while($wp_query->have_posts()) :
			
			$wp_query->the_post(); ?>
	
			<?php
				// Get testimonial data
				$testimonial_name = get_post_meta($post->ID, 'shb_guest_name', true);
				$testimonial_room = get_post_meta($post->ID, 'shb_additional_info', true);			
			?>
			
			<!-- BEGIN .sohohotel-testimonial-block -->
			<div class="sohohotel-testimonial-block">
				
				<div>
					<span class="sohohotel-open-quote">“</span>
					<?php the_content(); ?>
					<span class="sohohotel-close-quote">”</span>
				</div>

				<?php if( has_post_thumbnail() ) { ?>

					<div class="sohohotel-testimonial-image">
						<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'sohohotel-image-style6' ); ?>
						<?php echo '<img src="' . $src[0] . '" alt="" />'; ?>
					</div>

				<?php } ?>

				<div class="sohohotel-testimonial-author"><p><?php echo esc_textarea($testimonial_name); ?> - <span><?php echo esc_textarea($testimonial_room); ?></span></p></div>
				
			<!-- END .sohohotel-testimonial-block -->
			</div>
			
		<?php endwhile; ?>
		
		<!-- END .sohohotel-testimonial-list- -->
		</div>
		
		<!-- END .sohohotel-testimonial-wrapper -->
		</div>
		
		<?php else : ?>
			<p><?php esc_html_e('No testimonials have been added yet','sohohotel'); ?></p>
		<?php endif;

		if ( $wp_query->max_num_pages > 1 ) : ?>

			<?php include(SHSPT_PLUGIN_DIR . '/includes/functions/frontend/shspt-pagination.php'); ?>

		<?php endif; wp_reset_query();
		
		return ob_get_clean();

}

add_shortcode( 'sohohotel_testimonials_page', 'sohohotel_testimonials_page_shortcode' );

?>