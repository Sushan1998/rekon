<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Rekon_Elementor_Mailchimp extends Widget_Base {

	public function get_name() {
        return 'apus_element_mailchimp';
    }

	public function get_title() {
        return esc_html__( 'Apus MailChimp Sign-Up Form', 'rekon' );
    }
    
	public function get_categories() {
        return [ 'rekon-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'MailChimp Sign-Up Form', 'rekon' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'rekon' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Enter your title here', 'rekon' ),
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label' => esc_html__( 'Sub Title', 'rekon' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Enter your sub title here', 'rekon' ),
            ]
        );

   		$this->add_control(
            'el_class',
            [
                'label'         => esc_html__( 'Extra class name', 'rekon' ),
                'type'          => Controls_Manager::TEXT,
                'placeholder'   => esc_html__( 'If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'rekon' ),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_title_style',
            [
                'label' => esc_html__( 'Styles', 'rekon' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'rekon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    // Stronger selector to avoid section style from overwriting
                    '{{WRAPPER}} .title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label' => esc_html__( 'Title Typography', 'rekon' ),
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .title',
            ]
        );

        $this->add_control(
            'btn_color',
            [
                'label' => esc_html__( 'Button Color', 'rekon' ),
                'type' => Controls_Manager::COLOR,
                
                'selectors' => [
                    // Stronger selector to avoid section style from overwriting
                    '{{WRAPPER}} .btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_hover_color',
            [
                'label' => esc_html__( 'Button Hover Color', 'rekon' ),
                'type' => Controls_Manager::COLOR,
                
                'selectors' => [
                    // Stronger selector to avoid section style from overwriting
                    '{{WRAPPER}} .btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_bg_color',
            [
                'label' => esc_html__( 'Button Background', 'rekon' ),
                'type' => Controls_Manager::COLOR,
                
                'selectors' => [
                    // Stronger selector to avoid section style from overwriting
                    '{{WRAPPER}} .btn' => 'background: {{VALUE}}; border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_bg_hover_color',
            [
                'label' => esc_html__( 'Button Background Hover', 'rekon' ),
                'type' => Controls_Manager::COLOR,
                
                'selectors' => [
                    // Stronger selector to avoid section style from overwriting
                    '{{WRAPPER}} .btn:hover' => 'background: {{VALUE}}; border-color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_control(
            'input_color',
            [
                'label' => esc_html__( 'Input Color', 'rekon' ),
                'type' => Controls_Manager::COLOR,
                
                'selectors' => [
                    // Stronger selector to avoid section style from overwriting
                    '{{WRAPPER}} .widget-mailchimp .mc4wp-form .mc4wp-form-fields input[type="email"]' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .widget-mailchimp .mc4wp-form .mc4wp-form-fields input[type="email"]::placeholder' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'input_bg_color',
            [
                'label' => esc_html__( 'Input Background', 'rekon' ),
                'type' => Controls_Manager::COLOR,
                
                'selectors' => [
                    // Stronger selector to avoid section style from overwriting
                    '{{WRAPPER}} .widget-mailchimp .mc4wp-form .mc4wp-form-fields input[type="email"]' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'input_border_color',
            [
                'label' => esc_html__( 'Input Border', 'rekon' ),
                'type' => Controls_Manager::COLOR,
                
                'selectors' => [
                    // Stronger selector to avoid section style from overwriting
                    '{{WRAPPER}} .widget-mailchimp .mc4wp-form .mc4wp-form-fields input[type="email"]' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


    }

	protected function render() {

        $settings = $this->get_settings();

        extract( $settings );

        ?>
        <div class="widget-mailchimp clearfix <?php echo esc_attr($el_class); ?>">
            <?php if ( !empty($title) ) { ?>
                <h2 class="title"><?php echo wp_kses_post($title); ?></h2>
            <?php } ?>
            <?php if ( !empty($subtitle) ) { ?>
                <div class="sub-title"><?php echo wp_kses_post($subtitle); ?></div>
            <?php } ?>
            <?php mc4wp_show_form(''); ?>
        </div>
        <?php
    }
}

if ( version_compare(ELEMENTOR_VERSION, '3.5.0', '<') ) {
    Plugin::instance()->widgets_manager->register_widget_type( new Rekon_Elementor_Mailchimp );
} else {
    Plugin::instance()->widgets_manager->register( new Rekon_Elementor_Mailchimp );
}