<?php 
$babysitter_data = get_option('babysitter_data');

//Placeholder Img URL
$resume_placeholder    = $babysitter_data['babysitter__candidate-placeholder']['url'];

$show_google_map = 1;
if ( isset( $babysitter_data['babysitter__google-map-single-resume'] ) ) {
	$show_google_map = $babysitter_data['babysitter__google-map-single-resume'];
} 
?>

<?php if ( resume_manager_user_can_view_resume( $post->ID ) ) : ?>
	<div class="single-resume-content">

		<?php do_action( 'single_resume_start' ); ?>

		<div class="row resume-profile-info">
			<div class="col-md-4">
				<figure class="alignnone">
					<?php the_candidate_photo('portfolio-n', $resume_placeholder); ?>
				</figure>
				<div class="gallery-imgs">
					<?php display_resume_gallery_data('small'); ?>
				</div>
			</div>
			<div class="col-md-8">

				<!-- Tabs -->
				<div class="tabs">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs">

						<li class="active"><a href="#tab1-1" data-toggle="tab"><?php _e('Details', 'babysitter'); ?></a></li>

						<?php if ( ( $skills = wp_get_object_terms( $post->ID, 'resume_skill', array( 'fields' => 'names' ) ) ) && is_array( $skills ) ) : ?>
						<li><a href="#tab1-2" data-toggle="tab"><?php _e('Skills', 'babysitter'); ?></a></li>
						<?php endif; ?>

						<?php if ( $items = get_post_meta( $post->ID, '_candidate_experience', true ) ) : ?>
						<li><a href="#tab1-3" data-toggle="tab"><?php _e('Experience', 'babysitter'); ?></a></li>
						<?php endif; ?>

						<?php if ( $items = get_post_meta( $post->ID, '_candidate_education', true ) ) : ?>
						<li><a href="#tab1-4" data-toggle="tab"><?php _e('Education', 'babysitter'); ?></a></li>
						<?php endif; ?>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content">
						<div class="tab-pane fade in active" id="tab1-1">
							
							<?php the_title( '<h2 class="name">', '</h2>' ); ?>
							<h4 class="job-title"><?php the_candidate_title(); ?></h4>

							<ul class="meta">
								<?php do_action( 'single_resume_meta_start' ); ?>

								<?php if ( get_the_resume_category() ) : ?>
									<li class="resume-category"><?php the_resume_category(); ?></li>
								<?php endif; ?>

								<li class="location"><?php the_candidate_location(false); ?></li>

								<li class="date-posted" itemprop="datePosted"><date><?php printf( __( 'Updated %s ago', 'babysitter' ), human_time_diff( get_the_modified_time( 'U' ), current_time( 'timestamp' ) ) ); ?></date></li>

								<?php do_action( 'single_resume_meta_end' ); ?>
							</ul>

							<?php the_resume_links(); ?>

						</div>

						<?php if ( ( $skills = wp_get_object_terms( $post->ID, 'resume_skill', array( 'fields' => 'names' ) ) ) && is_array( $skills ) ) : ?>
						<div class="tab-pane fade tab-pane__skills" id="tab1-2">
							<div class="list list__arrow1">
								<ul>
									<?php echo '<li>' . implode( '</li><li>', $skills ) . '</li>'; ?>
								</ul>
							</div>
						</div>
						<?php endif; ?>

						<?php if ( $items = get_post_meta( $post->ID, '_candidate_experience', true ) ) : ?>
						<div class="tab-pane fade" id="tab1-3">
							<div class="list list__arrow1">
								<ul>
								<?php
									foreach( $items as $item ) : ?>

										<li>
											<small class="date"><?php echo esc_html( $item['date'] ); ?></small><br>
											<?php printf( __( '%s at %s', 'babysitter' ), '<strong class="job_title">' . esc_html( $item['job_title'] ) . '</strong>', '<strong class="employer">' . esc_html( $item['employer'] ) . '</strong>' ); ?><br>

											<?php echo wptexturize( $item['notes'] ); ?>
										</li>
									<?php endforeach;
								?>
								</ul>
							</div>
						</div>
						<?php endif; ?>

						<?php if ( $items = get_post_meta( $post->ID, '_candidate_education', true ) ) : ?>
						<div class="tab-pane fade" id="tab1-4">
							<div class="list list__arrow1">
								<ul>
								<?php
									foreach( $items as $item ) : ?>
								
										<li>
											<small class="date"><?php echo esc_html( $item['date'] ); ?></small><br>
											<?php printf( __( '%s at %s', 'babysitter' ), '<strong class="qualification">' . esc_html( $item['qualification'] ) . '</strong>', '<strong class="location">' . esc_html( $item['location'] ) . '</strong>' ); ?><br>
											<?php echo wptexturize( $item['notes'] ); ?>
										</li>
								
									<?php endforeach;
								?>
								</ul>
							</div>
						</div>
						<?php endif; ?>

					</div>
				</div>
				<!-- Tabs / End -->

				<?php get_job_manager_template( 'contact-details.php', array( 'post' => $post ), 'wp-job-manager-resumes', RESUME_MANAGER_PLUGIN_DIR . '/templates/' ); ?>
				
			</div>
		</div>

		<div class="spacer-sm"></div>

		<div class="resume_description">
			
			<h4><?php _e( 'Description', 'babysitter' ); ?></h4>

			<?php if( get_the_candidate_video() ) { ?>

			<div class="row">
				<div class="col-md-7">
					<?php echo apply_filters( 'the_resume_description', get_the_content() ); ?>
				</div>
				
				<div class="col-md-5">
					<?php the_candidate_video(); ?>
				</div>
			</div>

			<?php } else { ?>
				<?php echo apply_filters( 'the_resume_description', get_the_content() ); ?>
			<?php } ?>
			
		</div>

		<?php if( get_the_candidate_location() && $show_google_map == 1 ) { ?>

			<?php // Enqueue Google Maps
			wp_enqueue_script('gmap_api');
			wp_enqueue_script('gmap'); ?>

			<hr class="hr__margin-lg">

			<h4><?php _e( 'Location', 'babysitter' ); ?></h4>
			<script type="text/javascript">
				jQuery(function($){
					$('#map_canvas').gmap3({
						marker:{
							address: '<?php echo get_the_candidate_location(); ?>' 
						},
							map:{
							options:{
							zoom: 13,
							scrollwheel: false,
							streetViewControl : true
							}
						}
				    });
				});
			</script><!-- Google Map Init-->
			<!-- Google Map -->
			<div class="googlemap-wrapper">
				<div id="map_canvas" class="map-canvas"></div>
			</div>
			<!-- Google Map / End -->
		<?php } ?>

		<?php // Hook position changed (for adding new field via Field Editor in "Bottom of resume listing" position) ?>
		<?php do_action( 'single_resume_end' ); ?>
		
	</div>
<?php else : ?>

	<?php get_job_manager_template_part( 'access-denied', 'single-resume', 'wp-job-manager-resumes', RESUME_MANAGER_PLUGIN_DIR . '/templates/' ); ?>

<?php endif; ?>