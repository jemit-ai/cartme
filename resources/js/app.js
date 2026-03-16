import './bootstrap';

import { createApp } from 'vue';
import { createPinia } from 'pinia';
import router from "./frontend/router"; 
import App from './components/App.vue';

const pinia = createPinia()

createApp(App).use(router)..mount('#app');

