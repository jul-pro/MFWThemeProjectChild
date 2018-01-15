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

function mfwthemeprojectchild_admin_scripts() {
    wp_enqueue_script( 'mfwthemeprojectchild-admin-main', get_stylesheet_directory_uri() . '/assets/js/mfwthemeprojectchild-admin-main.js' );
}
add_action('admin_enqueue_scripts', 'mfwthemeprojectchild_admin_scripts');

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

add_shortcode( 'mfwthemeprojectchild_guest_book', 'guest_book_shortcode');
function guest_book_shortcode() {
    $output = 'Guest Book';
    return $output;
}

add_action('media_buttons', 'add_media_buttons');

function add_media_buttons() {
    $button = '<a href="#" id="guest_book_shortcode_button" class="su-generator-button button">'
            . __('Insert shortcode', T_TD) . '</a>';
    echo $button;
}

add_action('init', 'setupTinyMCE');
function setupTinyMCE() {
    add_filter('mce_external_plugins', 'addTinyMCE');
    add_filter('mce_buttons', 'addTinyMCEToolbar');
}

function addTinyMCE($plugin_array) {
    $plugin_array['mfwthemeprojectchild_custom_class'] = get_stylesheet_directory_uri().'/assets/js/mytinymce.js';
    return $plugin_array;
}

function addTinyMCEToolbar($buttons) {
    array_push($buttons, 'guest_book_shortcode_button');
    return $buttons;
}

