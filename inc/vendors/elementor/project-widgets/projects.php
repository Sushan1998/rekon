<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Rekon_Elementor_Projects extends Elementor\Widget_Base {

	public function get_name() {
        return 'apus_element_projects';
    }

	public function get_title() {
        return esc_html__( 'Apus Projects', 'rekon' );
    }
    
	public function get_categories() {
        return [ 'rekon-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Projects', 'rekon' ),
                'tab' => Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'rekon' ),
                'type' => Elementor\Controls_Manager::TEXTAREA,
                'input_type' => 'text',
                'placeholder' => esc_html__( 'Enter your title here', 'rekon' ),
            ]
        );

        $this->add_control(
            'number',
            [
                'label' => esc_html__( 'Number', 'rekon' ),
                'type' => Elementor\Controls_Manager::NUMBER,
                'input_type' => 'number',
                'description' => esc_html__( 'Number posts to display', 'rekon' ),
                'default' => 4
            ]
        );
        
        $this->add_control(
            'order_by',
            [
                'label' => esc_html__( 'Order by', 'rekon' ),
                'type' => Elementor\Controls_Manager::SELECT,
                'options' => array(
                    '' => esc_html__('Default', 'rekon'),
                    'date' => esc_html__('Date', 'rekon'),
                    'ID' => esc_html__('ID', 'rekon'),
                    'author' => esc_html__('Author', 'rekon'),
                    'title' => esc_html__('Title', 'rekon'),
                    'modified' => esc_html__('Modified', 'rekon'),
                    'rand' => esc_html__('Random', 'rekon'),
                    'comment_count' => esc_html__('Comment count', 'rekon'),
                    'menu_order' => esc_html__('Menu order', 'rekon'),
                ),
                'default' => ''
            ]
        );

        $this->add_control(
            'order',
            [
                'label' => esc_html__( 'Sort order', 'rekon' ),
                'type' => Elementor\Controls_Manager::SELECT,
                'options' => array(
                    '' => esc_html__('Default', 'rekon'),
                    'ASC' => esc_html__('Ascending', 'rekon'),
                    'DESC' => esc_html__('Descending', 'rekon'),
                ),
                'default' => ''
            ]
        );

        $this->add_control(
            'columns',
            [
                'label' => esc_html__( 'Columns', 'rekon' ),
                'type' => Elementor\Controls_Manager::NUMBER,
                'input_type' => 'number',
                'default' => 4,
            ]
        );        

        $this->add_group_control(
            Elementor\Group_Control_Image_Size::get_type(),
            [
                'name' => 'image', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `image_size` and `image_custom_dimension`.
                'default' => 'large',
                'separator' => 'none'
            ]
        );

        $this->add_control(
            'layout_type',
            [
                'label' => esc_html__( 'Layout', 'rekon' ),
                'type' => Elementor\Controls_Manager::SELECT,
                'options' => array(
                    'grid' => esc_html__('Grid', 'rekon'),                    
                    'carousel' => esc_html__('Carousel', 'rekon'),
                    'mansory' => esc_html__('Mansory', 'rekon'),
                ),
                'default' => 'grid',
            ]
        );

        $this->add_control(
            'project_item',
            [
                'label' => esc_html__( 'Project Item Style', 'rekon' ),
                'type' => Elementor\Controls_Manager::SELECT,
                'options' => array(
                    '' => esc_html__('Default', 'rekon'),                    
                    '1' => esc_html__('Project Item 1', 'rekon'),
                    '2' => esc_html__('Project Item 2', 'rekon'),
                    '3' => esc_html__('Project Item 3', 'rekon'),
                    '4' => esc_html__('Project Item 4', 'rekon'),
                ),
                'default' => '',
            ]
        );

        $this->add_control(
            'mansory_style',
            [
                'label' => esc_html__( 'Style', 'rekon' ),
                'type' => Elementor\Controls_Manager::SELECT,
                'options' => array(
                    '' => esc_html__('Default', 'rekon'),                    
                    'style1' => esc_html__('Style 1', 'rekon'),
                    'style2' => esc_html__('Style 2', 'rekon'),
                    'style3' => esc_html__('Style 3', 'rekon'),
                    'style4' => esc_html__('Style 4', 'rekon'),
                    'style5' => esc_html__('Style 5', 'rekon'),
                ),
                'default' => '',
                'condition' => [
                    'layout_type' => [ 'mansory' ],
                ],
            ]
        );
        
        $this->add_control(
            'tab_style',
            [
                'label' => esc_html__( 'Tab Navigation Style', 'rekon' ),
                'type' => Elementor\Controls_Manager::SELECT,
                'options' => array(
                    '' => esc_html__('Default', 'rekon'),                    
                    'style2' => esc_html__('Style 2', 'rekon'),                    
                ),
                'default' => '',
            ]
        );

        $this->add_responsive_control(
            'tab_content_align',
            [
                'label' => esc_html__( 'Tab Navigation Alignment', 'rekon' ),
                'type' => Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'flex-start' => [
                        'title' => esc_html__( 'Left', 'rekon' ),
                        'icon' => 'fas fa-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'rekon' ),
                        'icon' => 'fas fa-align-center',
                    ],
                    'flex-end' => [
                        'title' => esc_html__( 'Right', 'rekon' ),
                        'icon' => 'fas fa-align-right',
                    ],
                    'space-evenly' => [
                        'title' => esc_html__( 'Justified', 'rekon' ),
                        'icon' => 'fas fa-align-justify',
                    ],
                ],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .widget-projects.mansory .isotope-filter' => 'justify-content: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'content_align',
            [
                'label' => esc_html__( 'Content Alignment', 'rekon' ),
                'type' => Elementor\Controls_Manager::CHOOSE,
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
                    '{{WRAPPER}} .widget-projects .type-project .project-content-box .project-content-box-content' => 'text-align: {{VALUE}};',
                ],
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
                'label' => esc_html__( 'Styles', 'rekon' ),
                'tab' => Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'rekon' ),
                'type' => Elementor\Controls_Manager::COLOR,
                'selectors' => [                    
                    '{{WRAPPER}} .widget-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__( 'Title Typography', 'rekon' ),
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .widget-title',                
            ]
        );

        $this->add_control(
            'header_color',
            [
                'label' => esc_html__( 'Header Color', 'rekon' ),
                'type' => Elementor\Controls_Manager::COLOR,
                'selectors' => [                    
                    '{{WRAPPER}} .widget-projects article .entry-title a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__( 'Header Typography', 'rekon' ),
                'name' => 'header_typography',
                'selector' => '{{WRAPPER}} .widget-projects article .entry-title',
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'rekon' ),
                'type' => Elementor\Controls_Manager::COLOR,
                'selectors' => [                                        
                    '{{WRAPPER}} .widget-projects article .project-icon > i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_size',
            [
                'label' => esc_html__( 'Icon Font Size', 'rekon' ),                
                'type' => Elementor\Controls_Manager::NUMBER,
                'selectors' => [                    
                    '{{WRAPPER}} .widget-projects article .project-icon > i:before' => 'font-size: {{VALUE}}px;',                     
                ],
            ]
        );

        $this->add_control(
            'tab_color',
            [
                'label' => esc_html__( 'Tab Color', 'rekon' ),
                'type' => Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    // Stronger selector to avoid section style from overwriting
                    '{{WRAPPER}} .widget-projects.mansory .isotope-filter li a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'tab_color_hover',
            [
                'label' => esc_html__( 'Tab Hover Color', 'rekon' ),
                'type' => Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    // Stronger selector to avoid section style from overwriting
                    '{{WRAPPER}} .widget-projects.mansory .isotope-filter li a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .widget-projects.mansory .isotope-filter li a:focus' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .widget-projects.mansory .isotope-filter li a:active' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'tab_border_color',
            [
                'label' => esc_html__( 'Tab Border Color', 'rekon' ),
                'type' => Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    // Stronger selector to avoid section style from overwriting
                    '{{WRAPPER}} .widget-projects.mansory .isotope-filter li a' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'tab_border_color_hover',
            [
                'label' => esc_html__( 'Tab Border Hover Color', 'rekon' ),
                'type' => Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    // Stronger selector to avoid section style from overwriting
                    '{{WRAPPER}} .widget-projects.mansory .isotope-filter li a:hover' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .widget-projects.mansory .isotope-filter li a:focus' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .widget-projects.mansory .isotope-filter li a:active' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'tab_bg_color',
            [
                'label' => esc_html__( 'Tab Background Color', 'rekon' ),
                'type' => Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    // Stronger selector to avoid section style from overwriting
                    '{{WRAPPER}} .widget-projects.mansory .isotope-filter li a' => 'background-color: {{VALUE}};',                    
                ],
            ]
        );

        $this->add_control(
            'tab_bg_hover_color',
            [
                'label' => esc_html__( 'Tab Background Hover Color', 'rekon' ),
                'type' => Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    // Stronger selector to avoid section style from overwriting
                    '{{WRAPPER}} .widget-projects.mansory .isotope-filter li a:hover' => 'background-color: {{VALUE}};',                    
                    '{{WRAPPER}} .widget-projects.mansory .isotope-filter li a:focus' => 'background-color: {{VALUE}};',                    
                    '{{WRAPPER}} .widget-projects.mansory .isotope-filter li a:active' => 'background-color: {{VALUE}};',                    
                ],
            ]
        );

    }

	protected function render() {

        $settings = $this->get_settings();

        extract( $settings );

        $_id = rekon_random_key();
        $args = array(
            'post_type' => 'project',
            'post_status' => 'publish',
            'posts_per_page' => $number,
            'orderby' => $order_by,
            'order' => $order,
        );
        $loop = new WP_Query($args);
        if ( $loop->have_posts() ) {
            if ( $image_size == 'custom' ) {
                
                if ( $image_custom_dimension['width'] && $image_custom_dimension['height'] ) {
                    $thumbsize = $image_custom_dimension['width'].'x'.$image_custom_dimension['height'];
                } else {
                    $thumbsize = 'full';
                }
            } else {
                $thumbsize = $image_size;
            }
            set_query_var( 'thumbsize', $thumbsize );
            ?>
            <div class="widget-projects <?php echo esc_attr($layout_type); ?> <?php echo esc_attr($el_class); ?>">
                <div class="widget-content">

                    <?php if ( $layout_type == 'carousel' ):
                        $lg_comlumns = $sm_comlumns = $columns;
                        if ( $columns >= 3 ) {
                            $lg_comlumns = 3;
                            $sm_comlumns = 3;
                        }
                    ?>
                        <div class="slick-carousel <?php echo esc_attr($columns < $loop->post_count ? '':'hidden-dots'); ?>" data-items="<?php echo esc_attr($columns); ?>" data-large="<?php echo esc_attr($lg_comlumns); ?>" data-smallmedium="<?php echo esc_attr($sm_comlumns); ?>"
                            data-extrasmall="1" data-pagination="true" data-nav="true" data-infinite="true" data-slidesToScroll="1">
                            <?php while ( $loop->have_posts() ): $loop->the_post(); ?>
                                <div class="item">
                                    <?php get_template_part( 'template-project/content-project'.$project_item ); ?>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php elseif ( $layout_type == 'grid' ): ?>
                        <?php $bcol = 12/$columns; ?>
                        <div class="layout-project style-grid">
                            <div class="row">
                                <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                    <div class="col-md-<?php echo esc_attr($bcol); ?> col-sm-6 col-xs-12">
                                        <?php get_template_part( 'template-project/content-project'.$project_item ); ?>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    <?php elseif ( $layout_type == 'mansory' ):
                        wp_enqueue_script( 'isotope-pkgd', get_template_directory_uri().'/js/isotope.pkgd.min.js', array( 'jquery', 'imagesloaded' ) );
                    ?>
                        <div class="widget-projects-mansory <?php echo esc_attr($mansory_style); ?>">
                            <?php $bcol = 12/$columns; ?>
                            <?php
                            $terms = get_terms(array(
                                'taxonomy' => 'project_category',
                                'hide_empty' => true,
                                'orderby' => 'name',
                                'order' => 'ASC',
                            ));
                            ?>

                            <div class="tab-content-top container <?php echo esc_attr($tab_style);?>">
                                <?php if( !empty($title) ) { ?>
                                    <h2 class="widget-title" >
                                       <?php echo wp_kses_post( $title ); ?>
                                    </h2>
                                <?php } ?>
                                <ul class="isotope-filter" data-related-grid="our-projects-<?php echo esc_attr($_id);?>">
                                    <li><a href="javascript:void(0);" data-filter=".all"><?php esc_html_e('All', 'rekon'); ?></a></li>
                                    <?php
                                    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                                        foreach ($terms as $term) {
                                            ?>
                                            <li><a href="javascript:void(0);" data-filter=".<?php echo esc_attr($term->slug); ?>"><?php echo trim($term->name); ?></a></li>
                                            <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>                            

                            <div id="our-projects-<?php echo esc_attr($_id);?>"  class="isotope-items row" data-isotope-duration="400" data-columnwidth=".col-sm-<?php echo esc_attr($bcol); ?>">
                                
                                <?php while ( $loop->have_posts() ) : $loop->the_post();
                                    global $post;
                                    $post_terms = get_the_terms( $post, 'project_category' );
                                    $terms_slug = array();
                                    if ( $post_terms && ! is_wp_error( $post_terms ) ) {
                                        foreach ($post_terms as $term) {
                                            $terms_slug[] = $term->slug;
                                        }
                                    }
                                ?>
                                    <div class="isotope-item col-sm-<?php echo esc_attr($bcol); ?> col-xs-12 all <?php echo esc_attr(implode(' ', $terms_slug)); ?>">
                                        <?php get_template_part( 'template-project/content-project'.$project_item ); ?>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            </div>
            <?php
        }
    }
}

if ( version_compare(ELEMENTOR_VERSION, '3.5.0', '<') ) {
    Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Rekon_Elementor_Projects );
} else {
    Elementor\Plugin::instance()->widgets_manager->register( new Rekon_Elementor_Projects );
}