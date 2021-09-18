import axios from "@core/configs/axiosConfig";

export default {
    async getHomeSlides() {
        return await axios.get('get-slides');
    }
}
