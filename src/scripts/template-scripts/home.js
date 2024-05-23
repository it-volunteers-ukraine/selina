console.log("home");

$(document).ready(function () {
  $(".slider__inner").slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    centerMode: true,
    speed: 2000,
    arrows: false,
    dots: false,
    fade: false,
    Infinite: true,
    autoplay: true,
    autoplaySpeed: 2000,
    pauseOnFocus: false,
    pauseOnHover: false,
    pauseOnDotsHover: false,
    variableWidth: true,
  });
});
