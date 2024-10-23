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
var swiper = new Swiper('.single-product-slider', {
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