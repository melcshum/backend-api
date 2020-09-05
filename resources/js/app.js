require('./bootstrap');

window.Vue = require('vue');

// import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
// //import {routes} from './routes';

// Vue.use(VueRouter);
Vue.use(VueAxios, axios);



Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('chart-component', require('./components/basic/ChartComponent.vue').default);


Vue.component('line-component', require('./components/basic/LineChartComponent.vue').default);
Vue.component('bubble-component', require('./components/basic/BubbleChartComponent.vue').default);
Vue.component('bar-component', require('./components/basic/BarChartComponent.vue').default);
Vue.component('pie-component', require('./components/basic/PieChartComponent.vue').default);
Vue.component('rader-component', require('./components/basic/RaderChartComponent.vue').default);


Vue.component('game-object-history-count', require('./components/ghostcoder/GameObjectHistoryCountComponent.vue').default);
Vue.component('session-difficulty', require('./components/ghostcoder/SessionDifficultyComponent.vue').default);

// Vue.component('bar-chart', require('./components/BarChart.vue').default);


// const router = new VueRouter({
//     mode: 'history',
// //    routes: routes
// });

const app = new Vue({
    el: '#app',
    // router: router,
    //    render: h => h(App),
});
