<?php 
global $product;
$product_id = $product->get_id();
$image_size = isset($image_size) ? $image_size : 'woocommerce_thumbnail';
?>
<div class="product-block product-block-list" data-product-id="<?php echo esc_attr($product_id); ?>">
	
	<div class="row flex-middle-sm">
		<div class="col-xs-12 col-sm-4 col-lg-4">	
			<div class="wrapper-image">
				<?php if (rekon_get_config('show_quickview', false)) { ?>
		            <a href="#" class="quickview" data-product_id="<?php echo esc_attr($product_id); ?>" data-toggle="modal" data-target="#apus-quickview-modal">
		                <?php echo esc_html('quick view','rekon'); ?>
		            </a>
		        <?php } ?>
			    <figure class="image">
			        <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" class="product-image">
			            <?php
			                /**
			                * woocommerce_before_shop_loop_item_title hook
			                *
			                * @hooked woocommerce_show_product_loop_sale_flash - 10
			                * @hooked woocommerce_template_loop_product_thumbnail - 10
			                */
			                remove_action('woocommerce_before_shop_loop_item_title','woocommerce_show_product_loop_sale_flash', 10);
			                do_action( 'woocommerce_before_shop_loop_item_title' );
			            ?>
			        </a>
			        <?php do_action('rekon_woocommerce_before_shop_loop_item'); ?>
			    </figure>
			    <?php do_action( 'woocommerce_after_shop_loop_item' ); ?>				        
			</div> 
		</div>
		<div class="col-xs-12 col-sm-8 col-lg-8">
		    <div class="wrapper-info">
		    	<div class="top-list-info">
			    	<h3 class="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			    	<?php
			            /**
			            * woocommerce_after_shop_loop_item_title hook
			            *
			            * @hooked woocommerce_template_loop_rating - 5
			            * @hooked woocommerce_template_loop_price - 10
			            */
			            remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating', 5);
			            remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price', 10);
			            do_action( 'woocommerce_after_shop_loop_item_title');
			        ?>
		            <div class="rating clearfix">
		                <?php
		                    $rating_html = wc_get_rating_html( $product->get_average_rating() );
		                    $count = $product->get_rating_count();
		                    if ( $rating_html ) {
		                        echo trim( $rating_html );
		                    } else {
		                        echo '<div class="star-rating"></div>';
		                    }
		                    echo '<span class="counts">('.$count.')</span>';
		                ?>
		            </div>
		        </div>
		        <?php 
					do_action('rekon_list_shipping_info');
					add_action( 'rekon_list_price', 'woocommerce_template_loop_price', 10 );
					do_action('rekon_list_price');
				?>				
				<div class="product-excerpt">
		           <?php echo rekon_substring( get_the_excerpt(), 20, '...' ); ?>
		        </div>		        
			</div>
		</div>
	</div>
</div>