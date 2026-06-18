<?php
/**
 * Manual transfer instructions.
 *
 * @package Lazismu_Donation
 */

defined( 'ABSPATH' ) || exit;

add_shortcode( 'lazismu_donation_instruction', 'lazismu_donation_instruction_shortcode' );

function lazismu_donation_instruction_shortcode() {
	$code = isset( $_GET['donation_code'] ) ? sanitize_text_field( wp_unslash( $_GET['donation_code'] ) ) : '';

	if ( '' === $code ) {
		return '<div class="card-base">Kode donasi tidak ditemukan.</div>';
	}

	global $wpdb;
	$item = $wpdb->get_row( $wpdb->prepare( 'SELECT * FROM ' . lazismu_donation_table() . ' WHERE donation_code = %s', $code ) );

	if ( ! $item ) {
		return '<div class="card-base">Data donasi tidak ditemukan.</div>';
	}

	ob_start();
	?>
	<div class="card-base">
		<p class="text-sm font-semibold uppercase tracking-wide text-brand-orange"><?php esc_html_e( 'Instruksi Transfer Manual', 'lazismu-donation' ); ?></p>
		<h2 class="mt-3 text-2xl font-bold text-brand-dark"><?php echo esc_html( $item->donation_code ); ?></h2>
		<p class="mt-4 text-slate-600"><?php esc_html_e( 'Silakan transfer sesuai nominal berikut dan konfirmasi ke admin LAZISMU DIY.', 'lazismu-donation' ); ?></p>
		<div class="mt-6 rounded-xl bg-orange-50 p-4">
			<p class="text-sm text-slate-600"><?php esc_html_e( 'Nominal', 'lazismu-donation' ); ?></p>
			<p class="text-3xl font-bold text-brand-dark">Rp <?php echo esc_html( number_format_i18n( (float) $item->amount, 0 ) ); ?></p>
		</div>
		<div class="mt-6 space-y-2 text-sm text-slate-700">
			<p><strong><?php esc_html_e( 'Metode:', 'lazismu-donation' ); ?></strong> <?php esc_html_e( 'Transfer manual', 'lazismu-donation' ); ?></p>
			<p><strong><?php esc_html_e( 'Status:', 'lazismu-donation' ); ?></strong> <?php echo esc_html( $item->status ); ?></p>
			<p><?php esc_html_e( 'Data rekening resmi akan disesuaikan setelah konsolidasi rekening LAZISMU DIY.', 'lazismu-donation' ); ?></p>
		</div>
	</div>
	<?php
	return ob_get_clean();
}
