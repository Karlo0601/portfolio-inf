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

  /**
   * Global labels
   */
  public static function global_labels() {
    $labels = [
        'label_full_name'           => __( 'Full name', 'portfolio-inf' ),
        'label_email'               => __( 'Email address', 'portfolio-inf' ),
        'label_phone'               => __( 'Phone', 'portfolio-inf' ),
        'label_subject'             => __( 'Subject', 'portfolio-inf' ),
        'label_message'             => __( 'Message', 'portfolio-inf' ),
        'label_button_contact'      => __( 'Send Message', 'portfolio-inf' ),
        'label_success'             => __( 'Thank you for getting in touch!', 'portfolio-inf' ),
        'label_error'               => __( 'Please enter required fields.', 'portfolio-inf' ),
        'label_error_email'         => __( 'Molim Vas unesite email adresu.', 'portfolio-inf' ),
        'label_error_name'          => __( 'Molim Vas unesite vaše ime.', 'portfolio-inf' ),
        'label_error_contact'       => __( 'Greška! Molimo provjerite unesene podatke.', 'portfolio-inf' ),
        'label_about_date'          => __( 'Date of Birth:', 'portfolio-inf' ),
        'label_about_language'      => __( 'Language:', 'portfolio-inf' ),
        'label_about_city'          => __( 'City and Country:', 'portfolio-inf' ),
        'label_about_expert'        => __( 'Expert in:', 'portfolio-inf' ),
        'label_about_phone'         => __( 'Phone:', 'portfolio-inf' ),
        'label_about_email'         => __( 'Email:', 'portfolio-inf' ),
        'label_about_availability'  => __( 'Availability:', 'portfolio-inf' ),
    ];
    return $labels;
  }
}
