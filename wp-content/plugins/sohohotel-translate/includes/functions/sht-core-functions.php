<?php

function shtranslate() {
	
	if(!empty($_GET["tab"])) {
		$sh_settings_tab = $_GET["tab"];
	} else {
		$sh_settings_tab = 'languages';
	}
	
	$main_url = get_admin_url() . 'admin.php?page=sh-translate'; ?>
	
	<!-- BEGIN .wrap -->
	<div class="wrap">
		
		<!-- BEGIN .sh-admin-settings-tabs -->
		<nav class="sh-admin-settings-tabs sh-clearfix">
			
			<a href="admin.php?page=sht-settings&tab=languages" <?php if($sh_settings_tab == 'languages' || $sh_settings_tab == '') {echo 'class="sh-tab-active"';} ?>><?php _e('Languages','sohohotel_translate'); ?></a>
			
			<a href="admin.php?page=sht-settings&tab=translation" <?php if($sh_settings_tab == 'translation') {echo 'class="sh-tab-active"';} ?>><?php _e('Translation','sohohotel_translate'); ?></a>
			
		<!-- END .sh-admin-settings-tabs -->
		</nav>
		
		<?php if($sh_settings_tab == 'languages') {
			include(SHT_PLUGIN_DIR . '/includes/templates/languages.htm.php');
		} elseif($sh_settings_tab == 'translation') {
			include(SHT_PLUGIN_DIR . '/includes/templates/translation.htm.php');
		} ?>
		
	<!-- END .wrap -->
	</div>
	
<?php }

function sht_update_all_language_options() {
	
	$languages = sht_languages();

	if(!empty($_POST)) {
		
		if(!empty($_POST['sht_translate_from'])) {
			update_option( 'sht_translate_from', $_POST['sht_translate_from'] );
		}
		
		foreach($languages as $key => $val) {
				
			if(!empty($_POST['sht_translate_to_' . $key])) {
				
				$selected_languages[$key] = $val;
				
				update_option( 'sht_translate_to_' . $key, $_POST['sht_translate_to_' . $key] );
			} else {
				delete_option( 'sht_translate_to_' . $key );
			}
	
		}
		
		update_option( 'sht_selected_languages', $selected_languages );
		
	}
	
}

function sht_get_translate_from_options() {
	
	$languages = sht_languages();
	$sht_get_translate_from_options = '';
	
	foreach($languages as $key => $val) {
		
		if(!empty(get_option('sht_translate_from'))) {
			$sht_translate_from = get_option('sht_translate_from');
		} else {
			$sht_translate_from = '';
		}
		
		if($sht_translate_from == $key) {
			$sht_get_translate_from_options .= '<option value="' . $key . '" selected>' . $val .'</option>';
		} else {
			$sht_get_translate_from_options .= '<option value="' . $key . '">' . $val .'</option>';
		}
	
	}
	
	return $sht_get_translate_from_options;
		
}

function sht_get_translate_to_options() {
	
	$languages = sht_languages();
	$sht_get_translate_to_options = '';
	
	foreach($languages as $key => $val) {
		
		$sht_get_translate_to_options .= '<div class="sht-translate-to">';
		
		if(!empty(get_option('sht_translate_to_' . $key))) {
			$sh_translate_to = 'checked';
		} else {
			$sh_translate_to = '';
		}
		
		$sht_get_translate_to_options .= '<input type="checkbox" id="sht_translate_from_' . $key . '" name="sht_translate_to_' . $key . '" value="' . $key . '" ' . $sh_translate_to . '><label for="sht_translate_from_' . $key . '">' . $val . '</label>';
		
		$sht_get_translate_to_options .= '</div>';
	
	}
	
	return $sht_get_translate_to_options;

}

