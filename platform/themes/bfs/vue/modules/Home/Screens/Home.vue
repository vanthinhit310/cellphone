<template>
    <section class="home-wrapper">
        <div class="container">
            <a-row type="flex" justify="center">
                <a-col class="gutter-row" :span="16">
                    <Slides />
                </a-col>
                <a-col class="gutter-row" :span="8">
                    <BannerImage />
                </a-col>
            </a-row>
        </div>
    </section>
</template>

<script>
import Slides from "./Components/Slides";
import BannerImage from "./Components/BannerImage";

export default {
    components: {
        Slides,
        BannerImage,
    },
};
</script>

<style scoped></style>
