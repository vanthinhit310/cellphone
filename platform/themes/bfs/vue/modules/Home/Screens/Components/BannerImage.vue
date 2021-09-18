<template>
    <div class="banner-image">
        <a-row :gutter="[16, 8]">
            <a-col class="gutter-row" :span="24">
                <a href="javascript:void(0);">
                    <img
                        class="img-fluid"
                        alt="Banner"
                        src="/themes/bfs/images/banner/banner1.jpg"
                    />
                </a>
            </a-col>
            <a-col class="gutter-row" :span="24">
                <a href="javascript:void(0);">
                    <img
                        class="img-fluid"
                        alt="Banner"
                        src="/themes/bfs/images/banner/banner2.jpg"
                    />
                </a>
            </a-col>
        </a-row>
    </div>
</template>

<script>
export default {
    name: "BannerImage",
};
</script>

<style scoped></style>
