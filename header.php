<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hermelen-one-page
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'hermelen-one-page' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$hermelen_one_page_description = get_bloginfo( 'description', 'display' );
			if ( $hermelen_one_page_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $hermelen_one_page_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->
		<?php
		if ( is_front_page() ) :
      get_template_part( 'template-parts/one-page-nav', 'One page nav' );
		else :
			get_template_part( 'template-parts/page-nav', 'Detail page nav' );
		endif; ?>
		<?php // get_template_part( 'template-parts/page-nav', 'page nav' ); ?>
	</header><!-- #masthead -->

<div id="content" class="site-content">
