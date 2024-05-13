<?php
	
require get_template_directory() . '/includes/tgm/class-tgm-plugin-activation.php';

/**
 * Recommended plugins.
 */
function rc_drone_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'Kirki Customizer Framework', 'rc-drone' ),
			'slug'             => 'kirki',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'WPElemento Importer', 'rc-drone' ),
			'slug'             => 'wpelemento-importer',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'ShopLentor – WooCommerce Builder for Elementor & Gutenberg', 'rc-drone' ),
			'slug'             => 'woolentor-addons',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'WooCommerce', 'rc-drone' ),
			'slug'             => 'woocommerce',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'Prime Slider', 'rc-drone' ),
			'slug'             => 'bdthemes-prime-slider-lite',
			'required'         => false,
			'force_activation' => false,
		)
	);
	$config = array();
	rc_drone_tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'rc_drone_register_recommended_plugins' );
