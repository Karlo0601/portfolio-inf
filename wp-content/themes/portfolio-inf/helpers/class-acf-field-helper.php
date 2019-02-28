<?php
/**
 * Define the acf fields
 *
 * Loads and defines the acf fields for this theme
 * so that it is ready for use.
 *
 * @since   1.0.0
 * @package Inf_Theme\Plugins
 */

namespace Portfolio_Inf\Helpers;

use Portfolio_Inf\Includes\Internationalization as Internationalization;

/**
 * Class Acf fields
 */
class Acf_Field_Helper {

  /**
   * Load the field.
   *
   * @since 1.0.0
   */
  /**
   * Class Constructor.
   *
   * @param field $field gets field.
   */
  public function __construct( $field ) {
    $this->field = $field;
  }
  /**
   * Add Flexible Layout to content
   */
  public function flexible_layout() {
    global $post;
    $flexible = new Acf_Field_Helper( get_field( 'flexible_content', $post->ID ) );
    $output   = $flexible->render();
    $data    .= $output;
    return $data;
  }
  /**
   * Render Method
   *
   * @param output $output returns the output.
   */
  public function render( $output = '' ) {

    global $block_position;
    $block_position = 0;
    $blocks         = $this->field;

    // Bail if empty.
    if ( empty( $blocks ) ) {
      return null;
    }

    // Get Rendered View.
    foreach ( $blocks as $block ) {
         $output .= $this->compile_view( $block );
    }

    // Return.
    return $output;
  }

  /**
   * Render a Flexible Twig View - method
   *
   * @param block $block Gets block.
   *
   * @param args  $args Any additional args.
   */
  public function compile_view( $block, $args = array() ) {

    // Bail early.
    if ( ! $block ) {
        return;
    }

    // Block Counter.
    global $block_position;
    $block_position ++;

    $labels   = Internationalization::global_labels( '' );
    $defaults = array(
        'block_position' => $block_position,
        'labels'         => $labels,
    );

    // Arguments.
    $args = apply_filters( 'flexible_' . $block['acf_fc_layout'] . '_model', wp_parse_args( $block, $defaults ) );
    // View Name and Path.
    $viewname = implode( '-', explode( '_', strtolower( $args['acf_fc_layout'] . '.twig' ) ) );
    $viewname = apply_filters( 'flexible_' . $args['acf_fc_layout'] . '_view', $viewname );
    $viewpath = get_template_directory_uri() . '/views/' . $viewname;

    if ( $viewpath ) {

        $output = '';
        // Dinamic Hook + Specific Block Position.
        $output .= apply_filters( 'flexible_before_' . $args['acf_fc_layout'], $content );
        $output .= apply_filters( 'flexible_before_' . $args['acf_fc_layout'] . '_' . $args['block_position'], $content );

        $output .= \Timber::Compile( $viewname, $args );

        // Dinamic Hook + Specific Block Position.
        $output .= apply_filters( 'flexible_after_' . $args['acf_fc_layout'] . '_' . $args['block_position'], $content );
        $output .= apply_filters( 'flexible_after_' . $args['acf_fc_layout'], $content );
        return $output;

    } else {

        echo esc_html( '404 Not found' );

    }
  }
}
