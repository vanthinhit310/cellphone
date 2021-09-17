<template>
    <section class="main-wrapper">
        <a-layout>
            <a-layout-header>
                <Header/>
            </a-layout-header>
            <a-layout-content>
                <router-view />
            </a-layout-content>
            <a-layout-footer>
                Footer
            </a-layout-footer>
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
