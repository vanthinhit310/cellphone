/* minified */
const Slide={bannerSlide:function(){try{if($(".banner__slide__thumb").length&&$(".banner__slide__top").length){const e=new Swiper(".banner__slide__thumb",{spaceBetween:10,slidesPerView:5,freeMode:!1,watchSlidesVisibility:!0,watchSlidesProgress:!0});new Swiper(".banner__slide__top",{spaceBetween:0,slidesPerView:1,autoplay:{delay:3e3,disableOnInteraction:!1},loop:!0,navigation:{nextEl:".banner__slide__top .swiper-button-next",prevEl:".banner__slide__top .swiper-button-prev"},thumbs:{swiper:e}})}}catch(e){console.log(e.message)}}};$(document).ready((function(){Slide.bannerSlide()}));