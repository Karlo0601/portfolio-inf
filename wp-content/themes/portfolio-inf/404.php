<?php
/**
 * 404 error page
 *
 * @package Portfolio_Inf
 */

get_header();

?>

<div class="section-404">
    <div class="section-404__container clearfix">
      <h2 class="section-404__title"><?php esc_html_e( '404', 'portfolio-inf' ); ?></h2>
      <h3 class="section-404__subtitle"><?php esc_html_e( 'Page not found', 'portfolio-inf' ); ?></h3>
      <p class="section-404__description">Sorry, but the page you were trying to view does not exist.</p>
      <a href="<?php echo esc_url( site_url() ); ?>" class="btn btn--brand">Go to Homepage</a>
    </div>
  </div>
</div>

<?php
get_footer();
