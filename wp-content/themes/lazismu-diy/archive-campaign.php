<?php
/**
 * Campaign archive.
 *
 * @package Lazismu_DIY
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main class="container-site py-12">
	<header class="max-w-3xl">
		<p class="text-sm font-semibold uppercase tracking-wide text-brand-orange"><?php esc_html_e( 'Campaign', 'lazismu-diy' ); ?></p>
		<h1 class="mt-2 text-4xl font-bold text-brand-dark"><?php post_type_archive_title(); ?></h1>
	</header>
	<div class="mt-8 grid gap-6 md:grid-cols-3">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/components/campaign-card', null, array( 'post_id' => get_the_ID() ) ); ?>
			<?php endwhile; ?>
		<?php else : ?>
			<p><?php esc_html_e( 'Belum ada campaign.', 'lazismu-diy' ); ?></p>
		<?php endif; ?>
	</div>
	<div class="mt-10"><?php the_posts_pagination(); ?></div>
</main>
<?php
get_footer();
