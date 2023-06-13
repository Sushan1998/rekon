<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Rekon_Elementor_Call_To_Action extends Widget_Base {

	public function get_name() {
        return 'apus_element_call_to_action';
    }

	public function get_title() {
        return esc_html__( 'Apus Call To Action', 'rekon' );
    }
    
	public function get_categories() {
        return [ 'rekon-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Content', 'rekon' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'rekon' ),
                'type' => Controls_Manager::TEXTAREA,
                'input_type' => 'text',
                'placeholder' => esc_html__( 'Enter your title here', 'rekon' ),
            ]
        );
        $this->add_control(
            'description',
            [
                'label' => esc_html__( 'Description', 'rekon' ),
                'type' => Controls_Manager::WYSIWYG,
                'placeholder' => esc_html__( 'Enter your description here', 'rekon' ),
            ]
        );

        $this->add_control(
            'btn_text',
            [
                'label' => esc_html__( 'Button Text', 'rekon' ),
                'type' => Controls_Manager::TEXT,
                'input_type' => 'text',
                'placeholder' => esc_html__( 'Enter your button text here', 'rekon' ),
            ]
        );

        $this->add_control(
            'btn_link',
            [
                'label' => esc_html__( 'Button Link', 'rekon' ),
                'type' => Controls_Manager::TEXT,
                'input_type' => 'url',
                'placeholder' => esc_html__( 'Enter your Button Link here', 'rekon' ),
            ]
        );
        
        $this->add_control(
            'btn_style',
            [
                'label' => esc_html__( 'Button Style', 'rekon' ),
                'type' => Controls_Manager::SELECT,
                'options' => array(
                    'btn-default' => esc_html__('Default ', 'rekon'),
                    'btn-primary' => esc_html__('Primary ', 'rekon'),
                    'btn-success' => esc_html__('Success ', 'rekon'),
                    'btn-info' => esc_html__('Info ', 'rekon'),
                    'btn-warning' => esc_html__('Warning ', 'rekon'),
                    'btn-danger' => esc_html__('Danger ', 'rekon'),
                    'btn-pink' => esc_html__('Pink ', 'rekon'),
                    'btn-white' => esc_html__('White ', 'rekon'),
                    'btn-yellow' => esc_html__('Yellow ', 'rekon'),
                    'btn-gradient-theme' => esc_html__('Gradient Theme ', 'rekon'),
                ),
                'default' => 'btn-default'
            ]
        );
        $this->add_control(
            'style',
            [
                'label' => esc_html__( 'Style', 'rekon' ),
                'type' => Controls_Manager::SELECT,
                'options' => array(
                    'vertical' => esc_html__('Vertical ', 'rekon'),
                    'horizontal' => esc_html__('Horizontal ', 'rekon'),
                ),
                'default' => 'vertical'
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

        $this->add_responsive_control(
            'title_margin',
            [
                'label' => esc_html__( 'Padding', 'rekon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .widget-action .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'desc_color',
            [
                'label' => esc_html__( 'Description Color', 'rekon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    // Stronger selector to avoid section style from overwriting
                    '{{WRAPPER}} .description' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label' => esc_html__( 'Description Typography', 'rekon' ),
                'name' => 'desc_typography',
                'selector' => '{{WRAPPER}} .description',
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

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label' => esc_html__( 'Button Typography', 'rekon' ),
                'name' => 'btn_typography',
                'selector' => '{{WRAPPER}} .btn',
            ]
        );

        $this->end_controls_section();
    }

	protected function render() {

        $settings = $this->get_settings();

        extract( $settings );

        ?>
        <div class="widget-action <?php echo esc_attr($el_class.' '.$style); ?>">
            <div class="inner <?php echo esc_attr( ($style == "horizontal")?'justify-content-between align-items-end flex-sm':''); ?>">
                <div class="item-left">
                    <?php if( !empty($title) ) { ?>
                        <h2 class="title" >
                           <?php echo wp_kses_post( $title ); ?>
                        </h2>
                    <?php } ?>
                    <?php if ( !empty($description) ) { ?>
                        <div class="description">
                            <?php echo wp_kses_post( $description ); ?>
                        </div>
                    <?php } ?>
                </div>
                <?php if( !empty($btn_link) && !empty($btn_text) ) { ?>
                    <div class="action">
                        <a class="btn <?php echo esc_attr(!empty($btn_style) ? $btn_style : ''); ?>" href="<?php echo esc_url( $btn_link ); ?>"><?php echo wp_kses_post( $btn_text ); ?></a>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php
    }
}

if ( version_compare(ELEMENTOR_VERSION, '3.5.0', '<') ) {
    Plugin::instance()->widgets_manager->register_widget_type( new Rekon_Elementor_Call_To_Action );
} else {
    Plugin::instance()->widgets_manager->register( new Rekon_Elementor_Call_To_Action );
}