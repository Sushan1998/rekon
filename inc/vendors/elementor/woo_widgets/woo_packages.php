<?php

//namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Rekon_Elementor_Woo_Package extends Elementor\Widget_Base {

    public function get_name() {
        return 'apus_elementor_woo_package';
    }

    public function get_title() {
        return esc_html__( 'Apus Pricing Packages', 'rekon' );
    }
    
    public function get_categories() {
        return [ 'rekon-elements' ];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Content', 'rekon' ),
                'tab' => Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'number',
            [
                'label' => esc_html__( 'Number', 'rekon' ),
                'type' => Elementor\Controls_Manager::TEXT,
                'input_type' => 'number',
                'default' => '3'
            ]
        );
        
        $this->add_control(
            'el_class',
            [
                'label'         => esc_html__( 'Extra class name', 'rekon' ),
                'type'          => Elementor\Controls_Manager::TEXT,
                'placeholder'   => esc_html__( 'If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'rekon' ),
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'section_title_style',
            [
                'label' => esc_html__( 'Style', 'rekon' ),
                'tab' => Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'bg_color',
            [
                'label' => esc_html__( 'Background Color', 'rekon' ),
                'type' => Elementor\Controls_Manager::COLOR,
                'selectors' => [                    
                    '{{WRAPPER}} .package-wrapper' => 'background-color: {{VALUE}};',
                ],
            ]
        );


    }

    protected function render() {
        $settings = $this->get_settings();

        extract( $settings );
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => $number,
            'post_status' => 'publish',
            'meta_query' => array(
                array(
                   'key' => '_rekon_package',
                   'value' => 'yes',
                   'compare' => '=',
                )
            )
        );
        $loop = new WP_Query($args);
        if ( $loop->have_posts() ) {
            $i = 0;
            ?>
            <div class="header-woo-pricing <?php echo esc_attr($el_class); ?>">
                <div class="row">
                    <?php while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="package-wrapper <?php echo esc_attr($i%2 == 1 ? 'main-product' : ''); ?>">
                                <div class="package-wrapper-inner">
                                    <div class="package-meta">
                                        <h3 class="title"><?php the_title(); ?></h3>
                                    </div>
                                    <div class="price-wrapper">
                                        <?php
                                            /**
                                            * woocommerce_after_shop_loop_item_title hook
                                            *
                                            * @hooked woocommerce_template_loop_rating - 5
                                            * @hooked woocommerce_template_loop_price - 10
                                            */
                                            remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating',5);
                                            do_action( 'woocommerce_after_shop_loop_item_title');
                                        ?>
                                    </div>
                                    
                                    <div class="description"><?php the_content(); ?></div>

                                    <div class="add-to-cart-wrapper">
                                        <?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php $i++; endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            </div>
            <?php
        }
    }

}

if ( version_compare(ELEMENTOR_VERSION, '3.5.0', '<') ) {
    Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Rekon_Elementor_Woo_Package );
} else {
    Elementor\Plugin::instance()->widgets_manager->register( new Rekon_Elementor_Woo_Package );
}