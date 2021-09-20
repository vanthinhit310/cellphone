<template>
    <section class="header-wrapper">
        <div class="top-header">
            <div class="container">
                <a-row type="flex" justify="space-between">
                    <a-col :xs="{ span: 24 }" :lg="{ span: 24 }">
                        <a-space :size="10">
                            <a href="javascript:void(0);">
                                <a-icon type="phone" />
                                0982650542
                            </a>
                            <a href="javascript:void(0);">
                                <a-icon type="mail" />
                                buyfirststore@gmail.com
                            </a>
                        </a-space>
                    </a-col>
                </a-row>
            </div>
        </div>
        <div class="bottom-header primary-bg">
            <div class="container">
                <div class="bottom-header-content">
                    <a-row type="flex" justify="space-between" align="middle">
                        <a-col :span="0" :offset="0" :lg="{ span: 3 }">
                            <div class="main-logo">
                                <a class="d-block" href="javascript:void(0);">
                                    <img alt="Logo" class="img-fluid" src="/themes/bfs/images/logo.png" />
                                </a>
                            </div>
                        </a-col>
                        <a-col :offset="0" :span="21" :lg="{ span: 18, offset: 1 }">
                            <div class="search-bar">
                                <a-input placeholder="Bạn muốn tìm gì?" class="w-100 custom-input-search"/>
                                <a-button class="button-search">
                                    <a-icon :style="{fontSize: '18px',color: '#fff'}" type="search" />
                                </a-button>
                            </div>
                        </a-col>
                        <a-col :offset="1" :span="2" :lg="{ span: 1 }">
                            <div class="cart-icon text-right">
                                <a class="d-flex justify-content-end" href="javascript:void(0);">
                                    <a-badge :count="0" show-zero>
                                        <a-icon
                                            :style="{
                                                fontSize: '22px',
                                                color: '#fff'
                                            }"
                                            type="shopping" />
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
        }
    }
};
</script>

<style scoped></style>
