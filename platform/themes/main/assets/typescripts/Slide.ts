// @ts-nocheck
const Slide = {
    bannerSlide: function () {
        try {
            if ($('.banner__slide__thumb').length && $('.banner__slide__top').length) {
                const bannerThumb = new Swiper(".banner__slide__thumb", {
                    spaceBetween: 10,
                    slidesPerView: 5,
                    loop: true,
                    // autoplay: {
                    //     delay: 4000,
                    //     disableOnInteraction: true,
                    // },
                    freeMode: false,
                    watchSlidesVisibility: true,
                    watchSlidesProgress: true,
                });
                const bannerTop = new Swiper(".banner__slide__top", {
                    spaceBetween: 0,
                    slidesPerView: 1,
                    // autoplay: {
                    //     delay: 4000,
                    //     disableOnInteraction: true,
                    // },
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
    }
};

$(document).ready(function () {
    Slide.bannerSlide();
});
