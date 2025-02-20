<?php
defined('ABSPATH') || exit;
?>
<div class="cart-summarize">
    <div class="row">
        <div class="col-12 col-md-9">
            <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
                <table class="shop_table cart woocommerce-cart-form__contents">
                    <thead>
                        <tr>
							<th></th>
                            <th>Termék</th>
                            <th>Mennyiség</th>
                            <th class="product-price">Összesen</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item): ?>
                        <?php 
                            $product = $cart_item['data'];
                            $product_permalink = get_permalink($product->get_id());
                        ?>
                        <tr class="woocommerce-cart-form__cart-item cart_item">
							<td>
								<?php echo $product->get_image('thumbnail'); ?>
							</td>
                            <td class="product-name">
                                <a href="<?php echo esc_url($product_permalink); ?>">
                                    <?php echo esc_html($product->get_name()); ?>
                                </a>
                            </td>
                            <td class="product-quantity" data-title="Mennyiség">
								<?php 
									woocommerce_quantity_input(array(
										'input_name'  => "cart[{$cart_item_key}][qty]",
										'input_value' => $cart_item['quantity'],
										'min_value'   => 1,
										'max_value'   => $product->get_max_purchase_quantity(),
										'classes'     => ['input-text', 'qty', 'text'] // Itt adjuk hozzá a Woo által elvárt osztályokat
									), $product);
								?>
                            </td>
                            <td class="product-subtotal product-price"><?php echo wc_price($cart_item['line_total']); ?></td>
                            <td class="product-remove">
                                <a href="<?php echo esc_url( wc_get_cart_remove_url( $cart_item_key ) ); ?>" 
                                   class="remove btn btn-sm btn-danger" aria-label="Termék eltávolítása"
                                   data-product_id="<?php echo esc_attr( $cart_item['product_id'] ); ?>"
                                   data-cart_item_key="<?php echo esc_attr( $cart_item_key ); ?>">
                                    <i class="fa fa-trash"></i>
                                </a> 
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="6" class="actions">
							<div>
								<button type="submit" class="button d-none" name="update_cart" value="Kosár frissítése" disabled="">Kosár frissítése</button>
								<input type="hidden" id="woocommerce-cart-nonce" name="woocommerce-cart-nonce" value="3c5ac3ecfd"><input type="hidden" name="_wp_http_referer" value="/kosar/">
							</div>
                        </td>
                    </tr>
                    </tbody>
                </table>
				<input type="hidden" name="update_cart" value="1">
            </form>
        </div>
        <div class="col-12 col-md-3">
            <div class="cart-summarize-total">
                <h4>Végösszeg: <?php echo wc_price(WC()->cart->total); ?></h4>
                <a href="<?php echo esc_url(wc_get_checkout_url()); ?>" class="cta cta-primary my-3">Tovább a pénztárhoz</a>
            </div>
        </div>
    </div>
</div>
