$(window).scroll(function () {
  if ($(this).scrollTop() > 100) {
    $("#header").addClass("fixed-top");
    $(".topBar").css("display", "none");
  } else {
    $("#header").removeClass("fixed-top");
    $(".topBar").css("display", "block");
  }
});

//aos

AOS.init({
  easing: "ease-in-out-sine",
});

// jQuery counterUp
$('[data-toggle="counterUp"]').counterUp({
  delay: 20,
  time: 500,
});

// Select all tabs
$(".nav-tabs a").click(function () {
  $(this).tab("show");
});

//swiper slider
var swiper = new Swiper(".mySwiper", {
  loop: true,
  spaceBetween: 30,
  slidesPerView: "auto",
  autoplay: {
    delay: 4000,
    disableOnInteraction: false,
  },
  
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

window.randomize = function () {
  $(".ko-progress-circle").attr(
    "data-progress",
    Math.floor(Math.random() * 100)
  );
};
setTimeout(window.randomize, 200);
$(".ko-progress-circle").click(window.randomize);
