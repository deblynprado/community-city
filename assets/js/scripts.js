(function($) {
  // Saves the class in a variable
  var menu = $('.home .menu-wrapper');
  // Removes the class in home
  $(menu).removeClass('fixed');
   //Changes the class of the header only in home
  $(window).scroll(function() {
    // Gets the vertical scroll position
    var scroll = $(window).scrollTop();
    if (scroll >= 450) {
      $(menu).addClass('fixed');
    } else {
      $(menu).removeClass('fixed');
    }
  });
})(jQuery);