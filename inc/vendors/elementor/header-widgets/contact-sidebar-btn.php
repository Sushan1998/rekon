<?php

//namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Rekon_Elementor_Contact_Sidebar_Btn extends Elementor\Widget_Base {

	public function get_name() {
        return 'apus_element_contact_sidebar_btn';
    }

	public function get_title() {
        return esc_html__( 'Apus Header Contact Sidebar btn', 'rekon' );
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
    }

	protected function render() {
        $settings = $this->get_settings();

        extract( $settings );
        ?>
        <div class="contact-sidebar-element <?php echo esc_attr($el_class.' '.$ali); ?>">             
            <a href="javascript:void(0);" class="contact-sidebar-btn">
                <i class="icon-apus-next"></i>
            </a>
        </div>
        <?php
    }
}

if ( version_compare(ELEMENTOR_VERSION, '3.5.0', '<') ) {
    Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Rekon_Elementor_Contact_Sidebar_Btn );
} else {
    Elementor\Plugin::instance()->widgets_manager->register( new Rekon_Elementor_Contact_Sidebar_Btn );
}