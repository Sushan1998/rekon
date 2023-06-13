<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Rekon_Elementor_Features_Info extends Widget_Base {

	public function get_name() {
        return 'apus_element_features_info';
    }

	public function get_title() {
        return esc_html__( 'Apus Features Info', 'rekon' );
    }

	public function get_icon() {
        return 'eicon-bullet-list';
    }

	public function get_categories() {
        return [ 'rekon-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Features Info', 'rekon' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'title',
            [
                'label' => esc_html__( 'title', 'rekon' ),
                'type' => Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'features',
            [
                'label' => esc_html__( 'Features', 'rekon' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ]
        );
        
        $this->add_control(
            'columns',
            [
                'label' => esc_html__( 'Columns', 'rekon' ),
                'type' => Controls_Manager::TEXT,
                'input_type' => 'number',
                'default' => '3'
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
            'text_color',
            [
                'label' => esc_html__( 'Text Color', 'rekon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [                    
                    '{{WRAPPER}} .widget-features-box .features-info-list li' => 'color: {{VALUE}};',                    
                ],
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'rekon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [                    
                    '{{WRAPPER}} .widget-features-box .features-info-list li:before' => 'color: {{VALUE}};',                    
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label' => esc_html__( 'Text Typography', 'rekon' ),
                'name' => 'text_typography',
                'selector' => '{{WRAPPER}} .widget-features-box .features-info-list li',
            ]
        );
    }

	protected function render() {
        $settings = $this->get_settings();

        extract( $settings );

        if ( !empty($features) ) {
            ?>
            <div class="widget-features-box <?php echo esc_attr($el_class); ?>">
                <ul class="features-info-list columns-<?php echo esc_attr($columns); ?>">
                    <?php foreach ($features as $item): ?>
                        <?php if ( $item['title'] ) { ?>
                            <li><?php echo wp_kses_post($item['title']); ?></li>
                        <?php } ?>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php
        }
    }

}

if ( version_compare(ELEMENTOR_VERSION, '3.5.0', '<') ) {
    Plugin::instance()->widgets_manager->register_widget_type( new Rekon_Elementor_Features_Info );
} else {
    Plugin::instance()->widgets_manager->register( new Rekon_Elementor_Features_Info );
}