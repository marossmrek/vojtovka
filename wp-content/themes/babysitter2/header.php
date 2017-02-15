<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Babysitter
 */
?><!DOCTYPE html>
<!--[if IE]>        <html <?php language_attributes(); ?> class="ie"><![endif]-->
<!--[if !IE]><!-->  <html <?php language_attributes(); ?> class="not-ie">  <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php global $babysitter_data; ?>

<?php if($babysitter_data['favicon']): ?>
<link rel="shortcut icon" href="<?php echo $babysitter_data['favicon']['url']; ?>" type="image/x-icon" />
<?php endif; ?>

<?php if($babysitter_data['iphone_icon_retina']): ?>
<!-- For iPhone Retina display -->
<link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php echo $babysitter_data['iphone_icon_retina']['url']; ?>">
<?php endif; ?>

<?php if($babysitter_data['ipad_icon_retina']): ?>
<!-- For iPad Retina display -->
<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo $babysitter_data['ipad_icon_retina']['url']; ?>">
<?php endif; ?>

<?php wp_head(); ?>

<?php if($babysitter_data['ace-editor-css']) { ?>
<!-- Custom CSS -->
<style>
<?php echo $babysitter_data['ace-editor-css']; ?>
</style>
<?php } ?>
</head>

<body <?php body_class(); ?>>

<?php
$layout_class         = '';
$nav_container_outer  = '';
$nav_container_inner  = '';

if($babysitter_data['babysitter__layout'] == 2) {
	$layout_class         = 'site-wrapper__boxed';
	$nav_container_outer  = 'container';
} else {
	$layout_class         = 'site-wrapper__full-width';
	$nav_container_inner  = 'container';
}
?>

