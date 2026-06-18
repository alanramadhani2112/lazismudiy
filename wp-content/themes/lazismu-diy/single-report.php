<?php
/**
 * Single report.
 *
 * @package Lazismu_DIY
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main class="container-site py-12">
	<?php while ( have_posts() ) : the_post(); ?>
		<article class="mx-auto max-w-3xl">
			<p class="text-sm font-semibold uppercase tracking-wide text-brand-orange"><?php esc_html_e( 'Laporan', 'lazismu-diy' ); ?></p>
			<h1 class="mt-2 text-4xl font-bold text-brand-dark"><?php the_title(); ?></h1>
			<div class="prose prose-slate mt-8 max-w-none"><?php the_content(); ?></div>
		</article>
	<?php endwhile; ?>
</main>
<?php
get_footer();
