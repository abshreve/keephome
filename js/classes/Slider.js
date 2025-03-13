require('slick-carousel');

export default class Slider {
  constructor() {
    const $slider = $('.slider-component .slider');
    if ($slider.length) {
      $slider.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        arrows: true,
        accessibility: true,
        prevArrow: '<button class="slick-prev">Prev</button>',
        nextArrow: '<button class="slick-next">Next</button>',
      });
    }
  }
}

jQuery(document).ready(function () {
  new Slider();
});
