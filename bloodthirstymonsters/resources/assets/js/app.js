
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Blah doesn't seem to be working below.  <router-link> & <router-view> remain unknown custom components.

// window.Vue = require('vue');
// window.VueRouter = require('vue-router');

// This approach does however.

import Vue from 'vue';
import VueRouter from 'vue-router';
import VueParallaxJs from 'vue-parallax-js';
import axios from 'axios';
// window.axios = require('axios');
// window.axios.defaults.headers.common = {
//     'X-Requested-With': 'XMLHttpRequest'
// };
// import Bootstrap from 'bootstrap-sass';
// Vue.use(axios);
// Vue.use(Bootstrap);
Vue.use(VueRouter);
Vue.use(VueParallaxJs, {
    className: 'movement-parallax'
});

import router from './routes';
// import upload from './file-upload.service';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

// Following the same pattern as the example above,
// here are the main components to be created and pulled into this application.

Vue.component('navbar', require('./components/Navbar.vue'));
Vue.component('footerbar', require('./components/Footer.vue'));
Vue.component('parallax', require('./components/Parallax.vue'));
Vue.component('monsters', require('./components/Monsters.vue'));
Vue.component('NewMonster', require('./components/NewMonster.vue'));
Vue.component('MonsterSolo', require('./components/MonsterSolo.vue'));
Vue.component('coming-soon', require('./components/ComingSoon.vue'));


// put this before creating your App instance in main.js
Vue.filter('reverse', function (array) {
    return array.reverse()
});

Vue.filter('reversed', function (value) {
    return value.reverse()
});

const app = new Vue({
    el: '#app',

    router,
    // upload


    data() {
        return {
            data: {
                name: '',
                description: '',
                aggression_level: ''
            }
            // config: {
            //     data: []
            // }
        }
    },

    // created() {
    //     axios.get('api/monsters').then( response => {
    //         console.log(response);
    //     }).catch(error => console.log(error));
    // }
});
