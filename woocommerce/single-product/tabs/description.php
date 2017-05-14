<?php
/**
 * Description tab
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product,$post;

$heading = esc_html( apply_filters( 'woocommerce_product_description_heading', __( 'Product Description', 'woocommerce' ) ) );

?>

<?php if ( $heading ): ?>
  <h2><?php echo $heading; ?></h2>
<?php endif; ?>

<?php the_content(); ?>

<h2>Параметры и тип:</h2>
<?php $product->list_attributes(); ?>
