<template>
    <section class="header-wrapper">
        <div class="top-header">
            <div class="container">
                <a-row type="flex" justify="space-between">
                    <a-col :xs="{ span: 24 }" :lg="{ span: 24 }">
                        <a-space :size="10">
                            <transition name="fade" mode="out-in">
                                <a v-if="_.get(siteSettings, 'ecommerce_store_phone')" :href="`tel:${_.get(siteSettings, 'ecommerce_store_phone')}`">
                                    <a-icon type="phone" />
                                    {{ _.get(siteSettings, "ecommerce_store_phone") }}
                                </a>
                            </transition>
                            <transition name="fade" mode="out-in">
                                <a v-if="_.get(siteSettings, 'theme--shop_map')" target="_blank" :href="_.get(siteSettings, 'theme--shop_map')">
                                    <a-icon type="environment" />
                                    Vị trí shop
                                </a>
                            </transition>
                        </a-space>
                    </a-col>
                </a-row>
            </div>
        </div>
        <div class="bottom-header primary-bg">
            <div class="container">
                <div class="bottom-header-content">
                    <a-row type="flex" justify="space-between" align="middle">
                        <a-col :span="0" :offset="0" :lg="{ span: 3 }">
                            <div class="main-logo">
                                <transition name="fade" mode="out-in">
                                    <router-link v-if="_.get(siteSettings, 'theme--logo')" class="d-block" :to="{ name: 'home' }">
                                        <img alt="Logo" class="img-fluid" :src="_.get(siteSettings, 'theme--logo')" />
                                    </router-link>
                                </transition>
                            </div>
                        </a-col>
                        <a-col :offset="0" :span="21" :lg="{ span: 18, offset: 1 }">
                            <div class="search-bar">
                                <a-input v-model="q" placeholder="Bạn muốn tìm gì?" class="w-100 custom-input-search" />
                                <a-button class="button-search">
                                    <a-icon v-if="processing" :style="{ fontSize: '18px', color: '#fff' }" type="loading" />
                                    <a-icon v-else :style="{ fontSize: '18px', color: '#fff' }" type="search" />
                                </a-button>

                                <a-list v-show="active" class="search-list" bordered :data-source="products">
                                    <a-list-item @click="hideList()" :key="index" slot="renderItem" slot-scope="item, index">
                                        <router-link class="d-flex search-item" :to="{ name: 'product-detail', params: { slug: _.get(item, 'slug') } }">
                                            <span class="left">
                                                <span class="search-item-avatar">
                                                    <img class="img-fluid" :src="_.get(item, 'image')" alt="Product" />
                                                </span>
                                            </span>
                                            <span class="right">
                                                <span class="search-title">{{ _.get(item, "name") }}</span>
                                                <span class="search-price">{{ _.get(item, "price_formated") }}</span>
                                            </span>
                                        </router-link>
                                    </a-list-item>
                                </a-list>
                            </div>
                        </a-col>
                        <a-col :offset="1" :span="2" :lg="{ span: 1 }">
                            <div class="cart-icon text-right">
                                <a class="d-flex justify-content-end" href="javascript:void(0);">
                                    <a-badge :count="0" show-zero>
                                        <a-icon
                                            :style="{
                                                fontSize: '22px',
                                                color: '#fff'
                                            }"
                                            type="shopping" />
                                    </a-badge>
                                </a>
                            </div>
                        </a-col>
                    </a-row>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import { mapActions, mapGetters } from "vuex";

export default {
    data() {
        return {
            siteSettings: [],
            processing: false,
            q: "",
            products: [],
            active: false
        };
    },
    computed: {
        ...mapGetters({
            settings: "home/getSettings"
        })
    },
    methods: {
        ...mapActions("baseComponents", ["searchProduct"]),
        onSearch(value) {
            console.log(value);
        },
        async handleSearchProduct(q) {
            try {
                this.processing = true;
                const response = await this.searchProduct(q);
                const products = _.get(response, "products");
                if (products) {
                    this.products = products;
                }
                this.showList();
            } catch (e) {
                console.log(e.message);
            }
            this.processing = false;
        },
        hideList() {
            this.active = false;
            this.q = "";
        },
        showList() {
            this.active = true;
        }
    },
    watch: {
        settings() {
            this.siteSettings = this.settings;
        },
        q: _.debounce(function (after, before) {
            if (this.q) {
                this.handleSearchProduct(after);
            } else {
                this.hideList();
            }
        }, 400)
    }
};
</script>

<style scoped></style>
