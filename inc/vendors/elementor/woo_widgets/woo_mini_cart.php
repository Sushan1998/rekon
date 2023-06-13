<?php

//namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Rekon_Elementor_Woo_Mini_Cart extends Elementor\Widget_Base {

    public function get_name() {
        return 'apus_elementor_woo_mini_cart';
    }

    public function get_title() {
        return esc_html__( 'Apus Header Mini Cart', 'rekon' );
    }
    
    public function get_categories() {
        return [ 'rekon-header-elements' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Content', 'rekon' ),
                'tab' => Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label' => esc_html__( 'Alignment', 'rekon' ),
                'type' => Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'rekon' ),
                        'icon' => 'fas fa-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'rekon' ),
                        'icon' => 'fas fa-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'rekon' ),
                        'icon' => 'fas fa-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}};',
                ],
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
                'label' => esc_html__( 'Title', 'rekon' ),
                'tab' => Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'rekon' ),
                'type' => Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    // Stronger selector to avoid section style from overwriting
                    '{{WRAPPER}} .mini-cart' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_size',
            [
                'label' => esc_html__( 'Icon Size', 'rekon' ),
                'type' => Elementor\Controls_Manager::NUMBER,
                'selectors' => [                    
                    '{{WRAPPER}} .mini-cart' => 'font-size: {{VALUE}}px;',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {

        $settings = $this->get_settings();

        extract( $settings );

        $add_class = '';
        if ( !empty($align) ) {
            $add_class = 'menu-'.$align;
        }
        ?>
        <div class="header-button-woo clearfix <?php echo esc_attr($add_class.' '.$el_class); ?>">
            <?php
            global $woocommerce;
            if ( is_object($woocommerce) && is_object($woocommerce->cart) ) {
            ?>
                <div class="apus-topcart">
                    <div class="cart">
                        <a class="dropdown-toggle mini-cart" data-toggle="dropdown" aria-expanded="true" href="#" title="<?php esc_attr_e('View your shopping cart', 'rekon'); ?>">                            
                            <span class="count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="widget_shopping_cart_content">
                                <?php woocommerce_mini_cart(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <?php
    }

}

if ( version_compare(ELEMENTOR_VERSION, '3.5.0', '<') ) {
    Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Rekon_Elementor_Woo_Mini_Cart );
} else {
    Elementor\Plugin::instance()->widgets_manager->register( new Rekon_Elementor_Woo_Mini_Cart );
}