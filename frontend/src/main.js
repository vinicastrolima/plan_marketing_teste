import { createApp } from 'vue';
import HomePage from './views/HomePage.vue';
import 'bootstrap/dist/css/bootstrap.css';
// import App from './App.vue';
import router from './router';
// import store from './store';

// createApp(App).use(router).use(store).mount('#app');
createApp(HomePage).use(router).mount('#app');