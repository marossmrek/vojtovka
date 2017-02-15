<?php global $babysitter_data; 

$slides = $babysitter_data['babysitter__slides'];

$slider_controls = "";
if ($babysitter_data['babysitter__slider-controls'] == 1) {
	$slider_controls = 'true';
} else {
	$slider_controls = 'false';
}

$slider_autoplay = "";
if ($babysitter_data['babysitter__slider-autoplay'] == 1) {
	$slider_autoplay = 'true';
} else {
	$slider_autoplay = 'false';
}

$slider_loop = "";
if ($babysitter_data['babysitter__slider-loop'] == 1) {
	$slider_loop = 'true';
} else {
	$slider_loop = 'false';
}

$slider_parallax       = "";
$slider_parallax_ratio = $babysitter_data['babysitter__slider-parallax-ratio'];
if ($babysitter_data['babysitter__slider-parallax-bg'] == 1) {
	$slider_parallax = 'data-stellar-background-ratio="'.$slider_parallax_ratio.'"';
}

$slider_prev_next = 'true';

if ( isset( $babysitter_data['babysitter__slider-nav'] ) ) {
	if ( $babysitter_data['babysitter__slider-nav'] == 1) {
		$slider_prev_next = 'true';
	} else {
		$slider_prev_next = 'false';
	}
}
?>

<!-- Slider -->
<section class="slider-holder" <?php echo $slider_parallax; ?>>
	<div class="container">
		<div class="flexslider">

			<?php // Slides ?>
			<ul class="slides">

				<?php 
				if (isset($babysitter_data['babysitter__slides']) && !empty($babysitter_data['babysitter__slides'])) {
					foreach($slides as $slide) {
						echo '<li>';

							echo '<img src="' . $slide['image'] . '">'; 

							if ( $slide['title'] || $slide['description']) {
								echo '<div class="flexslider-desc">';
									echo '<h1>' . $slide['title'] . '</h1>';

									if ( $slide['url']) {
										echo '<a href="' . $slide['url'] . '">';
											echo $slide['description'];
										echo ' <i class="fa fa-angle-double-right"></i></a>';
									} else {
										echo $slide['description'];
									}

								echo '</div>';
							}
							
						echo '</li>';
					}
				} else {
					echo '<div class="row"><div class="col-md-8 col-md-offset-2"><div class="alert alert-warning fade in alert-dismissable" style="margin-top:70px;"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>To add slides please go to <strong>Theme Options > Main Slider</strong></div></div></div>';
				}
				?>
			</ul>

		</div>
	</div>
</section>


<?php // Slider Init ?>
<script>
	jQuery(function(){
		jQuery('body').addClass('loading');
	});
	
	jQuery(window).load(function() {
		jQuery('.flexslider').flexslider({
			animation: "fade",
			slideshowSpeed: <?php echo $babysitter_data['babysitter__slider-speed']; ?>000,
			controlNav: <?php echo $slider_controls; ?>,
			slideshow: <?php echo $slider_autoplay; ?>,
			animationLoop: <?php echo $slider_loop; ?>,
			directionNav: <?php echo $slider_prev_next; ?>,
			prevText: "",
			nextText: "",
			smoothHeight: true,
			start: function(slider){
				jQuery('body').removeClass('loading');
			}
		});
	});
</script>
<!-- Slider / End -->