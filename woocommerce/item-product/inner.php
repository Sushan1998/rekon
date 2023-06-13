<?php 
global $product;
$product_id = $product->get_id();
?>
<div class="product-block grid" data-product-id="<?php echo esc_attr($product_id); ?>">
    <div class="grid-inner">
        <div class="block-inner">
            <figure class="image">
                <?php
                    $image_size = isset($image_size) ? $image_size : 'woocommerce_thumbnail';
                    rekon_product_image($image_size);
                ?>

                <?php
                    remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
                    remove_action('woocommerce_before_shop_loop_item_title', 'rekon_swap_images', 10);
                    do_action( 'woocommerce_before_shop_loop_item_title' );
                ?>
            </figure>
            
            <div class="groups-button clearfix">
                <?php
                    if ( class_exists( 'YITH_WCWL' ) ) {
                        echo do_shortcode( '[yith_wcwl_add_to_wishlist]' );
                    }
                ?>
                <?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
                
                <?php if (rekon_get_config('show_quickview', false)) { ?>
                    <div class="view">
                        <a href="#" class="quickview" data-product_id="<?php echo esc_attr($product_id); ?>" data-toggle="modal" data-target="#apus-quickview-modal">
                            <i class="fas fa-eye"></i>
                        </a>
                    </div>
                <?php } ?>
            </div> 
        </div>
        <div class="metas clearfix">
            <div class="clearfix">     
                <div class="products-grid-meta">
                    <h3 class="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <?php
                        $rating_html = wc_get_rating_html( $product->get_average_rating() );
                        if ( $rating_html ) {
                            ?>
                            <div class="rating">
                                <?php echo trim( $rating_html ); ?>
                            </div>
                            <?php
                        }
                    ?>
                </div>

                <?php
                    /**
                    * woocommerce_after_shop_loop_item_title hook
                    *
                    * @hooked woocommerce_template_loop_rating - 5
                    * @hooked woocommerce_template_loop_price - 10
                    */
                    remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating', 5);
                    do_action( 'woocommerce_after_shop_loop_item_title');
                ?>
            </div>
        </div>
    </div>
</div>