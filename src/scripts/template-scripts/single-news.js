document.addEventListener('DOMContentLoaded', function() {
    const loadMoreButton = document.getElementById('load-more');
    const showMoreText = loadMoreButton.getAttribute('data-show-more');
    const showLessText = loadMoreButton.getAttribute('data-show-less');
    let initialVisibleImagesCount;
    let visibleImagesCount;
    const galleryItems = document.querySelectorAll('.gallery-item');
    const totalImages = galleryItems.length;


    function updateVisibleImagesCount() {
        if (window.matchMedia('(min-width: 768px) and (max-width: 1024px)').matches) {
            initialVisibleImagesCount = 4; // tablet
        } else {
            initialVisibleImagesCount = 3; // mobil and desktop
        }
        visibleImagesCount = initialVisibleImagesCount;

        galleryItems.forEach((item, index) => {
            if (index < visibleImagesCount) {
                item.classList.remove('visually-hidden');
            } else {
                item.classList.add('visually-hidden');
            }
        });
    }

    updateVisibleImagesCount();

    let $grid = jQuery('#gallery').imagesLoaded(function () {
        $grid.masonry({
            itemSelector: '.gallery-item',
            columnWidth: '.gallery-item',
            percentPosition: true
        });
        $grid.masonry('layout');
    });

    // Logic for the button
    loadMoreButton.addEventListener('click', function () {
        const isExpanded = loadMoreButton.getAttribute('data-expanded') === 'true';

        if (isExpanded) {
            galleryItems.forEach((item, index) => {
                if (index >= initialVisibleImagesCount) {
                    item.classList.add('visually-hidden');
                }
            });
            loadMoreButton.innerHTML = `<p class="gallary-section__last-btn-text">${showMoreText}</p><svg class="gallary-section__button-svg" width="16" height="15"><use href="${loadMoreButton.querySelector('svg use').getAttribute('href')}"></use></svg>`;
            loadMoreButton.setAttribute('data-expanded', 'false');
            visibleImagesCount = initialVisibleImagesCount;
        } else {
            const hiddenImages = document.querySelectorAll('.gallery-item.visually-hidden');
            for (let i = 0; i < 3 && i < hiddenImages.length; i++) {
                hiddenImages[i].classList.remove('visually-hidden');
            }
            visibleImagesCount += 3;
           
            if (visibleImagesCount >= totalImages) {
                loadMoreButton.innerHTML = `<p class="gallary-section__last-btn-text">${showLessText}</p><svg class="gallary-section__button-svg" width="16" height="15"><use href="${loadMoreButton.querySelector('svg use').getAttribute('href')}"></use></svg>`;
                loadMoreButton.setAttribute('data-expanded', 'true');
            }
    } 

        $grid.imagesLoaded().progress(function () {
            $grid.masonry('layout');
        });
    });

    window.addEventListener('resize', function () {
        $grid.masonry('layout');
    });

    $grid.imagesLoaded().progress(function() {
        $grid.masonry('layout');
    });
});
