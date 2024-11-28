jQuery(document).ready(function($){
    $('.quantity button').on('click', function() {
        let btn = $(this);
        let inputQty = btn.parent().find('.qty');
        let prevValue = +(inputQty.val());
        let newValue = 1;
        if (btn.hasClass('btn-plus')) {
            newValue = prevValue + 1;
        } else {
            if (prevValue > 1) {
                newValue = prevValue - 1;
            }
        }
        inputQty.val(newValue);
    });
});

// Swiper single-product
let swiper = new Swiper('.single-product-slider', {
    loop: true,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
});

// Zoom
document.addEventListener('DOMContentLoaded', function() {
    Fancybox.bind('.swiper-slide a.zoom', {
        Toolbar: {
            display: ['zoom', 'close'],
        }
    });
});

// Relative products Swiper
let relativeProductSwiper = new Swiper(".related-product-swiper", {
    loop: true,
    navigation: {
        nextEl: ".related-product-swiper__button-next",
        prevEl: ".related-product-swiper__button-prev",
      },
    pagination: {
      el: ".related-product-swiper__pagination",
      type: "fraction",
    },
});

// Relative products show-more button
let relatedProductsContainer = document.querySelector('.columns-4');
let relatedProductItems = Array.from(relatedProductsContainer.children);
let numberOfRelatedProducts = relatedProductsContainer.childElementCount;
let showMoreProductsButton = document.getElementById('showMoreProductsButton');
let showLessProductsButton = document.getElementById('showLessProductsButton');

function setupProductDisplay(initialCount, increment) {
    showMoreProductsButton.style.display = 'flex';
    let shownProductsCount = initialCount;

    relatedProductItems.forEach((child, index) => {
        child.style.display = index < initialCount ? 'block' : 'none';
    });

    showMoreProductsButton.addEventListener('click', () => {
        let maxProductsToShow = 6;
    
        let newProductsCount = Math.min(shownProductsCount + increment, numberOfRelatedProducts);
        
        relatedProductItems.forEach((child, index) => {
            if (index < newProductsCount) {
                child.style.display = 'block';
            }
        });
        
        shownProductsCount = newProductsCount;
    
        if (shownProductsCount >= maxProductsToShow || shownProductsCount >= numberOfRelatedProducts) {
            showMoreProductsButton.style.display = 'none';
            showLessProductsButton.style.display = 'flex';
        }
        
        showMoreProductsButton.blur();
    });

    showLessProductsButton.addEventListener('click', () => {
        shownProductsCount = initialCount;
        relatedProductItems.forEach((child, index) => {
            child.style.display = index < initialCount ? 'block' : 'none';
        });
        showMoreProductsButton.style.display = 'flex';
        showLessProductsButton.style.display = 'none';
    });
}

if (window.innerWidth < 1439 && numberOfRelatedProducts > 4) {
    setupProductDisplay(4, 2);
} else if (window.innerWidth >= 1439 && numberOfRelatedProducts > 3) {
    setupProductDisplay(3, 3);
}

document.getElementById('shareButton').addEventListener('click', async () => {
    if (navigator.share) {
        try {
            await navigator.share({
                title: 'Product',
                text: 'selina product',
                url: window.location.href
            });
            console.log('ok');
        } catch (error) {
            console.error('Error:', error);
        }
    } else {
        alert('Web Share API не підтримується на вашому пристрої.');
    }
});