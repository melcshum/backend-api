require('./bootstrap');
window.Vue = require('vue');

import App from './components/posts/App.vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
// import {
//     routes
// } from './routes';

import AllPosts from './components/posts/AllPosts.vue';
import AddPost from './components/posts/AddPost.vue';
import EditPost from './components/posts/EditPost.vue';

const routes = [
    {
        name: 'home',
        path: '/',
        component: AllPosts
    },
    {
        name: 'add',
        path: '/add',
        component: AddPost
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditPost
    },

  ];

Vue.use(VueRouter);
Vue.use(VueAxios, axios);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

// const app = new Vue({
//     el: '#app',
//     router: router,
//     render: h => h(App),
// });


const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');
