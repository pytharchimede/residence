<?php

function shb_accommodation_carousel_1_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
		'hotel_category' => '',
		'order' => '',
		'columns' => '',
	), $atts ) );
	
	global $post;
	global $wp_query;
	
	ob_start();
	
	// Set Rooms Display Order
	if ( $order == 'newest' ) {
		$rooms_order = 'DESC';
	} elseif ( $order == 'oldest' ) {
		$rooms_order = 'ASC';
	} else {
		$rooms_order = 'DESC';
	}
	
	if($columns == '3') {
		$column_class = 'sohohotel-owl-carousel-4';
	} else{
		$column_class = 'sohohotel-owl-carousel-3';
	}
	
	if( get_post_type() == 'shb_accommodation' ) {
		$exclude_id = array(get_the_ID());
	} else {
		$exclude_id = array();
	}
	
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	
	// Display From Category
	if ( $hotel_category != '' ) {
		
		$args = array(
			'post_type' => 'shb_accommodation',
			'post__not_in' => $exclude_id,
			'tax_query' => array(
					array(
						'taxonomy' => 'accommodation-categories',
						'field'    => 'slug',
						'terms'    => $hotel_category,
					),
				),
			'posts_per_page' => '9999',
			'paged' => $paged,
			'order' => $rooms_order
		);
		
	} else {
		
		$args = array(
			'post_type' => 'shb_accommodation',
			'post__not_in' => $exclude_id,
			'posts_per_page' => '9999',
			'paged' => $paged,
			'order' => $rooms_order
		);
		
	}
	
	$wp_query = new WP_Query( $args );
	if ($wp_query->have_posts()) : ?>
	
	<!-- BEGIN .shb-accommodation-listing-style-1 -->
	<div class="shb-accommodation-listing-style-1 shb-accommodation-listing-style-1-columns-3 <?php echo $column_class; ?>">
		
		<?php while($wp_query->have_posts()) :

			$wp_query->the_post(); 

			global $count;
			global $sohohotel_booking_data;
			$count++;
			
			$accommodation_meta = json_decode( get_post_meta($post->ID,'_accommodation_meta',TRUE), true );
			$accommodation_meta_room_excerpt = get_post_meta($post->ID,'_accommodation_room_excerpt_meta',TRUE);
		
		?>
		
		<!-- BEGIN .shb-accommodation-listing-item -->
		<div class="shb-accommodation-listing-item">
			
			<?php if( has_post_thumbnail() ) { ?>
				<a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
					<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'shb-thumbnail-1' ); ?>
					<?php echo '<img class="shb-accommodation-listing-image" src="' . $src[0] . '" alt="' . get_the_title() . '" />'; ?>
				</a>
			<?php } ?>
			
			<div class="shb-accommodation-listing-description-wrapper">
				
				<h3><a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				
				<div class="shb-accommodation-listing-description shb-clearfix">
					
					<?php 
					
					/*
					
						<ul>
							<li><i class="fas fa-user"></i><span>Capacity:</span> 2 Adults</li>
							<li><i class="fas fa-ruler-combined"></i><span>Size:</span> 35sqm</li>
							<li><i class="fas fa-binoculars"></i><span>View:</span> City</li>
						</ul>
					
					*/
					
					$shb_price_intro = get_post_meta($post->ID,'shb_price_intro',TRUE);
					$shb_sorting_price = shb_get_price(get_post_meta($post->ID,'shb_sorting_price',TRUE));
					$shb_price_intro_display = str_replace('[price]',$shb_sorting_price,$shb_price_intro);
					$shb_short_description = get_post_meta($post->ID,'shb_short_description',TRUE);
					echo $shb_short_description;
					
					?>
					
					<a href="<?php esc_url(the_permalink()); ?>" class="shb-accommodation-listing-button1"><?php echo $shb_price_intro_display; ?></a>
					<a href="<?php esc_url(the_permalink()); ?>" class="shb-accommodation-listing-button2"><?php esc_html_e('View Room','sohohotel_booking'); ?><i class="fas fa-chevron-right"></i></a>
				
				</div>
				
			</div>
			
		<!-- END .shb-accommodation-listing-item -->
		</div>
		
		<?php endwhile; ?>
		
	<!-- END .shb-accommodation-listing-style-1 -->
	</div>
	
	<?php else : ?>
		<p><?php esc_html_e('No rooms have been added yet','sohohotel_booking'); ?></p>
	<?php endif;

	 wp_reset_query();
		
	return ob_get_clean();

}

add_shortcode( 'shb_accommodation_carousel_1', 'shb_accommodation_carousel_1_shortcode' );

?>