jQuery(document).ready(function ($) {
  $('#load-more').on('click', function () {
    let data = {
      action: 'load_more_images',
      nonce: galleryAjax.nonce,
      page: Math.ceil($('.gallery a').length / 6) + 1
    };
       
    $.post(galleryAjax.ajaxUrl, data, function (response) {
      if (response.success) {
        $('.gallery').append(response.data);
      } else {
        console.log('AJAX response failed:', response.data);
      }
    }).fail(function (jqXHR, textStatus, errorThrown) {
        console.log('AJAX request failed:', textStatus, errorThrown);

    });
  });
  console.log('Script loaded completely');
});
