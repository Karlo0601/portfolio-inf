<?php
/**
 * Display footer content
 *
 * @package Portfolio_Inf\Template_Parts\Footer
 */

?>
<!-- start:footer -->
<!-- <a href="#html, body" class="scroll-to-top js-scroll-to-top"><svg class="svg-arrow--up-dims"><use xlink:href="<?php // echo esc_url( get_template_directory_uri() ); ?>/skins/assets/images/icons.svg#arrow--up"></use></svg></a> -->
<footer id="footer" class="footer footer--site">
  <div class="wrapper">
    <div class="container clearfix">
      <?php
        $site_logo = get_field( 'footer_logo', 'options' );
        $copyright = get_field( 'copyright', 'options' );
      ?>
      <div class="footer__logo-container col-13">
        <img src="<?php echo esc_url( $site_logo['url'] ); ?>" alt="" class="footer__logo">
      </div>

      <div class="copyright col-23 col-last">
        <?php
        echo $copyright;
        ?>
      </div>

    </div>
  </div>
</footer>
<!-- end:footer -->
