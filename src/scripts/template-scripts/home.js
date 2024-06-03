console.log("home");
const firstSectionSwiper = new Swiper(".first__container", {
  effect: "slide",
  loop: true,
  slidesPerView: 1,
  spaceBetween: 50,
  direction: "horizontal",
  preloadImages: false,
  lazy: {
    loadOnTransitionStart: true,
    loadPrevNext: true,
  },
  lazyPreloadPrevNext: 1,
  pagination: {
    enabled: true,
    clickable: true,
    el: ".pgnt",
    bulletClass: "paw-pagination-bullet",
    bulletActiveClass: "paw-pagination-bullet-active",
    renderBullet: function (index, className) {
      return `
      <svg class="first-section__paw-svg-${
        index + 1
      } paw-pagination-bullet" width="11.53" height="14.44">
      <use href="${theme_directory}/assets/images/sprite.svg#icon-paw${
        index + 2
      }"></use>
      </svg>
      `;
    },
  },
});

const partnersSwiper = new Swiper(".partners-section__swiper", {
  effect: "slide",
  loop: true,
  slidesPerView: 2,
  spaceBetween: 7,
  breakpoints: {
    768: {
      slidesPerView: 4,
      spaceBetween: 40,
    },

    1440: {
      slidesPerView: 5,
      spaceBetween: 80,
    },
  },
  direction: "horizontal",
  preloadImages: false,
  lazy: {
    loadOnTransitionStart: true,
    loadPrevNext: true,
  },
  navigation: {
    nextEl: ".partners-section__arrow-right-btn",
    prevEl: ".partners-section__arrow-left-btn",
  },
});

const newsSwiper = new Swiper(".news-section__swiper", {
  effect: "slide",
  loop: true,
  slidesPerView: 1,
  spaceBetween: 24,
  breakpoints: {
    768: {
      slidesPerView: 2,
    },
    1440: {
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
    nextEl: ".news-section__arrow-right-btn",
    prevEl: ".news-section__arrow-left-btn",
  },
});

const feedbacksSwiper = new Swiper(".feedbacks-section__swiper", {
  effect: "slide",
  loop: true,
  slidesPerView: 1,
  spaceBetween: 20,
  breakpoints: {
    768: {
      slidesPerView: 2,
    },
    1440: {
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
    nextEl: ".feedbacks-section__arrow-right-btn",
    prevEl: ".feedbacks-section__arrow-left-btn",
  },
});
