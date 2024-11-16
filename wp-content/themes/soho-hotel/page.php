<?php global $page_layout; ?>
<?php get_header(); ?>
<?php get_template_part( 'sohohotel', 'pagetitle' ); ?>

<!-- BEGIN .sohohotel-content-wrapper -->
<div class="sohohotel-content-wrapper sohohotel-clearfix sohohotel-content-wrapper-<?php echo esc_html( $page_layout ); ?>">

	<!-- BEGIN .sohohotel-main-content -->
	<div class="sohohotel-main-content sohohotel-main-content-<?php echo esc_html( $page_layout ); ?>">
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php the_content(); ?>			
			<?php wp_link_pages(array('before' => '<p><strong>'.esc_html__('Pages:', 'soho-hotel').'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>			
			<?php if ( comments_open() ) : comments_template(); endif; ?>
		<?php endwhile;endif; ?>
		
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