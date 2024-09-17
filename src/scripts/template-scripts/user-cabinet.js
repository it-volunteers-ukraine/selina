jQuery(document).ready(function ($) {
    $('.content-type-btn').on('click', function (e) {
        const contentTab = $(this).data('target');

        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'load_user_cabinet_content',
                contentTab: contentTab,
                nonce: ajax_object.nonce
            },
            success: function (response) {
                if (response.success) {
                    $('#content-display').html(response.data);
                } else {
                    $('#content-display').html('<p>Error loading content.</p>');
                }
            },
            error: function () {
                $('#content-display').html('<p>There was an error processing the request.</p>');
            }
        });
    });
});