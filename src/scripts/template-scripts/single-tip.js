let showWholeTipTextButton = document.getElementById('showWholeTipTextButton');
let textContent = document.querySelector('.single-tip__text-content');

if (showWholeTipTextButton && textContent) {
    showWholeTipTextButton.addEventListener('click', function() {
        textContent.style.webkitLineClamp = 'unset';
        this.blur(); 
    });
}

// Slider
let swiperElement = document.querySelector(".mySwiper");
if (swiperElement) {
    let swiper = new Swiper(swiperElement, {
        loop: true,
        slidesPerView: 'auto',
        spaceBetween: 17,
    });
}

// hide active(opened) tip from sidebar & slider
let openedTipHeadingElement = document.getElementById('openedTipHeading');
if (openedTipHeadingElement) {
    let openedTipHeading = openedTipHeadingElement.textContent.trim();

    let tipsList = document.querySelectorAll('.single-tip__sidebar-card');
    let slidesList = document.querySelectorAll('.single-tip__card');

    tipsList.forEach(function(tip) {
        if (tip.textContent.trim() === openedTipHeading) {
            tip.style.display = 'none';
        }
    });

    slidesList.forEach(function(slide) {
        if (slide.textContent.trim() === openedTipHeading) {
            slide.style.display = 'none';
        }
    });
}
