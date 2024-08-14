const newsSwiper = new Swiper(".single-breed-breeders-section__swiper", {
  effect: "slide",
  loop: true,
  slidesPerView: 1,
  spaceBetween: 24,
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
    nextEl: ".single-breed-breeders-section__arrow-right-btn",
    prevEl: ".single-breed-breeders-section__arrow-left-btn",
  },
  on: {
    init: (e) => {
      e.slides.forEach((el) => {
        const wrapper = el.querySelector(
          ".single-breed-breeders-section__content-wrapper"
        );
        const titleHeight = wrapper
          .querySelector(".single-breed-breeders-section__name")
          .getBoundingClientRect().height;
        const buttonHeight = wrapper
          .querySelector(".single-breed-breeders-section__button")
          .getBoundingClientRect().height;
        const gaps = 12 * 2;
        const textLineHeight = 21;
        const text = wrapper.querySelector(
          ".single-breed-breeders-section__text"
        );
        const textMaxHeight =
          wrapper.getBoundingClientRect().height -
          gaps -
          titleHeight -
          buttonHeight;

        const maxLines = Math.floor(textMaxHeight / textLineHeight);
        text.style["-webkit-line-clamp"] = maxLines;
      });
    },
  },
});
