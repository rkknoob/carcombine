import { ContactService } from "@services/contact.service";
import { CREATE_CONTACT   } from "@store/actions.type";

const state = {

};

const getters = {

};

const actions = {
    async [CREATE_CONTACT](context, payload) {
        const { data } = await ContactService.post(payload);
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
