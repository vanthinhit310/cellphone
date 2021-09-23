import axios from "@core/configs/axiosConfig";

export default {
    async getProduct({commit, state, dispatch}, slug) {
        return await axios.get(`products/${slug}`);
    },
};
