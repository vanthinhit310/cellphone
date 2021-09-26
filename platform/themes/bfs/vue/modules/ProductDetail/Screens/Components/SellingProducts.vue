<template>
    <section class="product-detail-selling">
        <a-spin :spinning="processing">
            <a-icon slot="indicator" type="loading" style="font-size: 24px" spin />
            <div class="featured-products-content">
                <template v-if="products.length">
                    <div class="selling-product-content">
                        <div class="selling-product-title">Top sản phẩm bán chạy</div>
                        <div class="selling-product-list">
                            <div v-for="(item, index) in products" :key="index" class="selling-product-item">
                                <router-link class="d-block product-item" :to="{ name: 'product-detail', params: { slug: _.get(item, 'slug') } }">
                                    <div class="product-item__content">
                                        <div class="product-item__content--image">
                                            <img alt="Product" class="img-fluid w-100" :src="_.get(item, 'image')" />
                                        </div>
                                        <div class="product-item__content--name">
                                            <span>{{ _.get(item, "name") }}</span>
                                        </div>
                                        <div class="product-item__content--price">
                                            <div class="price">{{ _.get(item, "price_formated") }}</div>
                                        </div>
                                    </div>
                                </router-link>
                            </div>
                        </div>
                    </div>
                </template>
                <template v-else>
                    <a-empty></a-empty>
                </template>
            </div>
        </a-spin>
    </section>
</template>

<script>
import { mapActions } from "vuex";

export default {
    name: "SellingProducts",
    data() {
        return {
            processing: false,
            products: []
        };
    },
    created() {
        this.fetchSellingProducts();
    },
    methods: {
        ...mapActions("home", ["getSellingProducts"]),
        async fetchSellingProducts() {
            try {
                this.processing = true;
                const response = await this.getSellingProducts(8);
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
