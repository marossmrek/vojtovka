<?php
/**
 * Job Archives
 *
 * @package Babysitter
 * @since Babysitter 2.0.0
 */

get_header(); ?>

	<div class="page-content">
		<div class="container">
			<?php echo do_shortcode( '[jobs]' ); ?>
		</div>
	</div>

<?php get_footer(); ?>