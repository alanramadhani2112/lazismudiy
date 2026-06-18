<?php
/**
 * Asset loading.
 *
 * @package Lazismu_DIY
 */

defined( 'ABSPATH' ) || exit;

add_action( 'wp_enqueue_scripts', function () {
	$theme_dir = get_template_directory();
	$theme_uri = get_template_directory_uri();
	$css_path  = $theme_dir . '/assets/dist/app.css';
	$js_path   = $theme_dir . '/assets/dist/app.js';

	if ( file_exists( $css_path ) ) {
		wp_enqueue_style( 'lazismu-diy-app', $theme_uri . '/assets/dist/app.css', array(), filemtime( $css_path ) );
	} else {
		wp_enqueue_style( 'lazismu-diy-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
	}

	if ( file_exists( $js_path ) ) {
		wp_enqueue_script( 'lazismu-diy-app', $theme_uri . '/assets/dist/app.js', array(), filemtime( $js_path ), true );
	}
} );
