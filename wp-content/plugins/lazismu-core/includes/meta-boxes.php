<?php
/**
 * Admin meta boxes.
 *
 * @package Lazismu_Core
 */

defined( 'ABSPATH' ) || exit;

add_action( 'add_meta_boxes', 'lazismu_core_add_meta_boxes' );
add_action( 'save_post', 'lazismu_core_save_meta_boxes' );

function lazismu_core_add_meta_boxes() {
	add_meta_box( 'lazismu_campaign_meta', __( 'Campaign Data', 'lazismu-core' ), 'lazismu_core_campaign_meta_box', 'campaign', 'normal', 'high' );
	add_meta_box( 'lazismu_report_meta', __( 'Report Data', 'lazismu-core' ), 'lazismu_core_report_meta_box', 'report', 'normal', 'high' );
	add_meta_box( 'lazismu_rekening_meta', __( 'Rekening Data', 'lazismu-core' ), 'lazismu_core_rekening_meta_box', 'rekening', 'normal', 'high' );
}

function lazismu_core_campaign_meta_box( $post ) {
	lazismu_core_nonce_field();
	lazismu_core_number_field( $post->ID, '_lazismu_target_amount', __( 'Target Dana', 'lazismu-core' ) );
	lazismu_core_number_field( $post->ID, '_lazismu_collected_amount', __( 'Dana Terkumpul', 'lazismu-core' ) );
	lazismu_core_number_field( $post->ID, '_lazismu_donor_count', __( 'Jumlah Donatur', 'lazismu-core' ) );
	lazismu_core_checkbox_field( $post->ID, '_lazismu_is_featured', __( 'Tampilkan sebagai unggulan', 'lazismu-core' ) );
}

function lazismu_core_report_meta_box( $post ) {
	lazismu_core_nonce_field();
	lazismu_core_text_field( $post->ID, '_lazismu_report_period', __( 'Periode/Tahun', 'lazismu-core' ) );
	lazismu_core_url_field( $post->ID, '_lazismu_report_file_url', __( 'URL File PDF', 'lazismu-core' ) );
}

function lazismu_core_rekening_meta_box( $post ) {
	lazismu_core_nonce_field();
	lazismu_core_text_field( $post->ID, '_lazismu_bank_name', __( 'Nama Bank', 'lazismu-core' ) );
	lazismu_core_text_field( $post->ID, '_lazismu_account_number', __( 'Nomor Rekening', 'lazismu-core' ) );
	lazismu_core_text_field( $post->ID, '_lazismu_account_name', __( 'Atas Nama', 'lazismu-core' ) );
	lazismu_core_text_field( $post->ID, '_lazismu_rekening_category', __( 'Kategori Donasi', 'lazismu-core' ) );
	lazismu_core_url_field( $post->ID, '_lazismu_qris_url', __( 'URL QRIS', 'lazismu-core' ) );
	lazismu_core_number_field( $post->ID, '_lazismu_sort_order', __( 'Urutan Tampil', 'lazismu-core' ) );
	lazismu_core_checkbox_field( $post->ID, '_lazismu_is_active', __( 'Aktif', 'lazismu-core' ) );
}

function lazismu_core_save_meta_boxes( $post_id ) {
	if ( ! isset( $_POST['lazismu_core_meta_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['lazismu_core_meta_nonce'] ) ), 'lazismu_core_save_meta' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$text_fields = array( '_lazismu_report_period', '_lazismu_bank_name', '_lazismu_account_number', '_lazismu_account_name', '_lazismu_rekening_category' );
	$url_fields  = array( '_lazismu_report_file_url', '_lazismu_qris_url' );
	$num_fields  = array( '_lazismu_target_amount', '_lazismu_collected_amount', '_lazismu_donor_count', '_lazismu_sort_order' );
	$bool_fields = array( '_lazismu_is_featured', '_lazismu_is_active' );

	foreach ( $text_fields as $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			update_post_meta( $post_id, $field, sanitize_text_field( wp_unslash( $_POST[ $field ] ) ) );
		}
	}

	foreach ( $url_fields as $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			update_post_meta( $post_id, $field, esc_url_raw( wp_unslash( $_POST[ $field ] ) ) );
		}
	}

	foreach ( $num_fields as $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			update_post_meta( $post_id, $field, absint( wp_unslash( $_POST[ $field ] ) ) );
		}
	}

	foreach ( $bool_fields as $field ) {
		update_post_meta( $post_id, $field, isset( $_POST[ $field ] ) ? 1 : 0 );
	}
}

function lazismu_core_nonce_field() {
	wp_nonce_field( 'lazismu_core_save_meta', 'lazismu_core_meta_nonce' );
}

function lazismu_core_text_field( $post_id, $key, $label ) {
	$value = get_post_meta( $post_id, $key, true );
	printf( '<p><label><strong>%s</strong><br><input class="widefat" type="text" name="%s" value="%s"></label></p>', esc_html( $label ), esc_attr( $key ), esc_attr( $value ) );
}

function lazismu_core_url_field( $post_id, $key, $label ) {
	$value = get_post_meta( $post_id, $key, true );
	printf( '<p><label><strong>%s</strong><br><input class="widefat" type="url" name="%s" value="%s"></label></p>', esc_html( $label ), esc_attr( $key ), esc_attr( $value ) );
}

function lazismu_core_number_field( $post_id, $key, $label ) {
	$value = get_post_meta( $post_id, $key, true );
	printf( '<p><label><strong>%s</strong><br><input class="widefat" type="number" min="0" step="1" name="%s" value="%s"></label></p>', esc_html( $label ), esc_attr( $key ), esc_attr( $value ) );
}

function lazismu_core_checkbox_field( $post_id, $key, $label ) {
	$value = (int) get_post_meta( $post_id, $key, true );
	printf( '<p><label><input type="checkbox" name="%s" value="1" %s> %s</label></p>', esc_attr( $key ), checked( 1, $value, false ), esc_html( $label ) );
}
