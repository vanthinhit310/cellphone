<template>
    <a-spin :spinning="processing">
        <a-icon slot="indicator" type="loading" style="font-size: 24px" spin />
        <div class="banner-image">
            <a class="d-block" href="javascript:void(0);">
                <img v-if="_.get(siteSettings, 'theme--home_banner_1')" class="img-fluid" alt="Banner" :src="_.get(siteSettings, 'theme--home_banner_1')" />
                <a-empty v-else />
            </a>
            <a class="d-block" href="javascript:void(0);">
                <img v-if="_.get(siteSettings, 'theme--home_banner_2')" class="img-fluid" alt="Banner" :src="_.get(siteSettings, 'theme--home_banner_2')" />
                <a-empty v-else />
            </a>
        </div>
    </a-spin>
</template>

<script>
import { mapGetters } from "vuex";

export default {
    name: "BannerImage",
    data() {
        return {
            siteSettings: [],
            processing: true
        };
    },
    computed: {
        ...mapGetters({
            settings: "home/getSettings"
        })
    },
    watch: {
        settings() {
            this.siteSettings = this.settings;
            this.processing = false;
        }
    }
};
</script>

<style scoped></style>
