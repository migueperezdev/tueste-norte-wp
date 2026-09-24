<?php

get_header();

while ( have_posts() ) :
	the_post();

	$subtitulo = get_field( 'subtitulo' );
	?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<header class="entry-header alignwide">

			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

			<?php if ( $subtitulo ) : ?>
				<p class="subtitulo-acf">
					<?php echo esc_html( $subtitulo ); ?>
				</p>
			<?php endif; ?>

		</header>

		<div class="entry-content">
			<?php the_content(); ?>
		</div>

		<?php if ( get_field( 'mostrar_aviso' ) ) : ?>
			<div class="aviso-acf">
				Aviso: esta información es importante.
			</div>
		<?php endif; ?>

	</article>

	<?php
endwhile;

get_footer();