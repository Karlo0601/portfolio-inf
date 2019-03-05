import {ScrollToElement} from './scroll-to';
import {Lazyloading} from './lazyloading';
import waypointInit from './appear';
import {mobileMenu} from './mobile-menu';
import {contactAjax} from './ajax-form';

$(function() {
  const scrollTo = new ScrollToElement();
  const lazyLoading = new Lazyloading();

  // -------------------------------------------------------------
  // scrollTo
  scrollTo.scrolltoGlobalElement();
  scrollTo.scrolltoTopElement();
  scrollTo.scrolltoPageElement();

  // -------------------------------------------------------------
  // AppearAnimations
  waypointInit();

  // -------------------------------------------------------------
  // Mobile Menu
  mobileMenu();

  // -------------------------------------------------------------
  // Contact ajax form submit
  contactAjax();

  // -------------------------------------------------------------
  // lazyLoading
  lazyLoading.init();

});
