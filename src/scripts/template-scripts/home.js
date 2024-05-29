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
    // when window width is >= 480px
    768: {
      slidesPerView: 4,
      // spaceBetween: 40,
    },
    // when window width is >= 640px
    1440: {
      slidesPerView: 4,
      // spaceBetween: 80,
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
    nextEl: ".partners-section__arrow-right-btn",
    prevEl: ".partners-section__arrow-left-btn",
  },
});
