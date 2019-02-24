<?php
/**
 * The General specific functionality.
 *
 * @since   1.0.0
 * @package Portfolio_Inf\Theme
 */

namespace Portfolio_Inf\Theme;

/**
 * Class General
 */
class General {

  /**
   * Enable theme support
   *
   * @since 1.0.0
   */
  public function add_theme_support() {
    add_theme_support( 'title-tag', 'html5' );
  }
  /**
   * Global labelst
   */
  public function global_labels() {
    $labels = [
        'label_full_name'       => __( 'Full name', 'portfolio-inf' ),
        'label_email'           => __( 'Email address', 'portfolio-inf' ),
        'label_phone'           => __( 'Phone', 'portfolio-inf' ),
        'label_subject'         => __( 'Subject', 'portfolio-inf' ),
        'label_message'         => __( 'Message', 'portfolio-inf' ),
        'label_button_contact'  => __( 'Send Message', 'portfolio-inf' ),
        'label_success'         => __( 'Thank you for getting in touch!', 'portfolio-inf' ),
        'label_error'           => __( 'Please enter required fields.', 'portfolio-inf' ),
        'label_error_contact'   => __( 'Greška! Molimo provjerite unesene podatke.', 'portfolio-inf' ),
    ];
    return $labels;
  }

}
