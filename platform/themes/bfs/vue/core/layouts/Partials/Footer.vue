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
                                    <div class="footer-link-content">
                                        <a class="footer--link">
                                            <span class="image"><img alt="icon" src="/themes/bfs/images/facebook.png" /></span>
                                            <span class="text">Facebook</span>
                                        </a>
                                        <a class="footer--link">
                                            <span class="image"><img alt="icon" src="/themes/bfs/images/zalo.png" /></span>
                                            <span class="text">Zalo</span>
                                        </a>
                                    </div>
                                </a-col>
                                <a-col :span="12" :lg="{ span: 6 }">
                                    <div class="footer-link-content">
                                        <a class="footer--link">
                                            <a-icon :rotate="90" type="phone" />
                                            <span class="text">0982650542</span>
                                        </a>
                                        <a class="footer--link">
                                            <a-icon type="mail" />
                                            <span class="text">buyfirststore@gmail.com</span>
                                        </a>
                                    </div>
                                </a-col>
                                <a-col :span="12" :lg="{ span: 6 }">
                                    <div class="footer-link-content">
                                        <a type="button" @click="showContactForm" class="footer--link">
                                            <span class="text">Gửi phản hồi</span>
                                        </a>
                                    </div>
                                </a-col>
                                <a-col :span="12" :lg="{ span: 6 }">
                                    <div class="footer-link-content">
                                        <a type="button" @click="showNewsletterForm" class="footer--link">
                                            <span class="text">Đăng ký nhận tin</span>
                                        </a>
                                    </div>
                                </a-col>
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
        <ContactForm @closeForm="handleCloseContactForm" :visible="contactVisible" />
        <NewsletterForm @closeForm="handleCloseNewsletterForm" :visible="newsletterVisible" />
    </section>
</template>

<script>
import { mapGetters } from "vuex";
import ContactForm from "@modules/BaseComponents/ContactForm";
import NewsletterForm from "@modules/BaseComponents/NewsletterForm";

export default {
    components: {
        ContactForm,
        NewsletterForm,
    },
    name: "Footer",
    data() {
        return {
            processing: true,
            contactVisible: false,
            newsletterVisible: false,
            list: []
        };
    },
    computed: {
        ...mapGetters({
            categories: "home/getCategories"
        })
    },
    methods: {
        showContactForm() {
            this.contactVisible = true;
        },
        handleCloseContactForm() {
            this.contactVisible = false;
        },
        showNewsletterForm() {
            this.newsletterVisible = true;
        },
        handleCloseNewsletterForm() {
            this.newsletterVisible = false;
        }
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
