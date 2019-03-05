<?php
/**
 * Google Rich Snippets
 *
 * @package Portfolio_Inf\Template_Parts\Parts
 */

use Portfolio_Inf\Helpers\General_Helper;

$logo_img = General_Helper::get_manifest_assets_data( 'images/logo.svg' );
if ( $post_item ) {
  $image['image']  = $post_item['image']['image'];
  $image['height'] = $post_item['image']['height'];
  $image['width']  = $post_item['image']['width'];
  $post_title      = $post_item['title'];
} else {
  $post_title = get_the_title();
}
?>

<!-- Google Rich Snippets -->
<script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "NewsArticle",
    "mainEntityOfPage": {
      "@type": "WebPage",
      "@id": "https://google.com/article"
    },
    "headline": "<?php echo esc_html( $post_title ); ?>",
  "image": {
    "@type": "ImageObject",
    "url": "<?php echo esc_html( $image['image'] ); ?>",
    "height": <?php echo esc_html( $image['height'] ); ?>,
    "width": <?php echo esc_html( $image['width'] ); ?>
  },
  "datePublished": "<?php echo esc_html( get_the_time( 'c' ) ); ?>",
  "dateModified": "<?php echo esc_html( date( 'c', strtotime( $post->post_modified ) ) ); ?>",
  "author": {
    "@type": "Person",
    "name": "<?php echo get_the_author(); ?>"
  },
    "publisher": {
    "@type": "Organization",
    "name": "<?php echo esc_html( get_bloginfo( 'name' ) ); ?>",
    "logo": {
    "@type": "ImageObject",
    "url": "<?php echo esc_url( $logo_img ); ?>",
    "width": 220,
    "height": 60
    }
  },
  "description": "<?php echo esc_html( wp_strip_all_tags( get_the_excerpt() ) ); ?>"
  }
</script>
