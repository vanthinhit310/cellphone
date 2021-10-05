<template>
    <a-spin :spinning="subLoading">
        <a-icon slot="indicator" type="loading" style="font-size: 24px" spin />
        <div class="banner-image">
            <a class="d-block" href="javascript:void(0);">
                <img v-if="_.get(settings, 'theme--home_banner_1')" class="img-fluid" alt="Banner" :src="_.get(settings, 'theme--home_banner_1')" />
                <a-empty v-else />
            </a>
            <a class="d-block" href="javascript:void(0);">
                <img v-if="_.get(settings, 'theme--home_banner_2')" class="img-fluid" alt="Banner" :src="_.get(settings, 'theme--home_banner_2')" />
                <a-empty v-else />
            </a>
        </div>
    </a-spin>
</template>

<script>
import { mapGetters } from "vuex";

export default {
    name: "BannerImage",
    computed: {
        ...mapGetters({
            settings: "home/getSettings",
            subLoading: "baseComponents/getSubLoading"
        })
    }
};
</script>

<style scoped></style>
