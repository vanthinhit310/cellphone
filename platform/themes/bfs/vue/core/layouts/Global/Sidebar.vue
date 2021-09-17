<template>
    <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header d-flex align-items-center">
                <router-link :class="'navbar-brand'" :to="{name: 'dashboard'}">
                    <img src="/themes/pms/img//brand/blue.png" class="navbar-brand-img" alt="..." />
                </router-link>
                <div class="ml-auto">
                    <!-- Sidenav toggler -->
                    <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <ul class="navbar-nav">
                        <li class="nav-item" v-for="(item, index) in menu" :key="index">
                            <template v-if="!_.get(item, 'hasChildren')">
                                <router-link class="nav-link" :to="_.get(item, 'to')">
                                    <i v-if="_.get(item, 'icon')" :class="_.get(item, 'icon')"></i>
                                    <span class="nav-link-text">{{ _.get(item, 'title') }}</span>
                                </router-link>
                            </template>

                            <template v-else>
                                <a class="nav-link" :href="`#navbar-${_.snakeCase(_.get(item, 'title'))}`" data-toggle="collapse" role="button" aria-expanded="false" :aria-controls="`navbar-${_.snakeCase(_.get(item, 'title'))}`">
                                    <i v-if="_.get(item, 'icon')" :class="_.get(item, 'icon')"></i>
                                    <span class="nav-link-text">{{ _.get(item, 'title') }}</span>
                                </a>
                                <div class="collapse" :id="`navbar-${_.snakeCase(_.get(item, 'title'))}`" data-parent="#sidenav-collapse-main">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item" v-for="(sub, i) in _.get(item, 'childrens')" :key="i">
                                            <router-link :to="_.get(sub, 'to')" class="nav-link">{{ _.get(sub, 'title') }}</router-link>
                                        </li>
                                    </ul>
                                </div>
                            </template>
                        </li>
                    </ul>
                    <!-- Divider -->
                    <hr class="my-3" />
                    <!-- Heading -->
                    <h6 class="navbar-heading p-0 text-muted">Documentation</h6>
                    <!-- Navigation -->
                    <ul class="navbar-nav mb-md-3">
                        <li class="nav-item">
                            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html" target="_blank">
                                <i class="ni ni-spaceship"></i>
                                <span class="nav-link-text">Getting started</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html" target="_blank">
                                <i class="ni ni-palette"></i>
                                <span class="nav-link-text">Foundation</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/components/alerts.html" target="_blank">
                                <i class="ni ni-ui-04"></i>
                                <span class="nav-link-text">Components</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/plugins/charts.html" target="_blank">
                                <i class="ni ni-chart-pie-35"></i>
                                <span class="nav-link-text">Plugins</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
import {mapGetters} from 'vuex';
export default {
    computed: {
        ...mapGetters({
            menu: 'common/getMenu',
        }),
    },
    mounted() {
        $('.scrollbar-inner').scrollbar().scrollLock();
    },
};
</script>

<style scoped></style>
