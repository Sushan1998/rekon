<?php

//namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Rekon_Elementor_Search_Form extends Elementor\Widget_Base {

	public function get_name() {
        return 'apus_element_search_form';
    }

	public function get_title() {
        return esc_html__( 'Apus Header Search Form', 'rekon' );
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
            'ali',
            [
                'label' => esc_html__( 'Align Content Search', 'rekon' ),
                'type' => Elementor\Controls_Manager::SELECT,
                'options' => array(
                    'ali-left' => esc_html__('Left ', 'rekon'),
                    'ali-right' => esc_html__('Right ', 'rekon'),
                ),
                'default' => 'ali-left',
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
            'icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'rekon' ),
                'type' => Elementor\Controls_Manager::COLOR,
                'selectors' => [                    
                    '{{WRAPPER}} .apus-search-form .btn-search-icon' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_size',
            [
                'label' => esc_html__( 'Icon Size', 'rekon' ),
                'type' => Elementor\Controls_Manager::NUMBER,
                'selectors' => [                    
                    '{{WRAPPER}} .apus-search-form .btn-search-icon' => 'font-size: {{VALUE}}px;',
                ],
            ]
        );
    }

	protected function render() {
        $settings = $this->get_settings();

        extract( $settings );
        ?>
        <div class="apus-search-form <?php echo esc_attr($el_class.' '.$ali); ?>">             
            <a href="javascript:void(0);" class="btn-search-icon">
                <i class="icon-apus-magnifiying-glass"></i>
            </a>
        </div>
        <?php
    }
}

if ( version_compare(ELEMENTOR_VERSION, '3.5.0', '<') ) {
    Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Rekon_Elementor_Search_Form );
} else {
    Elementor\Plugin::instance()->widgets_manager->register( new Rekon_Elementor_Search_Form );
}