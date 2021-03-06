<?php
/**
 * content-video.php
 *
 * The default template for displaying posts with the Video post format.
 */

global $babysitter_data;

$image_size     = 'col-md-12';
$details_size   = 'col-md-12';
$post_class     = 'post__with-icon';
$thumb_size     = 'thumbnail-lg';
$entry_icon     = 'visible-md visible-lg';

$blog_layout    = $babysitter_data['babysitter__blog-image-size'];
$blog_date      = $babysitter_data['babysitter__post-date-icon'];

if ( $blog_layout == 2 ) :
	$image_size     = 'col-xs-4 col-sm-4 col-md-5';
	$details_size   = 'col-xs-8 col-sm-8 col-md-7';
	$post_class     = 'post__without-icon';
	$thumb_size     = 'portfolio-n';
	$entry_icon     = '';
endif;

if ( $blog_date == 0) :
	$post_class     = 'post__without-icon';
endif;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($post_class); ?>>
	<div class="row">
		<div class="<?php echo $image_size; ?>">
			<?php the_content(''); ?>
		</div>

		<div class="<?php echo $details_size; ?>">
			<header class="entry-header">

				<?php if ($blog_date == 1) : ?>
				<div class="entry-icon <?php echo $entry_icon; ?>">
					<span class="date-lg"><?php the_time('j'); ?></span>
					<span class="date-sm"><?php the_time('M, Y'); ?></span>

					<?php if ( $blog_layout == 1 ) : ?>
					<i class="entypo video"></i>
					<?php endif; ?>

				</div>
				<?php endif; ?>

				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				<div class="entry-meta">
					<?php babysitter_entry_categories(); ?>
					<?php babysitter_entry_tags(); ?>
					<?php babysitter_posted_by(); ?>
					<?php babysitter_entry_comments(); ?>
				</div>
			</header><!-- .entry-header -->

			<div class="entry-content">
				
				<?php the_excerpt(); ?>

				<?php
					wp_link_pages( array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'babysitter' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->
		</div>
	</div>
</article><!-- #post-## -->