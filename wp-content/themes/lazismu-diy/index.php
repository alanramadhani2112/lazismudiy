<?php
/**
 * Main template.
 *
 * @package Lazismu_DIY
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="primary" class="site-main">
	<section class="bg-white">
		<div class="container-site grid gap-10 py-16 lg:grid-cols-2 lg:items-center lg:py-24">
			<div>
				<p class="text-sm font-semibold uppercase tracking-wide text-brand-orange"><?php esc_html_e( 'LAZISMU D.I. Yogyakarta', 'lazismu-diy' ); ?></p>
				<h1 class="mt-4 text-4xl font-bold tracking-tight text-brand-dark sm:text-5xl">
					<?php esc_html_e( 'Tunaikan Zakat dan Sedekah untuk Kebaikan di Yogyakarta', 'lazismu-diy' ); ?>
				</h1>
				<p class="mt-5 text-lg leading-8 text-slate-600">
					<?php esc_html_e( 'Website resmi untuk program, donasi, zakat, laporan, dan informasi LAZISMU DIY.', 'lazismu-diy' ); ?>
				</p>
				<div class="mt-8 flex flex-col gap-3 sm:flex-row">
					<a class="btn-primary" href="#zakat"><?php esc_html_e( 'Bayar Zakat', 'lazismu-diy' ); ?></a>
					<a class="btn-secondary" href="#program"><?php esc_html_e( 'Lihat Program', 'lazismu-diy' ); ?></a>
				</div>
			</div>
			<div class="card-base bg-gradient-to-br from-orange-50 to-yellow-50">
				<p class="text-sm font-semibold text-brand-orange"><?php esc_html_e( 'Quick Action', 'lazismu-diy' ); ?></p>
				<div class="mt-5 grid gap-3 sm:grid-cols-2">
					<a class="card-base p-4 hover:border-brand-orange" href="#zakat"><?php esc_html_e( 'Zakat Penghasilan', 'lazismu-diy' ); ?></a>
					<a class="card-base p-4 hover:border-brand-orange" href="#donasi"><?php esc_html_e( 'Infak/Sedekah', 'lazismu-diy' ); ?></a>
					<a class="card-base p-4 hover:border-brand-orange" href="#program"><?php esc_html_e( 'Program Kemanusiaan', 'lazismu-diy' ); ?></a>
					<a class="card-base p-4 hover:border-brand-orange" href="#kontak"><?php esc_html_e( 'Konsultasi WhatsApp', 'lazismu-diy' ); ?></a>
				</div>
			</div>
		</div>
	</section>
</main>
<?php
get_footer();
