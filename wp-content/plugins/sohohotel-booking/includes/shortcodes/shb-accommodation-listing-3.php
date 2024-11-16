<?php

function shb_accommodation_listing_3_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
		'posts_per_page' => '10',
		'hotel_category' => '',
		'columns' => '3',
		'hide_pagination' => '',
		'hide_filter' => '',
		'hide_order' => ''
	), $atts ) );
	
	global $post;
	global $wp_query;
	
	ob_start();
	
	// Set accommodation type
	$accommodation_type = 0;
	$accommodation_type_query = '';
	
	if(!empty($_GET['shb-accommodation-type'])) {
		
		$term = term_exists($_GET['shb-accommodation-type'], 'accommodation-types');
		if ($term !== 0 && $term !== null) {
			$accommodation_type = $_GET['shb-accommodation-type'];
		}
	
	} 
	
	if ( !empty($accommodation_type) ) {
	
		$accommodation_type_query = array(
			'taxonomy' => 'accommodation-types',
			'field'    => 'slug',
			'terms'    => $accommodation_type,
		);
	
	} 
	
	// Set hotel category
	$hotel_category_query = '';
	
	if ( $hotel_category != '' ) {
	
		$hotel_category_query = array(
			'taxonomy' => 'accommodation-categories',
			'field'    => 'slug',
			'terms'    => $hotel_category,
		);
	
	} 
	
	// Set orderby
	$order = 'DESC';
	$order_url = '2';
	
	if(!empty($_GET['shb-orderby'])) {
		
		if($_GET['shb-orderby'] == '1') {
			$order = 'ASC';
			$order_url = '1';
		}
	
	} 
	
	// Pagination
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	
	// Set WP query array
	$args = array(
		'post_type' => 'shb_accommodation',
		'tax_query' => array(
				$hotel_category_query,
				$accommodation_type_query,
			),
		'posts_per_page' => $posts_per_page,
		'paged' => $paged,
		'meta_key'			=> 'shb_sorting_price',
		'orderby'			=> 'meta_value',
		'order'				=> $order,
		
	);
	
	// Set URLs
	global $wp;
	$page_url = home_url( $wp->request );
	$page_url_order = home_url( $wp->request ) . '?shb-orderby=' . $order_url;
	$page_url_type = home_url( $wp->request ) . '?shb-accommodation-type=' . $accommodation_type;
	
	// Build filter array
	$accommodation_type_array[0]['class'] = '';
	
	if(empty($accommodation_type)) {
		$accommodation_type_array[0]['class'] = 'shb-filter-current';
	}
	$accommodation_type_array[0]['url'] = $page_url_order;
	$accommodation_type_array[0]['label'] = __('All','sohohotel_booking');
	
	$taxonomy = 'accommodation-types';
	$terms = get_terms($taxonomy);

	if ( $terms && !is_wp_error( $terms ) ) {
	
		foreach ( $terms as $term ) { 
			
			$accommodation_type_array[$term->term_id]['class'] = '';
			
			if(!empty($accommodation_type)) {
				if($accommodation_type == $term->slug) {
					$accommodation_type_array[$term->term_id]['class'] = 'shb-filter-current';
				}
			}
			$accommodation_type_array[$term->term_id]['url'] = $page_url_order . '&shb-accommodation-type=' . $term->slug;
			$accommodation_type_array[$term->term_id]['label'] = $term->name;
		
		} 
	}
	
	// Build order array
	$accommodation_order_array[0]['selected'] = '';
	if(empty($_GET['shb-orderby'])) {
		$accommodation_order_array[0]['selected'] = 'selected';
	} 
	$accommodation_order_array[0]['url'] = $page_url_type;
	$accommodation_order_array[0]['label'] = __('Default Sorting','sohohotel_booking');
	$accommodation_order_array[1]['selected'] = '';
	if(!empty($_GET['shb-orderby'])) {
		if($_GET['shb-orderby'] == 1) {
			$accommodation_order_array[1]['selected'] = 'selected';
		}
	}
	$accommodation_order_array[1]['url'] = $page_url_type . '&shb-orderby=1';
	$accommodation_order_array[1]['label'] = __('Price Low to High','sohohotel_booking');
	$accommodation_order_array[2]['selected'] = '';
	if(!empty($_GET['shb-orderby'])) {
		if($_GET['shb-orderby'] == 2) {
			$accommodation_order_array[2]['selected'] = 'selected';
		}
	}
	$accommodation_order_array[2]['url'] = $page_url_type . '&shb-orderby=2';
	$accommodation_order_array[2]['label'] = __('Price High to Low','sohohotel_booking');
	
	$wp_query = new WP_Query( $args );
	if ($wp_query->have_posts()) : ?>
		
		<?php if ( $hide_filter !== '2' || $hide_order !== '2' ) { ?>
		
			<!-- BEGIN .shb-accommodation-listing-filter-sorting -->
			<div class="shb-accommodation-listing-filter-sorting shb-clearfix">
			
				<?php if ( $hide_filter !== '2' ) { ?>
			
				<div class="shb-accommodation-listing-filter shb-clearfix">
					<p><?php _e('Filter by','sohohotel_booking'); ?>:</p>
					<ul>
						<?php foreach($accommodation_type_array as $accommodation_type_data) {
							echo '<li class="' . $accommodation_type_data['class'] . '"><a href="' . $accommodation_type_data['url'] . '">' . $accommodation_type_data['label'] . '</a></li>';
						} ?>
					</ul>
				</div>
			
				<?php } ?>
			
				<?php if ( $hide_order !== '2' ) { ?>
			
				<div class="shb-accommodation-listing-sorting shb-clearfix">
					<select>
						<?php foreach($accommodation_order_array as $accommodation_order_data) {
							echo '<option value="' . $accommodation_order_data['url'] . '" ' . $accommodation_order_data['selected'] . '>' . $accommodation_order_data['label'] . '</option>';
						} ?>
					</select>
					<i class="fas fa-chevron-down"></i>
				</div>
			
				<?php } ?>
	
			<!-- END .shb-accommodation-listing-filter-sorting -->
			</div>
		
		<?php } ?>
		
		<!-- BEGIN .shb-accommodation-listing-style-3 -->
		<div class="shb-accommodation-listing-style-3 shb-accommodation-listing-style-3-columns-<?php echo $columns; ?>">
			
			<?php while($wp_query->have_posts()) :
				$wp_query->the_post(); 
				$shb_price_intro = get_post_meta($post->ID,'shb_price_intro',TRUE);
				$shb_sorting_price = shb_get_price(get_post_meta($post->ID,'shb_sorting_price',TRUE));
				$shb_price_intro_display = str_replace('[price]',$shb_sorting_price,$shb_price_intro);
			?>
	
			<!-- BEGIN .shb-accommodation-listing-item -->
			<div class="shb-accommodation-listing-item">
			
				<div class="shb-accommodation-listing-image">
				
					<div class="shb-accommodation-listing-description-wrapper">
						<h3><a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
						<a href="<?php esc_url(the_permalink()); ?>" class="shb-accommodation-listing-button1"><?php echo $shb_price_intro_display; ?></a>
					</div>
				
					<?php if( has_post_thumbnail() ) { ?>
					<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'shb-thumbnail-1' ); ?>
					
					<a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
						<img src="<?php echo $src[0]; ?>" alt="<?php the_title(); ?>" />
					</a>
					
					<?php } ?>
				
				</div>
			
			<!-- END .shb-accommodation-listing-item -->
			</div>
		
			<?php endwhile; ?>
		
		<!-- END .shb-accommodation-listing-style-3 -->
		</div>
	
	<?php else : ?>
		<p><?php esc_html_e('No rooms have been added yet','sohohotel_booking'); ?></p>
	<?php endif; ?>
	
	<?php if ( $hide_pagination !== '2' ) { ?>
		
		<div class="shb-clearboth"></div>
		<div class="shb-accommodation-listing-3-pagination">
		<?php include(SHB_PLUGIN_DIR . '/includes/templates/frontend/shb-pagination.php'); ?>
		</div>
		
	<?php } ?>
	
	<?php wp_reset_query();
	
	return ob_get_clean();

}

add_shortcode( 'shb_accommodation_listing_3', 'shb_accommodation_listing_3_shortcode' );

?>