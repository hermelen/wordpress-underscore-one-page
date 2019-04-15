<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hermelen-one-page
 */
global $post;
$slider_ID = $wpdb->get_var( " SELECT ID FROM {$wpdb->prefix}posts WHERE post_title = '$post->post_name' "	);
$slider = do_shortcode('[metaslider id='.$slider_ID.']');// if slider named the-post-slug
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php // if( wp_get_current_user()->ID === 1) { echo '<span class="info-temp-cursor">*<span class="info-temp">content-page</span></span>'; } ?>
		<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
	</header><!-- .entry-header -->
		<div class="entry-content">
			<?php if ( isset( $slider ) && !empty( $slider ) ) : ?>
		  	<div class="img">
		  		<?= $slider ?>
		  	</div>
		  <?php else : ?>
		  	<div class="img">
		  		<?php echo get_the_post_thumbnail( $post->ID, 'full' ) ?>
		  	</div>
		  <?php endif; ?>
			<?php if ( isset( get_post_meta( get_the_ID() )['map-home'] ) ) : ?>
				<section class="map map-page">
					<h4>Notre Causse</h4>
					<div class="map-container">
						<div id="map"></div>
					</div>
				</section>
			<?php endif ?>
		<?php the_content(); ?>
	</div><!-- .entry-content -->
	<?php // get_template_part( 'template-parts/custom-home-meta', 'Custom display by meta_key' ); ?>
	<?php $children = get_children( get_the_ID() );
	if (isset($children) && !empty($children)) : ?>
  	<section class="page-card-container">
  		<?php foreach ($children as $child) :
  			if ($child->post_type !== 'attachment') : ?>
  			<a href="<?php echo $child->guid ?>">
  				<div class="page-card">
  					<div class="single-page-child-container">
  						<h3><?php echo $child->post_title ?></h3>
  						<?php	$img = get_the_post_thumbnail_url($child->ID);
  						if (isset($img) && !empty($img)) : ?>
  						<div>
  							<div></div>
  							<img src="<?php echo get_the_post_thumbnail_url($child->ID) ?>" alt="<?php echo $child->post_title ?>">
  						</div>
  					<?php endif ?>
  					<p><?php echo $child->post_excerpt ?></p>
  				</div>
  			</div>
  		</a><?php
  	endif;
  endforeach; ?>
  </section> <?php
  endif; ?>

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'hermelen-one-page' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
