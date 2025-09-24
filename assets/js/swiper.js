import Swiper from 'swiper/bundle';

window.addEventListener("load", () => {
  // Homepage Hero Swiper
  if (document.querySelector(".page-template-page-taste")) {
    new Swiper('.bleed-right-swiper', {
      speed: 900,
      loop: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
      breakpoints: { 
        0:{slidesPerView:1.3,spaceBetween: 9}, 
        768:{slidesPerView:1.5,spaceBetween: 16},
        1280:{slidesPerView:2,spaceBetween: 24}
      },
      slidesPerView: 2,
      slidesPerGroup: 1,
      spaceBetween: 24,
      effect: 'slide',
      navigation: {
        nextEl: '.bleed-right-swiper .swiper-button-next',
      },
    });
  }
  if (document.querySelector(".page-template-page-relax")) {
    new Swiper('.bleed-both-swiper', {
      speed: 900,
      loop: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
      breakpoints: { 
        0:{slidesPerView:1.3,spaceBetween: 9}, 
        768:{slidesPerView:1.5,spaceBetween: 16},
        1280:{slidesPerView:1.5,spaceBetween: 24},
        1536:{slidesPerView:2.5,spaceBetween: 24}
      },
      slidesPerView: 1.5,
      slidesPerGroup: 1,
      spaceBetween: 24,
      effect: 'slide',
      navigation: {
        nextEl: '.bleed-both-swiper .swiper-button-next',
      },
    });
  }
});