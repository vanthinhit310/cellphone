import axios from "@core/configs/axiosConfig";

export default {
    async getHomeSlides({commit, state, dispatch}) {
        return await axios.get("get-slides");
    },

    async getProductCategories({commit, state, dispatch}) {
        return await axios.get("product-categories");
    },

    async getFeaturedProducts({commit, state, dispatch}) {
        return await axios.get("feature-products");
    },

    async getSellingProducts({commit, state, dispatch}, pageSize = 15) {
        return await axios.get("selling-products", {params: {pageSize}});
    },

    async getProducts({commit, state, dispatch}, {page, perPage}) {
        return await axios.get("products", {params: {page, perPage}});
    },

    async postContact({commit, state, dispatch}, payload) {
        return await axios.post("contact/send", payload);
    },

    async subscribeNewsletter({commit, state, dispatch}, payload) {
        return await axios.post("newsletter/subscribe", payload);
    },

    async getSettings({commit, state, dispatch}) {
        const response = await axios.get("settings/get");
        const settings = _.get(response, "settings");
        if (settings) {
            commit("setSettings", settings);
        }

        return response;
    }
};
