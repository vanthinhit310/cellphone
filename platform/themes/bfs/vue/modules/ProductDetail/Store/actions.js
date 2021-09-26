import axios from "@core/configs/axiosConfig";

export default {
    async getProduct({ commit, state, dispatch }, slug) {
        return await axios.get(`products/${slug}`);
    },
    async getRelatedProducts({ commit, state, dispatch }, categories, pageSize = 15) {
        return await axios.get(`products/relateds`, { params: { pageSize, categories } });
    }
};
