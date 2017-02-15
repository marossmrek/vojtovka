<div id="job-manager-job-dashboard">
	<div class="alert alert-info alert-dismissable">
		<?php _e( 'Your listings are shown in the table below. Expired listings will be automatically removed after 30 days.', 'babysitter' ); ?>
	</div>
	<div class="table-responsive">
		<table class="job-manager-jobs table table-bordered table-striped">
			<thead>
				<tr>
					<?php foreach ( $job_dashboard_columns as $key => $column ) : ?>
						<th class="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $column ); ?></th>
					<?php endforeach; ?>
				</tr>
			</thead>
			<tbody>
				<?php if ( ! $jobs ) : ?>
					<tr>
						<td colspan="6"><?php _e( 'You do not have any active listings.', 'babysitter' ); ?></td>
					</tr>
				<?php else : ?>
					<?php foreach ( $jobs as $job ) : ?>
						<tr>
							<?php foreach ( $job_dashboard_columns as $key => $column ) : ?>
								<td class="<?php echo esc_attr( $key ); ?>">
									<?php if ('job_title' === $key ) : ?>
										<?php if ( $job->post_status == 'publish' ) : ?>
											<a href="<?php echo get_permalink( $job->ID ); ?>"><?php echo $job->post_title; ?></a>
										<?php else : ?>
											<?php echo $job->post_title; ?> <small>(<?php the_job_status( $job ); ?>)</small>
										<?php endif; ?>
										<ul class="job-dashboard-actions">
											<?php
												$actions = array();
		
												switch ( $job->post_status ) {
													case 'publish' :
														$actions['edit'] = array( 'label' => __( 'Edit', 'babysitter' ), 'nonce' => false );
		
														if ( is_position_filled( $job ) ) {
															$actions['mark_not_filled'] = array( 'label' => __( 'Mark not filled', 'babysitter' ), 'nonce' => true );
														} else {
															$actions['mark_filled'] = array( 'label' => __( 'Mark filled', 'babysitter' ), 'nonce' => true );
														}
														break;
													case 'expired' :
														if ( get_option( 'job_manager_submit_page_slug' ) ) {
															$actions['relist'] = array( 'label' => __( 'Relist', 'babysitter' ), 'nonce' => true );
														}
														break;
												}
		
												$actions['delete'] = array( 'label' => __( 'Delete', 'babysitter' ), 'nonce' => true );
												$actions           = apply_filters( 'job_manager_my_job_actions', $actions, $job );
		
												foreach ( $actions as $action => $value ) {
													$action_url = add_query_arg( array( 'action' => $action, 'job_id' => $job->ID ) );
													if ( $value['nonce'] ) {
														$action_url = wp_nonce_url( $action_url, 'job_manager_my_job_actions' );
													}
													echo '<li><a href="' . $action_url . '" class="job-dashboard-action-' . $action . '">' . $value['label'] . '</a></li>';
												}
											?>
										</ul>
									<?php elseif ('date' === $key ) : ?>
										<?php echo date_i18n( get_option( 'date_format' ), strtotime( $job->post_date ) ); ?>
									<?php elseif ('expires' === $key ) : ?>
										<?php echo $job->_job_expires ? date_i18n( get_option( 'date_format' ), strtotime( $job->_job_expires ) ) : '&ndash;'; ?>
									<?php elseif ('filled' === $key ) : ?>
										<?php echo is_position_filled( $job ) ? '<i class="fa fa-check"></i>' : '<i class="fa fa-times"></i>'; ?>
									<?php else : ?>
										<?php do_action( 'job_manager_job_dashboard_column_' . $key, $job ); ?>
									<?php endif; ?>
								</td>
							<?php endforeach; ?>
						</tr>
					<?php endforeach; ?>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
	<?php get_job_manager_template( 'pagination.php', array( 'max_num_pages' => $max_num_pages ) ); ?>
</div>