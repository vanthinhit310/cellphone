<template>
    <a-spin :spinning="processing">
        <a-icon slot="indicator" type="loading" style="font-size: 24px" spin />
        <div class="product-imgs">
            <div class="product-imgs-content">
                <div class="relative-background show-image">
                    <div v-if="_.get(product, 'thumbnail')" @click="lightboxIndex = activeEl" class="background-img" :style="{ backgroundImage: `url(${activeImage})` }"></div>
                </div>

                <template v-if="images.length">
                    <div class="product-imgs-thumb">
                        <CoolLightBox :items="big_images" :index="lightboxIndex" :effect="'fade'" :fullScreen="true" :useZoomBar="true" @close="lightboxIndex = null"> </CoolLightBox>
                        <VueSlickCarousel v-bind="settings">
                            <div v-for="(item, index) in images" @click="setActiveImage(item, index)" :key="index" :class="index === activeEl ? 'active product-thumb' : 'product-thumb'">
                                <div class="product-thumb-content">
                                    <div v-if="isImageUrl(item)" class="product-thumb-background" :style="{ backgroundImage: `url(${item})` }"></div>
                                    <div v-else class="product-video product-thumb-background" :style="{ backgroundImage: `url(${_.get(product, 'thumbnail')})` }">
                                        <img alt="Play" class="img-fluid" src="/themes/bfs/images/play.png" />
                                    </div>
                                </div>
                            </div>
                        </VueSlickCarousel>
                    </div>
                </template>

                <div class="product-share">
                    <a-space :size="15">
                        <span>Chia sẻ:</span>
                        <a class="social-item" type="button">
                            <img class="img-fluid" alt="Facebook" src="/themes/bfs/images/facebook.png" />
                        </a>
                        <a class="social-item" type="button">
                            <img class="img-fluid" alt="Zalo" src="/themes/bfs/images/zalo.png" />
                        </a>
                        <a class="social-item" type="button">
                            <img class="img-fluid" alt="Pinterest" src="/themes/bfs/images/pinterest.png" />
                        </a>
                        <a class="social-item" type="button">
                            <img class="img-fluid" alt="Twitter" src="/themes/bfs/images/twitter.png" />
                        </a>
                    </a-space>
                </div>
            </div>
        </div>
    </a-spin>
</template>

<script>
import VueSlickCarousel from "vue-slick-carousel";
import "vue-slick-carousel/dist/vue-slick-carousel.css";
import "vue-slick-carousel/dist/vue-slick-carousel-theme.css";
import CoolLightBox from "vue-cool-lightbox";
import "vue-cool-lightbox/dist/vue-cool-lightbox.min.css";

export default {
    name: "ProductImage",
    components: {
        VueSlickCarousel,
        CoolLightBox
    },
    props: {
        productDetail: String | Object
    },
    data() {
        return {
            activeEl: 0,
            activeImage: "",
            images: [],
            big_images: [],
            lightboxIndex: null,
            product: "",
            processing: true,
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
        },
        isImageUrl(url) {
            return url.match(/\.(jpeg|jpg|gif|png)$/) != null;
        }
    },
    watch: {
        productDetail() {
            this.product = this.productDetail;
            this.activeImage = _.get(this.productDetail, "thumbnail");
            this.images = _.get(this.productDetail, "images");
            this.big_images = _.get(this.productDetail, "big_images");
            this.processing = false;
        }
    }
};
</script>

<style scoped></style>
