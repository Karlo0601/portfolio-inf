<?php
/**
 * Grid Article
 *
 * @package Portfolio_Inf\Template_Parts\Listing\Articles
 */

use Portfolio_Inf\Theme\Utils\Images;

$image = Images::get_post_image( 'large', $post->ID );

?>
<article class="article-grid">
  <div class="article-grid__container">
    <a class="article-grid__image" href="<?php echo esc_url( $post_item['permalink'] ); ?>">
      <figure>
        <img src="<?php echo esc_url( $post_item['image']['image'] ); ?>" width="<?php echo esc_url( $post_item['image']['width'] ); ?>" height="<?php echo esc_url( $post_item['image']['height'] ); ?>" alt="<?php echo esc_html( $post_item['title'] ); ?>">
      </figure>
    </a>
    <div class="article-grid__content">
      <header>
      <h2 class="article-grid__heading">
        <a class="article-grid__heading-link" href="<?php echo esc_url( $post_item['permalink'] ); ?>">
          <?php echo esc_html( $post_item['title'] ); ?>
        </a>
      </h2>
      </header>
      <div class="article-grid__excerpt">
        <?php echo esc_html( wp_strip_all_tags( $post_item['excerpt'] ) ); ?>
      </div>
    </div>
  </div>
  <?php require locate_template( 'template-parts/parts/google-rich-snippets.php' ); ?>
</article>
