const newsSwiper = new Swiper(
  ".single-breeder-our-cats-section__swiper-inner",
  {
    effect: "slide",
    loop: true,
    slidesPerView: 1,
    spaceBetween: 24,
    centeredSlides: true,
    watchOverflow: true,

    breakpoints: {
      768: {
        centeredSlides: false,
        slidesPerView: 1.5,
        spaceBetween: 23,
      },
      1024: {
        slidesPerView: 2,
        spaceBetween: 24,
        centeredSlides: true,
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
      nextEl: ".single-breeder-our-cats-section__arrow-right-btn",
      prevEl: ".single-breeder-our-cats-section__arrow-left-btn",
    },
  }
);
const freeCatList = document?.querySelector(
  ".single-breeder-free-cats-section__wrapper"
);

const freeCatListBtn = document?.querySelector(
  ".single-breeder-free-cats-section__button"
);

const hideCatListBtn = document?.querySelector(
  ".single-breeder-free-cats-section__button-hide"
);

const freeCatListChildren = Array.from(freeCatList?.children ?? []);

const count = window.innerWidth >= 768 && window.innerWidth < 1440 ? 2 : 3;
let ca = 0;

function showFirstItems() {
  freeCatList.innerHTML = "";
  freeCatList.append(...freeCatListChildren.slice(0, count));
  freeCatListBtn.classList.remove("visually-hidden");
  ca = count;
}
if (freeCatListChildren.length > count) {
  showFirstItems();

  freeCatListBtn?.addEventListener("click", () => {
    freeCatList.append(...freeCatListChildren.slice(ca, ca + count));
    ca = ca + count;
    if (ca >= freeCatListChildren.length) {
      freeCatListBtn.classList.add("visually-hidden");
      hideCatListBtn?.classList.remove("visually-hidden");
    }
  });

  hideCatListBtn?.addEventListener("click", () => {
    showFirstItems();
    hideCatListBtn.classList.add("visually-hidden");
  });
}
