/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Stepper from 'bs-stepper';

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

var stepperForm;

document.addEventListener('DOMContentLoaded', function () {
    var stepperFormEl = document.querySelector('#stepperForm');
    stepperForm = new Stepper(stepperFormEl, {
        animation: true
    })

    var btnNextList = [].slice.call(document.querySelectorAll('.btn-next-form'))
    var btnPrev = [].slice.call(document.querySelectorAll('.btn-previous-form'))
    var stepperPanList = [].slice.call(document.querySelectorAll('.bs-stepper-pane'))
    var first_name = document.getElementById('first_name')
    var last_name = document.getElementById('last_name')
    var email = document.getElementById('email')
    var phone_number = document.getElementById('phone_number')
    var password = document.getElementById('password')
    var password_confirmation = document.getElementById('password_confirmation')

    var form = stepperFormEl.querySelector('.bs-stepper-content form')

    btnNextList.forEach(function (btn) {
        btn.addEventListener('click', function () {
            stepperForm.next()
        })
    })

    btnPrev.forEach(function (btn) {
        btn.addEventListener('click', function () {
            stepperForm.previous()
        })
    })

    stepperFormEl.addEventListener('show.bs-stepper', function (event) {
        form.classList.remove('was-validated')
        var nextStep = event.detail.indexStep
        var currentStep = nextStep

        if (currentStep > 0) {
            currentStep--
        }

        var stepperPan = stepperPanList[currentStep]

        if ((stepperPan.getAttribute('id') === 'test-form-1' && !first_name.value.length)
            || (stepperPan.getAttribute('id') === 'test-form-1' && !last_name.value.length)
            || (stepperPan.getAttribute('id') === 'test-form-1' && !email.value.length)
            || (stepperPan.getAttribute('id') === 'test-form-1' && !phone_number.value.length)
            || (stepperPan.getAttribute('id') === 'test-form-1' && !password.value.length)
            || (stepperPan.getAttribute('id') === 'test-form-1' && !password_confirmation.value.length)) {
            event.preventDefault()
            form.classList.add('was-validated')
        }
    })
})