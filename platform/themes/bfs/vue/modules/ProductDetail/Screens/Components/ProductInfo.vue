<template>
    <a-spin :spinning="processing">
        <a-icon slot="indicator" type="loading" style="font-size: 24px" spin />
        <div class="info-box">
            <div class="info-box-content">
                <h1 class="product-name">{{ _.get(product, "name") }}</h1>
                <div class="product-rate">
                    <a-breadcrumb separator="|">
                        <a-breadcrumb-item>
                            <a href="javascript:void(0);">
                                <span class="underline">{{ _.get(product, "rate_start", 0) }}</span>
                                <a-rate :default-value="_.get(product, 'rate_start', 0)" disabled allow-half />
                            </a>
                        </a-breadcrumb-item>
                        <a-breadcrumb-item>
                            <a href="javascript:void(0);">
                                <span class="underline">{{ _.get(product, "count_rating", 0) }}</span>
                                Đánh giá
                            </a>
                        </a-breadcrumb-item>
                        <a-breadcrumb-item v-show="_.get(product, 'sold_stock')">
                            <a href="javascript:void(0);">
                                <span class="underline">{{ _.get(product, "sold_stock", 0) }}</span>
                                Đã bán
                            </a>
                        </a-breadcrumb-item>
                    </a-breadcrumb>
                </div>
                <div class="product-price">
                    <a-space size="large">
                        <div class="basic-price" v-if="_.get(product, 'basic_price')">{{ _.get(product, "basic_price_formated") }}</div>
                        <div class="special-price">{{ _.get(product, "price_formated") }}</div>
                        <div class="discount" v-if="_.get(product, 'percentage_off') !== 0">{{ _.get(product, "percentage_off") }}% GIẢM</div>
                    </a-space>
                </div>

<!--                <div class="product-attributes product-info-label">-->
<!--                    <label class="label">Màu sắc</label>-->
<!--                    <div class="content">-->
<!--                        <button-->
<!--                            @click="setActive(index)"-->
<!--                            :data-variation="index"-->
<!--                            v-for="index in 10"-->
<!--                            :key="index"-->
<!--                            :class="active === index ? 'product-variation product-variation&#45;&#45;selected' : 'product-variation'">-->
<!--                            Thường 2,7m-->
<!--                            <div v-show="active === index" class="product-variation__tick">-->
<!--                                <svg enable-background="new 0 0 12 12" viewBox="0 0 12 12" x="0" y="0" class="shopee-svg-icon icon-tick-bold">-->
<!--                                    <g>-->
<!--                                        <path-->
<!--                                            d="m5.2 10.9c-.2 0-.5-.1-.7-.2l-4.2-3.7c-.4-.4-.5-1-.1-1.4s1-.5 1.4-.1l3.4 3 5.1-7c .3-.4 1-.5 1.4-.2s.5 1 .2 1.4l-5.7 7.9c-.2.2-.4.4-.7.4 0-.1 0-.1-.1-.1z"></path>-->
<!--                                    </g>-->
<!--                                </svg>-->
<!--                            </div>-->
<!--                        </button>-->
<!--                    </div>-->
<!--                </div>-->

                <div class="product-quantity product-info-label">
                    <label class="label">Số lượng</label>
                    <div class="content quantity">
                        <button @click="decrement" class="btn btn-decrement">
                            <a-icon type="minus" />
                        </button>
                        <input type="text" readonly v-model="quantity" />
                        <button @click="increment" class="btn btn-increment">
                            <a-icon type="plus" />
                        </button>
                    </div>
                </div>
                <div class="product-action">
                    <a-space :size="15">
                        <a-button htmlType="button" class="add-to-cart" size="large">
                            <a-icon type="shopping-cart" />
                            Thêm vào giỏ hàng
                        </a-button>
                        <a-button htmlType="button" class="buy-now" type="primary" size="large"> Mua ngay</a-button>
                    </a-space>
                </div>
            </div>
        </div>
    </a-spin>
</template>

<script>
import VueNumericInput from "vue-numeric-input";

export default {
    name: "ProductInfo",
    components: {
        VueNumericInput
    },
    props: {
        productDetail: String | Object
    },
    data() {
        return {
            processing: true,
            active: 1,
            quantity: 1,
            min: 1,
            max: 10,
            product: ""
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
