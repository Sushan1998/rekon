<?php

// Shop Archive settings
function rekon_woo_redux_config($sections, $sidebars, $columns) {
    
    $sections[] = array(
        'icon' => 'el el-shopping-cart',
        'title' => esc_html__('Shop Settings', 'rekon'),
        'fields' => array(
            array(
                'id' => 'products_breadcrumb_setting',
                'icon' => true,
                'type' => 'info',
                'raw' => '<h3 style="margin: 0;"> '.esc_html__('Breadcrumbs Setting', 'rekon').'</h3>',
            ),
            array(
                'id' => 'show_product_breadcrumbs',
                'type' => 'switch',
                'title' => esc_html__('Breadcrumbs', 'rekon'),
                'default' => 1
            ),
            array(
                'title' => esc_html__('Breadcrumbs Background Color', 'rekon'),
                'subtitle' => '<em>'.esc_html__('The breadcrumbs background color of the site.', 'rekon').'</em>',
                'id' => 'woo_breadcrumb_color',
                'type' => 'color',
                'transparent' => false,
            ),
            array(
                'id' => 'woo_breadcrumb_image',
                'type' => 'media',
                'title' => esc_html__('Breadcrumbs Background', 'rekon'),
                'subtitle' => esc_html__('Upload a .jpg or .png image that will be your breadcrumbs.', 'rekon'),
            ),
        )
    );
    // Archive settings
    $sections[] = array(
        'title' => esc_html__('Product Archives', 'rekon'),
        'subsection' => true,
        'fields' => array(
            array(
                'id' => 'products_general_setting',
                'icon' => true,
                'type' => 'info',
                'raw' => '<h3 style="margin: 0;"> '.esc_html__('General Setting', 'rekon').'</h3>',
            ),
            array(
                'id' => 'show_shop_cat_title',
                'type' => 'switch',
                'title' => esc_html__('Show Shop/Category Title ?', 'rekon'),
                'default' => 1
            ),
            array(
                'id' => 'product_display_mode',
                'type' => 'select',
                'title' => esc_html__('Products Layout', 'rekon'),
                'subtitle' => esc_html__('Choose a default layout archive product.', 'rekon'),
                'options' => array(
                    'grid' => esc_html__('Grid', 'rekon'),
                    'list' => esc_html__('List', 'rekon'),
                ),
                'default' => 'grid'
            ),
            array(
                'id' => 'product_columns',
                'type' => 'select',
                'title' => esc_html__('Product Columns', 'rekon'),
                'options' => $columns,
                'default' => 4,
                'required' => array('product_display_mode', '=', array('grid'))
            ),
            array(
                'id' => 'number_products_per_page',
                'type' => 'text',
                'title' => esc_html__('Number of Products Per Page', 'rekon'),
                'default' => 12,
                'min' => '1',
                'step' => '1',
                'max' => '100',
                'type' => 'slider'
            ),
            array(
                'id' => 'enable_swap_image',
                'type' => 'switch',
                'title' => esc_html__('Enable Swap Image', 'rekon'),
                'default' => 1
            ),

            array(
                'id' => 'products_sidebar_setting',
                'icon' => true,
                'type' => 'info',
                'raw' => '<h3 style="margin: 0;"> '.esc_html__('Sidebar Setting', 'rekon').'</h3>',
            ),
            array(
                'id' => 'product_archive_fullwidth',
                'type' => 'switch',
                'title' => esc_html__('Is Full Width?', 'rekon'),
                'default' => false
            ),
            array(
                'id' => 'product_archive_layout',
                'type' => 'image_select',
                'compiler' => true,
                'title' => esc_html__('Archive Product Layout', 'rekon'),
                'subtitle' => esc_html__('Select the layout you want to apply on your archive product page.', 'rekon'),
                'options' => array(
                    'main' => array(
                        'title' => esc_html__('Main Content', 'rekon'),
                        'alt' => esc_html__('Main Content', 'rekon'),
                        'img' => get_template_directory_uri() . '/inc/assets/images/screen1.png'
                    ),
                    'left-main' => array(
                        'title' => esc_html__('Left Sidebar - Main Content', 'rekon'),
                        'alt' => esc_html__('Left Sidebar - Main Content', 'rekon'),
                        'img' => get_template_directory_uri() . '/inc/assets/images/screen2.png'
                    ),
                    'main-right' => array(
                        'title' => esc_html__('Main Content - Right Sidebar', 'rekon'),
                        'alt' => esc_html__('Main Content - Right Sidebar', 'rekon'),
                        'img' => get_template_directory_uri() . '/inc/assets/images/screen3.png'
                    ),
                ),
                'default' => 'main'
            ),
            array(
                'id' => 'product_archive_left_sidebar',
                'type' => 'select',
                'title' => esc_html__('Archive Left Sidebar', 'rekon'),
                'subtitle' => esc_html__('Choose a sidebar for left sidebar.', 'rekon'),
                'options' => $sidebars
            ),
            array(
                'id' => 'product_archive_right_sidebar',
                'type' => 'select',
                'title' => esc_html__('Archive Right Sidebar', 'rekon'),
                'subtitle' => esc_html__('Choose a sidebar for right sidebar.', 'rekon'),
                'options' => $sidebars
            ),
        )
    );
    
    
    // Product Page
    $sections[] = array(
        'title' => esc_html__('Single Product', 'rekon'),
        'subsection' => true,
        'fields' => array(
            array(
                'id' => 'product_general_setting',
                'icon' => true,
                'type' => 'info',
                'raw' => '<h3 style="margin: 0;"> '.esc_html__('General Setting', 'rekon').'</h3>',
            ),
            array(
                'id' => 'product_thumbs_position',
                'type' => 'select',
                'title' => esc_html__('Thumbnails Position', 'rekon'),
                'options' => array(
                    'thumbnails-left' => esc_html__('Thumbnails Left', 'rekon'),
                    'thumbnails-right' => esc_html__('Thumbnails Right', 'rekon'),
                    'thumbnails-bottom' => esc_html__('Thumbnails Bottom', 'rekon'),
                ),
                'default' => 'thumbnails-bottom',
            ),
            array(
                'id' => 'number_product_thumbs',
                'title' => esc_html__('Number Thumbnails Per Row', 'rekon'),
                'default' => 5,
                'min' => '1',
                'step' => '1',
                'max' => '8',
                'type' => 'slider',
            ),
            array(
                'id' => 'show_product_social_share',
                'type' => 'switch',
                'title' => esc_html__('Show Social Share', 'rekon'),
                'default' => 1
            ),
            array(
                'id' => 'show_product_review_tab',
                'type' => 'switch',
                'title' => esc_html__('Show Product Review Tab', 'rekon'),
                'default' => 1
            ),
            array(
                'id' => 'product_sidebar_setting',
                'icon' => true,
                'type' => 'info',
                'raw' => '<h3 style="margin: 0;"> '.esc_html__('Sidebar Setting', 'rekon').'</h3>',
            ),
            array(
                'id' => 'product_single_layout',
                'type' => 'image_select',
                'compiler' => true,
                'title' => esc_html__('Single Product Sidebar Layout', 'rekon'),
                'subtitle' => esc_html__('Select the layout you want to apply on your Single Product Page.', 'rekon'),
                'options' => array(
                    'main' => array(
                        'title' => esc_html__('Main Only', 'rekon'),
                        'alt' => esc_html__('Main Only', 'rekon'),
                        'img' => get_template_directory_uri() . '/inc/assets/images/screen1.png'
                    ),
                    'left-main' => array(
                        'title' => esc_html__('Left - Main Sidebar', 'rekon'),
                        'alt' => esc_html__('Left - Main Sidebar', 'rekon'),
                        'img' => get_template_directory_uri() . '/inc/assets/images/screen2.png'
                    ),
                    'main-right' => array(
                        'title' => esc_html__('Main - Right Sidebar', 'rekon'),
                        'alt' => esc_html__('Main - Right Sidebar', 'rekon'),
                        'img' => get_template_directory_uri() . '/inc/assets/images/screen3.png'
                    ),
                ),
                'default' => 'main'
            ),
            array(
                'id' => 'product_single_fullwidth',
                'type' => 'switch',
                'title' => esc_html__('Is Full Width?', 'rekon'),
                'default' => false
            ),
            array(
                'id' => 'product_single_left_sidebar',
                'type' => 'select',
                'title' => esc_html__('Single Product Left Sidebar', 'rekon'),
                'subtitle' => esc_html__('Choose a sidebar for left sidebar.', 'rekon'),
                'options' => $sidebars
            ),
            array(
                'id' => 'product_single_right_sidebar',
                'type' => 'select',
                'title' => esc_html__('Single Product Right Sidebar', 'rekon'),
                'subtitle' => esc_html__('Choose a sidebar for right sidebar.', 'rekon'),
                'options' => $sidebars
            ),
            array(
                'id' => 'product_block_setting',
                'icon' => true,
                'type' => 'info',
                'raw' => '<h3 style="margin: 0;"> '.esc_html__('Product Block Setting', 'rekon').'</h3>',
            ),
            array(
                'id' => 'show_product_releated',
                'type' => 'switch',
                'title' => esc_html__('Show Products Releated', 'rekon'),
                'default' => 1
            ),
            array(
                'id' => 'number_product_releated',
                'title' => esc_html__('Number of related products to show', 'rekon'),
                'default' => 3,
                'min' => '1',
                'step' => '1',
                'max' => '50',
                'type' => 'slider',
                'required' => array('show_product_releated', '=', true)
            ),
            array(
                'id' => 'releated_product_columns',
                'type' => 'select',
                'title' => esc_html__('Releated Products Columns', 'rekon'),
                'options' => $columns,
                'default' => 3,
                'required' => array('show_product_releated', '=', true)
            ),

            array(
                'id' => 'show_product_upsells',
                'type' => 'switch',
                'title' => esc_html__('Show Products upsells', 'rekon'),
                'default' => 1
            ),
            array(
                'id' => 'upsells_product_columns',
                'type' => 'select',
                'title' => esc_html__('Upsells Products Columns', 'rekon'),
                'options' => $columns,
                'default' => 3,
                'required' => array('show_product_upsells', '=', true)
            ),
        )
    );
    
    return $sections;
}
add_filter( 'rekon_redux_framwork_configs', 'rekon_woo_redux_config', 10, 3 );