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
					<p class="mt-3 text-sm leading-6 text-slate-600"><?php esc_html_e( 'Bantu perluas manfaat melalui donasi terbaik Anda.', 'lazismu-diy' ); ?></p>
					<a class="btn-primary mt-6 w-full" href="#donasi"><?php esc_html_e( 'Donasi Sekarang', 'lazismu-diy' ); ?></a>
				</div>
			</aside>
		</div>
	<?php endwhile; ?>
</main>
<?php
get_footer();
