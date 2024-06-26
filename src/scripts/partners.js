let initMobile = false;
let initTablet = false;

let partnersSwiper = null;


function swiperMode() {

    const mobile = window.matchMedia('(min-width: 0) and (max-width: 575px)');
    const tablet = window.matchMedia('(min-width: 576px) and (max-width: 991px)');
    const desktop = window.matchMedia('(min-width: 992px) and (max-width:1440px)');
    const full = window.matchMedia('(min-width: 1441px) and (max-width:1920px)');

    if (tablet.matches) {
        if (!initTablet) {

            initTablet = true;
            initMobile = false;


            partnersSwiper = new Swiper(".partners_slider", {
                effect: "slide",
                loop: true,
                slidesPerView: 4,
                grid: {
                    rows: 3,
                    fill: "row",
                },
                preloadImages: false,
                lazy: {
                    loadOnTransitionStart: true,
                    loadPrevNext: true,
                },
                lazyPreloadPrevNext: 1,
                navigation: {
                    nextEl: ".partners_slider__arrow-left-btn",
                    prevEl: ".partners_slider__arrow-right-btn",
                },
            });


        }
    } else if (desktop.matches || full.matches) {

        if (partnersSwiper) {
            partnersSwiper.destroy();
        }

        initTablet = false;
        initMobile = false;
    }

}

window.addEventListener('DOMContentLoaded', function () {
    swiperMode();
});
window.addEventListener('resize', function () {
    swiperMode();
});


function flipCardMobile(event) {
    const isMobile = window.innerWidth < 991.98;
    const activeCard = event.querySelector('.flip-card-inner');

    // close other
    const otherFlipped = document.querySelectorAll('.flip-card-inner');
    for (const flipped of otherFlipped) {
        if (flipped !== activeCard) {
            flipped.classList.remove('flipped');
        }
    }

    // open my
    if (isMobile) {
        activeCard.classList.toggle('flipped');
    }
}




