<?php 
$babysitter_data  = get_option('babysitter_data');
$resumes_layout   = $babysitter_data['babysitter_resumes-layout'];

$category = get_the_resume_category();
//Placeholder Img URL
$resume_placeholder    = $babysitter_data['babysitter__candidate-placeholder']['url'];

if ( $resumes_layout == 2 || $resumes_layout == 3 || $resumes_layout == 4 ) {
	$thumb_size = 'portfolio-n';
} else {
	$thumb_size = 'xsmall';
}

?>

<li <?php resume_class(); ?>>
	<a href="<?php the_resume_permalink(); ?>">
		<?php the_candidate_photo( $thumb_size, $resume_placeholder ); ?>
		<div class="resume-inner">
			<div class="candidate-column">
				<h3><?php the_title(); ?></h3>
				<div class="candidate-title">
					<?php the_candidate_title( '<strong>', '</strong> ' ); ?>
				</div>
			</div>
			<div class="candidate-location-column">
				<?php the_candidate_location( false ); ?>
			</div>
		</div>
		<div class="resume-posted-column <?php if ( $category ) : ?>resume-meta<?php endif; ?>">

			<?php if ( $category ) : ?>
				<div class="resume-category">
					<?php echo $category ?>
				</div>
			<?php endif; ?>

			<date><?php printf( __( '%s ago', 'babysitter' ), human_time_diff( get_post_time( 'U' ), current_time( 'timestamp' ) ) ); ?></date>
		</div>
	</a>
</li>