<?php
/**
* Template Name: Hermelen Page Actu
*
*/
get_header();
require ABSPATH . 'wp-content/plugins/wordpress-plugin-resa/room-dating-front-room.php';
?>

	<div class="content-area">
		<main id="main" class="site-main">
			<?php // if( wp_get_current_user()->ID === 1) { echo '<span class="info-temp-cursor">*<span class="info-temp">hermelen-template-page-room</span></span>'; } ?>
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
    <aside>
			<div class="fb-page"
				data-href="https://www.facebook.com/gitedufourapain/"
				data-tabs="timeline"
				data-small-header="false"
				data-adapt-container-width="true"
				data-hide-cover="false"
				data-show-facepile="true">
				<blockquote cite="https://www.facebook.com/gitedufourapain/" class="fb-xfbml-parse-ignore">
					<a href="https://www.facebook.com/gitedufourapain/">Le gîte de la Doline</a>
				</blockquote>
			</div>
    </aside>
	</div><!-- #primary -->

<?php
get_footer();
