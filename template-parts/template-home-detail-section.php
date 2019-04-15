<?php
/**
 * The template for section in one-page-template
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hermelen-one-page
 */

?>
	<!-- <div id="primary" class="primary content-area"> -->
	<div class="primary content-area">
		<?php
		while ( have_posts() ) : the_post(); ?>
			<header class="entry-header">
				<?php // if( wp_get_current_user()->ID === 1) { echo '<span class="info-temp-cursor">*<span class="info-temp">template-home-detail-section</span></span>'; } ?>
				<?php
				if ( is_singular() ) :
					the_title( '<h3 class="entry-title">', '</h3>' );
				else :
					the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
					endif; ?>
			</header><!-- .entry-header -->
			<div class="entry-content">
				<?php
				the_content( sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'hermelen-one-page' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
					) );

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'hermelen-one-page' ),
						'after'  => '</div>',
					) );
					?>
			</div><!-- .entry-content -->
			<?php	get_template_part( 'template-parts/custom-home-meta', 'Custom display by meta_key' ); ?>

		<?php endwhile; // End of the loop.	?>

	</div><!-- #primary -->

<?php
