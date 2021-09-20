<template>
    <div class="newsletter-form">
        <a-modal
            title="Đăng ký nhận tin khuyến mãi?"
            :visible="visible"
            okText="Xác nhận"
            :width="500"
            centered
            cancelText="Hủy bỏ"
            :maskClosable="false"
            :confirm-loading="processing"
            @ok="handleOk"
            @cancel="handleCancel">
            <a-form ref="newsletterForm" id="newsletterform" :form="form">
                <a-form-item>
                    <a-input v-decorator="['email', { rules: [{ required: true, pattern: /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/, message: 'Email không hợp lệ!' }] }]" type="email" placeholder="Email">
                        <a-icon slot="prefix" type="mail" style="color: rgba(0, 0, 0, 0.25)" />
                    </a-input>
                </a-form-item>
            </a-form>
        </a-modal>
    </div>
</template>

<script>
import { mapActions } from "vuex";
export default {
    props: {
        visible: Boolean
    },
    beforeCreate() {
        this.form = this.$form.createForm(this, { name: "normal_newsletter" });
    },
    data() {
        return {
            processing: false
        };
    },
    name: "NewsletterForm",
    methods: {
        ...mapActions("home", ["subscribeNewsletter"]),
        handleCancel() {
            this.closeForm();
        },
        handleOk() {
            try {
                const form = this.$refs.newsletterForm.form;
                form.validateFields(async (err, values) => {
                    if (err) {
                        return;
                    }
                    this.processing = true;
                    const response = await this.subscribeNewsletter(values);
                    if (!response.error) {
                        this.$notification.success({
                            message: "System Notification",
                            description: response.message
                        });
                    }
                    this.processing = false;
                    this.closeForm();
                });
            } catch (e) {
                this.$notification.success({
                    message: "System Notification",
                    description: e.message
                });
                this.processing = false;
                this.closeForm();
            }
        },
        closeForm() {
            const form = this.$refs.newsletterForm.form;
            form.resetFields();
            this.$emit("closeForm");
        }
    }
};
</script>

<style scoped></style>
