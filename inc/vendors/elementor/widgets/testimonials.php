<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Rekon_Elementor_Testimonials extends Widget_Base {

	public function get_name() {
        return 'apus_element_testimonials';
    }

	public function get_title() {
        return esc_html__( 'Apus Testimonials', 'rekon' );
    }

	public function get_icon() {
        return 'eicon-testimonial';
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
            'content', [
                'label' => esc_html__( 'Content', 'rekon' ),
                'type' => Controls_Manager::TEXTAREA
            ]
        );

        $repeater->add_control(
            'img_src',
            [
                'name' => 'image',
                'label' => esc_html__( 'Choose Image', 'rekon' ),
                'type' => Controls_Manager::MEDIA,
                'placeholder'   => esc_html__( 'Upload Brand Image', 'rekon' ),
            ]
        );
        $repeater->add_control(
            'name',
            [
                'label' => esc_html__( 'Name', 'rekon' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'John Doe',
            ]
        );

        $repeater->add_control(
            'job',
            [
                'label' => esc_html__( 'Job', 'rekon' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Designer',
            ]
        );

        $repeater->add_control(
            'link',
            [
                'label' => esc_html__( 'Link To', 'rekon' ),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__( 'Enter your social link here', 'rekon' ),
                'placeholder' => esc_html__( 'https://your-link.com', 'rekon' ),
            ]
        );

        $this->add_control(
            'testimonials',
            [
                'label' => esc_html__( 'Testimonials', 'rekon' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ]
        );


        $this->add_control(
            'columns',
            [
                'label' => esc_html__( 'Columns', 'rekon' ),
                'type' => Controls_Manager::NUMBER,
                'input_type' => 'number',
                'default' => 2
            ]
        );

        $this->add_control(
            'style',
            [
                'label' => esc_html__( 'Style', 'rekon' ),
                'type' => Controls_Manager::SELECT,
                'options' => array(
                    '' => esc_html__('Default', 'rekon'),                    
                    'style2' => esc_html__('Style2', 'rekon'),
                    'style3' => esc_html__('Style3', 'rekon'),
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
                'label' => esc_html__( 'Styles', 'rekon' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'rekon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    // Stronger selector to avoid section style from overwriting
                    '{{WRAPPER}} .widget-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label' => esc_html__( 'Title Typography', 'rekon' ),
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .widget-title',
            ]
        );

        $this->add_control(
            'content_color',
            [
                'label' => esc_html__( 'Content Color', 'rekon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    // Stronger selector to avoid section style from overwriting
                    '{{WRAPPER}} .description' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label' => esc_html__( 'Content Typography', 'rekon' ),
                'name' => 'content_typography',
                'selector' => '{{WRAPPER}} .description',
            ]
        );

        $this->add_control(
            'job_color',
            [
                'label' => esc_html__( 'Job Color', 'rekon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    // Stronger selector to avoid section style from overwriting
                    '{{WRAPPER}} .job' => 'color: {{VALUE}};',
                ],
            ]
        ); 

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label' => esc_html__( 'Job Typography', 'rekon' ),
                'name' => 'job_typography',
                'selector' => '{{WRAPPER}} .job',
            ]
        );

        $this->add_control(
            'name_color',
            [
                'label' => esc_html__( 'Name Client Color', 'rekon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    // Stronger selector to avoid section style from overwriting
                    '{{WRAPPER}} .name-client, {{WRAPPER}} .name-client a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label' => esc_html__( 'Name Client Typography', 'rekon' ),
                'name' => 'name_typography',
                'selector' => '{{WRAPPER}} .name-client',
            ]
        );

        $this->add_control(
            'quote_icon_color',
            [
                'label' => esc_html__( 'Quote Icon Color', 'rekon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    // Stronger selector to avoid section style from overwriting
                    '{{WRAPPER}} .quote-icon' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

	protected function render() {

        $settings = $this->get_settings();

        extract( $settings );

        if ( !empty($testimonials) ) {
            ?>
            <div class="widget-testimonials <?php echo esc_attr($el_class.' '.$style); ?>">
                <?php if($style == 'style2'): ?> 
                    <div class="slick-carousel testimonial-main" data-items="<?php echo esc_attr($columns); ?>" data-smallmedium="<?php echo esc_attr($columns); ?>" data-extrasmall="1" data-pagination="true" data-nav="false">
                        <?php foreach ($testimonials as $item) { ?>
                            <div class="testimonials-item">
                                <div class="testimonial-box">
                                    <div class="quote-icon">                                                
                                        <i class="icon-apus-left-quote-control"></i>
                                    </div> 

                                    <div class="testimonials-top">  
                                        <?php if ( !empty($item['content']) ) { ?>
                                            <div class="description">
                                                <?php echo wp_kses_post($item['content']); ?>                                            
                                            </div>
                                        <?php } ?>  

                                        <div class="testimonials-info">
                                            <?php if ( !empty($item['name']) ) {
                                                $title = '<h3 class="name-client">'.$item['name'].'</h3>';
                                                if ( ! empty( $item['link']['url'] ) ) {
                                                    $title = sprintf( '<h3 class="name-client"><a href="'.esc_url($item['link']['url']).'" target="'.esc_attr($item['link']['is_external'] ? '_blank' : '_self').'" '.($item['link']['nofollow'] ? 'rel="nofollow"' : '').'>%1$s</a></h3>', $item['name'] );
                                                }
                                                echo wp_kses_post($title);
                                            ?>
                                            <?php } ?>
                                            <?php if ( !empty($item['job']) ) { ?>
                                                <span class="job"><?php echo wp_kses_post($item['job']); ?></span>
                                            <?php } ?>
                                        </div>

                                        <?php
                                        $img_src = ( isset( $item['img_src']['id'] ) && $item['img_src']['id'] != 0 ) ? wp_get_attachment_url( $item['img_src']['id'] ) : '';
                                        if ( $img_src ) {
                                        ?>
                                            <div class="avarta">
                                                <img src="<?php echo esc_url($img_src); ?>" alt="<?php echo esc_attr(!empty($item['name']) ? $item['name'] : ''); ?>">
                                            </div>
                                        <?php } ?>                                     
                                    </div> 
                                    
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                <?php else: ?>
                    <div class="slick-carousel testimonial-main" data-items="<?php echo esc_attr($columns); ?>" data-smallmedium="<?php echo esc_attr($columns); ?>" data-extrasmall="1" data-pagination="true" data-nav="false">
                        <?php foreach ($testimonials as $item) { ?>
                            <div class="testimonials-item">                                
                                <div class="testimonial-box">
                                    <?php
                                    $img_src = ( isset( $item['img_src']['id'] ) && $item['img_src']['id'] != 0 ) ? wp_get_attachment_url( $item['img_src']['id'] ) : '';
                                    if ( $img_src ) {
                                    ?>
                                        <div class="avarta">
                                            <img src="<?php echo esc_url($img_src); ?>" alt="<?php echo esc_attr(!empty($item['name']) ? $item['name'] : ''); ?>">
                                        </div>
                                    <?php } ?>  
   
                                    <div class="testimonials-info">
                                        <?php if ( !empty($item['name']) ) {
                                            $title = '<h3 class="name-client">'.$item['name'].'</h3>';
                                            if ( ! empty( $item['link']['url'] ) ) {
                                                $title = sprintf( '<h3 class="name-client"><a href="'.esc_url($item['link']['url']).'" target="'.esc_attr($item['link']['is_external'] ? '_blank' : '_self').'" '.($item['link']['nofollow'] ? 'rel="nofollow"' : '').'>%1$s</a></h3>', $item['name'] );
                                            }
                                            echo wp_kses_post($title);
                                        ?>
                                        <?php } ?>
                                        <?php if ( !empty($item['job']) ) { ?>
                                            <span class="job"><?php echo wp_kses_post($item['job']); ?></span>
                                        <?php } ?> 
                                    </div>                                         
                                    
                                    <?php if ( !empty($item['content']) ) { ?>
                                        <div class="description">
                                            <?php echo wp_kses_post($item['content']); ?>
                                        </div>
                                    <?php } ?>

                                </div>
                            </div>
                        <?php } ?>
                    </div>
                <?php endif; ?>              
            </div>
            <?php
        }
    }
}

if ( version_compare(ELEMENTOR_VERSION, '3.5.0', '<') ) {
    Plugin::instance()->widgets_manager->register_widget_type( new Rekon_Elementor_Testimonials );
} else {
    Plugin::instance()->widgets_manager->register( new Rekon_Elementor_Testimonials );
}