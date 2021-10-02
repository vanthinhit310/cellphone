<template>
    <div class="product-category-wrapper">
        <div class="container">
            <div class="pc-content">
                <div class="pc-content-header">
                    <div class="left">
                        <a-space>
                            Sắp xếp theo
                            <a-button>Phổ biến</a-button>
                            <a-button>Mới nhất</a-button>
                            <a-button>Bán chạy</a-button>
                            <a-select v-model="priceSort" style="width: 160px">
                                <a-select-option value="">Giá</a-select-option>
                                <a-select-option value="asc">Giá thấp đến cao</a-select-option>
                                <a-select-option value="desc">Giá cao đến thấp</a-select-option>
                            </a-select>
                        </a-space>
                    </div>
                    <div class="right">
                        <a-pagination simple :default-current="currentPage" :total="total" />
                    </div>
                </div>
                <div class="pc-content-list"></div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ProductCategory.vue",
    data() {
        return {
            priceSort: "",
            currentPage: 1,
            total: 0
        };
    }
};
</script>

<style scoped></style>
