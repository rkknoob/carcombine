import { BrandService } from "@services/brand.service";
import {
    FETCH_BRANDS,
    FETCH_BRANDS_SELECT,
    FETCH_BRAND_MODEL,
    FETCH_BRAND_YEAR ,
    FETCH_BRAND_GEAR,
    FETCH_BRANDSSS
} from "@store/actions.type";
import {
    SET_BRANDS,
    SET_BRANDS_SELECT,
    SET_BRAND_MODEL,
    SET_BRAND_YEAR,
    SET_BRAND_GEAR,
    SET_BRANDSS
} from "@store/mutations.type";

const state = {
    brands: [],
    brands_select : [],
    brand_model   : [],
    brand_year    : [],
    brand_gear    : [],
    brand_s: [],
};

const getters = {
    brands(state) {
        return state.brands;
    },
    brands_select(state) {
        return state.brands_select;
    },
    brand_model(state) {
        return state.brand_model;
    },
    brand_year(state) {
        return state.brand_year;
    },
    brand_gear(state) {
        return state.brand_gear;
    },
    brand_s(state) {
        return state.brand_s;
    }
};

const actions = {
    async [FETCH_BRANDS](context) {
        const { data } = await BrandService.get();
        context.commit(SET_BRANDS, data.data);
        return data;
    },
    async [FETCH_BRANDS_SELECT](context, payload) {
        const { data } = await BrandService.select();
        if(payload == "inventory") {
            data.unshift({brand: 'ทั้งหมด'});
        }
        context.commit(SET_BRANDS_SELECT, data);
        return data;
    },
    async [FETCH_BRAND_MODEL](context, payload) {
        const { data } = await BrandService.model(payload);
        context.commit(SET_BRAND_MODEL, data);
        return data;
    },
    async [FETCH_BRAND_YEAR](context, payload) {
        const { data } = await BrandService.year(payload);
        context.commit(SET_BRAND_YEAR, data);
        return data;
    },
    async [FETCH_BRAND_GEAR](context, payload) {
        const { data } = await BrandService.gear(payload);
        context.commit(SET_BRAND_GEAR, data);
        return data;
    },
    async [FETCH_BRANDSSS](context, payload) {
///ติดไว้ก่อน
        context.commit(SET_BRANDSS, payload);
    },


};

const mutations = {
    [SET_BRANDS](state, data) {
        state.brands = data;
    },
    [SET_BRANDS_SELECT](state, data) {
        state.brands_select = data;
    },
    [SET_BRAND_MODEL](state, data) {
        state.brand_model = data;
    },
    [SET_BRAND_YEAR](state, data) {
        let year = [];
        data.forEach(element => { element.CarYear ?  year.push(element.CarYear): null });
        state.brand_year = year;
    },
    [SET_BRAND_GEAR](state, data) {
        let gear = [];
        data.forEach(element => { element.CarGearID ?  gear.push(element.CarGearID): null });
        state.brand_gear = gear;
    },
    [SET_BRANDSS](state, data) {
        state.brand_s = data;
    },
};

export default {
    state,
    getters,
    actions,
    mutations
};
