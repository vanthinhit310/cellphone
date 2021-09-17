<template>
    <section class="global-layout h100">
        <loading :active.sync="loading" :width="40" :height="40" color="#5e72e4" :can-cancel="false" :is-full-page="true"></loading>
        <sidebar></sidebar>
        <div class="main-content h100" id="panel">
            <top-nav></top-nav>
            <header-component></header-component>
            <div class="container-fluid page-content">
                <slot></slot>
                <footer-component></footer-component>
            </div>
        </div>
    </section>
</template>

<script>
import Sidebar from './Sidebar';
import {mapGetters, mapActions} from 'vuex';
import TopNav from './TopNav';
import HeaderComponent from './HeaderComponent';
import FooterComponent from './FooterComponent';
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';

export default {
    components: {
        Sidebar,
        TopNav,
        HeaderComponent,
        FooterComponent,
        Loading,
    },
    computed: {
        ...mapGetters({
            loading: 'common/getLoadingState',
            configs: 'common/getConfigs',
        }),
    },
    async mounted() {
        try {
            const {configs} = this;
            if (configs instanceof Array && configs.length == 0) {
                await this.getConfigs();
            }
        } catch (err) {}
    },
    methods: {
        ...mapActions('common', ['getConfigs']),
    },
};
</script>

<style scoped></style>
