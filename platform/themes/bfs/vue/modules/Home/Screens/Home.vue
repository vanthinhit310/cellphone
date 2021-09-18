<template>
    <section class="home-wrapper">
        <div class="home-slide">
            <div class="container">
                <a-row type="flex" justify="center">
                    <a-col class="gutter-row" :lg="{span : 16}" :span="24">
                        <Slides />
                    </a-col>
                    <a-col class="gutter-row" :lg="{span: 8}" :span="24">
                        <BannerImage />
                    </a-col>
                </a-row>
            </div>
        </div>

        <ProductCategories />
    </section>
</template>

<script>
import Slides from "./Components/Slides";
import BannerImage from "./Components/BannerImage";
import ProductCategories from "./Components/ProductCategories";

export default {
    components: {
        Slides,
        BannerImage,
        ProductCategories
    }
};
</script>

<style scoped></style>
