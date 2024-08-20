const swiper = new Swiper(".gallery-section__swiper", {
  loop: true,
  slidesPerView: 1,
  spaceBetween: 23,
  breakpoints: {
    768: {
      slidesPerView: 1.5,
      spaceBetween: 23,
    },
    1024: {
      slidesPerView: 2,
      spaceBetween: 24,
      centeredSlides: true,
    },
  },
  navigation: {
    nextEl: ".gallery-section__arrow-right-btn",
    prevEl: ".gallery-section__arrow-left-btn",
  },
});
