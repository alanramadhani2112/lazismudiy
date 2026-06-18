<?php
/**
 * Article card.
 *
 * @package Lazismu_DIY
 */

defined( 'ABSPATH' ) || exit;

$post_id = $args['post_id'] ?? get_the_ID();
?>
<article class="card-base">
	<p class="text-sm text-slate-500"><?php echo esc_html( get_the_date( '', $post_id ) ); ?></p>
	<h2 class="mt-3 text-lg font-bold text-brand-dark">
		<a href="<?php echo esc_url( get_permalink( $post_id ) ); ?>"><?php echo esc_html( get_the_title( $post_id ) ); ?></a>
	</h2>
	<p class="mt-3 text-sm leading-6 text-slate-600"><?php echo esc_html( wp_trim_words( get_the_excerpt( $post_id ), 20 ) ); ?></p>
	<a class="mt-5 inline-flex text-sm font-semibold text-brand-orange" href="<?php echo esc_url( get_permalink( $post_id ) ); ?>"><?php esc_html_e( 'Baca Selengkapnya', 'lazismu-diy' ); ?></a>
</article>
