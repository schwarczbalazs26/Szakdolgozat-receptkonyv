$('.carousel .carousel-item').each(function () {
  var minPerSlide = 3;
  var prev = $(this).prev();
  for (var i = 0; i < minPerSlide; i++) {
    if (!prev.length) {
      prev = $(this).siblings(':last');
    }
    var prevClone = prev.clone();
    if (prev.hasClass('carousel-item-left')) {
      prevClone.removeClass('carousel-item-left');
    }
    if (prev.hasClass('active')) {
      prevClone.addClass('active');
    }
    prevClone.children(':first-child').appendTo($(this));
    prev = prev.prev();
  }
});

$('.carousel').on('slide.bs.carousel', function (e) {
  var $e = $(e.relatedTarget);
  var idx = $e.index();
  var itemsPerSlide = 3;
  var totalItems = $('.carousel-item').length;

  if (idx >= totalItems - (itemsPerSlide - 1)) {
    var it = itemsPerSlide - (totalItems - idx);
    for (var i = 0; i < it; i++) {
      if (e.direction == "right") {
        $('.carousel-item').eq(i).appendTo('.carousel-inner');
      }
      else {
        $('.carousel-item').eq(0).appendTo('.carousel-inner');
      }
    }
  }
});

$(document).ready(function () {
  var interval = 3000000; // ms-ben megadva
  var timer;

  function startCarouselTimer() {
    timer = setInterval(function () {
      $('.carousel').carousel('next');
    }, interval);
  }

  function stopCarouselTimer() {
    clearInterval(timer);
  }

  // időzítő indítása az oldal betöltésénél
  startCarouselTimer();

  $('.carousel').on('slid.bs.carousel', function () {
    // időzítő újraindítása
    stopCarouselTimer();
    startCarouselTimer();
  });
});
