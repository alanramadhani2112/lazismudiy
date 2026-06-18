<?php
/**
 * Template Name: Kontak LAZISMU
 *
 * @package Lazismu_DIY
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main class="container-site py-12">
	<?php while ( have_posts() ) : the_post(); ?>
		<header class="max-w-3xl">
			<p class="text-sm font-semibold uppercase tracking-wide text-brand-orange"><?php esc_html_e( 'Kontak', 'lazismu-diy' ); ?></p>
			<h1 class="mt-2 text-4xl font-bold text-brand-dark"><?php the_title(); ?></h1>
		</header>
		<div class="mt-8 grid gap-6 lg:grid-cols-3">
			<div class="card-base">
				<h2 class="text-lg font-bold text-brand-dark"><?php esc_html_e( 'WhatsApp', 'lazismu-diy' ); ?></h2>
				<p class="mt-3 text-sm text-slate-600"><?php esc_html_e( 'Hubungi admin LAZISMU DIY untuk konsultasi zakat dan donasi.', 'lazismu-diy' ); ?></p>
			</div>
			<div class="card-base">
				<h2 class="text-lg font-bold text-brand-dark"><?php esc_html_e( 'Alamat', 'lazismu-diy' ); ?></h2>
				<p class="mt-3 text-sm text-slate-600"><?php esc_html_e( 'LAZISMU D.I. Yogyakarta', 'lazismu-diy' ); ?></p>
			</div>
			<div class="card-base">
				<h2 class="text-lg font-bold text-brand-dark"><?php esc_html_e( 'Rekening Donasi', 'lazismu-diy' ); ?></h2>
				<p class="mt-3 text-sm text-slate-600"><?php esc_html_e( 'Data rekening resmi akan dikonsolidasikan pada tahap migrasi.', 'lazismu-diy' ); ?></p>
			</div>
		</div>
		<article class="prose prose-slate mt-10 max-w-none"><?php the_content(); ?></article>
	<?php endwhile; ?>
</main>
<?php
get_footer();
