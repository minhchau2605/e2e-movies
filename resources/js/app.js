require('./bootstrap');
window.Vue = require('vue');

import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);

Vue.component('list-movie', require('./movies/list_movie.vue').default);
Vue.component('update-movie', require('./movies/update_movie.vue').default);

const app = new Vue({
    el: '#app',
});
