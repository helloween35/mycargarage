<?php
defined('ABSPATH') || exit;
?>
<div class="cart">
    <div class="row">
        <div class="col-12 col-md-7">
            <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
                <table class="shop_table cart woocommerce-cart-form__contents">
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
                        <tr class="woocommerce-cart-form__cart-item cart_item">
                            <td class="product-name">
                                <a href="<?php echo esc_url($product_permalink); ?>">
                                    <?php echo $product->get_image('thumbnail'); ?>
                                    <?php echo esc_html($product->get_name()); ?>
                                </a>
                            </td>
                            <td class="product-price"><?php echo wc_price($product->get_price()); ?></td>
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
								<button type="submit" class="button" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>">
									<?php esc_html_e( 'Update cart', 'woocommerce' ); ?>
								</button>
                            </td>
                            <td class="product-subtotal"><?php echo wc_price($cart_item['line_total']); ?></td>
                            <td class="product-remove">
                                <a href="<?php echo esc_url( wc_get_cart_remove_url( $cart_item_key ) ); ?>" 
                                   class="remove cta cta-danger delete" aria-label="Termék eltávolítása"
                                   data-product_id="<?php echo esc_attr( $cart_item['product_id'] ); ?>"
                                   data-cart_item_key="<?php echo esc_attr( $cart_item_key ); ?>">
                                    ×
                                </a> 
                            </td>
                        </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>
				<input type="hidden" name="update_cart" value="1">
            </form>
        </div>
        <div class="col-12 col-md-5">
            <div class="cart-total">
                <h4>Végösszeg: <?php echo wc_price(WC()->cart->total); ?></h4>
                <a href="<?php echo esc_url(wc_get_checkout_url()); ?>" class="cta cta-primary my-3">Tovább a pénztárhoz</a>
            </div>
        </div>
    </div>
</div>