<div class="site-wrapper <?php echo $layout_class; ?>">

	<!-- Header -->
	<header class="header header-menu-fullw">
		
		<?php if($babysitter_data['babysitter__header-top-bar'] == 1): ?>
		<!-- Header Top -->
		<div class="header-top">
			<div class="container">
				<div class="header-top-right">
					<?php
					// Login navigation
					babysitter_tertiary_nav(); ?>
				</div>
			</div>
		</div>
		<?php endif; ?>

		<!-- Header Main -->
		<div class="header-main">
			<div class="container">

				<!-- Logo -->
				<div class="logo">
					<?php if($babysitter_data['logo-standard']['url'] !== "") { ?>

						<!-- Logo Standard -->
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo $babysitter_data['logo-standard']['url']; ?>" class="logo-standard__light" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('description'); ?>" />
						</a>

					<?php } else { ?>

						<!-- Logo Text Default -->
						<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
					<?php } ?>

					<?php if (get_bloginfo('description') ) : ?>
					<p class="tagline hidden-xs hidden-sm"><?php bloginfo( 'description' ); ?></p>
					<?php endif; ?>
				</div>
				<!-- Logo / End -->

				<button type="button" class="navbar-toggle">
					<i class="fa fa-bars"></i>
				</button>

				<!-- Header Info -->
				<div class="head-info">
					<ul class="head-info-list">
						
						<?php if(isset($babysitter_data['babysitter__header-phone-number']) && $babysitter_data['babysitter__header-phone-number'] != ""): ?>
						<li>
							<?php if(isset($babysitter_data['babysitter__header-phone-title']) && $babysitter_data['babysitter__header-phone-title'] != ""): ?>
							<span><?php echo $babysitter_data['babysitter__header-phone-title']; ?></span>
							<?php endif; ?>

							<?php if(isset($babysitter_data['babysitter__header-phone-number']) && $babysitter_data['babysitter__header-phone-number'] != ""): ?>
							<?php echo $babysitter_data['babysitter__header-phone-number']; ?>
							<?php endif; ?>
						</li>
						<?php endif; ?>

						<?php if(isset($babysitter_data['babysitter__header-email']) && $babysitter_data['babysitter__header-email'] != ""): ?>
						<li>
							<?php if(isset($babysitter_data['babysitter__header-email-title']) && $babysitter_data['babysitter__header-email-title'] != ""): ?>
							<span><?php echo $babysitter_data['babysitter__header-email-title']; ?></span>
							<?php endif; ?>

							<?php if(isset($babysitter_data['babysitter__header-email']) && $babysitter_data['babysitter__header-email'] != ""): ?>
							<a href="mailto:<?php echo $babysitter_data['babysitter__header-email']; ?>"><?php echo $babysitter_data['babysitter__header-email']; ?></a>
							<?php endif; ?>
						</li>
						<?php endif; ?>

					</ul>
					<?php if($babysitter_data['babysitter__header-links'] == 1): ?>

					<?php 
					$social_links_colored = '';
					$social_links_type = '';

					if($babysitter_data['babysitter__header-links-color'] == 1) {
						$social_links_colored = 'social-links__colored';
					}

					if($babysitter_data['babysitter__header-links-type'] == 1) {
						$social_links_type = 'social-links__rounded';
					} ?>
					
					<!-- Social Links / End -->
					<ul class="social-links <?php echo $social_links_colored;?> <?php echo $social_links_type; ?>">

						<?php if(isset($babysitter_data['babysitter__header-social-fb']) && $babysitter_data['babysitter__header-social-fb'] != ""): ?>
						<li><a href="<?php echo $babysitter_data['babysitter__header-social-fb']; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
						<?php endif; ?>

						<?php if(isset($babysitter_data['babysitter__header-social-twitter']) && $babysitter_data['babysitter__header-social-twitter'] != ""): ?>
						<li><a href="<?php echo $babysitter_data['babysitter__header-social-twitter']; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
						<?php endif; ?>

						<?php if(isset($babysitter_data['babysitter__header-social-linkedin']) && $babysitter_data['babysitter__header-social-linkedin'] != ""): ?>
						<li><a href="<?php echo $babysitter_data['babysitter__header-social-linkedin']; ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
						<?php endif; ?>

						<?php if(isset($babysitter_data['babysitter__header-social-google-plus']) && $babysitter_data['babysitter__header-social-google-plus'] != ""): ?>
						<li><a href="<?php echo $babysitter_data['babysitter__header-social-google-plus']; ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
						<?php endif; ?>

						<?php if(isset($babysitter_data['babysitter__header-social-pinterest']) && $babysitter_data['babysitter__header-social-pinterest'] != ""): ?>
						<li><a href="<?php echo $babysitter_data['babysitter__header-social-pinterest']; ?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
						<?php endif; ?>

						<?php if(isset($babysitter_data['babysitter__header-social-youtube']) && $babysitter_data['babysitter__header-social-youtube'] != ""): ?>
						<li><a href="<?php echo $babysitter_data['babysitter__header-social-youtube']; ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
						<?php endif; ?>

						<?php if(isset($babysitter_data['babysitter__header-social-instagram']) && $babysitter_data['babysitter__header-social-instagram'] != ""): ?>
						<li><a href="<?php echo $babysitter_data['babysitter__header-social-instagram']; ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
						<?php endif; ?>

						<?php if(isset($babysitter_data['babysitter__header-social-tumblr']) && $babysitter_data['babysitter__header-social-tumblr'] != ""): ?>
						<li><a href="<?php echo $babysitter_data['babysitter__header-social-tumblr']; ?>" target="_blank"><i class="fa fa-tumblr"></i></a></li>
						<?php endif; ?>

						<?php if(isset($babysitter_data['babysitter__header-social-dribbble']) && $babysitter_data['babysitter__header-social-dribbble'] != ""): ?>
						<li><a href="<?php echo $babysitter_data['babysitter__header-social-dribbble']; ?>" target="_blank"><i class="fa fa-dribbble"></i></a></li>
						<?php endif; ?>

						<?php if(isset($babysitter_data['babysitter__header-social-vimeo']) && $babysitter_data['babysitter__header-social-vimeo'] != ""): ?>
						<li><a href="<?php echo $babysitter_data['babysitter__header-social-vimeo']; ?>" target="_blank"><i class="fa fa-vimeo"></i></a></li>
						<?php endif; ?>

						<?php if(isset($babysitter_data['babysitter__header-social-flickr']) && $babysitter_data['babysitter__header-social-flickr'] != ""): ?>
						<li><a href="<?php echo $babysitter_data['babysitter__header-social-flickr']; ?>" target="_blank"><i class="fa fa-flickr"></i></a></li>
						<?php endif; ?>

						<?php if(isset($babysitter_data['babysitter__header-social-yelp']) && $babysitter_data['babysitter__header-social-yelp'] != ""): ?>
						<li><a href="<?php echo $babysitter_data['babysitter__header-social-yelp']; ?>" target="_blank"><i class="fa fa-yelp"></i></a></li>
						<?php endif; ?>

						<?php if(isset($babysitter_data['babysitter__header-social-rss']) && $babysitter_data['babysitter__header-social-rss'] != ""): ?>
						<li><a href="<?php echo $babysitter_data['babysitter__header-social-rss']; ?>" target="_blank"><i class="fa fa-rss"></i></a></li>
						<?php endif; ?>

					</ul>
					<!-- Social Links / End -->
					<?php endif; ?>
				</div>
				<!-- Header Info / End -->

			</div>
		</div>
		
		<!-- Navigation -->
		<nav class="nav-main-container <?php echo esc_attr( $nav_container_outer ); ?>">
			<div class="nav-main">
				<div class="<?php echo esc_attr( $nav_container_inner ); ?>">
				<?php
					// Primary navigation
					babysitter_nav(); ?>
				</div>
			</div>
		</nav>
		<!-- Navigation / End -->
		
	</header>
	<!-- Header / End -->
	
	
	<!-- Main -->
	<div class="main" role="main">

		<?php if(!is_search() && !is_404()) { // search and 404 pages excluded to avoid errors
			$title     = get_post_meta(get_the_ID(), 'babysitter_page_title', true);
			$slider    = get_post_meta(get_the_ID(), 'babysitter_page_slider', true);

			// Page Heading
			if($title != "Hide" && !is_page_template('template-coming-soon.php')) {
				get_template_part('page-header');
			}

			// Slider
			if($slider == "Show") { ?>

			<?php get_template_part('inc/sliders/flexslider'); ?>
			
			<?php } ?>

		<?php } elseif(is_search() || is_404()) {
			get_template_part('page-header');
		} ?>