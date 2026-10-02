<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function tn_propio_configurar_tema() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );

    register_nav_menus(
        array(
            'principal' => 'Menú principal',
        )
    );
}

add_action( 'after_setup_theme', 'tn_propio_configurar_tema' );

function tn_propio_cargar_estilos() {
    wp_enqueue_style(
        'tueste-norte-estilos',
        get_stylesheet_uri(),
        array(),
        wp_get_theme()->get( 'Version' )
    );
}

add_action( 'wp_enqueue_scripts', 'tn_propio_cargar_estilos' );