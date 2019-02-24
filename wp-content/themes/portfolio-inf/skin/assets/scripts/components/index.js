import {ScrollToElement} from './scroll-to';
import {Lazyloading} from './lazyloading';
import { Waypoint } from './appear';

$(function() {
  const scrollTo = new ScrollToElement();
  const lazyLoading = new Lazyloading();
  const waypoint = new Waypoint();

  // -------------------------------------------------------------
  // scrollTo
  scrollTo.scrolltoGlobalElement();
  scrollTo.scrolltoTopElement();

  // -------------------------------------------------------------
  // AppearAnimations
  waypoint.WaypointInit();

  // -------------------------------------------------------------
  // lazyLoading
  lazyLoading.init();

});
