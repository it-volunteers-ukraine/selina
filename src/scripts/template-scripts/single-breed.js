document.addEventListener("DOMContentLoaded", function () {
  function handleButtonClick(buttonSelector, listSelector) {
    const button = document.querySelector(buttonSelector);
    const list = document.querySelector(listSelector);

    button.addEventListener("click", function () {
      const svgUse = this.querySelector("use");
      const href = svgUse.getAttribute("href");

      if (href.includes("icon-add")) {
        svgUse.setAttribute("href", href.replace("icon-add", "icon-remove"));
        list.classList.add("open");
      } else {
        svgUse.setAttribute("href", href.replace("icon-remove", "icon-add"));
        list.classList.remove("open");
      }
    });
  }

  handleButtonClick(
    ".single-breed-wfc-button",
    ".single-breed-wfc-section__list"
  );

  handleButtonClick(
    ".single-breed-conditions-button",
    ".single-breed-conditions-section__list"
  );
});

const breedsSwiper = new Swiper(".single-breed-breeders-section__swiper", {
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
