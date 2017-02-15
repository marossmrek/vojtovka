<?php 
global $post; 
$babysitter_data = get_option('babysitter_data');

$show_google_map = 1;
if ( isset( $babysitter_data['babysitter__google-map-single-job'] ) ) {
	$show_google_map = $babysitter_data['babysitter__google-map-single-job'];
} ?>

<div class="single_job_listing" itemscope itemtype="http://schema.org/JobPosting">
	<meta itemprop="title" content="<?php echo esc_attr( $post->post_title ); ?>" />

	<?php if ( get_option( 'job_manager_hide_expired_content', 1 ) && 'expired' === $post->post_status ) : ?>

		<div class="job-manager-info alert alert-danger"><?php _e( 'This listing has expired', 'babysitter' ); ?></div>

	<?php else : ?>

		<?php 
			/**
			 * single_job_listing_start hook
			 *
			 * @hooked job_listing_meta_display - 20
			 * @hooked job_listing_company_display - 30
			 */
			do_action( 'single_job_listing_start' ); 
		?>

		<div class="spacer-sm"></div>

		<div class="job_description" itemprop="description">
			<h4><?php _e( 'Description', 'babysitter' ); ?></h4>
			<?php echo apply_filters( 'the_job_description', get_the_content() ); ?>

			<?php the_company_video(); ?>
		</div>

		<?php if (get_the_job_location() && $show_google_map == 1 ) { ?>
			<?php if (!class_exists( 'Geo_Job_Manager' )) { ?>
				<hr class="hr__margin-lg">

				<h4><?php _e( 'Location', 'babysitter' ); ?></h4>

				<?php $stripped_location = strip_tags(get_the_job_location(false)); ?>

				<?php // Enqueue Google Maps
				wp_enqueue_script('gmap_api');
				wp_enqueue_script('gmap'); ?>
				
				<script type="text/javascript">
					jQuery(function($){
						$('#map_canvas').gmap3({
							marker:{
								address: '<?php echo $stripped_location ?>' 
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
		<?php } ?>

		<?php 
			/**
			 * single_job_listing_end hook
			 */
			do_action( 'single_job_listing_end' ); 
		?>

	<?php endif; ?>
</div>