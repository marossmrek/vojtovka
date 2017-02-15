<?php
/**
 * Single view Company information box
 *
 * Hooked into single_job_listing_start priority 30
 *
 * @since  1.14.0
 */
global $post;
global $babysitter_data;

if ( ! get_the_company_name() ) {
	return;
}

//Placeholder Img URL
$job_placeholder    = $babysitter_data['babysitter__employer-placeholder']['url'];
?>

<?php // Moved here @since 1.3 ?>
<?php do_action( 'single_job_listing_meta_after' ); ?>

<div class="row job-profile-info" itemscope itemtype="http://data-vocabulary.org/Organization">
	<div class="col-md-4">
		<figure class="alignnone job-cover-img">
			<?php the_company_logo('portfolio-n', $job_placeholder); ?>
		</figure>
		<div class="gallery-imgs">
			<?php display_job_gallery_data('small'); ?>
		</div>
	</div>
	<div class="col-md-8">

		<!-- Tabs -->
		<div class="tabs">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs">
				<li class="active"><a href="#tab1-1" data-toggle="tab"><?php _e('Details', 'babysitter'); ?></a></li>
				<!-- <li><a href="#tab1-2" data-toggle="tab">Experience</a></li> -->
			</ul>
			<!-- Tab panes -->
			<div class="tab-content">
				<div class="tab-pane fade in active" id="tab1-1">
					<?php the_company_name( '<h2 class="name" itemprop="name">', '</h2>' ); ?>
					<?php the_title( '<h4>', '</h4>' ); ?>
					<?php the_company_tagline( '<p class="tagline">', '</p>' ); ?>

					<!-- Meta -->
					<?php do_action( 'single_job_listing_meta_before' ); ?>

					<ul class="meta">
						<?php do_action( 'single_job_listing_meta_start' ); ?>

						<li class="job-type <?php echo get_the_job_type() ? sanitize_title( get_the_job_type()->slug ) : ''; ?>" itemprop="employmentType"><?php the_job_type(); ?></li>

						<?php if (class_exists( 'Astoundify_Job_Manager_Regions' )) { ?>
							<?php $stripped_location = strip_tags(get_the_job_location()); ?>
							<li class="location" itemprop="jobLocation"><?php echo $stripped_location ?></li>
						<?php } else { ?>
							<li class="location" itemprop="jobLocation"><?php the_job_location(false); ?></li>
						<?php } ?>

						<li class="date-posted" itemprop="datePosted"><date><?php printf( __( 'Posted %s ago', 'babysitter' ), human_time_diff( get_post_time( 'U' ), current_time( 'timestamp' ) ) ); ?></date></li>

						<?php if ( is_position_filled() ) : ?>
							<li class="position-filled"><?php _e( 'This position has been filled', 'babysitter' ); ?></li>
						<?php elseif ( ! candidates_can_apply() && 'preview' !== $post->post_status ) : ?>
							<li class="listing-expired"><?php _e( 'Applications have closed', 'babysitter' ); ?></li>
						<?php endif; ?>

						<?php do_action( 'single_job_listing_meta_end' ); ?>
					</ul>
					<!-- /Meta -->

					<?php // Removed from here @since 1.3 
					// do_action( 'single_job_listing_meta_after' ); ?>

					<?php if ( $website = get_the_company_website() ) : ?>
						<a class="website" href="<?php echo esc_url( $website ); ?>" itemprop="url" target="_blank" rel="nofollow"><?php _e( 'Website', 'babysitter' ); ?></a>
					<?php endif; ?>

					<?php the_company_twitter(); ?>

				</div>
				<!-- <div class="tab-pane fade" id="tab1-2">

				</div> -->
			</div>
		</div>
		<!-- Tabs / End -->

		<?php if ( candidates_can_apply() ) : ?>
			<?php get_job_manager_template( 'job-application.php' ); ?>
		<?php endif; ?>

	</div>
</div>