/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

import vuetify from './vuetify';
import CKEditor from 'ckeditor4-vue';


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('edit-question-bank', require('./components/Admin/EditQuestionBank.vue').default);

Vue.use(CKEditor); 

const app = new Vue({
    el: '#app',
    vuetify
});
