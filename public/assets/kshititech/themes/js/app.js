// ------------------------------------------------------------
// Disable right-click, text selection, copy, cut, drag, drop
// ------------------------------------------------------------
document.addEventListener("DOMContentLoaded", function () {
  const blockedEvents = [
    "contextmenu",
    "selectstart",
    "copy",
    "cut",
    "dragstart",
    "drop",
  ];

  blockedEvents.forEach(function (eventName) {
    document.addEventListener(eventName, function (e) {
      e.preventDefault();
    });
  });

  // ------------------------------------------------------------
  // Initialize AOS (Animate On Scroll)
  // ------------------------------------------------------------
  if (typeof AOS !== "undefined") {
    AOS.init();
  }

  // ------------------------------------------------------------
  // jQuery ready (Preloader + OwlCarousel)
  // ------------------------------------------------------------
  $(function () {
    // Preloader fadeout
    setTimeout(function () {
      $("#preloader").css("opacity", "0");
      setTimeout(function () {
        $("#preloader").css("display", "none");
        $(".wrapper").css("display", "block");
      }, 500); // wait for transition
    }, 2000); // simulate 2s loading

    // Owl Carousel
    const $owl = $(".owl-carousel");
    if ($owl.length) {
      $owl.owlCarousel({
        items: 4,
        loop: true,
        margin: 10,
        nav: true,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        responsive: {
          0: { items: 1 }, // small screens
          600: { items: 2 }, // medium screens
          1000: { items: 4 }, // large screens
        },
      });
    }
  });
});
