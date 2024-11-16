<?php if(!empty(get_option( 'sht_selected_languages' ))) { ?>

	<?php $sht_translate_from = sht_translate_from();
	$sht_selected_languages = sht_selected_languages(); ?>

	<div class="sht-translation-info">

		<label for="sht-translation-tags"><?php _e('Go to the place where you added your content and wrap it in the following tags','sohohotel_translate'); ?>:</label>

		<textarea id="sht-translation-tags"><?php foreach($sht_translate_from as $key => $val) {
			echo '&lcub;:' . $key . '&rcub;Your Text&lcub;/' . $key . "&rcub;\n";
		}
	
		foreach($sht_selected_languages as $key => $val) {
			echo '&lcub;:' . $key . '&rcub;Your Text&lcub;/' . $key . "&rcub;\n";	
		} ?></textarea>

	</div>

<?php } else { ?>
	
<p><?php _e('Select your languages to translate from and to in the "Languages" tab first.','sohohotel_translate'); ?></p>	
	
<?php } ?>