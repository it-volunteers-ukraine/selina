jQuery(document).ready(function ($) {
    let pageMapping = {};
    const containerFriends = $('#more-friends');
    const containerPhotographs = $('#more-photographs');
    const loadBtnFriends = $('#load-more-friends');
    const loadBtnPhotographs = $('#load-more-photographs');
    const loadBtnGallery = $('#load-more-gallery'); // Кнопка для галереї
    const galleryItems = $('.gallery-item'); // Елементи галереї
    let initialItems = 6; // Кількість елементів, що показуються спочатку
    var viewportWidth = window.innerWidth;


    // get nonce
    function getNonce() {
        return my_ajax.nonce;
    }

    function loadPosts(postType, targetContainer) {
        if (!pageMapping[postType]) {
            pageMapping[postType] = 2;
        }

        $.ajax({
            url: my_ajax.ajaxurl, /* Use the localised ajaxurl variable */
            nonce: getNonce(),
            type: 'POST',
            data: {
                action: 'load_more_posts',
                page: pageMapping[postType],
                width: viewportWidth,
                postType: postType,
            },
            success: function (response) {
                targetContainer.append(response.html)
                pageMapping[postType]++;
            },
            error: function (xhr, status, error) {
                console.error("Request failed: " + error);
            }
        });
    }

    // Функція для показу більше елементів галереї
    function loadMoreGallery() {
        let visibleItems = galleryItems.filter(":visible").length;
        galleryItems.slice(visibleItems, visibleItems + initialItems).fadeIn();

        if (galleryItems.filter(":hidden").length === 0) {
            loadBtnGallery.hide();
        }
    }

    loadBtnFriends.on('click', function () {
        var postType = $(this).data('post-type');
        const ninthElem = $('#more-friends .nine-elem');
        ninthElem.css('display', 'block');
        loadPosts(postType, containerFriends);
    });

    loadBtnPhotographs.on('click', function () {
        var postType = $(this).data('post-type');
        loadPosts(postType, containerPhotographs);
    });

    // Обробка кліків для галереї
    loadBtnGallery.on('click', function () {
        loadMoreGallery();
    });

    // Ініціалізація - сховати частину елементів галереї
    galleryItems.slice(initialItems).hide();

});
