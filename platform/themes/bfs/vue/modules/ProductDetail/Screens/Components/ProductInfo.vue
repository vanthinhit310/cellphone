<template>
    <div class="info-box">
        <div class="info-box-content">
            <h1 class="product-name">[Mã FMCGHOT giảm 10% đơn 400K] [Tặng Bình lắc Thủy tinh] Sữa bột Ensure Vani 850G/lon</h1>
            <div class="product-rate">
                <a-breadcrumb separator="|">
                    <a-breadcrumb-item
                    ><a href="javascript:void(0);"><span class="underline">5.0</span> <a-rate :default-value="5" disabled allow-half /></a
                    ></a-breadcrumb-item>
                    <a-breadcrumb-item
                    ><a href="javascript:void(0);"><span class="underline">153</span> Đánh giá</a></a-breadcrumb-item
                    >
                    <a-breadcrumb-item><a href="javascript:void(0);"><span class="underline">410</span> Đã bán</a></a-breadcrumb-item>
                </a-breadcrumb>
            </div>
            <div class="product-price">
                <a-space size="middle">
                    <div class="basic-price">₫800.000</div>
                    <div class="special-price">₫709.000</div>
                    <div class="discount">11% GIẢM</div>
                </a-space>
            </div>
            <div class="product-quantity">
                <a-space :size="20">
                    Số lượng
                    <a-input-number pattern="[0-9]*" v-model="quantity" :min="1" :max="100" />
                </a-space>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ProductInfo",
    data() {
        return {
            quantity: 1
        };
    }
}
</script>

<style scoped>

</style>
