<?php
/**
 * Donation admin.
 *
 * @package Lazismu_Donation
 */

defined( 'ABSPATH' ) || exit;

add_action( 'admin_menu', 'lazismu_donation_admin_menu' );
add_action( 'admin_post_lazismu_update_donation_status', 'lazismu_donation_update_status' );

function lazismu_donation_admin_menu() {
	add_menu_page(
		__( 'Donations', 'lazismu-donation' ),
		__( 'Donations', 'lazismu-donation' ),
		'manage_options',
		'lazismu-donations',
		'lazismu_donation_admin_page',
		'dashicons-money-alt',
		26
	);
}

function lazismu_donation_admin_page() {
	global $wpdb;

	$items = $wpdb->get_results( "SELECT * FROM " . lazismu_donation_table() . " ORDER BY created_at DESC LIMIT 100" );
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Donations', 'lazismu-donation' ); ?></h1>
		<table class="widefat striped">
			<thead>
				<tr>
					<th><?php esc_html_e( 'Code', 'lazismu-donation' ); ?></th>
					<th><?php esc_html_e( 'Donor', 'lazismu-donation' ); ?></th>
					<th><?php esc_html_e( 'Type', 'lazismu-donation' ); ?></th>
					<th><?php esc_html_e( 'Amount', 'lazismu-donation' ); ?></th>
					<th><?php esc_html_e( 'Status', 'lazismu-donation' ); ?></th>
					<th><?php esc_html_e( 'Created', 'lazismu-donation' ); ?></th>
					<th><?php esc_html_e( 'Action', 'lazismu-donation' ); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ( $items as $item ) : ?>
					<tr>
						<td><?php echo esc_html( $item->donation_code ); ?></td>
						<td><?php echo esc_html( $item->donor_name ); ?></td>
						<td><?php echo esc_html( $item->donation_type ); ?></td>
						<td><?php echo esc_html( number_format_i18n( (float) $item->amount, 0 ) ); ?></td>
						<td><?php echo esc_html( $item->status ); ?></td>
						<td><?php echo esc_html( $item->created_at ); ?></td>
						<td>
							<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
								<input type="hidden" name="action" value="lazismu_update_donation_status">
								<input type="hidden" name="donation_id" value="<?php echo esc_attr( $item->id ); ?>">
								<?php wp_nonce_field( 'lazismu_update_donation_status_' . $item->id ); ?>
								<select name="status">
									<?php foreach ( array( 'pending', 'paid', 'failed', 'expired', 'cancelled' ) as $status ) : ?>
										<option value="<?php echo esc_attr( $status ); ?>" <?php selected( $item->status, $status ); ?>><?php echo esc_html( $status ); ?></option>
									<?php endforeach; ?>
								</select>
								<button class="button" type="submit"><?php esc_html_e( 'Update', 'lazismu-donation' ); ?></button>
							</form>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<?php
}

function lazismu_donation_update_status() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( esc_html__( 'Unauthorized.', 'lazismu-donation' ) );
	}

	$donation_id = isset( $_POST['donation_id'] ) ? absint( $_POST['donation_id'] ) : 0;

	check_admin_referer( 'lazismu_update_donation_status_' . $donation_id );

	$status  = sanitize_key( wp_unslash( $_POST['status'] ?? 'pending' ) );
	$allowed = array( 'pending', 'paid', 'failed', 'expired', 'cancelled' );

	if ( ! in_array( $status, $allowed, true ) ) {
		wp_die( esc_html__( 'Invalid status.', 'lazismu-donation' ) );
	}

	global $wpdb;

	$data = array(
		'status'     => $status,
		'updated_at' => current_time( 'mysql' ),
	);

	if ( 'paid' === $status ) {
		$data['paid_at'] = current_time( 'mysql' );
	}

	$wpdb->update( lazismu_donation_table(), $data, array( 'id' => $donation_id ) );

	wp_safe_redirect( admin_url( 'admin.php?page=lazismu-donations' ) );
	exit;
}
