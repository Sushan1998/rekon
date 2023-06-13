<?php

//namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Rekon_Elementor_User_Info extends Elementor\Widget_Base {

	public function get_name() {
        return 'rekon_user_info';
    }

	public function get_title() {
        return esc_html__( 'Apus Header User Info', 'rekon' );
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

   		$this->add_control(
            'el_class',
            [
                'label'         => esc_html__( 'Extra class name', 'rekon' ),
                'type'          => Elementor\Controls_Manager::TEXT,
                'placeholder'   => esc_html__( 'If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'rekon' ),
            ]
        );
        
        $this->add_responsive_control(
            'align',
            [
                'label' => esc_html__( 'Alignment', 'rekon' ),
                'type' => Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'flex-start' => [
                        'title' => esc_html__( 'Left', 'rekon' ),
                        'icon' => 'fas fa-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'rekon' ),
                        'icon' => 'fas fa-align-center',
                    ],
                    'flex-end' => [
                        'title' => esc_html__( 'Right', 'rekon' ),
                        'icon' => 'fas fa-align-right',
                    ],
                ],
                'selectors' => [                    
                    '{{WRAPPER}} .top-wrapper-menu' => 'justify-content: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_title_style',
            [
                'label' => esc_html__( 'Styles', 'rekon' ),
                'tab' => Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'link_color',
            [
                'label' => esc_html__( 'Link Color', 'rekon' ),
                'type' => Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    // Stronger selector to avoid section style from overwriting
                    '{{WRAPPER}} .top-wrapper-menu a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .top-wrapper-menu a i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

	protected function render() {
        $settings = $this->get_settings();

        extract( $settings );

        if ( is_user_logged_in() ) { ?>
            <?php if( has_nav_menu( 'my-account' ) ) { ?>
                <div class="top-wrapper-menu <?php echo esc_attr($el_class); ?>">
                    <a class="drop-dow" href=""><i class="fas fa-user"></i> <?php esc_html_e('My Account', 'rekon'); ?></a>
                    <?php
                    if ( has_nav_menu( 'my-account' ) ) {
                        $args = array(
                            'theme_location' => 'my-account',
                            'container_class' => 'inner-top-menu',
                            'menu_class' => 'nav navbar-nav topmenu-menu',
                            'fallback_cb' => '',
                            'menu_id' => '',
                            'walker' => new Rekon_Nav_Menu()
                        );
                        wp_nav_menu($args);
                    }
                    ?>
                </div>
            <?php } ?>
        <?php } else { ?>
            <div class="top-wrapper-menu <?php echo esc_attr($el_class); ?>">
                <a class="login" href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_html_e('Sign in','rekon'); ?>"><i class="fas fa-user"></i><?php esc_html_e('Login', 'rekon'); ?>
                </a>
                <a class="register" href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_html_e('Register','rekon'); ?>"><i class="fas fa-sign-out-alt"></i><?php esc_html_e('Register', 'rekon'); ?>
                </a>
            </div>
        <?php }
    }

}

if ( version_compare(ELEMENTOR_VERSION, '3.5.0', '<') ) {
    Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Rekon_Elementor_User_Info );
} else {
    Elementor\Plugin::instance()->widgets_manager->register( new Rekon_Elementor_User_Info );
}