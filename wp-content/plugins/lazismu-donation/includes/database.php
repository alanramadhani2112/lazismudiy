<?php
/**
 * Donation tables.
 *
 * @package Lazismu_Donation
 */

defined( 'ABSPATH' ) || exit;

function lazismu_donation_install_tables() {
	global $wpdb;

	require_once ABSPATH . 'wp-admin/includes/upgrade.php';

	$charset_collate = $wpdb->get_charset_collate();
	$donations_table = $wpdb->prefix . 'lazismu_donations';
	$logs_table      = $wpdb->prefix . 'lazismu_donation_logs';

	$sql = "CREATE TABLE {$donations_table} (
		id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
		donation_code varchar(40) NOT NULL,
		donor_name varchar(191) NOT NULL,
		donor_email varchar(191) DEFAULT NULL,
		donor_phone varchar(50) DEFAULT NULL,
		is_anonymous tinyint(1) NOT NULL DEFAULT 0,
		donation_type varchar(50) NOT NULL,
		object_type varchar(50) DEFAULT NULL,
		object_id bigint(20) unsigned DEFAULT NULL,
		amount decimal(18,2) NOT NULL DEFAULT 0,
		payment_method varchar(50) DEFAULT NULL,
		status varchar(30) NOT NULL DEFAULT 'pending',
		message text DEFAULT NULL,
		created_at datetime NOT NULL,
		paid_at datetime DEFAULT NULL,
		updated_at datetime NOT NULL,
		PRIMARY KEY  (id),
		UNIQUE KEY donation_code (donation_code),
		KEY status (status),
		KEY donation_type (donation_type)
	) {$charset_collate};";

	$sql .= "CREATE TABLE {$logs_table} (
		id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
		donation_id bigint(20) unsigned NOT NULL,
		event_type varchar(50) NOT NULL,
		payload longtext DEFAULT NULL,
		created_at datetime NOT NULL,
		PRIMARY KEY  (id),
		KEY donation_id (donation_id)
	) {$charset_collate};";

	dbDelta( $sql );
}

function lazismu_donation_table() {
	global $wpdb;

	return $wpdb->prefix . 'lazismu_donations';
}

function lazismu_donation_log_table() {
	global $wpdb;

	return $wpdb->prefix . 'lazismu_donation_logs';
}
