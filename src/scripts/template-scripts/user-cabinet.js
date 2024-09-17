jQuery(document).ready(function ($) {
    // Обробник події для кнопок
    $('.content-type-btn').on('click', function (e) {
        // Визначення цільового контенту з data-атрибуту кнопки
        const contentTab = $(this).data('target');
        console.log(contentTab);

        // Видалення класу 'active' з усіх кнопок
        $('.navigation-user-cabinet__show-content').removeClass('active');

        // Додавання класу 'active' до натиснутої кнопки
        $(this).addClass('active');

        // AJAX запит для завантаження контенту
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

    // Додатково: автоматичне натискання на першу кнопку при завантаженні сторінки
    const educationTab = $('.content-type-btn').first();
    const videoButton = $('.video-btn');
    educationTab.addClass('active'); // Додаємо клас для активації
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
