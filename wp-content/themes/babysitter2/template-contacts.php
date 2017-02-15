<?php /* Template Name: Contacts */ ?>

<?php get_header(); ?>

<?php global $babysitter_data; ?>

<div class="page-content">
	<div class="container">

		<?php if($babysitter_data['opt-contact-gmap'] == 1): 

			// Enqueue Google Maps
			wp_enqueue_script('gmap_api');
			wp_enqueue_script('gmap'); 

		?>
		<script type="text/javascript">
			jQuery(function($){
				$('#map_canvas').gmap3({
					marker:{
						values:[
							{address:'<?php echo $babysitter_data["opt-contact-coordinates"]; ?>'},

							<?php if(isset($babysitter_data['opt-contact-coordinates2']) && $babysitter_data['opt-contact-coordinates2'] != ""): ?>
							{address:'<?php echo $babysitter_data["opt-contact-coordinates2"]; ?>'},
							<?php endif; ?>

						],
					},
					map:{
						options:{
							zoom: <?php echo $babysitter_data["opt-contact-zoom"]; ?>,
							scrollwheel: false,
							streetViewControl : true,
							<?php if(isset($babysitter_data['babysitter__map-center-coordinates']) && $babysitter_data['babysitter__map-center-coordinates'] != ""): ?>
							center: [<?php echo $babysitter_data["babysitter__map-center-coordinates"]; ?>],
							<?php endif; ?>
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
		<?php endif; ?>


		<div class="row">
			<div class="col-md-4">
				<?php if($babysitter_data['opt-contact-info'] == 1): ?>
				<!-- Contacts Info -->
				<div class="contacts-widget widget widget__sidebar">
					<h2><?php echo $babysitter_data['opt-contact-title']; ?></h2>
					<div class="widget-content">
						<ul class="contacts-info-list">
							<?php if(isset($babysitter_data['opt-contact-address']) && $babysitter_data['opt-contact-address'] != ""): ?>
							<li>
								<i class="fa fa-map-marker"></i>
								<div class="info-item">
									<?php echo $babysitter_data['opt-contact-address']; ?>
								</div>
							</li>
							<?php endif; ?>
							<?php if(isset($babysitter_data['opt-contact-address2']) && $babysitter_data['opt-contact-address2'] != ""): ?>
							<li>
								<i class="fa fa-map-marker"></i>
								<div class="info-item">
									<?php echo $babysitter_data['opt-contact-address2']; ?>
								</div>
							</li>
							<?php endif; ?>
							<?php if(isset($babysitter_data['opt-contact-phone']) && $babysitter_data['opt-contact-phone'][0] != ""): ?>
							<li>
								<i class="fa fa-phone"></i>
								<div class="info-item">
									<?php
										foreach( $babysitter_data['opt-contact-phone'] as $key => $value){
											echo "$value <br />";
										}
									?>
								</div>
							</li>
							<?php endif; ?>
							<?php if(isset($babysitter_data['opt-contact-fax']) && is_array( $babysitter_data['opt-contact-fax'] )): ?>
							<li>
								<i class="fa fa-fax"></i>
								<div class="info-item">
									<?php
										foreach( $babysitter_data['opt-contact-fax'] as $key => $value){
											echo "$value <br />";
										}
									?>
								</div>
							</li>
							<?php endif; ?>
							<?php if(isset($babysitter_data['opt-contact-email']) && $babysitter_data['opt-contact-email'] != ""): ?>
							<li>
								<i class="fa fa-envelope"></i>
								<span class="info-item">
									<?php
										foreach( $babysitter_data['opt-contact-email'] as $key => $value){
											echo "<a href='mailto:$value'>$value</a> <br />";
										}
									?>
								</span>
							</li>
							<?php endif; ?>
							<?php if(isset($babysitter_data['opt-contact-hours']) && $babysitter_data['opt-contact-hours'] != ""): ?>
							<li>
								<i class="fa fa-clock-o"></i>
								<div class="info-item">
									<?php echo $babysitter_data['opt-contact-hours']; ?>
								</div>
							</li>
							<?php endif; ?>
						</ul>
					</div>
				</div>
				<!-- /Contacts Info -->
				<?php endif; ?>
			</div>
			<div class="col-md-8">
				<hr class="visible-sm visible-xs lg">
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class('page'); ?>>
					<?php the_content(); ?>
				</div><!-- .post-->
				<?php endwhile; ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
