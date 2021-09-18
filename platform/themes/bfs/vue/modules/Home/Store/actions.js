import axios from "@core/configs/axiosConfig";

export default {
    async getHomeSlides({dispatch, state, commit}) {
        return await axios.get('get-slides');
    }
}
