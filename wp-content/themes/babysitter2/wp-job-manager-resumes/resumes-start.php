<?php
$babysitter_data  = get_option('babysitter_data');

// Check if the option exists
if ( isset( $babysitter_data['babysitter_resumes-layout'] ) ) {
	$resumes_layout = $babysitter_data['babysitter_resumes-layout'];
} else {
	$resumes_layout = 'resumes__list';
}

// Get resumes Layout and add classes
if ( $resumes_layout == 2 ) {
	$resumes_layout = 'resumes__grid resumes__grid-2cols';
} elseif ( $resumes_layout == 3 ) {
	$resumes_layout = 'resumes__grid resumes__grid-3cols';
} elseif ( $resumes_layout == 4 ) {
	$resumes_layout = 'resumes__grid resumes__grid-4cols';
} else {
	$resumes_layout = 'resumes__list';
}
?>

<ul class="resumes <?php echo esc_attr( $resumes_layout ); ?>">