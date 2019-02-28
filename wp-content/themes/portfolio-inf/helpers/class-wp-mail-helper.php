<?php
/**
 * A simple class for creating and sending Emails using WordPress
 * Used in theme side but only inside a class.
 *
 * @since   3.0.0
 * @package Portfolio_Inf\Helpers
 */

namespace Portfolio_Inf\Helpers;

/**
 * WP_Mail
 *
 * A simple class for creating and
 * sending Emails using WordPress
 *
 * @author     AnthonyBudd <anthonybudd94@gmail.com>
 */
class WP_Mail_Helper {

  /**
   * Email recipient
   *
   * @var Array
   */
  private $to = array();

  /**
   * Email recipient CC
   *
   * @var Array
   */
  private $cc = array();

  /**
   * Email recipient BCC
   *
   * @var Array
   */
  private $bcc = array();

  /**
   * Email subject
   *
   * @var string
   */
  private $subject = '';

  /**
   * Email sender address
   *
   * @var string
   */
  private $from = '';

  /**
   * Email headers
   *
   * @var Array
   */
  private $headers = array();

  /**
   * Email send as HTML True/false
   *
   * @var Boolean
   */
  private $send_as_html = true;

  /**
   * Email attachments
   *
   * @var Array
   */
  private $attachments = array();

  /**
   * Email template header
   *
   * @var Boolean
   */
  private $header_template = false;

  /**
   * Email template header variables
   *
   * @var Array
   */
  private $header_variables = array();

  /**
   * Email template
   *
   * @var Boolean
   */
  private $template = false;

  /**
   * Email various variables
   *
   * @var Array
   */
  private $variables = array();

  /**
   * Email after template content
   *
   * @var Boolean
   */
  private $after_template = false;

  /**
   * Email template footer variables
   *
   * @var Array
   */
  private $footer_variables = array();

  /**
   * Init Wp mail
   *
   * @return Object $this
   */
  public static function init() {
    return new self;
  }

  /**
   * Set recipients
   *
   * @var to $to.
   * @param  Array|String $to Set recipients.
   * @return Object $this
   */
  public function to( $to ) {
    if ( is_array( $to ) ) {
      $this->to = $to;
    } else {
      $this->to = array( $to );
    }
    return $this;
  }


  /**
   * Get recipients
   *
   * @return Array $to Get recipients.
   */
  public function get_to() {
    return $this->to;
  }


  /**
   * Set Cc recipients
   *
   * @var cc $cc.
   * @param  String|Array $cc Set Cc recipients.
   * @return Object $this
   */
  public function cc( $cc ) {
    if ( is_array( $cc ) ) {
      $this->cc = $cc;
    } else {
      $this->cc = array( $cc );
    }
    return $this;
  }


  /**
   * Get Cc recipients
   *
   * @return Array $cc Get Cc recipients.
   */
  public function get_cc() {
    return $this->cc;
  }


  /**
   * Set Email Bcc recipients
   *
   * @var bcc $bcc.
   * @param  String|Array $bcc Set Email Bcc recipients.
   * @return Object $this
   */
  public function bcc( $bcc ) {
    if ( is_array( $bcc ) ) {
      $this->bcc = $bcc;
    } else {
      $this->bcc = array( $bcc );
    }

    return $this;
  }


  /**
   * Set email Bcc recipients
   *
   * @return Array $bcc Set email Bcc recipients.
   */
  public function get_bcc() {
    return $this->bcc;
  }


  /**
   * Set email Subject
   *
   * @var subject $subject.
   * @param String $subject Set email Subject.
   * @return Object $this
   */
  public function subject( $subject ) {
    $this->subject = $subject;
    return $this;
  }


  /**
   * Returns email subject.
   *
   * @return Array
   */
  public function get_subject() {
    return $this->subject;
  }


  /**
   * Set From header
   *
   * @var from $from.
   * @param String $from Set From header.
   * @return Object $this
   */
  public function from( $from ) {
    $this->from = $from;
    return $this;
  }

  /**
   * Set the email's headers
   *
   * @var headers $headers.
   * @param String|Array $headers [description].
   * @return Object $this
   */
  public function headers( $headers ) {
    if ( is_array( $headers ) ) {
      $this->headers = $headers;
    } else {
      $this->headers = array( $headers );
    }

    return $this;
  }


  /**
   * Retruns headers
   *
   * @return Array
   */
  public function get_headers() {
    return $this->headers;
  }


  /**
   * Returns email content type
   *
   * @return String
   */
  public function html_filter() {
    return 'text/html';
  }


  /**
   * Set email content type
   *
   * @var send_as_html $send_as_html.
   * @param  Bool $html Set email content type.
   * @return Object $this
   */
  public function send_as_html( $html ) {
    $this->send_as_html = $html;
    return $this;
  }


  /**
   * Attach a file or array of files.
   * Filepaths must be absolute.
   *
   * @var attachments $attachments.
   * @param  String|Array $path Attach a file or array of files.Filepaths must be absolute.
   * @throws Exception Exception.
   * @return Object $this Returns object of attachmenst.
   */
  public function attach( $path ) {
    if ( is_array( $path ) ) {
      $this->attachments = array();
      foreach ( $path as $path_ ) {
        if ( ! file_exists( $path_ ) ) {
          throw new Exception( "Attachment not found at $path" );
        } else {
          $this->attachments[] = $path_;
        }
      }
    } else {
      if ( ! file_exists( $path ) ) {
        throw new Exception( "Attachment not found at $path" );
      }
      $this->attachments = array( $path );
    }

    return $this;
  }


