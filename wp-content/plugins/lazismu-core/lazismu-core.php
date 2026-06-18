<?php
/**
 * Plugin Name: LAZISMU Core
 * Description: Core content types and shared functionality for LAZISMU DIY website.
 * Version: 0.1.0
 * Author: LAZISMU DIY
 * Text Domain: lazismu-core
 */

defined( 'ABSPATH' ) || exit;

require_once __DIR__ . '/includes/post-types.php';
require_once __DIR__ . '/includes/taxonomies.php';

register_activation_hook( __FILE__, 'lazismu_core_activate' );
register_deactivation_hook( __FILE__, 'lazismu_core_deactivate' );

function lazismu_core_activate() {
	lazismu_core_register_post_types();
	lazismu_core_register_taxonomies();
	flush_rewrite_rules();
}

function lazismu_core_deactivate() {
	flush_rewrite_rules();
}
