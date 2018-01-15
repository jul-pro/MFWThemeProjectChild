<?php

define('T_TD', 'mfwthemeprojectchild');

function mfwthemeprojectchild_setup() {
    load_child_theme_textdomain( T_TD, get_stylesheet_directory() . '/languages/' );
    
}
add_action('after_setup_theme', 'mfwthemeprojectchild_setup');


function mfwthemeprojectchild_scripts() {
    wp_enqueue_style( 'mfwthemeprojectchild-style', get_stylesheet_uri() );
}
add_action('wp_enqueue_scripts', 'mfwthemeprojectchild_scripts');

function filter_title($title) {
    if( isset( $title['site'] ) ) {
        $title['site'] .= ' - MFW Theme Project Child Theme';
    } else {
        $title['site'] = 'MFW Theme Project Child Theme';
    }
    
    return $title;
}

add_filter('document_title_parts', 'filter_title');

function filter_content($content) {
    return $content . ' - MFW Theme Project Child Theme';
}

add_filter('the_content', 'filter_content');

function add_theme_menu() {
    add_theme_page(
        __('Page title', T_TD), 
        __('Menu title', T_TD),
        'read',
        'mfwthemeprojectchild_menu_page', 
        'render_child_theme_page'
    );
}

function render_child_theme_page() {
    _e('Child theme page.');
}

add_action('admin_menu', 'add_theme_menu');