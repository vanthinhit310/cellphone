<template>
    <div class="product-imgs">
        <div class="product-imgs-content">
            <div class="relative-background show-image">
                <div class="background-img" :style="{ backgroundImage: `url(https://picsum.photos/id/10/1200/1200)` }"></div>
            </div>

            <div class="product-imgs-thumb">
                <VueSlickCarousel v-bind="settings">
                    <div v-for="index in 10" :key="index" class="product-thumb">
                        <div class="product-thumb-content">
                            <div class="product-thumb-background" :style="{ backgroundImage: `url(https://picsum.photos/id/${index + 1}/320/320)` }"></div>
                        </div>
                    </div>
                </VueSlickCarousel>
            </div>
        </div>
    </div>
</template>

<script>
import VueSlickCarousel from "vue-slick-carousel";
import "vue-slick-carousel/dist/vue-slick-carousel.css";
import "vue-slick-carousel/dist/vue-slick-carousel-theme.css";
export default {
    name: "ProductImage",
    components: {
        VueSlickCarousel
    },
    data() {
        return {
            settings: {
                infinite: false,
                speed: 500,
                slidesToShow: 5,
                slidesToScroll: 1
            }
        };
    }
};
</script>

<style scoped></style>
