<?php
/**
* Template Name: Hermelen Page Room
*
*/
get_header();
get_template_part('template-parts/room-dating');
?>

	<div id="primary" class="content-area room">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
    <?php get_sidebar(); ?>
	</div><!-- #primary -->

<?php
get_footer();
