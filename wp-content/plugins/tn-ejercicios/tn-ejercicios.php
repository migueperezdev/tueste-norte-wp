<?php
/**
 * Plugin Name: TN Ejercicios
 * Description: Resuelve el ejercicio de acciones y filtros de la semana 3.
 * Version: 1.0.0
 * Author: Miguel Ángel Pérez Rodríguez
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Limita los resúmenes automáticos del blog a 20 palabras.
 *
 * @param int $longitud Longitud que WordPress iba a utilizar.
 * @return int Nueva longitud del resumen.
 */
function tn_ejercicios_acortar_resumen( $longitud ) {
    return 20;
}

add_filter( 'excerpt_length', 'tn_ejercicios_acortar_resumen' );

/*
 * Si otro plugin filtrara excerpt_length con prioridad 5 y devolviera 55,
 * se ejecutaría primero. Nuestro filtro usa la prioridad predeterminada 10,
 * se ejecutaría después y la longitud final sería de 20 palabras.
 */

/**
 * Añade un comentario HTML con la fecha al final de la página.
 */
function tn_ejercicios_mostrar_fecha() {
    echo '<!-- Página servida el ' . date( 'Y-m-d' ) . ' -->';
}

add_action( 'wp_footer', 'tn_ejercicios_mostrar_fecha' );