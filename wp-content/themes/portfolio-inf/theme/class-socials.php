<?php
/**
 * The Social icons for useage in theme.
 *
 * @since   1.0.0
 * @package Portfolio_Inf\Theme
 */

namespace Portfolio_Inf\Theme;

use Portfolio_Inf\Helpers\General_Helper;

/**
 * Class Images
 */
class Socials {

  /**
   * Enable support for social icons
   *
   * @param container_css_class_modifier $container_css_class_modifier modifier for container class.
   *
   * @since 1.0.0
   */
  public static function theme_social_links( $container_css_class_modifier = '' ) {
    $output  = '';
    $socials = array();

    $facebook   = get_field( 'facebook', 'options' );
    $github     = get_field( 'github', 'options' );
    $codepen    = get_field( 'codepen', 'options' );
    $twitter    = get_field( 'twitter', 'options' );
    $instagram  = get_field( 'instagram', 'options' );
    $linkedin   = get_field( 'linkedin', 'options' );
    $snapchat   = get_field( 'snapchat', 'options' );
    $googleplus = get_field( 'googleplus', 'options' );
    $pinterest  = get_field( 'pinterest', 'options' );
    $youtube    = get_field( 'youtube', 'options' );

    if ( ! empty( $facebook ) ) {
        $socials['facebook'] = $facebook;
    }
    if ( ! empty( $github ) ) {
          $socials['github'] = $github;
    }
    if ( ! empty( $codepen ) ) {
        $socials['codepen'] = $codepen;
    }
    if ( ! empty( $instagram ) ) {
        $socials['instagram'] = $instagram;
    }
    if ( ! empty( $twitter ) ) {
        $socials['twitter'] = $twitter;
    }
    if ( ! empty( $linkedin ) ) {
        $socials['linkedin'] = $linkedin;
    }
    if ( ! empty( $snapchat ) ) {
        $socials['snapchat'] = $snapchat;
    }
    if ( ! empty( $googleplus ) ) {
        $socials['googleplus'] = $googleplus;
    }
    if ( ! empty( $pinterest ) ) {
        $socials['pinterest'] = $pinterest;
    }
    if ( ! empty( $youtube ) ) {
        $socials['youtube'] = $youtube;
    }

    if ( ! empty( $socials ) ) {
      $output .= '<ul class="social ' . $container_css_class_modifier . ' clearfix">';

      foreach ( $socials as $key => $value ) {

        $output .= '<li class="social__item social__item--' . $key . '">
                <a href="' . esc_url( $value ) . '" class="social__icon social__icon--' . $key . '"" target="_blank">
                  <svg class="social--' . $key . '">
                    <use xlink:href="' . General_Helper::get_manifest_assets_data( 'sprite.svg' ) . '#social--' . $key . '"></use>
                  </svg>
                </a>
            </li>';

      }

      $output .= '</ul>';
    }

    return $output;
  }

}
