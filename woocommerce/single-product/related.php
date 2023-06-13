<?php
/**
 * Related Products
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$show_product_releated = rekon_get_config('show_product_releated', true);
if ( !$show_product_releated  ) {
    return;
}

global $product;

if ( empty( $product ) || ! $product->exists() ) {
	return;
}
$columns = rekon_get_config('releated_product_columns', 4);


if ( $related_products ) : ?>
	<div class="related products">
		<div class="woocommerce">
			<h3 class="widget-title"><?php esc_html_e( 'Related Products', 'rekon' ); ?></h3>

			<?php
			$small_cols = $columns <= 1 ? 1 : 2; 
			?>
			<div class="slick-carousel products slick-carousel-top" data-carousel="slick" data-items="<?php echo esc_attr($columns); ?>"
			    <?php echo trim($columns >= 8 ? 'data-large="6"' : ''); ?> 
			    <?php echo trim($columns >= 5 ? 'data-medium="4" data-large="4" ' : ''); ?> 
			    <?php echo trim( $columns >= 2 ? 'data-extrasmall="2"' : 'data-extrasmall="1"'); ?> 
			    data-smallmedium="<?php echo esc_attr($small_cols); ?>"
			    data-pagination="false" data-nav="true" data-rows="1">

				<?php foreach ( $related_products as $related_product ) : ?>

					<?php
					$post_object = get_post( $related_product->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found
					?>

		            <div class="product clearfix">
		                <?php wc_get_template_part( 'item-product/inner' ); ?>
		            </div>

				<?php endforeach; ?>
			</div>
		</div>
	</div>
<?php endif;
wp_reset_postdata();

