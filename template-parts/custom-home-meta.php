<?php
require ABSPATH . 'wp-content/plugins/wordpress-plugin-resa/room-dating-front-planning.php';
if ( isset( get_post_meta( get_the_ID() )['slider-home'] ) ) :
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
else:
  if ( isset( get_post_meta( get_the_ID() )['thumbnail-home'] ) ) :
    echo get_the_post_thumbnail(get_the_ID());
  endif;
endif; ?>
<?php if ( isset( get_post_meta( get_the_ID() )['planning-home'] ) ) : ?>
  <div id="calendar-widget"></div>
<?php endif ?>
<?php if ( isset( get_post_meta( get_the_ID() )['map-home'] ) ) : ?>
  <section class="map map-home">
    <div class="map-container">
      <div id="map"></div>
    </div>
    <a class="itineraire" href="https://www.google.fr/maps/place/Le+g%C3%AEte+de+La+Doline+ancien+g%C3%AEte+du+four+%C3%A0+pain/@44.2172099,3.3212973,17z/data=!3m1!4b1!4m5!3m4!1s0x12b3a4be76788633:0x13e3610b70aef96d!8m2!3d44.2172099!4d3.323486">Itinéraire</a>
  </section>
<?php endif; ?>
<?php if ( isset( get_post_meta( get_the_ID() )['facebook-home'] ) ) : ?>
  <div class="fb-page"
    data-href="https://www.facebook.com/gitedufourapain/"
    data-tabs="timeline"
    data-small-header="false"
    data-adapt-container-width="true"
    data-hide-cover="false"
    data-show-facepile="true">
    <blockquote cite="https://www.facebook.com/gitedufourapain/" class="fb-xfbml-parse-ignore">
      <a href="https://www.facebook.com/gitedufourapain/">Le gîte de la Doline</a>
    </blockquote>
  </div>
<?php endif ?>
<?php if (get_post_field( 'post_name', get_the_ID() ) === 'actualites') :
  get_template_part( 'template-parts/get-posts', 'get posts' ); ?>
<?php endif; ?>
<?php if ( isset( get_post_meta( get_the_ID() )['accueil-home'] ) ) :
  get_template_part( 'template-parts/menu-accueil', 'menu accueil' ); ?>
<?php endif; ?>
<?php if ( isset( get_post_meta( get_the_ID() )['planning-home'] ) ) : ?>
  <section class="calendar">
    <div id="calendar-widget"></div>
  </section>
<?php endif; ?>
