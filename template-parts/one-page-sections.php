<?php
$menu_items = wp_get_nav_menu_items('Primary Menu');
if( $menu_items ) {
  foreach ($menu_items as $menu_item ) :
    $args = array('p' => $menu_item->object_id,'post_type' => 'any');
    global $wp_query;
    $wp_query = new WP_Query($args);
    if ($menu_item->post_parent == 0) : ?>
      <?php // if( wp_get_current_user()->ID === 1) { echo '<span class="info-temp-cursor">*<span class="info-temp">template-parts/one-page-template</span></span>'; } ?>
      <section <?php post_class('parent'); ?> id="<?php echo sanitize_title($menu_item->title); ?>">
        <?php
        if ( have_posts() ):
          // if ( file_exists( locate_template('template-home-section-'.sanitize_title($menu_item->title).'.php' ) ) ):
          //   include(locate_template('template-home-section-'.sanitize_title($menu_item->title).'.php'));
          // else:
            include(locate_template('template-home-section.php'));
          // endif;
        endif;
        $sub_menu_list = [];
        foreach ($menu_items as $sub_menu_item ) :
          if ($sub_menu_item->post_parent != 0) :
            array_push($sub_menu_list, sanitize_title($sub_menu_item->title));
            $args = array('p' => $sub_menu_item->object_id,'post_type' => 'any');
            global $wp_query;
            $wp_query = new WP_Query($args);
            if ($sub_menu_item->menu_item_parent == $menu_item->ID) :
              ?>
              <section <?php post_class('child'); ?> id="<?php echo sanitize_title($sub_menu_item->title); ?>">
                <?php
                if ( have_posts() ):
                  get_template_part( 'template-parts/template-home-detail-section', 'Detail sections' );
                endif; ?>
              </section> <?php
            endif;
          endif;
        endforeach;
        ?>
      </section><?php
    endif;
  endforeach;
  $sub_menu_list = json_encode($sub_menu_list);
};
?>

<script type="text/javascript">
  subMenuList = <?= $sub_menu_list ?>
</script>
