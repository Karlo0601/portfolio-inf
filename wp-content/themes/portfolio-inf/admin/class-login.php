<?php
/**
 * The login page specific functionality.
 *
 * @since   1.0.0
 * @package Portfolio_Inf\Admin
 */

namespace Portfolio_Inf\Admin;

/**
 * Class Login
 */
class Login {

  /**
   * Change default logo link with home url
   *
   * @since 1.0.0
   */
  public function custom_login_url() {
    return home_url( '/' );
  }

}
