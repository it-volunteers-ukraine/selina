document.addEventListener('DOMContentLoaded', function() {
    const loadMoreButton = document.getElementById('load-more');
    const showMoreText = loadMoreButton.getAttribute('data-show-more');
    const showLessText = loadMoreButton.getAttribute('data-show-less');
    let visibleImagesCount = 6;
    const galleryItems = document.querySelectorAll('.gallery-item');
    const totalImages = galleryItems.length;



    // Ініціалізація Masonry
    let $grid = jQuery('#gallery').imagesLoaded(function () {
        $grid.masonry({
            itemSelector: '.gallery-item',
            columnWidth: '.gallery-item',
            percentPosition: true
        });
        $grid.masonry('layout'); // Перерахування елементів після завантаження
    });

    // Логіка для кнопки
    loadMoreButton.addEventListener('click', function () {
        const isExpanded = loadMoreButton.getAttribute('data-expanded') === 'true';

        if (isExpanded) {
            // Якщо стан "Показати менше", ховаємо всі додаткові зображення
            galleryItems.forEach((item, index) => {
                if (index >= 6) {
                    item.classList.add('visually-hidden');
                }
            });
            loadMoreButton.innerHTML = `<p class="gallary-section__last-btn-text">${showMoreText}</p><svg class="gallary-section__button-svg" width="16" height="15"><use href="${loadMoreButton.querySelector('svg use').getAttribute('href')}"></use></svg>`;
            loadMoreButton.setAttribute('data-expanded', 'false');
            visibleImagesCount = 6; // Повертаємося до початкового стану
        } else {
            // Якщо стан "Показати більше", показуємо наступні 6 зображень
            const hiddenImages = document.querySelectorAll('.gallery-item.visually-hidden');
            for (let i = 0; i < 6 && i < hiddenImages.length; i++) {
                hiddenImages[i].classList.remove('visually-hidden');
            }
            visibleImagesCount += 6;

            // Якщо всі зображення показані, змінюємо текст кнопки
            if (visibleImagesCount >= totalImages) {
                loadMoreButton.innerHTML = `<p class="gallary-section__last-btn-text">${showLessText}</p><svg class="gallary-section__button-svg" width="16" height="15"><use href="${loadMoreButton.querySelector('svg use').getAttribute('href')}"></use></svg>`;
                loadMoreButton.setAttribute('data-expanded', 'true');
            }
    } 

        // Оновлення розташування елементів у Masonry після відображення нових елементів
        $grid.imagesLoaded().progress(function () {
            $grid.masonry('layout');
        });
    });

    window.addEventListener('resize', function () {
        $grid.masonry('layout'); // Оновлення розміру елементів Masonry при зміні розміру вікна
    });

    // Виконуємо вирівнювання після початкового завантаження
    $grid.imagesLoaded().progress(function() {
        $grid.masonry('layout');
    });
});
