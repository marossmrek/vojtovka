<?php global $post; ?>
<form class="job-manager-application-form job-manager-form" method="post" enctype="multipart/form-data" action="<?php echo esc_url( get_permalink() );?>">
	<?php do_action( 'job_application_form_fields_start' ); ?>

	<?php foreach ( $application_fields as $key => $field ) : ?>
		<fieldset class="fieldset-<?php esc_attr_e( $key ); ?>">
			<label for="<?php esc_attr_e( $key ); ?>"><?php echo $field['label'] . apply_filters( 'submit_job_form_required_label', $field['required'] ? '' : ' <small>' . __( '(optional)', 'babysitter' ) . '</small>', $field ); ?></label>
			<div class="field <?php echo $field['required'] ? 'required-field' : ''; ?>">
				<?php $class->get_field_template( $key, $field ); ?>
			</div>
		</fieldset>
	<?php endforeach; ?>

	<?php do_action( 'job_application_form_fields_end' ); ?>

	<p>
		<input type="submit" class="btn btn-secondary" name="wp_job_manager_send_application" value="<?php esc_attr_e( 'Send application', 'babysitter' ); ?>" />
		<input type="hidden" name="job_id" value="<?php echo absint( $post->ID ); ?>" />
	</p>
</form>