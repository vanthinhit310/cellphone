import axios from "@core/configs/axiosConfig";

export default {
    async getHomeSlides({ commit, state, dispatch }) {
        return await axios.get("get-slides");
    },

    async getProductCategories({ commit, state, dispatch }) {
        return await axios.get("product-categories");
    },

    async getFeaturedProducts({ commit, state, dispatch }) {
        return await axios.get("feature-products");
    },

    async getSellingProducts({ commit, state, dispatch }) {
        return await axios.get("selling-products");
    },

    async getProducts({ commit, state, dispatch }, { page, perPage }) {
        return await axios.get("products", { params: { page, perPage } });
    }
};
