require('./bootstrap');

window.Vue = require('vue').default;


Vue.component('tareas', require('./components/TareaComponent.vue').default);


const app = new Vue({
    el: '#app',
});