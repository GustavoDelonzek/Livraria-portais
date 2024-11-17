import './assets/index.css'
import 'flowbite';

import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store/index.ts'
import initFlowbite from '@/services/initFlowbite';
import Toast from "vue-toastification";
// Import the CSS or use your own!
import "vue-toastification/dist/index.css";


const app = createApp(App)
app.use(initFlowbite);

app.use(Toast);
app.use(router)
app.use(store)

app.mount('#app')
