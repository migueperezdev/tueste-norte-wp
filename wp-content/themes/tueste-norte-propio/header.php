<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="cabecera-sitio">
    <div class="contenedor">
        <a class="nombre-sitio" href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <?php bloginfo( 'name' ); ?>
        </a>

        <nav class="navegacion-principal" aria-label="Menú principal">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'principal',
                    'container'      => false,
                    'fallback_cb'    => 'wp_page_menu',
                )
            );
            ?>
        </nav>
    </div>
</header>

<main class="contenido-principal contenedor">