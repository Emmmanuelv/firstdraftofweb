<?php

if ( class_exists("Kirki")){

	Kirki::add_config('theme_config_id', array(
		'capability'   =>  'edit_theme_options',
		'option_type'  =>  'theme_mod',
	));

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'rc_drone_logo_resizer',
		'label'       => esc_html__( 'Adjust Logo Size', 'rc-drone' ),
		'section'     => 'title_tagline',
		'default'     => 70,
		'choices'     => [
			'min'  => 10,
			'max'  => 300,
			'step' => 10,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'rc_drone_enable_logo_text',
		'section'     => 'title_tagline',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Site Title and Tagline', 'rc-drone' ) . '</h3>',
		'priority'    => 10,
	] );

  	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'rc_drone_display_header_title',
		'label'       => esc_html__( 'Site Title Enable / Disable Button', 'rc-drone' ),
		'section'     => 'title_tagline',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'rc-drone' ),
			'off' => esc_html__( 'Disable', 'rc-drone' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'rc_drone_display_header_text',
		'label'       => esc_html__( 'Tagline Enable / Disable Button', 'rc-drone' ),
		'section'     => 'title_tagline',
		'default'     => '0',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'rc-drone' ),
			'off' => esc_html__( 'Disable', 'rc-drone' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'rc_drone_site_tittle_font_heading',
		'section'     => 'title_tagline',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Site Title Font Size', 'rc-drone' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'rc_drone_site_tittle_font_size',
		'type'        => 'number',
		'section'     => 'title_tagline',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array('.logo a'),
				'property' => 'font-size',
				'suffix' => 'px'
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'rc_drone_site_tagline_font_heading',
		'section'     => 'title_tagline',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Site Tagline Font Size', 'rc-drone' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'rc_drone_site_tagline_font_size',
		'type'        => 'number',
		'section'     => 'title_tagline',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array('.logo span'),
				'property' => 'font-size',
				'suffix' => 'px'
			),
		),
	) );


	// Theme Options Panel
	Kirki::add_panel( 'rc_drone_theme_options_panel', array(
		'priority' => 10,
		'title'    => __( 'Theme Options', 'rc-drone' ),
	) );

	// HEADER SECTION

	Kirki::add_section( 'rc_drone_section_header', array(
	    'title'          => esc_html__( 'Header Settings', 'rc-drone' ),
	    'description'    => esc_html__( 'Here you can add header information.', 'rc-drone' ),
	    'panel'    => 'rc_drone_theme_options_panel',
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'rc_drone_sticky_header',
		'label'       => esc_html__( 'Enable/Disable Sticky Header', 'rc-drone' ),
		'section'     => 'rc_drone_section_header',
		'default'     => 'on',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'rc-drone' ),
			'off' => esc_html__( 'Disable', 'rc-drone' ),
		],
	] );


	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'tab'      => 'header',
		'settings'    => 'rc_drone_login_enable',
		'label'       => esc_html__( 'Enable/Disable Login', 'rc-drone' ),
		'section'     => 'rc_drone_section_header',
		'default'     => 'on',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'rc-drone' ),
			'off' => esc_html__( 'Disable', 'rc-drone' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'tab'      => 'header',
		'settings'    => 'rc_drone_cart_box_enable',
		'label'       => esc_html__( 'Enable/Disable Shopping Cart', 'rc-drone' ),
		'section'     => 'rc_drone_section_header',
		'default'     => 'on',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'rc-drone' ),
			'off' => esc_html__( 'Disable', 'rc-drone' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'tab'      => 'header',
		'settings'    => 'rc_drone_search_enable',
		'label'       => esc_html__( 'Enable/Disable Search', 'rc-drone' ),
		'section'     => 'rc_drone_section_header',
		'default'     => 'on',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'rc-drone' ),
			'off' => esc_html__( 'Disable', 'rc-drone' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'rc_drone_header_button_url_heading',
		'section'     => 'rc_drone_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Compare Button Link', 'rc-drone' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'url',
		'settings' => 'rc_drone_header_button_url',
		'section'  => 'rc_drone_section_header',
		'default'  => '',
	] );

	// WOOCOMMERCE SETTINGS

	Kirki::add_section( 'rc_drone_woocommerce_settings', array(
		'title'          => esc_html__( 'Woocommerce Settings', 'rc-drone' ),
		'description'    => esc_html__( 'Woocommerce Settings of themes', 'rc-drone' ),
		'panel'    => 'woocommerce',
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'rc_drone_shop_page_sidebar',
		'label'       => esc_html__( 'Enable/Disable Shop Page Sidebar', 'rc-drone' ),
		'section'     => 'rc_drone_woocommerce_settings',
		'default'     => 'true',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Shop Page Layouts', 'rc-drone' ),
		'settings'    => 'rc_drone_shop_page_layout',
		'section'     => 'rc_drone_woocommerce_settings',
		'default'     => 'Right Sidebar',
		'choices'     => [
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'rc-drone' ),
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'rc-drone' ),
		],
		'active_callback'  => [
			[
				'setting'  => 'rc_drone_shop_page_sidebar',
				'operator' => '===',
				'value'    => true,
			],
		]

	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'select',
		'label'       => esc_html__( 'Products Per Row', 'rc-drone' ),
		'settings'    => 'rc_drone_products_per_row',
		'section'     => 'rc_drone_woocommerce_settings',
		'default'     => '3',
		'priority'    => 10,
		'choices'     => [
			'2' => '2',
			'3' => '3',
			'4' => '4',
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'label'       => esc_html__( 'Products Per Page', 'rc-drone' ),
		'settings'    => 'rc_drone_products_per_page',
		'section'     => 'rc_drone_woocommerce_settings',
		'default'     => '9',
		'priority'    => 10,
		'choices'  => [
					'min'  => 0,
					'max'  => 50,
					'step' => 1,
				],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'rc_drone_single_product_sidebar',
		'label'       => esc_html__( 'Enable / Disable Single Product Sidebar', 'rc-drone' ),
		'section'     => 'rc_drone_woocommerce_settings',
		'default'     => 'true',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Single Product Layout', 'rc-drone' ),
		'settings'    => 'rc_drone_single_product_sidebar_layout',
		'section'     => 'rc_drone_woocommerce_settings',
		'default'     => 'Right Sidebar',
		'choices'     => [
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'rc-drone' ),
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'rc-drone' ),
		],
		'active_callback'  => [
			[
				'setting'  => 'rc_drone_single_product_sidebar',
				'operator' => '===',
				'value'    => true,
			],
		]
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'rc_drone_products_button_border_radius_heading',
		'section'     => 'rc_drone_woocommerce_settings',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Products Button Border Radius', 'rc-drone' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'rc_drone_products_button_border_radius',
		'section'     => 'rc_drone_woocommerce_settings',
		'default'     => '1',
		'priority'    => 10,
		'choices'  => [
					'min'  => 1,
					'max'  => 50,
					'step' => 1,
				],
		'output' => array(
			array(
				'element'  => array('.woocommerce ul.products li.product .button',' a.checkout-button.button.alt.wc-forward','.woocommerce #respond input#submit', '.woocommerce a.button', '.woocommerce button.button','.woocommerce input.button','.woocommerce #respond input#submit.alt','.woocommerce button.button.alt','.woocommerce input.button.alt'),
				'property' => 'border-radius',
				'units' => 'px',
			),
		),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'rc_drone_sale_badge_position_heading',
		'section'     => 'rc_drone_woocommerce_settings',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Sale Badge Position', 'rc-drone' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'settings'    => 'rc_drone_sale_badge_position',
		'section'     => 'rc_drone_woocommerce_settings',
		'default'     => 'right',
		'choices'     => [
			'right' => esc_html__( 'Right', 'rc-drone' ),
			'left' => esc_html__( 'Left', 'rc-drone' ),
		],
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'rc_drone_products_sale_font_size_heading',
		'section'     => 'rc_drone_woocommerce_settings',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Sale Font Size', 'rc-drone' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'text',
		'settings'    => 'rc_drone_products_sale_font_size',
		'section'     => 'rc_drone_woocommerce_settings',
		'priority'    => 10,
		'output' => array(
			array(
				'element'  => array('.woocommerce span.onsale','.woocommerce ul.products li.product .onsale'),
				'property' => 'font-size',
				'units' => 'px',
			),
		),
	] );
	
	//ADDITIONAL SETTINGS

	Kirki::add_section( 'rc_drone_additional_setting', array(
		'title'          => esc_html__( 'Additional Settings', 'rc-drone' ),
		'description'    => esc_html__( 'Additional Settings of themes', 'rc-drone' ),
		'panel'    => 'rc_drone_theme_options_panel',
		'priority'       => 10,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'rc_drone_preloader_hide',
		'label'       => esc_html__( 'Here you can enable or disable your preloader.', 'rc-drone' ),
		'section'     => 'rc_drone_additional_setting',
		'default'     => '0',
		'priority'    => 10,
	] );
 
	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'rc_drone_scroll_enable_setting',
		'label'       => esc_html__( 'Here you can enable or disable your scroller.', 'rc-drone' ),
		'section'     => 'rc_drone_additional_setting',
		'default'     => '0',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'rc_drone_single_page_layout_heading',
		'section'     => 'rc_drone_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Single Page Layout', 'rc-drone' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'settings'    => 'rc_drone_single_page_layout',
		'section'     => 'rc_drone_additional_setting',
		'default'     => 'One Column',
		'choices'     => [
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'rc-drone' ),
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'rc-drone' ),
			'One Column' => esc_html__( 'One Column', 'rc-drone' ),
		],
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'rc_drone_header_background_attachment_heading',
		'section'     => 'rc_drone_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Header Image Attachment', 'rc-drone' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'settings'    => 'rc_drone_header_background_attachment',
		'section'     => 'rc_drone_additional_setting',
		'default'     => 'scroll',
		'choices'     => [
			'scroll' => esc_html__( 'Scroll', 'rc-drone' ),
			'fixed' => esc_html__( 'Fixed', 'rc-drone' ),
		],
		'output' => array(
			array(
				'element'  => '.header-image-box',
				'property' => 'background-attachment',
			),
		),
	 ) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'rc_drone_header_overlay_heading',
		'section'     => 'rc_drone_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Header Image Overlay', 'rc-drone' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'rc_drone_header_overlay_setting',
		'label'       => __( 'Overlay Color', 'rc-drone' ),
		'type'        => 'color',
		'section'     => 'rc_drone_additional_setting',
		'transport' => 'auto',
		'default'     => '#00000061',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => '.header-image-box:before',
				'property' => 'background',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'rc_drone_header_page_title',
		'label'       => esc_html__( 'Enable / Disable Header Image Page Title.', 'rc-drone' ),
		'section'     => 'rc_drone_additional_setting',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'rc_drone_header_breadcrumb',
		'label'       => esc_html__( 'Enable / Disable Header Image Breadcrumb.', 'rc-drone' ),
		'section'     => 'rc_drone_additional_setting',
		'default'     => '1',
		'priority'    => 10,
	] );

	// POST SECTION

	Kirki::add_section( 'rc_drone_blog_post', array(
		'title'          => esc_html__( 'Post Settings', 'rc-drone' ),
		'description'    => esc_html__( 'Here you can add post information.', 'rc-drone' ),
		'panel'    => 'rc_drone_theme_options_panel',
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'rc_drone_post_layout_heading',
		'section'     => 'rc_drone_blog_post',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Blog Layout', 'rc-drone' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'settings'    => 'rc_drone_post_layout',
		'section'     => 'rc_drone_blog_post',
		'default'     => 'Right Sidebar',
		'choices'     => [
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'rc-drone' ),
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'rc-drone' ),
			'One Column' => esc_html__( 'One Column', 'rc-drone' ),
			'Three Columns' => esc_html__( 'Three Columns', 'rc-drone' ),
			'Four Columns' => esc_html__( 'Four Columns', 'rc-drone' ),
		],
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'rc_drone_date_hide',
		'label'       => esc_html__( 'Enable / Disable Post Date', 'rc-drone' ),
		'section'     => 'rc_drone_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'rc_drone_author_hide',
		'label'       => esc_html__( 'Enable / Disable Post Author', 'rc-drone' ),
		'section'     => 'rc_drone_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'rc_drone_comment_hide',
		'label'       => esc_html__( 'Enable / Disable Post Comment', 'rc-drone' ),
		'section'     => 'rc_drone_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'rc_drone_blog_post_featured_image',
		'label'       => esc_html__( 'Enable / Disable Post Image', 'rc-drone' ),
		'section'     => 'rc_drone_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'rc_drone_length_setting_heading',
		'section'     => 'rc_drone_blog_post',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Blog Post Content Limit', 'rc-drone' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'settings'    => 'rc_drone_length_setting',
		'section'     => 'rc_drone_blog_post',
		'default'     => '15',
		'priority'    => 10,
		'choices'  => [
					'min'  => -10,
					'max'  => 40,
		 			'step' => 1,
				],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'label'       => esc_html__( 'Enable / Disable Single Post Tag', 'rc-drone' ),
		'settings'    => 'rc_drone_single_post_tag',
		'section'     => 'rc_drone_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'label'       => esc_html__( 'Enable / Disable Single Post Category', 'rc-drone' ),
		'settings'    => 'rc_drone_single_post_category',
		'section'     => 'rc_drone_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'rc_drone_single_post_featured_image',
		'label'       => esc_html__( 'Enable / Disable Single Post Image', 'rc-drone' ),
		'section'     => 'rc_drone_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'rc_drone_single_post_radius',
		'section'     => 'rc_drone_blog_post',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Single Post Image Border Radius(px)', 'rc-drone' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'rc_drone_single_post_border_radius',
		'label'       => __( 'Enter a value in pixels. Example:15px', 'rc-drone' ),
		'type'        => 'text',
		'section'     => 'rc_drone_blog_post',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array('.post-img img'),
				'property' => 'border-radius',
			),
		),
	) );

	// No Results Page Settings

	Kirki::add_section( 'rc_drone_no_result_section', array(
		'title'          => esc_html__( '404 & No Results Page Settings', 'rc-drone' ),
		'panel'    => 'rc_drone_theme_options_panel',
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'rc_drone_page_not_found_title_heading',
		'section'     => 'rc_drone_no_result_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( '404 Page Title', 'rc-drone' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'rc_drone_page_not_found_title',
		'section'  => 'rc_drone_no_result_section',
		'default'  => esc_html__('404 Error!', 'rc-drone'),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'rc_drone_page_not_found_text_heading',
		'section'     => 'rc_drone_no_result_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( '404 Page Text', 'rc-drone' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'rc_drone_page_not_found_text',
		'section'  => 'rc_drone_no_result_section',
		'default'  => esc_html__('The page you are looking for may have been moved, deleted, or possibly never existed.', 'rc-drone'),
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'     => 'custom',
		'settings' => 'rc_drone_page_not_found_line_break',
		'section'  => 'rc_drone_no_result_section',
		'default'  => '<hr>',
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'rc_drone_no_results_title_heading',
		'section'     => 'rc_drone_no_result_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'No Results Title', 'rc-drone' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'rc_drone_no_results_title',
		'section'  => 'rc_drone_no_result_section',
		'default'  => esc_html__('Nothing Found', 'rc-drone'),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'rc_drone_no_results_content_heading',
		'section'     => 'rc_drone_no_result_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'No Results Content', 'rc-drone' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'rc_drone_no_results_content',
		'section'  => 'rc_drone_no_result_section',
		'default'  => esc_html__('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'rc-drone'),
	] );
	
	// FOOTER SECTION

	Kirki::add_section( 'rc_drone_footer_section', array(
        'title'          => esc_html__( 'Footer Settings', 'rc-drone' ),
        'description'    => esc_html__( 'Here you can change copyright text', 'rc-drone' ),
        'panel'    => 'rc_drone_theme_options_panel',
		'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'rc_drone_footer_text_heading',
		'section'     => 'rc_drone_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Text', 'rc-drone' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'rc_drone_footer_text',
		'section'  => 'rc_drone_footer_section',
		'default'  => '',
		'priority' => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'rc_drone_footer_enable_heading',
		'section'     => 'rc_drone_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Footer Link', 'rc-drone' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'rc_drone_copyright_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'rc-drone' ),
		'section'     => 'rc_drone_footer_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'rc-drone' ),
			'off' => esc_html__( 'Disable', 'rc-drone' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'rc_drone_footer_background_widget_heading',
		'section'     => 'rc_drone_footer_section',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Widget Background', 'rc-drone' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id',
	[
		'settings'    => 'rc_drone_footer_background_widget',
		'type'        => 'background',
		'section'     => 'rc_drone_footer_section',
		'default'     => [
			'background-color'      => 'rgba(18,18,18,1)',
			'background-image'      => '',
			'background-repeat'     => 'no-repeat',
			'background-position'   => 'center center',
			'background-size'       => 'cover',
			'background-attachment' => 'scroll',
		],
		'transport'   => 'auto',
		'output'      => [
			[
				'element' => '.footer-widget',
			],
		],
	]);

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'rc_drone_footer_copright_color_heading',
		'section'     => 'rc_drone_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Copyright Background Color', 'rc-drone' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'rc_drone_footer_copright_color',
		'type'        => 'color',
		'label'       => __( 'Background Color', 'rc-drone' ),
		'section'     => 'rc_drone_footer_section',
		'transport' => 'auto',
		'default'     => '#121212',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => '.footer-copyright',
				'property' => 'background',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'rc_drone_footer_copright_text_color_heading',
		'section'     => 'rc_drone_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Copyright Text Color', 'rc-drone' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'rc_drone_footer_copright_text_color',
		'type'        => 'color',
		'label'       => __( 'Text Color', 'rc-drone' ),
		'section'     => 'rc_drone_footer_section',
		'transport' => 'auto',
		'default'     => '#ffffff',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => array( '.footer-copyright a', '.footer-copyright p'),
				'property' => 'color',
			),
		),
	) );

}
