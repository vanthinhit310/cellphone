<template>
    <section class="footer-wrapper">
        <div class="container">
            <a-spin :spinning="processing">
                <a-icon slot="indicator" type="loading" style="font-size: 24px" spin />
                <div class="footer-content">
                    <div class="footer-catrgories">
                        <template v-if="list.length">
                            <div class="footer-categories-title">Danh Mục</div>
                            <div class="footer-categories-list">
                                <a-row :gutter="16">
                                    <a-col v-for="(item, index) in list" :key="index" :span="12" :lg="{ span: 6 }" :md="{ span: 8 }">
                                        <a class="d-flex" href="javascript:void(0);">{{ _.get(item, "name") }}</a>
                                    </a-col>
                                </a-row>
                            </div>
                        </template>
                        <template v-else>
                            <a-empty></a-empty>
                        </template>
                    </div>
                    <div class="footer-catrgories">
                        <div class="footer-categories-title">Liên hệ với chúng tôi</div>
                        <div class="footer-categories-list">
                            <a-row :gutter="16">
                                <a-col :span="12" :lg="{ span: 6 }">
                                    <a>Facebook</a>
                                    <a>Zalo</a>
                                </a-col>
                                <a-col :span="12" :lg="{ span: 6 }">
                                    <a>0982650542</a>
                                    <a>buyfirststore@gmail.com</a>
                                </a-col>
                                <a-col :span="12" :lg="{ span: 6 }"> <a>Gửi phản hồi</a> </a-col>
                                <a-col :span="12" :lg="{ span: 6 }"> <a>Đăng ký nhận tin</a> </a-col>
                            </a-row>
                        </div>
                    </div>
                </div>
            </a-spin>
        </div>
        <div class="copyright">
            <div class="container">
                <p>Buyfirstsotre ©2018 Created by Anonymous</p>
            </div>
        </div>
    </section>
</template>

<script>
import { mapGetters } from "vuex";

export default {
    name: "Footer",
    data() {
        return {
            processing: true,
            list: []
        };
    },
    computed: {
        ...mapGetters({
            categories: "home/getCategories"
        })
    },
    watch: {
        categories() {
            this.list = this.categories;
            this.processing = false;
        }
    }
};
</script>

<style scoped></style>
