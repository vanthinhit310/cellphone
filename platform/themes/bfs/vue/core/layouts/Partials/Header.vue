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
                                    <a v-if="_.get(siteSettings, 'theme--logo')" class="d-block" href="/">
                                        <img alt="Logo" class="img-fluid" :src="_.get(siteSettings, 'theme--logo')" />
                                    </a>
                                </transition>
                            </div>
                        </a-col>
                        <a-col :offset="0" :span="21" :lg="{ span: 18, offset: 1 }">
                            <div class="search-bar">
                                <a-input placeholder="Bạn muốn tìm gì?" class="w-100 custom-input-search" />
                                <a-button class="button-search">
                                    <a-icon :style="{ fontSize: '18px', color: '#fff' }" type="search" />
                                </a-button>
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
import { mapGetters } from "vuex";
export default {
    data() {
        return {
            siteSettings: []
        };
    },
    computed: {
        ...mapGetters({
            settings: "home/getSettings"
        })
    },
    methods: {
        onSearch(value) {
            console.log(value);
        }
    },
    watch: {
        settings() {
            this.siteSettings = this.settings;
        }
    }
};
</script>

<style scoped></style>
