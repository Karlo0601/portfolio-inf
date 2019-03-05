import {debounce} from './../helpers/debounce';

export class ScrollToElement {
  constructor(
    globalElement = '.js-scroll-to-anchor',
    topElement = '.js-scroll-to-top',
    menuElement = '.main-navigation__link ',
    body = 'body',
    header = '#header',
  ) {
    this.globalElement = globalElement;
    this.topElement = topElement;
    this.menuElement = menuElement;
    this.body = body;
    this.header = header;
    this.debounce = debounce;
  }

  scrolltoPageElement() {
    $(this.menuElement).click((event) => {
      const target = $(event.currentTarget).attr('href');

      if (target.match('^#')) {
        event.preventDefault();
        if (target.length) {
          $(this.body).removeClass('menu-open');
          this.scrollToSelector(target);
        }
      }

    });
  }
  scrolltoGlobalElement() {
    $(this.globalElement).click((event) => {
      event.preventDefault();

      const $anchor = $(event.target);
      const anchorID = $anchor.attr('href');

      this.scrollToSelector(anchorID);
    });
  }

  scrolltoTopElement() {
    const $topElement = $(this.topElement);

    window.addEventListener('scroll', () => {
      if ($(window).scrollTop() >= 500) {
        $topElement.addClass('active');
      } else {
        $topElement.removeClass('active');
      }
    });

    $(this.topElement).click((e) => {
      e.preventDefault();
      this.scrollToTop();
    });
  }

  scrollToSelector(selector) {
    const $selector = $(selector);
    const $headerHeight = $(this.header);

    if ($selector.length) {
      $('html, body').animate({
        scrollTop: $selector.offset().top - $headerHeight.outerHeight(),
      }, 900);
    }
  }

  scrollToTop() {
    $('html, body').animate({
      scrollTop: 0,
    }, 500);
  }
}
