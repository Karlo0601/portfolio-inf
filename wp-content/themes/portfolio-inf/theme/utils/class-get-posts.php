<?php
/**
 * The Utils-Images specific functionality.
 *
 * @since   1.0.0
 * @package Portfolio_Inf\Theme\Utils
 */

namespace Portfolio_Inf\Theme\Utils;

use Portfolio_Inf\Helpers\General_Helper;
use Portfolio_Inf\Theme\Utils\Excerpt;

/**
 * Class Get Posts
 */
class Get_Posts {

  /**
   * Get posts with ajax
   *
   * If found return it, if not return no posts.
   *
   * @param string|Array $post_type  Enter post type.
   * @param integer      $number_of_posts  Number of posts per page.
   * @param string       $image_size Link to no image thumbnail.
   * @param integer      $category_id Get category id.
   * @param boolean      $pagination true/false.
   * @return array       Array with image settings.
   *
   * @since 1.0.0
   */
  public static function get_posts( $post_type, $number_of_posts = 6, $image_size = 'large', $category_id = '', $pagination = false ) {
    global $post;

    if ( ! $post_type ) {
      $post_type = 'post';
    }

    if ( ! $number_of_posts ) {
      $number_of_posts = '6';
    }
    // WP_Query arguments.
    $args = array(
        'post_type'       => array( $post_type ),
        'order_by'        => 'date',
        'order'           => 'DESC',
        'posts_per_page'  => $number_of_posts,
        'cat'             => $category_id,
    );
    // Pagination.
    if ( $pagination ) {
      $paged         = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
      $args['paged'] = $paged;
    }

    // The Query.
    $query = new \WP_Query( $args );

    // The Loop.
    if ( $query->have_posts() ) {
      while ( $query->have_posts() ) {
        $query->the_post();
        // do something.
        $post_id = get_the_ID();

        if ( has_post_thumbnail( $post_id ) ) {
          $attachemnt_id = get_post_thumbnail_id( $post_id );
          $image         = wp_get_attachment_image_src( $attachemnt_id, $image_size );

          $image_array = [
              'image'  => $image[0],
              'width'  => $image[1],
              'height' => $image[2],
          ];
        } else {
          $no_img      = General_Helper::get_manifest_assets_data( 'images/no-image.png' );
          $image_array = [
              'image'  => $no_img,
              'width'  => '300',
              'height' => '200',
          ];

          if ( ! empty( $no_image ) ) {
            $image_array['image'] = $no_image;
          }
        }
        $temp_post['image']      = $image_array;
        $temp_post['title']      = get_the_title( $post_id );
        $temp_post['permalink']  = get_the_permalink( $post_id );
        $temp_post['excerpt']    = Excerpt::get_excerpt( get_the_content(), 150 );
        $temp_post['author']     = get_the_author();
        $temp_post['categories'] = get_the_category( $post_id );
        $temp_post['date']       = get_the_time( 'F d, Y' );
        $return_posts[]          = $temp_post;
      }
    } else {
      // no posts found.
      echo esc_html( 'No posts found' );
    }

    // Restore original Post Data.
    wp_reset_postdata();

    return $return_posts;
  }


}
