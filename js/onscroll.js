let nav = document.getElementsByClassName("navbar-bot")[0];
$(window).scroll(function () {
  if ($(window).scrollTop() + $(window).height() == $(document).height()) {
    $(".navbar-bot").fadeOut(300);
  } else {
    $(".navbar-bot").fadeIn(200);
  }
});
