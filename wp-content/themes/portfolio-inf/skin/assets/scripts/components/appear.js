export class Waypoint {
  constructor(
    globalElements = '.invisible',
  ) {
    this.globalElement = globalElements;
  }

  WaypointInit() {

    //Init on load and on scroll
    $(window).on('load scroll', function () {
      appearElement();
    });

    //counter function
    function countProgress() {
      var counts = $('.skills__single-item--counter');
      counts.each(function () {
        $(this).prop('Counter', 0).animate({
          Counter: $(this).data('count')
        }, {
            duration: 2000,
            easing: 'linear',
            step: function (now) {
              $(this).text(Math.ceil(now) + '%');
            }, complete: function () {
              $(this).text(this.Counter + '%').stop(true, true);
            }
          });
      });
    }

    //Appear Function
    function appearElement(){
      var winheight = $(window).height(),
        wintop = $(window).scrollTop();

      $('[data-appear-effect]').each(function () {

        var element = $(this),
          topcoords = element.offset().top,
          options = {
            effect: element.data('appear-effect'),
            delay: element.data('appear-delay')
          };
        if (wintop > (topcoords - (winheight * .75))) {// animate when top of the window is 3/4 above the element
          element.addClass(options.effect);

          if (options.delay > 1) {
            element.css('animation-delay', options.delay + 'ms');
          }

          setTimeout(function () {
            if (element.hasClass('animated')) {
              return true;
            } else {
              element.addClass('animated');
              if (element.hasClass('skills__container')) {
                countProgress();
              }
            }
          }, options.delay);
        }
      });
    }
  }
}
