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
				<?php 
				if ( isset( get_post_meta( get_the_ID() )['slider'] ) ) :
					$children = get_children( get_the_ID() );
					if (isset($children) && !empty($children)) : ?>
						  <div class="slider-container">
						  	<div class="slick-slider">
						  	<?php foreach ($children as $child) : ?>
									<a href="<?php echo $child->guid ?>">
										<div class="single-slide-container">
											<div class="all-content">
												<div class="text-content">
													<h3><?php echo $child->post_title ?></h3>
													<p><?php echo $child->post_excerpt ?></p>
												</div>
											</div>
											<img src="<?php echo get_the_post_thumbnail_url($child->ID) ?>" alt="<?php echo $child->post_title ?>">								
										</div>
									</a>										
						  	<?php endforeach ?>
						  	</div>
						  </div>
						<?php	
					endif;
				endif; 
				?>
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

		<?php endwhile; // End of the loop.
		?>

	</div><!-- #primary -->

<?php
