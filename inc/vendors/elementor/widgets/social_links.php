<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Rekon_Elementor_Social_Links extends Widget_Base {

	public function get_name() {
        return 'apus_element_social_links';
    }

	public function get_title() {
        return esc_html__( 'Apus Social Links', 'rekon' );
    }

    public function get_icon() {
        return 'fas fa-share-square-o';
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

        $repeater = new Repeater();

        $repeater->add_control(
            'title', [
                'label' => esc_html__( 'Social Title', 'rekon' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Social Title' , 'rekon' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'link',
            [
                'label' => esc_html__( 'Social Link', 'rekon' ),
                'type' => Controls_Manager::TEXT,
                'input_type' => 'url',
                'placeholder' => esc_html__( 'Enter your social link here', 'rekon' ),
            ]
        );

        $repeater->add_control(
            'icon',
            [
                'label' => esc_html__( 'Social Icon', 'rekon' ),
                'type' => Controls_Manager::ICON,
            ]
        );

        $this->add_control(
            'socials',
            [
                'label' => esc_html__( 'Socials', 'rekon' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
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
        
        $this->add_responsive_control(
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
                    '{{WRAPPER}} .widget-social' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'style',
            [
                'label' => esc_html__( 'Style', 'rekon' ),
                'type' => Controls_Manager::SELECT,
                'options' => array(
                    '' => esc_html__('In Line', 'rekon'),
                    'st_vertical' => esc_html__('Vertical', 'rekon'),
                    'style-2' => esc_html__('In Line Style 2', 'rekon'),
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
                'label' => esc_html__( 'Color', 'rekon' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'color',
            [
                'label' => esc_html__( 'Color', 'rekon' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Core\Schemes\Color::get_type(),
                    'value' => Core\Schemes\Color::COLOR_1,
                ],
                'selectors' => [                    
                    '{{WRAPPER}} .social a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_hover',
            [
                'label' => esc_html__( 'Hover Color', 'rekon' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Core\Schemes\Color::get_type(),
                    'value' => Core\Schemes\Color::COLOR_1,
                ],
                'selectors' => [                    
                    '{{WRAPPER}} .social a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'border_color',
            [
                'label' => esc_html__( 'Border Color', 'rekon' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Core\Schemes\Color::get_type(),
                    'value' => Core\Schemes\Color::COLOR_1,
                ],
                'selectors' => [                    
                    '{{WRAPPER}} .widget-social .social > li > a' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'border_hover_color',
            [
                'label' => esc_html__( 'Border Hover Color', 'rekon' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Core\Schemes\Color::get_type(),
                    'value' => Core\Schemes\Color::COLOR_1,
                ],
                'selectors' => [                    
                    '{{WRAPPER}} .widget-social .social > li > a:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'bg_color',
            [
                'label' => esc_html__( 'Background Color', 'rekon' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Core\Schemes\Color::get_type(),
                    'value' => Core\Schemes\Color::COLOR_1,
                ],
                'selectors' => [                    
                    '{{WRAPPER}} .widget-social .social > li > a' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'bg_hover_color',
            [
                'label' => esc_html__( 'Background Hover Color', 'rekon' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Core\Schemes\Color::get_type(),
                    'value' => Core\Schemes\Color::COLOR_1,
                ],
                'selectors' => [                    
                    '{{WRAPPER}} .widget-social .social > li > a:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_font_size',
            [
                'label' => esc_html__( 'Icon Font Size', 'rekon' ),
                'type' => Controls_Manager::NUMBER,
                'selectors' => [                    
                    '{{WRAPPER}} .widget-social .social > li > a' => 'font-size: {{VALUE}}px;',                     
                ],
            ]
        );

        $this->add_control(
            'icon_size',
            [
                'label' => esc_html__( 'Icon Size', 'rekon' ),
                'type' => Controls_Manager::NUMBER,
                'selectors' => [                    
                    '{{WRAPPER}} .widget-social .social > li > a' => 'width: {{VALUE}}px;height: {{VALUE}}px;',                        
                ],
            ]
        );

        $this->end_controls_section();

    }

	protected function render() {

        $settings = $this->get_settings();

        extract( $settings );

        if ( !empty($socials) ) {

            ?>
            <div class="widget-social <?php echo esc_attr($el_class.' '.$style); ?>">
                <?php if ( !empty($title) ) { ?>
                    <h2 class="title"><?php echo wp_kses_post($title); ?></h2>
                <?php } ?>
                <ul class="social">
                    <?php foreach ($socials as $social) { ?>
                        <?php if ( !empty($social['link']) && !empty($social['icon']) ) { ?>
                            <li>
                                <a href="<?php echo esc_url($social['link']);?>" <?php echo wp_kses_post(!empty($social['title']) ? 'title="'.$social['title'].'"' : ''); ?>>
                                    <div class="social-inner">
                                        <i class="<?php echo esc_attr($social['icon']); ?>"></i>
                                    </div>
                                </a>
                            </li>                            
                        <?php } ?>
                    <?php } ?>
                </ul>
            </div>
            <?php
        }
    }
}

if ( version_compare(ELEMENTOR_VERSION, '3.5.0', '<') ) {
    Plugin::instance()->widgets_manager->register_widget_type( new Rekon_Elementor_Social_Links );
} else {
    Plugin::instance()->widgets_manager->register( new Rekon_Elementor_Social_Links );
}