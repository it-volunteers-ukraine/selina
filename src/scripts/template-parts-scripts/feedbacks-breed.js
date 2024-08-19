const feedbacksBreedSwiper = new Swiper(".feedbacks-breed-section__swiper", {
  effect: "slide",
  loop: false,
  slidesPerView: 1,
  spaceBetween: 20,
  breakpoints: {
    768: {
      slidesPerView: 2,
    },
    1439: {
      slidesPerView: 3,
    },
  },
  direction: "horizontal",
  preloadImages: false,
  lazy: {
    loadOnTransitionStart: true,
    loadPrevNext: true,
  },
  lazyPreloadPrevNext: 1,
  navigation: {
    nextEl: ".feedbacks-breed-section__arrow-right-btn",
    prevEl: ".feedbacks-breed-section__arrow-left-btn",
  },
});
