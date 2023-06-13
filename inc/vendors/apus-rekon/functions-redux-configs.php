<?php

// Project Archive settings
function rekon_project_redux_config($sections, $sidebars, $columns) {
    
    $sections[] = array(
        'icon' => 'el el-pencil',
        'title' => esc_html__('Project Settings', 'rekon'),
        'fields' => array(
            array(
                'id' => 'projects_breadcrumb_setting',
                'icon' => true,
                'type' => 'info',
                'raw' => '<h3 style="margin: 0;"> '.esc_html__('Breadcrumbs Setting', 'rekon').'</h3>',
            ),
            array(
                'id' => 'projects_breadcrumbs',
                'type' => 'switch',
                'title' => esc_html__('Breadcrumbs', 'rekon'),
                'default' => 1
            ),
            array(
                'title' => esc_html__('Breadcrumbs Background Color', 'rekon'),
                'subtitle' => '<em>'.esc_html__('The breadcrumbs background color of the site.', 'rekon').'</em>',
                'id' => 'projects_breadcrumb_color',
                'type' => 'color',
                'transparent' => false,
            ),
            array(
                'id' => 'projects_breadcrumb_image',
                'type' => 'media',
                'title' => esc_html__('Breadcrumbs Background', 'rekon'),
                'subtitle' => esc_html__('Upload a .jpg or .png image that will be your breadcrumbs.', 'rekon'),
            ),
        )
    );
    // Archive settings
    $sections[] = array(
        'title' => esc_html__('Projects Archives', 'rekon'),
        'subsection' => true,
        'fields' => array(
            array(
                'id' => 'projects_general_setting',
                'icon' => true,
                'type' => 'info',
                'raw' => '<h3 style="margin: 0;"> '.esc_html__('General Setting', 'rekon').'</h3>',
            ),
            array(
                'id' => 'projects_style',
                'type' => 'select',
                'title' => esc_html__('Project Style', 'rekon'),
                'options' => array(
                    '' => esc_html__('Default', 'rekon'),
                    '1' => esc_html__('Style 1', 'rekon'),
                ),
                'default' => ''
            ),
            array(
                'id' => 'projects_columns',
                'type' => 'select',
                'title' => esc_html__('Project Columns', 'rekon'),
                'options' => $columns,
                'default' => 3,
            ),
            array(
                'id' => 'number_projects_per_page',
                'type' => 'text',
                'title' => esc_html__('Number of Projects Per Page', 'rekon'),
                'default' => 12,
                'min' => '1',
                'step' => '1',
                'max' => '100',
                'type' => 'slider'
            ),
            array(
                'id' => 'projects_sidebar_setting',
                'icon' => true,
                'type' => 'info',
                'raw' => '<h3 style="margin: 0;"> '.esc_html__('Sidebar Setting', 'rekon').'</h3>',
            ),
            array(
                'id' => 'projects_fullwidth',
                'type' => 'switch',
                'title' => esc_html__('Is Full Width?', 'rekon'),
                'default' => false
            ),
            array(
                'id' => 'projects_layout',
                'type' => 'image_select',
                'compiler' => true,
                'title' => esc_html__('Archive Project Layout', 'rekon'),
                'subtitle' => esc_html__('Select the layout you want to apply on your archive project page.', 'rekon'),
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
                'default' => 'main-right'
            ),
            array(
                'id' => 'projects_left_sidebar',
                'type' => 'select',
                'title' => esc_html__('Archive Left Sidebar', 'rekon'),
                'subtitle' => esc_html__('Choose a sidebar for left sidebar.', 'rekon'),
                'options' => $sidebars
            ),
            array(
                'id' => 'projects_right_sidebar',
                'type' => 'select',
                'title' => esc_html__('Archive Right Sidebar', 'rekon'),
                'subtitle' => esc_html__('Choose a sidebar for right sidebar.', 'rekon'),
                'options' => $sidebars
            ),
        )
    );
    
    
    // Project Page
    $sections[] = array(
        'title' => esc_html__('Project Single', 'rekon'),
        'subsection' => true,
        'fields' => array(
            array(
                'id' => 'project_general_setting',
                'icon' => true,
                'type' => 'info',
                'raw' => '<h3 style="margin: 0;"> '.esc_html__('General Setting', 'rekon').'</h3>',
            ),
            array(
                'id' => 'project_fullwidth',
                'type' => 'switch',
                'title' => esc_html__('Is Full Width?', 'rekon'),
                'default' => false
            ),
            array(
                'id' => 'show_project_related',
                'type' => 'switch',
                'title' => esc_html__('Show Related Projects', 'rekon'),
                'default' => 1
            ),
            array(
                'id' => 'number_project_related',
                'type' => 'text',
                'title' => esc_html__('Number of related posts to show', 'rekon'),
                'required' => array('show_project_related', '=', '1'),
                'default' => 3,
                'min' => '1',
                'step' => '1',
                'max' => '20',
                'type' => 'slider'
            ),
            array(
                'id' => 'related_project_columns',
                'type' => 'select',
                'title' => esc_html__('related Projects Columns', 'rekon'),
                'required' => array('show_project_related', '=', '1'),
                'options' => $columns,
                'default' => 3
            ),
            array(
                'id' => 'project_sidebar_setting',
                'icon' => true,
                'type' => 'info',
                'raw' => '<h3 style="margin: 0;"> '.esc_html__('Sidebar Setting', 'rekon').'</h3>',
            ),
            array(
                'id' => 'project_layout',
                'type' => 'image_select',
                'compiler' => true,
                'title' => esc_html__('Single Project Sidebar Layout', 'rekon'),
                'subtitle' => esc_html__('Select the layout you want to apply on your Single Project Page.', 'rekon'),
                'options' => array(
                	'main' => array(
                        'title' => esc_html__('Main Content', 'rekon'),
                        'alt' => esc_html__('Main Content', 'rekon'),
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
                'default' => 'main-right'
            ),
            array(
                'id' => 'project_left_sidebar',
                'type' => 'select',
                'title' => esc_html__('Archive Left Sidebar', 'rekon'),
                'subtitle' => esc_html__('Choose a sidebar for left sidebar.', 'rekon'),
                'options' => $sidebars
            ),
            array(
                'id' => 'project_right_sidebar',
                'type' => 'select',
                'title' => esc_html__('Archive Right Sidebar', 'rekon'),
                'subtitle' => esc_html__('Choose a sidebar for right sidebar.', 'rekon'),
                'options' => $sidebars
            ),

        )
    );



    // team
    $sections[] = array(
        'icon' => 'el el-pencil',
        'title' => esc_html__('Team Settings', 'rekon'),
        'fields' => array(
            array(
                'id' => 'teams_breadcrumb_setting',
                'icon' => true,
                'type' => 'info',
                'raw' => '<h3 style="margin: 0;"> '.esc_html__('Breadcrumbs Setting', 'rekon').'</h3>',
            ),
            array(
                'id' => 'teams_breadcrumbs',
                'type' => 'switch',
                'title' => esc_html__('Breadcrumbs', 'rekon'),
                'default' => 1
            ),
            array(
                'title' => esc_html__('Breadcrumbs Background Color', 'rekon'),
                'subtitle' => '<em>'.esc_html__('The breadcrumbs background color of the site.', 'rekon').'</em>',
                'id' => 'teams_breadcrumb_color',
                'type' => 'color',
                'transparent' => false,
            ),
            array(
                'id' => 'teams_breadcrumb_image',
                'type' => 'media',
                'title' => esc_html__('Breadcrumbs Background', 'rekon'),
                'subtitle' => esc_html__('Upload a .jpg or .png image that will be your breadcrumbs.', 'rekon'),
            ),
        )
    );
    // Archive settings
    $sections[] = array(
        'title' => esc_html__('Teams Archives', 'rekon'),
        'subsection' => true,
        'fields' => array(
            array(
                'id' => 'teams_general_setting',
                'icon' => true,
                'type' => 'info',
                'raw' => '<h3 style="margin: 0;"> '.esc_html__('General Setting', 'rekon').'</h3>',
            ),
            array(
                'id' => 'teams_columns',
                'type' => 'select',
                'title' => esc_html__('Team Columns', 'rekon'),
                'options' => $columns,
                'default' => 3,
            ),
            array(
                'id' => 'number_teams_per_page',
                'type' => 'text',
                'title' => esc_html__('Number of Teams Per Page', 'rekon'),
                'default' => 12,
                'min' => '1',
                'step' => '1',
                'max' => '100',
                'type' => 'slider'
            ),
            array(
                'id' => 'teams_sidebar_setting',
                'icon' => true,
                'type' => 'info',
                'raw' => '<h3 style="margin: 0;"> '.esc_html__('Sidebar Setting', 'rekon').'</h3>',
            ),
            array(
                'id' => 'teams_fullwidth',
                'type' => 'switch',
                'title' => esc_html__('Is Full Width?', 'rekon'),
                'default' => false
            ),
            array(
                'id' => 'teams_layout',
                'type' => 'image_select',
                'compiler' => true,
                'title' => esc_html__('Archive Team Layout', 'rekon'),
                'subtitle' => esc_html__('Select the layout you want to apply on your archive team page.', 'rekon'),
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
                'default' => 'main-right'
            ),
            array(
                'id' => 'teams_left_sidebar',
                'type' => 'select',
                'title' => esc_html__('Archive Left Sidebar', 'rekon'),
                'subtitle' => esc_html__('Choose a sidebar for left sidebar.', 'rekon'),
                'options' => $sidebars
            ),
            array(
                'id' => 'teams_right_sidebar',
                'type' => 'select',
                'title' => esc_html__('Archive Right Sidebar', 'rekon'),
                'subtitle' => esc_html__('Choose a sidebar for right sidebar.', 'rekon'),
                'options' => $sidebars
            ),
        )
    );
    
    
    // Team Page
    $sections[] = array(
        'title' => esc_html__('Team Single', 'rekon'),
        'subsection' => true,
        'fields' => array(
            array(
                'id' => 'team_general_setting',
                'icon' => true,
                'type' => 'info',
                'raw' => '<h3 style="margin: 0;"> '.esc_html__('General Setting', 'rekon').'</h3>',
            ),
            array(
                'id' => 'team_fullwidth',
                'type' => 'switch',
                'title' => esc_html__('Is Full Width?', 'rekon'),
                'default' => false
            ),
            array(
                'id' => 'show_team_related',
                'type' => 'switch',
                'title' => esc_html__('Show Related Teams', 'rekon'),
                'default' => 1
            ),
            array(
                'id' => 'number_team_related',
                'type' => 'text',
                'title' => esc_html__('Number of related posts to show', 'rekon'),
                'required' => array('show_team_related', '=', '1'),
                'default' => 3,
                'min' => '1',
                'step' => '1',
                'max' => '20',
                'type' => 'slider'
            ),
            array(
                'id' => 'related_team_columns',
                'type' => 'select',
                'title' => esc_html__('related Teams Columns', 'rekon'),
                'required' => array('show_team_related', '=', '1'),
                'options' => $columns,
                'default' => 3
            ),
            array(
                'id' => 'team_sidebar_setting',
                'icon' => true,
                'type' => 'info',
                'raw' => '<h3 style="margin: 0;"> '.esc_html__('Sidebar Setting', 'rekon').'</h3>',
            ),
            array(
                'id' => 'team_layout',
                'type' => 'image_select',
                'compiler' => true,
                'title' => esc_html__('Single Team Sidebar Layout', 'rekon'),
                'subtitle' => esc_html__('Select the layout you want to apply on your Single Team Page.', 'rekon'),
                'options' => array(
                    'main' => array(
                        'title' => esc_html__('Main Content', 'rekon'),
                        'alt' => esc_html__('Main Content', 'rekon'),
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
                'default' => 'main-right'
            ),
            array(
                'id' => 'team_left_sidebar',
                'type' => 'select',
                'title' => esc_html__('Archive Left Sidebar', 'rekon'),
                'subtitle' => esc_html__('Choose a sidebar for left sidebar.', 'rekon'),
                'options' => $sidebars
            ),
            array(
                'id' => 'team_right_sidebar',
                'type' => 'select',
                'title' => esc_html__('Archive Right Sidebar', 'rekon'),
                'subtitle' => esc_html__('Choose a sidebar for right sidebar.', 'rekon'),
                'options' => $sidebars
            ),

        )
    );
    return $sections;
}
add_filter( 'rekon_redux_framwork_configs', 'rekon_project_redux_config', 30, 3 );