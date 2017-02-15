<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Babysitter
 */
?>

<?php global $babysitter_data; ?>

		<!-- Footer -->
		<footer class="footer" id="footer">

			<?php 
			$footer_widgets_layout = $babysitter_data['opt-footer-widgets-layout'];
			$footer_widget_1 = '';
			$footer_widget_2 = '';
			$footer_widget_3 = '';
			$footer_widget_4 = '';

			switch ($footer_widgets_layout) {
				case '1':
					$footer_widget_1 = 'col-sm-6 col-md-2';
					$footer_widget_2 = 'col-sm-6 col-md-2';
					$footer_widget_3 = 'col-sm-6 col-md-4';
					$footer_widget_4 = 'col-sm-6 col-md-4';
					break;
				case '2':
					$footer_widget_1 = 'col-sm-6 col-md-6';
					
					$footer_widget_3 = 'col-sm-6 col-md-6';
					
					break;
				case '3':
					$footer_widget_1 = 'col-sm-4 col-md-6';
					$footer_widget_2 = 'col-sm-4 col-md-3';
					$footer_widget_3 = 'col-sm-4 col-md-3';
					break;
				case '4':
					$footer_widget_1 = 'col-sm-4 col-md-3';
					$footer_widget_2 = 'col-sm-4 col-md-3';
					$footer_widget_3 = 'col-sm-4 col-md-6';
					break;
				case '5':
					$footer_widget_1 = 'col-sm-4 col-md-4';
					$footer_widget_2 = 'col-sm-4 col-md-4';
					$footer_widget_3 = 'col-sm-4 col-md-4';
					break;
				case '6':
					$footer_widget_1 = 'col-sm-4 col-md-4';
					$footer_widget_2 = 'col-sm-8 col-md-8';
					break;
				case '7':
					$footer_widget_1 = 'col-sm-8 col-md-8';
					$footer_widget_2 = 'col-sm-4 col-md-4';
					break;
			}
			?>

			<?php if($babysitter_data['opt-footer-widgets'] == 1 && !is_page_template( 'template-coming-soon.php' )): ?>
			<div class="footer-widgets">
				<div class="container">
					<div class="row">
						<div class="<?php echo $footer_widget_1; ?>">
							<?php dynamic_sidebar('babysitter-footer-widget-1'); ?>
						</div>
						<div class="<?php echo $footer_widget_2; ?>">
							<?php dynamic_sidebar('babysitter-footer-widget-2'); ?>
						</div>
						
						<?php if( $footer_widgets_layout == 1 || $footer_widgets_layout == 2 ): ?>
						<div class="clearfix visible-sm"></div>
						<?php endif; ?>

						<?php if( $footer_widgets_layout == 1 || $footer_widgets_layout == 2 || $footer_widgets_layout == 3  || $footer_widgets_layout == 4  || $footer_widgets_layout == 5 ): ?>
						<div class="<?php echo $footer_widget_3; ?>">
							<?php dynamic_sidebar('babysitter-footer-widget-3'); ?>
						</div>
						<?php endif; ?>

						<?php if( $footer_widgets_layout == 1 || $footer_widgets_layout == 2 ): ?>
						<div class="<?php echo $footer_widget_4; ?>">
							<?php dynamic_sidebar('babysitter-footer-widget-4'); ?>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<?php endif; ?>

			<?php if($babysitter_data['opt-footer-copyright'] == 1): ?>
			<div class="footer-copyright">
				<div class="container">
					<div class="row">
						<div class="col-sm-6 col-md-6">
							<div class="footer-copyright-txt footer-copyright-txt__primary">
								<?php echo $babysitter_data['opt-footer-text-primary']; ?>
							</div>
						</div>
						<div class="col-sm-6 col-md-6">
							<div class="footer-copyright-txt footer-copyright-txt__secondary">
								<?php echo $babysitter_data['opt-footer-text-secondary']; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php endif; ?>
		</footer>
		<!-- Footer / End -->

	</div><!-- .main -->
</div><!-- .site-wrapper -->

<?php wp_footer(); ?>
</body>
</html>