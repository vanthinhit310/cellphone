<template>
    <div class="pagination-wrapper">
        <a-pagination v-model="current" :showLessItems="true" :hideOnSinglePage="true" :page-size-options="sizeOptions" :total="total" show-size-changer :page-size="pageSize" @change="onPageChange" @showSizeChange="onSizeChange" />
    </div>
</template>

<script>
export default {
    props: {
        sizeOptions: Array,
        currentPage: Number,
        pageSize: Number,
        total: Number
    },
    name: "Pagination",
    data() {
        return {
            current: 1
        };
    },
    methods: {
        onSizeChange(current, pageSize) {
            this.$emit("onSizeChange", current, pageSize);
        },
        onPageChange(page) {
            this.$emit("onPageChange", page);
        }
    },
    watch: {
        currentPage() {
            this.current = this.currentPage;
        }
    }
};
</script>

<style scoped></style>
