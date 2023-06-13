<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if( ! class_exists( 'Rekon_Elementor_Extensions' ) ) {
    final class Rekon_Elementor_Extensions {

        private static $_instance = null;

        
        public function __construct() {
            add_action( 'elementor/elements/categories_registered', array( $this, 'add_widget_categories' ) );
            add_action( 'init', array( $this, 'elementor_widgets' ),  100 );
            add_filter( 'rekon_generate_post_builder', array( $this, 'render_post_builder' ), 10, 2 );
            add_action( 'elementor/controls/controls_registered', array( $this, 'modify_controls' ), 10, 1 );
            add_action('elementor/editor/before_enqueue_styles', array( $this, 'style' ) );
            add_filter( 'elementor/controls/animations/additional_animations', array( $this, 'additional_animations' ), 10 );
        }

        public static function instance () {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }
        
        public function add_widget_categories( $elements_manager ) {
            $elements_manager->add_category(
                'rekon-elements',
                [
                    'title' => esc_html__( 'Rekon Elements', 'rekon' ),
                    'icon' => 'fas fa-shopping-bag',
                ]
            );

            $elements_manager->add_category(
                'rekon-header-elements',
                [
                    'title' => esc_html__( 'Rekon Header Elements', 'rekon' ),
                    'icon' => 'fas fa-shopping-bag',
                ]
            );

        }

        public function elementor_widgets() {
            // general elements
            get_template_part( 'inc/vendors/elementor/widgets/heading' );
            get_template_part( 'inc/vendors/elementor/widgets/posts' );
            get_template_part( 'inc/vendors/elementor/widgets/call_to_action' );
            get_template_part( 'inc/vendors/elementor/widgets/features_box' );
            get_template_part( 'inc/vendors/elementor/widgets/social_links' );
            get_template_part( 'inc/vendors/elementor/widgets/testimonials' );
            get_template_part( 'inc/vendors/elementor/widgets/brands' );
            get_template_part( 'inc/vendors/elementor/widgets/popup_video' );
            get_template_part( 'inc/vendors/elementor/widgets/banner' );
            get_template_part( 'inc/vendors/elementor/widgets/countdown' );
            get_template_part( 'inc/vendors/elementor/widgets/nav_menu' );

            get_template_part( 'inc/vendors/elementor/widgets/tabs' );
            get_template_part( 'inc/vendors/elementor/widgets/gallery' );
            get_template_part( 'inc/vendors/elementor/widgets/features-info' );
            get_template_part( 'inc/vendors/elementor/widgets/what_we_do' );

            // header elements
            get_template_part( 'inc/vendors/elementor/header-widgets/logo' );
            get_template_part( 'inc/vendors/elementor/header-widgets/primary_menu' );
            get_template_part( 'inc/vendors/elementor/header-widgets/search_form' );
            get_template_part( 'inc/vendors/elementor/header-widgets/contact-sidebar-btn' );

            if ( rekon_is_mailchimp_activated() ) {
                get_template_part( 'inc/vendors/elementor/widgets/mailchimp' );
            }
            
            if ( rekon_is_revslider_activated() ) {
                get_template_part( 'inc/vendors/elementor/widgets/revslider' );
            }

            if ( rekon_is_apus_rekon_activated() ) {
                get_template_part( 'inc/vendors/elementor/project-widgets/projects' );
                get_template_part( 'inc/vendors/elementor/project-widgets/teams' );
            }

            if ( rekon_is_woocommerce_activated() ) {
                get_template_part( 'inc/vendors/elementor/woo_widgets/user_info' );
                get_template_part( 'inc/vendors/elementor/woo_widgets/woo_mini_cart' );
                get_template_part( 'inc/vendors/elementor/woo_widgets/woo_packages' );
            }
        }

        public function style() {
            wp_enqueue_style('rekon-flaticon',  get_template_directory_uri() . '/css/flaticon.min.css');
        }

        public function modify_controls( $controls_registry ) {
            // Get existing icons
            $icons = $controls_registry->get_control( 'icon' )->get_settings( 'options' );
            // Append new icons
            $new_icons = array_merge(
                array(                    
                    'flaticon-road-with-broken-line' => 'flaticon-road-with-broken-line',
                    'flaticon-sea-dyke' => 'flaticon-sea-dyke',
                    'flaticon-plumber-working' => 'flaticon-plumber-working',
                    'flaticon-golden-gate-bridge' => 'flaticon-golden-gate-bridge',
                    'flaticon-trees' => 'flaticon-trees',
                    'flaticon-roller-1' => 'flaticon-roller-1',
                    'flaticon-work-tools' => 'flaticon-work-tools',
                    'flaticon-construction-16' => 'flaticon-construction-16',
                    'flaticon-construction-15' => 'flaticon-construction-15',
                    'flaticon-construction-14' => 'flaticon-construction-14',
                    'flaticon-construction-13' => 'flaticon-construction-13',
                    'flaticon-construction-12' => 'flaticon-construction-12',
                    'flaticon-construction-11' => 'flaticon-construction-11',
                    'flaticon-construction-10' => 'flaticon-construction-10',
                    'flaticon-buildings' => 'flaticon-buildings',
                    'flaticon-construction-9' => 'flaticon-construction-9',
                    'flaticon-construction-8' => 'flaticon-construction-8',
                    'flaticon-construction-7' => 'flaticon-construction-7',
                    'flaticon-construction-6' => 'flaticon-construction-6',
                    'flaticon-construction-5' => 'flaticon-construction-5',
                    'flaticon-technology' => 'flaticon-technology',
                    'flaticon-people-1' => 'flaticon-people-1',
                    'flaticon-caution' => 'flaticon-caution',
                    'flaticon-nature' => 'flaticon-nature',
                    'flaticon-transport-1' => 'flaticon-transport-1',
                    'flaticon-transport' => 'flaticon-transport',
                    'flaticon-construction-4' => 'flaticon-construction-4',
                    'flaticon-beach' => 'flaticon-beach',
                    'flaticon-wall' => 'flaticon-wall',
                    'flaticon-landscape' => 'flaticon-landscape',
                    'flaticon-tool-1' => 'flaticon-tool-1',
                    'flaticon-construction-3' => 'flaticon-construction-3',
                    'flaticon-tool' => 'flaticon-tool',
                    'flaticon-gloves' => 'flaticon-gloves',
                    'flaticon-paint' => 'flaticon-paint',
                    'flaticon-door' => 'flaticon-door',
                    'flaticon-wrench' => 'flaticon-wrench',
                    'flaticon-drawing-1' => 'flaticon-drawing-1',
                    'flaticon-roller' => 'flaticon-roller',
                    'flaticon-construction-1' => 'flaticon-construction-1',
                    'flaticon-construction-2' => 'flaticon-construction-2',
                    'flaticon-art' => 'flaticon-art',
                    'flaticon-drawing' => 'flaticon-drawing',
                    'flaticon-tools' => 'flaticon-tools',
                    'flaticon-construction' => 'flaticon-construction',
                    'flaticon-people' => 'flaticon-people',
                    'flaticon-email' => 'flaticon-email',
                    'flaticon-fax' => 'flaticon-fax',
                    'flaticon-smartphone' => 'flaticon-smartphone',
                    'flaticon-placeholder' => 'flaticon-placeholder', 
                    'icon-hours' => 'icon-hours', 
                    'icon-hours-1' => 'icon-hours-1', 
                    'icon-buildings' => 'icon-buildings', 
                    'icon-clock' => 'icon-clock', 
                    'icon-clock-1' => 'icon-clock-1', 
                    'icon-email' => 'icon-email', 
                    'icon-envelope' => 'icon-envelope', 
                    'icon-envelope-1' => 'icon-envelope-1', 
                    'icon-fax' => 'icon-fax', 
                    'icon-house' => 'icon-house', 
                    'icon-placeholder' => 'icon-placeholder', 
                    'icon-smartphone' => 'icon-smartphone', 
                    'icon-smartphone-1' => 'icon-smartphone-1', 
                    'icon-time' => 'icon-time', 
                    'icon-time-1' => 'icon-time-1', 
                    'icon-time-2' => 'icon-time-2', 
                    'icon-travel' => 'icon-travel',
                    'icon-apus-architecture' => 'icon-apus-architecture',
                    'icon-apus-backhoe' => 'icon-apus-backhoe',
                    'icon-apus-blueprint' => 'icon-apus-blueprint',
                    'icon-apus-brick' => 'icon-apus-brick',
                    'icon-apus-bricklayer' => 'icon-apus-bricklayer',
                    'icon-apus-build' => 'icon-apus-build',
                    'icon-apus-car-parts' => 'icon-apus-car-parts',
                    'icon-apus-cement' => 'icon-apus-cement',
                    'icon-apus-city' => 'icon-apus-city',
                    'icon-apus-cityscape' => 'icon-apus-cityscape',
                    'icon-apus-construction-machine' => 'icon-apus-construction-machine',
                    'icon-apus-construction-machine-1' => 'icon-apus-construction-machine-1',
                    'icon-apus-crane' => 'icon-apus-crane',
                    'icon-apus-crane-1' => 'icon-apus-crane-1',
                    'icon-apus-department' => 'icon-apus-department',
                    'icon-apus-ecology' => 'icon-apus-ecology',
                    'icon-apus-engineer' => 'icon-apus-engineer',
                    'icon-apus-engineer-1' => 'icon-apus-engineer-1',
                    'icon-apus-engineer-2' => 'icon-apus-engineer-2',
                    'icon-apus-excavator' => 'icon-apus-excavator',
                    'icon-apus-fence' => 'icon-apus-fence',
                    'icon-apus-flashlight' => 'icon-apus-flashlight',
                    'icon-apus-heavy-vehicle' => 'icon-apus-heavy-vehicle',
                    'icon-apus-heavy-vehicle-1' => 'icon-apus-heavy-vehicle-1',
                    'icon-apus-heavy-vehicle-2' => 'icon-apus-heavy-vehicle-2',
                    'icon-apus-heavy-vehicle-3' => 'icon-apus-heavy-vehicle-3',
                    'icon-apus-helmet' => 'icon-apus-helmet',
                    'icon-apus-hotel' => 'icon-apus-hotel',
                    'icon-apus-house' => 'icon-apus-house',
                    'icon-apus-ladder' => 'icon-apus-ladder',
                    'icon-apus-manufacture' => 'icon-apus-manufacture',
                    'icon-apus-paint' => 'icon-apus-paint',
                    'icon-apus-painting' => 'icon-apus-painting',
                    'icon-apus-painting-1' => 'icon-apus-painting-1',
                    'icon-apus-paint-roller' => 'icon-apus-paint-roller',
                    'icon-apus-pickaxe' => 'icon-apus-pickaxe',
                    'icon-apus-plier' => 'icon-apus-plier',
                    'icon-apus-port' => 'icon-apus-port',
                    'icon-apus-property' => 'icon-apus-property',
                    'icon-apus-repair' => 'icon-apus-repair',
                    'icon-apus-ruler' => 'icon-apus-ruler',
                    'icon-apus-saw' => 'icon-apus-saw',
                    'icon-apus-soil' => 'icon-apus-soil',
                    'icon-apus-steamroller' => 'icon-apus-steamroller',
                    'icon-apus-toolbool' => 'icon-apus-toolbool',
                    'icon-apus-tools' => 'icon-apus-tools',
                    'icon-apus-town' => 'icon-apus-town',
                    'icon-apus-tripod' => 'icon-apus-tripod',
                    'icon-apus-truck' => 'icon-apus-truck',
                    'icon-apus-urban' => 'icon-apus-urban',
                    'icon-apus-wheelbarrow' => 'icon-apus-wheelbarrow',
                    'icon-apus-worker' => 'icon-apus-worker',
                    'icon-apus-workshop' => 'icon-apus-workshop',
                    'icon-apus-wrench' => 'icon-apus-wrench',
                ),
                $icons                
            );
            // Then we set a new list of icons as the options of the icon control
            $controls_registry->get_control( 'icon' )->set_settings( 'options', $new_icons );
        }
        
        public function additional_animations($animations = array()) {
            $additional_animations = array(
                'ApusTheme' => [
                    'moveInDown' => esc_html__('Move In Down', 'rekon'),
                    'moveInLeft' => esc_html__('Move In Left', 'rekon'),
                    'moveInRight' => esc_html__('Move In Right', 'rekon'),
                    'moveInUp' => esc_html__('Move In Up', 'rekon'),
                    'moveOutDown' => esc_html__('Move Out Down', 'rekon'),
                    'moveOutLeft' => esc_html__('Move Out Left', 'rekon'),
                    'moveOutRight' => esc_html__('Move Out Right', 'rekon'),
                    'moveOutUp' => esc_html__('Move Out Up', 'rekon'),
                ],
            );
            return array_merge( $animations, $additional_animations );
        }

        public function render_page_content($post_id) {
            if ( class_exists( 'Elementor\Core\Files\CSS\Post' ) ) {
                $css_file = new Elementor\Core\Files\CSS\Post( $post_id );
                $css_file->enqueue();
            }

            return Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $post_id );
        }

        public function render_post_builder($html, $post) {
            if ( !empty($post) && !empty($post->ID) ) {
                return $this->render_page_content($post->ID);
            }
            return $html;
        }
    }
}

if ( did_action( 'elementor/loaded' ) ) {
    // Finally initialize code
    Rekon_Elementor_Extensions::instance();
}