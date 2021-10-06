import axios from "@core/configs/axiosConfig";
import qs from "qs";

export default {
    async getProduct({ commit, state, dispatch }, slug) {
        return await axios.get(`products/${slug}`);
    },
    async getRelatedProducts({ commit, state, dispatch }, categories, pageSize = 15) {
        return await axios.get(`products/relateds`, { params: { pageSize, categories } });
    },
    async getProductVariation({ commit, state, dispatch }, { id, attributes }) {
        return await axios.get(`products/variation/${id}`, {
            params: { attributes },
            paramsSerializer: params => {
                return qs.stringify(params);
            }
        });
    }
};
