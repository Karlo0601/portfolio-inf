/**
 * Contact form ajax send email
 * @return void
 */
export function contactAjax() {
  var button = document.getElementById('contact-form__submit-button'),
      formId = document.getElementById('contact-form');
  if ($(button).length){
    button.addEventListener('click', () => {
      var form_data = $(formId).serializeArray();

      // Here we add our nonce
      form_data.push({ "name": "security", "value": themeLocalization.ajax_nonce });

      $.ajax({
        url: themeLocalization.ajaxurl, // Here goes our WordPress AJAX endpoint.
        type: 'POST',
        data: form_data,
        dataType: 'json',
        beforeSend: function () {
          // You could do an animation here...
          $(button).prop('disabled', true);
        },
        success: function (response) {
          // You can craft something here to handle the message return
          if (response.status === 'success') {
            // Here, you could trigger a success message
            $(formId).reset();
            $(button).prop('disabled', false);
            setTimeout(window.location = response.redirectPath, 2000);
          }
          if (response.status === 'error') {
            $(button).prop('disabled', false);
            $('#' + response.field + '').addClass('invalid');
          }
        },
        fail: function (err) {
          // You can craft something here to handle an error if something goes wrong when doing the AJAX request.
          alert("There was an error: " + err);

        }
      });
      return false;
    });
  }


};