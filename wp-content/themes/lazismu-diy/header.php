<?php
/**
 * Header template.
 *
 * @package Lazismu_DIY
 */

defined( 'ABSPATH' ) || exit;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="sticky top-0 z-50 border-b border-slate-200 bg-white/95 backdrop-blur">
	<div class="container-site flex min-h-16 items-center justify-between gap-4 py-3">
		<a class="text-lg font-bold text-brand-dark" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<?php bloginfo( 'name' ); ?>
		</a>

		<button class="rounded-lg border border-slate-200 px-3 py-2 text-sm font-semibold text-slate-700 lg:hidden" type="button" data-menu-toggle aria-expanded="false" aria-controls="primary-menu">
			<?php esc_html_e( 'Menu', 'lazismu-diy' ); ?>
		</button>

		<nav id="primary-menu" class="hidden w-full lg:block lg:w-auto" data-menu aria-label="<?php esc_attr_e( 'Primary menu', 'lazismu-diy' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'fallback_cb'    => false,
					'container'      => false,
					'menu_class'     => 'flex flex-col gap-3 pt-4 text-sm font-medium text-slate-700 lg:flex-row lg:items-center lg:pt-0',
				)
			);
			?>
		</nav>

		<a class="btn-primary hidden lg:inline-flex" href="#donasi">
			<?php esc_html_e( 'Donasi', 'lazismu-diy' ); ?>
		</a>
	</div>
</header>
