<?php

$sohohotel_page_title = sohohotel_page_title($post->ID);
$sohohotel_page_header_image = sohohotel_page_header_image($post->ID);

if( $sohohotel_page_title == 'title' ) { ?> 

	<!-- BEGIN .sohohotel-page-header -->
	<div class="sohohotel-page-header" <?php echo $sohohotel_page_header_image; ?>>
		
		<h1><?php if(is_front_page() OR is_single() && get_post_type() == 'post'){
			esc_html_e('Latest News','soho-hotel');
		} elseif (is_category()) {
			echo single_cat_title( '', false );
		} else {
			the_title();
		} ?></h1>

	<!-- END .sohohotel-page-header -->
	</div>

<?php } ?>