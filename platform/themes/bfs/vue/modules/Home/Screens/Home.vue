<template>
    <section class="home-wrapper">
        <TopSlide />
        <ProductCategories />
        <SellingProducts />
        <FeaturedProducts />
    </section>
</template>

<script>
import TopSlide from "./Components/TopSlide";
import ProductCategories from "./Components/ProductCategories";
import FeaturedProducts from "./Components/FeaturedProducts";
import SellingProducts from "./Components/SellingProducts";

export default {
    components: {
        TopSlide,
        ProductCategories,
        FeaturedProducts,
        SellingProducts
    }
};
</script>

<style scoped></style>
