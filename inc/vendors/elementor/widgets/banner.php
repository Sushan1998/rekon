<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Rekon_Elementor_Banner extends Widget_Base {

	public function get_name() {
        return 'apus_element_banner';
    }

	public function get_title() {
        return esc_html__( 'Apus Banner', 'rekon' );
    }
    
	public function get_categories() {
        return [ 'rekon-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Banner', 'rekon' ),
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
            'link',
            [
                'label' => esc_html__( 'URL', 'rekon' ),
                'type' => Controls_Manager::TEXT,
                'input_type' => 'url',
                'placeholder' => esc_html__( 'Enter your Button Link here', 'rekon' ),
            ]
        );
        $this->add_control(
            'btn_text',
            [
                'label' => esc_html__( 'Button Text', 'rekon' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Enter your button text here', 'rekon' ),
            ]
        );

        $this->add_control(
            'btn_style',
            [
                'label' => esc_html__( 'Button Style', 'rekon' ),
                'type' => Controls_Manager::SELECT,
                'options' => array(
                    'btn-theme' => esc_html__('Theme Color', 'rekon'),
                    'btn-theme btn-outline' => esc_html__('Theme Outline Color', 'rekon'),
                    'btn-default' => esc_html__('Default ', 'rekon'),
                    'btn-primary' => esc_html__('Primary ', 'rekon'),
                    'btn-success' => esc_html__('Success ', 'rekon'),
                    'btn-info' => esc_html__('Info ', 'rekon'),
                    'btn-warning' => esc_html__('Warning ', 'rekon'),
                    'btn-danger' => esc_html__('Danger ', 'rekon'),
                    'btn-pink' => esc_html__('Pink ', 'rekon'),
                    'btn-white' => esc_html__('White ', 'rekon'),
                ),
                'default' => 'btn-default'
            ]
        );
        $this->add_control(
            'img_src',
            [
                'name' => 'image',
                'label' => esc_html__( 'Image', 'rekon' ),
                'type' => Controls_Manager::MEDIA,
                'placeholder'   => esc_html__( 'Upload Image Here', 'rekon' ),
            ]
        );
        $this->add_responsive_control(
            'content_align',
            [
                'label' => esc_html__( 'Content Alignment', 'rekon' ),
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
                    '{{WRAPPER}} .inner' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'style',
            [
                'label' => esc_html__( 'Style', 'rekon' ),
                'type' => Controls_Manager::SELECT,
                'options' => array(
                    'style1' => esc_html__('Style 1', 'rekon'),
                    'style2' => esc_html__('Style 2', 'rekon'),
                    'style3' => esc_html__('Style 3', 'rekon'),                    
                ),
                'default' => 'style1'
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

        $this->add_responsive_control(
            'banner_size',
            [
                'label' => esc_html__( 'Banner Size', 'rekon' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1200,
                    ],
                ],
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'desktop_default' => [
                    'size' => 500,
                    'unit' => 'px',
                ],
                'tablet_default' => [
                    'size' => 300,
                    'unit' => 'px',
                ],
                'mobile_default' => [
                    'size' => 200,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .widget-banner .banner-image-bg' => 'min-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

    }

	protected function render() {

        $settings = $this->get_settings();

        extract( $settings );

        $img_src = ( isset( $img_src['id'] ) && $img_src['id'] != 0 ) ? wp_get_attachment_url( $img_src['id'] ) : '';
        $style_bg = '';
        if ( !empty($img_src) ) {
            $style_bg = 'style="background-image:url('.esc_url($img_src).')"';
        }

        ?>
        <div class="widget-banner <?php echo esc_attr($el_class.' '.$style); ?>">
            <?php
                if ( !empty($img_src) ) {
            ?>
                <div class="banner-image-bg" <?php echo trim($style_bg); ?>></div>                   
            <?php } ?>

            <div class="widget-banner-inner <?php echo esc_attr( (!empty($img_src['id']))?'p-ab':'' ); ?>">
                <?php if( !empty($title) ) { ?>
                    <h2 class="title" >
                       <?php echo wp_kses_post( $title ); ?>
                    </h2>
                <?php } ?>
                <div class="widget-banner-content">
                    <?php if ( !empty($content) ) { ?>
                        <?php echo wp_kses_post($content); ?>
                    <?php } ?>
                </div>
                <?php if ( !empty($btn_text) ) { ?>
                    <a class="btn <?php echo esc_attr(!empty($btn_style) ? $btn_style : ''); ?>" href="<?php echo esc_url($link); ?>" ><?php echo wp_kses_post($btn_text); ?></a>
                <?php } ?>
            </div>
        </div>
        <?php
    }
}

if ( version_compare(ELEMENTOR_VERSION, '3.5.0', '<') ) {
    Plugin::instance()->widgets_manager->register_widget_type( new Rekon_Elementor_Banner );
} else {
    Plugin::instance()->widgets_manager->register( new Rekon_Elementor_Banner );
}