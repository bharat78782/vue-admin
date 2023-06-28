import Login from './Component/pages/Login.vue';
import Register from './Component/pages/Register.vue';
import Dashboard from './Component/pages/Dashboard.vue';
import ViewUser from './Component/pages/users/ViewUser.vue';
import addUser from './Component/pages/users/addUser.vue';
import profile from './Component/pages/users/profile.vue';
import EditUser from './Component/pages/users/EditUser.vue';
import ShowUser from './Component/pages/users/ShowUser.vue';
import Product from './Component/pages/products/Product.vue';
import Contact from './Component/pages/contact/Contact.vue';
import AddColor from './Component/pages/colors/AddColor.vue';
import Size from './Component/pages/sizes/Size.vue';


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
  {
    path: '/edit-user/:id',
    name: 'EditUser',
    component: EditUser,
    meta: { requiresAuth: true },
  },

  {
    path: '/show/:id',
    name: 'ShowUser',
    component: ShowUser,
    meta: { requiresAuth: true },
  },

  {
    path: '/products',
    name: 'Product',
    component: Product,
    meta: { requiresAuth: true },
  },
  {
    path: '/contact',
    name: 'contact',
    component: Contact,
    meta: { requiresAuth: true },
  },
  {
    path: '/add-color',
     name: 'AddColor',
     component: AddColor,
    meta: { requiresAuth: true },
   
  },

  {
    path: '/size',
    name: 'Size',
    component: Size,
    meta: { requiresAuth: true },
   
  },


  


];
 console.log(routes)
export default routes;
