<template>
    <div class="pagination">
        <a-pagination v-model="current" :page-size-options="sizeOptions" :total="total" show-size-changer :page-size="pageSize" @change="onPageChange" @showSizeChange="onSizeChange" />
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
