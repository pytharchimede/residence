<!-- BEGIN .sohohotel-footer-wrapper -->
<footer class="sohohotel-footer-wrapper">
	
	<?php if(!empty(get_theme_mod('sohohotel_footer_columns'))) {
		$sohohotel_footer_columns = get_theme_mod('sohohotel_footer_columns');
	} else {
		$sohohotel_footer_columns = '3';
	} 
	
	if(!empty(get_theme_mod('sohohotel_footer_msg'))) {
		$sohohotel_footer_msg = get_theme_mod('sohohotel_footer_msg');
	} else {
		$sohohotel_footer_msg = __('&copy; 2021 Soho Hotel. All Rights Reserved','soho-hotel');
	} 
	
	if(!empty(get_theme_mod('sohohotel_footer_language'))) {
		$sohohotel_footer_language = get_theme_mod('sohohotel_footer_language');
	} else {
		$sohohotel_footer_language = 'no';
	}
	
	if(!empty(get_theme_mod('sohohotel_footer_currency'))) {
		$sohohotel_footer_currency = get_theme_mod('sohohotel_footer_currency');
	} else {
		$sohohotel_footer_currency = 'no';
	} ?>
	
	<?php if ( is_active_sidebar('sohohotel-footer-widget-area') ) { ?>
	
		<!-- BEGIN .sohohotel-footer -->
		<div class="sohohotel-footer sohohotel-footer-<?php echo esc_attr($sohohotel_footer_columns); ?>-col sohohotel-clearfix">

			<?php dynamic_sidebar( 'sohohotel-footer-widget-area' ); ?>
		
		<!-- END .sohohotel-footer -->
		</div>
	
	<?php } ?>
	
	<!-- BEGIN .sohohotel-footer-bottom-wrapper -->
	<div class="sohohotel-footer-bottom-wrapper">
		
		<!-- BEGIN .sohohotel-footer-bottom -->
		<div class="sohohotel-footer-bottom sohohotel-clearfix">
			
			<p class="sohohotel-footer-message"><?php echo esc_attr($sohohotel_footer_msg); ?></p>
			
			<?php if( (($sohohotel_footer_currency == 'yes') && ($sohohotel_footer_language == 'no')) || (($sohohotel_footer_currency == 'no') && ($sohohotel_footer_language == 'yes')) ) {
				$css_class = 'sohohotel-bottom-right-wrapper-single';
			} else {
				$css_class = '';
			} ?>
			
			<!-- BEGIN .sohohotel-bottom-right-wrapper -->
			<div class="sohohotel-bottom-right-wrapper <?php echo $css_class; ?> sohohotel-clearfix">
				
				<?php if($sohohotel_footer_currency == 'yes') { ?>
				
					<p class="sohohotel-footer-currency-label"><?php _e('Currency','soho-hotel')?>:</p>
					
					<?php if(function_exists('shb_currency_select')){
						echo shb_currency_select('sohohotel-bottom-right-navigation');
					} ?>
				
				<?php } ?>
				
				<?php if($sohohotel_footer_language == 'yes') { ?>
				
					<p class="sohohotel-footer-language-label"><?php _e('Language','soho-hotel')?>:</p>
					<?php if(function_exists('sh_language_select')){
						echo sh_language_select('sohohotel-bottom-right-navigation');
					} ?>
				
				<?php } ?>

			<!-- END .sohohotel-bottom-right-wrapper -->
			</div>
			
		<!-- END .sohohotel-footer-bottom -->
		</div>
		
	<!-- END .sohohotel-footer-bottom-wrapper -->
	</div>
	
<!-- END .sohohotel-footer-wrapper -->	
</footer>

<!-- END .sohohotel-site-wrapper -->
</div>

<?php wp_footer(); ?>

<!-- END body -->
</body>
</html>