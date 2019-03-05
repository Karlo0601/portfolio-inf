/**
 * Contact form ajax send email
 * @return void
 */
export function contactAjax() {
  const button = document.getElementById('contact-form__submit-button');
  const formId = document.getElementById('contact-form');
  if ($(button).length) {
    button.addEventListener('click', () => {
      const formData = $(formId).serializeArray();

      // Here we add our nonce
      formData.push({
        name: 'security',
        value: themeLocalization.ajax_nonce,
      });

      $.ajax({
        url: themeLocalization.ajaxurl, // Here goes our WordPress AJAX endpoint.
        type: 'POST',
        data: formData,
        dataType: 'json',
        beforeSend() {

          // You could do an animation here...
          $(button).prop('disabled', true);
        },
        success(response) {

          // You can craft something here to handle the message return
          if (response.status === 'success') {

            // Here, you could trigger a success message
            $(formId).reset();
            $(button).prop('disabled', false);
            setTimeout(window.location = response.redirectPath, 2000);
          }
          if (response.status === 'error') {
            $(button).prop('disabled', false);
            const field = document.getElementById(response.field);
            $(field).addClass('invalid');
          }
        },
        fail(err) {

          // You can craft something here to handle an error if something goes wrong when doing the AJAX request.
          window.console(`There was an error:${err}!`);

        },
      });
      return false;
    });
  }
}
