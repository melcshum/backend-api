
require('./bootstrap');

window.Vue = require('vue');

// import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
// //import {routes} from './routes';

// Vue.use(VueRouter);
 Vue.use(VueAxios, axios);



Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('chart-component', require('./components/ChartComponent.vue').default);
Vue.component('bar-component', require('./components/Bar.vue').default);
Vue.component('bar-chart', require('./components/BarChart.vue').default);

// const router = new VueRouter({
//     mode: 'history',
// //    routes: routes
// });

const app = new Vue({
    el: '#app',
    // router: router,
    //    render: h => h(App),
});
