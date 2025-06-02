<?php
/**
 * Order Customer Details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details-customer.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.7.0
 */

defined( 'ABSPATH' ) || exit;

//$show_shipping = ! wc_ship_to_billing_address_only() && $order->needs_shipping_address();
$show_shipping = true;
?>
<section class="woocommerce-customer-details">
	<address class="text-white">
		<table class="table-green mb-4">
			<tr>
				<th colspan="2"><?php esc_html_e( 'Számlázási adatok', 'woocommerce' ); ?></th>
			</tr>
			<tr>
				<td><strong>Számlázási név:</strong></td>
				<td><?php echo $order->get_billing_first_name() . ' ' . $order->get_billing_last_name(); ?></td>
			</tr>
			<tr>
				<td><strong>Cégnév:</strong></td>
				<td><?php echo $order->get_billing_company() ? $order->get_billing_company() : '-'; ?></td>
			</tr>
			<tr>
				<td><strong>Telefonszám:</strong></td>
				<td><?php echo $order->get_billing_phone(); ?></td>
			</tr>
			<tr>
				<td><strong>Email cím:</strong></td>
				<td><?php echo $order->get_billing_email(); ?></td>
			</tr>
			<tr>
				<td><strong>Számlázási cím:</strong></td>
				<td>
					<?php echo $order->get_billing_country() . ' ' . $order->get_billing_postcode() . ', ' . $order->get_billing_city(); ?> <br />
					<?php echo $order->get_billing_address_1() . ' ' . $order->get_billing_address_2(); ?> 
				</td>
			</tr>
		</table>
	</addess>

	<?php if ( $show_shipping ) : ?>
		<address class="text-white">
			<table class="table-green mb-5">
				<tr>
					<th colspan="2"><?php esc_html_e( 'Szállítási adatok', 'woocommerce' ); ?></th>
				</tr>
				<tr>
					<td><strong>Név:</strong></td>
					<td><?php echo $order->get_shipping_first_name() . ' ' . $order->get_shipping_last_name(); ?></td>
				</tr>
				<tr>
					<td><strong>Cégnév:</strong></td>
					<td><?php echo $order->get_shipping_company() ? $order->get_shipping_company() : '-'; ?></td>
				</tr>
				<tr>
					<td><strong>Szállítási cím:</strong></td>
					<td>
						<?php echo $order->get_shipping_country() . ' ' . $order->get_shipping_postcode() . ', ' . $order->get_shipping_city(); ?> <br />
						<?php echo $order->get_shipping_address_1() . ' ' . $order->get_shipping_address_2(); ?> 
					</td>
				</tr>
			</table>
		</addess>
	<?php endif; ?>

	<?php
		/**
		 * Action hook fired after an address in the order customer details.
		 *
		 * @since 8.7.0
		 * @param string $address_type Type of address (billing or shipping).
		 * @param WC_Order $order Order object.
		 */
		do_action( 'woocommerce_order_details_after_customer_address', 'billing', $order );

		do_action( 'woocommerce_order_details_after_customer_details', $order );
	?>

</section>
