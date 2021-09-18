<template>
    <div class="home-slide">
        <a-spin :spinning="processing">
            <a-icon slot="indicator" type="loading" style="font-size: 24px" spin/>
            <template v-if="slides.length">
                <VueSlickCarousel :autoplaySpeed="4000" :speed="800" :autoplay="true" :touchMove="false" :draggable="false" :arrows="true" :dots="true">
                    <div v-for="(item, index) in slides" :key="index" class="slide-item">
                        <a class="d-block" :href="_.get(item, 'link', 'javascript:void(0);')">
                            <img class="img-fluid w-100 d-block" alt="Slide" :src="_.get(item, 'image', '')">
                        </a>
                    </div>
                </VueSlickCarousel>
            </template>
            <template v-else>
                <a-empty/>
            </template>
        </a-spin>
    </div>
</template>

<script>
import VueSlickCarousel from 'vue-slick-carousel'
import 'vue-slick-carousel/dist/vue-slick-carousel.css';
import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css';
import {mapActions} from "vuex";

export default {
    components: {
        VueSlickCarousel ,
    },
    data() {
        return {
            processing: false,
            slides: [],
            error: "",
        };
    },
    mounted() {
        this.fetchSlides();
    },
    methods: {
        ...mapActions("home", ["getHomeSlides"]),
        async fetchSlides() {
            let self = this;
            try {
                self.processing = true;
                const response = await self.getHomeSlides();
                const slides = _.get(response, "slides", []);
                if (!!slides) {
                    this.slides = slides;
                }
            } catch (e) {
                console.log(e.message);
            }
            self.processing = false;
        },
    },
};
</script>

<style scoped></style>
