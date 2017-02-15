<?php 
global $post;
$babysitter_data  = get_option('babysitter_data');
$jobs_layout      = $babysitter_data['babysitter_jobs-layout'];

if ( $jobs_layout == 2 || $jobs_layout == 3 || $jobs_layout == 4 ) {
	$thumb_size = 'portfolio-n';
} else {
	$thumb_size = 'xsmall';
}

//Placeholder Img URL
$job_placeholder    = $babysitter_data['babysitter__employer-placeholder']['url']; ?>

<li <?php job_listing_class(); ?> data-longitude="<?php echo esc_attr( $post->geolocation_lat ); ?>" data-latitude="<?php echo esc_attr( $post->geolocation_long ); ?>">
	<a href="<?php the_job_permalink(); ?>">
		<?php the_company_logo( $thumb_size, $job_placeholder ); ?>
		<div class="job_listing-inner">
			<div class="position">
				<h3><?php the_title(); ?></h3>
				<div class="company">
					<?php the_company_name( '<strong>', '</strong> ' ); ?>
					<?php the_company_tagline( '<span class="tagline">', '</span>' ); ?>
				</div>
			</div>
			<div class="location">
				<?php the_job_location( false ); ?>
			</div>
		</div>
		<ul class="meta">
			<?php do_action( 'job_listing_meta_start' ); ?>
		
			<li class="job-type <?php echo get_the_job_type() ? sanitize_title( get_the_job_type()->slug ) : ''; ?>"><?php the_job_type(); ?></li>
			<li class="date"><date><?php printf( __( 'Posted %s ago', 'babysitter' ), human_time_diff( get_post_time( 'U' ), current_time( 'timestamp' ) ) ); ?></date></li>
		
			<?php do_action( 'job_listing_meta_end' ); ?>
		</ul>
	</a>
</li>