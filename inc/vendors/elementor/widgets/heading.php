<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor heading widget.
 *
 * Elementor widget that displays an eye-catching headlines.
 *
 * @since 1.0.0
 */
class Rekon_Elementor_Widget_Heading extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve heading widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'apus_element_heading';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve heading widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Apus Heading', 'rekon' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve heading widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-type-tool';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the heading widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * @since 2.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'rekon-elements' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the widget belongs to.
	 *
	 * @since 2.1.0
	 * @access public
	 *
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'heading', 'title', 'text' ];
	}

	/**
	 * Register heading widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__( 'Title', 'rekon' ),
			]
		);

		$this->add_control(
			'sub_title',
			[
				'label' => esc_html__( 'Sub Title', 'rekon' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Enter Sub title', 'rekon' ),
				'default' => '',
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'rekon' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Enter your title', 'rekon' ),
				'default' => '',
			]
		);
		
		$this->add_control(
			'link',
			[
				'label' => esc_html__( 'Link', 'rekon' ),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => '',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'header_size',
			[
				'label' => esc_html__( 'HTML Tag', 'rekon' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'div' => 'div',
					'span' => 'span',
					'p' => 'p',
				],
				'default' => 'h2',
			]
		);

		$this->add_responsive_control(
            'align',
            [
                'label' => esc_html__( 'Alignment', 'rekon' ),
                'type' => Controls_Manager::SELECT,
                'options' => array(
                    'l-left' => esc_html__('Left', 'rekon'),
                    'l-right' => esc_html__('Right', 'rekon'),
                    'l-center' => esc_html__('Center', 'rekon'),                    
                ),
                'default' => 'l-left'
            ]
        );

        $this->add_control(
            'size',
            [
                'label' => esc_html__( 'Size', 'rekon' ),
                'type' => Controls_Manager::SELECT,
                'options' => array(
                    '' => esc_html__('Default', 'rekon'),
                    'small' => esc_html__('Small', 'rekon'),                                        
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

		$this->add_control(
			'view',
			[
				'label' => esc_html__( 'View', 'rekon' ),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'traditional',
			]
		);

		$this->end_controls_section();



		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title', 'rekon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Text Color', 'rekon' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Core\Schemes\Color::get_type(),
					'value' => Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					// Stronger selector to avoid section style from overwriting
					'{{WRAPPER}} .apus-heading .heading-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
            'dot_line_color',
            [
                'label' => esc_html__( 'Separator Dot Color', 'rekon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [                                        
                    '{{WRAPPER}} .apus-heading .wt-separator-outer .wt-separator, {{WRAPPER}} .apus-heading .heading-title:before' => 'border-color: {{VALUE}};',                    
                ],
            ]
        );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography',
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .apus-heading .heading-title',
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'section_sub_title_style',
			[
				'label' => esc_html__( 'Sub Title', 'rekon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'sub_title_color',
			[
				'label' => esc_html__( 'Text Color', 'rekon' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Core\Schemes\Color::get_type(),
					'value' => Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					// Stronger selector to avoid section style from overwriting
					'{{WRAPPER}} .sub' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography_2',
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .sub',
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'section_line_style',
			[
				'label' => esc_html__( 'Under Line', 'rekon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'line_color',
			[
				'label' => esc_html__( 'Line Background Color', 'rekon' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Core\Schemes\Color::get_type(),
					'value' => Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [					
					'{{WRAPPER}} .apus-heading .wt-separator-outer .wt-separator > span, {{WRAPPER}} .apus-heading .heading-title:after' => 'background-color: {{VALUE}};',					
				],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render heading widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		if ( empty( $settings['title'] ) ) {
			return;
		}

		$this->add_render_attribute( 'title', 'class', 'heading-title' );

		if ( ! empty( $settings['size'] ) ) {
			$this->add_render_attribute( 'title', 'class', 'rekon-size-' . $settings['size'] );
		}

		$this->add_inline_editing_attributes( 'title' );

        $title = $settings['title'];
		if ( ! empty( $settings['link']['url'] ) ) {
			$this->add_render_attribute( 'url', 'href', $settings['link']['url'] );
			if ( $settings['link']['is_external'] ) {
				$this->add_render_attribute( 'url', 'target', '_blank' );
			}
			if ( ! empty( $settings['link']['nofollow'] ) ) {
				$this->add_render_attribute( 'url', 'rel', 'nofollow' );
			}			
			$title = sprintf( '<a %1$s>%2$s</a>', $this->get_render_attribute_string( 'url' ), $title );
		}

		$has_content = ! ! $settings['sub_title'];
		if ( $has_content ) {
            $has_content = sprintf( '<div class="sub"><div class="sub-title-inside">%1$s</div></div>', $settings['sub_title'] );
        }else{
        	$has_content = "";
        }        

        $alignment = $settings['align'];
        $size = $settings['size'];

		if ( !empty($settings['title']) ) {
            $title_html = '<div class="apus-heading'.' '.$alignment.' '.$size.'">';
        }

		$title_html .= sprintf( '<%1$s %2$s><span>%3$s</span></%1$s>' , $settings['header_size'], $this->get_render_attribute_string( 'title' ), $title );
		if ( $alignment == 'l-center' ) {
			$title_html .= '<div class="wt-separator-outer">
                            <div class="wt-separator">
                                <span class="separator-left bg-theme"></span>
                                <span class="separator-right bg-theme"></span>
                            </div>
                        </div>';
		}
		$title_html .= $has_content.'</div>';

		echo wp_kses_post($title_html);
	}

	/**
	 * Render heading widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _content_template() {
		?>
		<#
		var title = settings.title;

		if ( '' !== settings.link.url ) {
			title = '<a href="' + settings.link.url + '">' + title + '</a>';
		}

		view.addRenderAttribute( 'title', 'class', [ 'rekon-heading-title', 'rekon-size-' + settings.size ] );

		view.addInlineEditingAttributes( 'title' );

		var title_html = '<' + settings.header_size  + ' ' + view.getRenderAttributeString( 'title' ) + '>' + title + '</' + settings.header_size + '>';
		#>
		

		<# if ( '' !== settings.sub_title ) {
			view.addRenderAttribute( 'sub_title', 'class' );

			view.addInlineEditingAttributes( 'sub_title' );
			#>
			<div>{{{ settings.sub_title }}}</div>
		<# } #>

		<# print( title_html ); #>

		
		<?php
	}
}

if ( version_compare(ELEMENTOR_VERSION, '3.5.0', '<') ) {
    Plugin::instance()->widgets_manager->register_widget_type( new Rekon_Elementor_Widget_Heading );
} else {
    Plugin::instance()->widgets_manager->register( new Rekon_Elementor_Widget_Heading );
}