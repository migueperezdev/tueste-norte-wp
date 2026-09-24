<?php

function tueste_norte_cargar_estilos() {
	wp_enqueue_style(
		'estilo-padre',
		get_template_directory_uri() . '/style.css'
	);

	wp_enqueue_style(
		'estilo-tueste-norte',
		get_stylesheet_directory_uri() . '/style.css',
		array( 'estilo-padre' )
	);
}

add_action( 'wp_enqueue_scripts', 'tueste_norte_cargar_estilos' );