<template>
    <a-result status="404" title="404" sub-title="Xin lỗi, trang bạn đã truy cập không tồn tại.">
        <template #extra>
            <a-button type="primary" href="/"> Về trang chủ </a-button>
        </template>
    </a-result>
</template>

<script>
export default {
    name: "PageNotFound",
};
</script>

<style scoped></style>
