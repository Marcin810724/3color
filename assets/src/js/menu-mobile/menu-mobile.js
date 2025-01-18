jQuery(document).ready(function ($) {
  $("#nav-hamburger").on("click", function () {
    $("#menu-mobile").toggleClass("showup", 500);
    $("#nav-hamburger").toggleClass("cross", 500);
  });
});

jQuery(document).ready(function ($) {
  jQuery(function ($) {
    $('a[href*="#"]:not([href="#"])').click(function () {
      var target = $(this.hash);
      $("html,body")
        .stop()
        .animate(
          {
            scrollTop: target.offset().top - 120,
          },
          "linear"
        );
    });
    if (location.hash) {
      var id = $(location.hash);
    }
    $(window).on("load", function () {
      if (location.hash) {
        $("html,body").animate(
          {
            scrollTop: id.offset().top - 120,
          },
          "linear"
        );
      }
    });
  });
});

jQuery(document).ready(function ($) {
  $(window).on("load scroll resize orientationchange", function () {
    var scroll = $(window).scrollTop();
    var $win = $(window);
    if (scroll >= 10) {
      $(".header-container").addClass("scroll");
    } else {
      $(".header-container").removeClass("scroll");
    }
  });
});
jQuery(document).ready(function ($) {
  // Loop through numbers from 0 to 10000
  for (var i = 0; i <= 10000; i++) {
    attachClickHandler(i);
  }

  // Function to attach click event handler
  function attachClickHandler(i) {
    var menuItemClass = `.menu-item-${i}`;

    $(menuItemClass).on("click", function () {
      $(`${menuItemClass} .sub-menu`).toggleClass("show-menu", 500);
    });
  }
});
