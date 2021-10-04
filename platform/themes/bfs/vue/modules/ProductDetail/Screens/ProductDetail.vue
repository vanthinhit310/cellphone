<template>
    <section class="product-detail-wrapper">
        <div class="page-breadcrumb d-none d-lg-block">
            <div class="container">
                <template v-if="product">
                    <a-breadcrumb>
                        <a-breadcrumb-item><router-link :to="{ name: 'home' }">Home</router-link></a-breadcrumb-item>
                        <a-breadcrumb-item>
                            <a href="">{{ _.get(product, "categories[0].name") }}</a>
                        </a-breadcrumb-item>
                        <a-breadcrumb-item>{{ _.get(product, "name") }}</a-breadcrumb-item>
                    </a-breadcrumb>
                </template>
                <template v-else>
                    <a-skeleton active :paragraph="{ rows: 1 }" />
                </template>
            </div>
        </div>

        <div class="product-info">
            <div class="container">
                <div class="info-content card">
                    <a-row class="pic">
                        <a-col class="overflow-hidden pic-left">
                            <ProductImage :product-detail="product" />
                        </a-col>
                        <a-col class="overflow-hidden pic-right">
                            <ProductInfo :product-detail="product" />
                        </a-col>
                    </a-row>
                </div>
            </div>
        </div>

        <div class="description-box">
            <div class="container">
                <div class="description-box-content">
                    <div class="description-box-left">
                        <ProductDescription :product-detail="product" />
                    </div>
                    <div class="description-box-right">
                        <SellingProducts />
                    </div>
                </div>
            </div>
        </div>
        <RelatedProducts :product-detail="product" />
    </section>
</template>

<script>
import ProductImage from "./Components/ProductImage";
import ProductInfo from "./Components/ProductInfo";
import ProductDescription from "./Components/ProductDescription";
import SellingProducts from "./Components/SellingProducts";
import RelatedProducts from "./Components/RelatedProducts";
import { mapActions } from "vuex";

export default {
    name: "ProductDetail",
    components: {
        ProductImage,
        ProductInfo,
        ProductDescription,
        SellingProducts,
        RelatedProducts
    },
    data() {
        return {
            processing: false,
            product: ""
        };
    },
    created() {
        try {
            const { slug } = this.$route.params;
            this.fetchProduct(slug);
        } catch (e) {
            console.log(e.message);
        }
    },
    methods: {
        ...mapActions("productDetail", ["getProduct"]),
        ...mapActions("baseComponents", ["setLoadingState"]),
        async fetchProduct(slug) {
            try {
                if (!!slug) {
                    this.setLoadingState(true);
                    const response = await this.getProduct(slug);
                    const product = _.get(response, "product");
                    if (!!product) {
                        this.product = product;
                    }
                }
            } catch (e) {
                console.log(e.message);
            }
            this.setLoadingState(false);
        }
    },
    watch: {
        $route(to, from) {
            const { slug } = to.params;
            this.fetchProduct(slug);
        }
    }
};
</script>

<style scoped></style>
