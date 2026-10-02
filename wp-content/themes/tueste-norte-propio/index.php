<?php
get_header();
?>

<section class="listado-contenido">
    <?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); ?>
            <article <?php post_class( 'tarjeta' ); ?>>
                <h2>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h2>

                <?php the_excerpt(); ?>
            </article>
        <?php endwhile; ?>

    <?php else : ?>
        <p>No hay contenido disponible.</p>
    <?php endif; ?>
</section>

<?php
get_footer();