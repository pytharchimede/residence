<?php sht_update_all_language_options(); ?>

<form action="<?php echo get_admin_url() . 'admin.php?page=sht-settings&tab=languages'; ?>" method="post">
	
	<!-- BEGIN .sht-translate-from-wrapper -->
	<div class="sht-translate-from-wrapper">
			
		<label for="sht_translate_from"><?php _e('Translate From','sohohotel_translate'); ?></label>
		<select id="sht_translate_from" name="sht_translate_from">		
			<?php echo sht_get_translate_from_options(); ?>
		</select>
			
	<!-- END .sht-translate-from-wrapper -->
	</div>
				
	<!-- BEGIN .sht-translate-to-wrapper -->
	<div class="sht-translate-to-wrapper">
			
		<p><?php _e('Translate To','shtranslate'); ?></p>
		<?php echo sht_get_translate_to_options(); ?>
				
	<!-- END .sht-translate-to-wrapper -->
	</div>
		
	<p class="submit">
		<input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e('Save Changes','sohohotel_translate'); ?>">
	</p>
		
</form>