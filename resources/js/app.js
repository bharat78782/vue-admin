import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap';
import 'admin-lte/dist/css/adminlte.css';
import 'admin-lte/plugins/toastr/toastr.css';

// Import AdminLTE JavaScript
import 'admin-lte/dist/js/adminlte.js';
import 'admin-lte/plugins/toastr/toastr.min.js';

import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';
import routes from './routes';
import App from './Component/App.vue';

const router = createRouter({
  history: createWebHistory(),
  routes,
});

router.beforeEach((to, from, next) => {
  if (to.meta.requiresAuth && !isLoggedIn()) {
    next('/login');
  } else if (to.meta.requiresGuest && isLoggedIn()) {
    next('/dashboard');
  } else {
    next();
  }
});

function isLoggedIn() {
    const token = localStorage.getItem('token');
    console.log('Token:', token);
    return !!token;
  }

const app = createApp(App);
app.use(router);
app.mount('#app');
