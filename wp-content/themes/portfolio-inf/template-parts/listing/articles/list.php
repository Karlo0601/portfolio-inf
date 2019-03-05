<?php
/**
 * List Simple Article
 *
 * @package Portfolio_Inf\Template_Parts\Listing\Articles
 */

use Portfolio_Inf\Theme\Utils\Images;

$image = Images::get_post_image( 'full_width' );
?>
<article class="article-list">
  <div class="article-list__container">
    <a class="article-list__image" href="<?php echo esc_url( $post_item['permalink'] ); ?>">
      <img src="<?php echo esc_url( $post_item['image']['image'] ); ?>" width="<?php echo esc_url( $post_item['image']['width'] ); ?>" height="<?php echo esc_url( $post_item['image']['height'] ); ?>" alt="<?php echo esc_html( $post_item['title'] ); ?>">
    </a>
    <div class="article-list__content">
      <header>
      <h4 class="article-list__heading">
        <a class="article-list__heading-link" href="<?php echo esc_url( $post_item['permalink'] ); ?>">
          <?php echo esc_html( $post_item['title'] ); ?>
        </a>
      </h4>
      <div class="article-list__meta">
        <span class="article-list__meta-author">Author: <a href="http://creativeoverflow.net/author/michaeljohnson/" title="Posts by Michael Johnson" rel="author"><?php echo esc_html( $post_item['author'] ); ?></a></span>
        <span class="article-list__meta-cat">
          <?php
          foreach ( $post_item['categories'] as $cat_item ) {
            echo '<a href="' . esc_url( get_category_link( $cat_item->term_id ) ) . '" rel="category tag">' . esc_html( $cat_item->name ) . '</a>';
          }
          ?>
        </span>
        <span class="article-list__meta-date"><?php echo esc_html( $post_item['date'] ); ?></span>
      </div>
      </header>
      <div class="article-list__excerpt">
        <?php echo esc_html( wp_strip_all_tags( $post_item['excerpt'] ) ); ?>
      </div>
    </div>
  </div>
  <?php require locate_template( 'template-parts/parts/google-rich-snippets.php' ); ?>
</article>
