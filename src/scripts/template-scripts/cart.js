// // Add ability to change quantity of product with custom buttons - and + 
jQuery(document).ready(function($){
    $('main.main').on('click', '.quantity button', function() {
        let btn = $(this);
        let inputQty = btn.parent().find('.qty');
        let prevValue = +(inputQty.val());
        let newValue = prevValue;

        if (btn.hasClass('btn-plus')) {
            newValue = prevValue + 1;
        } else if (btn.hasClass('btn-minus')) {
            if (prevValue > 1) {
                newValue = prevValue - 1;
            }
        }

        inputQty.val(newValue).change(); 
        $('.update-cart').prop('disabled', false);
    });
});

// Update cart by click on buttons + and -
let timeout;

jQuery ( function( $ ) {
    $( '.woocommerce' ).on( 'change', '.qty', function() { 
        if ( timeout !== undefined ) {
            clearTimeout( timeout );
        }

        timeout = setTimeout( function() {
            $( "[name='update_cart']" ).trigger( "click" );
        }, 500 );
    });
});

// Cross-sell Swiper
const swiper = new Swiper('.crossSellSwiper', {
    slidesPerView: 1,
    spaceBetween: 10,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },   
});


