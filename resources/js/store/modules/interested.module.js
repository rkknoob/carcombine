import { InterestedService } from "@services/interested.service";
import { CREATE_INTERESTED } from "@store/actions.type";

const state = {

};

const getters = {

};

const actions = {
    async [CREATE_INTERESTED](context, payload) {
        const { data } = await InterestedService.post(payload);
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
