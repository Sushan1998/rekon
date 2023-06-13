<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Rekon_Elementor_Gallery extends Widget_Base {

	public function get_name() {
        return 'apus_element_gallery';
    }

	public function get_title() {
        return esc_html__( 'Apus Gallery', 'rekon' );
    }
    
	public function get_categories() {
        return [ 'rekon-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Gallery', 'rekon' ),
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
            'wp_gallery',
            [
                'label' => esc_html__( 'Add Images', 'rekon' ),
                'type' => Controls_Manager::GALLERY,
                'show_label' => false,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'image', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
                'exclude' => [ 'custom' ],
                'separator' => 'none',
            ]
        );

        $columns = range( 1, 10 );
        $columns = array_combine( $columns, $columns );

        $this->add_control(
            'columns',
            [
                'label' => esc_html__( 'Columns', 'rekon' ),
                'type' => Controls_Manager::SELECT,
                'default' => 4,
                'options' => $columns,
            ]
        );

        $this->add_control(
            'layout_type',
            [
                'label' => esc_html__( 'Layout Type', 'rekon' ),
                'type' => Controls_Manager::SELECT,
                'options' => array(
                    'grid' => esc_html__('Grid', 'rekon'),
                    'carousel' => esc_html__('Carousel', 'rekon'),
                    'carousel-thumbnail' => esc_html__('Carousel Thumbnail', 'rekon'),
                ),
                'default' => 'grid'
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
                    'layout_type' => 'carousel',
                ],
            ]
        );

        $this->add_control(
            'show_nav',
            [
                'label'         => esc_html__( 'Show Navigation', 'rekon' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => esc_html__( 'Show', 'rekon' ),
                'label_off'     => esc_html__( 'Hide', 'rekon' ),
                'return_value'  => true,
                'default'       => true,
                'condition' => [
                    'layout_type' => 'carousel',
                ],
            ]
        );

        $this->add_control(
            'show_pagination',
            [
                'label'         => esc_html__( 'Show Pagination', 'rekon' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => esc_html__( 'Show', 'rekon' ),
                'label_off'     => esc_html__( 'Hide', 'rekon' ),
                'return_value'  => true,
                'default'       => true,
                'condition' => [
                    'layout_type' => 'carousel',
                ],
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'label'         => esc_html__( 'Autoplay', 'rekon' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => esc_html__( 'Yes', 'rekon' ),
                'label_off'     => esc_html__( 'No', 'rekon' ),
                'return_value'  => true,
                'default'       => true,
                'condition' => [
                    'layout_type' => 'carousel',
                ],
            ]
        );

        $this->add_control(
            'infinite_loop',
            [
                'label'         => esc_html__( 'Infinite Loop', 'rekon' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => esc_html__( 'Yes', 'rekon' ),
                'label_off'     => esc_html__( 'No', 'rekon' ),
                'return_value'  => true,
                'default'       => true,
                'condition' => [
                    'layout_type' => 'carousel',
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
                    'style1' => esc_html__('Style 1', 'rekon'),
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

        if ( $image_size == 'custom' ) {
            if ( $image_custom_dimension['width'] && $image_custom_dimension['height'] ) {
                $thumbsize = $image_custom_dimension['width'].'x'.$image_custom_dimension['height'];
            } else {
                $thumbsize = 'full';
            }
        } else {
            $thumbsize = $image_size;
        }
        $classes = '';
        if ( Plugin::$instance->editor->is_edit_mode() ) {
            $classes = 'elementor-clickable';
        }
        $rand = rekon_random_key();
        ?>
        <div class="widget-gallery <?php echo esc_attr($el_class.' '.$layout_type.' '.$style); ?>">
            <?php if ( !empty($title) ) { ?>
                <h2 class="title" >
                   <?php echo wp_kses_post( $title ); ?>
                </h2>
            <?php } ?>
            <div class="inner">
                <?php if ( $layout_type == 'carousel' ) {
                    $show_nav = isset($show_nav) ? $show_nav : false;
                    $show_pagination = isset($show_pagination) ? $show_pagination : false;
                    $rows = isset($rows) ? $rows : 1;
                    $columns = isset($columns) ? $columns : 3;
                    $small_cols = $columns <= 1 ? 1 : 2;
                    $smalldesktop_cols = $columns >= 5 ? 4 : $columns;
                ?>
                    <div class="slick-carousel" data-items="<?php echo esc_attr($columns); ?>"
                        data-large="<?php echo esc_attr($smalldesktop_cols); ?>"
                        data-smallmedium="<?php echo esc_attr($small_cols); ?>"
                        data-extrasmall="1"
                        data-pagination="<?php echo esc_attr( $show_pagination ? 'true' : 'false' ); ?>"
                        data-nav="<?php echo esc_attr( $show_nav ? 'true' : 'false' ); ?>"
                        data-rows="<?php echo esc_attr( $rows ); ?>" data-infinite="<?php echo esc_attr( $infinite_loop ? 'true' : 'false' ); ?>"
                        data-autoplay="<?php echo esc_attr( $autoplay ? 'true' : 'false' ); ?>">

                        <?php foreach ( $wp_gallery as $item ) { ?>
                            <a href="<?php echo esc_url($item['url']); ?>" class="<?php echo esc_attr($classes); ?>" data-elementor-lightbox-slideshow="gallery-<?php echo esc_attr($rand); ?>">
                                <?php echo rekon_get_attachment_thumbnail($item['id'], $thumbsize); ?>
                            </a>
                        <?php } ?>
                    </div>
                <?php } elseif ( $layout_type == 'carousel-thumbnail' ) {
                    $show_nav = isset($show_nav) ? $show_nav : false;
                    $show_pagination = isset($show_pagination) ? $show_pagination : false;
                    $rows = isset($rows) ? $rows : 1;
                    $columns = isset($columns) ? $columns : 3;
                    $small_cols = $columns <= 1 ? 1 : 2;
                    $smalldesktop_cols = $columns >= 5 ? 4 : $columns;
                ?>
                    <div class="slick-carousel apus-gallery-parent" data-items="1" data-smallmedium="1" data-extrasmall="1" data-pagination="false" data-nav="false" data-slickparent="true">

                        <?php foreach ( $wp_gallery as $item ) { ?>
                            <a href="<?php echo esc_url($item['url']); ?>" class="<?php echo esc_attr($classes); ?>" data-elementor-lightbox-slideshow="gallery-<?php echo esc_attr($rand); ?>">
                                <?php echo rekon_get_attachment_thumbnail($item['id'], $thumbsize); ?>
                            </a>
                        <?php } ?>
                    </div>

                    <div class="slick-carousel" data-items="<?php echo esc_attr($columns); ?>"
                        data-large="<?php echo esc_attr($smalldesktop_cols); ?>"
                        data-smallmedium="<?php echo esc_attr($small_cols); ?>"
                        data-extrasmall="1"
                        data-pagination="<?php echo esc_attr( $show_pagination ? 'true' : 'false' ); ?>"
                        data-nav="<?php echo esc_attr( $show_nav ? 'true' : 'false' ); ?>"
                        data-rows="<?php echo esc_attr( $rows ); ?>" data-infinite="<?php echo esc_attr( $infinite_loop ? 'true' : 'false' ); ?>"
                        data-autoplay="<?php echo esc_attr( $autoplay ? 'true' : 'false' ); ?>" data-asnavfor=".apus-gallery-parent" data-slidestoscroll="1" data-focusonselect="true">

                        <?php foreach ( $wp_gallery as $item ) { ?>
                            <a href="<?php echo esc_url($item['url']); ?>" class="<?php echo esc_attr($classes); ?>">
                                <?php echo rekon_get_attachment_thumbnail($item['id'], 'thumbnail'); ?>
                            </a>
                        <?php } ?>
                    </div>

                <?php } else {
                    $bcol = 12/$columns;
                    ?>
                    <div class="row">
                        <?php foreach ( $wp_gallery as $item ) { ?>
                            <div class="col-md-<?php echo esc_attr($bcol); ?> col-sm-4 col-xs-6">
                                <a href="<?php echo esc_url($item['url']); ?>" class="<?php echo esc_attr($classes); ?>" data-elementor-lightbox-slideshow="gallery-<?php echo esc_attr($rand); ?>">
                                    <?php echo rekon_get_attachment_thumbnail($item['id'], $thumbsize); ?>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                    <?php
                } ?>
            </div>
        </div>
        <?php

    }

}

if ( version_compare(ELEMENTOR_VERSION, '3.5.0', '<') ) {
    Plugin::instance()->widgets_manager->register_widget_type( new Rekon_Elementor_Gallery );
} else {
    Plugin::instance()->widgets_manager->register( new Rekon_Elementor_Gallery );
}