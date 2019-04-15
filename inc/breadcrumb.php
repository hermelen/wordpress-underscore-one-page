<?php
function breadcrumb(){
global $post;
if (is_page() && !is_front_page() || is_single() || is_category()) : ?>
  <div id="breadcrumb" class="row"><?php
      if (is_page()) :
        $ancestors = get_post_ancestors($post);
        if ($ancestors) :
          $ancestors = array_reverse($ancestors);
          foreach ($ancestors as $crumb) : ?>
            <span><a href="<?= get_the_guid($crumb) ?>"><?= get_the_title($crumb) ?></a> > </span><?php
          endforeach;
        endif;
      endif;
      if (is_single()) : $category = get_the_category(); ?>
        <span><a href="<?= get_category_spannk($category[0]->cat_ID) ?>"><?= $category[0]->cat_name ?></a> > </span><?php
      endif;
      if (is_category()) : $category = get_the_category(); ?>
        <span><?= $category[0]->cat_name ?> > </span><?php
      endif
      ?>
    <span><?= get_the_title() ?></span>
  </div>
  <?php endif;
} ?>
