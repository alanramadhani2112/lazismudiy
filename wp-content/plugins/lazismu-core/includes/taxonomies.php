<?php
/**
 * Custom taxonomies.
 *
 * @package Lazismu_Core
 */

defined( 'ABSPATH' ) || exit;

add_action( 'init', 'lazismu_core_register_taxonomies' );

function lazismu_core_register_taxonomies() {
	$taxonomies = array(
		'program_category' => array(
			'singular'   => __( 'Program Category', 'lazismu-core' ),
			'plural'     => __( 'Program Categories', 'lazismu-core' ),
			'slug'       => 'kategori-program',
			'post_types' => array( 'program', 'campaign', 'impact_story' ),
		),
		'donation_type'    => array(
			'singular'   => __( 'Donation Type', 'lazismu-core' ),
			'plural'     => __( 'Donation Types', 'lazismu-core' ),
			'slug'       => 'jenis-donasi',
			'post_types' => array( 'campaign' ),
		),
		'beneficiary_type' => array(
			'singular'   => __( 'Beneficiary Type', 'lazismu-core' ),
			'plural'     => __( 'Beneficiary Types', 'lazismu-core' ),
			'slug'       => 'penerima-manfaat',
			'post_types' => array( 'program', 'campaign' ),
		),
		'location'         => array(
			'singular'   => __( 'Location', 'lazismu-core' ),
			'plural'     => __( 'Locations', 'lazismu-core' ),
			'slug'       => 'lokasi',
			'post_types' => array( 'program', 'campaign', 'impact_story' ),
		),
		'asnaf_category'   => array(
			'singular'   => __( 'Asnaf Category', 'lazismu-core' ),
			'plural'     => __( 'Asnaf Categories', 'lazismu-core' ),
			'slug'       => 'kategori-asnaf',
			'post_types' => array( 'program', 'campaign' ),
		),
		'report_period'    => array(
			'singular'   => __( 'Report Period', 'lazismu-core' ),
			'plural'     => __( 'Report Periods', 'lazismu-core' ),
			'slug'       => 'periode-laporan',
			'post_types' => array( 'report' ),
		),
	);

	foreach ( $taxonomies as $taxonomy => $config ) {
		register_taxonomy(
			$taxonomy,
			$config['post_types'],
			array(
				'labels'       => array(
					'name'          => $config['plural'],
					'singular_name' => $config['singular'],
				),
				'hierarchical' => true,
				'public'       => true,
				'rewrite'      => array( 'slug' => $config['slug'] ),
				'show_in_rest' => true,
			)
		);
	}
}