function sht_languages() {
	
	$languages['af'] = 'Afrikaans';
	$languages['am'] = 'አማርኛ';
	$languages['arg'] = 'Aragonés';
	$languages['ar'] = 'العربية';
	$languages['ary'] = 'العربية المغربية';
	$languages['as'] = 'অসমীয়া';
	$languages['azb'] = 'گؤنئی آذربایجان';
	$languages['az'] = 'Azərbaycan dili';
	$languages['bel'] = 'Беларуская мова';
	$languages['bg_BG'] = 'Български';
	$languages['bn_BD'] = 'বাংলা';
	$languages['bo'] = 'བོད་ཡིག';
	$languages['bs_BA'] = 'Bosanski';
	$languages['ca'] = 'Català';
	$languages['ceb'] = 'Cebuano';
	$languages['cs_CZ'] = 'Čeština';
	$languages['cy'] = 'Cymraeg';
	$languages['da_DK'] = 'Dansk';
	$languages['de_DE'] = 'Deutsch';
	$languages['de_AT'] = 'Deutsch (Österreich)';
	$languages['de_CH_informal'] = 'Deutsch (Schweiz, Du)';
	$languages['de_CH'] = 'Deutsch (Schweiz)';
	$languages['de_DE_formal'] = 'Deutsch (Sie)';
	$languages['dsb'] = 'Dolnoserbšćina';
	$languages['dzo'] = 'རྫོང་ཁ';
	$languages['el'] = 'Ελληνικά';
	$languages['en'] = 'English';
	$languages['en_GB'] = 'English (UK)';
	$languages['en_AU'] = 'English (Australia)';
	$languages['en_CA'] = 'English (Canada)';
	$languages['en_ZA'] = 'English (South Africa)';
	$languages['en_NZ'] = 'English (New Zealand)';
	$languages['eo'] = 'Esperanto';
	$languages['es_ES'] = 'Español';
	$languages['es_AR'] = 'Español de Argentina';
	$languages['es_EC'] = 'Español de Ecuador';
	$languages['es_VE'] = 'Español de Venezuela';
	$languages['es_CR'] = 'Español de Costa Rica';
	$languages['es_MX'] = 'Español de México';
	$languages['es_DO'] = 'Español de República Dominicana';
	$languages['es_PE'] = 'Español de Perú';
	$languages['es_CL'] = 'Español de Chile';
	$languages['es_UY'] = 'Español de Uruguay';
	$languages['es_PR'] = 'Español de Puerto Rico';
	$languages['es_GT'] = 'Español de Guatemala';
	$languages['es_CO'] = 'Español de Colombia';
	$languages['et'] = 'Eesti';
	$languages['eu'] = 'Euskara';
	$languages['fa_IR'] = 'فارسی';
	$languages['fa_AF'] = '(فارسی (افغانستان';
	$languages['fi'] = 'Suomi';
	$languages['fr_FR'] = 'Français';
	$languages['fr_BE'] = 'Français de Belgique';
	$languages['fr_CA'] = 'Français du Canada';
	$languages['fur'] = 'Friulian';
	$languages['fy'] = 'Frysk';
	$languages['gd'] = 'Gàidhlig';
	$languages['gl_ES'] = 'Galego';
	$languages['gu'] = 'ગુજરાતી';
	$languages['haz'] = 'هزاره گی';
	$languages['he_IL'] = 'עִבְרִית';
	$languages['hi_IN'] = 'हिन्दी';
	$languages['hr'] = 'Hrvatski';
	$languages['hsb'] = 'Hornjoserbšćina';
	$languages['hu_HU'] = 'Magyar';
	$languages['hy'] = 'Հայերեն';
	$languages['id_ID'] = 'Bahasa Indonesia';
	$languages['is_IS'] = 'Íslenska';
	$languages['it_IT'] = 'Italiano';
	$languages['ja'] = '日本語';
	$languages['jv_ID'] = 'Basa Jawa';
	$languages['ka_GE'] = 'ქართული';
	$languages['kab'] = 'Taqbaylit';
	$languages['kk'] = 'Қазақ тілі';
	$languages['km'] = 'ភាសាខ្មែរ';
	$languages['kn'] = 'ಕನ್ನಡ';
	$languages['ko_KR'] = '한국어';
	$languages['ckb'] = 'كوردی‎';
	$languages['lo'] = 'ພາສາລາວ';
	$languages['lt_LT'] = 'Lietuvių kalba';
	$languages['lv'] = 'Latviešu valoda';
	$languages['mk_MK'] = 'Македонски јазик';
	$languages['ml_IN'] = 'മലയാളം';
	$languages['mn'] = 'Монгол';
	$languages['mr'] = 'मराठी';
	$languages['ms_MY'] = 'Bahasa Melayu';
	$languages['my_MM'] = 'ဗမာစာ';
	$languages['nb_NO'] = 'Norsk bokmål';
	$languages['ne_NP'] = 'नेपाली';
	$languages['nl_NL'] = 'Nederlands';
	$languages['nl_NL_formal'] = 'Nederlands (Formeel)';
	$languages['nl_BE'] = 'Nederlands (België)';
	$languages['nn_NO'] = 'Norsk nynorsk';
	$languages['oci'] = 'Occitan';
	$languages['pa_IN'] = 'ਪੰਜਾਬੀ';
	$languages['pl_PL'] = 'Polski';
	$languages['ps'] = 'پښتو';
	$languages['pt_BR'] = 'Português do Brasil';
	$languages['pt_PT_ao90'] = 'Português (AO90)';
	$languages['pt_PT'] = 'Português';
	$languages['pt_AO'] = 'Português de Angola';
	$languages['rhg'] = 'Ruáinga';
	$languages['ro_RO'] = 'Română';
	$languages['ru_RU'] = 'Русский';
	$languages['sah'] = 'Сахалыы';
	$languages['snd'] = 'سنڌي';
	$languages['si_LK'] = 'සිංහල';
	$languages['sr_RS'] = 'Српски језик';
	$languages['sk_SK'] = 'Slovenčina';
	$languages['skr'] = 'سرائیکی';
	$languages['sl_SI'] = 'Slovenščina';
	$languages['sq'] = 'Shqip';
	$languages['sv_SE'] = 'Svenska';
	$languages['sw'] = 'Kiswahili';
	$languages['szl'] = 'Ślōnskŏ gŏdka';
	$languages['ta_IN'] = 'தமிழ்';
	$languages['ta_LK'] = 'தமிழ்';
	$languages['te'] = 'తెలుగు';
	$languages['th'] = 'ไทย';
	$languages['tl'] = 'Tagalog';
	$languages['tr_TR'] = 'Türkçe';
	$languages['tt_RU'] = 'Татар теле';
	$languages['tah'] = 'Reo Tahiti';
	$languages['ug_CN'] = 'ئۇيغۇرچە';
	$languages['uk'] = 'Українська';
	$languages['ur'] = 'اردو';
	$languages['uz_UZ'] = 'O‘zbekcha';
	$languages['vi'] = 'Tiếng Việt';
	$languages['zh_TW'] = '繁體中文';
	$languages['zh_CN'] = '简体中文';
	$languages['zh_HK'] = '香港中文';

	return $languages;
	
}

