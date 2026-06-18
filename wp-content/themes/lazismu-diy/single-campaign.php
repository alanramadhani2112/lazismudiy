<?php
/**
 * Single campaign.
 *
 * @package Lazismu_DIY
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main class="container-site py-12">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php
		$target    = (int) get_post_meta( get_the_ID(), '_lazismu_target_amount', true );
		$collected = (int) get_post_meta( get_the_ID(), '_lazismu_collected_amount', true );
		$donors    = (int) get_post_meta( get_the_ID(), '_lazismu_donor_count', true );
		$progress  = $target > 0 ? min( 100, round( ( $collected / $target ) * 100 ) ) : 0;
		?>
		<div class="grid gap-10 lg:grid-cols-[1fr_360px]">
			<article>
				<?php if ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail( 'large', array( 'class' => 'mb-8 w-full rounded-3xl object-cover' ) ); ?>
				<?php endif; ?>
				<h1 class="text-4xl font-bold text-brand-dark"><?php the_title(); ?></h1>
				<div class="prose prose-slate mt-6 max-w-none"><?php the_content(); ?></div>
			</article>
			<aside class="lg:sticky lg:top-24 lg:self-start">
				<div class="card-base">
					<p class="text-sm font-semibold uppercase tracking-wide text-brand-orange"><?php esc_html_e( 'Campaign Donasi', 'lazismu-diy' ); ?></p>
					<h2 class="mt-3 text-2xl font-bold text-brand-dark"><?php esc_html_e( 'Dukung Program Ini', 'lazismu-diy' ); ?></h2>
					<?php if ( $target > 0 || $collected > 0 ) : ?>
						<div class="mt-5">
							<div class="h-3 overflow-hidden rounded-full bg-slate-200">
								<div class="h-full rounded-full bg-brand-orange" style="width: <?php echo esc_attr( $progress ); ?>%"></div>
							</div>
							<div class="mt-4 space-y-2 text-sm text-slate-700">
								<p><strong><?php esc_html_e( 'Terkumpul:', 'lazismu-diy' ); ?></strong> <?php echo esc_html( 'Rp ' . number_format_i18n( $collected, 0 ) ); ?></p>
								<p><strong><?php esc_html_e( 'Target:', 'lazismu-diy' ); ?></strong> <?php echo esc_html( 'Rp ' . number_format_i18n( $target, 0 ) ); ?></p>
								<p><strong><?php esc_html_e( 'Progress:', 'lazismu-diy' ); ?></strong> <?php echo esc_html( $progress . '%' ); ?></p>
								<?php if ( $donors > 0 ) : ?>
									<p><strong><?php esc_html_e( 'Donatur:', 'lazismu-diy' ); ?></strong> <?php echo esc_html( number_format_i18n( $donors ) ); ?></p>
								<?php endif; ?>
							</div>
						</div>
					<?php endif; ?>
					<a class="btn-primary mt-6 w-full" href="<?php echo esc_url( add_query_arg( array( 'type' => 'campaign' ), home_url( '/donasi/' ) ) ); ?>"><?php esc_html_e( 'Donasi Sekarang', 'lazismu-diy' ); ?></a>
				</div>
			</aside>
		</div>
	<?php endwhile; ?>
</main>
<?php
get_footer();
