<?php
/**
* Template Name: Hermelen Page
*
*/
get_header();
?>

	<div class="content-area">
		<main id="main" class="site-main">
			<?php // if( wp_get_current_user()->ID === 1) { echo '<span class="info-temp-cursor">*<span class="info-temp">hermelen-template-page</span></span>'; } ?>
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
	</div><!-- #primary -->

<?php
get_footer();
