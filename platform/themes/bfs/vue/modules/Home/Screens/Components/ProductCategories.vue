<template>
    <section class="product-categories">
        <div class="container">
            <a-spin :spinning="processing">
                <a-icon slot="indicator" type="loading" style="font-size: 24px" spin />
                <div class="categories-content">
                    <template v-if="categories.length">
                        <div class="section-header">Danh mục</div>
                        <VueSlickCarousel v-bind="settings">
                            <div v-for="(item, index) in categories" :key="index" class="category-item">
                                <a href="javascript:void(0);">
                                    <span class="image">
                                        <img alt="Category" class="img-fluid" :src="_.get(item, 'image')" />
                                    </span>
                                    <span class="name">{{ _.get(item, "name") }}</span>
                                </a>
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
import { mapActions } from "vuex";
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
                            slidesToScroll: 8,
                        }
                    },
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 8,
                            slidesToScroll: 8,
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 6,
                            slidesToScroll: 6,
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 4,
                        }
                    },
                    {
                        breakpoint: 414,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                        }
                    },
                ]
            },
            categories: [],
            processing: false,
            error: ""
        };
    },
    mounted() {
        this.fetchProductCategories();
    },
    methods: {
        ...mapActions("home", ["getProductCategories"]),
        async fetchProductCategories() {
            try {
                this.processing = true;
                const response = await this.getProductCategories();
                const categories = _.get(response, "categories", []);
                if (!!categories) {
                    this.categories = categories;
                }
            } catch (e) {
                console.log(e.message);
            }
            this.processing = false;
        }
    }
};
</script>

<style scoped></style>
