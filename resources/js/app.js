require('./bootstrap');

window.Vue = require('vue').default;


Vue.component('app', require('./components/App.vue').default);
Vue.component('consultarTareas', require('./components/TodasTareas.vue').default);
Vue.component('misTareas', require('./components/MisTareas.vue').default);


const app = new Vue({
    el: '#app',
});