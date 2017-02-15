<?php
/**
 * The template for displaying all single posts.
 *
 * @package Babysitter
 */

get_header(); ?>

<section id="primary" class="page-content">
	<div class="container">
		<div class="row">
			<main id="main" class="content col-md-12" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'resume-custom' ); ?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->
		</div>
	</div>	
</section><!-- #primary -->
<?php get_footer(); ?>