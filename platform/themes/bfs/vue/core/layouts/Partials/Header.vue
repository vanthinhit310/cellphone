<template>
    <section class="header-wrapper">
        <div class="top-header">
            <div class="container">
                <a-row type="flex" justify="space-between">
                    <a-col :xs="{ span: 14 }" :lg="{ span: 12 }">
                        <a-space :size="10">
                            <a href="javascript:void(0);">
                                <a-icon type="facebook" />
                                Facebook
                            </a>
                            <a href="javascript:void(0);">
                                <a-icon type="instagram" />
                                Instagram
                            </a>
                        </a-space>
                    </a-col>
                    <a-col
                        class="text-right"
                        :xs="{ span: 10 }"
                        :lg="{ span: 12 }"
                    >
                        <a-space>
                            <a href="javascript:void(0);">
                                <a-icon type="environment" />
                                Cửa hàng
                            </a>
                        </a-space>
                    </a-col>
                </a-row>
            </div>
        </div>
        <div class="bottom-header primary-bg">
            <div class="container">
                <div class="bottom-header-content">
                    <a-row type="flex" justify="space-between" align="bottom">
                        <a-col flex="140px">
                            <div class="main-logo">
                                <a class="d-block" href="javascript:void(0);">
                                    <img
                                        alt="Logo"
                                        class="img-fluid"
                                        src="/themes/bfs/images/logo.png"
                                    />
                                </a>
                            </div>
                        </a-col>
                        <a-col
                            :xs="{ span: 0, offset: 0 }"
                            :lg="{ span: 17, offset: 1 }"
                        >
                            <div class="search-bar">
                                <a-input-search
                                    size="large"
                                    placeholder="Bạn muốn tìm gì?"
                                    class="w-100"
                                    @search="onSearch"
                                />
                            </div>
                        </a-col>
                        <a-col
                            :xs="{ span: 11, offset: 1 }"
                            :lg="{ span: 1, offset: 1 }"
                        >
                            <div class="cart-icon text-right">
                                <a
                                    class="d-flex justify-content-end"
                                    href="javascript:void(0);"
                                >
                                    <a-badge :count="0" show-zero>
                                        <a-icon
                                            :style="{
                                                fontSize: '35px',
                                                color: '#fff',
                                            }"
                                            type="shopping"
                                        />
                                    </a-badge>
                                </a>
                            </div>
                        </a-col>
                    </a-row>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    methods: {
        onSearch(value) {
            console.log(value);
        },
    },
};
</script>

<style scoped></style>
