/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
import VueRouter from 'vue-router'
import VueSwal from 'vue-swal'

Vue.use(VueSwal)
Vue.use(VueRouter)
Vue.use(Vuetify)



Vue.config.productionTip = false


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('admin', require('./components/admin.vue').default);
Vue.component('dashboard', require('./components/admin/dashboard.vue').default);
import dashboard from './components/admin/dashboard';
import about from './components/admin/about';
import categories from "./components/admin/categories";
import editcategory from "./components/admin/editcategory";
import allusers from "./components/admin/users/allusers";
import addlaptop from './components/admin/products/addlaptop';
import guide from './components/admin/guide';
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });

const routes = [
    { path: '/admin/dashboard', component: dashboard },
    { path:'/admin/about', component: about },
    { path:'/admin/categories', component: categories },
    { path:'/admin/editcategory/:id', component: editcategory },
    { path:'/admin/allusers', component: allusers },
    { path:'/admin/addlaptop', component: addlaptop },
    { path:'/admin/guide', component: guide },
  ]

  const router = new VueRouter({
    routes 
  })

const app = new Vue({
    vuetify : new Vuetify(),
    router
  }).$mount('#app')

export default router;
