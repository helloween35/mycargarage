<?php
/**
 * View Order
 *
 * Shows the details of a particular order on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/view-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

defined( 'ABSPATH' ) || exit;
 
$notes = $order->get_customer_order_notes();

switch($order->get_status()) {
	case 'pending':
		$notifyClass = 'info';
		$notifyMessage = 'Függőben lévő fizetés!'; 
		break;

	case 'failed':
		$notifyClass = 'danger';
		$notifyMessage = 'Sikertelen fizetés!'; 
		break;

	case 'processing':
		$notifyClass = 'info';
		$notifyMessage = 'Fizetve, teljesítés alatt!'; 
		break;

	case 'completed':
		$notifyClass = 'success';
		$notifyMessage = 'Teljesítve!'; 
		break;
	
	case 'cancelled':
		$notifyClass = 'error';
		$notifyMessage = 'Megrendelés lemondva!'; 
		break;

	case 'on-hold':
		$notifyClass = 'info';
		$notifyMessage = 'Visszatartva!'; 
		break;

	case 'refounded':
		$notifyClass = 'info';
		$notifyMessage = 'Visszatérítve!'; 
		break;

	default:
		$notifyClass = 'secondary';
		$notifyMessage = 'Feldolgozás alatt!'; 
}

echo '<div class="woocommerce-' . $notifyClass . '">' . $notifyMessage . '</div>';

?>

<?php if ( $notes ) : ?>
	<h2><?php esc_html_e( 'Order updates', 'woocommerce' ); ?></h2>
	<ol class="woocommerce-OrderUpdates commentlist notes">
		<?php foreach ( $notes as $note ) : ?>
		<li class="woocommerce-OrderUpdate comment note">
			<div class="woocommerce-OrderUpdate-inner comment_container">
				<div class="woocommerce-OrderUpdate-text comment-text">
					<p class="woocommerce-OrderUpdate-meta meta"><?php echo date_i18n( esc_html__( 'l jS \o\f F Y, h:ia', 'woocommerce' ), strtotime( $note->comment_date ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
					<div class="woocommerce-OrderUpdate-description description">
						<?php echo wpautop( wptexturize( $note->comment_content ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
		</li>
		<?php endforeach; ?>
	</ol>
<?php endif; ?>

<?php do_action( 'woocommerce_view_order', $order_id ); ?>
