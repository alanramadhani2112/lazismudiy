<?php
/**
 * Footer template.
 *
 * @package Lazismu_DIY
 */

defined( 'ABSPATH' ) || exit;
?>
<footer class="mt-16 bg-brand-dark text-white">
	<div class="container-site grid gap-8 py-10 md:grid-cols-3">
		<div>
			<p class="text-lg font-bold"><?php bloginfo( 'name' ); ?></p>
			<p class="mt-3 text-sm text-slate-300"><?php bloginfo( 'description' ); ?></p>
		</div>
		<div>
			<p class="font-semibold"><?php esc_html_e( 'Navigasi', 'lazismu-diy' ); ?></p>
			<?php wp_nav_menu( array( 'theme_location' => 'footer', 'fallback_cb' => false, 'container' => false, 'menu_class' => 'mt-3 space-y-2 text-sm text-slate-300' ) ); ?>
		</div>
		<div>
			<p class="font-semibold"><?php esc_html_e( 'Kontak', 'lazismu-diy' ); ?></p>
			<p class="mt-3 text-sm text-slate-300">LAZISMU D.I. Yogyakarta</p>
		</div>
	</div>
	<div class="border-t border-white/10 py-4 text-center text-sm text-slate-400">
		&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
