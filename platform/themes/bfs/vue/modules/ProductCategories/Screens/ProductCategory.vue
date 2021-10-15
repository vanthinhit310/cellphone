<template>
    <div class="product-category-wrapper">
        <div class="container">
            <div class="pc-content">
                <div class="pc-content-header">
                    <div class="left">
                        <a-space>
                            Sắp xếp theo
                            <a-select v-model="priceSort" style="width: 130px">
                                <a-select-option value="">Mặc định</a-select-option>
                                <a-select-option value="price_asc">Giá thấp đến cao</a-select-option>
                                <a-select-option value="price_desc">Giá cao đến thấp</a-select-option>
                                <a-select-option value="date_desc">Mới nhất</a-select-option>
                                <a-select-option value="date_asc">Cũ nhất</a-select-option>
                                <a-select-option value="name_asc">Tên: A-Z</a-select-option>
                                <a-select-option value="name_desc">Tên: Z-A</a-select-option>
                            </a-select>
                        </a-space>
                    </div>
                </div>
                <div class="pc-content-list">
                    <a-spin :spinning="processing">
                        <a-icon slot="indicator" type="loading" style="font-size: 24px" spin />
                        <div class="product-list-content">
                            <template v-if="products.length">
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
                                        :current-page="query.page"
                                        :page-size="query.num"
                                        :total="total" />
                                </div>
                            </template>
                            <template v-else>
                                <a-empty style="min-height: 400px; display: flex; justify-content: center; align-items: center"></a-empty>
                            </template>
                        </div>
                    </a-spin>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions } from "vuex";
import Pagination from "../../BaseComponents/Pagination";

export default {
    name: "ProductCategory.vue",
    components: {
        Pagination
    },
    data() {
        return {
            processing: false,
            pageSizeOptions: ["18", "36"],
            products: [],
            category: "",
            priceSort: "",
            total: 0,
            query: {
                page: 1,
                num: 18,
                sortBy: ""
            }
        };
    },
    created() {
        const { slug } = this.$route.params;
        this.fetchCategory(slug, this.query);
    },
    methods: {
        ...mapActions("productCategories", ["getCategory"]),
        async fetchCategory(slug, query = {}) {
            try {
                this.processing = true;
                const response = await this.getCategory({ slug, query });
                this.products = _.get(response, "products", []);
                this.category = _.get(response, "category");
                this.currentPage = _.get(response, "pagination.currentPage", 1);
                this.total = _.get(response, "pagination.total", 0);
            } catch (e) {
                console.log(e.message);
            }
            this.processing = false;
        },
        async handleSizeChange(current, pageSize) {
            try {
                this.query.page = current;
                this.query.num = pageSize;
                await this.fetchCategory(this.category.slug, this.query);
            } catch (e) {
                console.log(e.message);
            }
        },
        async handlePageChange(page) {
            try {
                this.query.page = page;
                await this.fetchCategory(this.category.slug, this.query);
            } catch (e) {
                console.log(e.message);
            }
        }
    },
    watch: {
        priceSort: function (after, before) {
            this.query.sortBy = after;
            this.fetchCategory(this.category.slug, this.query);
        }
    }
};
</script>

<style scoped></style>
