import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';
import routes from './routes';
import App from './App.vue';

const router = createRouter({
  history: createWebHistory(),
  routes,
});

router.beforeEach((to, from, next) => {
    if (to.meta.requiresAuth && !isLoggedIn()) {
      next('/');
    } else if (to.meta.requiresGuest && isLoggedIn()) {
      next('/dashboard');
    } else {
      next();
    }
  });


  function isLoggedIn() {
    // Implement your logic to check if the user is logged in
    // For example, you can check if the user has a valid session or token
    return false; // Return true if logged in, false otherwise
  }

const app = createApp(App);
app.use(router);
app.mount('#app');
