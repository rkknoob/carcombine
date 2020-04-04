import { WishlistService } from "@services/wishlist.service";
import { CREATE_WISHLIST } from "@store/actions.type";

const state = {

};

const getters = {

};

const actions = {
    async [CREATE_WISHLIST](context, payload) {
        const { data } = await WishlistService.post(payload);
        console.log(data)
        return data;
    },
};

const mutations = {

};

export default {
  state,
  getters,
  actions,
  mutations
};
