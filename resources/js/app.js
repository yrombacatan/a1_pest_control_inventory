require('./bootstrap');

import Vue from 'vue';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import VueAxios from 'vue-axios';
import axios from 'axios';
//import QrcodeButton from './components/QrcodeButton.vue'
Vue.component('qrcode-button', require('./components/QrcodeButton.vue').default);

Vue.use(VueAxios, axios);
Vue.use(BootstrapVue);
Vue.use(IconsPlugin);

const app = new Vue({
    el: "#app",
})
