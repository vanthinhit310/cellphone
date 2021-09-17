<template>
    <section class="main h100">
        <router-view/>
    </section>
</template>

<script>
import {mapGetters, mapMutations} from 'vuex';

export default {
    computed: {
        ...mapGetters({
            loading: 'common/getLoadingState',
        }),
    },
    methods: {
        ...mapMutations({
            setLoadingState: 'common/setLoadingState',
        }),
    },
    mounted() {
    },
};
</script>

<style lang="scss" scoped></style>
