<?php global $page_layout; ?>
<?php get_header(); ?>
<?php get_template_part( 'sohohotel', 'pagetitle' ); ?>

<!-- BEGIN .sohohotel-content-wrapper -->
<div class="sohohotel-content-wrapper sohohotel-clearfix sohohotel-content-wrapper-full-width">

	<!-- BEGIN .sohohotel-main-content -->
	<div class="sohohotel-main-content sohohotel-main-content-full-width">

		<?php if ( post_password_required() ) {
			echo sohohotel_password_form();
		} else { ?>
			
			<!-- BEGIN .sohohotel-testimonial-wrapper -->
			<div class="sohohotel-testimonial-wrapper sohohotel-testimonial-wrapper-light">
			
			<!-- BEGIN .sohohotel-testimonial-list- -->
			<div class="sohohotel-testimonial-list sohohotel-testimonial-listing-page sohohotel-testimonial-single">
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
				<?php
					// Get testimonial data
					$testimonial_name = get_post_meta($post->ID, 'shb_guest_name', true);
					$testimonial_room = get_post_meta($post->ID, 'shb_additional_info', true);			
				?>
			
				<!-- BEGIN .sohohotel-testimonial-block -->
				<div class="sohohotel-testimonial-block">
				
					<div>
						<span class="sohohotel-open-quote">“</span>
						<?php the_content(); ?>
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

			<?php endwhile;endif; ?>
			
			<!-- END .sohohotel-testimonial-list- -->
			</div>
		
			<!-- END .sohohotel-testimonial-wrapper -->
			</div>
			
		<?php } ?>
		
	<!-- END .sohohotel-main-content -->
	</div>
	
<!-- END .sohohotel-content-wrapper -->
</div>

<?php get_footer(); ?>