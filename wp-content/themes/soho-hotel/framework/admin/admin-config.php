<?php
	
function sohohotel_customize_register( $wp_customize ) {
	
	/*
	
	// Panel
	$wp_customize->add_panel( 'sohohotel_panel',
		array(
			'title' => esc_html__('Soho Hotel Settings','soho-hotel'),
			'description' => esc_html__('Adjust Soho Hotel settings','soho-hotel'),
			'priority' => 1,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'active_callback' => '',
		)
	);
	
	// Section
	$wp_customize->add_section( 'sohohotel_general',
		array(
			'title' => esc_html__('General','soho-hotel'),
			'description' => esc_html__('These are an example of Customizer Custom Controls.','soho-hotel'),
			'panel' => 'sohohotel_panel',
			'priority' => 160,
			'capability' => 'edit_theme_options'
		)
	);
	
	// Text
	$wp_customize->add_setting( 'sohohotel_text_field',
		array(
			'default' => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_text_field',
		array(
			'label' => esc_html__('Default Text Control','soho-hotel'),
			'description' => esc_html__('Text controls Type can be either text, email, url, number, hidden, or date','soho-hotel'),
			'section' => 'sohohotel_general',
			'priority' => 10,
			'type' => 'text',
			'capability' => 'edit_theme_options',
			'input_attrs' => array(
				'placeholder' => esc_html__('Enter name...','soho-hotel'),
			),
		)
	);
	
	// Checkbox
	$wp_customize->add_setting( 'sohohotel_checkbox',
		array(
			'default' => 0,
			'transport' => 'refresh',
			'sanitize_callback' => 'sohohotel_sanitize_checkbox'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_checkbox',
		array(
			'label' => esc_html__('Default Checkbox Control','soho-hotel'),
			'description' => esc_html__('Sample description','soho-hotel'),
			'section'  => 'sohohotel_general',
			'priority' => 10,
			'type'=> 'checkbox',
			'capability' => 'edit_theme_options',
		)
	);
	
	// Select
	$wp_customize->add_setting( 'sohohotel_select',
		array(
			'default' => 'jet-fuel',
			'transport' => 'refresh',
			'sanitize_callback' => 'sohohotel_sanitize_select_radio'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_select',
		array(
			'label' => esc_html__('Standard Select Control','soho-hotel'),
			'description' => esc_html__('Sample description','soho-hotel'),
			'section' => 'sohohotel_general',
			'priority' => 10,
			'type' => 'select',
			'capability' => 'edit_theme_options',
			'choices' => array(
				'wordpress' => esc_html__('WordPress','soho-hotel'),
				'hamsters' => esc_html__('Hamsters','soho-hotel'),
				'jet-fuel' => esc_html__('Jet Fuel','soho-hotel'),
				'nuclear-energy' => esc_html__('Nuclear Energy','soho-hotel')
	      )
	   )
	);
	
	// Radio
	$wp_customize->add_setting( 'sohohotel_radio',
		array(
			'default' => 'spider-man',
			'transport' => 'refresh',
			'sanitize_callback' => 'sohohotel_sanitize_select_radio'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_radio',
		array(
			'label' => esc_html__('Standard Radio Control','soho-hotel'),
			'description' => esc_html__('Sample description','soho-hotel'),
			'section' => 'sohohotel_general',
			'priority' => 10,
			'type' => 'radio',
			'capability' => 'edit_theme_options',
			'choices' => array(
				'captain-america' => esc_html__('Captain America','soho-hotel'),
				'iron-man' => esc_html__('Iron Man','soho-hotel'),
				'spider-man' => esc_html__('Spider-Man','soho-hotel'),
				'thor' => esc_html__('Thor','soho-hotel')
			)
		)
	);
	
	// Pages
	$wp_customize->add_setting( 'sohohotel_pages',
	   array(
	      'default' => '1548',
	      'transport' => 'refresh',
	      'sanitize_callback' => 'absint'
	   )
	);
 
	$wp_customize->add_control( 'sohohotel_pages',
	   array(
	      'label' => esc_html__('Default Dropdown Pages Control','soho-hotel'),
	      'description' => esc_html__('Sample description','soho-hotel'),
	      'section' => 'sohohotel_general',
	      'priority' => 10,
	      'type' => 'dropdown-pages',
	      'capability' => 'edit_theme_options',
	   )
	);
	
	// Textarea
	$wp_customize->add_setting( 'sohohotel_textarea',
		array(
			'default' => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'wp_filter_nohtml_kses'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_textarea',
		array(
			'label' => esc_html__('Default Textarea Control','soho-hotel'),
			'description' => esc_html__('Sample description','soho-hotel'),
			'section' => 'sohohotel_general',
			'priority' => 10,
			'type' => 'textarea',
			'capability' => 'edit_theme_options',
			'input_attrs' => array(
				'class' => 'my-custom-class',
				'style' => 'border: 1px solid #999',
				'placeholder' => esc_html__('Enter message...','soho-hotel'),
			),
		)
	);
	
	// Color
	$wp_customize->add_setting( 'sohohotel_color',
		array(
			'default' => '#333',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_color',
		array(
			'label' => esc_html__('Default Color Control','soho-hotel'),
			'description' => esc_html__('Sample description','soho-hotel'),
			'section' => 'sohohotel_general',
			'priority' => 10,
			'type' => 'color',
			'capability' => 'edit_theme_options',
		)
	);
	
	// Media
	$wp_customize->add_setting( 'sohohotel_media',
		array(
			'default' => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'absint'
		)
	);
	
	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'sohohotel_media',
		array(
			'label' => esc_html__('Default Media Control','soho-hotel'),
			'description' => esc_html__('This is the description for the Media Control','soho-hotel'),
			'section' => 'sohohotel_general',
			'mime_type' => 'image',
			'button_labels' => array(
				'select' => esc_html__('Select File','soho-hotel'),
				'change' => esc_html__('Change File','soho-hotel'),
				'default' => esc_html__('Default','soho-hotel'),
				'remove' => esc_html__('Remove','soho-hotel'),
				'placeholder' => esc_html__('No file selected','soho-hotel'),
				'frame_title' => esc_html__('Select File','soho-hotel'),
				'frame_button' => esc_html__('Choose File','soho-hotel'),
			)
		)
	) );
	
	// Image
	$wp_customize->add_setting( 'sohohotel_cropped_media',
		array(
			'default' => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'esc_url_raw'
		)
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'sohohotel_cropped_media',
		array(
			'label' => esc_html__('Default Image Control','soho-hotel'),
			'description' => esc_html__('This is the description for the Image Control','soho-hotel'),
			'section' => 'sohohotel_general',
			'button_labels' => array(
				'select' => esc_html__('Select Image','soho-hotel'),
				'change' => esc_html__('Change Image','soho-hotel'),
				'remove' => esc_html__('Remove','soho-hotel'),
				'default' => esc_html__('Default','soho-hotel'),
				'placeholder' => esc_html__('No image selected','soho-hotel'),
				'frame_title' => esc_html__('Select Image','soho-hotel'),
				'frame_button' => esc_html__('Choose Image','soho-hotel'),
			)
		)
	) );
	
	*/
	
	// Panel
	$wp_customize->add_panel( 'sohohotel_panel',
		array(
			'title' => esc_html__('Soho Hotel Settings','soho-hotel'),
			'description' => esc_html__('Adjust Soho Hotel settings','soho-hotel'),
			'priority' => 1,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'active_callback' => '',
		)
	);
	
	// Section
	$wp_customize->add_section( 'sohohotel_header',
		array(
			'title' => esc_html__('Header','soho-hotel'),
			'panel' => 'sohohotel_panel',
			'priority' => 160,
			'capability' => 'edit_theme_options'
		)
	);
	
	// Select
	$wp_customize->add_setting( 'sohohotel_header_style',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sohohotel_sanitize_select_radio'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_header_style',
		array(
			'label' => esc_html__('Header Style','soho-hotel'),
			'section' => 'sohohotel_header',
			'priority' => 10,
			'type' => 'select',
			'capability' => 'edit_theme_options',
			'choices' => array(
				'header-1' => esc_html__('Header 1','soho-hotel'),
				'header-2' => esc_html__('Header 2','soho-hotel'),
				'header-3' => esc_html__('Header 3','soho-hotel'),
				'header-4' => esc_html__('Header 4','soho-hotel')
	      )
	   )
	);
	
	// Text
	$wp_customize->add_setting( 'sohohotel_phone_number',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_phone_number',
		array(
			'label' => esc_html__('Phone number','soho-hotel'),
			'section' => 'sohohotel_header',
			'priority' => 10,
			'type' => 'text',
			'capability' => 'edit_theme_options'
		)
	);
	
	// Text
	$wp_customize->add_setting( 'sohohotel_address',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_address',
		array(
			'label' => esc_html__('Address','soho-hotel'),
			'section' => 'sohohotel_header',
			'priority' => 10,
			'type' => 'text',
			'capability' => 'edit_theme_options'
		)
	);
	
	// Text
	$wp_customize->add_setting( 'sohohotel_address_url',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_address_url',
		array(
			'label' => esc_html__('Address URL','soho-hotel'),
			'section' => 'sohohotel_header',
			'priority' => 10,
			'type' => 'text',
			'capability' => 'edit_theme_options'
		)
	);

	// Text
	$wp_customize->add_setting( 'sohohotel_button_label_1',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_button_label_1',
		array(
			'label' => esc_html__('Button label 1','soho-hotel'),
			'section' => 'sohohotel_header',
			'priority' => 10,
			'type' => 'text',
			'capability' => 'edit_theme_options'
		)
	);

	// Text
	$wp_customize->add_setting( 'sohohotel_button_link_1',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_button_link_1',
		array(
			'label' => esc_html__('Button link 1','soho-hotel'),
			'section' => 'sohohotel_header',
			'priority' => 10,
			'type' => 'text',
			'capability' => 'edit_theme_options',
			'input_attrs' => array(
				'placeholder' => esc_html__('http://','soho-hotel'),
			),
		)
	);
	
	// Text
	$wp_customize->add_setting( 'sohohotel_button_icon_1',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_button_icon_1',
		array(
			'label' => esc_html__('Button icon 1','soho-hotel'),
			'section' => 'sohohotel_header',
			'priority' => 10,
			'type' => 'text',
			'capability' => 'edit_theme_options'
		)
	);
	
	// Select
	$wp_customize->add_setting( 'sohohotel_button_target_1',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sohohotel_sanitize_select_radio'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_button_target_1',
		array(
			'label' => esc_html__('Button target 1','soho-hotel'),
			'section' => 'sohohotel_header',
			'priority' => 10,
			'type' => 'select',
			'capability' => 'edit_theme_options',
			'choices' => array(
				'blank' => esc_html__('Open in new window/tab','soho-hotel'),
				'self' => esc_html__('Open in same window/tab','soho-hotel')
	      )
	   )
	);
	
	// Text
	$wp_customize->add_setting( 'sohohotel_button_label_2',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_button_label_2',
		array(
			'label' => esc_html__('Button label 2','soho-hotel'),
			'section' => 'sohohotel_header',
			'priority' => 10,
			'type' => 'text',
			'capability' => 'edit_theme_options'
		)
	);

	// Text
	$wp_customize->add_setting( 'sohohotel_button_link_2',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_button_link_2',
		array(
			'label' => esc_html__('Button link 2','soho-hotel'),
			'section' => 'sohohotel_header',
			'priority' => 10,
			'type' => 'text',
			'capability' => 'edit_theme_options',
			'input_attrs' => array(
				'placeholder' => esc_html__('http://','soho-hotel'),
			),
		)
	);
	
	// Text
	$wp_customize->add_setting( 'sohohotel_button_icon_2',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_button_icon_2',
		array(
			'label' => esc_html__('Button icon 2','soho-hotel'),
			'section' => 'sohohotel_header',
			'priority' => 10,
			'type' => 'text',
			'capability' => 'edit_theme_options'
		)
	);
	
	// Select
	$wp_customize->add_setting( 'sohohotel_button_target_2',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sohohotel_sanitize_select_radio'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_button_target_2',
		array(
			'label' => esc_html__('Button target 2','soho-hotel'),
			'section' => 'sohohotel_header',
			'priority' => 10,
			'type' => 'select',
			'capability' => 'edit_theme_options',
			'choices' => array(
				'blank' => esc_html__('Open in new window/tab','soho-hotel'),
				'self' => esc_html__('Open in same window/tab','soho-hotel')
	      )
	   )
	);
	
	// Select
	$wp_customize->add_setting( 'sohohotel_header_language',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sohohotel_sanitize_select_radio'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_header_language',
		array(
			'label' => esc_html__('Display language selection','soho-hotel'),
			'section' => 'sohohotel_header',
			'priority' => 10,
			'type' => 'select',
			'capability' => 'edit_theme_options',
			'choices' => array(
				'no' => esc_html__('No','soho-hotel'),
				'yes' => esc_html__('Yes','soho-hotel')
	      )
	   )
	);
	
	// Select
	$wp_customize->add_setting( 'sohohotel_header_currency',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sohohotel_sanitize_select_radio'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_header_currency',
		array(
			'label' => esc_html__('Display currency selection','soho-hotel'),
			'section' => 'sohohotel_header',
			'priority' => 10,
			'type' => 'select',
			'capability' => 'edit_theme_options',
			'choices' => array(
				'no' => esc_html__('No','soho-hotel'),
				'yes' => esc_html__('Yes','soho-hotel')
	      )
	   )
	);
	
	// Section
	$wp_customize->add_section( 'sohohotel_footer',
		array(
			'title' => esc_html__('Footer','soho-hotel'),
			'panel' => 'sohohotel_panel',
			'priority' => 160,
			'capability' => 'edit_theme_options'
		)
	);
	
	// Text
	$wp_customize->add_setting( 'sohohotel_footer_msg',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_footer_msg',
		array(
			'label' => esc_html__('Message','soho-hotel'),
			'section' => 'sohohotel_footer',
			'priority' => 10,
			'type' => 'text',
			'capability' => 'edit_theme_options'
		)
	);
	
	// Select
	$wp_customize->add_setting( 'sohohotel_footer_columns',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sohohotel_sanitize_select_radio'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_footer_columns',
		array(
			'label' => esc_html__('Widget columns','soho-hotel'),
			'section' => 'sohohotel_footer',
			'priority' => 10,
			'type' => 'select',
			'capability' => 'edit_theme_options',
			'choices' => array(
				'1' => esc_html__('1','soho-hotel'),
				'2' => esc_html__('2','soho-hotel'),
				'3' => esc_html__('3','soho-hotel'),
				'4' => esc_html__('4','soho-hotel'),
				'5' => esc_html__('5','soho-hotel'),
				'6' => esc_html__('6','soho-hotel')
	      )
	   )
	);
	
	// Select
	$wp_customize->add_setting( 'sohohotel_footer_language',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sohohotel_sanitize_select_radio'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_footer_language',
		array(
			'label' => esc_html__('Display language selection','soho-hotel'),
			'section' => 'sohohotel_footer',
			'priority' => 10,
			'type' => 'select',
			'capability' => 'edit_theme_options',
			'choices' => array(
				'no' => esc_html__('No','soho-hotel'),
				'yes' => esc_html__('Yes','soho-hotel')
	      )
	   )
	);
	
	// Select
	$wp_customize->add_setting( 'sohohotel_footer_currency',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sohohotel_sanitize_select_radio'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_footer_currency',
		array(
			'label' => esc_html__('Display currency selection','soho-hotel'),
			'section' => 'sohohotel_footer',
			'priority' => 10,
			'type' => 'select',
			'capability' => 'edit_theme_options',
			'choices' => array(
				'no' => esc_html__('No','soho-hotel'),
				'yes' => esc_html__('Yes','soho-hotel')
	      )
	   )
	);
	
	// Section
	$wp_customize->add_section( 'sohohotel_logo',
		array(
			'title' => esc_html__('Logo','soho-hotel'),
			'panel' => 'sohohotel_panel',
			'priority' => 160,
			'capability' => 'edit_theme_options'
		)
	);
	
	// Image
	$wp_customize->add_setting( 'sohohotel_logo',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'esc_url_raw'
		)
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'sohohotel_logo',
		array(
			'label' => esc_html__('Logo','soho-hotel'),
			'section' => 'sohohotel_logo',
			'button_labels' => array(
				'select' => esc_html__('Select Image','soho-hotel'),
				'change' => esc_html__('Change Image','soho-hotel'),
				'remove' => esc_html__('Remove','soho-hotel'),
				'default' => esc_html__('Default','soho-hotel'),
				'placeholder' => esc_html__('No image selected','soho-hotel'),
				'frame_title' => esc_html__('Select Image','soho-hotel'),
				'frame_button' => esc_html__('Choose Image','soho-hotel'),
			)
		)
	) );
	
	// Text
	$wp_customize->add_setting( 'desktop-logo-image-top-margin',
		array(
			'default' => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control( 'desktop-logo-image-top-margin',
		array(
			'label' => esc_html__('Desktop logo top margin (px)','soho-hotel'),
			'section' => 'sohohotel_logo',
			'priority' => 10,
			'type' => 'text',
			'capability' => 'edit_theme_options'
		)
	);
	
	// Text
	$wp_customize->add_setting( 'desktop-logo-image-width',
		array(
			'default' => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control( 'desktop-logo-image-width',
		array(
			'label' => esc_html__('Desktop logo width (px or %)','soho-hotel'),
			'section' => 'sohohotel_logo',
			'priority' => 10,
			'type' => 'text',
			'capability' => 'edit_theme_options'
		)
	);
	
	// Text
	$wp_customize->add_setting( 'desktop-logo-image-max-width',
		array(
			'default' => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control( 'desktop-logo-image-max-width',
		array(
			'label' => esc_html__('Desktop logo max width (px or %)','soho-hotel'),
			'section' => 'sohohotel_logo',
			'priority' => 10,
			'type' => 'text',
			'capability' => 'edit_theme_options'
		)
	);
	
	// Text
	$wp_customize->add_setting( 'desktop-sticky-nav-logo-image-top-margin',
		array(
			'default' => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control( 'desktop-sticky-nav-logo-image-top-margin',
		array(
			'label' => esc_html__('Desktop sticky nav logo top margin (px)','soho-hotel'),
			'section' => 'sohohotel_logo',
			'priority' => 10,
			'type' => 'text',
			'capability' => 'edit_theme_options'
		)
	);

	// Text
	$wp_customize->add_setting( 'desktop-sticky-nav-logo-image-width',
		array(
			'default' => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control( 'desktop-sticky-nav-logo-image-width',
		array(
			'label' => esc_html__('Desktop sticky nav logo width (px or %)','soho-hotel'),
			'section' => 'sohohotel_logo',
			'priority' => 10,
			'type' => 'text',
			'capability' => 'edit_theme_options'
		)
	);

	// Text
	$wp_customize->add_setting( 'desktop-sticky-nav-logo-image-max-width',
		array(
			'default' => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control( 'desktop-sticky-nav-logo-image-max-width',
		array(
			'label' => esc_html__('Desktop sticky nav logo max width (px or %)','soho-hotel'),
			'section' => 'sohohotel_logo',
			'priority' => 10,
			'type' => 'text',
			'capability' => 'edit_theme_options'
		)
	);
	
	// Text
	$wp_customize->add_setting( 'mobile-logo-image-top-margin',
		array(
			'default' => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control( 'mobile-logo-image-top-margin',
		array(
			'label' => esc_html__('Mobile logo top margin (px)','soho-hotel'),
			'section' => 'sohohotel_logo',
			'priority' => 10,
			'type' => 'text',
			'capability' => 'edit_theme_options'
		)
	);
	
	// Text
	$wp_customize->add_setting( 'mobile-logo-image-width',
		array(
			'default' => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control( 'mobile-logo-image-width',
		array(
			'label' => esc_html__('Mobile logo width (px or %)','soho-hotel'),
			'section' => 'sohohotel_logo',
			'priority' => 10,
			'type' => 'text',
			'capability' => 'edit_theme_options'
		)
	);

	// Text
	$wp_customize->add_setting( 'mobile-logo-image-max-width',
		array(
			'default' => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control( 'mobile-logo-image-max-width',
		array(
			'label' => esc_html__('Mobile logo max width (px or %)','soho-hotel'),
			'section' => 'sohohotel_logo',
			'priority' => 10,
			'type' => 'text',
			'capability' => 'edit_theme_options'
		)
	);
	
	// Section
	$wp_customize->add_section( 'sohohotel_images',
		array(
			'title' => esc_html__('Images','soho-hotel'),
			'panel' => 'sohohotel_panel',
			'priority' => 160,
			'capability' => 'edit_theme_options'
		)
	);
	
	// Image
	$wp_customize->add_setting( 'sohohotel_default_header_image',
		array(
			'default' => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'esc_url_raw'
		)
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'sohohotel_default_header_image',
		array(
			'label' => esc_html__('Default header image','soho-hotel'),
			'section' => 'sohohotel_images',
			'button_labels' => array(
				'select' => esc_html__('Select Image','soho-hotel'),
				'change' => esc_html__('Change Image','soho-hotel'),
				'remove' => esc_html__('Remove','soho-hotel'),
				'default' => esc_html__('Default','soho-hotel'),
				'placeholder' => esc_html__('No image selected','soho-hotel'),
				'frame_title' => esc_html__('Select Image','soho-hotel'),
				'frame_button' => esc_html__('Choose Image','soho-hotel'),
			)
		)
	) );
			
	// Image
	$wp_customize->add_setting( 'sohohotel_search_header_image',
		array(
			'default' => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'esc_url_raw'
		)
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'sohohotel_search_header_image',
		array(
			'label' => esc_html__('Search header image','soho-hotel'),
			'section' => 'sohohotel_images',
			'button_labels' => array(
				'select' => esc_html__('Select Image','soho-hotel'),
				'change' => esc_html__('Change Image','soho-hotel'),
				'remove' => esc_html__('Remove','soho-hotel'),
				'default' => esc_html__('Default','soho-hotel'),
				'placeholder' => esc_html__('No image selected','soho-hotel'),
				'frame_title' => esc_html__('Select Image','soho-hotel'),
				'frame_button' => esc_html__('Choose Image','soho-hotel'),
			)
		)
	) );
	
	// Image
	$wp_customize->add_setting( 'sohohotel_404_header_image',
		array(
			'default' => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'esc_url_raw'
		)
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'sohohotel_404_header_image',
		array(
			'label' => esc_html__('404 header image','soho-hotel'),
			'section' => 'sohohotel_images',
			'button_labels' => array(
				'select' => esc_html__('Select Image','soho-hotel'),
				'change' => esc_html__('Change Image','soho-hotel'),
				'remove' => esc_html__('Remove','soho-hotel'),
				'default' => esc_html__('Default','soho-hotel'),
				'placeholder' => esc_html__('No image selected','soho-hotel'),
				'frame_title' => esc_html__('Select Image','soho-hotel'),
				'frame_button' => esc_html__('Choose Image','soho-hotel'),
			)
		)
	) );
	
	// Section
	$wp_customize->add_section( 'sohohotel_layout',
		array(
			'title' => esc_html__('Layout','soho-hotel'),
			'panel' => 'sohohotel_panel',
			'priority' => 160,
			'capability' => 'edit_theme_options'
		)
	);
	
	// Select
	$wp_customize->add_setting( 'sohohotel_archive_layout',
		array(
			'default' => 'right-sidebar',
			'transport' => 'refresh',
			'sanitize_callback' => 'sohohotel_sanitize_select_radio'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_archive_layout',
		array(
			'label' => esc_html__('Archive Layout','soho-hotel'),
			'section' => 'sohohotel_layout',
			'priority' => 10,
			'type' => 'select',
			'capability' => 'edit_theme_options',
			'choices' => array(
				'right-sidebar' => esc_html__('Right Sidebar','soho-hotel'),
				'left-sidebar' => esc_html__('Left Sidebar','soho-hotel'),
				'full-width' => esc_html__('Full Width','soho-hotel')
	      )
	   )
	);
	
	// Select
	$wp_customize->add_setting( 'sohohotel_category_layout',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sohohotel_sanitize_select_radio'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_category_layout',
		array(
			'label' => esc_html__('Category Layout','soho-hotel'),
			'section' => 'sohohotel_layout',
			'priority' => 10,
			'type' => 'select',
			'capability' => 'edit_theme_options',
			'choices' => array(
				'right-sidebar' => esc_html__('Right Sidebar','soho-hotel'),
				'left-sidebar' => esc_html__('Left Sidebar','soho-hotel'),
				'full-width' => esc_html__('Full Width','soho-hotel')
	      )
	   )
	);
	
	// Select
	$wp_customize->add_setting( 'sohohotel_search_layout',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sohohotel_sanitize_select_radio'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_search_layout',
		array(
			'label' => esc_html__('Search Layout','soho-hotel'),
			'section' => 'sohohotel_layout',
			'priority' => 10,
			'type' => 'select',
			'capability' => 'edit_theme_options',
			'choices' => array(
				'right-sidebar' => esc_html__('Right Sidebar','soho-hotel'),
				'left-sidebar' => esc_html__('Left Sidebar','soho-hotel'),
				'full-width' => esc_html__('Full Width','soho-hotel')
	      )
	   )
	);
	
	// Text
	$wp_customize->add_setting( 'sohohotel_blog_page_url',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_blog_page_url',
		array(
			'label' => esc_html__('Blog page URL','soho-hotel'),
			'section' => 'sohohotel_layout',
			'priority' => 10,
			'type' => 'text',
			'capability' => 'edit_theme_options'
		)
	);
	
	// Select
	$wp_customize->add_setting( 'sohohotel_show_newsletter_label',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sohohotel_sanitize_select_radio'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_show_newsletter_label',
		array(
			'label' => esc_html__('Show Newsletter Field Labels','soho-hotel'),
			'section' => 'sohohotel_layout',
			'priority' => 10,
			'type' => 'select',
			'capability' => 'edit_theme_options',
			'choices' => array(
				'yes' => esc_html__('Yes','soho-hotel'),
				'no' => esc_html__('No','soho-hotel')
	      )
	   )
	);
	
	// Section
	$wp_customize->add_section( 'sohohotel_colors',
		array(
			'title' => esc_html__('Colors','soho-hotel'),
			'panel' => 'sohohotel_panel',
			'priority' => 160,
			'capability' => 'edit_theme_options'
		)
	);
	
	// Color
	$wp_customize->add_setting( 'sohohotel_main_color',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_main_color',
		array(
			'label' => esc_html__('Main color','soho-hotel'),
			'section' => 'sohohotel_colors',
			'priority' => 10,
			'type' => 'color',
			'capability' => 'edit_theme_options',
		)
	);
	
	// Color
	$wp_customize->add_setting( 'sohohotel_header_bg_color',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_header_bg_color',
		array(
			'label' => esc_html__('Header background color','soho-hotel'),
			'section' => 'sohohotel_colors',
			'priority' => 10,
			'type' => 'color',
			'capability' => 'edit_theme_options',
		)
	);
	
	// Color
	$wp_customize->add_setting( 'sohohotel_header_primary_text_color',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_header_primary_text_color',
		array(
			'label' => esc_html__('Header primary text color','soho-hotel'),
			'section' => 'sohohotel_colors',
			'priority' => 10,
			'type' => 'color',
			'capability' => 'edit_theme_options',
		)
	);
	
	// Color
	$wp_customize->add_setting( 'sohohotel_header_secondary_text_color',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_header_secondary_text_color',
		array(
			'label' => esc_html__('Header secondary text color','soho-hotel'),
			'section' => 'sohohotel_colors',
			'priority' => 10,
			'type' => 'color',
			'capability' => 'edit_theme_options',
		)
	);
	
	// Color
	$wp_customize->add_setting( 'sohohotel_header_border_color',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_header_border_color',
		array(
			'label' => esc_html__('Header border color','soho-hotel'),
			'section' => 'sohohotel_colors',
			'priority' => 10,
			'type' => 'color',
			'capability' => 'edit_theme_options',
		)
	);
	
	// Color
	$wp_customize->add_setting( 'sohohotel_top_right_button_background_color',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_top_right_button_background_color',
		array(
			'label' => esc_html__('Top right button background color','soho-hotel'),
			'section' => 'sohohotel_colors',
			'priority' => 10,
			'type' => 'color',
			'capability' => 'edit_theme_options',
		)
	);
	
	// Color
	$wp_customize->add_setting( 'sohohotel_top_right_button_text_color',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_top_right_button_text_color',
		array(
			'label' => esc_html__('Top right button text color','soho-hotel'),
			'section' => 'sohohotel_colors',
			'priority' => 10,
			'type' => 'color',
			'capability' => 'edit_theme_options',
		)
	);
	
	// Color
	$wp_customize->add_setting( 'sohohotel_booking_form_button_bg_color',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_booking_form_button_bg_color',
		array(
			'label' => esc_html__('Booking form button background color','soho-hotel'),
			'section' => 'sohohotel_colors',
			'priority' => 10,
			'type' => 'color',
			'capability' => 'edit_theme_options',
		)
	);
	
	// Color
	$wp_customize->add_setting( 'sohohotel_booking_form_button_text_color',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_booking_form_button_text_color',
		array(
			'label' => esc_html__('Booking form button text color','soho-hotel'),
			'section' => 'sohohotel_colors',
			'priority' => 10,
			'type' => 'color',
			'capability' => 'edit_theme_options',
		)
	);
	
	// Color
	$wp_customize->add_setting( 'sohohotel_booking_form_icon_color',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_booking_form_icon_color',
		array(
			'label' => esc_html__('Booking form icon color','soho-hotel'),
			'section' => 'sohohotel_colors',
			'priority' => 10,
			'type' => 'color',
			'capability' => 'edit_theme_options',
		)
	);
	
	// Color
	$wp_customize->add_setting( 'sohohotel_footer_background_color',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_footer_background_color',
		array(
			'label' => esc_html__('Footer background color','soho-hotel'),
			'section' => 'sohohotel_colors',
			'priority' => 10,
			'type' => 'color',
			'capability' => 'edit_theme_options',
		)
	);
	
	// Color
	$wp_customize->add_setting( 'sohohotel_footer_text_color',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_footer_text_color',
		array(
			'label' => esc_html__('Footer text color','soho-hotel'),
			'section' => 'sohohotel_colors',
			'priority' => 10,
			'type' => 'color',
			'capability' => 'edit_theme_options',
		)
	);
	
	// Color
	$wp_customize->add_setting( 'sohohotel_footer_border_color',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_footer_border_color',
		array(
			'label' => esc_html__('Footer border color','soho-hotel'),
			'section' => 'sohohotel_colors',
			'priority' => 10,
			'type' => 'color',
			'capability' => 'edit_theme_options',
		)
	);
	
	// Color
	$wp_customize->add_setting( 'sohohotel_footer_bottom_bar_background_color',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_footer_bottom_bar_background_color',
		array(
			'label' => esc_html__('Footer bottom bar background color','soho-hotel'),
			'section' => 'sohohotel_colors',
			'priority' => 10,
			'type' => 'color',
			'capability' => 'edit_theme_options',
		)
	);
	
	// Color
	$wp_customize->add_setting( 'sohohotel_footer_bottom_bar_text_color',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_footer_bottom_bar_text_color',
		array(
			'label' => esc_html__('Footer bottom bar text color','soho-hotel'),
			'section' => 'sohohotel_colors',
			'priority' => 10,
			'type' => 'color',
			'capability' => 'edit_theme_options',
		)
	);
	
	// Color
	$wp_customize->add_setting( 'sohohotel_slideshow_button_background_color',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_slideshow_button_background_color',
		array(
			'label' => esc_html__('Slideshow button background color','soho-hotel'),
			'section' => 'sohohotel_colors',
			'priority' => 10,
			'type' => 'color',
			'capability' => 'edit_theme_options',
		)
	);

	// Color
	$wp_customize->add_setting( 'sohohotel_slideshow_button_text_color',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_slideshow_button_text_color',
		array(
			'label' => esc_html__('Slideshow button text color','soho-hotel'),
			'section' => 'sohohotel_colors',
			'priority' => 10,
			'type' => 'color',
			'capability' => 'edit_theme_options',
		)
	);
	
	// Color
	$wp_customize->add_setting( 'sohohotel_title_line_color',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_title_line_color',
		array(
			'label' => esc_html__('Title line color','soho-hotel'),
			'section' => 'sohohotel_colors',
			'priority' => 10,
			'type' => 'color',
			'capability' => 'edit_theme_options',
		)
	);
	
	// Color
	$wp_customize->add_setting( 'sohohotel_datepicker_hover_color',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_datepicker_hover_color',
		array(
			'label' => esc_html__('Datepicker hover background color','soho-hotel'),
			'section' => 'sohohotel_colors',
			'priority' => 10,
			'type' => 'color',
			'capability' => 'edit_theme_options',
		)
	);
	
	// Color
	$wp_customize->add_setting( 'sohohotel_datepicker_select_color_1',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_datepicker_select_color_1',
		array(
			'label' => esc_html__('Datepicker select background color 1','soho-hotel'),
			'section' => 'sohohotel_colors',
			'priority' => 10,
			'type' => 'color',
			'capability' => 'edit_theme_options',
		)
	);
	
	// Color
	$wp_customize->add_setting( 'sohohotel_datepicker_select_color_2',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_datepicker_select_color_2',
		array(
			'label' => esc_html__('Datepicker select background color 2','soho-hotel'),
			'section' => 'sohohotel_colors',
			'priority' => 10,
			'type' => 'color',
			'capability' => 'edit_theme_options',
		)
	);
	
	// Color
	$wp_customize->add_setting( 'sohohotel_booking_background_color',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_booking_background_color',
		array(
			'label' => esc_html__('Booking background color','soho-hotel'),
			'section' => 'sohohotel_colors',
			'priority' => 10,
			'type' => 'color',
			'capability' => 'edit_theme_options',
		)
	);
	
	// Color
	$wp_customize->add_setting( 'sohohotel_booking_primary_text_color',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_booking_primary_text_color',
		array(
			'label' => esc_html__('Booking primary text color','soho-hotel'),
			'section' => 'sohohotel_colors',
			'priority' => 10,
			'type' => 'color',
			'capability' => 'edit_theme_options',
		)
	);
	
	// Color
	$wp_customize->add_setting( 'sohohotel_booking_secondary_text_color',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_booking_secondary_text_color',
		array(
			'label' => esc_html__('Booking secondary text color','soho-hotel'),
			'section' => 'sohohotel_colors',
			'priority' => 10,
			'type' => 'color',
			'capability' => 'edit_theme_options',
		)
	);
	
	// Color
	$wp_customize->add_setting( 'sohohotel_booking_border_color',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_booking_border_color',
		array(
			'label' => esc_html__('Booking border color','soho-hotel'),
			'section' => 'sohohotel_colors',
			'priority' => 10,
			'type' => 'color',
			'capability' => 'edit_theme_options',
		)
	);
	
	// Color
	$wp_customize->add_setting( 'sohohotel_footer_alt_text_color',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_footer_alt_text_color',
		array(
			'label' => esc_html__('Footer Alternative Text Color','soho-hotel'),
			'section' => 'sohohotel_colors',
			'priority' => 10,
			'type' => 'color',
			'capability' => 'edit_theme_options',
		)
	);
	
	// Text
	$wp_customize->add_setting( 'transparent-header-page-ids',
		array(
			'default' => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control( 'transparent-header-page-ids',
		array(
			'label' => esc_html__('Transparent header page IDs','soho-hotel'),
			'section' => 'sohohotel_colors',
			'priority' => 10,
			'type' => 'text',
			'capability' => 'edit_theme_options'
		)
	);
	
	// Section
	$wp_customize->add_section( 'sohohotel_fonts',
		array(
			'title' => esc_html__('Fonts','soho-hotel'),
			'panel' => 'sohohotel_panel',
			'priority' => 160,
			'capability' => 'edit_theme_options'
		)
	);
	
	// Text
	$wp_customize->add_setting( 'sohohotel_primary_font_family',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_primary_font_family',
		array(
			'label' => esc_html__('Primary font family','soho-hotel'),
			'section' => 'sohohotel_fonts',
			'priority' => 10,
			'type' => 'text',
			'capability' => 'edit_theme_options',
		)
	);
	
	// Text
	$wp_customize->add_setting( 'sohohotel_primary_font_weights',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_primary_font_weights',
		array(
			'label' => esc_html__('Primary font weights','soho-hotel'),
			'section' => 'sohohotel_fonts',
			'priority' => 10,
			'type' => 'text',
			'capability' => 'edit_theme_options',
		)
	);
	
	// Text
	$wp_customize->add_setting( 'sohohotel_secondary_font_family',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_secondary_font_family',
		array(
			'label' => esc_html__('Secondary font family','soho-hotel'),
			'section' => 'sohohotel_fonts',
			'priority' => 10,
			'type' => 'text',
			'capability' => 'edit_theme_options',
		)
	);
	
	// Text
	$wp_customize->add_setting( 'sohohotel_secondary_font_weights',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_secondary_font_weights',
		array(
			'label' => esc_html__('Secondary font weights','soho-hotel'),
			'section' => 'sohohotel_fonts',
			'priority' => 10,
			'type' => 'text',
			'capability' => 'edit_theme_options',
		)
	);
	
	// Section
	$wp_customize->add_section( 'sohohotel_google_api',
		array(
			'title' => esc_html__('Google API','soho-hotel'),
			'panel' => 'sohohotel_panel',
			'priority' => 160,
			'capability' => 'edit_theme_options'
		)
	);
	
	// Text
	$wp_customize->add_setting( 'sohohotel_google_api_key',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control( 'sohohotel_google_api_key',
		array(
			'label' => esc_html__('Google API Key','soho-hotel'),
			'section' => 'sohohotel_google_api',
			'priority' => 10,
			'type' => 'text',
			'capability' => 'edit_theme_options',
		)
	);

}

add_action( 'customize_register', 'sohohotel_customize_register');

function sohohotel_sanitize_checkbox( $checked ) {
  return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

function sohohotel_sanitize_select_radio( $input, $setting ) {
  $input = sanitize_key( $input );
  $choices = $setting->manager->get_control( $setting->id )->choices;
  return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}