<template>
    <a-spin :spinning="processing">
        <a-icon slot="indicator" type="loading" style="font-size: 24px" spin />
        <div class="description-detail">
            <div v-if="_.get(product, 'specifications')" class="box-title-content">
                <div class="title">CHI TIẾT SẢN PHẨM</div>
                <div class="content tskt" v-html="_.get(product, 'specifications')"></div>
            </div>
            <div v-if="_.get(product, 'description')" class="box-title-content">
                <div class="title">MÔ TẢ SẢN PHẨM</div>
                <div class="content" v-html="_.get(product, 'description')"></div>
            </div>
        </div>
    </a-spin>
</template>

<script>
export default {
    name: "ProductDescription",
    props: {
        productDetail: String | Object
    },
    data() {
        return {
            processing: true,
            product: ""
        };
    },
    watch: {
        productDetail() {
            this.product = this.productDetail;
            this.processing = false;
        }
    }
};
</script>

<style scoped></style>
