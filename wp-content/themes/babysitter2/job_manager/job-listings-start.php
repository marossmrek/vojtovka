<?php
$babysitter_data  = get_option('babysitter_data');

// Check if the option exists
if ( isset( $babysitter_data['babysitter_jobs-layout'] ) ) {
	$jobs_layout = $babysitter_data['babysitter_jobs-layout'];
} else {
	$jobs_layout = 'job_listing__list';
}

// Get Jobs Layout and add classes
if ( $jobs_layout == 2 ) {
	$jobs_layout = 'job_listing__grid job_listing__grid-2cols';
} elseif ( $jobs_layout == 3 ) {
	$jobs_layout = 'job_listing__grid job_listing__grid-3cols';
} elseif ( $jobs_layout == 4 ) {
	$jobs_layout = 'job_listing__grid job_listing__grid-4cols';
} else {
	$jobs_layout = 'job_listing__list';
}
?>

<ul class="job_listings <?php echo esc_attr( $jobs_layout ); ?>">
