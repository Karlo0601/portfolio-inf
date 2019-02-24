<?php
/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since   1.0.0
 * @package Portfolio_Inf\Includes
 */

namespace Portfolio_Inf\Includes;

use Portfolio_Inf\Includes\Config;

/**
 * Class Internationalization
 */
class Internationalization extends Config {

  /**
   * Load the plugin text domain for translation.
   *
   * @since 1.0.0
   */
  public function load_theme_textdomain() {
    load_theme_textdomain( static::THEME_NAME, get_template_directory() . '/languages' );
  }
}