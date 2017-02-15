<?php
/**
 * The template for displaying search results pages.
 *
 * @package Babysitter
 */

get_header(); ?>


<?php global $babysitter_data;
	
	$content_class = '';
	$sidebar_class = '';

	$blog_sidebar = $babysitter_data['opt-blog-sidebar']; 
	switch ($blog_sidebar) {
		case '1':
			$content_class = 'col-md-8';
			$sidebar_class = 'col-md-4';
			break;
		case '2':
			$content_class = 'col-md-8 col-md-push-4';
			$sidebar_class = 'col-md-4 col-md-pull-8';
			break;
		case '3':
			$content_class = 'col-md-12';
			break;
	}

?>


<div id="primary" class="page-content">
	<div class="container">
		<div class="row">
			<main id="main" class="content <?php echo $content_class; ?>" role="main">

				<?php if ( have_posts() ) : ?>

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Format name) and that will be used instead.
						*/
						get_template_part( 'content', 'search' );
					?>

					<?php endwhile; ?>

					<?php // babysitter_pagination(); ?>

				<?php else : ?>

					<?php get_template_part( 'content', 'none' ); ?>

				<?php endif; ?>

			</main><!-- #main -->

			<?php if( $blog_sidebar != 3) : ?>

			<hr class="visible-sm visible-xs lg">

			<div id="sidebar" class="sidebar <?php echo $sidebar_class; ?>">
				<?php get_sidebar(); ?>
			</div>

			<?php endif; ?>
		</div>
	</div>	
</div><!-- #primary -->
<?php get_footer(); ?>