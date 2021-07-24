// @ts-nocheck
const Slide = {
    bannerSlide: function () {
        try {
            if ($('.banner__slide__thumb').length && $('.banner__slide__top').length) {
                const bannerThumb = new Swiper(".banner__slide__thumb", {
                    spaceBetween: 10,
                    slidesPerView: 5,
                    freeMode: false,
                    watchSlidesVisibility: true,
                    watchSlidesProgress: true,
                });
                const bannerTop = new Swiper(".banner__slide__top", {
                    spaceBetween: 0,
                    slidesPerView: 1,
                    autoplay: {
                        delay: 3000,
                        disableOnInteraction: false,
                    },
                    loop: true,
                    navigation: {
                        nextEl: ".banner__slide__top .swiper-button-next",
                        prevEl: ".banner__slide__top .swiper-button-prev",
                    },
                    thumbs: {
                        swiper: bannerThumb,
                    },
                });
            }
        } catch (e) {
            console.log(e.message)
        }
    },
    productSlide: function () {
        try {
            if ($('.product__silde__container').length) {
                const productSwiper = new Swiper(".product__silde__container", {
                    spaceBetween: 0,
                    slidesPerView: 5,
                    slidesPerGroup: 5,
                    navigation: {
                        nextEl: ".product__silde__container .swiper-button-next",
                        prevEl: ".product__silde__container .swiper-button-prev",
                    },
                });
            }
        } catch (e) {
            console.log(e.message)
        }
    }
};

$(document).ready(function () {
    Slide.bannerSlide();
    Slide.productSlide();
});
