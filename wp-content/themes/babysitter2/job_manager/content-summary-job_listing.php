<?php 
global $job_manager;
global $babysitter_data;

//Placeholder Img URL
$job_placeholder    = $babysitter_data['babysitter__employer-placeholder']['url']; ?>

<?php the_company_logo( 'portfolio-n', $job_placeholder); ?>

<div class="job_summary_content-holder">
	<div class="job_summary_content">
	
		<h5 class="name"><a href="<?php the_permalink(); ?>"><?php the_company_name(); ?></a></h5>
		<h6 class="job_summary_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
		<p class="job_summary_tagline"><?php the_company_tagline(); ?></p>
	
	</div>
	
	<footer class="job_summary_footer">
		<ul class="meta">
			<?php if ( get_the_job_type() ) : ?>
			<li class="category"><?php the_job_type(); ?></li>
			<?php endif; ?>
			<li class="location"><?php the_job_location( false ); ?></li>
			<li class="date"><?php printf( __( 'Posted %s ago', 'babysitter' ), human_time_diff( get_post_time( 'U' ), current_time( 'timestamp' ) ) ); ?></li>
		</ul>
	</footer>
</div>