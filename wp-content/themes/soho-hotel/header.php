<?php 

global $page_layout;
global $page_title;
$page_layout = sohohotel_page_sidebar(get_the_ID());
$page_title = sohohotel_page_title(get_the_ID());
$sohohotel_header = sohohotel_site_header();

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<!-- BEGIN head -->
<head>
	
	<!--Meta Tags-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<?php wp_head(); ?>
	
<!-- END head -->
</head>

<!-- BEGIN body -->
<body <?php body_class($sohohotel_header); ?>>
	
	<div class="sohohotel-loading-wrapper">
		<div class="sohohotel-loading"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
	</div>
	
	<?php wp_body_open(); ?>
	
	<!-- BEGIN .sohohotel-site-wrapper -->
	<div class="sohohotel-site-wrapper">
	
	<?php get_template_part( 'sohohotel', 'siteheader' ); ?>