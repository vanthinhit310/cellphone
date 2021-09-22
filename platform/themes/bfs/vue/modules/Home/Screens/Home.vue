<template>
    <section class="home-wrapper">
        <TopSlide />
        <ProductCategories />
        <SellingProducts />
        <FeaturedProducts />
        <ProductList />
    </section>
</template>

<script>
import TopSlide from "./Components/TopSlide";
import ProductCategories from "./Components/ProductCategories";
import FeaturedProducts from "./Components/FeaturedProducts";
import SellingProducts from "./Components/SellingProducts";
import ProductList from "./Components/ProductList";

export default {
    components: {
        TopSlide,
        ProductCategories,
        FeaturedProducts,
        SellingProducts,
        ProductList
    }
};
</script>

<style scoped></style>
