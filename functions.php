<?php

function mfwthemeprojectchild_scripts() {
    wp_enqueue_style( 'mfwthemeprojectchild-style', get_stylesheet_uri(), array( 'mfwtp-main' ) );
}

