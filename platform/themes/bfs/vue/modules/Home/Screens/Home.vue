<template>
    <section class="home-wrapper">
        <div class="container">
            <a-row :gutter="16">
                <a-col :span="16">
                    <Slides></Slides>
                </a-col>
                <a-col :span="8">
                    <BannerImage></BannerImage>
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
        Slides, BannerImage
    },
}
</script>

<style scoped>

</style>
