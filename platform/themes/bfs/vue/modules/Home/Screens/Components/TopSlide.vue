<template>
    <div class="home-slide">
        <div class="container">
            <a-row type="flex" justify="center">
                <a-col class="gutter-row" :lg="{ span: 16 }" :span="24">
                    <Slides />
                </a-col>
                <a-col class="gutter-row" :lg="{ span: 8 }" :span="24">
                    <BannerImage />
                </a-col>
            </a-row>
        </div>
    </div>
</template>

<script>
import Slides from "./Slides";
import BannerImage from "./BannerImage";
export default {
    name: "TopSlide",
    components: {
        BannerImage,
        Slides
    }
};
</script>

<style scoped></style>
