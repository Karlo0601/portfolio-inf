<?php
/**
 * The Widgets specific functionality.
 *
 * @since   1.0.0
 * @package Portfolio_Inf\Admin
 */

namespace Portfolio_Inf\Admin;

/**
 * Class Widgets
 */
class Widgets {

  /**
   * Set up widget areas
   *
   * @since 1.0.0
   */
  public function register_widget_position() {
    register_sidebar(
      array(
          'name'          => esc_html__( 'Blog', 'portfolio-inf' ),
          'id'            => 'blog',
          'description'   => esc_html__( 'Description', 'portfolio-inf' ),
          'before_widget' => '',
          'after_widget'  => '',
          'before_title'  => '',
          'after_title'   => '',
      )
    );
  }

}
