// Scroll header
$(document).ready(function() {
  $(window).scroll(function(){
      if($(this).scrollTop()){
          $('header').addClass('sticky');
      }else{
          $('header').removeClass('sticky');
      }
  });
});
//Search show and hide
$(document).ready(function() {
    $(".search-icon i").click(function () {
    $(".search-input").toggle()
  });
  });