document.addEventListener("DOMContentLoaded", function () {
    let loadMoreButton = document.getElementById('load-more');
    let galleryItems = document.querySelectorAll('.gallery-item');
    let itemsToShow = 6;
    let currentItems = itemsToShow;

    // Приховуємо всі елементи, окрім перших 6
    function hideGalleryItems() {
        galleryItems.forEach((item, index) => {
            if (index >= currentItems) {
                item.style.display = 'none';
            }
        });
    }

    // Показуємо наступні 6 елементів
    function showNextItems() {
        let itemsToReveal = currentItems + itemsToShow;
        for (let i = currentItems; i < itemsToReveal && i < galleryItems.length; i++) {
            galleryItems[i].style.display = 'block';
        }
        currentItems = itemsToReveal;

        // Якщо всі елементи показані, ховаємо кнопку
        if (currentItems >= galleryItems.length) {
            loadMoreButton.style.display = 'none';
        }
    }

    // Ініціалізація
    hideGalleryItems();

    // Обробка кліку по кнопці
    loadMoreButton.addEventListener('click', function () {
        showNextItems();
    });
});
