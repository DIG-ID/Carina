import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

document.addEventListener('DOMContentLoaded', () => {
  new Swiper('.aps-slider.swiper', {
    slidesPerView: 1,
    centeredSlides: true,
    loop: true,
    breakpoints: {
      480:  { slidesPerView: 2, spaceBetween: 15 },
      768:  { slidesPerView: 2, spaceBetween: 25 },
      1366: { slidesPerView: 1.75, spaceBetween: 40 },
    },
    autoplay: { delay: 1, disableOnInteraction: false },
    speed: 5000,
    grabCursor: true,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
});