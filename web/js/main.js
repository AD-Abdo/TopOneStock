$(function () {
  // Home Page Owl Carousel
  $(".home-page-carousel .owl-carousel").owlCarousel({
    loop: true,
    margin: 5,
    nav: false,
    rtl: true,
    dots: true,
    autoplay: true,
    autoplayTimeout: 4000,
    autoplayHoverPause: true,
    center: false,
    items: 1,
  });

  // Project Owl Carousel
  $(".project-details .owl-carousel").owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    rtl: true,
    dots: false,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    center: false,
    responsive: {
      0: {
        items: 1,
      },
      500: {
        items: 2,
      },
      1000: {
        items: 3,
      },
    },
  });

  // Last Recommendations Owl Carousel
  $(".last-recommend .owl-carousel").owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
    rtl: true,
    dots: true,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    center: false,
    items: 1,
    dotsData: true,
  });

  $(".last-recommend .owl-dot").click(function (e) {
    $(".last-recommend .owl-carousel").trigger("to.owl.carousel", [
      $(this).index(),
      300,
    ]);
  });

  $(".logInBtn").on("click", function () {
    $(".logIn").slideDown(300);
    $(".logIn").css("display", "flex");
  });

  $(".logIn , .logIn-header i").on("click", function () {
    $(".logIn").slideUp(300);
  });

  $(".logIn .form-wrapper").on("click", function (e) {
    e.stopPropagation();
  });
      wow = new WOW(
        {
        boxClass:     'animate__animated',      // default
        animateClass: 'animated', // default
        offset:       0,          // default
        mobile:       true,       // default
        live:         true        // default
      })
      wow.init();
});
