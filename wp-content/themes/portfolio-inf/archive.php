<?php
/**
 * Template Name: Archives
 * Display regular Posts archive
 *
 * @package Portfolio_Inf
 */

get_header();

use Portfolio_Inf\Theme\Utils\Get_Posts as Get_Posts;

global $post;
$hero_image['image'] = get_field( 'hero_image', $post->ID );
$hero_image['title'] = get_field( 'hero_title', $post->ID );

if ( get_query_var( 'cat' ) ) {
  $category_id = get_query_var( 'cat' );
}

if ( $hero_image ) {
  Timber::render( 'page-hero.twig', $hero_image );
}
?>
<section id="blog" class="blog layout layout--wide layout-padding--extra-large">
    <div class="container">
      <div class="blog__content">
        <?php
        $archive_posts = Get_Posts::get_posts( 'post', 20, 'listing', $category_id, true );

        if ( $archive_posts ) {
          foreach ( $archive_posts as $key => $post_item ) {

            require locate_template( 'template-parts/listing/articles/list.php' );
          }
          the_posts_pagination();
        } else {

          get_template_part( 'template-parts/listing/articles/empty' );

        };
        ?>
      </div>
      <aside class="sidebar sidebar--blog">
        <div class="sidebar__single-item">
          <h3>Some title</h3>
          <p>Veniam sapiente qui possimusMolestiae molestiae quas vel etOccaecati</p>
        </div>
        <div class="sidebar__single-item">
          <h3>Some title</h3>
          <p>Veniam sapiente qui possimusMolestiae molestiae quas vel etOccaecati</p>
        </div>
        <div class="sidebar__single-item">
          <h3>Some title</h3>
          <p>Veniam sapiente qui possimusMolestiae molestiae quas vel etOccaecati</p>
        </div>
      </aside>
    </div>
</section>

<?php

get_footer();
