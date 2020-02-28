require('./bootstrap');
window.Vue = require('vue');

Vue.component('edit-movie', require('./movies/edit_movie.vue').default);

const app = new Vue({
    el: '#app',
});
