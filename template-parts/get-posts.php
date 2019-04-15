<?php $args = array(
	'posts_per_page'   => 2,
	'offset'           => 0,
	'cat'         => '',
	'category_name'    => '',
	'orderby'          => 'date',
	'order'            => 'DESC',
	'include'          => '',
	'exclude'          => '',
	'meta_key'         => '',
	'meta_value'       => '',
	'post_type'        => 'post',
	'post_mime_type'   => '',
	'post_parent'      => '',
	'author'	   => '',
	'author_name'	   => '',
	'post_status'      => 'publish',
	'suppress_filters' => true,
	'fields'           => '',
);
$posts_array = get_posts( $args ); ?>
<div class="home-post-container">  
  <?php foreach ($posts_array as $post) : ?>
    <div class="home-post">
      <h4><?php  echo $post->post_title ?> : </h4>
      <p><?php  echo substr($post->post_content, 0, 100)."..." ?></p>
      <a class="actu-link" href="/notre-gite/actualites">Lire la suite</a>
    </div>
  <?php endforeach; ?>
</div>
