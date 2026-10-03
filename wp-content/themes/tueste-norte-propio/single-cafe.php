<?php
get_header();
?>

<?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post(); ?>

        <article <?php post_class( 'entrada-completa tarjeta ficha-cafe' ); ?>>

            <header class="cabecera-entrada">
                <h1><?php the_title(); ?></h1>

                <p>
                    Publicado el
                    <?php echo esc_html( get_the_date() ); ?>
                </p>
            </header>

            <?php if ( has_post_thumbnail() ) : ?>

                <div class="imagen-entrada imagen-cafe-individual">
                    <?php the_post_thumbnail( 'large' ); ?>
                </div>

            <?php endif; ?>

            <?php if ( function_exists( 'get_field' ) ) : ?>

                <?php
                $origen        = get_field( 'origen' );
                $notas_cata    = get_field( 'notas_cata' );
                $nivel_tueste  = get_field( 'nivel_tueste' );
                $precio        = get_field( 'precio' );
                ?>

                <section class="datos-cafe ficha-datos-cafe"
                    aria-label="Datos del café">

                    <?php if ( $origen ) : ?>
                        <p>
                            <strong>Origen:</strong>
                            <?php echo esc_html( $origen ); ?>
                        </p>
                    <?php endif; ?>

                    <?php if ( $notas_cata ) : ?>
                        <p>
                            <strong>Notas de cata:</strong>
                            <?php echo esc_html( $notas_cata ); ?>
                        </p>
                    <?php endif; ?>

                    <?php if ( $nivel_tueste ) : ?>
                        <p>
                            <strong>Nivel de tueste:</strong>
                            <?php echo esc_html( ucfirst( $nivel_tueste ) ); ?>
                        </p>
                    <?php endif; ?>

                    <?php if ( $precio !== '' && $precio !== null ) : ?>
                        <p>
                            <strong>Precio:</strong>
                            <?php
                            echo esc_html(
                                number_format(
                                    (float) $precio,
                                    2,
                                    ',',
                                    '.'
                                ) . ' €'
                            );
                            ?>
                        </p>
                    <?php endif; ?>

                </section>

            <?php endif; ?>

            <div class="contenido-entrada">
                <?php the_content(); ?>
            </div>

            <p>
                <a
                    class="enlace-cafe volver-catalogo"
                    href="<?php
                    echo esc_url(
                        get_post_type_archive_link( 'cafe' )
                    );
                    ?>"
                >
                    ← Volver al catálogo
                </a>
            </p>

        </article>

    <?php endwhile; ?>

<?php else : ?>

    <p>No se ha encontrado el café.</p>

<?php endif; ?>

<?php
get_footer();