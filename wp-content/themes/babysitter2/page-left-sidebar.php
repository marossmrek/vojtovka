<?php
/* Template Name: Left Sidebar */

/**
 * The template for displaying page with left sidebar.
 *
 * @package Babysitter
 */

get_header(); ?>

<div class="page-content">
	<div class="container">
		<div class="row">
			<!-- Content -->
			<div id="content" class="col-md-8 col-md-push-4">
				
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class('page'); ?>>
					<div id="page-content">
						<?php get_template_part( 'content', 'page' ); ?>
					</div>					
				</div>
			  <?php endwhile; ?>
		
			</div>
			<!-- /Content -->
		
			<!-- Sidebar -->
			<div id="sidebar" class="sidebar col-md-4 col-md-pull-8">
				<?php dynamic_sidebar(); ?>
			</div>
			<!-- /Sidebar -->
		</div>
	</div>
</div>

<?php get_footer(); ?>