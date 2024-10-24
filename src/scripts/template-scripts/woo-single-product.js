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
        nextEl: ".related-product-swiper-button-next",
        prevEl: ".related-product-swiper-button-prev",
      },
    pagination: {
      el: ".related-product-swiper-pagination",
      type: "fraction",
    },
});