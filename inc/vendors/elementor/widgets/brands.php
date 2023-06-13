<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Rekon_Elementor_Brands extends Widget_Base {

	public function get_name() {
        return 'apus_element_brands';
    }

	public function get_title() {
        return esc_html__( 'Apus Brands', 'rekon' );
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

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'list_title', [
                'label' => esc_html__( 'Title', 'rekon' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Brand Title' , 'rekon' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'img_src',
            [
                'name' => 'image',
                'label' => esc_html__( 'Brand Image', 'rekon' ),
                'type' => Controls_Manager::MEDIA,
                'placeholder'   => esc_html__( 'Upload Brand Image', 'rekon' ),
            ]
        );

        $repeater->add_control(
            'link',
            [
                'label' => esc_html__( 'Link', 'rekon' ),
                'type' => Controls_Manager::TEXT,
                'input_type' => 'url',
                'placeholder' => esc_html__( 'Enter your brand link here', 'rekon' ),
            ]
        );

        $this->add_control(
            'brands',
            [
                'label' => esc_html__( 'Brands', 'rekon' ),
                'type' => Controls_Manager::REPEATER,
                'placeholder' => esc_html__( 'Enter your brands here', 'rekon' ),
                'fields' => $repeater->get_controls(),
            ]
        );
        
        $this->add_control(
            'layout',
            [
                'label' => esc_html__( 'Layout', 'rekon' ),
                'type' => Controls_Manager::SELECT,
                'options' => array(
                    'grid' => esc_html__('Grid', 'rekon'),
                    'carousel' => esc_html__('Carousel', 'rekon'),
                ),
                'default' => 'carousel'
            ]
        );

        $this->add_control(
            'columns',
            [
                'label' => esc_html__( 'Columns', 'rekon' ),
                'type' => Controls_Manager::TEXT,
                'input_type' => 'number',
                'placeholder' => esc_html__( 'Enter your column number here', 'rekon' ),
                'default' => 4
            ]
        );

        $this->add_control(
            'rows',
            [
                'label' => esc_html__( 'Rows', 'rekon' ),
                'type' => Controls_Manager::TEXT,
                'input_type' => 'number',
                'placeholder' => esc_html__( 'Enter your rows number here', 'rekon' ),
                'default' => 1,
                'condition' => [
                    'layout' => [ 'carousel' ],
                ],
            ]
        );

        $this->add_control(
            'style',
            [
                'label' => esc_html__( 'Style', 'rekon' ),
                'type' => Controls_Manager::SELECT,
                'options' => array(
                    'default' => esc_html__('Default', 'rekon'),
                    'dark' => esc_html__('Dark', 'rekon'),
                ),
                'default' => 'default'
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

        if ( !empty($brands) ) {
            if ( empty($columns) ) {
                $columns = 4;
            }
            $bcol = 12/$columns;

            ?>
            <div class="widget-brand <?php echo esc_attr($el_class.' '.$layout.' '.$style); ?>">
                <?php if ( $layout == 'grid' ) { ?>
                    <div class="row">
                        <?php foreach ($brands as $brand) { ?>
                            <?php
                                $img_src = ( isset( $brand['img_src']['id'] ) && $brand['img_src']['id'] != 0 ) ? wp_get_attachment_url( $brand['img_src']['id'] ) : '';
                                if ( $img_src ) {
                            ?>
                                    <div class="col-md-<?php echo esc_attr($bcol); ?> col-sm-4 col-xs-6">
                                        <div class="brand-item">
                                            <div class="brand-item-container">
                                                <?php if ( !empty($brand['link']) ) { ?>
                                                    <a href="<?php echo esc_url($brand['link']); ?>" <?php echo (!empty($brand['title']) ? 'title="'.esc_attr($brand['title']).'"' : ''); ?>>
                                                <?php } ?>
                                                    <img src="<?php echo esc_url($img_src); ?>" <?php echo (!empty($brand['title']) ? 'alt="'.esc_attr($brand['title']).'"' : 'alt=""'); ?>>
                                                <?php if ( !empty($brand['link']) ) { ?>
                                                    </a>
                                                <?php } ?>
                                            </div>  
                                        </div>
                                    </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                <?php } else { ?>
                    <div class="slick-carousel" data-items="<?php echo esc_attr($columns); ?>" <?php if($columns>= 6) echo esc_attr('data-smalldesktop=6 data-medium="4" data-smallmedium="4" data-extrasmall="3"'); ?> 
                      data-smallest="2" data-pagination="true" data-nav="false" data-rows="<?php echo esc_attr($rows); ?>">
                        <?php foreach ($brands as $brand) { ?>
                            <?php
                                $img_src = ( isset( $brand['img_src']['id'] ) && $brand['img_src']['id'] != 0 ) ? wp_get_attachment_url( $brand['img_src']['id'] ) : '';
                                if ( $img_src ) {
                            ?>  
                                    <div class="brand-item">
                                        <div class="brand-item-container">
                                            <?php if ( !empty($brand['link']) ) { ?>
                                                <a href="<?php echo esc_url($brand['link']); ?>" <?php echo (!empty($brand['title']) ? 'title="'.esc_attr($brand['title']).'"' : ''); ?>>
                                            <?php } ?>
                                                <img src="<?php echo esc_url($img_src); ?>" <?php echo (!empty($brand['title']) ? 'alt="'.esc_attr($brand['title']).'"' : 'alt=""'); ?>>
                                            <?php if ( !empty($brand['link']) ) { ?>
                                                </a>
                                            <?php } ?>
                                        </div>                                        
                                    </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
            <?php
        }
    }

}

if ( version_compare(ELEMENTOR_VERSION, '3.5.0', '<') ) {
    Plugin::instance()->widgets_manager->register_widget_type( new Rekon_Elementor_Brands );
} else {
    Plugin::instance()->widgets_manager->register( new Rekon_Elementor_Brands );
}