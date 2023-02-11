import './bootstrap';
import * as Vue from 'vue';
import App from './App.vue';
import router from './router/index';
import axios from 'axios';
import VueAxios from 'vue-axios';

const app = Vue.createApp(App)
                .use(router)
                .use(VueAxios, axios)
                .mount("#app")

