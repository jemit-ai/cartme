import './bootstrap';
import { createApp } from 'vue';

import router from "./frontend/router"; 
import { createPinia } from 'pinia';

import App from './components/App.vue';

const pinia = createPinia()

createApp(App).use(router).use(pinia).mount('#app');

