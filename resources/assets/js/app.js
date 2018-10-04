require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
import VeeValidate from 'vee-validate'
import Notifications from 'vue-notification'
import swal from 'sweetalert'
import Multiselect from 'vue-multiselect'
import store from './store/index'

import {Vuetable, VuetablePagination, VuetablePaginationDropDown, VuetablePaginationInfo} from 'vuetable-2'
//This is very important to used with the window object

window.Vue = require('vue');
// import routes from 'routes';
import {routes} from './routes.js'


Vue.component('adminnavbar', require('./components/main/AdminNavbar'))
Vue.component('my-vuetable', require('./components/vuetable/Vuetable'))
Vue.component('multiselect', Multiselect)
Vue.component('receipt-table', require('./components/receipt/table/Vuetable'))
Vue.component('editmodal', require('./components/modals/EditModal'))
Vue.component('print', require('./components/modals/Print'))
Vue.component('printview', require('./components/modals/PrintView'))

// Vue.component("vuetable", Vuetable)
// Vue.component("vuetable-pagination", VuetablePagination)
// Vue.component("vuetable-pagination-dropdown", VuetablePaginationDropDown)
// Vue.component("vuetable-pagination-info", VuetablePaginationInfo)

const router = new VueRouter({
    // mode: 'history',
    linkExactActiveClass: 'nav-active',
    routes
})


// const store = new Vuex.Store({
// 	StoreData,
// });


Vue.use(VueRouter)
Vue.use(Notifications)
Vue.use(VeeValidate)
const app = new Vue({
	store,
    router
}).$mount('#app')
