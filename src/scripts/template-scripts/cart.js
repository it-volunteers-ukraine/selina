// Add ability to change quantity of product with custom buttons - and + 
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
        nextEl: '.cross-sell__arrow-right-btn',
        prevEl: '.cross-sell__arrow-left-btn',
    },
    pagination: {
        el: ".cross-sell__pagination",
        type: "fraction",
      },   
});

// Cross-sell Grid
document.addEventListener('DOMContentLoaded', function() {
    const gridItems = document.querySelectorAll('.crossSellGrid .grid-item');
    const showMoreButton = document.querySelector('.crossSellGrid .show-more');
    
    function showInitialItems() {
        let visibleItems = 0;
        
        let screenWidth = window.innerWidth;
        if (screenWidth < 1439 && screenWidth > 375) {
            visibleItems = crossSellVisibleItems.tablet;
        } else {
            visibleItems = crossSellVisibleItems.desktop;
        }

        for (let i = 0; i < visibleItems && i < gridItems.length; i++) {
            gridItems[i].style.display = 'block';
        }
        
        if (visibleItems >= gridItems.length) {
            showMoreButton.style.display = 'none';
        }
    }

    function showMore() {
        let screenWidth = window.innerWidth;
        let showMoreCount = screenWidth < 1439 && screenWidth > 375 ? showMoreItems.tablet : showMoreItems.desktop;
        
        let newVisible = 0;
        for (let i = 0; i < gridItems.length; i++) {
            if (gridItems[i].style.display === 'none') {
                gridItems[i].style.display = 'block';
                newVisible++;
                if (newVisible >= showMoreCount) {
                    break;
                }
            }
        }
        
        // Hide button "Show more", if there are no more posts
        let hiddenItems = Array.from(gridItems).filter(item => item.style.display === 'none');
        if (hiddenItems.length === 0) {
            showMoreButton.style.display = 'none';
        }
    }

    showInitialItems();

    showMoreButton.addEventListener('click', function() {
        showMore();
    });
});

let crossSellCounter = 0;
let crossSellVisibleItems = {
    tablet: 4,
    desktop: 3
};
let showMoreItems = {
    tablet: 2,
    desktop: 3
};
