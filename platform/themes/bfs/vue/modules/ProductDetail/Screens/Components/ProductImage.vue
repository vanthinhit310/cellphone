<template>
    <div class="product-imgs">
        <div class="product-imgs-content">
            <div class="relative-background show-image">
                <div class="background-img" :style="{ backgroundImage: `url(${activeImage})` }"></div>
            </div>

            <div class="product-imgs-thumb">
                <VueSlickCarousel v-bind="settings">
                    <div v-for="index in 10" @click="setActiveImage(`https://picsum.photos/id/${index + 1}/320/320`, index)" :key="index" :class="index === activeEl ? 'active product-thumb' : 'product-thumb'">
                        <div class="product-thumb-content">
                            <div class="product-thumb-background" :style="{ backgroundImage: `url(https://picsum.photos/id/${index + 1}/320/320)` }"></div>
                        </div>
                    </div>
                </VueSlickCarousel>
            </div>

            <div class="product-share">
                <a-space :size="15">
                    <span>Chia sẻ:</span>
                    <a class="social-item" type="button">
                        <img class="img-fluid" alt="Facebook" src="/themes/bfs/images/facebook.png">
                    </a>
                    <a class="social-item" type="button">
                        <img class="img-fluid" alt="Zalo" src="/themes/bfs/images/zalo.png">
                    </a>
                    <a class="social-item" type="button">
                        <img class="img-fluid" alt="Pinterest" src="/themes/bfs/images/pinterest.png">
                    </a>
                    <a class="social-item" type="button">
                        <img class="img-fluid" alt="Twitter" src="/themes/bfs/images/twitter.png">
                    </a>
                </a-space>
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
            activeEl: 1,
            activeImage: "https://picsum.photos/id/10/1200/1200",
            settings: {
                infinite: false,
                speed: 800,
                slidesToShow: 5,
                slidesToScroll: 5
            }
        };
    },
    methods: {
        setActiveImage(src, el) {
            this.activeImage = src;
            this.activeEl = el;
        }
    }
};
</script>

<style scoped></style>
