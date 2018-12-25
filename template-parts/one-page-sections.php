<?php
$menu_items = wp_get_nav_menu_items('Primary Menu');
if( $menu_items ) {
  foreach ($menu_items as $menu_item ) :
    $args = array('p' => $menu_item->object_id,'post_type' => 'any');
    global $wp_query;
    $wp_query = new WP_Query($args);
    if ($menu_item->post_parent == 0) : ?>
      <section <?php post_class('parent'); ?> id="<?php echo sanitize_title($menu_item->title); ?>">
        <?php
        if ( have_posts() ):
          if ( file_exists( locate_template('hermelen-template-section-'.sanitize_title($menu_item->title).'.php' ) ) ):
            include(locate_template('hermelen-template-section-'.sanitize_title($menu_item->title).'.php'));
          else:
            include(locate_template('hermelen-template-section-default.php'));
          endif;
        endif;
        $sub_menu_list = [];
        foreach ($menu_items as $sub_menu_item ) :
          if ($sub_menu_item->post_parent != 0) :
            array_push($sub_menu_list, sanitize_title($sub_menu_item->title));
            $args = array('p' => $sub_menu_item->object_id,'post_type' => 'any');
            global $wp_query;
            $wp_query = new WP_Query($args);
            if ($sub_menu_item->menu_item_parent == $menu_item->ID) :
              // ATTENTION: créer un template par défaut si le template n'existe pas
              ?>
              <section <?php post_class('child'); ?> id="<?php echo sanitize_title($sub_menu_item->title); ?>">
                <?php
                if ( have_posts() ):
                  include(locate_template('hermelen-template-detail-section.php'));
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
