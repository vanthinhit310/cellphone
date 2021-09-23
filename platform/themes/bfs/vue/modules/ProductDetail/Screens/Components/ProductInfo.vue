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
                    <a-breadcrumb-item
                        ><a href="javascript:void(0);"><span class="underline">410</span> Đã bán</a></a-breadcrumb-item
                    >
                </a-breadcrumb>
            </div>
            <div class="product-price">
                <a-space size="middle">
                    <div class="basic-price">₫800.000</div>
                    <div class="special-price">₫709.000</div>
                    <div class="discount">11% GIẢM</div>
                </a-space>
            </div>

            <div class="product-attributes product-info-label">
                <label class="label">Màu sắc</label>
                <div class="content">
                    <button
                        @click="setActive(index)"
                        :data-variation="index"
                        v-for="index in 10"
                        :key="index"
                        :class="active === index ? 'product-variation product-variation--selected' : 'product-variation'">
                        Thường 2,7m
                        <div v-show="active === index" class="product-variation__tick">
                            <svg enable-background="new 0 0 12 12" viewBox="0 0 12 12" x="0" y="0" class="shopee-svg-icon icon-tick-bold">
                                <g>
                                    <path
                                        d="m5.2 10.9c-.2 0-.5-.1-.7-.2l-4.2-3.7c-.4-.4-.5-1-.1-1.4s1-.5 1.4-.1l3.4 3 5.1-7c .3-.4 1-.5 1.4-.2s.5 1 .2 1.4l-5.7 7.9c-.2.2-.4.4-.7.4 0-.1 0-.1-.1-.1z"></path>
                                </g>
                            </svg>
                        </div>
                    </button>
                </div>
            </div>

            <div class="product-quantity product-info-label">
                <label class="label">Số lượng</label>
                <div class="content quantity">
                    <button @click="decrement" class="btn btn-decrement"><a-icon type="minus" /></button>
                    <input type="text" readonly v-model="quantity" />
                    <button @click="increment" class="btn btn-increment"><a-icon type="plus" /></button>
                </div>
            </div>
            <div class="product-action">
                <a-space :size="15">
                    <a-button htmlType="button" class="add-to-cart" size="large">
                        <a-icon type="shopping-cart" />
                        Thêm vào giỏ hàng
                    </a-button>
                    <a-button htmlType="button" class="buy-now" type="primary" size="large"> Mua ngay </a-button>
                </a-space>
            </div>
        </div>
    </div>
</template>

<script>
import VueNumericInput from "vue-numeric-input";

export default {
    name: "ProductInfo",
    components: {
        VueNumericInput
    },
    data() {
        return {
            active: 1,
            quantity: 1,
            min: 1,
            max: 10
        };
    },
    methods: {
        setActive(index) {
            this.active = index;
        },
        increment() {
            if (this.quantity === this.max) {
                this.quantity = this.max;
            } else {
                this.quantity++;
            }
        },
        decrement() {
            if (this.quantity === this.min) {
                this.quantity = this.min;
            } else {
                this.quantity--;
            }
        }
    }
};
</script>

<style scoped></style>
