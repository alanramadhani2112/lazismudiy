<?php
/**
 * Donation form.
 *
 * @package Lazismu_Donation
 */

defined( 'ABSPATH' ) || exit;

add_shortcode( 'lazismu_donation_form', 'lazismu_donation_form_shortcode' );
add_action( 'admin_post_nopriv_lazismu_submit_donation', 'lazismu_donation_handle_submit' );
add_action( 'admin_post_lazismu_submit_donation', 'lazismu_donation_handle_submit' );

function lazismu_donation_form_shortcode() {
	ob_start();
	?>
	<form class="card-base space-y-4" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
		<input type="hidden" name="action" value="lazismu_submit_donation">
		<?php wp_nonce_field( 'lazismu_submit_donation', 'lazismu_donation_nonce' ); ?>

		<label class="block">
			<span class="mb-2 block text-sm font-semibold"><?php esc_html_e( 'Jenis Donasi', 'lazismu-donation' ); ?></span>
			<select class="input-base" name="donation_type" required>
				<option value="zakat"><?php esc_html_e( 'Zakat', 'lazismu-donation' ); ?></option>
				<option value="infak"><?php esc_html_e( 'Infak', 'lazismu-donation' ); ?></option>
				<option value="sedekah"><?php esc_html_e( 'Sedekah', 'lazismu-donation' ); ?></option>
				<option value="wakaf"><?php esc_html_e( 'Wakaf', 'lazismu-donation' ); ?></option>
				<option value="campaign"><?php esc_html_e( 'Campaign', 'lazismu-donation' ); ?></option>
			</select>
		</label>

		<label class="block">
			<span class="mb-2 block text-sm font-semibold"><?php esc_html_e( 'Nominal', 'lazismu-donation' ); ?></span>
			<input class="input-base" type="number" name="amount" min="1000" step="1000" required>
		</label>

		<label class="block">
			<span class="mb-2 block text-sm font-semibold"><?php esc_html_e( 'Nama', 'lazismu-donation' ); ?></span>
			<input class="input-base" type="text" name="donor_name" required>
		</label>

		<label class="block">
			<span class="mb-2 block text-sm font-semibold"><?php esc_html_e( 'Email', 'lazismu-donation' ); ?></span>
			<input class="input-base" type="email" name="donor_email">
		</label>

		<label class="block">
			<span class="mb-2 block text-sm font-semibold"><?php esc_html_e( 'Nomor HP', 'lazismu-donation' ); ?></span>
			<input class="input-base" type="text" name="donor_phone">
		</label>

		<label class="flex items-center gap-2 text-sm">
			<input type="checkbox" name="is_anonymous" value="1">
			<span><?php esc_html_e( 'Tampilkan sebagai anonim', 'lazismu-donation' ); ?></span>
		</label>

		<label class="block">
			<span class="mb-2 block text-sm font-semibold"><?php esc_html_e( 'Pesan/Doa', 'lazismu-donation' ); ?></span>
			<textarea class="input-base" name="message" rows="3"></textarea>
		</label>

		<input type="hidden" name="payment_method" value="manual_transfer">
		<button class="btn-primary w-full" type="submit"><?php esc_html_e( 'Lanjut Transfer Manual', 'lazismu-donation' ); ?></button>
	</form>
	<?php
	return ob_get_clean();
}

function lazismu_donation_handle_submit() {
	if ( ! isset( $_POST['lazismu_donation_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['lazismu_donation_nonce'] ) ), 'lazismu_submit_donation' ) ) {
		wp_die( esc_html__( 'Invalid request.', 'lazismu-donation' ) );
	}

	$amount = isset( $_POST['amount'] ) ? (float) $_POST['amount'] : 0;

	if ( $amount < 1000 ) {
		wp_die( esc_html__( 'Nominal donasi tidak valid.', 'lazismu-donation' ) );
	}

	global $wpdb;

	$now  = current_time( 'mysql' );
	$code = 'LZM-' . gmdate( 'YmdHis' ) . '-' . wp_rand( 1000, 9999 );

	$wpdb->insert(
		lazismu_donation_table(),
		array(
			'donation_code'  => $code,
			'donor_name'     => sanitize_text_field( wp_unslash( $_POST['donor_name'] ?? '' ) ),
			'donor_email'    => sanitize_email( wp_unslash( $_POST['donor_email'] ?? '' ) ),
			'donor_phone'    => sanitize_text_field( wp_unslash( $_POST['donor_phone'] ?? '' ) ),
			'is_anonymous'   => isset( $_POST['is_anonymous'] ) ? 1 : 0,
			'donation_type'  => sanitize_key( wp_unslash( $_POST['donation_type'] ?? 'infak' ) ),
			'amount'         => $amount,
			'payment_method' => 'manual_transfer',
			'status'         => 'pending',
			'message'        => sanitize_textarea_field( wp_unslash( $_POST['message'] ?? '' ) ),
			'created_at'     => $now,
			'updated_at'     => $now,
		),
		array( '%s', '%s', '%s', '%s', '%d', '%s', '%f', '%s', '%s', '%s', '%s', '%s' )
	);

	$donation_id = (int) $wpdb->insert_id;

	$wpdb->insert(
		lazismu_donation_log_table(),
		array(
			'donation_id' => $donation_id,
			'event_type'  => 'created',
			'payload'     => wp_json_encode( array( 'code' => $code ) ),
			'created_at'  => $now,
		),
		array( '%d', '%s', '%s', '%s' )
	);

	$instruction_page = get_page_by_path( 'donasi-instruksi' );
	$instruction_url  = $instruction_page ? get_permalink( $instruction_page ) : home_url( '/donasi-instruksi/' );

	wp_safe_redirect( add_query_arg( 'donation_code', rawurlencode( $code ), $instruction_url ) );
	exit;
}
