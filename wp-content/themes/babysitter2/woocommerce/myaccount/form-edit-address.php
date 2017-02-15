<?php
/**
 * Edit address form
 *
 * @see     https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$page_title = ( $load_address === 'billing' ) ? __( 'Billing Address', 'woocommerce' ) : __( 'Shipping Address', 'woocommerce' ); ?>

<div class="row">
	<div class="col-md-8 col-md-offset-2">

		<?php do_action( 'woocommerce_before_edit_account_address_form' ); ?>

		<?php if ( ! $load_address ) : ?>
			<?php wc_get_template( 'myaccount/my-address.php' ); ?>
		<?php else : ?>

			<form method="post">

				<h3><?php echo apply_filters( 'woocommerce_my_account_edit_address_title', $page_title ); ?></h3>

				<?php do_action( "woocommerce_before_edit_address_form_{$load_address}" ); ?>

				<?php foreach ( $address as $key => $field ) : ?>

					<?php woocommerce_form_field( $key, $field, ! empty( $_POST[ $key ] ) ? wc_clean( $_POST[ $key ] ) : $field['value'] ); ?>

				<?php endforeach; ?>

				<?php do_action( "woocommerce_after_edit_address_form_{$load_address}" ); ?>

				<p>
					<input type="submit" class="button" name="save_address" value="<?php esc_attr_e( 'Save Address', 'woocommerce' ); ?>" />
					<?php wp_nonce_field( 'woocommerce-edit_address' ); ?>
					<input type="hidden" name="action" value="edit_address" />
				</p>

			</form>

		<?php endif; ?>

		<?php do_action( 'woocommerce_after_edit_account_address_form' ); ?>

	</div>
</div>
