<?php
/**
 * Zakat calculator shortcode.
 *
 * @package Lazismu_Zakat
 */

defined( 'ABSPATH' ) || exit;

add_shortcode( 'lazismu_zakat_calculator', 'lazismu_zakat_calculator_shortcode' );

function lazismu_zakat_calculator_shortcode() {
	$type   = isset( $_GET['zakat_type'] ) ? sanitize_key( wp_unslash( $_GET['zakat_type'] ) ) : 'penghasilan';
	$result = lazismu_zakat_calculate_from_request( $type );

	ob_start();
	?>
	<div class="grid gap-6 lg:grid-cols-[1fr_0.8fr]">
		<form class="card-base space-y-4" method="get">
			<label class="block">
				<span class="mb-2 block text-sm font-semibold"><?php esc_html_e( 'Jenis Zakat', 'lazismu-zakat' ); ?></span>
				<select class="input-base" name="zakat_type">
					<option value="penghasilan" <?php selected( $type, 'penghasilan' ); ?>><?php esc_html_e( 'Zakat Penghasilan', 'lazismu-zakat' ); ?></option>
					<option value="maal" <?php selected( $type, 'maal' ); ?>><?php esc_html_e( 'Zakat Maal', 'lazismu-zakat' ); ?></option>
				</select>
			</label>

			<label class="block">
				<span class="mb-2 block text-sm font-semibold"><?php esc_html_e( 'Penghasilan / Total Harta', 'lazismu-zakat' ); ?></span>
				<input class="input-base" type="number" name="zakat_base" min="0" step="1000" value="<?php echo esc_attr( lazismu_zakat_request_amount( 'zakat_base' ) ); ?>">
			</label>

			<label class="block">
				<span class="mb-2 block text-sm font-semibold"><?php esc_html_e( 'Pengurang / Kebutuhan Pokok / Utang', 'lazismu-zakat' ); ?></span>
				<input class="input-base" type="number" name="zakat_deduction" min="0" step="1000" value="<?php echo esc_attr( lazismu_zakat_request_amount( 'zakat_deduction' ) ); ?>">
			</label>

			<button class="btn-primary w-full" type="submit"><?php esc_html_e( 'Hitung Zakat', 'lazismu-zakat' ); ?></button>
		</form>

		<div class="card-base">
			<p class="text-sm font-semibold uppercase tracking-wide text-brand-orange"><?php esc_html_e( 'Hasil Perhitungan', 'lazismu-zakat' ); ?></p>
			<?php if ( $result ) : ?>
				<p class="mt-4 text-sm text-slate-600"><?php echo esc_html( $result['label'] ); ?></p>
				<p class="mt-3 text-3xl font-bold text-brand-dark">Rp <?php echo esc_html( number_format_i18n( $result['zakat'], 0 ) ); ?></p>
				<p class="mt-4 text-sm text-slate-600"><?php echo esc_html( $result['note'] ); ?></p>
				<?php if ( $result['zakat'] > 0 ) : ?>
					<a class="btn-primary mt-6 w-full" href="<?php echo esc_url( add_query_arg( array( 'type' => 'zakat', 'amount' => $result['zakat'] ), home_url( '/donasi/' ) ) ); ?>"><?php esc_html_e( 'Lanjut Bayar Zakat', 'lazismu-zakat' ); ?></a>
				<?php endif; ?>
			<?php else : ?>
				<p class="mt-4 text-sm text-slate-600"><?php esc_html_e( 'Isi data untuk melihat estimasi zakat.', 'lazismu-zakat' ); ?></p>
			<?php endif; ?>
		</div>
	</div>
	<?php
	return ob_get_clean();
}

function lazismu_zakat_request_amount( $key ) {
	return isset( $_GET[ $key ] ) ? absint( wp_unslash( $_GET[ $key ] ) ) : 0;
}

function lazismu_zakat_calculate_from_request( $type ) {
	$base      = lazismu_zakat_request_amount( 'zakat_base' );
	$deduction = lazismu_zakat_request_amount( 'zakat_deduction' );

	if ( 0 === $base ) {
		return null;
	}

	$net = max( 0, $base - $deduction );

	if ( 'maal' === $type ) {
		$nisab = lazismu_zakat_maal_nisab();
		$zakat = $net >= $nisab ? $net * 0.025 : 0;

		return array(
			'label' => __( 'Estimasi zakat maal', 'lazismu-zakat' ),
			'zakat' => (int) round( $zakat ),
			'note'  => sprintf( __( 'Nisab maal: Rp %s.', 'lazismu-zakat' ), number_format_i18n( $nisab, 0 ) ),
		);
	}

	$nisab = lazismu_zakat_income_nisab();
	$zakat = $net >= $nisab ? $net * 0.025 : 0;

	return array(
		'label' => __( 'Estimasi zakat penghasilan', 'lazismu-zakat' ),
		'zakat' => (int) round( $zakat ),
		'note'  => sprintf( __( 'Nisab penghasilan bulanan: Rp %s.', 'lazismu-zakat' ), number_format_i18n( $nisab, 0 ) ),
	);
}
