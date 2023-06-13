<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Rekon_Elementor_Popup_Video extends Widget_Base {

	public function get_name() {
        return 'apus_element_popup_video';
    }

	public function get_title() {
        return esc_html__( 'Apus Popup Video', 'rekon' );
    }

	public function get_icon() {
        return 'eicon-youtube';
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
                'type' => Controls_Manager::TEXT,
                'input_type' => 'text',
                'placeholder' => esc_html__( 'Enter your title here', 'rekon' ),
            ]
        );

        $this->add_control(
            'content',
            [
                'label' => esc_html__( 'Content', 'rekon' ),
                'type' => Controls_Manager::WYSIWYG,
                'placeholder' => esc_html__( 'Enter your content here', 'rekon' ),
            ]
        );

        $this->add_control(
            'video_link',
            [
                'label' => esc_html__( 'Youtube Video Link', 'rekon' ),
                'type' => Controls_Manager::TEXT,
                'input_type' => 'url',
            ]
        );

        $this->add_control(
            'button_name',
            [
                'label' => esc_html__( 'Button Name', 'rekon' ),
                'type' => Controls_Manager::TEXT,
                'input_type' => 'text',
                'placeholder' => esc_html__( 'Enter your title here', 'rekon' ),
            ]
        );

        $this->add_control(
            'style',
            [
                'label' => esc_html__( 'Style', 'rekon' ),
                'type' => Controls_Manager::SELECT,
                'options' => array(
                    '' => esc_html__('Default', 'rekon'),
                    'style1' => esc_html__('Style 1', 'rekon'),
                    'style2' => esc_html__('Style 2', 'rekon'),
                ),
                'default' => ''
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
                'label' => esc_html__( 'Style', 'rekon' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'bg_icon_color',
            [
                'label' => esc_html__( 'Background Color Icon', 'rekon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    // Stronger selector to avoid section style from overwriting
                    '{{WRAPPER}} .popup-video' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

	protected function render() {

        $settings = $this->get_settings();

        extract( $settings );

        ?>
        <div class="widget-video <?php echo esc_attr($el_class.' '.$style);?>">
            <?php if( !empty($title) ) { ?>
                <h2 class="video-title" >
                   <?php echo wp_kses_post( $title ); ?>
                </h2>
            <?php } ?>
            <div class="video-content">
                <?php if ( !empty($content) ) { ?>
                    <?php echo wp_kses_post($content); ?>
                <?php } ?>
            </div>
            <div class="video-wrapper-inner">                
                <div class="video-section-content">
                    <a class="popup-video button-video is-play" href="<?php echo esc_url($video_link); ?>">                            
                        <div class="button-outer-circle has-scale-animation"></div>
                        <div class="button-outer-circle has-scale-animation has-delay-short"></div>
                        <div class="button-icon is-play">
                            <svg height="100%" width="100%" fill="#FFFFFF">
                                <polygon class="triangle" points="5,0 30,15 5,30" viewBox="0 0 30 15"></polygon>
                                <path class="path" d="M5,0 L30,15 L5,30z" fill="none" stroke="#FFFFFF" stroke-width="1"></path>
                            </svg>    
                        </div> 
                        <?php if( !empty($button_name) ) { ?>
                            <div class="video-button-title" >
                               <?php echo wp_kses_post( $button_name ); ?>
                            </div>
                        <?php } ?>                           
                    </a>
                </div>
            </div>
        </div>
        <?php
    }
}

if ( version_compare(ELEMENTOR_VERSION, '3.5.0', '<') ) {
    Plugin::instance()->widgets_manager->register_widget_type( new Rekon_Elementor_Popup_Video );
} else {
    Plugin::instance()->widgets_manager->register( new Rekon_Elementor_Popup_Video );
}