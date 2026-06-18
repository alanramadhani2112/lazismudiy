<?php
/**
 * Manual transfer instructions.
 *
 * @package Lazismu_Donation
 */

defined( 'ABSPATH' ) || exit;

add_shortcode( 'lazismu_donation_instruction', 'lazismu_donation_instruction_shortcode' );

function lazismu_donation_get_active_rekening() {
	if ( ! post_type_exists( 'rekening' ) ) {
		return array();
	}

	return get_posts(
		array(
			'post_type'      => 'rekening',
			'posts_per_page' => 5,
			'meta_key'       => '_lazismu_sort_order',
			'orderby'        => 'meta_value_num',
			'order'          => 'ASC',
			'meta_query'     => array(
				array(
					'key'   => '_lazismu_is_active',
					'value' => 1,
				),
			),
		)
	);
}

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
		</div>

		<?php $rekening = lazismu_donation_get_active_rekening(); ?>
		<?php if ( $rekening ) : ?>
			<div class="mt-6 space-y-3">
				<p class="font-semibold text-brand-dark"><?php esc_html_e( 'Rekening Tujuan', 'lazismu-donation' ); ?></p>
				<?php foreach ( $rekening as $account ) : ?>
					<div class="rounded-xl border border-slate-200 p-4 text-sm text-slate-700">
						<p class="font-semibold text-brand-dark"><?php echo esc_html( get_post_meta( $account->ID, '_lazismu_bank_name', true ) ); ?></p>
						<p><?php echo esc_html( get_post_meta( $account->ID, '_lazismu_account_number', true ) ); ?></p>
						<p><?php echo esc_html( get_post_meta( $account->ID, '_lazismu_account_name', true ) ); ?></p>
					</div>
				<?php endforeach; ?>
			</div>
		<?php else : ?>
			<p class="mt-6 text-sm text-slate-600"><?php esc_html_e( 'Data rekening resmi akan disesuaikan setelah konsolidasi rekening LAZISMU DIY.', 'lazismu-donation' ); ?></p>
		<?php endif; ?>
	</div>
	<?php
	return ob_get_clean();
}
