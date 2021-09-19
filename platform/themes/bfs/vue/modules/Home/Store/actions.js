import axios from "@core/configs/axiosConfig";

export default {
    async getHomeSlides() {
        return await axios.get("get-slides");
    },

    async getProductCategories() {
        return await axios.get("product-categories");
    },

    async getFeaturedProducts() {
        return await axios.get("feature-products");
    },

    async getSellingProducts() {
        return await axios.get("selling-products");
    },
};
