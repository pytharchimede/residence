<?php global $page_layout; ?>
<?php get_header(); ?>

<!-- BEGIN .sohohotel-content-wrapper -->
<div class="sohohotel-content-wrapper sohohotel-clearfix">

	<!-- BEGIN .sohohotel-main-content -->
	<div class="sohohotel-main-content sohohotel-main-content-full-width sohohotel-blog-single-page">
		
		<?php if ( post_password_required() ) {
			echo sohohotel_password_form();
		} else { ?>
				
			<!-- BEGIN .sohohotel-blog-single-wrapper -->
			<div class="sohohotel-blog-single-wrapper">
			
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					
					<!-- BEGIN .sohohotel-blog-block -->
					<div id="post-<?php the_ID(); ?>" <?php post_class("sohohotel-blog-block"); ?>>

						<h3 class="shb-blog-single-title"><?php the_title(); ?></h3>

						<!-- BEGIN .sohohotel-blog-meta -->
						<div class="sohohotel-blog-meta clearfix">
							<span class="sohohotel-blog-meta-category"><i class="fas fa-tag"></i><?php echo get_post_meta($post->ID,'shb_short_description',TRUE); ?></span>
						<!-- END .sohohotel-blog-meta -->
						</div>
						
						<?php if( has_post_thumbnail() ) { ?>

							<div class="sohohotel-blog-single-image">
								<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'sohohotel-image-style2' ); ?>
								<?php echo '<img src="' . esc_url( $src[0] ) . '" alt="" />'; ?>
							</div>

						<?php } ?>
						
						<!-- BEGIN .sohohotel-blog-description -->
						<div class="sohohotel-blog-description sohohotel-clearfix">

							<?php the_content(); ?>
						
							<?php
						 	$defaults = array(
								'before'           => '<div class="sohohotel-post-pagination">',
								'after'            => '</div>',
								'link_before'      => '<span>',
								'link_after'       => '</span>',
								'next_or_number'   => 'number',
								'separator'        => ' ',
								'nextpagelink'     => esc_html__( 'Next page','soho-hotel' ),
								'previouspagelink' => esc_html__( 'Previous page','soho-hotel' ),
								'pagelink'         => '%',
								'echo'             => 1
							);
							
							wp_link_pages( $defaults ); ?>
								
							<p class="sohohotel-post-tags sohohotel-clearboth"><?php the_tags( esc_html__('Tags: ','soho-hotel'), ', ', '' ); ?></p>
						
						<!-- END .sohohotel-blog-description -->
						</div>

					<!-- END .sohohotel-blog-block -->
					</div>
					
				<?php endwhile; ?>
				<?php endif; ?>
			
				<?php comments_template(); ?>
		
			 <!-- END .sohohotel-blog-single-wrapper -->
			 </div>	
			
		<?php } ?>
		
	<!-- END .sohohotel-main-content -->
	</div>

<!-- END .sohohotel-content-wrapper -->
</div>

<?php
	
	$accommodation_ids = shb_get_all_ids('shb_accommodation');
	$include_ids = '';
	
	foreach($accommodation_ids as $accommodation_id) {
		$include_ids .= get_post_meta($post->ID,'shb_accommodation_' . $accommodation_id,TRUE) . ',';
	}

	$include_ids = substr_replace($include_ids, "", -1);
	
?>

<!-- BEGIN .sohohotel-more-news-wrapper -->
<div class="sohohotel-more-news-wrapper">
	
	<!-- BEGIN .sohohotel-more-news -->
	<div class="sohohotel-more-news">
	
		<h3 class="sohohotel-title1"><?php esc_html_e('Rooms Eligible For Offer', 'soho-hotel'); ?></h3>
		
		<?php echo do_shortcode('[shb_accommodation_carousel_2 columns="3" show_accommodation="' . $include_ids . '"]'); ?>
			
	<!-- END .sohohotel-more-news -->
	</div>
	
<!-- END .sohohotel-more-news-wrapper -->
</div>

<?php get_footer(); ?>