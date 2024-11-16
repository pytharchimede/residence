<?php

function sohohotel_blog_page_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
		'posts_per_page' => '',
		'order' => '',
		'style' => '',
		'category' => '',
	), $atts ) );
	
	ob_start();
	
	global $post;
	global $wp_query;
	$prefix = 'sohohotel_';
	
	// Set news Displayed Per Page
	if ( $posts_per_page != '' ) {
		$posts_per_page = $posts_per_page;
	} else {
		$posts_per_page = '1';
	}
	
	// Set news Display Order
	if ( $order == 'newest' ) {
		$news_order = 'DESC';
	} elseif ( $order == 'oldest' ) {
		$news_order = 'ASC';
	} else {
		$news_order = 'DESC';
	}
	
	$array = array('2-2', '2-3', '3');
	
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	
	$args = array(
		'post_type' => 'post',
		'posts_per_page' => $posts_per_page,
		'paged' => $paged,
		'category_name' => $category,
		'orderby' => 'date',
		'order' => $news_order
	);
	
	$wp_query = new WP_Query( $args );
	if ($wp_query->have_posts()) : ?>
	
	<?php if ( $style == '2-2' ) { $image_size = 'sohohotel-image-style13'; ?>
	
		<!-- BEGIN .sohohotel-blog-wrapper-2 -->
		<div class="sohohotel-blog-wrapper-2 sohohotel-blog-wrapper-2-2-col sohohotel-clearfix">
	
	<?php } elseif ( $style == '2-3' ) { $image_size = 'sohohotel-image-style13'; ?>
	
		<!-- BEGIN .sohohotel-blog-wrapper-2 -->
		<div class="sohohotel-blog-wrapper-2 sohohotel-blog-wrapper-2-3-col sohohotel-clearfix">
			
	<?php } elseif ( $style == '3' ) { $image_size = 'sohohotel-image-style13'; ?>
	
		<!-- BEGIN .sohohotel-blog-wrapper-2 -->
		<div class="sohohotel-blog-wrapper-3 sohohotel-clearfix">
		
	<?php } else { $image_size = 'sohohotel-image-style12'; ?>
		
		<!-- BEGIN .sohohotel-blog-wrapper-1 -->
		<div class="sohohotel-blog-wrapper-1">
		
	<?php } ?>
	
		<?php while($wp_query->have_posts()) :
			
			$wp_query->the_post(); ?>
			
				<!-- BEGIN .sohohotel-blog-block -->
				<div id="post-<?php the_ID(); ?>" <?php post_class("sohohotel-blog-block sohohotel-clearfix"); ?>>
					
					<?php if( has_post_thumbnail() ) { ?>

						<div class="sohohotel-blog-block-image">
							<a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
								<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $image_size ); ?>
								<?php echo '<img src="' . esc_url( $src[0] ) . '" alt="" />'; ?>
							</a>
						</div>

					<?php } ?>
					
					<!-- BEGIN .sohohotel-blog-title-meta-wrapper -->
					<div class="sohohotel-blog-title-meta-wrapper">
					
						<h3><a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

						<!-- BEGIN .sohohotel-blog-meta -->
						<div class="sohohotel-blog-meta clearfix">
							<span class="sohohotel-blog-meta-date"><i class="fas fa-calendar"></i><a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo get_the_date(get_option('date_format')); ?></a></span>
							<span class="sohohotel-blog-meta-author"><i class="fas fa-pencil-alt"></i><?php esc_html_e('By','soho-hotel'); ?> <?php the_author_posts_link(); ?></span>
							
							<?php if ( !in_array($style,$array) ) { ?>
							
								<span class="sohohotel-blog-meta-category"><i class="fas fa-tag"></i><?php the_category(', '); ?></span>
								<span class="sohohotel-blog-meta-comments"><i class="fas fa-comment"></i><?php comments_popup_link(esc_html__( 'No Comments', 'soho-hotel' ),esc_html__( '1 Comment', 'soho-hotel' ),esc_html__( '% Comments', 'soho-hotel' ),'',esc_html__( 'Comments Off','soho-hotel')); ?></span>
						
							<?php } ?>
					
						<!-- END .sohohotel-blog-meta -->
						</div>
					
					<!-- END .sohohotel-blog-title-meta-wrapper -->
					</div>
					
					<?php if ( !in_array($style,$array) ) { ?>
					
						<!-- BEGIN .sohohotel-blog-description -->
						<div class="sohohotel-blog-description sohohotel-clearfix">
						
							<?php if(!empty(get_post_meta($post->ID,'sohohotel_post_excerpt',TRUE))) { ?>
							
								<?php echo get_post_meta($post->ID,'sohohotel_post_excerpt',TRUE); ?>
								<div class="sohohotel-clearboth"></div>
								<a href="<?php esc_url(the_permalink()); ?>" class="sohohotel-more-link"><?php echo esc_html__( 'Read More', 'soho-hotel' ); ?></a>
							
							<?php } else { ?>
							
								<?php global $more;$more = 0;?>
								<?php the_excerpt(); ?>
								
							<?php } ?>

						<!-- END .sohohotel-blog-description -->
						</div>
					
					<?php } ?>

				<!-- END .sohohotel-blog-block -->
				</div>
				
		<?php endwhile; ?>
		
		<!-- END .sohohotel-blog-wrapper -->
		</div>
		
		<?php else : ?>
			<p><?php esc_html_e('No news has been added yet','sohohotel'); ?></p>
		<?php endif; ?>
		
		<?php if ( $wp_query->max_num_pages > 1 ) : ?>
			
			<div class="sohohotel-blog-pagination">
			<?php include(SHSPT_PLUGIN_DIR . '/includes/functions/frontend/shspt-pagination.php'); ?>
			</div>
			
		<?php endif; wp_reset_query();
		
		return ob_get_clean();

}

add_shortcode( 'sohohotel_blog_page', 'sohohotel_blog_page_shortcode' );

?>