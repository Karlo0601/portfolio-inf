<?php
/**
 * Single Page
 *
 * @package Portfolio_Inf\Template_Parts\Single
 */

use Portfolio_Inf\Theme\Utils\Images;
use Portfolio_Inf\Helpers\Acf_Field_Helper;

$fields = get_field( 'flexible_content' );
$render = Acf_Field_Helper::flexible_layout( '' );

$image = Images::get_post_image( 'full_width' );

if ( $render ) {
  echo $render;
} else { ?>
  <!-- Single Content Section -->
  <section class="single" id="<?php echo esc_attr( $post->ID ); ?>">
    <div class="single__image" style="background-image: url('<?php echo esc_url( $image['image'] ); ?>');"></div>
    <header>
      <h1 class="single__title">
        <?php the_title(); ?>
      </h1>
    </header>
    <div class="single__content content-style content-media-style">
      <?php the_content(); ?>
    </div>
    <?php require locate_template( 'template-parts/parts/google-rich-snippets.php' ); ?>
  </section>

    <?php

}
