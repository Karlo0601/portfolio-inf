/**
 * Mobile Menu
 * @return void
 */
export function mobileMenu() {
  const button = document.getElementById('js-resp-menu-toggle');
  const body = document.getElementsByTagName('BODY')[0];

  button.addEventListener('click', () => {

    // For IE9
    const bodyClasses = body.className.split(' ');
    const i = bodyClasses.indexOf('menu-open');
    const btnClasses = button.className.split(' ');
    const x = btnClasses.indexOf('menu-toggle--active');

    if (i >= 0) {
      bodyClasses.splice(i, 1);
    } else {
      bodyClasses.push('menu-open');
    }

    if (x >= 0) {
      btnClasses.splice(x, 1);
    } else {
      btnClasses.push('menu-toggle--active');
    }

    body.className = bodyClasses.join(' ');
    button.className = btnClasses.join(' ');
  });
}
