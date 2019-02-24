<?php
/**
 * The Admin specific functionality.
 * General stuff that is not specific to any class.
 *
 * @since   1.0.0
 * @package Portfolio_Inf\Admin
 */

namespace Portfolio_Inf\Admin;

use Portfolio_Inf\Helpers\General_Helper;
use Portfolio_Inf\Includes\Config;

/**
 * Class Admin
 */
class Admin extends Config {

  /**
   * Register the Stylesheets for the admin area.
   *
   * @since 1.0.0
   */
  public function enqueue_styles() {

    wp_register_style( static::THEME_NAME . '-style', General_Helper::get_manifest_assets_data( 'applicationAdmin.css' ), array(), static::THEME_VERSION );
    wp_enqueue_style( static::THEME_NAME . '-style' );

  }

  /**
   * Register the JavaScript for the admin area.
   *
   * @since 1.0.0
   */
  public function enqueue_scripts() {

    wp_register_script( static::THEME_NAME . '-scripts', General_Helper::get_manifest_assets_data( 'applicationAdmin.js' ), array(), static::THEME_VERSION, true );
    wp_enqueue_script( static::THEME_NAME . '-scripts' );

  }

  /**
   * Method that changes admin colors based on environment variable. Must have POR_ENV global variable set.
   *
   * @param string $color_scheme Color scheme string.
   * @return string              Modified color scheme.
   *
   * @since 1.0.0
   */
  public function set_admin_color_based_on_env( $color_scheme ) {
    if ( ! defined( 'POR_ENV' ) ) {
      return false;
    }

    if ( POR_ENV === 'production' ) {
      $color_scheme = 'sunrise';
    } elseif ( POR_ENV === 'staging' ) {
      $color_scheme = 'blue';
    } else {
      $color_scheme = 'fresh';
    }

    return $color_scheme;
  }

  /**
   * Adding options menu in admin panel
   */
  public function add_options_menu_in_admin() {

      acf_add_options_page();
      acf_add_options_sub_page( 'Header' );
      acf_add_options_sub_page( 'Tracking Codes' );
      acf_add_options_sub_page( 'Website Settings' );
      acf_add_options_sub_page( 'Social Networks' );
      acf_add_options_sub_page( 'Footer' );

      return;
  }

}
