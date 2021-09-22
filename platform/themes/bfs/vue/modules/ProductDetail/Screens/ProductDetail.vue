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
                <div class="info-content">
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
    </section>
</template>

<script>
import ProductImage from "./Components/ProductImage";
import ProductInfo from "./Components/ProductInfo";
export default {
    name: "ProductDetail",
    components: {
        ProductImage,
        ProductInfo
    },
    data() {
        return {
            quantity: 1
        };
    }
};
</script>

<style scoped></style>
