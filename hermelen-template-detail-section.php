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
$page_id = get_the_ID();

// debug($children);

?>
	<div id="primary" class="content-area">

		<?php
		while ( have_posts() ) :
			the_post(); ?>
				<header class="entry-header">
					<?php
					if ( is_singular() ) :
						the_title( '<h2 class="entry-title">', '</h2>' );
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
				<div class="children-data"> <?php
				// require_once(get_template_directory() . '/inc/micro-functions.php');
	      $children = get_children(get_the_ID());
				// debug($children);
					if (isset($children) && !empty($children)) : ?>
					<ul>
						<?php
						foreach ($children as $child) : ?>
						<li>
							<a href="<?= $child->guid ?>">
								<h4><?= $child->post_title ?></h4>
								<p><?= $child->post_excerpt ?></p>
							</a>
						</li>
						<?php
						endforeach; ?>
					</ul>
						<?php
					endif
				?>
				</div>

		<?php endwhile; // End of the loop.
		?>

	</div><!-- #primary -->

<?php
