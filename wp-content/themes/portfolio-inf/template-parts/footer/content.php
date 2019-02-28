<?php
/**
 * Display footer content
 *
 * @package Portfolio_Inf\Template_Parts\Footer
 */

?>
<!-- start:footer -->
<a href="#html, body" class="scroll-to-top js-scroll-to-top"><span class="scroll-to-top__arrow-up"></span></a>
<footer id="footer" class="footer footer--site">
    <div class="footer__container clearfix">
      <?php
        $site_logo = get_field( 'footer_logo', 'options' );
        $copyright = get_field( 'copyright', 'options' );
      ?>
      <div class="footer__logo">
        <img src="<?php echo esc_url( $site_logo['url'] ); ?>" alt="" class="footer__logo-image">
      </div>

      <div class="footer__copyright">
        <?php
        echo '<p>' . esc_html( wp_strip_all_tags( $copyright ) ) . '</p>';
        ?>
      </div>

    </div>
</footer>
<!-- end:footer -->
