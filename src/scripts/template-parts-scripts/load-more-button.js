jQuery(document).ready(function ($) {
    let page = 2; // Початкова сторінка для завантаження
    let nonce = my_ajax.nonce; // Отримати nonce з локалізованого скрипта
    let contentType = $('#load-more').data('type'); // Отримуємо тип контенту з data-атрибута кнопки
    let postId = $('#load-more').data('post-id'); // Отримуємо ID поста з data-атрибута кнопки

    function loadMoreContent() {
        $.ajax({
            url: my_ajax.ajaxurl, // Локалізована змінна для AJAX URL
            type: 'POST',
            data: {
                action: 'load_more_content', // Загальна дія для завантаження контенту
                page: page, // Номер сторінки
                type: contentType, // Тип контенту
                post_id: postId, // ID поста
                nonce: nonce // nonce для перевірки безпеки
            },
            success: function (response) {
                if (response.success) {
                    // Додаємо новий контент
                    $('#content-container').append(response.data.html);

                    // Оновлюємо номер сторінки
                    page++;

                    // Приховуємо кнопку, якщо більше немає контенту для завантаження
                    if (response.data.no_more_content) {
                        $('#load-more').hide();
                    }
                } else {
                    console.error("Error: " + response.data.message);
                }
            },
            error: function (xhr, status, error) {
                console.error("Request failed: " + error);
            }
        });
    }

    $('#load-more').on('click', function () {
        loadMoreContent();
    });
});
