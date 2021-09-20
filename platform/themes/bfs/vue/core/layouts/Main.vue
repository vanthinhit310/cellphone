<template>
    <section class="main-wrapper">
        <a-layout :style="{ background: '#fff' }">
            <a-layout-header :style="{ position: 'fixed', zIndex: 20, width: '100%' }">
                <Header />
            </a-layout-header>
            <a-layout-content :style="{ marginTop: '106px' }">
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

export default {
    components: {
        Header,
        Footer
    },
    mounted() {}
};
</script>

<style lang="scss" scoped></style>
