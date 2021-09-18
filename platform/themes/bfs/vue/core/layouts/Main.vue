<template>
    <section class="main-wrapper">
        <a-layout :style="{ background: '#f5f5f5' }">
            <a-layout-header
                :style="{ position: 'fixed', zIndex: 20, width: '100%' }"
            >
                <Header />
            </a-layout-header>
            <a-layout-content :style="{ marginTop: '106px' }">
                <router-view />
            </a-layout-content>
            <!--            <a-layout-footer>-->
            <!--                Footer-->
            <!--            </a-layout-footer>-->
        </a-layout>
    </section>
</template>

<script>
import Header from "@core/layouts/Partials/Header";

export default {
    components: {
        Header,
    },
    mounted() {},
};
</script>

<style lang="scss" scoped></style>
