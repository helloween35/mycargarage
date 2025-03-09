<?php
defined('ABSPATH') || exit;

$order_button_text = apply_filters('woocommerce_order_button_text', __('Megrendelem', 'woocommerce'));
?>

<form name="checkout" autocomplete="off" method="post" class="checkout-form form-green" action="<?php echo esc_url(wc_get_checkout_url()); ?>">
    <div class="row">
        <div class="col-md-7 order-1 order-md-0 mb-5">
            <h3 class="mt-5">Számlázási adatok</h3>

			<div class="form-group">
				<label for="billing_first_name">Keresztnév: *</label>
				<input type="text" class="form-control" autocomplete="of" name="billing_first_name" id="billing_first_name" value="<?php echo esc_attr(WC()->checkout->get_value('billing_first_name')); ?>" required>
			</div>

			<div class="form-group">
				<label for="billing_last_name">Vezetéknév: *</label>
				<input type="text"  class="form-control" autocomplete="of" name="billing_last_name" id="billing_last_name" value="<?php echo esc_attr(WC()->checkout->get_value('billing_last_name')); ?>" required>
			</div>

			<div class="form-group">
				<label for="billing_email">Email: *</label>
				<input type="email"  class="form-control" autocomplete="of" name="billing_email" id="billing_email" value="<?php echo esc_attr(WC()->checkout->get_value('billing_email')); ?>" required>
			</div>

			<div class="form-group">
				<label for="billing_phone">Telefon: *</label>
				<input type="text"  class="form-control" autocomplete="of" name="billing_phone" id="billing_phone" value="<?php echo esc_attr(WC()->checkout->get_value('billing_phone')); ?>" required>
			</div>
		

			<?php /* Default hungary, ezt ha kell, később select-re kell cserélni */ ?>
			<input type="hidden" name="billing_country" id="billing_country" value="HU" aria-required="true" autocomplete="country" class="country_to_state" readonly="readonly" />

			<div class="form-group">
				<label for="billing_city">Város: *</label>
				<input type="text" class="form-control" autocomplete="of" name="billing_city" id="billing_city" value="<?php echo esc_attr(WC()->checkout->get_value('billing_city')); ?>" required>
			</div>

			<div class="form-group">
				<label for="billing_postcode">Irányítószám: *</label>
				<input type="text" class="form-control" name="billing_postcode" id="billing_postcode" placeholder="" value="<?php echo esc_attr(WC()->checkout->get_value('billing_postcode')); ?>" aria-required="true" autocomplete="postal-code" />
			</div>

			<div class="form-group">
				<label for="billing_address_1" class="">Utca, házszám: *</label>
				<span class="woocommerce-input-wrapper">
					<input
						type="text"
						class="form-control"
						name="billing_address_1"
						value="<?php echo esc_attr(WC()->checkout->get_value('billing_postcode')); ?>"
						required
					/>
				</span>
			</div>

            <h3 class="mt-5">Szállítási adatok</h3>

			<div class="form-group">
				<label for="shipping_first_name">Keresztnév: *</label>
				<input type="text" class="form-control" autocomplete="of" name="shipping_first_name" id="shipping_first_name" value="<?php echo esc_attr(WC()->checkout->get_value('shipping_first_name')); ?>">
			</div>

			<div class="form-group">
				<label for="shipping_last_name">Vezetéknév: *</label>
				<input type="text" class="form-control" autocomplete="of" name="shipping_last_name" id="shipping_last_name" value="<?php echo esc_attr(WC()->checkout->get_value('shipping_last_name')); ?>">
			</div>

			<div class="form-group">
				<label for="shipping_address_1">Cím: *</label>
				<input type="text" class="form-control" autocomplete="of" name="shipping_address_1" id="shipping_address_1" value="<?php echo esc_attr(WC()->checkout->get_value('shipping_address_1')); ?>">
			</div>

			<div class="payment-methods">
				<?php wc_get_template('checkout/payment.php', array('order_button_text' => $order_button_text)); ?>
			</div>
		</div>

		<div class="col-md-5 order-0 order-md-1">
			<div class="order-review">
				<?php wc_get_template('checkout/review-order.php'); ?>
			</div>
		</div>
    </div>

	<?php wp_nonce_field('woocommerce-process_checkout', 'woocommerce-process-checkout-nonce'); ?>
</form>
