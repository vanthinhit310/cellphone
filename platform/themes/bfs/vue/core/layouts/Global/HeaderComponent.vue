<template>
    <div class="header">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                            <ol class="breadcrumb breadcrumb-links">
                                <li class="breadcrumb-item">
                                    <router-link :to="{name: 'dashboard'}">
                                        <i class="fas fa-home"></i>
                                    </router-link>
                                </li>
                                <li class="breadcrumb-item">
                                    <router-link :to="{name: 'dashboard'}">Dashboards</router-link>
                                </li>
                                <template v-if="breadcrums">
                                    <li v-for="(item, index) in breadcrums" :key="index" :class="`breadcrumb-item ${_.get(item, 'active') ? 'active' : ''}`" aria-current="page">{{ _.get(item, 'title') }}</li>
                                </template>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {mapGetters} from 'vuex';
export default {
    computed: {
        ...mapGetters({
            breadcrums: 'common/getBreadcrums',
        }),
    },
};
</script>

<style scoped></style>
