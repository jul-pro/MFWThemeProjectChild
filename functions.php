<?php

function mfwthemeprojectchild_scripts() {
    wp_enqueue_style( 'mfwthemeprojectchild-style', get_stylesheet_uri(), array( 'mfwtp-main' ) );
}

function filter_title($title) {
    if( isset( $title['site'] ) ) {
        $title['site'] .= ' - MFW Theme Project Child Theme';
    } else {
        $title['site'] .= 'MFW Theme Project Child Theme';
    }
    
    return $title;
}

add_filter('document_title_parts', 'filter_title');

function filter_content($content) {
    return $content . ' - MFW Theme Project Child Theme';
}

add_filter('the_content', 'filter_content');
