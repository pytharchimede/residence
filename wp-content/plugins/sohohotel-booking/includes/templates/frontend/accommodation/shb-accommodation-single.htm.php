<?php get_header(); ?>

<!-- BEGIN .sohohotel-content-wrapper -->
<div class="sohohotel-content-wrapper sohohotel-clearfix sohohotel-content-wrapper-full-width-unboxed">

	<!-- BEGIN .sohohotel-main-content -->
	<div class="sohohotel-main-content sohohotel-main-content-full-width-unboxed">
		
		<?php if ( post_password_required() ) {
			
			echo sohohotel_password_form();
			
		} else {
			
			if ( have_posts() ) {
				
				while ( have_posts() ) {
					the_post();
					the_content();
				}
				
			}
			
		} ?>
		
	<!-- END .sohohotel-main-content -->
	</div>

<!-- END .sohohotel-content-wrapper -->
</div>

<?php get_footer(); ?>