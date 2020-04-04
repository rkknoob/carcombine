require('./bootstrap');

import Vue from 'vue';
import Vuetify from 'vuetify';
import router from './routes.js';
import Carousel3d from 'vue-carousel-3d';
import store from '@store';
import Vuelidate from 'vuelidate';
import VueSweetalert2 from 'vue-sweetalert2';
import ApiService from "@services/api.service";
import ErrorFilter from "@filters/error.filter";
import date_thai from "@filters/date_thai.filter";
import numeral from 'numeral';
import numFormat from 'vue-filter-number-format';

Vue.use(Vuetify);
Vue.use(Carousel3d);
Vue.use(Vuelidate);
Vue.use(VueSweetalert2);

Vue.filter('numFormat', numFormat(numeral));
Vue.filter("error", ErrorFilter);
Vue.filter("date_thai", date_thai);

ApiService.init();

Vue.component('app-component', require('./App.vue').default);

const app = new Vue({
    el: '#app',
    router,
    store,
    vuetify: new Vuetify({icons: { iconfont: 'md' } }),
});

