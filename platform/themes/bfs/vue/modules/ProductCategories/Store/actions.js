import axios from "@core/configs/axiosConfig";
export default {
    async getCategory({ commit, state, dispatch }, slug, query) {
        console.log(slug, query);
        return await axios.get(`product-categories/${slug}`, { params: query });
    }
};
