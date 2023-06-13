<?php

function rekon_project_theme_folder($folder) {
    return "template-project";
}
add_filter( 'apus-rekon-theme-folder-name', 'rekon_project_theme_folder', 10 );

if ( !function_exists('rekon_project_content_class') ) {
    function rekon_project_content_class( $class ) {
        $prefix = 'projects';
        if ( is_singular( 'project' ) ) {
            $prefix = 'project';
        }
        if ( rekon_get_config($prefix.'_fullwidth') ) {
            return 'container-fluid';
        }
        return $class;
    }
}
add_filter( 'rekon_project_content_class', 'rekon_project_content_class', 1 , 1  );


if ( !function_exists('rekon_get_project_layout_configs') ) {
    function rekon_get_project_layout_configs() {
        $prefix = 'projects';
        if ( is_singular( 'project' ) ) {
            $prefix = 'project';
        }
        $left = rekon_get_config($prefix.'_left_sidebar');
        $right = rekon_get_config($prefix.'_right_sidebar');

        switch ( rekon_get_config($prefix.'_layout') ) {
            case 'left-main':
                if ( is_active_sidebar( $left ) ) {
                    $configs['left'] = array( 'sidebar' => $left, 'class' => 'col-md-3 col-sm-12 col-xs-12'  );
                    $configs['main'] = array( 'class' => 'col-md-9 col-sm-12 col-xs-12 pull-right' );
                }
                break;
            case 'main-right':
                if ( is_active_sidebar( $right ) ) {
                    $configs['right'] = array( 'sidebar' => $right,  'class' => 'col-md-3 col-sm-12 col-xs-12 pull-right' ); 
                    $configs['main'] = array( 'class' => 'col-md-9 col-sm-12 col-xs-12' );
                }
                break;
            case 'main':
                $configs['main'] = array( 'class' => 'col-md-12 col-sm-12 col-xs-12' );
                break;
            default:
                $configs['right'] = array( 'sidebar' => 'sidebar-default',  'class' => 'col-md-3 col-xs-12' ); 
                $configs['main'] = array( 'class' => 'col-md-9 col-xs-12' );
                break;
        }
        if ( empty($configs) ) {
            $configs['right'] = array( 'sidebar' => 'sidebar-default',  'class' => 'col-md-3 col-xs-12' ); 
            $configs['main'] = array( 'class' => 'col-md-9 col-xs-12' );
        }
        return $configs; 
    }
}

add_action( 'pre_get_posts', 'rekon_project_archive' );
function rekon_project_archive($query) {
    $suppress_filters = ! empty( $query->query_vars['suppress_filters'] ) ? $query->query_vars['suppress_filters'] : '';

    if ( ! is_post_type_archive( 'project' ) || ! $query->is_main_query() || is_admin() || $query->query_vars['post_type'] != 'project' || $suppress_filters ) {
        return;
    }

    $limit = rekon_get_config('number_projects_per_page', 10);
    $query_vars = &$query->query_vars;
    $query_vars['posts_per_page'] = $limit;
    $query->query_vars = $query_vars;
    
    return $query;
}


// team
if ( !function_exists('rekon_team_content_class') ) {
    function rekon_team_content_class( $class ) {
        $prefix = 'teams';
        if ( is_singular( 'team' ) ) {
            $prefix = 'team';
        }
        if ( rekon_get_config($prefix.'_fullwidth') ) {
            return 'container-fluid';
        }
        return $class;
    }
}
add_filter( 'rekon_team_content_class', 'rekon_team_content_class', 1 , 1  );

if ( !function_exists('rekon_get_team_layout_configs') ) {
    function rekon_get_team_layout_configs() {
        $prefix = 'teams';
        if ( is_singular( 'team' ) ) {
            $prefix = 'team';
        }
        $left = rekon_get_config($prefix.'_left_sidebar');
        $right = rekon_get_config($prefix.'_right_sidebar');

        switch ( rekon_get_config($prefix.'_layout') ) {
            case 'left-main':
                if ( is_active_sidebar( $left ) ) {
                    $configs['left'] = array( 'sidebar' => $left, 'class' => 'col-md-3 col-sm-12 col-xs-12'  );
                    $configs['main'] = array( 'class' => 'col-md-9 col-sm-12 col-xs-12 pull-right' );
                }
                break;
            case 'main-right':
                if ( is_active_sidebar( $right ) ) {
                    $configs['right'] = array( 'sidebar' => $right,  'class' => 'col-md-3 col-sm-12 col-xs-12 pull-right' ); 
                    $configs['main'] = array( 'class' => 'col-md-9 col-sm-12 col-xs-12' );
                }
                break;
            case 'main':
                $configs['main'] = array( 'class' => 'col-md-12 col-sm-12 col-xs-12' );
                break;
            default:
                $configs['right'] = array( 'sidebar' => 'sidebar-default',  'class' => 'col-md-3 col-xs-12' ); 
                $configs['main'] = array( 'class' => 'col-md-9 col-xs-12' );
                break;
        }
        if ( empty($configs) ) {
            $configs['right'] = array( 'sidebar' => 'sidebar-default',  'class' => 'col-md-3 col-xs-12' ); 
            $configs['main'] = array( 'class' => 'col-md-9 col-xs-12' );
        }
        return $configs; 
    }
}

add_action( 'pre_get_posts', 'rekon_team_archive' );
function rekon_team_archive($query) {
    $suppress_filters = ! empty( $query->query_vars['suppress_filters'] ) ? $query->query_vars['suppress_filters'] : '';

    if ( ! is_post_type_archive( 'team' ) || ! $query->is_main_query() || is_admin() || $query->query_vars['post_type'] != 'team' || $suppress_filters ) {
        return;
    }

    $limit = rekon_get_config('number_teams_per_page', 10);
    $query_vars = &$query->query_vars;
    $query_vars['posts_per_page'] = $limit;
    $query->query_vars = $query_vars;
    
    return $query;
}
