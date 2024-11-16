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
							<span class="sohohotel-blog-meta-date"><i class="fas fa-calendar"></i><a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo get_the_date(get_option('date_format')); ?></a></span>
							<span class="sohohotel-blog-meta-author"><i class="fas fa-pencil-alt"></i><?php esc_html_e('By','soho-hotel'); ?> <?php the_author_posts_link(); ?></span>
							<span class="sohohotel-blog-meta-category"><i class="fas fa-tag"></i><?php the_category(', '); ?></span>
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

<!-- BEGIN .sohohotel-more-news-wrapper -->
<div class="sohohotel-more-news-wrapper">
	
	<!-- BEGIN .sohohotel-more-news -->
	<div class="sohohotel-more-news">
	
		<h3 class="sohohotel-title1"><?php esc_html_e('More News', 'soho-hotel'); ?></h3>
		
		<?php
		
		if(!empty(get_option("sticky_posts"))) {
			$post_not_in = get_option("sticky_posts");
		} else {
			$post_not_in = array();
		}
		
		array_push($post_not_in, $post->ID);
		
		global $post;
		global $wp_query;
		$prefix = 'sohohotel_';
	
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	
		$args = array(
		'post_type' => 'post',
		'posts_per_page' => 3,
		'paged' => $paged,
		'orderby' => 'date',
		'order' => 'ASC',
		'post__not_in' => $post_not_in
		);
	
		$wp_query = new WP_Query( $args );
		if ($wp_query->have_posts()) : ?>
	
			<!-- BEGIN .sohohotel-blog-wrapper-2 -->
			<div class="sohohotel-blog-wrapper-2 sohohotel-blog-wrapper-2-3-col sohohotel-clearfix">
	
			<?php while($wp_query->have_posts()) :
			
				$wp_query->the_post(); ?>
			
					<!-- BEGIN .sohohotel-blog-block -->
					<div id="post-<?php the_ID(); ?>" <?php post_class("sohohotel-blog-block"); ?>>

						<?php if( has_post_thumbnail() ) { ?>

							<div class="sohohotel-blog-block-image">
								<a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
									<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'sohohotel-image-style5' ); ?>
									<?php echo '<img src="' . esc_url( $src[0] ) . '" alt="" />'; ?>
								</a>
							</div>

						<?php } ?>
					
						<h3><a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

						<!-- BEGIN .sohohotel-blog-meta -->
						<div class="sohohotel-blog-meta clearfix">
							<span class="sohohotel-blog-meta-date"><i class="fas fa-calendar"></i><a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo get_the_date('F jS, Y'); ?></a></span>
							<span class="sohohotel-blog-meta-category"><i class="fas fa-tag"></i><?php the_category(', '); ?></span>
						<!-- END .sohohotel-blog-meta -->
						</div>
					
					<!-- END .sohohotel-blog-block -->
					</div>
			
				<?php endwhile; ?>
		
			<!-- END .sohohotel-blog-wrapper-2 -->
			</div>
		
			<?php else : ?>
				<p><?php esc_html_e('No news has been added yet','soho-hotel'); ?></p>
			<?php endif; 
		
			wp_reset_query(); ?>
			
			<?php if(!empty(get_theme_mod('sohohotel_blog_page_url'))) { ?>
				<a href="<?php echo get_theme_mod('sohohotel_blog_page_url'); ?>" class="sohohotel-button-1 sohohotel-blog-view-more"><?php esc_html_e('View More','soho-hotel'); ?></a>
			<?php } ?>
			
	<!-- END .sohohotel-more-news -->
	</div>
	
<!-- END .sohohotel-more-news-wrapper -->
</div>

<?php get_footer(); ?>