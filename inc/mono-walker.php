<?php
// thanks to:
// https://medium.com/@colirpixoil/cr%C3%A9er-un-site-one-page-propre-avec-wordpress-e817b3ab2a6f
// https://wabeo.fr/construire-walker-wordpress/
class mono_walker extends Walker_Nav_Menu{
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    // this create html structure
    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

    $class_names = $value = '';

    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    $classes[] = 'menu-item-' . $item->ID;
		if ($item->post_parent !== 0) {
			$classes[] = 'menu-item-child';
		}
		else {
			$classes[] = 'menu-item-parent';
		}

    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

    $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
    $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

    $output .= $indent . '<li' . $id . $value . $class_names .'>';
    // this create href slugifying title
    $atts = array();

    $atts['href'] = site_url()."#".sanitize_title($item->title);

    $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

    // this set href attribute with # anchor
    $attributes = '';
    foreach ( $atts as $attr => $value ) {
      if ( ! empty( $value ) ) {
				if ($item->post_parent !== 0 || $item->title === 'Accueil') {
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
      }
    }

    // this generate anchor
    $item_output = $args->before;
    $item_output .= '<a'. $attributes .'>';
    $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;

    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }
}
