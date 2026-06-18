<?php
/**
 * Single post.
 *
 * @package Lazismu_DIY
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main class="container-site py-12">
	<?php while ( have_posts() ) : the_post(); ?>
		<article class="mx-auto max-w-3xl">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( 'large', array( 'class' => 'mb-8 w-full rounded-3xl object-cover' ) ); ?>
			<?php endif; ?>
			<p class="text-sm text-slate-500"><?php echo esc_html( get_the_date() ); ?></p>
			<h1 class="mt-3 text-4xl font-bold text-brand-dark"><?php the_title(); ?></h1>
			<div class="prose prose-slate mt-8 max-w-none"><?php the_content(); ?></div>
		</article>
	<?php endwhile; ?>
</main>
<?php
get_footer();
