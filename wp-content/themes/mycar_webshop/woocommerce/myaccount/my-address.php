<?php
/**
 * My Addresses
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-address.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.3.0
 */

defined( 'ABSPATH' ) || exit;

$customer_id = get_current_user_id();

if ( ! wc_ship_to_billing_address_only() && wc_shipping_enabled() ) {
	$get_addresses = apply_filters(
		'woocommerce_my_account_get_addresses',
		array(
			'billing'  => __( 'Billing address', 'woocommerce' ),
			'shipping' => __( 'Shipping address', 'woocommerce' ),
		),
		$customer_id
	);
} else {
	$get_addresses = apply_filters(
		'woocommerce_my_account_get_addresses',
		array(
			'billing' => __( 'Billing address', 'woocommerce' ),
		),
		$customer_id
	);
}
?>

<p>
	<?php echo apply_filters( 'woocommerce_my_account_my_address_description', esc_html__( 'The following addresses will be used on the checkout page by default.', 'woocommerce' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
</p>

<?php foreach ( $get_addresses as $name => $address_title ) : ?>
	<?php
		$fields = [
			'first_name',
			'last_name',
			'company',
			'address_1',
			'address_2',
			'city',
			'postcode',
			'state',
			'country',
			'phone',
			'email'
		];

		$address = wc_get_account_formatted_address( $name );
		$addresses = [];

		foreach ( $fields as $field ) {
			$value = get_user_meta( $customer_id, "{$name}_{$field}", true );
			$addresses[$field] = esc_html( $value );
		}
	?>

	<table class="table-green mb-4">
		<tr>
			<th colspan="2"><?php echo esc_html( $address_title ); ?></th>
		</tr>
		<tr>
			<td><strong>Név:</strong></td>
			<td><?php echo $addresses['first_name'] . ' ' . $addresses['last_name']; ?></td>
		</tr>
		<?php if($addresses['company']): ?>
		<tr>
			<td><strong>Cégnév:</strong></td>
			<td><?php echo $addresses['company']; ?></td>
		</tr>
		<?php endif; ?>
		<tr>
			<td><strong>Email cím:</strong></td>
			<td><?php echo $addresses['email']; ?></td>
		</tr>
		<tr>
			<td><strong>Telefonszám:</strong></td>
			<td><?php echo $addresses['phone']; ?></td>
		</tr>
		<tr>
			<td><strong>Cím:</strong></td>
			<td><?php echo $addresses['country'] . ' ' . $addresses['postcode'] . ', ' . $addresses['city'] . ' ' . $addresses['address_1'] . ' ' . $addresses['address_2']; ?></td>
		</tr>
		<tr>
			<td colspan="2" class="text-right">
				<a href="<?php echo esc_url( wc_get_endpoint_url( 'edit-address', $name ) ); ?>" class="btn btn-sm btn-primary">
					<?php
						printf(
							/* translators: %s: Address title */
							$address ? esc_html__( 'Edit %s', 'woocommerce' ) : esc_html__( 'Add %s', 'woocommerce' ),
							esc_html( $address_title )
						);
					?>
				</a>
			</td>
		</tr>
	</table>
<?php endforeach; ?>

<?php do_action( 'woocommerce_my_account_after_my_address', $name );?>
