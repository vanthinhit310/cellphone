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
    },
    brandSlide: function () {
        try {
            if ($('.brand__slide').length) {
                const brandSwiper = new Swiper(".brand__slide__container", {
                    spaceBetween: 10,
                    slidesPerView: 4,
                });
            }
        } catch (e) {
            console.log(e.message)
        }
    },
    categorySlide: function () {
        try {
            if ($('.category__silde__container').length) {
                const categorySwiper = new Swiper(".category__silde__container", {
                    spaceBetween: 0,
                    slidesPerView: 5,
                    slidesPerGroup: 5,
                    navigation: {
                        nextEl: ".category__silde__container .swiper-button-next",
                        prevEl: ".category__silde__container .swiper-button-prev",
                    },
                });
            }
        } catch (e) {
            console.log(e.message)
        }
    },
    productInfoSlide: function () {
        try {
            if ($('.product__info__slide').length) {
                const psThumb = new Swiper(".ps__container__thumb", {
                    spaceBetween: 10,
                    speed: 800,
                    slidesPerView: 4,
                    freeMode: false,
                    watchSlidesVisibility: true,
                    watchSlidesProgress: true,
                    navigation: {
                        nextEl: ".ps__container__thumb .swiper-button-next",
                        prevEl: ".ps__container__thumb .swiper-button-prev",
                    },
                });
                const psTop = new Swiper(".ps__container__top", {
                    spaceBetween: 0,
                    speed: 800,
                    slidesPerView: 1,
                    thumbs: {
                        swiper: psThumb,
                    },
                });
            }
        } catch (e) {
            console.log(e.message)
        }
    },
};

$(document).ready(function () {
    Slide.bannerSlide();
    Slide.productSlide();
    Slide.brandSlide();
    Slide.categorySlide();
    Slide.productInfoSlide();
});
