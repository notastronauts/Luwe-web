/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

// Your web app's Firebase configuration
var firebaseConfig = {
    apiKey: "AIzaSyCWXFhoma76GlKNCWngDxerz_ClIIsQCWA",
    authDomain: "luwe-776cb.firebaseapp.com",
    databaseURL: "https://luwe-776cb.firebaseio.com",
    projectId: "luwe-776cb",
    storageBucket: "luwe-776cb.appspot.com",
    messagingSenderId: "447620098795",
    appId: "1:447620098795:web:ccac505a2a7074f3fcacae",
    measurementId: "G-2TF7E1KXXL"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);
firebase.analytics();
