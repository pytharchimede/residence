<?php

function sohohotel_googlemap_shortcode( $atts, $content = null ) {
	global $smof_data;
	$defaults = array(
			'map_id' => '1',
			'width' => '100%',
			'height' => '540px',
			'maptype' => 'road',
			'zoom' => '14',
			'latitude' => '40.703316',
			'longitude' => '-73.988145',
			'marker_content' => 'Soho Hotel',
			'map_color' => '#b99470',
			'marker_color' => '#b99470'
	);
	extract(shortcode_atts($defaults, $atts));
	
	ob_start();
	?>
	
	<?php if ($map_id == '') {$map_id = '1';}
	if ($width == '') {$width = '100%';}
	if ($height == '') {$height = '540px';}
	if ($maptype == '') {$maptype = 'road';}
	if ($zoom == '') {$zoom = '14';}
	if ($latitude == '') {$latitude = '40.703316';}
	if ($longitude == '') {$longitude = '-73.988145';}
	if ($marker_content == '') {$marker_content = 'Soho Hotel, 55 Columbus Circle, New York, NY';}
	if ($map_color == '') {$map_color = '#b99470';}
	if ($marker_color == '') {$marker_color = '#b99470';} ?>
	
	<?php if(!empty(get_theme_mod('sohohotel_google_api_key'))) { ?>
	
	<!-- BEGIN #google-map -->
	<div id="google-map-<?php echo $map_id; ?>" style="width: <?php echo $width; ?>;height: <?php echo $height; ?>;"></div>

	<script type="text/javascript">

		function initialize() {

			// Set Location
			var myLatlng = new google.maps.LatLng(<?php echo $latitude; ?>,<?php echo $longitude; ?>);

			// Set Style
			var styles = [
			    {
			      stylers: [
			        { hue: "<?php echo $map_color; ?>" },
			        { saturation: -50 }
			      ]
			    },{
			      featureType: "<?php echo $maptype; ?>",
			      elementType: "geometry",
			      stylers: [
			        { lightness: 100 },
			        { visibility: "simplified" }
			      ]
			    },{
			      featureType: "road",
			      elementType: "labels",
			      stylers: [
			        { visibility: "off" }
			      ]
			    }
			  ];

			// Set Map Options
			var mapOptions = {
				mapTypeControlOptions: {
					mapTypeIds: ['Styled']
				},
				center: myLatlng,
				zoom: <?php echo $zoom; ?>,
				mapTypeId: 'Styled',
				scrollwheel: false,
				scaleControl: false,
				disableDefaultUI: false
			};

			// Build Map
			var map = new google.maps.Map(document.getElementById('google-map-<?php echo $map_id; ?>'), mapOptions);
			var styledMapType = new google.maps.StyledMapType(styles, { name: 'Styled' });
			map.mapTypes.set('Styled', styledMapType);

			// Set Map Marker
			var contentString = '<?php echo $marker_content; ?>';
			var infowindow = new google.maps.InfoWindow({
				content: contentString
			});
			
			var marker = new google.maps.Marker({
				position: myLatlng,
				map: map,
				icon: {
					path: google.maps.SymbolPath.CIRCLE,
					fillColor: '#fff',
					fillOpacity: 0,
					strokeWeight: 0,
					scale: 15
				},
				label: {
					fontFamily: "'Font Awesome 5 Free'",
					fontWeight: '900',
					text: eval("'\\u"+'f3c5'+"'"),
					color: '<?php echo $marker_color; ?>',
					fontSize: "40px"
				}
			});

			// Display Map Marker
			google.maps.event.addListener(marker, 'click', function() {
				infowindow.open(map,marker);
			});

		}

		// Display Map
		google.maps.event.addDomListener(window, 'load', initialize);

	</script>
	
	<?php } else {
		echo '<div class="sohohotel-msg sohohotel-fail">' . esc_html__('Please enter a valid Google Map API key in the theme options "General" section','sohohotel') . '</div>';
	} ?>

	<?php
	return ob_get_clean();
}

add_shortcode( 'sohohotel_googlemap', 'sohohotel_googlemap_shortcode' );

?>