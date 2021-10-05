<template>
    <section class="product-categories">
        <div class="container">
            <a-spin :spinning="subLoading">
                <a-icon slot="indicator" type="loading" style="font-size: 24px" spin />
                <div class="categories-content">
                    <template v-if="categories.length">
                        <div class="section-header">Danh mục</div>
                        <VueSlickCarousel v-bind="settings">
                            <div v-for="(item, index) in categories" :key="index" class="category-item">
                                <router-link :to="{ name: 'product-category', params: { slug: _.get(item, 'slug') } }">
                                    <span class="image">
                                        <img alt="Category" class="img-fluid" :src="_.get(item, 'image')" />
                                    </span>
                                    <span class="name">{{ _.get(item, "name") }}</span>
                                </router-link>
                            </div>
                        </VueSlickCarousel>
                    </template>
                    <template v-else>
                        <a-empty></a-empty>
                    </template>
                </div>
            </a-spin>
        </div>
    </section>
</template>

<script>
import { mapGetters } from "vuex";
import VueSlickCarousel from "vue-slick-carousel";
import "vue-slick-carousel/dist/vue-slick-carousel.css";
import "vue-slick-carousel/dist/vue-slick-carousel-theme.css";

export default {
    components: {
        VueSlickCarousel
    },
    name: "ProductCategories",
    data() {
        return {
            settings: {
                arrows: true,
                infinite: false,
                slidesToShow: 10,
                slidesToScroll: 10,
                speed: 500,
                rows: 2,
                slidesPerRow: 1,
                touchMove: true,
                draggable: false,
                responsive: [
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 8,
                            slidesToScroll: 8
                        }
                    },
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 8,
                            slidesToScroll: 8
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 6,
                            slidesToScroll: 6
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 4
                        }
                    },
                    {
                        breakpoint: 414,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3
                        }
                    }
                ]
            },
            error: ""
        };
    },
    computed: {
        ...mapGetters({
            categories: "home/getCategories",
            subLoading: "baseComponents/getSubLoading"
        })
    }
};
</script>

<style scoped></style>
