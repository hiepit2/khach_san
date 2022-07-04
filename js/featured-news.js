// Slick slide featured-news
$(document).ready(function () {
    $(".featured-news-slider").slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      infinite: true,
      arrows: true,
      draggable: false,
      prevArrow: `<button type='button' class='slick-prev-news slick-arrow'><i class="fas fa-chevron-left"></i></button>`,
      nextArrow: `<button type='button' class='slick-next-news slick-arrow'><i class="fas fa-chevron-right"></i></button>`,
    });
  });