<?php
/**
 * Plantilla para mostrar las entradas individuales.
 *
 * Sobrescribe la plantilla del tema Twenty Twenty-One.
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header alignwide">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php twenty_twenty_one_post_thumbnail(); ?>
	</header>

	<div class="entry-content">

		<?php
		the_content();

		wp_link_pages(
			array(
				'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Página', 'tueste-norte' ) . '">',
				'after'    => '</nav>',
				'pagelink' => esc_html__( 'Página %', 'tueste-norte' ),
			)
		);
		?>

		<?php
		if ( has_category( 'cafes' ) && function_exists( 'get_field' ) ) :

			$origen          = get_field( 'origen' );
			$notas_de_cata   = get_field( 'notas_de_cata' );
			$nivel_de_tueste = get_field( 'nivel_de_tueste' );
			$precio          = get_field( 'precio' );

			$tiene_precio = false !== $precio && null !== $precio && '' !== $precio;

			if ( $origen || $notas_de_cata || $nivel_de_tueste || $tiene_precio ) :
				?>

				<section class="ficha-cafe default-max-width">
					<h2>Ficha de café</h2>

					<?php if ( $origen ) : ?>
						<p>
							<strong>Origen:</strong>
							<?php echo esc_html( $origen ); ?>
						</p>
					<?php endif; ?>

					<?php if ( $notas_de_cata ) : ?>
						<p>
							<strong>Notas de cata:</strong>
							<?php echo esc_html( $notas_de_cata ); ?>
						</p>
					<?php endif; ?>

					<?php if ( $nivel_de_tueste ) : ?>
						<p>
							<strong>Nivel de tueste:</strong>
							<?php echo esc_html( ucfirst( $nivel_de_tueste ) ); ?>
						</p>
					<?php endif; ?>

					<?php if ( $tiene_precio ) : ?>
						<p class="precio-cafe">
							<strong>Precio:</strong>
							<?php echo esc_html( number_format_i18n( (float) $precio, 2 ) ); ?>
							€ / 250 g
						</p>
					<?php endif; ?>
				</section>

				<?php
			endif;
		endif;
		?>

	</div>

	<footer class="entry-footer default-max-width">
		<?php twenty_twenty_one_entry_meta_footer(); ?>
	</footer>

	<?php if ( ! is_singular( 'attachment' ) ) : ?>
		<?php get_template_part( 'template-parts/post/author-bio' ); ?>
	<?php endif; ?>

</article>