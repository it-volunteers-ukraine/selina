jQuery(document).ready(function ($) {
    let pageMapping = {};
    const containerFriends = $('#more-friends');
    const containerPhotographs = $('#more-photographs');
    const loadBtnFriends = $('#load-more-friends');
    const loadBtnPhotographs = $('#load-more-photographs');
    const loadBtnGallery = $('#load-more'); // Кнопка для галереї
    const gallery = $('.gallery'); // Контейнер галереї
    let initialItems = 6; // Кількість елементів, що показуються спочатку
    var viewportWidth = window.innerWidth;

    // Ініціалізація Masonry
    const msnry = new Masonry(gallery[0], {
        itemSelector: '.gallery-item',
        columnWidth: '.gallery-item',
        percentPosition: true
    });

    
    // Обробка події для перерахунку Masonry після завантаження нових зображень
    function updateMasonry() {
        imagesLoaded(gallery[0], function() {
            msnry.layout();
        });
    }

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
                updateMasonry(); // Оновити Masonry після завантаження нових зображень
            },
            error: function (xhr, status, error) {
                console.error("Request failed: " + error);
            }
        });
    }

    // Функція для показу більше елементів галереї
    function loadMoreGallery() {        
        let visibleItems = $('.gallery-item:visible').length;
        $('.gallery-item').slice(visibleItems, visibleItems + initialItems).fadeIn();

        if ($('.gallery-item:hidden').length === 0) {
            loadBtnGallery.hide();
        }

        // Оновлення Masonry після завантаження нових елементів
        setTimeout(function() {
            updateMasonry();
        }, 50); // Достатній час для відображення нових елементів
        
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
    $('.gallery-item').slice(initialItems).hide();

    // Оновлення Masonry при зміні розміру вікна
    $(window).on('resize', function () {        
        msnry.layout();
    });

});
