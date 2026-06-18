<?php
/**
 * Report card.
 *
 * @package Lazismu_DIY
 */

defined( 'ABSPATH' ) || exit;

$post_id = $args['post_id'] ?? get_the_ID();
?>
<article class="card-base">
	<p class="text-sm font-semibold uppercase tracking-wide text-brand-orange"><?php esc_html_e( 'Laporan', 'lazismu-diy' ); ?></p>
	<h2 class="mt-3 text-lg font-bold text-brand-dark">
		<a href="<?php echo esc_url( get_permalink( $post_id ) ); ?>"><?php echo esc_html( get_the_title( $post_id ) ); ?></a>
	</h2>
	<p class="mt-3 text-sm leading-6 text-slate-600"><?php echo esc_html( wp_trim_words( get_the_excerpt( $post_id ), 20 ) ); ?></p>
	<a class="btn-secondary mt-5" href="<?php echo esc_url( get_permalink( $post_id ) ); ?>"><?php esc_html_e( 'Lihat Laporan', 'lazismu-diy' ); ?></a>
</article>
