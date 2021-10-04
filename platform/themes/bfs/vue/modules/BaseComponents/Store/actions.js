import axios from "@core/configs/axiosConfig";
export default {
    setLoadingState({ commit, state, dispatch }, status) {
        commit("setLoadingState", status);
    },
    async searchProduct({ commit, state, dispatch }, q) {
        return await axios.get("products/search", { params: { q } });
    }
};
