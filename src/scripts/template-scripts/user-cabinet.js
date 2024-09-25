jQuery(document).ready(function ($) {
    $('.content-type-btn').on('click', function (e) {
        const contentTab = $(this).data('target');
        console.log(contentTab);

        $('.navigation-user-cabinet__show-content').removeClass('active');

        $(this).addClass('active');

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

    const educationTab = $('.content-type-btn').first();
    const videoButton = $('.video-btn');
    educationTab.addClass('active');
    videoButton.addClass('active');
    const educationTarget = educationTab.data('target');
    $.ajax({
        url: ajax_object.ajax_url,
        type: 'POST',
        data: {
            action: 'load_user_cabinet_content',
            contentTab: educationTarget,
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

    $('.form-btn').on('click', function (e) {
        $('.navigation-user-cabinet__buttons').hide();
        $('.education-btn').removeClass('active');
    });

    $('.education-btn').on('click', function (e) {
        $('.navigation-user-cabinet__buttons').show();
        $('.video-btn').addClass('active');
        $('.form-btn').removeClass('active');
    });
});
