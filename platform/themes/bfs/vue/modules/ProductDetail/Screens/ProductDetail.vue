<template>
    <section class="product-detail-wrapper">
        <div class="page-breadcrumb">
            <div class="container">
                <a-breadcrumb>
                    <a-breadcrumb-item><router-link :to="{ name: 'home' }">Home</router-link></a-breadcrumb-item>
                    <a-breadcrumb-item><a href="">Thiết bị điện tử</a></a-breadcrumb-item>
                    <a-breadcrumb-item>Combo Thùng máy tính chơi Game Ngon Nhất - I3 9100F - I3 10100 Ram 8GB Mainboard H310 nguyên bản</a-breadcrumb-item>
                </a-breadcrumb>
            </div>
        </div>

        <div class="product-info">
            <div class="container">
                <div class="info-content">
                    <a-row type="flex">
                        <a-col :flex="2">
                            <div class="product-imgs"></div>
                        </a-col>
                        <a-col :flex="3">
                            <div class="info-box"></div>
                        </a-col>
                    </a-row>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "ProductDetail"
};
</script>

<style scoped></style>
