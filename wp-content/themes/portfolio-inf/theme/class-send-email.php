<?php
/**
 * In this function we will handle the form inputs and send our email.
 *
 * @since   1.0.0
 * @package Portfolio_Inf\Theme
 */

namespace Portfolio_Inf\Theme;

use Portfolio_Inf\Helpers\WP_Mail_Helper as WP_Mail_Helper;
use Portfolio_Inf\Includes\Internationalization as Internationalization;

/**
 * Class Send_Email
 */
class Send_Email {

  /**
   * Adding actions for ajax
   *
   * @since 1.0.0
   */
  public function __construct() {
    add_action( 'wp_ajax_send_form', array( $this, 'send_form' ) ); // This is for authenticated users.
    add_action( 'wp_ajax_nopriv_send_form', array( $this, 'send_form' ) ); // This is for unauthenticated users.
  }

  /**
   * Send email function
   *
   * @since 1.0.0
   */
  public function send_form() {
    // This is a secure process to validate if this request comes from a valid source.
    check_ajax_referer( 'security-nonce', 'security' );

    /**
    * First we make some validations,
    * I think you are able to put better validations and sanitizations. =)
    */

    $send_to = get_field( 'admin_email_address', 'options' );
    $labels  = Internationalization::global_labels( '' );

    if ( isset( $_POST['full-name'] ) ) {
      $full_name = sanitize_text_field( wp_unslash( $_POST['full-name'] ) );
    }
    if ( isset( $_POST['subject'] ) ) {
      $subject = sanitize_text_field( wp_unslash( $_POST['subject'] ) );
    }
    if ( isset( $_POST['email'] ) ) {
      $email = sanitize_email( wp_unslash( $_POST['email'] ) );
    }
    if ( isset( $_POST['phone'] ) ) {
      $phone_number = sanitize_text_field( wp_unslash( $_POST['phone'] ) );
    }
    if ( isset( $_POST['message'] ) ) {
      $message = sanitize_text_field( wp_unslash( $_POST['message'] ) );
    }
    $redirect_site_url = esc_url( site_url( '/thank-you/' ) );

    if ( empty( $phone_number ) && ! filter_var( $email, FILTER_VALIDATE_EMAIL ) && empty( $full_name ) ) {
      echo wp_json_encode(
        array(
            'status' => 'error',
            'status_data' => 'One or more fields have an error. Please check and try again',
            'field' => 'phone-number',
        )
      );
      wp_die();
    }

    $send_email = WP_Mail_Helper::init()
      ->to( sanitize_email( $send_to ) )
      ->subject( $subject )
      ->template(
        esc_url_raw( get_template_directory() ) . '/template-part/email-template/email-template.html',
        [
            'labels'        => $labels,
            'full_name'     => $full_name,
            'subject'       => $subject,
            'email'         => $email,
            'phone_number'  => $phone_number,
            'message'       => $message,
        ]
      )
    ->send();

    if ( $send_email ) {
      echo wp_json_encode(
        array(
            'status'        => 'success',
            'status_data'   => $labels['label_success'],
            'action'        => 'redirect',
            'redirectPath'  => $redirect_site_url,
        )
      );
    } else {
      echo wp_json_encode(
        array(
            'status'        => 'error',
            'status_data'   => $labels['label_error'],
            'action'        => '',
        )
      );
    }
    exit();

  }
}
