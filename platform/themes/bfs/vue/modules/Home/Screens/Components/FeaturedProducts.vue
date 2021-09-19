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
                                        </div>
                                        <div class="product-item__content--name">
                                            <span>{{ _.get(item, "name") }}</span>
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
