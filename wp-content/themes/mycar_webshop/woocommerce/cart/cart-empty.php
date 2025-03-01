<div class="woocommerce-info my-4">
    A kosarad jelenleg üres!
</div>


<div class="row">
	<div class="col-12 mt-4">
		<p>
			Nézz szét kiemelt termékeink közt, vagy folytasd a böngészést a vásárlás folytatása gombra kattintva.
		</p>
	</div>
	<?php product_list(['product_num' => 4]); ?>
</div>



<?php

defined( 'ABSPATH' ) || exit;

if ( wc_get_page_id( 'shop' ) > 0 ) : ?>
	<p class="return-to-shop d-flex justify-content-end mt-5">
		<a class="cta cta-primary <?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
			<?php
				/**
				 * Filter "Return To Shop" text.
				 *
				 * @since 4.6.0
				 * @param string $default_text Default text.
				 */
				echo esc_html( apply_filters( 'woocommerce_return_to_shop_text', __( 'Return to shop', 'woocommerce' ) ) );
			?>
		</a>
	</p>
<?php endif; ?>
