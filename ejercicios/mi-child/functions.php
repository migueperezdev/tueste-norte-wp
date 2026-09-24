<?php

function mi_child_cargar_estilos() {
    wp_enqueue_style(
        'estilo-padre',
        get_template_directory_uri() . '/style.css'
    );

    wp_enqueue_style(
        'estilo-hijo',
        get_stylesheet_directory_uri() . '/style.css',
        array('estilo-padre')
    );
}

add_action('wp_enqueue_scripts', 'mi_child_cargar_estilos');