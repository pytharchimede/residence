<?php

function sohohotel_testimonials_carousel_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
		'posts_per_page' => '10',
		'order' => '',
		'type' => '',
		'title' => '',
		'background_url' => ''
	), $atts ) );

	global $post;
	global $wp_query;
	$prefix = 'sohohotel_';
		
	// Set testimonials displayed per page
	if ( $posts_per_page != '' ) {
		$posts_per_page = $posts_per_page;
	} else {
		$posts_per_page = '1';
	}

	// Set testimonials display order
	if ( $order == 'newest' ) {
		$order = 'DESC';
	} elseif ( $order == 'oldest' ) {
		$order = 'ASC';
	} else {
		$order = 'DESC';
	}
		
	// Set type
	if ( $type == 'dark' ) {
		$type = 'sohohotel-testimonial-wrapper-dark';
	} else {
		$type = 'sohohotel-testimonial-wrapper-light';
	}

	ob_start();
	
	$args = array(
		'posts_per_page' => $posts_per_page,
		'post_type' => 'testimonial',
		'order' => 'DESC',
		'orderby' => 'date'
	); ?>
	
	<!-- BEGIN .sohohotel-testimonial-wrapper -->
	<div class="sohohotel-testimonial-wrapper <?php echo $type; ?>" style="background-image:url(<?php echo wp_get_attachment_image_url( $background_url, 'sohohotel-image-style11'); ?>);">
		
		<div class="sohohotel-testimonial-overlay"></div>
		
		<?php if(!empty($title)) { ?>
		<h3 class="sohohotel-title-28px sohohotel-clearfix sohohotel-title-center"><?php echo $title; ?></h3>
		<?php } ?>
		
		<?php $wp_query = new WP_Query( $args );
		if ($wp_query->have_posts()) : ?>
		
			<!-- BEGIN .sohohotel-testimonial-list- -->
			<div class="sohohotel-testimonial-list sohohotel-owl-carousel-1">
	
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
						<?php global $more;$more = 0;?>
						<?php the_excerpt(); ?>
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
		
			<!-- END .sohohotel-testimonial-list -->
			</div>
		
			<?php else : ?>
				<p><?php esc_html_e('No news has been added yet','sohohotel'); ?></p>
			<?php endif;

			wp_reset_query(); ?>
	
	<!-- END .sohohotel-testimonial-wrapper -->
	</div>
		
	<?php return ob_get_clean(); ?>

<?php }

add_shortcode( 'sohohotel_testimonials_carousel', 'sohohotel_testimonials_carousel_shortcode' );

?>