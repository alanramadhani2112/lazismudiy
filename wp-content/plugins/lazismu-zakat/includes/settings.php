<?php
/**
 * Zakat settings.
 *
 * @package Lazismu_Zakat
 */

defined( 'ABSPATH' ) || exit;

add_action( 'admin_menu', 'lazismu_zakat_settings_menu' );
add_action( 'admin_init', 'lazismu_zakat_register_settings' );

function lazismu_zakat_settings_menu() {
	add_options_page(
		__( 'Zakat Settings', 'lazismu-zakat' ),
		__( 'Zakat Settings', 'lazismu-zakat' ),
		'manage_options',
		'lazismu-zakat-settings',
		'lazismu_zakat_settings_page'
	);
}

function lazismu_zakat_register_settings() {
	register_setting( 'lazismu_zakat_settings', 'lazismu_zakat_gold_price', array( 'sanitize_callback' => 'absint' ) );
	register_setting( 'lazismu_zakat_settings', 'lazismu_zakat_income_nisab', array( 'sanitize_callback' => 'absint' ) );
}

function lazismu_zakat_gold_price() {
	return absint( get_option( 'lazismu_zakat_gold_price', 1500000 ) );
}

function lazismu_zakat_income_nisab() {
	return absint( get_option( 'lazismu_zakat_income_nisab', 6859394 ) );
}

function lazismu_zakat_maal_nisab() {
	return lazismu_zakat_gold_price() * 85;
}

function lazismu_zakat_settings_page() {
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Zakat Settings', 'lazismu-zakat' ); ?></h1>
		<form method="post" action="options.php">
			<?php settings_fields( 'lazismu_zakat_settings' ); ?>
			<table class="form-table" role="presentation">
				<tr>
					<th scope="row"><label for="lazismu_zakat_gold_price"><?php esc_html_e( 'Harga emas per gram', 'lazismu-zakat' ); ?></label></th>
					<td><input class="regular-text" type="number" id="lazismu_zakat_gold_price" name="lazismu_zakat_gold_price" value="<?php echo esc_attr( lazismu_zakat_gold_price() ); ?>"></td>
				</tr>
				<tr>
					<th scope="row"><label for="lazismu_zakat_income_nisab"><?php esc_html_e( 'Nisab zakat penghasilan bulanan', 'lazismu-zakat' ); ?></label></th>
					<td><input class="regular-text" type="number" id="lazismu_zakat_income_nisab" name="lazismu_zakat_income_nisab" value="<?php echo esc_attr( lazismu_zakat_income_nisab() ); ?>"></td>
				</tr>
			</table>
			<?php submit_button(); ?>
		</form>
	</div>
	<?php
}
