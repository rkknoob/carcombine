import { CarService } from "@services/car.service";
import { FETCH_CARS, FETCH_CAR, SEARCH_CARS, RANDOM_CARS,FOAMCARS } from "@store/actions.type";
import { SET_CARS, SET_CAR, SET_CAR_IMAGES,SET_FORMCARS } from "@store/mutations.type";

const state = {
    cars       : [],
    car        : [],
    car_images : [],
    cars_form : {},
};

const getters = {
    cars(state) {
        console.log(state.cars);
        return state.cars;
    },
    car(state) {
        return state.car;
    },
    car_images(state) {
        return state.car_images;
    },
    cars_form(state) {
        return state.cars_form;
    },
};

const actions = {
    async [FETCH_CARS](context, payload) {

        const { data } = await CarService.get(payload);
        context.commit(SET_CARS, data.data);

        return data;
    },
    async [FETCH_CAR](context, payload) {

        const { data } = await CarService.show(payload);

        context.commit(SET_CAR, data.detail);
        context.commit(SET_CAR_IMAGES, data.images);
        return data;
    },
    async [SEARCH_CARS](context, payload) {

        const { data } = await CarService.search(payload);  ///service ต่อไปหลังบ้าน
        console.log(data);
        context.commit(SET_CARS, data.data);



        return data;
    },
    async [RANDOM_CARS]({ commit }) {
        const { data } = await CarService.random();

        commit(SET_CARS, data.data);
        return data;
    },

    async [FOAMCARS](context, payload) {
///ติดไว้ก่อน

        context.commit(SET_FORMCARS, payload);
    },

};

const mutations = {
    [SET_CARS](state, data) {

        state.cars = data;

    },
    [SET_CAR](state, data) {
        state.car = data;
    },
    [SET_CAR_IMAGES](state, data) {
        state.car_images = data;
    },
    [SET_FORMCARS](state, data) {
        state.cars_form = data;
    },
};

export default {
    state,
    getters,
    actions,
    mutations
};
