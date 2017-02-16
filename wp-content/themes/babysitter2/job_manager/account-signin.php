<?php if ( is_user_logged_in() ) : ?>

	<fieldset>
		<label><?php _e( 'Váš účet', 'babysitter' ); ?></label>
		<div class="field account-sign-in">
			<?php
				$user = wp_get_current_user();
				printf( __( 'Momentálne ste prihlásený ako <strong>%s</strong>.', 'babysitter' ), $user->user_login );
			?>

			&nbsp; <a class="btn btn-primary btn-sm" href="<?php echo apply_filters( 'submit_job_form_logout_url', wp_logout_url( get_permalink() ) ); ?>"><i class="fa fa-key"></i> <?php _e( 'Odhlásiť sa', 'babysitter' ); ?></a>
		</div>
	</fieldset>

<?php else :

	$account_required             = job_manager_user_requires_account();
	$registration_enabled         = job_manager_enable_registration();
	$generate_username_from_email = job_manager_generate_username_from_email();
	?>
	<fieldset>
		<label><?php _e( 'Máte účet?', 'babysitter' ); ?></label>
		<div class="field account-sign-in">
			<p>
				<a class="btn btn-primary btn-sm" href="/vojtovka/login"><i class="fa fa-key"></i> <?php _e( 'Prihlásiť sa', 'babysitter' ); ?></a>
			</p>

			<?php if ( $registration_enabled ) : ?>
			
				<div class="alert alert-info alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
					<?php printf( __( 'Ak nemáte účet, môžete sa jednoducho registrovať', 'babysitter' ), $account_required ? '' : __( 'optionally', 'babysitter' ) . ' ' ); ?>
				</div>

			<?php elseif ( $account_required ) : ?>

				<?php echo apply_filters( 'submit_job_form_login_required_message',  __('Musíte sa prihlásiť', 'babysitter' ) ); ?>

			<?php endif; ?>
		</div>
	</fieldset>
	<?php if ( $registration_enabled ) : ?>
		<?php if ( ! $generate_username_from_email ) : ?>
			<fieldset>
				<label><?php _e( 'Username', 'babysitter' ); ?> <?php echo apply_filters( 'submit_job_form_required_label', ( ! $account_required ) ? ' <small>' . __( '(optional)', 'babysitter' ) . '</small>' : '' ); ?></label>
				<div class="field">
					<input type="text" class="input-text" name="create_account_username" id="account_username" value="<?php if ( ! empty( $_POST['create_account_username'] ) ) echo sanitize_text_field( stripslashes( $_POST['create_account_username'] ) ); ?>" />
				</div>
			</fieldset>
		<?php endif; ?>
		<fieldset>
			<label><?php _e( 'Your email', 'babysitter' ); ?> <?php echo apply_filters( 'submit_job_form_required_label', ( ! $account_required ) ? ' <small>' . __( '(optional)', 'babysitter' ) . '</small>' : '' ); ?></label>
			<div class="field">
				<input type="email" class="input-text" name="create_account_email" id="account_email" placeholder="<?php esc_attr_e( 'you@yourdomain.com', 'babysitter' ); ?>" value="<?php if ( ! empty( $_POST['create_account_email'] ) ) echo sanitize_text_field( stripslashes( $_POST['create_account_email'] ) ); ?>" />
			</div>
		</fieldset>
		<?php do_action( 'job_manager_register_form' ); ?>
	<?php endif; ?>

<?php endif; ?>