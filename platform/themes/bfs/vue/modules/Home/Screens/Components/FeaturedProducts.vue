<template>
    <section class="featured-products">
        <div class="container">
            <a-spin :spinning="processing">
                <a-icon slot="indicator" type="loading" style="font-size: 24px" spin />
                <div class="featured-products-content">
                    <template v-if="products.length">
                        <div class="section-header">Sản phẩm nổi bật</div>
                        <VueSlickCarousel v-bind="settings">
                            <div v-for="(item, index) in products" :key="index" class="featured-slide-item">
                                <a class="d-block product-item" href="javascript:void(0);">
                                    <div class="product-item__content">
                                        <div class="product-item__content--image">
                                            <img alt="Product" class="img-fluid w-100" :src="_.get(item, 'image')" />
                                            <div class="percent-discount" v-if="_.get(item, 'percentage_off', 0) !== 0">
                                                <div class="percent-discount-content">
                                                    <span class="percent">{{ _.get(item, "percentage_off", 0) }}%</span>
                                                    <span class="text">Giảm</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item__content--name">
                                            <span>{{ _.get(item, "name") }}</span>
                                        </div>
                                        <div class="discount-text">
                                            <div class="discount-text-content" v-show="_.get(item, 'discount_text')">
                                                <svg class="svg_icon" viewBox="-0.5 -0.5 4 16">
                                                    <path
                                                        d="M4 0h-3q-1 0 -1 1a1.2 1.5 0 0 1 0 3v0.333a1.2 1.5 0 0 1 0 3v0.333a1.2 1.5 0 0 1 0 3v0.333a1.2 1.5 0 0 1 0 3q0 1 1 1h3"
                                                        stroke-width="1"
                                                        transform=""
                                                        stroke="currentColor"
                                                        fill="#f69113"></path>
                                                </svg>
                                                <div class="text">Giảm {{ _.get(item, 'discount_text') }}</div>
                                                <svg class="svg_icon" viewBox="-0.5 -0.5 4 16">
                                                    <path
                                                        d="M4 0h-3q-1 0 -1 1a1.2 1.5 0 0 1 0 3v0.333a1.2 1.5 0 0 1 0 3v0.333a1.2 1.5 0 0 1 0 3v0.333a1.2 1.5 0 0 1 0 3q0 1 1 1h3"
                                                        stroke-width="1"
                                                        transform="rotate(180) translate(-3 -15)"
                                                        stroke="currentColor"
                                                        fill="#f69113"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="product-item__content--price">
                                            <span class="price">{{ _.get(item, "price_formated") }}</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </VueSlickCarousel>
                    </template>
                    <template v-else>
                        <a-empty></a-empty>
                    </template>
                </div>
            </a-spin>
        </div>
    </section>
</template>

<script>
import VueSlickCarousel from "vue-slick-carousel";
import "vue-slick-carousel/dist/vue-slick-carousel.css";
import "vue-slick-carousel/dist/vue-slick-carousel-theme.css";
import { mapActions } from "vuex";

export default {
    components: {
        VueSlickCarousel
    },
    name: "FeaturedProducts",
    data() {
        return {
            settings: {
                dots: false,
                focusOnSelect: true,
                infinite: false,
                speed: 800,
                slidesToShow: 6,
                slidesToScroll: 6,
                touchThreshold: 5
            },
            processing: false,
            products: []
        };
    },
    mounted() {
        this.fetchFeaturedProducts();
    },
    methods: {
        ...mapActions("home", ["getFeaturedProducts"]),
        async fetchFeaturedProducts() {
            try {
                this.processing = true;
                const response = await this.getFeaturedProducts();
                const products = _.get(response, "products", []);
                if (products && products.length) {
                    this.products = products;
                }
            } catch (e) {
                console.log(e.message);
            }
            this.processing = false;
        }
    }
};
</script>

<style scoped></style>
