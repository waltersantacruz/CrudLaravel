require('./bootstrap');

window.Vue = require('vue').default;



Vue.component('tareas', require('./components/TareasComponent.vue').default);
Vue.component('home', require('./components/HomeComponent.vue').default);


const app = new Vue({
    el: '#app',
});
