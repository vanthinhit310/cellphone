<template>
    <section class="main-wrapper">
        <loading :active.sync="isLoading" loader="dots" :opacity="1" :width="40" :height="40" :z-index="100" color="#ee4d2d" :is-full-page="true"></loading>
        <a-layout :style="{ background: '#fff' }">
            <a-layout-header :style="{ position: 'fixed', zIndex: 15, width: '100%' }">
                <Header />
            </a-layout-header>
            <a-layout-content :style="{ marginTop: '108.16px' }">
                <router-view />
            </a-layout-content>
            <a-layout-footer>
                <Footer />
            </a-layout-footer>
        </a-layout>
        <a-back-top />
    </section>
</template>

<script>
import Header from "@core/layouts/Partials/Header";
import Footer from "@core/layouts/Partials/Footer";
import { mapActions, mapGetters, mapMutations } from "vuex";
import Loading from "vue-loading-overlay";
import "vue-loading-overlay/dist/vue-loading.css";

export default {
    components: {
        Header,
        Footer,
        Loading
    },
    computed: {
        ...mapGetters({
            isLoading: "baseComponents/getLoadingState"
        })
    },
    created() {
        this.getSettings();
        this.fetchProductCategories();
    },
    methods: {
        ...mapActions("home", ["getSettings"]),
        ...mapActions("home", ["getProductCategories"]),
        ...mapActions("baseComponents", ["setSubLoading"]),
        ...mapMutations({
            setCategories: "home/setCategories"
        }),
        async fetchProductCategories() {
            try {
                this.setSubLoading(true);
                const response = await this.getProductCategories();
                const categories = _.get(response, "categories", []);
                if (!!categories) {
                    this.setCategories(categories);
                }
            } catch (e) {
                console.log(e.message);
            }
            this.setSubLoading(false);
        }
    }
};
</script>

<style lang="scss" scoped></style>
