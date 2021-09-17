<template>
    <div>
        <loading :active.sync="loading" :width="50" :height="50" color="#5e72e4" :can-cancel="false" :is-full-page="true"></loading>
        <div class="main-content">
            <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9"></div>
            <div class="container mt--8 pb-5">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>

import {mapGetters} from 'vuex';
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';

export default {
    components: {
        Loading,
    },
    data() {
        return {};
    },
    computed: {
        ...mapGetters({
            loading: 'common/getLoadingState',
        }),
    },
};
</script>

<style lang="scss" scoped></style>
