import { ColorService } from "@services/color.service";
import { FETCH_COLORS } from "@store/actions.type";
import { SET_COLORS } from "@store/mutations.type";

const state = {
  colors: [],
};

const getters = {
    colors(state) {
        return state.colors;
    }
};

const actions = {
    async [FETCH_COLORS](context) {
        const { data } = await ColorService.get();
        context.commit(SET_COLORS, data);
        return data;
    }
};

const mutations = {
    [SET_COLORS](state, data) {
        state.colors = data;
    }
};

export default {
  state,
  getters,
  actions,
  mutations
};
