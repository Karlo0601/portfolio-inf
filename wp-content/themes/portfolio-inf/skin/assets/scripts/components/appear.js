export default function waypointInit() {

  // counter function
  function countProgress() {
    const counts = $('.skills__single-item--counter');
    counts.each(() => {
      $(this).prop('Counter', 0).animate({
        Counter: $(this).data('count'),
      }, {
        duration: 2000,
        easing: 'linear',
        step(now) {
          $(this).text(`${Math.ceil(now)} %`);
        },
        complete() {
          $(this).text(`${this.Counter} %`).stop(true, true);
        },
      });
    });
  }

  // Appear Function
  function appearElement() {
    const winheight = $(window).height();
    const wintop = $(window).scrollTop();

    $('[data-appear-effect]').each(function() {

      const element = $(this);
      const topcoords = element.offset().top;
      const options = {
        effect: element.data('appear-effect'),
        delay: element.data('appear-delay'),
      };

      // animate when top of the window is 3/4 above the element
      if (wintop > (topcoords - (winheight * 0.75))) {
        element.addClass(options.effect);

        if (options.delay > 1) {
          element.css('animation-delay', `${options.delay} ms`);
        }

        setTimeout(() => {
          if (element.hasClass('animated')) {
            return true;
          }
          element.addClass('animated');
          if (element.hasClass('skills__container')) {
            countProgress();
          }
          return true;
        }, options.delay);
      }
    });
  }

  // Init on load and on scroll
  $(window).on('load scroll', () => {
    appearElement();
  });
}
