<?php
/**
 * Edit address form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-address.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.3.0
 */

defined( 'ABSPATH' ) || exit;

$page_title = ( 'billing' === $load_address ) ? esc_html__( 'Billing address', 'woocommerce' ) : esc_html__( 'Shipping address', 'woocommerce' );
$user_id = get_current_user_id();

do_action( 'woocommerce_before_edit_account_address_form' ); ?>

<?php if ( ! $load_address ) : ?>
	<?php wc_get_template( 'myaccount/my-address.php' ); ?>
<?php else : ?>

	<h2 class="mb-4">
		<?php echo apply_filters( 'woocommerce_my_account_edit_address_title', $page_title, $load_address ); ?>
	</h2>

	<div class="box">
		<form method="post" class="form-green">
			<div class="form-group">
				<label for="<?php echo $load_address; ?>_first_name">Keresztnév <span class="required">*</span></label>
				<input type="text" name="<?php echo $load_address; ?>_first_name" id="<?php echo $load_address; ?>_first_name" value="<?php echo esc_attr( get_user_meta( get_current_user_id(), $load_address . '_first_name', true ) ); ?>">
			</div>

			<div class="form-group">
				<label for="<?php echo $load_address; ?>_last_name">Vezetéknév <span class="required">*</span></label>
				<input type="text" name="<?php echo $load_address; ?>_last_name" id="<?php echo $load_address; ?>_last_name" value="<?php echo esc_attr( get_user_meta( get_current_user_id(), $load_address . '_last_name', true ) ); ?>">
			</div>

			<div class="form-group">
				<label for="<?php echo $load_address; ?>_postcode">Irányítószám <span class="required">*</span></label>
				<input type="text" name="<?php echo $load_address; ?>_postcode" id="<?php echo $load_address; ?>_postcode" value="<?php echo esc_attr( get_user_meta( get_current_user_id(), $load_address . '_postcode', true ) ); ?>">
			</div>

			<div class="form-group">
				<label for="<?php echo $load_address; ?>_city">Város <span class="required">*</span></label>
				<input type="text" name="<?php echo $load_address; ?>_city" id="<?php echo $load_address; ?>_city" value="<?php echo esc_attr( get_user_meta( get_current_user_id(), $load_address . '_city', true ) ); ?>">
			</div>

			<div class="form-group">
				<label for="<?php echo $load_address; ?>_address_1">Cím <span class="required">*</span></label>
				<input type="text" name="<?php echo $load_address; ?>_address_1" id="<?php echo $load_address; ?>_address_1" value="<?php echo esc_attr( get_user_meta( get_current_user_id(), $load_address . '_address_1', true ) ); ?>">
			</div>

			<div class="form-group">
				<label for="<?php echo $load_address; ?>_state">Megye</label>
				<select name="<?php echo $load_address; ?>_state" id="<?php echo $load_address; ?>_state">
					<?php
					$states = WC()->countries->get_states( 'HU' );
					$current = get_user_meta( get_current_user_id(), '<?php echo $load_address; ?>_state', true );
					foreach ( $states as $code => $name ) {
						printf(
							'<option value="%s"%s>%s</option>',
							esc_attr( $code ),
							selected( $current, $code, false ),
							esc_html( $name )
						);
					}
					?>
				</select>
			</div>

			<?php wp_nonce_field( 'woocommerce-edit_address', 'woocommerce-edit-address-nonce' ); ?>
			<input type="hidden" name="action" value="edit_address" />
			<input type="hidden" name="load_address" value="<?php echo $load_address; ?>" />

			<div class="text-right">
				<button type="submit" class="cta cta-primary">Cím mentése</button>
			</div>
		</form>

	</div>

<?php endif; ?>

<?php do_action( 'woocommerce_after_edit_account_address_form' ); ?>
