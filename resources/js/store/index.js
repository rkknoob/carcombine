import Vue from 'vue'
import Vuex from 'vuex'
import car        from './modules/car.module'
import brand      from './modules/brand.module'
import color      from './modules/color.module'
import contact    from './modules/contact.module'
import interested from './modules/interested.module'
import wishlist   from './modules/wishlist.module'

Vue.use(Vuex)

export default new Vuex.Store({
  modules: { car, brand, color, contact, interested, wishlist}
})
