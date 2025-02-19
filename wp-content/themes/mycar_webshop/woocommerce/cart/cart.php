<?php
defined('ABSPATH') || exit;

?>
<div class="cart">
	<div class="row">
		<div class="col-12 col-md-7">
			<table class="cart-table">
				<thead>
					<tr>
						<th>Termék</th>
						<th>Ár</th>
						<th>Mennyiség</th>
						<th>Összesen</th>
						<th></th>
					</tr>
				</thead>
				<tbody>

				<?php foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item): ?>
					<?php 
						$product = $cart_item['data'];
						$product_permalink = get_permalink($product->get_id());
					?>
					<tr>
						<td>
							<a href="<?php echo esc_url($product_permalink); ?>">
								<?php echo $product->get_image('thumbnail'); ?>
								<?php echo esc_html($product->get_name()); ?>
							</a>
						</td>
						<td><?php echo wc_price($product->get_price()); ?></td>
						<td>
							<input
								type="number"
								class="form-control"
								value="<?php echo esc_attr($cart_item['quantity']); ?>" 
								min="1"
								data-cart-item-key="<?php echo esc_attr($cart_item_key); ?>"
							>
						</td>
						<td><?php echo wc_price($cart_item['line_total']); ?></td>
						<td>
							<a href="<?php echo esc_url(wc_get_cart_remove_url($cart_item_key)); ?>" class="btn btn-danger btn-sm">
								X
							</a>
						</td>
					</tr>
				<?php endforeach; ?>

				</tbody>
			</table>

		</div>
		<div class="col-12 col-md-5">
			<div class="cart-total">
				<h4>Végösszeg: <?php echo wc_price(WC()->cart->total); ?></h4>
				<a href="<?php echo esc_url(wc_get_checkout_url()); ?>" class="cta cta-primary my-3">Tovább a pénztárhoz</a>
			</div>
		</div>
	</div>
</div>