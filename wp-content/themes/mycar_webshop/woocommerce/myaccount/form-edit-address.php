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
			<?php do_action( "woocommerce_before_edit_address_form_{$load_address}" ); ?>

			<div class="woocommerce-address-fields__field-wrapper">

				<p class="form-row form-row-first">
					<label for="<?php echo $load_address; ?>_first_name"><?php esc_html_e( 'First name', 'woocommerce' ); ?> <span class="required">*</span></label>
					<input type="text" name="<?php echo $load_address; ?>_first_name" id="<?php echo $load_address; ?>_first_name" value="<?php echo esc_attr( get_user_meta( $user_id, "{$load_address}_first_name", true ) ); ?>" />
				</p>

				<p class="form-row form-row-last">
					<label for="<?php echo $load_address; ?>_last_name"><?php esc_html_e( 'Last name', 'woocommerce' ); ?> <span class="required">*</span></label>
					<input type="text" name="<?php echo $load_address; ?>_last_name" id="<?php echo $load_address; ?>_last_name" value="<?php echo esc_attr( get_user_meta( $user_id, "{$load_address}_last_name", true ) ); ?>" />
				</p>

				<p class="form-row">
					<label for="<?php echo $load_address; ?>_company"><?php esc_html_e( 'Company name', 'woocommerce' ); ?></label>
					<input type="text" name="<?php echo $load_address; ?>_company" id="<?php echo $load_address; ?>_company" value="<?php echo esc_attr( get_user_meta( $user_id, "{$load_address}_company", true ) ); ?>" />
				</p>

				<p class="form-row">
					<label for="<?php echo $load_address; ?>_country"><?php esc_html_e( 'Country', 'woocommerce' ); ?> <span class="required">*</span></label>
					<select name="<?php echo $load_address; ?>_country" id="<?php echo $load_address; ?>_country" readonly disabled>
						<?php
						$selected_country = get_user_meta( $user_id, "{$load_address}_country", true );
						foreach ( WC()->countries->get_allowed_countries() as $key => $label ) {
							printf( '<option value="%s" %s>%s</option>', esc_attr( $key ), selected( $selected_country, $key, false ), esc_html( $label ) );
						}
						?>
					</select>
				</p>

				<p class="form-row">
					<label for="<?php echo $load_address; ?>_address_1"><?php esc_html_e( 'Street address', 'woocommerce' ); ?> <span class="required">*</span></label>
					<input type="text" name="<?php echo $load_address; ?>_address_1" id="<?php echo $load_address; ?>_address_1" value="<?php echo esc_attr( get_user_meta( $user_id, "{$load_address}_address_1", true ) ); ?>" placeholder="<?php esc_attr_e( 'House number and street name', 'woocommerce' ); ?>" />
				</p>

				<p class="form-row">
					<label for="<?php echo $load_address; ?>_address_2"><?php esc_html_e( 'Apartment, suite, unit etc. (optional)', 'woocommerce' ); ?></label>
					<input type="text" name="<?php echo $load_address; ?>_address_2" id="<?php echo $load_address; ?>_address_2" value="<?php echo esc_attr( get_user_meta( $user_id, "{$load_address}_address_2", true ) ); ?>" />
				</p>

				<p class="form-row form-row-first">
					<label for="<?php echo $load_address; ?>_postcode"><?php esc_html_e( 'Postcode / ZIP', 'woocommerce' ); ?> <span class="required">*</span></label>
					<input type="text" name="<?php echo $load_address; ?>_postcode" id="<?php echo $load_address; ?>_postcode" value="<?php echo esc_attr( get_user_meta( $user_id, "{$load_address}_postcode", true ) ); ?>" />
				</p>

				<p class="form-row form-row-last">
					<label for="<?php echo $load_address; ?>_city"><?php esc_html_e( 'Town / City', 'woocommerce' ); ?> <span class="required">*</span></label>
					<input type="text" name="<?php echo $load_address; ?>_city" id="<?php echo $load_address; ?>_city" value="<?php echo esc_attr( get_user_meta( $user_id, "{$load_address}_city", true ) ); ?>" />
				</p>

				<p class="form-row">
					<label for="<?php echo $load_address; ?>_state"><?php esc_html_e( 'State / County', 'woocommerce' ); ?></label>
					<?php
						$selected_country = get_user_meta( $user_id, "{$load_address}_country", true );
						if ( empty( $selected_country ) ) {
							$selected_country = WC()->customer->get_billing_country(); // vagy shipping_country
							if ( empty( $selected_country ) ) {
								$selected_country = WC()->countries->get_base_country(); // fallback: alapértelmezett ország
							}
						}

						$selected_state   = get_user_meta( $user_id, "{$load_address}_state", true );
						$states           = WC()->countries->get_states( $selected_country );

						if ( $states ) :
					?>
						<select name="<?php echo $load_address; ?>_state" id="<?php echo $load_address; ?>_state" class="">
							<?php foreach ( $states as $state_code => $state_name ) : ?>
								<option value="<?php echo esc_attr( $state_code ); ?>" <?php selected( $selected_state, $state_code ); ?>>
									<?php echo esc_html( $state_name ); ?>
								</option>
							<?php endforeach; ?>
						</select>
					<?php else : ?>
						<input type="text" name="<?php echo $load_address; ?>_state" id="<?php echo $load_address; ?>_state" value="<?php echo esc_attr( $selected_state ); ?>" />
					<?php endif; ?>
				</p>

				<p class="form-row">
					<label for="<?php echo $load_address; ?>_phone"><?php esc_html_e( 'Phone', 'woocommerce' ); ?> <span class="required">*</span></label>
					<input type="text" name="<?php echo $load_address; ?>_phone" id="<?php echo $load_address; ?>_phone" value="<?php echo esc_attr( get_user_meta( $user_id, "{$load_address}_phone", true ) ); ?>" />
				</p>

				<?php if ( 'billing' === $load_address ) : ?>
					<p class="form-row">
						<label for="billing_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span></label>
						<input type="email" name="billing_email" id="billing_email" value="<?php echo esc_attr( get_user_meta( $user_id, "billing_email", true ) ); ?>" />
					</p>
				<?php endif; ?>
			</div>

			<?php do_action( "woocommerce_after_edit_address_form_{$load_address}" ); ?>

			<p>
				<button type="submit" class="cta cta-primary <?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="save_address" value="<?php esc_attr_e( 'Save address', 'woocommerce' ); ?>"><?php esc_html_e( 'Save address', 'woocommerce' ); ?></button>
				<?php wp_nonce_field( 'woocommerce-edit_address', 'woocommerce-edit-address-nonce' ); ?>
				<input type="hidden" name="action" value="edit_address" />
			</p>

		</form>
	</div>

<?php endif; ?>

<?php do_action( 'woocommerce_after_edit_account_address_form' ); ?>
