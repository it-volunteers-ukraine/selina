jQuery(document).on("ready", function () {
  const swiper1List = Array.from(
    document.querySelector(".single-breeder-our-cats-section__list")
      ?.children ?? []
  );
  const a = document.querySelector("#slick-slider-1");
  const swiper2List = [
    ...swiper1List.slice(2).map((n) => n.cloneNode(true)),
    ...swiper1List.slice(0, 2).map((n) => n.cloneNode(true)),
  ];
  const swiper3List = [
    ...swiper1List.slice(3).map((n) => n.cloneNode(true)),
    ...swiper1List.slice(0, 3).map((n) => n.cloneNode(true)),
  ];
  const swiper1Container = document.querySelector("#slick-slider-1");
  const swiper2Container = document.querySelector("#slick-slider-2");
  const swiper3Container = document.querySelector("#slick-slider-3");

  swiper1Container.append(...swiper1List);
  swiper2Container.append(...swiper2List);
  swiper3Container.append(...swiper3List);

  jQuery("#slick-slider-1").slick({
    vertical: true,
    dots: false,
    infinite: true,
    speed: 300,
    slidesToShow: 2,
    slidesToScroll: 1,
    asNavFor: "#slick-slider-2,#slick-slider-3",
  });
  jQuery("#slick-slider-2").slick({
    horizontal: true,
    dots: false,
    arrows: true,
    infinite: true,
    fade: true,
    speed: 300,
    slidesToShow: 1,
    slidesToScroll: 1,
    asNavFor: "#slick-slider-1,#slick-slider-3",
  });
  jQuery("#slick-slider-3").slick({
    vertical: true,
    dots: false,
    infinite: true,
    speed: 300,
    slidesToShow: 2,
    slidesToScroll: 1,
    asNavFor: "#slick-slider-1,#slick-slider-2",
  });
});
