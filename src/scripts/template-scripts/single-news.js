document.addEventListener('DOMContentLoaded', function() {
    const loadMoreButton = document.getElementById('load-more');
    let visibleImagesCount = 6;

    // Ініціалізація Masonry
    let $grid = jQuery('#gallery').imagesLoaded(function () {
        $grid.masonry({
            itemSelector: '.gallery-item',
            columnWidth: '.gallery-item',
            percentPosition: true
        });
        $grid.masonry('layout'); // Перерахування елементів після завантаження
    });

    loadMoreButton.addEventListener('click', function() {
        const hiddenImages = document.querySelectorAll('.gallery-item.visually-hidden');
        
        for (let i = 0; i < 6 && i < hiddenImages.length; i++) {
            hiddenImages[i].classList.remove('visually-hidden');
        }

        visibleImagesCount += 6;

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
