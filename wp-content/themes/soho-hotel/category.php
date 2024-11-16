<?php global $page_layout; ?>
<?php get_header(); ?>
<?php get_template_part( 'sohohotel', 'pagetitle' ); ?>

<!-- BEGIN .sohohotel-content-wrapper -->
<div class="sohohotel-content-wrapper sohohotel-clearfix sohohotel-content-wrapper-<?php echo esc_html($page_layout); ?>">

	<!-- BEGIN .sohohotel-main-content -->
	<div class="sohohotel-main-content sohohotel-main-content-<?php echo esc_html($page_layout); ?>">
			
		<?php if ( have_posts() ) : ?>
				
			<!-- BEGIN .sohohotel-blog-wrapper-1 -->
			<div class="sohohotel-blog-wrapper-1">
				
				<?php if ( category_description() ) : ?>
					<div class="sohohotel-archive-meta"><?php echo category_description(); ?></div>
				<?php endif; ?>
				
				<?php while ( have_posts() ) : the_post(); ?>
					
					<!-- BEGIN .sohohotel-blog-block -->
					<div id="post-<?php the_ID(); ?>" <?php post_class("sohohotel-blog-block"); ?>>
						
						<?php if( has_post_thumbnail() ) { ?>

							<div class="sohohotel-blog-block-image">
								<a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
									<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'sohohotel-image-style1' ); ?>
									<?php echo '<img src="' . esc_url( $src[0] ) . '" alt="" />'; ?>
								</a>
							</div>

						<?php } ?>

						<h3><a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

						<!-- BEGIN .sohohotel-blog-meta -->
						<div class="sohohotel-blog-meta clearfix">
							<span class="sohohotel-blog-meta-date"><i class="fas fa-calendar"></i><a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo get_the_date('F jS, Y'); ?></a></span>
							<span class="sohohotel-blog-meta-author"><i class="fas fa-pencil-alt"></i><?php esc_html_e('By','soho-hotel'); ?> <?php the_author_posts_link(); ?></span>
							<span class="sohohotel-blog-meta-category"><i class="fas fa-tag"></i><?php the_category(', '); ?></span>
							<span class="sohohotel-blog-meta-comments"><i class="fas fa-comment"></i><?php comments_popup_link(esc_html__( 'No Comments', 'soho-hotel' ),esc_html__( '1 Comment', 'soho-hotel' ),esc_html__( '% Comments', 'soho-hotel' ),'',esc_html__( 'Comments Off','soho-hotel')); ?></span>
						<!-- END .sohohotel-blog-meta -->
						</div>

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

					<!-- END .sohohotel-blog-block -->
					</div>
					
				<?php endwhile; ?>
				
				<!-- END .sohohotel-blog-wrapper-1 -->
				</div>

			<?php get_template_part( 'sohohotel', 'pagination' ); ?>
			
		<?php endif; ?>
			
	<!-- END .sohohotel-main-content -->
	</div>
		
	<?php if( $page_layout == 'left-sidebar' || $page_layout == 'right-sidebar' ) { ?>
	
		<!-- BEGIN .sohohotel-sidebar-content -->
		<div class="sohohotel-sidebar-content sohohotel-sidebar-content-<?php echo esc_html($page_layout); ?>">
	
			<?php get_sidebar(); ?>
	
		<!-- END .sohohotel-sidebar-content -->
		</div>
	
	<?php } ?>
	
<!-- END .sohohotel-content-wrapper -->
</div>

<?php get_footer(); ?>