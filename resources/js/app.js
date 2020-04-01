/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';

window.Vue.use(VueRouter);

import PlacesIndex from './components/places/PlacesIndex.vue';
import PlacesCreate from './components/places/PlacesCreate.vue';
import PlacesEdit from './components/places/PlacesEdit.vue';

import Login from './components/auth/Login.vue';
import Register from './components/auth/Register.vue';

const routes = [
    {
        path: '/',
        components: {
            placesIndex: PlacesIndex
        }
    },
    {path: '/admin/places/create', component: PlacesCreate, name: 'createPlace'},
    {path: '/admin/places/edit/:id', component: PlacesEdit, name: 'editPlace'},
    {path: '/login', component: Login, name: 'login'},
    {path: '/register', component: Register, name: 'register'},
];

const router = new VueRouter({ routes });

const app = new Vue({ router }).$mount('#app');
