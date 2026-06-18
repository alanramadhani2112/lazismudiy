<?php
/**
 * Donation instruction page.
 *
 * @package Lazismu_DIY
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main class="container-site py-12">
	<div class="mx-auto max-w-2xl">
		<?php echo do_shortcode( '[lazismu_donation_instruction]' ); ?>
	</div>
</main>
<?php
get_footer();
