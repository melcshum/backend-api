import AllPosts from './components/posts/AllPosts.vue';
import AddPost from './components/posts/AddPost.vue';
import EditPost from './components/posts/EditPost.vue';

export const routes = [
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
    }
];
