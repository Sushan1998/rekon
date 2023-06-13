<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Rekon_Elementor_Countdown extends Widget_Base {

	public function get_name() {
        return 'apus_element_countdown';
    }

	public function get_title() {
        return esc_html__( 'Apus Countdown', 'rekon' );
    }
    
	public function get_categories() {
        return [ 'rekon-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Countdown', 'rekon' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'end_date', [
                'label' => esc_html__( 'End Date', 'rekon' ),
                'type' => Controls_Manager::DATE_TIME,
                'picker_options' => [
                    'enableTime' => false
                ]
            ]
        );
        
        $this->add_control(
            'alignment',
            [
                'label' => esc_html__( 'Alignment', 'rekon' ),
                'type' => Controls_Manager::CHOOSE,
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
                    'justify' => [
                        'title' => esc_html__( 'Justified', 'rekon' ),
                        'icon' => 'fas fa-align-justify',
                    ],
                ],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .widget-countdown' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'style',
            [
                'label' => esc_html__( 'Style', 'rekon' ),
                'type' => Controls_Manager::SELECT,
                'options' => array(
                    '' => esc_html__('Default', 'rekon'),                                        
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
    }

	protected function render() {
        $settings = $this->get_settings();

        extract( $settings );
        $end_date = !empty($end_date) ? strtotime($end_date) : '';
        if ( $end_date ) {
            ?>
            <div class="widget-countdown <?php echo esc_attr($el_class.' '.$style); ?>">
                <div class="time-wrapper">
                    <div class="apus-countdown clearfix" data-time="timmer"
                        data-date="<?php echo date('m', $end_date).'-'.date('d', $end_date).'-'.date('Y', $end_date).'-'. date('H', $end_date) . '-' . date('i', $end_date) . '-' .  date('s', $end_date) ; ?>">
                    </div>
                </div>
            </div>
            <?php
        }
    }
}

if ( version_compare(ELEMENTOR_VERSION, '3.5.0', '<') ) {
    Plugin::instance()->widgets_manager->register_widget_type( new Rekon_Elementor_Countdown );
} else {
    Plugin::instance()->widgets_manager->register( new Rekon_Elementor_Countdown );
}