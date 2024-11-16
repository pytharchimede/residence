<?php
	
$sht_get_selected_language = sht_get_selected_language();
$all_languages = $sht_get_selected_language['all_languages'];

$booking_data = get_post_meta(get_the_ID());

	if(!empty($booking_data['shb_booking_language'][0])) { 
		$booking_language = $booking_data['shb_booking_language'][0];
	} else {
		$booking_language = '';
	}

?>

<div class="shb-clearfix">

	<select id="shb-select-language" name="shb_booking_language">
		
		<?php foreach($all_languages as $lang_id => $lang_name) { ?>
			
			<?php if($booking_language == $lang_id) {
				echo '<option value="' . $lang_id . '" selected>' . $lang_name . '</option>';
			} else {
				echo '<option value="' . $lang_id . '">' . $lang_name . '</option>';
			} ?>
			
		<?php } ?>
		
	</select>

	<input name="save" type="submit" class="button button-primary button-large" id="publish" value="<?php _e('Save','sohohotel_booking'); ?>" />

</div>