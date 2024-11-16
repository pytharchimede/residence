<?php
global $page_layout;
get_header();
$sohohotel_page_header_image = sohohotel_page_header_image('');
?>

<!-- BEGIN .sohohotel-page-header -->
<div class="sohohotel-page-header sohohotel-page-header-search" <?php echo $sohohotel_page_header_image; ?>>
	
	<h1><?php echo esc_html__('You searched for:','soho-hotel') . ' ' . $_GET['s']; ?></h1>

	<!-- BEGIN .sohohotel-search-results-form -->
	<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="sohohotel-search-results-form sohohotel-clearfix">
		<input type="text" onblur="if(this.value=='')this.value='<?php esc_html_e('Search...', 'soho-hotel'); ?>';" onfocus="if(this.value=='<?php esc_html_e('Search...', 'soho-hotel'); ?>')this.value='';" value="<?php esc_html_e('Search...', 'soho-hotel'); ?>" name="s" />
		<button type="submit"><i class="fa fa-search"></i></button>
	<!-- END .ssohohotel-earch-results-form -->
	</form>
	
<!-- END .sohohotel-page-header -->
</div>

<!-- BEGIN .sohohotel-content-wrapper -->
<div class="sohohotel-content-wrapper sohohotel-clearfix sohohotel-content-wrapper-full-width">

	<!-- BEGIN .sohohotel-main-content -->
	<div class="sohohotel-main-content sohohotel-main-content-full-width">
		
		<!-- BEGIN .sohohotel-search-results-wrapper -->
		<div class="sohohotel-search-results-wrapper">
			
			<?php if (have_posts()) : ?>
				
				<!-- BEGIN .sohohotel-blog-wrapper-2 -->
				<div class="sohohotel-blog-wrapper-2 sohohotel-blog-wrapper-2-3-col sohohotel-clearfix">
	
					<?php $i = 0;
					while (have_posts()) : the_post(); ?>
			
						<!-- BEGIN .sohohotel-blog-block -->
						<div id="post-<?php the_ID(); ?>" <?php post_class("sohohotel-blog-block"); ?>>

							<?php if( has_post_thumbnail() ) { ?>

								<div class="sohohotel-blog-block-image">
									<a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
										<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'sohohotel-image-style2' ); ?>
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

				<!--BEGIN .sohohotel-search-results-list -->
				<ul class="sohohotel-search-results-list">
					<li><?php esc_html_e( 'No results were found.', 'soho-hotel' ); ?></li>
				<!--END .sohohotel-search-results-list -->
				</ul>

			<?php endif; ?>
		
		<!-- END .sohohotel-search-results-wrapper -->
		</div>
		
	<!-- END .sohohotel-main-content -->
	</div>
	
	<?php if( $page_layout == 'left-sidebar' || $page_layout == 'right-sidebar' ) { ?>
	
		<!-- BEGIN .sohohotel-sidebar-content -->
		<div class="sohohotel-sidebar-content sohohotel-sidebar-content-<?php echo esc_html( $page_layout ); ?>">
	
			<?php get_sidebar(); ?>
	
		<!-- END .sohohotel-sidebar-content -->
		</div>
	
	<?php } ?>
	
<!-- END .sohohotel-content-wrapper -->
</div>

<?php get_footer(); ?>