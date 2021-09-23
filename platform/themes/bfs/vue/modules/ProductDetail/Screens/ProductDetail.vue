<template>
    <section class="product-detail-wrapper">
        <div class="page-breadcrumb">
            <div class="container">
                <a-breadcrumb>
                    <a-breadcrumb-item><router-link :to="{ name: 'home' }">Home</router-link></a-breadcrumb-item>
                    <a-breadcrumb-item><a href="">Thiết bị điện tử</a></a-breadcrumb-item>
                    <a-breadcrumb-item>[Mã FMCGHOT giảm 10% đơn 400K] [Tặng Bình lắc Thủy tinh] Sữa bột Ensure Vani 850G/lon</a-breadcrumb-item>
                </a-breadcrumb>
            </div>
        </div>

        <div class="product-info">
            <div class="container">
                <div class="info-content card">
                    <a-row type="flex" style="flex-wrap: nowrap">
                        <a-col flex="450px" class="overflow-hidden">
                            <ProductImage />
                        </a-col>
                        <a-col flex="auto" class="overflow-hidden">
                            <ProductInfo />
                        </a-col>
                    </a-row>
                </div>
            </div>
        </div>

        <div class="description-box">
            <div class="container">
                <div class="description-box-content">
                    <div class="description-box-left">
                        <ProductDescription/>
                    </div>
                    <div class="description-box-right"></div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import ProductImage from "./Components/ProductImage";
import ProductInfo from "./Components/ProductInfo";
import ProductDescription from "./Components/ProductDescription";
import {mapActions} from "vuex";

export default {
    name: "ProductDetail",
    components: {
        ProductImage,
        ProductInfo,
        ProductDescription
    },
    data() {
        return {
            processing: false
        };
    },
    created(){

    },
    methods: {
        ...mapActions("productDetail", ["getProduct"]),
    },
};
</script>

<style scoped></style>
