<template>
    <section class="product-list">
        <div class="container">
            <a-spin :spinning="processing">
                <a-icon slot="indicator" type="loading" style="font-size: 24px" spin />
                <div class="product-list-content">
                    <template v-if="products.length">
                        <div class="section-header-underline">Danh sách sản phẩm</div>
                        <div class="products">
                            <a-row :gutter="[10, 10]">
                                <a-col v-for="(item, index) in products" :key="index" :xs="{ span: 12 }" :md="{ span: 6 }" :lg="{ span: 4 }">
                                    <router-link class="d-block product-item" :to="{ name: 'product-detail', params: { slug: _.get(item, 'slug') } }">
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
                                            <div class="rate-discount">
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
                                                        <div class="text">Giảm {{ _.get(item, "discount_text") }}</div>
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
                                                <div class="rate">
                                                    <a-rate :defaultValue="_.get(item, 'rate_start', 0)" disabled allow-half />
                                                </div>
                                            </div>
                                            <div class="product-item__content--price">
                                                <div class="price">{{ _.get(item, "price_formated") }}</div>
                                            </div>
                                        </div>
                                    </router-link>
                                </a-col>
                            </a-row>
                            <Pagination
                                @onSizeChange="handleSizeChange"
                                @onPageChange="handlePageChange"
                                :size-options="pageSizeOptions"
                                :current-page="currentPage"
                                :page-size="perPage"
                                :total="total" />
                        </div>
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
import { mapActions } from "vuex";
import Pagination from "../../../BaseComponents/Pagination";

export default {
    components: {
        Pagination
    },
    name: "ProductList",
    data() {
        return {
            pageSizeOptions: ["12", "24", "48"],
            processing: false,
            products: [],
            currentPage: 1,
            perPage: 12,
            total: 0
        };
    },
    created() {
        const { currentPage, perPage } = this;
        this.fetchProducts(currentPage, perPage);
    },
    methods: {
        ...mapActions("home", ["getProducts"]),
        async fetchProducts(page, pageSize) {
            try {
                this.processing = true;
                const response = await this.getProducts({ page, perPage: pageSize });
                this.products = _.get(response, "products");
                const { currentPage, perPage, total } = _.get(response, "pagination");
                this.currentPage = currentPage;
                this.perPage = perPage;
                this.total = total;
            } catch (e) {
                console.log(e.message);
            }
            this.processing = false;
        },
        async handleSizeChange(current, pageSize) {
            try {
                await this.fetchProducts(current, pageSize);
                this.currentPage = current;
                this.perPage = pageSize;
            } catch (e) {
                console.log(e.message);
            }
        },
        async handlePageChange(page) {
            try {
                const { perPage } = this;
                await this.fetchProducts(page, perPage);
            } catch (e) {
                console.log(e.message);
            }
        }
    }
};
</script>

<style scoped></style>
