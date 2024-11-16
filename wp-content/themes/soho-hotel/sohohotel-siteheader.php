<?php $sohohotel_header = sohohotel_site_header(); 

if(!empty(get_theme_mod('sohohotel_header_language'))) {
	$sohohotel_header_language = get_theme_mod('sohohotel_header_language');
} else {
	$sohohotel_header_language = '';
}

if(!empty(get_theme_mod('sohohotel_header_currency'))) {
	$sohohotel_header_currency = get_theme_mod('sohohotel_header_currency');
} else {
	$sohohotel_header_currency = '';
} ?>

<!-- BEGIN .sohohotel-fixed-navigation-wrapper -->
<div class="sohohotel-fixed-navigation-wrapper">
	
	<!-- BEGIN .sohohotel-header -->
	<div class="sohohotel-header sohohotel-fixed-navigation">
		
		<?php if( (!empty(get_theme_mod('sohohotel_phone_number'))) || (!empty(get_theme_mod('sohohotel_address'))) || ($sohohotel_header_currency == 'yes')  || ($sohohotel_header_language == 'yes') || (!empty(get_theme_mod('sohohotel_button_label_1'))) || (!empty(get_theme_mod('sohohotel_button_label_2')))) {?>
		
		<!-- BEGIN .sohohotel-topbar-wrapper -->
		<div class="sohohotel-topbar-wrapper sohohotel-clearfix">
			
			<!-- BEGIN .sohohotel-topbar -->
			<div class="sohohotel-topbar sohohotel-clearfix">
			
			<!-- BEGIN .sohohotel-top-left-wrapper -->
			<ul class="sohohotel-top-left-wrapper sohohotel-clearfix">
				
				<?php if(!empty(get_theme_mod('sohohotel_phone_number'))) { ?>
					<li class="sohohotel-phone-icon"><a href="tel:<?php echo get_theme_mod('sohohotel_phone_number'); ?>"><?php echo get_theme_mod('sohohotel_phone_number'); ?></a></li>
				<?php } ?>
				
				<?php if(!empty(get_theme_mod('sohohotel_address'))) { ?>					
					<li class="sohohotel-map-icon"><a href="<?php echo get_theme_mod('sohohotel_address_url'); ?>" target="_blank"><?php echo get_theme_mod('sohohotel_address'); ?></a></li>
				<?php } ?>
				
			<!-- END .sohohotel-top-left-wrapper -->
			</ul>
			
			<!-- BEGIN .sohohotel-top-right-wrapper -->
			<div class="sohohotel-top-right-wrapper sohohotel-clearfix">
				
				<?php if($sohohotel_header_currency == 'yes') { ?>
				
				<?php if(function_exists('shb_currency_select')){
					echo shb_currency_select('sohohotel-top-right-navigation');
				} ?>
				
				<?php } ?>
				
				<?php if($sohohotel_header_language == 'yes') { ?>
				
				<?php if(function_exists('sh_language_select')){
					echo sh_language_select('sohohotel-top-right-navigation');
				} ?>
				
				<?php } ?>
				
				<?php if(!empty(get_theme_mod('sohohotel_button_label_1'))) { ?>
					
					<?php if(get_theme_mod('sohohotel_button_target_1') == 'blank') {
						$button_target_1 = '_blank';
					} else {
						$button_target_1 = '_self';
					} ?>
					
					<a href="<?php echo get_theme_mod('sohohotel_button_link_1'); ?>" class="sohohotel-top-right-button1" target="<?php echo $button_target_1; ?>"><i class="fas <?php echo get_theme_mod('sohohotel_button_icon_1'); ?>"></i><?php echo get_theme_mod('sohohotel_button_label_1'); ?></a>
				<?php } ?>
				
				<?php if(!empty(get_theme_mod('sohohotel_button_label_2'))) { ?>
					
					<?php if(get_theme_mod('sohohotel_button_target_2') == 'blank') {
						$button_target_2 = '_blank';
					} else {
						$button_target_2 = '_self';
					} ?>
					
					<a href="<?php echo get_theme_mod('sohohotel_button_link_2'); ?>" class="sohohotel-top-right-button2" target="<?php echo $button_target_2; ?>"><i class="fas <?php echo get_theme_mod('sohohotel_button_icon_2'); ?>"></i><?php echo get_theme_mod('sohohotel_button_label_2'); ?></a>
				<?php } ?>
				
			<!-- END .sohohotel-top-right-wrapper -->
			</div>
			
			<!-- END .sohohotel-topbar -->
			</div>
		
		<!-- END .sohohotel-topbar-wrapper -->
		</div>
		
		<?php } ?>
		
		<!-- BEGIN .sohohotel-logo-navigation -->
		<div class="sohohotel-logo-navigation sohohotel-clearfix">
			
			<?php if($sohohotel_header == 'sohohotel-header-3' || $sohohotel_header == 'sohohotel-header-4') { ?>
			
				<!-- BEGIN .sohohotel-navigation -->
				<div class="sohohotel-navigation sohohotel-navigation-left">

					<?php wp_nav_menu( array(
						'theme_location' => 'sohohotel-primary-left',
						'container' => false,
						'items_wrap' => '<ul>%3$s</ul>',
						'fallback_cb' => 'sohohotel_main_menu_fallback',
						'echo' => true,
						'before' => '',
						'after' => '',
						'link_before' => '',
						'link_after' => '',
						'depth' => 0 )
					); ?>

				<!-- END .sohohotel-navigation -->
				</div>
			
			<?php } ?>
			
			<?php if(!empty(get_theme_mod('sohohotel_logo'))) { ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('description'); ?>">
					<img src="<?php echo get_theme_mod('sohohotel_logo'); ?>" alt="<?php bloginfo('name'); ?>" class="sohohotel-logo" />
				</a>
			<?php } else { ?>
				<h2 class="sohohotel-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a></h2>
			<?php } ?>
			
			<?php if($sohohotel_header == 'sohohotel-header-3' || $sohohotel_header == 'sohohotel-header-4') { ?>
			
				<!-- BEGIN .sohohotel-navigation -->
				<div class="sohohotel-navigation sohohotel-navigation-right">

					<?php wp_nav_menu( array(
						'theme_location' => 'sohohotel-primary-right',
						'container' => false,
						'items_wrap' => '<ul>%3$s</ul>',
						'fallback_cb' => 'sohohotel_main_menu_fallback',
						'echo' => true,
						'before' => '',
						'after' => '',
						'link_before' => '',
						'link_after' => '',
						'depth' => 0 )
					); ?>

				<!-- END .sohohotel-navigation -->
				</div>
			
			<?php } else { ?>
				
				<!-- BEGIN .sohohotel-navigation -->
				<div class="sohohotel-navigation">

					<?php wp_nav_menu( array(
						'theme_location' => 'sohohotel-primary',
						'container' => false,
						'items_wrap' => '<ul>%3$s</ul>',
						'fallback_cb' => 'sohohotel_main_menu_fallback',
						'echo' => true,
						'before' => '',
						'after' => '',
						'link_before' => '',
						'link_after' => '',
						'depth' => 0 )
					); ?>

				<!-- END .sohohotel-navigation -->
				</div>
				
			<?php } ?>
			
			<a href="#" class="sohohotel-mobile-navigation-button"><i class="fas fa-bars"></i></a>
			
		<!-- END .sohohotel-logo-navigation -->
		</div>
		
		<!-- BEGIN .sohohotel-mobile-navigation-wrapper -->
		<div class="sohohotel-mobile-navigation-wrapper sohohotel-clearfix">
			
			<?php wp_nav_menu( array(
				'theme_location' => 'sohohotel-primary-mobile',
				'container' => false,
				'items_wrap' => '<ul class="sohohotel-mobile-navigation">%3$s</ul>',
				'fallback_cb' => 'sohohotel_mobile_menu_fallback',
				'echo' => true,
				'before' => '',
				'after' => '',
				'link_before' => '',
				'link_after' => '',
				'depth' => 0 )
			); ?>
			
			<!-- BEGIN .sohohotel-mobile-currency-language -->
			<div class="sohohotel-mobile-currency-language">
				
				<?php if($sohohotel_header_currency == 'yes') { ?>
				
				<?php if(function_exists('shb_currency_select')){
					echo shb_currency_select('sohohotel-top-right-navigation');
				} ?>
				
				<?php } ?>
				
				<?php if($sohohotel_header_language == 'yes') { ?>
				
				<?php if(function_exists('sh_language_select')){
					echo sh_language_select('sohohotel-top-right-navigation');
				} ?>
				
				<?php } ?>
			
			<!-- END .sohohotel-mobile-currency-language -->
			</div>

		<!-- END .sohohotel-mobile-navigation-wrapper -->
		</div>
		
	<!-- END .sohohotel-header -->
	</div>
	
<!-- END .sohohotel-fixed-navigation-wrapper -->
</div>