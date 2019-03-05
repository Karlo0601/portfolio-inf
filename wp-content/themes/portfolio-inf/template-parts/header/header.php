<?php
/**
 * Main header bar
 *
 * @package Portfolio_Inf\Template_Parts\Header
 */

use Portfolio_Inf\Admin\Menu\Menu;
use Portfolio_Inf\Theme\Socials;

$main_menu        = new Menu();
$blog_name        = get_bloginfo( 'name' );
$blog_description = get_bloginfo( 'description' );
$header_logo_info = $blog_name . ' - ' . $blog_description;
$socials          = Socials::theme_social_links( '' );
$logo_img         = get_field( 'site_logo', 'options' );

?>

<!-- start:header -->
<header id="header" class="header header--site">

  <div class="wrapper">
    <div class="container">

      <figure class="logo">
        <a href="<?php echo esc_url( site_url() ); ?>" class="logo__link" title="<?php echo esc_attr( $blog_name ); ?>">
          <?php if ( ! empty( $logo_img ) ) { ?>
            <img src="<?php echo esc_url( $logo_img['url'] ); ?>" class="header__logo-image" title="<?php echo esc_attr( $header_logo_info ); ?>" width="" height="" alt="<?php echo esc_attr( $header_logo_info ); ?>" />
            <?php
          } else {
            echo esc_html( $blog_name );
          }
          ?>
        </a>
      </figure>

      <!-- start:responsive buttons -->
      <div class="resp-buttons right">
        <div id="js-resp-menu-toggle" class="hamburger-menu">
          <div class="hamburger-menu__bar"></div>
        </div>
      </div>
      <!-- start:responsive buttons -->

      <!-- start:main nav -->
      <div class="main-nav__container">
        <?php
        echo esc_html( $main_menu->bem_menu( 'header_main_nav', 'main-navigation' ) );
        ?>
        <div class="header__socials">
          <?php
          echo $socials;
          ?>
        </div>
      </div>

      <!-- end:main nav -->

    </div>
  </div>
</header>
<!-- end:header -->
