<?php
/**
 * Template Name: Profil LAZISMU
 *
 * @package Lazismu_DIY
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main class="container-site py-12">
	<?php while ( have_posts() ) : the_post(); ?>
		<section class="grid gap-10 lg:grid-cols-[0.8fr_1.2fr] lg:items-start">
			<div class="card-base">
				<p class="text-sm font-semibold uppercase tracking-wide text-brand-orange"><?php esc_html_e( 'Profil Lembaga', 'lazismu-diy' ); ?></p>
				<h1 class="mt-3 text-4xl font-bold text-brand-dark"><?php the_title(); ?></h1>
				<p class="mt-4 text-sm leading-6 text-slate-600"><?php esc_html_e( 'LAZISMU DIY adalah lembaga amil zakat resmi yang bergerak dalam penghimpunan dan penyaluran zakat, infak, sedekah, dan dana sosial keagamaan lainnya.', 'lazismu-diy' ); ?></p>
			</div>
			<article class="prose prose-slate max-w-none"><?php the_content(); ?></article>
		</section>
	<?php endwhile; ?>
</main>
<?php
get_footer();
