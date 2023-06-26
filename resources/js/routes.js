import Login from './Component/pages/Login.vue';
import Register from './Component/pages/Register.vue';
import Dashboard from './Component/pages/Dashboard.vue';
import ViewUser from './Component/pages/users/ViewUser.vue';
import addUser from './Component/pages/users/addUser.vue';
import profile from './Component/pages/users/profile.vue';

const routes = [
  {
    path: '/login',
    component: Login,
    meta: { requiresGuest: true },
  },
  {
    path: '/register',
    component: Register,
    meta: { requiresGuest: true },
  },
  {
    path: '/dashboard',
    component: Dashboard,
    meta: { requiresAuth: true },
  },

  {
    path: '/view-user',
    component: ViewUser,
    meta: { requiresAuth: true },
  },

  {
    path: '/add-user',
    component: addUser,
    meta: { requiresAuth: true },
  },

  {
    path: '/profile',
    component: profile,
    meta: { requiresAuth: true },
  },


];

export default routes;