if(!empty(get_option( 'sht_selected_languages' ))) {
	
	function sht_selected_languages() {
	
		/*$selected_languages = array();
		$languages = sht_languages();
	
		foreach($languages as $key => $val) {
		
			if(!empty(get_option('sht_translate_to_' . $key))) {
				$selected_languages[$key] = $val;
			}
		
		}*/
	
		$selected_languages = array();
		$selected_languages = get_option( 'sht_selected_languages' );
	
		return $selected_languages;
	
	}

	function sht_translate_from() {
	
		if(!empty(get_option('sht_translate_from'))) {
			$sht_translate_from = get_option('sht_translate_from');
		} else {
			$sht_translate_from = '';
		}

		$languages = sht_languages();
	
		$translate_from = array();
	
		foreach($languages as $key => $val) {
		
			if($key == $sht_translate_from) {
				$translate_from[$key] = $val;
				break;
			} 
		
		}
	
		return $translate_from;
	
	}

	add_filter('locale', 'sht_set_locale');
	function sht_set_locale($locale) {

		$sht_get_selected_language = sht_get_selected_language();
	
		$selected_language = $sht_get_selected_language['selected_language'];

		$locale = $selected_language;

	    return $locale;

	}

	function sht_get_selected_language() {
	
	
		if(!empty($_SESSION['sht_language'])) {
		
			if(!empty($_GET['sh_language'])) {
	
				if($_SESSION['sht_language'] !== $_GET['sh_language']) {
				
					unset($_SESSION['sht_language']);
				
				}
	
			}
		
		}
	
		if(empty($_SESSION['sht_language'])) {
		
			$selected_language = '';
			$all_languages = array();
	
			$sht_translate_from = sht_translate_from();
			$sht_selected_languages = sht_selected_languages();
	
			$all_languages = array();
	
			// Get selected language
			foreach($sht_translate_from as $key => $val) {
				$selected_language = $key;
				$all_languages[$key] = $val;
				$o['default_language'] = $key;
				$_SESSION['sht_language']['default_language'] = $key;
			}
	
			foreach($sht_selected_languages as $key => $val) {
		
				if(!empty($_GET['sh_language'])) {
		
					if($_GET['sh_language'] == $key) {
						$selected_language = $key;
					}
		
				}
		
				$all_languages[$key] = $val;
	
			}
	
			$o['selected_language'] = $selected_language;
			$o['all_languages'] = $all_languages;
	
			$_SESSION['sht_language']['selected_language'] = $selected_language;
			$_SESSION['sht_language']['all_languages'] = $all_languages;
		
		} else {
		
			$o['default_language'] = $_SESSION['sht_language']['default_language'];
			$o['selected_language'] = $_SESSION['sht_language']['selected_language'];
			$o['all_languages'] = $_SESSION['sht_language']['all_languages'];
		
		}
	
		return $o;
	
	}
	
	add_filter('woocommerce_gateway_title', 'shb_translate_content', 10, 2);
	add_filter('woocommerce_gateway_description', 'shb_translate_content', 10, 2);
	add_filter( 'woocommerce_get_privacy_policy_text', 'shb_translate_content' );
	add_filter('woocommerce_get_terms_and_conditions_checkbox_text', 'shb_translate_content');
	add_filter( 'wpcf7_display_message', 'shb_translate_content', 10, 2 );
	
	function shb_translate_content($buffer) {
	
		$sht_get_selected_language = sht_get_selected_language();
		$selected_language = $sht_get_selected_language['selected_language'];
		$all_languages = $sht_get_selected_language['all_languages'];
		$default_language = $sht_get_selected_language['default_language'];
	
		// Translate page text
		foreach($all_languages as $key => $val) {
		
			if($key == $selected_language) {
			
				preg_match_all("~\{:" . $key . "\}(.*?)\{\/" . $key . "\}~",$buffer,$m);
  
				foreach($m[0] as $key => $val) {
					$buffer = str_replace($val, $m[1][$key], $buffer);
				}
			
			} else {
			
				preg_match_all("~\{:" . $key . "\}(.*?)\{\/" . $key . "\}~",$buffer,$m);
  
				foreach($m[0] as $key => $val) {
					$buffer = str_replace($val, '', $buffer);
				}
			
			}
		
		}
	
		// Add translation variable in URL
		if($selected_language !== $default_language) {
		
			preg_match_all("<a href=\x22(.+?)\x22>", $buffer, $matches);

			$replace_urls = array();

			foreach($matches[1] as $url) {
	
				if (str_contains($url, get_site_url())) { 
				    $replace_urls[] = $url;
				}
	
			}

			$final_urls = array();

			foreach($replace_urls as $url) {
			
				// Use &
				if (str_contains($url, '?')) { 

					$final_urls[] = $url . '&sh_language=' . $selected_language;
	
				// Use ?
				} else {
	
					$final_urls[] = $url . '?sh_language=' . $selected_language;
	
				}
			
			}
	
			foreach($replace_urls as $key => $url) {
			
				// Do not add ?sh_language= to URLs which already contain it, such as the language switcher
				if (strpos($url, 'sh_language=') === false) {
			
					$buffer = str_replace('"' . $url . '"', '"' . $final_urls[$key] . '"', $buffer);
			
				}
			
			}
		
		}
	
		return $buffer;
 
	}

	if(!is_admin()) {
		ob_start("shb_translate_content");
	}
	
	add_filter( 'wp_mail', function( $args ) {
	
		$sht_get_selected_language = sht_get_selected_language();
		$selected_language = get_locale();
		$all_languages = $sht_get_selected_language['all_languages'];
		$default_language = $sht_get_selected_language['default_language'];
		
		// Translate email content
		foreach($all_languages as $key => $val) {
		
			if($key == $selected_language) {
			
				preg_match_all("~\{:" . $key . "\}(.*?)\{\/" . $key . "\}~",$args['message'] ,$m);
  
				foreach($m[0] as $key => $val) {
					$args['message']  = str_replace($val, $m[1][$key], $args['message'] );
				}
			
			} else {
			
				preg_match_all("~\{:" . $key . "\}(.*?)\{\/" . $key . "\}~",$args['message'] ,$m);
  
				foreach($m[0] as $key => $val) {
					$args['message']  = str_replace($val, '', $args['message'] );
				}
			
			}
		
		}
	
		// Translate email subject
		foreach($all_languages as $key => $val) {
		
			if($key == $selected_language) {
			
				preg_match_all("~\{:" . $key . "\}(.*?)\{\/" . $key . "\}~",$args['subject'] ,$m);
  
				foreach($m[0] as $key => $val) {
					$args['subject']  = str_replace($val, $m[1][$key], $args['subject'] );
				}
			
			} else {
			
				preg_match_all("~\{:" . $key . "\}(.*?)\{\/" . $key . "\}~",$args['subject'] ,$m);
  
				foreach($m[0] as $key => $val) {
					$args['subject']  = str_replace($val, '', $args['subject'] );
				}
			
			}
		
		}
	
		// Translate email headers
		foreach($all_languages as $key => $val) {
		
			if($key == $selected_language) {
			
				preg_match_all("~\{:" . $key . "\}(.*?)\{\/" . $key . "\}~",$args['headers'] ,$m);
  
				foreach($m[0] as $key => $val) {
					$args['headers']  = str_replace($val, $m[1][$key], $args['headers'] );
				}
			
			} else {
			
				preg_match_all("~\{:" . $key . "\}(.*?)\{\/" . $key . "\}~",$args['headers'] ,$m);
  
				foreach($m[0] as $key => $val) {
					$args['headers']  = str_replace($val, '', $args['headers'] );
				}
			
			}
		
		}
	
		// Add translation variable in URL
		if($selected_language !== $default_language) {
		
			preg_match_all("<a href=\x22(.+?)\x22>", $args['message'] , $matches);

			$replace_urls = array();

			foreach($matches[1] as $url) {
	
				if (str_contains($url, get_site_url())) { 
				    $replace_urls[] = $url;
				}
	
			}

			$final_urls = array();

			foreach($replace_urls as $url) {
			
				// Use &
				if (str_contains($url, '?')) { 

					$final_urls[] = $url . '&sh_language=' . $selected_language;
	
				// Use ?
				} else {
	
					$final_urls[] = $url . '?sh_language=' . $selected_language;
	
				}
			
			}
	
			foreach($replace_urls as $key => $url) {
			
				// Do not add ?sh_language= to URLs which already contain it, such as the language switcher
				if (strpos($url, 'sh_language=') === false) {
			
					$args['message']  = str_replace('"' . $url . '"', '"' . $final_urls[$key] . '"', $args['message'] );
			
				}
			
			}
		
		}
	
		return $args;
	
	});

	function sh_language_select($class) {
	
		$sht_get_selected_language = sht_get_selected_language();
		$selected_language = $sht_get_selected_language['selected_language'];
		$all_languages = $sht_get_selected_language['all_languages'];
	
		$o = '';
	
		$current_url = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	
		if (str_contains($current_url, '?sh_language')) { 		
			$current_url_clean = str_replace('?sh_language=' . $selected_language, '', $current_url);
		} else {
			$current_url_clean = str_replace('&sh_language=' . $selected_language, '', $current_url);
		}
	
		if (str_contains($current_url_clean, '?')) { 
			$link = $current_url_clean . '&sh_language=';
		} else {
			$link = $current_url_clean . '?sh_language=';
		}
	
		// Display menu
		$o .= '<ul class="' . $class . '">';
		
			$o .= '<li>';
			
			foreach($all_languages as $key => $val) {
			
				if($key == $selected_language) {
					$o .= '<a href="#">' . $val . '<i class="fas fa-chevron-down"></i></a>';
					break;
				}
			
			}
		
			$o .= '<ul>';	
					
				foreach($all_languages as $key => $val) {
			
					if($key !== $selected_language) {
						$o .= '<li><a href="' . $link . $key . '">' . $val . '</a></li>';
					}
			
				}
			
				$o .= '</ul>';
			$o .= '</li>';
		$o .= '</ul>';
	
		return $o;
	
	}
	
}