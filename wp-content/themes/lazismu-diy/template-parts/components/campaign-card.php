<?php
/**
 * Campaign card.
 *
 * @package Lazismu_DIY
 */

defined( 'ABSPATH' ) || exit;

$post_id   = $args['post_id'] ?? get_the_ID();
$target    = (int) get_post_meta( $post_id, '_lazismu_target_amount', true );
$collected = (int) get_post_meta( $post_id, '_lazismu_collected_amount', true );
$donors    = (int) get_post_meta( $post_id, '_lazismu_donor_count', true );
$progress  = $target > 0 ? min( 100, round( ( $collected / $target ) * 100 ) ) : 0;
?>
<article class="card-base overflow-hidden p-0">
	<?php if ( has_post_thumbnail( $post_id ) ) : ?>
		<a href="<?php echo esc_url( get_permalink( $post_id ) ); ?>">
			<?php echo get_the_post_thumbnail( $post_id, 'medium_large', array( 'class' => 'h-48 w-full object-cover' ) ); ?>
		</a>
	<?php endif; ?>
	<div class="p-5">
		<h2 class="text-lg font-bold text-brand-dark">
			<a href="<?php echo esc_url( get_permalink( $post_id ) ); ?>"><?php echo esc_html( get_the_title( $post_id ) ); ?></a>
		</h2>
		<p class="mt-3 text-sm leading-6 text-slate-600"><?php echo esc_html( wp_trim_words( get_the_excerpt( $post_id ), 18 ) ); ?></p>

		<?php if ( $target > 0 || $collected > 0 ) : ?>
			<div class="mt-5">
				<div class="h-2 overflow-hidden rounded-full bg-slate-200">
					<div class="h-full rounded-full bg-brand-orange" style="width: <?php echo esc_attr( $progress ); ?>%"></div>
				</div>
				<div class="mt-3 flex justify-between gap-3 text-xs text-slate-600">
					<span><?php echo esc_html( 'Rp ' . number_format_i18n( $collected, 0 ) ); ?></span>
					<span><?php echo esc_html( $progress . '%' ); ?></span>
				</div>
				<?php if ( $donors > 0 ) : ?>
					<p class="mt-2 text-xs text-slate-500"><?php echo esc_html( sprintf( __( '%s donatur', 'lazismu-diy' ), number_format_i18n( $donors ) ) ); ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<a class="btn-primary mt-5" href="<?php echo esc_url( get_permalink( $post_id ) ); ?>"><?php esc_html_e( 'Donasi Sekarang', 'lazismu-diy' ); ?></a>
	</div>
</article>
