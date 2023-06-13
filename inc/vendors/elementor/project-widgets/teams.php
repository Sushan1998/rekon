<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Rekon_Elementor_Teams extends Elementor\Widget_Base {

	public function get_name() {
        return 'apus_element_teams';
    }

	public function get_title() {
        return esc_html__( 'Apus Teams', 'rekon' );
    }
    
	public function get_categories() {
        return [ 'rekon-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Teams', 'rekon' ),
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
                    'carousel' => esc_html__('Carousel', 'rekon')
                ),
                'default' => 'grid',
            ]
        );

        $this->add_control(
            'team_item',
            [
                'label' => esc_html__( 'Team Item Style', 'rekon' ),
                'type' => Elementor\Controls_Manager::SELECT,
                'options' => array(
                    '' => esc_html__('Default', 'rekon'),                    
                    '1' => esc_html__('Team Item 1', 'rekon'),                    
                ),
                'default' => '',
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
            'team_border_color',
            [
                'label' => esc_html__( 'Border Color', 'rekon' ),
                'type' => Elementor\Controls_Manager::COLOR,
                'selectors' => [                    
                    '{{WRAPPER}} .widget-teams .type-team.team-style' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'social_color',
            [
                'label' => esc_html__( 'Social Color', 'rekon' ),
                'type' => Elementor\Controls_Manager::COLOR,
                'selectors' => [                    
                    '{{WRAPPER}} .widget-teams .type-team .social li a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'social_bg_color',
            [
                'label' => esc_html__( 'Social Background Color', 'rekon' ),
                'type' => Elementor\Controls_Manager::COLOR,
                'selectors' => [                    
                    '{{WRAPPER}} .widget-teams .type-team .social li a' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__( 'Team Name Typography', 'rekon' ),
                'name' => 'team_name_typography',
                'selector' => '{{WRAPPER}} .type-team .name-team',
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

        $this->add_control(
            'team_name_color',
            [
                'label' => esc_html__( 'Team Name Color', 'rekon' ),
                'type' => Elementor\Controls_Manager::COLOR,
                'selectors' => [                    
                    '{{WRAPPER}} .type-team.team-style .content .name-team a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .type-team .name-team a' => 'color: {{VALUE}};',                    
                ],
            ]
        );

        $this->add_control(
            'bg_color',
            [
                'label' => esc_html__( 'Background Color', 'rekon' ),
                'type' => Elementor\Controls_Manager::COLOR,
                'selectors' => [                    
                    '{{WRAPPER}} .widget-teams .team' => 'background-color: {{VALUE}};',       
                    '{{WRAPPER}} .widget-teams .type-team' => 'background-color: {{VALUE}};',          
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
            'padding_size_box',
            [
                'label' => esc_html__( 'Padding Box', 'rekon' ),
                'type' => Elementor\Controls_Manager::NUMBER,
                'selectors' => [                    
                    '{{WRAPPER}} .team' => 'padding: {{VALUE}}px;',  
                ],
            ]
        );

        $this->add_control(
            'margin_box',            
            [
                'label' => esc_html__( 'Margin Box', 'rekon' ),
                'type' => Elementor\Controls_Manager::NUMBER,
                'selectors' => [                    
                    '{{WRAPPER}} .type-team' => 'margin-bottom: {{VALUE}}px;',                      
                ],
            ]
        );

        $this->end_controls_section();
    }

	protected function render() {

        $settings = $this->get_settings();

        extract( $settings );

        $args = array(
            'post_type' => 'team',
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
            <div class="widget-teams <?php echo esc_attr($layout_type); ?> <?php echo esc_attr($el_class); ?>">
                <div class="widget-content">

                    <?php if ( $layout_type == 'carousel' ):
                        $lg_comlumns = $sm_comlumns = $columns;
                        if ( $columns >= 3 ) {
                            $lg_comlumns = 3;
                            $sm_comlumns = 2;
                        }
                    ?>
                        <div class="slick-carousel <?php echo esc_attr($columns < $loop->post_count ? '':'hidden-dots'); ?>" data-items="<?php echo esc_attr($columns); ?>" data-large="<?php echo esc_attr($lg_comlumns); ?>" data-smallmedium="<?php echo esc_attr($sm_comlumns); ?>"
                            data-extrasmall="1" data-pagination="true" data-nav="true" data-infinite="true" data-slidesToScroll="1">
                            <?php while ( $loop->have_posts() ): $loop->the_post(); ?>
                                <div class="item">
                                    <?php get_template_part( 'template-project/content-team'.$team_item ); ?>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php elseif ( $layout_type == 'grid' ): ?>
                        <?php $bcol = 12/$columns; ?>
                        <div class="layout-team style-grid">
                            <div class="row">
                                <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                    <div class="col-md-<?php echo esc_attr($bcol); ?> col-sm-6 col-xs-12">
                                        <?php get_template_part( 'template-project/content-team'.$team_item ); ?>
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
    Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Rekon_Elementor_Teams );
} else {
    Elementor\Plugin::instance()->widgets_manager->register( new Rekon_Elementor_Teams );
}