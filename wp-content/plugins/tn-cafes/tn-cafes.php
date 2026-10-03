<?php
/**
 * Plugin Name: TN Cafés
 * Description: Gestiona el catálogo de cafés y el tueste de la semana.
 * Version: 1.0.0
 * Author: Miguel Ángel Pérez Rodríguez
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * Registra la sección de cafés en WordPress.
 */
function tn_cafes_registrar_tipo_contenido() {
    $etiquetas = array(
        'name'          => 'Cafés',
        'singular_name' => 'Café',
        'menu_name'     => 'Cafés',
        'add_new'       => 'Añadir café',
        'add_new_item'  => 'Añadir nuevo café',
        'edit_item'     => 'Editar café',
        'new_item'      => 'Nuevo café',
        'view_item'     => 'Ver café',
        'search_items'  => 'Buscar cafés',
        'all_items'     => 'Todos los cafés',
        'not_found'     => 'No se han encontrado cafés',
    );

    $opciones = array(
        'labels'       => $etiquetas,
        'public'       => true,
        'has_archive'  => true,
        'rewrite'      => array(
            'slug' => 'cafes',
        ),
        'show_in_rest' => true,
        'rest_base'    => 'cafes',
        'menu_icon'    => 'dashicons-coffee',
        'supports'     => array(
            'title',
            'editor',
            'thumbnail',
            'excerpt',
        ),
    );

    register_post_type( 'cafe', $opciones );
}

add_action( 'init', 'tn_cafes_registrar_tipo_contenido' );

/**
 * Prepara las direcciones al activar el plugin.
 */
function tn_cafes_activar() {
    tn_cafes_registrar_tipo_contenido();
    flush_rewrite_rules();
}

register_activation_hook( __FILE__, 'tn_cafes_activar' );

/**
 * Limpia las direcciones al desactivar el plugin.
 */
function tn_cafes_desactivar() {
    flush_rewrite_rules();
}

register_deactivation_hook( __FILE__, 'tn_cafes_desactivar' );

/**
 * Registra los campos personalizados de cada café.
 */
function tn_cafes_registrar_campos_acf() {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) {
        return;
    }

    acf_add_local_field_group(
        array(
            'key'   => 'group_tn_datos_cafe',
            'title' => 'Datos del café',

            'fields' => array(
                array(
                    'key'      => 'field_tn_origen',
                    'label'    => 'Origen',
                    'name'     => 'origen',
                    'type'     => 'text',
                    'required' => 1,
                ),
                array(
                    'key'      => 'field_tn_notas_cata',
                    'label'    => 'Notas de cata',
                    'name'     => 'notas_cata',
                    'type'     => 'textarea',
                    'required' => 1,
                ),
                array(
                    'key'      => 'field_tn_nivel_tueste',
                    'label'    => 'Nivel de tueste',
                    'name'     => 'nivel_tueste',
                    'type'     => 'select',
                    'choices'  => array(
                        'claro'   => 'Claro',
                        'medio'   => 'Medio',
                        'oscuro'  => 'Oscuro',
                    ),
                    'required' => 1,
                ),
                array(
                    'key'      => 'field_tn_precio',
                    'label'    => 'Precio',
                    'name'     => 'precio',
                    'type'     => 'number',
                    'append'   => '€',
                    'min'      => 0,
                    'step'     => 0.01,
                    'required' => 1,
                ),
                array(
                    'key'          => 'field_tn_tueste_semana',
                    'label'        => 'Tueste de la semana',
                    'name'         => 'tueste_semana',
                    'type'         => 'true_false',
                    'message'      => 'Destacar este café durante la semana',
                    'default_value' => 0,
                    'ui'            => 1,
                ),
            ),

            'location' => array(
                array(
                    array(
                        'param'    => 'post_type',
                        'operator' => '==',
                        'value'    => 'cafe',
                    ),
                ),
            ),

            'show_in_rest' => 1,
        )
    );
}

add_action( 'acf/init', 'tn_cafes_registrar_campos_acf' );
/**
 * Muestra una etiqueta en el café elegido como tueste de la semana.
 */
function tn_cafes_mostrar_tueste_semana( $contenido ) {
    if (
        is_singular( 'cafe' )
        && in_the_loop()
        && is_main_query()
        && function_exists( 'get_field' )
        && get_field( 'tueste_semana' )
    ) {
        $etiqueta = '<p class="etiqueta-tueste-semana">Tueste de la semana</p>';

        return $etiqueta . $contenido;
    }

    return $contenido;
}

add_filter( 'the_content', 'tn_cafes_mostrar_tueste_semana' );
/**
 * Devuelve el valor de un campo ACF en la REST API.
 */
function tn_cafes_obtener_campo_rest( $objeto, $nombre_campo ) {
    if ( ! function_exists( 'get_field' ) ) {
        return null;
    }

    return get_field( $nombre_campo, $objeto['id'] );
}

/**
 * Devuelve la dirección de la imagen destacada.
 */
function tn_cafes_obtener_imagen_rest( $objeto ) {
    $imagen = get_the_post_thumbnail_url( $objeto['id'], 'large' );

    return $imagen ? $imagen : '';
}

/**
 * Añade los datos personalizados a la REST API de cafés.
 */
function tn_cafes_registrar_campos_rest() {
    $campos_acf = array(
        'origen',
        'notas_cata',
        'nivel_tueste',
        'precio',
        'tueste_semana',
    );

    foreach ( $campos_acf as $campo ) {
        register_rest_field(
            'cafe',
            $campo,
            array(
                'get_callback' => 'tn_cafes_obtener_campo_rest',
            )
        );
    }

    register_rest_field(
        'cafe',
        'imagen_destacada',
        array(
            'get_callback' => 'tn_cafes_obtener_imagen_rest',
        )
    );
}

add_action( 'rest_api_init', 'tn_cafes_registrar_campos_rest' );