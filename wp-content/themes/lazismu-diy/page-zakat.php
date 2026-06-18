<?php
/**
 * Zakat page.
 *
 * @package Lazismu_DIY
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main class="container-site py-12">
	<section class="mb-10 max-w-3xl">
		<p class="text-sm font-semibold uppercase tracking-wide text-brand-orange"><?php esc_html_e( 'Kalkulator Zakat', 'lazismu-diy' ); ?></p>
		<h1 class="mt-2 text-4xl font-bold text-brand-dark"><?php esc_html_e( 'Hitung Zakat Anda', 'lazismu-diy' ); ?></h1>
		<p class="mt-5 text-lg leading-8 text-slate-600"><?php esc_html_e( 'Hitung estimasi zakat penghasilan atau zakat maal, lalu lanjutkan ke form pembayaran zakat.', 'lazismu-diy' ); ?></p>
	</section>
	<?php echo do_shortcode( '[lazismu_zakat_calculator]' ); ?>
</main>
<?php
get_footer();
