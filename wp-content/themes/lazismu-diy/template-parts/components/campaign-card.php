<?php
/**
 * Campaign card.
 *
 * @package Lazismu_DIY
 */

defined( 'ABSPATH' ) || exit;

$post_id = $args['post_id'] ?? get_the_ID();
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
		<a class="btn-primary mt-5" href="<?php echo esc_url( get_permalink( $post_id ) ); ?>"><?php esc_html_e( 'Donasi Sekarang', 'lazismu-diy' ); ?></a>
	</div>
</article>
