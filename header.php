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
	<header id="masthead" class="site-header">
		<div class="site-main-nav">
			<div class="gtranslate">
				<?php echo do_shortcode('[gtranslate]'); ?>
			</div>
			<?php	get_template_part( 'template-parts/one-page-nav', 'One page nav' ); ?>
		</div>
		<div class="header-slider">
		</div><!-- .header-slider -->
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() ) : ?>
				<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
				<?php $hermelen_one_page_description = get_bloginfo( 'description', 'display' );
				if ( $hermelen_one_page_description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo $hermelen_one_page_description; /* WPCS: xss ok. */ ?></p>
				<?php endif; ?>
				<div>
				  <img src="<?php echo( get_header_image() ); ?>" alt="<?php echo( get_bloginfo( 'title' ) ); ?>" />
				</div>	
			<?php endif; ?>
		</div><!-- .site-branding -->
	</header><!-- #masthead -->
	<?php breadcrumb(); ?>
  <div id="content" class="site-content">
