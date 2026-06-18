<?php
/**
 * Custom post types.
 *
 * @package Lazismu_Core
 */

defined( 'ABSPATH' ) || exit;

add_action( 'init', 'lazismu_core_register_post_types' );

function lazismu_core_register_post_types() {
	$post_types = array(
		'program'      => array(
			'singular' => __( 'Program', 'lazismu-core' ),
			'plural'   => __( 'Programs', 'lazismu-core' ),
			'slug'     => 'program',
			'icon'     => 'dashicons-heart',
		),
		'campaign'     => array(
			'singular' => __( 'Campaign', 'lazismu-core' ),
			'plural'   => __( 'Campaigns', 'lazismu-core' ),
			'slug'     => 'campaign',
			'icon'     => 'dashicons-megaphone',
		),
		'impact_story' => array(
			'singular' => __( 'Impact Story', 'lazismu-core' ),
			'plural'   => __( 'Impact Stories', 'lazismu-core' ),
			'slug'     => 'cerita-dampak',
			'icon'     => 'dashicons-format-gallery',
		),
		'report'       => array(
			'singular' => __( 'Report', 'lazismu-core' ),
			'plural'   => __( 'Reports', 'lazismu-core' ),
			'slug'     => 'laporan',
			'icon'     => 'dashicons-media-document',
		),
		'faq'          => array(
			'singular' => __( 'FAQ', 'lazismu-core' ),
			'plural'   => __( 'FAQs', 'lazismu-core' ),
			'slug'     => 'faq',
			'icon'     => 'dashicons-editor-help',
		),
		'rekening'     => array(
			'singular' => __( 'Rekening', 'lazismu-core' ),
			'plural'   => __( 'Rekening Donasi', 'lazismu-core' ),
			'slug'     => 'rekening',
			'icon'     => 'dashicons-bank',
		),
	);

	foreach ( $post_types as $post_type => $config ) {
		register_post_type(
			$post_type,
			array(
				'labels'       => array(
					'name'          => $config['plural'],
					'singular_name' => $config['singular'],
					'add_new_item'  => sprintf( __( 'Add New %s', 'lazismu-core' ), $config['singular'] ),
					'edit_item'     => sprintf( __( 'Edit %s', 'lazismu-core' ), $config['singular'] ),
				),
				'public'       => true,
				'has_archive'  => true,
				'menu_icon'    => $config['icon'],
				'rewrite'      => array( 'slug' => $config['slug'] ),
				'show_in_rest' => true,
				'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
			)
		);
	}
}
