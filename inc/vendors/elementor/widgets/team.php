<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Rekon_Elementor_Team extends Widget_Base {

	public function get_name() {
        return 'apus_element_team';
    }

	public function get_title() {
        return esc_html__( 'Apus Teams', 'rekon' );
    }

    public function get_icon() {
        return 'fas fa-users';
    }

	public function get_categories() {
        return [ 'rekon-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Team', 'rekon' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $this->add_control(
            'name', [
                'label' => esc_html__( 'Member Name', 'rekon' ),
                'type' => Controls_Manager::TEXT,                
                'placeholder' => esc_html__( 'Member Name' , 'rekon' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'job', [
                'label' => esc_html__( 'Member Job', 'rekon' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Job titles' , 'rekon' ),
                'label_block' => true,
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

        $this->add_control(
            'style',
            [
                'label' => esc_html__( 'Style', 'rekon' ),
                'type' => Controls_Manager::SELECT,
                'options' => array(
                    'style1' => esc_html__('Default', 'rekon'),
                    'style2' => esc_html__('Style 2', 'rekon'),
                ),
                'default' => 'style1'
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
            'el_class',
            [
                'label'         => esc_html__( 'Extra class name', 'rekon' ),
                'type'          => Controls_Manager::TEXT,
                'placeholder'   => esc_html__( 'If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'rekon' ),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_team_style',
            [
                'label' => esc_html__( 'Style', 'rekon' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'padding_size_box',
            [
                'label' => esc_html__( 'Padding Size', 'rekon' ),
                'type' => Controls_Manager::NUMBER,
                'selectors' => [                    
                    '{{WRAPPER}} .team' => 'padding: {{VALUE}}px;',  
                ],
            ]
        );

    }

	protected function render() {

        $settings = $this->get_settings();

        extract( $settings );

        ?>
        <div class="widget-team <?php echo esc_attr($el_class).' '.$style; ?>">    
            <?php if( $style == 'style1' ): ?>
                <?php
                    if ( !empty($settings['img_src']['id']) ) {
                ?>
                <div class="team-image">
                    <?php echo rekon_get_attachment_thumbnail($settings['img_src']['id'], 'full'); ?>
                </div>
                <?php } ?>
                <div class="content">
                    <div class="social-info">                    
                        <ul class="social">
                            <?php foreach ($socials as $social) { ?>
                                <?php if ( !empty($social['link']) && !empty($social['icon']) ) { ?>
                                    <li>
                                        <a href="<?php echo esc_url($social['link']);?>" <?php echo wp_kses_post(!empty($social['title']) ? 'title="'.$social['title'].'"' : ''); ?>>
                                            <i class="<?php echo esc_attr($social['icon']); ?>"></i>
                                        </a>
                                    </li>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="team-content-info">
                        <?php if ( !empty($name) ) { ?>
                            <h3 class="name-team">
                                <span><?php echo wp_kses_post($name); ?></span>
                            </h3>
                        <?php } ?>

                        <?php if ( !empty($job) ) { ?>
                            <div class="team-job">                            
                                <span><?php echo wp_kses_post($job); ?></span>
                            </div>
                        <?php } ?>

                    </div>
                </div>         
            <?php else: ?>
                <?php
                    if ( !empty($settings['img_src']['id']) ) {
                ?>
                <div class="team-image">
                    <?php echo rekon_get_attachment_thumbnail($settings['img_src']['id'], 'full'); ?>
                </div>
                <?php } ?>
                <div class="content">
                    <div class="team-content-info">
                        <?php if ( !empty($name) ) { ?>
                            <h3 class="name-team">
                                <span><?php echo wp_kses_post($name); ?></span>
                            </h3>
                        <?php } ?>
                        <?php if ( !empty($job) ) { ?>
                            <div class="team-job">                            
                                <span><?php echo wp_kses_post($job); ?></span>
                            </div>
                        <?php } ?> 
                    </div>
                    <div class="social-info">                    
                        <ul class="social">
                            <?php foreach ($socials as $social) { ?>
                                <?php if ( !empty($social['link']) && !empty($social['icon']) ) { ?>
                                    <li>
                                        <a href="<?php echo esc_url($social['link']);?>" <?php echo wp_kses_post(!empty($social['title']) ? 'title="'.$social['title'].'"' : ''); ?>>
                                            <i class="<?php echo esc_attr($social['icon']); ?>"></i>
                                        </a>
                                    </li>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <?php
    }
}

if ( version_compare(ELEMENTOR_VERSION, '3.5.0', '<') ) {
    Plugin::instance()->widgets_manager->register_widget_type( new Rekon_Elementor_Team );
} else {
    Plugin::instance()->widgets_manager->register( new Rekon_Elementor_Team );
}