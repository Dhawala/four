import routes from "./routes";
import VueRouter from 'vue-router'
import vSelect from 'vue-select'
//import 'vue-select/dist/vue-select.css';
import 'vue-search-select/dist/VueSearchSelect.css'
import 'vue2-datepicker/index.css';

window.Vue = require('vue').default;
window.axios = require('axios');
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.use(VueRouter);
const router = new VueRouter({
    routes: routes,
    mode: 'history',
});
//Vue.component('v-select', vSelect)
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('employee-component', require('./components/EmployeeComponent.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
export const bus = new Vue();

const app = new Vue({
    el: '#app',
    router: router
});
