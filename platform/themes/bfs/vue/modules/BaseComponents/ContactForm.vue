<template>
    <div class="contact-form">
        <a-modal
            title="Bạn cần hỗ trợ?"
            :visible="visible"
            okText="Gửi phản hồi"
            :width="700"
            centered
            cancelText="Hủy bỏ"
            :maskClosable="false"
            :confirm-loading="processing"
            @ok="handleOk"
            @cancel="handleCancel">
            <a-form ref="contactForm" id="contactform" :form="form">
                <a-form-item>
                    <a-input v-decorator="['name', { rules: [{ required: true, message: 'Vui lòng nhập tên của bạn!' }] }]" placeholder="Tên của bạn">
                        <a-icon slot="prefix" type="user" style="color: rgba(0, 0, 0, 0.25)" />
                    </a-input>
                </a-form-item>
                <a-form-item>
                    <a-input
                        v-decorator="[
                            'phone',
                            { rules: [{ required: true, pattern: /^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/, len: 10, message: 'Số điện thoại không hợp lệ!' }] }
                        ]"
                        placeholder="Số điện thoại">
                        <a-icon slot="prefix" type="phone" style="color: rgba(0, 0, 0, 0.25)" />
                    </a-input>
                </a-form-item>
                <a-form-item>
                    <a-input v-decorator="['email', { rules: [{ required: true, pattern: /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/, message: 'Email không hợp lệ!' }] }]" type="email" placeholder="Email">
                        <a-icon slot="prefix" type="mail" style="color: rgba(0, 0, 0, 0.25)" />
                    </a-input>
                </a-form-item>
                <a-form-item>
                    <a-input v-decorator="['content', { rules: [{ required: true, message: 'Vui lòng nhập nội dung phản hồi!' }] }]" type="textarea" placeholder="Nội dung" />
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
        this.form = this.$form.createForm(this, { name: "normal_contact" });
    },
    data() {
        return {
            processing: false
        };
    },
    name: "ContactForm",
    methods: {
        ...mapActions("home", ["postContact"]),
        handleCancel() {
            this.closeForm();
        },
        handleOk() {
            try {
                const form = this.$refs.contactForm.form;
                form.validateFields(async (err, values) => {
                    if (err) {
                        return;
                    }
                    this.processing = true;
                    const response = await this.postContact(values);
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
            const form = this.$refs.contactForm.form;
            form.resetFields();
            this.$emit("closeForm");
        }
    }
};
</script>

<style scoped></style>
