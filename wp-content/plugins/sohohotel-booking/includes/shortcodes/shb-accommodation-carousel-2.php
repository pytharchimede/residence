<?php

function shb_accommodation_carousel_2_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
		'hotel_category' => '',
		'order' => '',
		'columns' => '',
		'show_accommodation' => '',
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
	
	if(!empty($show_accommodation)) {
		
		$e = explode(",",$show_accommodation);
	
		foreach($e as $id) {
			$include_id[] = $id;
		}
		
	} else {
		$include_id = '';
	}
	
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	
	// Display From Category
	if ( $hotel_category != '' ) {
		
		$args = array(
			'post_type' => 'shb_accommodation',
			'post__not_in' => $exclude_id,
			'post__in'=> $include_id,
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
			'post__in'=> $include_id,
			'posts_per_page' => '9999',
			'paged' => $paged,
			'order' => $rooms_order
		);
		
	}
	
	$wp_query = new WP_Query( $args );
	if ($wp_query->have_posts()) : ?>
	
	<!-- BEGIN .shb-accommodation-listing-style-2 -->
	<div class="shb-accommodation-listing-style-2 shb-accommodation-listing-style-2-columns-3 <?php echo $column_class; ?>">
		
		<?php while($wp_query->have_posts()) :
			$wp_query->the_post(); 
		
			$shb_price_intro = get_post_meta($post->ID,'shb_price_intro',TRUE);
			$shb_sorting_price = shb_get_price(get_post_meta($post->ID,'shb_sorting_price',TRUE));
			$shb_price_intro_display = str_replace('[price]',$shb_sorting_price,$shb_price_intro);
			$shb_short_description = get_post_meta($post->ID,'shb_short_description',TRUE);
		?>

		<!-- BEGIN .shb-accommodation-listing-item -->
		<div class="shb-accommodation-listing-item">
			
			<div class="shb-accommodation-listing-image">
				
				<a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" class="shb-accommodation-listing-button1"><?php echo $shb_price_intro_display; ?></a>
				
				<?php if( has_post_thumbnail() ) { ?>
				<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'shb-thumbnail-1' ); ?>
				<a href="<?php esc_url(the_permalink()); ?>" rel="bookmark">
					<?php echo '<img src="' . $src[0] . '" alt="' . get_the_title() . '" />'; ?>
				</a>
				<?php } ?>
				
			</div>
			
			<div class="shb-accommodation-listing-description-wrapper">
			
				<h3><a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
			
				<div class="shb-accommodation-listing-description shb-clearfix">
				
					<?php echo $shb_short_description; ?>
				
				</div>
			
			</div>
			
		<!-- END .shb-accommodation-listing-item -->
		</div>
	
		<?php endwhile; ?>
	
	<!-- END .shb-accommodation-listing-style-2 -->
	</div>
	
	<?php else : ?>
		<p><?php esc_html_e('No rooms have been added yet','sohohotel_booking'); ?></p>
	<?php endif;

	 wp_reset_query();
		
	return ob_get_clean();

}

add_shortcode( 'shb_accommodation_carousel_2', 'shb_accommodation_carousel_2_shortcode' );

?>