// news slider
$(document).ready(function () {
    $(".news-slider").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      infinite: true,
      draggable: false,
      autoplay: true,
      autoplaySpeed: 2000,
      arrows: true,
      prevArrow: `<button type='button' class='slick-prev-news slick-arrow'><i class="fas fa-chevron-left"></i></button>`,
      nextArrow: `<button type='button' class='slick-next-news slick-arrow'><i class="fas fa-chevron-right"></i></button>`,
    });
  });