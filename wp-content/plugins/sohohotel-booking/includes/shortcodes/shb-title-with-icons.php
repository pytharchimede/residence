<?php

function shb_title_with_icons_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
		'main_title' => '',
		'secondary_title' => '',
		'icon_1' => '',
		'title_1' => '',
		'value_1' => '',
		'icon_2' => '',
		'title_2' => '',
		'value_2' => '',
		'icon_3' => '',
		'title_3' => '',
		'value_3' => '',
	), $atts ) );
	
	ob_start(); ?>
	
	<?php if(!empty($main_title)) {
		
		if(!empty($secondary_title)) {
			$secondary_title_content = '<span>' . $secondary_title . '</span>';
		} else {
			$secondary_title_content = '';
		}
		
		echo '<h3 class="shb-title-with-icons">' . $main_title . $secondary_title_content . '</h3>';
		
	} ?>
	
	<!-- BEGIN .shb-title-with-icons -->
	<div class="shb-title-with-icons-wrapper clearfix">
		
		<?php if( (!empty($icon_1)) && (!empty($title_1)) && (!empty($value_1)) ) {
			echo '<span><i class="fas ' . $icon_1 . '"></i>' . $title_1 . ': <span>' . $value_1 . '</span></span>';
		} ?>
		
		<?php if( (!empty($icon_2)) && (!empty($title_2)) && (!empty($value_2)) ) {
			echo '<span><i class="fas ' . $icon_2 . '"></i>' . $title_2 . ': <span>' . $value_2 . '</span></span>';
		} ?>
		
		<?php if( (!empty($icon_3)) && (!empty($title_3)) && (!empty($value_3)) ) {
			echo '<span><i class="fas ' . $icon_3 . '"></i>' . $title_3 . ': <span>' . $value_3 . '</span></span>';
		} ?>
	
	<!-- END .shb-title-with-icons-wrapper -->
	</div>
	
	<?php return ob_get_clean();

}

add_shortcode( 'shb_title_with_icons', 'shb_title_with_icons_shortcode' );

?>