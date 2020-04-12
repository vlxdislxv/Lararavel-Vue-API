/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';

import PlacesIndex from './components/places/PlacesIndex.vue';
import PlacesCreate from './components/places/PlacesCreate.vue';
import PlacesEdit from './components/places/PlacesEdit.vue';

import Login from './components/auth/Login.vue';
import Register from './components/auth/Register.vue';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: PlacesIndex
        },
        {path: '/admin/places/create', component: PlacesCreate, name: 'createPlace'},
        {path: '/admin/places/edit/:id', component: PlacesEdit, name: 'editPlace'},
        {path: '/login', component: Login, name: 'login'},
        {path: '/register', component: Register, name: 'register'},
    ],
});

const app = new Vue({
    el: '#app',
    router,
});
