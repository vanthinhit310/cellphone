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
                                        <router-link class="d-flex" :to="{ name: 'product-category', params: { slug: _.get(item, 'slug') } }">
                                            {{ _.get(item, "name") }}
                                        </router-link>
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
                                <a-col :span="8" :lg="{ span: 6 }">
                                    <div class="footer-link-content">
                                        <transition name="fade" mode="out-in">
                                            <a target="_blank" v-if="_.get(siteSettings, 'theme--shop_facebook_link')" :href="_.get(siteSettings, 'theme--shop_facebook_link')" class="footer--link">
                                                <span class="image"><img alt="icon" src="/themes/bfs/images/facebook.png" /></span>
                                                <span class="text">Facebook</span>
                                            </a>
                                        </transition>
                                        <transition name="fade" mode="out-in">
                                            <a target="_blank" v-if="_.get(siteSettings, 'theme--shop_zalo_link')" :href="_.get(siteSettings, 'theme--shop_zalo_link')" class="footer--link">
                                                <span class="image"><img alt="icon" src="/themes/bfs/images/zalo.png" /></span>
                                                <span class="text">Zalo</span>
                                            </a>
                                        </transition>
                                    </div>
                                </a-col>
                                <a-col :span="16" :lg="{ span: 6 }">
                                    <div class="footer-link-content">
                                        <transition name="fade" mode="out-in">
                                            <a v-if="_.get(siteSettings, 'ecommerce_store_phone')" :href="`tel:${_.get(siteSettings, 'ecommerce_store_phone')}`" class="footer--link">
                                                <a-icon :rotate="90" type="phone" />
                                                <span class="text">{{ _.get(siteSettings, "ecommerce_store_phone") }}</span>
                                            </a>
                                        </transition>
                                        <transition name="fade" mode="out-in">
                                            <a v-if="_.get(siteSettings, 'theme--shop_email')" :href="`mailto:${_.get(siteSettings, 'theme--shop_email')}`" class="footer--link">
                                                <a-icon type="mail" />
                                                <span class="text">{{ _.get(siteSettings, "theme--shop_email") }}</span>
                                            </a>
                                        </transition>
                                    </div>
                                </a-col>
                                <a-col :span="8" :lg="{ span: 6 }">
                                    <div class="footer-link-content">
                                        <a type="button" @click="showContactForm" class="footer--link">
                                            <span class="text">Gửi phản hồi</span>
                                        </a>
                                    </div>
                                </a-col>
                                <a-col :span="16" :lg="{ span: 6 }">
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
                <transition name="fade" mode="out-in">
                    <p v-if="_.get(siteSettings, 'theme--copyright')">{{ _.get(siteSettings, "theme--copyright") }}</p>
                </transition>
            </div>
        </div>
        <ContactForm @closeForm="handleCloseContactForm" :visible="contactVisible" />
        <NewsletterForm @closeForm="handleCloseNewsletterForm" :visible="newsletterVisible" />
    </section>
</template>

<script>
import { mapActions, mapGetters, mapMutations } from "vuex";
import ContactForm from "@modules/BaseComponents/ContactForm";
import NewsletterForm from "@modules/BaseComponents/NewsletterForm";

export default {
    components: {
        ContactForm,
        NewsletterForm
    },
    name: "Footer",
    data() {
        return {
            processing: true,
            contactVisible: false,
            newsletterVisible: false,
            list: [],
            siteSettings: []
        };
    },
    computed: {
        ...mapGetters({
            categories: "home/getCategories",
            settings: "home/getSettings"
        })
    },
    methods: {
        ...mapActions("home", ["getProductCategories"]),
        ...mapMutations({
            setCategories: "home/setCategories"
        }),
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
        },
        settings() {
            this.siteSettings = this.settings;
        }
    }
};
</script>

<style scoped></style>