  /**
   * Set the before-template file
   *
   * @var header_template|header_variables|template|variables $header_template.
   * @param  String $template  Path to HTML template.
   * @param  Array  $variables Sets template variables.
   * @throws Exception Exception.
   * @return Object $this
   */
  public function template_header( $template, $variables = null ) {
    if ( ! file_exists( $template ) ) {
      throw new Exception( 'Template file not found' );
    }

    if ( is_array( $variables ) ) {
      $this->header_variables = $variables;
    }

    $this->header_template = $template;
    return $this;
  }


  /**
   * Set the template file
   *
   * @param  String $template  Path to HTML template.
   * @param  Array  $variables Sets template variables.
   * @throws Exception Exception.
   * @return Object $this
   */
  public function template( $template, $variables = null ) {
    if ( ! file_exists( $template ) ) {
      throw new Exception( 'File not found' );
    }

    if ( is_array( $variables ) ) {
      $this->variables = $variables;
    }

    $this->template = $template;
    return $this;
  }


  /**
   * Set the after-template file
   *
   * @var after_template|footer_variables $header_template.
   * @param  String $template Path to HTML template.
   * @param  Array  $variables Sets template variables.
   * @throws Exception Exception.
   * @return Object $this
   */
  public function template_footer( $template, $variables = null ) {
    if ( ! file_exists( $template ) ) {
      throw new Exception( 'Template file not found' );
    }

    if ( is_array( $variables ) ) {
      $this->footer_variables = $variables;
    }

    $this->after_template = $template;
    return $this;
  }


  /**
   * Renders the template
   *
   * @return String
   */
  public function render() {
    return $this->render_part( 'before' ) .
      $this->render_part( 'main' ) .
      $this->render_part( 'after' );
  }


  /**
   * Render a specific part of the email
   *
   * @author Anthony Budd
   * @param  String $part before, after, main.
   * @throws Exception Exception.
   * @return String Render a specific part of the email.
   */
  public function render_part( $part = 'main' ) {
    switch ( $part ) {
      case 'before':
        $template_file = $this->header_template;
        $variables     = $this->header_variables;

            break;

      case 'after':
        $template_file = $this->after_template;
        $variables     = $this->footer_variables;
            break;

      case 'main':
      default:
        $template_file = $this->template;
        $variables     = $this->variables;
            break;
    }

    if ( $template_file === false ) {
      return '';
    }

    $extension = strtolower( pathinfo( $template_file, PATHINFO_EXTENSION ) );
    if ( $extension === 'php' ) {

      ob_start();
      ob_clean();

      foreach ( $variables as $key => $value ) {
        $$key = $value;
      }

      include $template_file;

      $html = ob_get_clean();

      return $html;

    } elseif ( $extension === 'html' ) {

      $template = wp_remote_get( $template_file );

      if ( ! is_array( $variables ) || empty( $variables ) ) {
        return $template;
      }

      return $this->parse_as_mustache( $template, $variables );

    } else {
      throw new Exception( "Unknown extension  {$extension} in path ' {$template_file}'" );
    }
  }
  /**
   * Builds Email Subjects
   *
   * @return String email headers.
   */
  public function build_subject() {
    return $this->parse_as_mustache(
      $this->subject,
      array_merge( $this->header_variables, $this->variables, $this->footer_variables )
    );
  }

  /**
   * Parse as mustache
   *
   * @param String       $string String to be parse as mustache.
   * @param String|Array $variables Additional variables.
   *
   * @return String $string String to be parse as mustache
   */
  public function parse_as_mustache( $string, $variables = array() ) {

    preg_match_all( '/\ {\ {\s*.+?\s*\}\}/', $string, $matches );

    foreach ( $matches[0] as $match ) {
      $var = str_replace( ' {', '', str_replace( '}', '', preg_replace( '/\s+/', '', $match ) ) );

      if ( isset( $variables[ $var ] ) && ! is_array( $variables[ $var ] ) ) {
        $string = str_replace( $match, $variables[ $var ], $string );
      }
    }

    return $string;
  }


  /**
   * Builds Email Headers
   *
   * @return String email headers.
   */
  public function build_headers() {
    $headers = '';

    $headers .= implode( "\r\n", $this->headers ) . "\r\n";

    foreach ( $this->bcc as $bcc ) {
      $headers .= sprintf( "Bcc: %s \r\n", $bcc );
    }

    foreach ( $this->cc as $cc ) {
      $headers .= sprintf( "Cc: %s \r\n", $cc );
    }

    if ( ! empty( $this->from ) ) {
      $headers .= sprintf( "From: %s \r\n", $this->from );
    }

    return $headers;
  }


  /**
   * Sends a rendered email using
   * WordPress's wp_mail() function
   *
   * @throws Exception Exception.
   * @return Bool Sends a rendered email using.
   */
  public function send() {
    if ( count( $this->to ) === 0 ) {
      throw new Exception( 'You must set at least 1 recipient' );
    }

    if ( empty( $this->template ) ) {
      throw new Exception( 'You must set a template' );
    }

    if ( $this->send_as_html ) {
      add_filter( 'wp_mail_content_type', array( $this, 'html_filter' ) );
    }
    echo wp_json_encode(
      array(
          'status' => 'success',
          'message' => 'Contact message sent.',
      )
    );
    return wp_mail( $this->to, $this->build_subject(), $this->render(), $this->build_headers(), $this->attachments );
  }
}
