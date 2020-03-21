
require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router'

Vue.use(VueRouter)

import {routes} from './routes'

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
//Vue.component('home', require('./components/admin/AdminHome.vue').default);
//Vue.component('admin-main', require('./components/admin/AdminMaster.vue').default);
import { Form, HasError, AlertError } from 'vform'

window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

const router = new VueRouter({
  routes, // short for `routes: routes`²
  mode: 'history'
});

const app = new Vue({
    el: '#app',
    router,
});
