<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Rekon_Elementor_Posts extends Elementor\Widget_Base {

	public function get_name() {
        return 'apus_element_posts';
    }

	public function get_title() {
        return esc_html__( 'Apus Posts', 'rekon' );
    }
    
	public function get_categories() {
        return [ 'rekon-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Posts', 'rekon' ),
                'tab' => Elementor\Controls_Manager::TAB_CONTENT,
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

        $this->add_control(
            'layout_type',
            [
                'label' => esc_html__( 'Layout', 'rekon' ),
                'type' => Elementor\Controls_Manager::SELECT,
                'options' => array(
                    'grid' => esc_html__('Grid', 'rekon'),                    
                    'carousel' => esc_html__('Carousel', 'rekon'),
                    'chess' => esc_html__('Chess', 'rekon'),
                ),
                'default' => 'grid'
            ]
        );

        $this->add_control(
            'item_style',
            [
                'label' => esc_html__( 'Blog Style', 'rekon' ),
                'type' => Elementor\Controls_Manager::SELECT,
                'options' => array(
                    'inner-grid' => esc_html__('Grid', 'rekon'),                    
                    'inner-grid-2' => esc_html__('Grid 2', 'rekon'),
                    'inner-list' => esc_html__('List', 'rekon'),
                    'inner-list-small' => esc_html__('List Small', 'rekon'),
                    'inner-list-2' => esc_html__('List 2', 'rekon'),
                ),
                'default' => 'inner-grid',
                'condition' => [
                    'layout_type' => [ 'grid', 'carousel' ],
                ],
            ]
        );

        $this->add_group_control(
            Elementor\Group_Control_Image_Size::get_type(),
            [
                'name' => 'image', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `image_size` and `image_custom_dimension`.
                'default' => 'large',
                'separator' => 'none',
                'condition' => [
                    'layout_type' => [ 'grid', 'carousel' ],
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
            'border_color',
            [
                'label' => esc_html__( 'Border Color', 'rekon' ),
                'type' => Elementor\Controls_Manager::COLOR,
                'selectors' => [                    
                    '{{WRAPPER}} .widget-blogs .post-grid' => 'border-color: {{VALUE}};',                    
                ],
            ]
        );

        $this->add_control(
            'link_color',
            [
                'label' => esc_html__( 'Link Color', 'rekon' ),
                'type' => Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    // Stronger selector to avoid section style from overwriting
                    '{{WRAPPER}} .widget-blogs a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .widget-blogs .post-list-item-small .entry-comments a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .widget-blogs .post-list-item-small .entry-author a' => 'color: {{VALUE}};',                    
                    '{{WRAPPER}} .widget-blogs .entry-author:before' => 'color: {{VALUE}};',  
                    '{{WRAPPER}} .widget-blogs .entry-comments:before' => 'color: {{VALUE}};',     
                    '{{WRAPPER}} .widget-blogs .post-list-item-small .entry-comments' => 'color: {{VALUE}};',     
                    '{{WRAPPER}} .widget-blogs .post-list-item-small .entry-author' => 'color: {{VALUE}};',     
                ],
            ]
        );
        $this->add_control(
            'link_hover_color',
            [
                'label' => esc_html__( 'Link Hover Color', 'rekon' ),
                'type' => Elementor\Controls_Manager::COLOR,
                'selectors' => [                    
                    '{{WRAPPER}} .widget-blogs a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .widget-blogs a:focus' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .widget-blogs .entry-author:hover' => 'color: {{VALUE}};',     
                    '{{WRAPPER}} .widget-blogs .entry-comments:hover' => 'color: {{VALUE}};',     
                    '{{WRAPPER}} .widget-blogs .entry-author:hover a' => 'color: {{VALUE}};',     
                    '{{WRAPPER}} .widget-blogs .entry-comments:hover a' => 'color: {{VALUE}};',     
                    '{{WRAPPER}} .widget-blogs .entry-author:hover:before' => 'color: {{VALUE}};',     
                    '{{WRAPPER}} .widget-blogs .entry-comments:hover:before' => 'color: {{VALUE}};',    
                    '{{WRAPPER}} .widget-blogs .entry-title a:hover' => 'color: {{VALUE}};',    
                ],
            ]
        );

        $this->add_control(
            'text_color',
            [
                'label' => esc_html__( 'Text Color', 'rekon' ),
                'type' => Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    // Stronger selector to avoid section style from overwriting
                    '{{WRAPPER}} .widget-blogs' => 'color: {{VALUE}};',  
                    '{{WRAPPER}} .widget-blogs .entry-title a' => 'color: {{VALUE}};',  
                    '{{WRAPPER}} .widget-blogs .entry-date' => 'color: {{VALUE}};',    
                    '{{WRAPPER}} .widget-blogs .entry-date:before' => 'color: {{VALUE}};',                        
                ],
            ]
        );

        $this->add_control(
            'date_color',
            [
                'label' => esc_html__( 'Date Color', 'rekon' ),
                'type' => Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .widget-blogs .post-list-item-small .entry-post-date > *.month' => 'color: {{VALUE}};',  
                    '{{WRAPPER}} .widget-blogs .post-list-item-small .entry-post-date > *.day' => 'color: {{VALUE}};',                      
                ],
            ]
        );

        $this->end_controls_section();
    }

	protected function render() {

        $settings = $this->get_settings();

        extract( $settings );

        $args = array(
            'post_type' => 'post',
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
            <div class="widget-blogs  <?php echo esc_attr($layout_type); ?> <?php echo esc_attr($el_class); ?>">
                <div class="widget-content">

                    <?php if ( $layout_type == 'carousel' ): ?>
                        <div class="slick-carousel <?php echo esc_attr($columns < $loop->post_count ? '':'hidden-dots'); ?>" data-items="<?php echo esc_attr($columns); ?>" data-smallmedium="2" data-extrasmall="1" data-pagination="true" data-nav="true">
                            <?php while ( $loop->have_posts() ): $loop->the_post(); ?>
                                <div class="item">
                                    <?php get_template_part( 'template-posts/loop/'.$item_style); ?>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php elseif ( $layout_type == 'chess' ): ?>
                        <?php $bcol = 12/$columns; ?>
                        <div class="layout-blog style-chess">
                            <div class="row">
                                <?php $i = 0; while ( $loop->have_posts() ) : $loop->the_post();
                                    $item_style = $i%2 + 1;
                                ?>
                                    <div class="col-md-<?php echo esc_attr($bcol); ?> col-sm-6 col-xs-12">
                                        <?php get_template_part( 'template-posts/loop/inner-chess'.$item_style ); ?>
                                    </div>
                                <?php $i++; endwhile; ?>
                            </div>
                        </div>
                    <?php else: ?>
                        <?php $bcol = 12/$columns; ?>
                        <div class="layout-blog style-grid">
                            <div class="row">
                                <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                    <div class="col-md-<?php echo esc_attr($bcol); ?> col-sm-12 col-xs-12">
                                        <?php get_template_part( 'template-posts/loop/'.$item_style ); ?>
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
    Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Rekon_Elementor_Posts );
} else {
    Elementor\Plugin::instance()->widgets_manager->register( new Rekon_Elementor_Posts );
}