<?php
/**
 * Plugin Name: LAZISMU Donation
 * Description: Donation and zakat transaction module for LAZISMU DIY website.
 * Version: 0.1.0
 * Author: LAZISMU DIY
 * Text Domain: lazismu-donation
 */

defined( 'ABSPATH' ) || exit;

require_once __DIR__ . '/includes/database.php';
require_once __DIR__ . '/includes/form.php';
require_once __DIR__ . '/includes/instructions.php';
require_once __DIR__ . '/includes/admin.php';

register_activation_hook( __FILE__, 'lazismu_donation_install_tables' );
