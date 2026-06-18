<?php
/**
 * Navigation menus.
 *
 * @package Lazismu_DIY
 */

defined( 'ABSPATH' ) || exit;

add_action( 'after_setup_theme', function () {
	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'lazismu-diy' ),
			'footer'  => __( 'Footer Menu', 'lazismu-diy' ),
		)
	);
} );
