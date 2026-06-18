<?php
/**
 * Donation page.
 *
 * @package Lazismu_DIY
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main class="container-site py-12">
	<div class="grid gap-10 lg:grid-cols-[0.9fr_1.1fr] lg:items-start">
		<section>
			<p class="text-sm font-semibold uppercase tracking-wide text-brand-orange"><?php esc_html_e( 'Donasi & Zakat', 'lazismu-diy' ); ?></p>
			<h1 class="mt-2 text-4xl font-bold text-brand-dark"><?php esc_html_e( 'Tunaikan Kebaikan Anda', 'lazismu-diy' ); ?></h1>
			<p class="mt-5 text-lg leading-8 text-slate-600"><?php esc_html_e( 'Isi form donasi/zakat. Untuk MVP, pembayaran menggunakan transfer manual.', 'lazismu-diy' ); ?></p>
		</section>
		<section>
			<?php echo do_shortcode( '[lazismu_donation_form]' ); ?>
		</section>
	</div>
</main>
<?php
get_footer();
