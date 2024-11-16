<?php

function shb_booking_contact_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
		'title' => '',
		'main_content' => '',
		'address' => '',
		'address_url' => '',
		'phone' => '',
		'email' => '',
	), $atts ) );
	
	ob_start(); ?>
	
	<div class="shb-booking-contact-wrapper">
		
		<h3><?php echo $title; ?></h3>
		<p><?php echo $main_content; ?></p>
		<ul>
			<?php if(!empty($address)) { ?>
				<li><i class="fas fa-map-marker-alt"></i><a href="<?php echo $address_url; ?>" target="blank"><?php echo $address; ?></a></li>
			<?php } ?>
			
			<?php if(!empty($phone)) { ?>
				<li><i class="fas fa-phone"></i><a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a></li>
			<?php } ?>
			
			<?php if(!empty($email)) { ?>
				<li><i class="fas fa-envelope"></i><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></li>
			<?php } ?>
		</ul>
		
	</div>
	
	<?php return ob_get_clean();

}

add_shortcode( 'shb_booking_contact', 'shb_booking_contact_shortcode' );

?>