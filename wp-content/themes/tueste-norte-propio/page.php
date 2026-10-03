<?php
get_header();
?>

<section class="listado-contenido">
    <?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); ?>
            <article <?php post_class( 'tarjeta' ); ?>>
                <h1><?php the_title(); ?></h1>

                <div class="contenido-pagina">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; ?>

    <?php else : ?>
        <p>No hay contenido disponible.</p>
    <?php endif; ?>
</section>

<?php
get_footer();