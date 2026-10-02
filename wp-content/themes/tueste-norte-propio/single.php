<?php
get_header();
?>

<?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post(); ?>
        <article <?php post_class( 'entrada-completa tarjeta' ); ?>>

            <header class="cabecera-entrada">
                <h1><?php the_title(); ?></h1>

                <p>
                    Publicada el <?php echo esc_html( get_the_date() ); ?>
                </p>
            </header>

            <?php if ( has_post_thumbnail() ) : ?>
                <div class="imagen-entrada">
                    <?php the_post_thumbnail( 'large' ); ?>
                </div>
            <?php endif; ?>

            <div class="contenido-entrada">
                <?php the_content(); ?>
            </div>

        </article>
    <?php endwhile; ?>

<?php else : ?>

    <p>No se ha encontrado la entrada.</p>

<?php endif; ?>

<?php
get_footer();