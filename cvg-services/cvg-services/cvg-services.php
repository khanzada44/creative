<?php
/**
 * Plugin Name: CVG Services
 * Description: Ek page par saari services dynamic dikhata hai. Shortcode: [cvg_services default="logo-design"]
 * Version: 1.0.0
 * Author: Creative Converge
 * Text Domain: cvg-services
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'CVG_SV_DIR', plugin_dir_path( __FILE__ ) );
define( 'CVG_SV_URL', plugin_dir_url( __FILE__ ) );
define( 'CVG_SV_VER', '1.0.0' );

/**
 * Services data lana.
 * Doosre plugin/theme se data badalna ho to filter use karein:
 * add_filter( 'cvg_services_data', function ( $services ) { return $services; } );
 */
function cvg_get_services() {
	$services = require CVG_SV_DIR . 'includes/services-data.php';
	return apply_filters( 'cvg_services_data', $services );
}

/**
 * Shortcode: [cvg_services default="logo-design"]
 */
function cvg_services_shortcode( $atts ) {
	$atts    = shortcode_atts( array( 'default' => 'logo-design' ), $atts, 'cvg_services' );
	$default = sanitize_title( $atts['default'] );

	$css = CVG_SV_DIR . 'assets/css/services.css';
	$js  = CVG_SV_DIR . 'assets/js/services.js';

	wp_enqueue_style( 'cvg-services', CVG_SV_URL . 'assets/css/services.css', array(), filemtime( $css ) );
	wp_enqueue_script( 'cvg-services', CVG_SV_URL . 'assets/js/services.js', array(), filemtime( $js ), true );

	// Page ka URL (query string ke bina) — chips/links isi se banenge.
	$page_url = get_permalink();
	if ( ! $page_url ) {
		$page_url = home_url( '/services/' );
	}

	$config = array(
		'page'     => strtok( $page_url, '?' ),
		'contact'  => home_url( '/contact-us/' ),
		'services' => cvg_get_services(),
	);

	// JS se pehle data page par daalo.
	wp_add_inline_script( 'cvg-services', 'window.CVG_SP = ' . wp_json_encode( $config ) . ';', 'before' );

	ob_start();
	include CVG_SV_DIR . 'templates/services.php';
	return ob_get_clean();
}
add_shortcode( 'cvg_services', 'cvg_services_shortcode' );

/**
 * REST API: /wp-json/cvg/v1/services  (optional, doosri apps ke liye)
 */
add_action(
	'rest_api_init',
	function () {
		register_rest_route(
			'cvg/v1',
			'/services',
			array(
				'methods'             => 'GET',
				'callback'            => function () {
					return rest_ensure_response( cvg_get_services() );
				},
				'permission_callback' => '__return_true',
			)
		);
	}
);
