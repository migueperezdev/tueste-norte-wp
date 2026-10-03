<?php
get_header();
?>

<main class="contenido-principal">
    <div class="contenedor">

        <header class="cabecera-archivo">
            <h1>Nuestros cafés</h1>
            <p>Descubre nuestra selección de cafés de especialidad.</p>
        </header>

        <?php if ( have_posts() ) : ?>

            <div class="listado-contenido listado-cafes">

    <?php while ( have_posts() ) : the_post(); ?>

        <article <?php post_class( 'tarjeta tarjeta-cafe' ); ?>>

            <?php if ( has_post_thumbnail() ) : ?>
                <a href="<?php the_permalink(); ?>" class="imagen-cafe">
                    <?php the_post_thumbnail( 'large' ); ?>
                </a>
            <?php endif; ?>

            <h2 class="titulo-cafe">
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
            </h2>

            <?php
$origen        = get_field( 'origen' );
$notas_cata    = get_field( 'notas_cata' );
$nivel_tueste  = get_field( 'nivel_tueste' );
$precio        = get_field( 'precio' );
$tueste_semana = get_field( 'tueste_semana' );
?>

<?php if ( $tueste_semana ) : ?>
    <p class="etiqueta-tueste-semana">
        Tueste de la semana
    </p>
<?php endif; ?>

<div class="datos-cafe">

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
            <?php echo esc_html( number_format_i18n( (float) $precio, 2 ) ); ?> €
        </p>
    <?php endif; ?>

</div>

            <div class="resumen-cafe">
                <?php the_excerpt(); ?>
            </div>

            <a class="enlace-cafe" href="<?php the_permalink(); ?>">
                Ver café
            </a>

        </article>

    <?php endwhile; ?>

</div>

        <?php else : ?>

            <p>Todavía no hay cafés disponibles.</p>

        <?php endif; ?>

    </div>
</main>

<?php
get_footer();