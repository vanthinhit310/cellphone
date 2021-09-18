<template>
    <section class="header-wrapper">
        <div class="top-header">
            <div class="container">
                <a-row type="flex" justify="space-between">
                    <a-col :span="12">
                        <a-space :size="5">
                            <a-button type="link" size="small">
                                <a-icon type="facebook" />
                                Facebook
                            </a-button>
                            <a-button type="link" size="small">
                                <a-icon type="instagram" />
                                Instagram
                            </a-button>
                        </a-space>
                    </a-col>
                    <a-col class="text-right" :span="12">
                        <a-space :size="5">
                            <a-button type="link" size="small">
                                <a-icon type="environment" />
                                Tìm cửa hàng
                            </a-button>
                        </a-space>
                    </a-col>
                </a-row>
            </div>
        </div>
        <div class="bottom-header primary-bg">
            <div class="container">
                <div class="bottom-header-content">
                    <a-row>
                        <a-col
                            :xs="{ span: 5, offset: 1 }"
                            :lg="{ span: 3, offset: 1 }"
                        >
                            <div class="main-logo">
                                <a-button type="link" size="small">
                                    <img alt="Logo" src="logo_white.png" />
                                </a-button>
                            </div>
                        </a-col>
                        <a-col
                            :xs="{ span: 11, offset: 1 }"
                            :lg="{ span: 15, offset: 1 }"
                        >
                            <div class="search-bar"></div>
                        </a-col>
                        <a-col
                            :xs="{ span: 5, offset: 1 }"
                            :lg="{ span: 3, offset: 1 }"
                        >
                            <div class="cart-icon text-right">
                                <a-button type="link" size="small">
                                    <a-badge :count="0" show-zero>
                                        <a-icon
                                            :style="{
                                                fontSize: '25px',
                                                color: '#fff',
                                            }"
                                            type="shopping"
                                        />
                                    </a-badge>
                                </a-button>
                            </div>
                        </a-col>
                    </a-row>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {};
</script>

<style scoped></style>
