<template>
    <section class="main-wrapper">
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
import { mapActions } from "vuex";

export default {
    components: {
        Header,
        Footer
    },
    created() {
        this.getSettings();
    },
    methods: {
        ...mapActions("home", ["getSettings"])
    }
};
</script>

<style lang="scss" scoped></style>
