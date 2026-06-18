<?php
/**
 * Front page.
 *
 * @package Lazismu_DIY
 */

defined( 'ABSPATH' ) || exit;

get_header();

$campaigns = new WP_Query(
	array(
		'post_type'      => 'campaign',
		'posts_per_page' => 3,
	)
);
$reports = new WP_Query(
	array(
		'post_type'      => 'report',
		'posts_per_page' => 3,
	)
);
$posts = new WP_Query(
	array(
		'post_type'      => 'post',
		'posts_per_page' => 3,
	)
);
?>
<main id="primary">
	<section class="bg-white">
		<div class="container-site grid gap-10 py-16 lg:grid-cols-2 lg:items-center lg:py-24">
			<div>
				<p class="text-sm font-semibold uppercase tracking-wide text-brand-orange"><?php esc_html_e( 'LAZISMU D.I. Yogyakarta', 'lazismu-diy' ); ?></p>
				<h1 class="mt-4 text-4xl font-bold tracking-tight text-brand-dark sm:text-5xl"><?php esc_html_e( 'Tunaikan Zakat dan Sedekah untuk Kebaikan di Yogyakarta', 'lazismu-diy' ); ?></h1>
				<p class="mt-5 text-lg leading-8 text-slate-600"><?php esc_html_e( 'Kanal resmi program, donasi, zakat, laporan, dan informasi LAZISMU DIY.', 'lazismu-diy' ); ?></p>
				<div class="mt-8 flex flex-col gap-3 sm:flex-row">
					<a class="btn-primary" href="<?php echo esc_url( home_url( '/donasi/' ) ); ?>"><?php esc_html_e( 'Donasi Sekarang', 'lazismu-diy' ); ?></a>
					<a class="btn-secondary" href="<?php echo esc_url( home_url( '/laporan/' ) ); ?>"><?php esc_html_e( 'Lihat Laporan', 'lazismu-diy' ); ?></a>
				</div>
			</div>
			<div class="card-base bg-gradient-to-br from-orange-50 to-yellow-50">
				<p class="text-sm font-semibold text-brand-orange"><?php esc_html_e( 'Quick Action', 'lazismu-diy' ); ?></p>
				<div class="mt-5 grid gap-3 sm:grid-cols-2">
					<a class="card-base p-4 hover:border-brand-orange" href="<?php echo esc_url( home_url( '/zakat/' ) ); ?>"><?php esc_html_e( 'Zakat Penghasilan', 'lazismu-diy' ); ?></a>
					<a class="card-base p-4 hover:border-brand-orange" href="<?php echo esc_url( home_url( '/campaign/' ) ); ?>"><?php esc_html_e( 'Infak/Sedekah', 'lazismu-diy' ); ?></a>
					<a class="card-base p-4 hover:border-brand-orange" href="<?php echo esc_url( home_url( '/program/' ) ); ?>"><?php esc_html_e( 'Program Kemanusiaan', 'lazismu-diy' ); ?></a>
					<a class="card-base p-4 hover:border-brand-orange" href="<?php echo esc_url( home_url( '/kontak/' ) ); ?>"><?php esc_html_e( 'Konsultasi WhatsApp', 'lazismu-diy' ); ?></a>
				</div>
			</div>
		</div>
	</section>

	<section class="container-site py-14" id="program">
		<div class="flex items-end justify-between gap-4">
			<div>
				<p class="text-sm font-semibold uppercase tracking-wide text-brand-orange"><?php esc_html_e( 'Program Pilihan', 'lazismu-diy' ); ?></p>
				<h2 class="mt-2 text-3xl font-bold text-brand-dark"><?php esc_html_e( 'Campaign Donasi', 'lazismu-diy' ); ?></h2>
			</div>
			<a class="hidden text-sm font-semibold text-brand-orange sm:block" href="<?php echo esc_url( home_url( '/campaign/' ) ); ?>"><?php esc_html_e( 'Lihat Semua', 'lazismu-diy' ); ?></a>
		</div>
		<div class="mt-8 grid gap-6 md:grid-cols-3">
			<?php while ( $campaigns->have_posts() ) : $campaigns->the_post(); ?>
				<?php get_template_part( 'template-parts/components/campaign-card', null, array( 'post_id' => get_the_ID() ) ); ?>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</section>

	<section class="container-site py-14">
		<h2 class="text-3xl font-bold text-brand-dark"><?php esc_html_e( 'Laporan Terbaru', 'lazismu-diy' ); ?></h2>
		<div class="mt-8 grid gap-6 md:grid-cols-3">
			<?php while ( $reports->have_posts() ) : $reports->the_post(); ?>
				<?php get_template_part( 'template-parts/components/report-card', null, array( 'post_id' => get_the_ID() ) ); ?>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</section>

	<section class="container-site py-14">
		<h2 class="text-3xl font-bold text-brand-dark"><?php esc_html_e( 'Berita & Edukasi', 'lazismu-diy' ); ?></h2>
		<div class="mt-8 grid gap-6 md:grid-cols-3">
			<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
				<?php get_template_part( 'template-parts/components/article-card', null, array( 'post_id' => get_the_ID() ) ); ?>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</section>
</main>
<?php
get_footer();
