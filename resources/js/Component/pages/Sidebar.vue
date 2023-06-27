<template>
     <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/dashboard" class="brand-link">
          <img src="" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>
  
        <!-- Sidebar -->
        <div class="sidebar">
          <!-- User Panel -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="" class="img-circle elevation-2" alt="">
            </div>
            <div class="info">
              <a href="#" class="d-block">{{ user ? user.name : 'Loading...' }}</a>
            </div>
          </div>
  
          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-item" :class="{ 'menu-open': isMenuOpen(['/dashboard']) }">

                <a href="#" class="nav-link" :class="{ active: isRouteActive(['/dashboard']) }">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <router-link to="/dashboard" class="nav-link" :class="{ active: isRouteActive(['/dashboard']) }">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Dashboard</p>
                    </router-link>
                  </li>
                </ul>
              </li>

              <li class="nav-item" :class="{ 'menu-open': isMenuOpen(['/view-user','/add-user']) }" >
                <a href="#" class="nav-link" :class="{ active: isRouteActive(['/view-user','/add-user']) }">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    User Management
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <router-link to="/view-user" class="nav-link" :class="{ active: isRouteActive(['/view-user']) }">
                      <i class="far fa-circle nav-icon"></i>
                      <p>User</p>
                    </router-link>
                  </li>

                  <li class="nav-item">
                    <router-link to="/add-user" class="nav-link" :class="{ active: isRouteActive(['/add-user']) }">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add User</p>
                    </router-link>
                  </li>

                </ul>
              </li>

              <li class="nav-item" :class="{ 'menu-open': isMenuOpen(['/products']) }" >
                <a href="#" class="nav-link" :class="{ active: isRouteActive(['/products']) }">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Products Management
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <router-link to="/products" class="nav-link" :class="{ active: isRouteActive(['/products']) }">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Product List</p>
                    </router-link>
                  </li>

                 

                </ul>
              </li>

            </ul>
          </nav>
        </div>
      </aside>
  </template>
  <script>




  export default {
    name: 'Sidebar',
    data() {
    return {
      user: null,
    };
  },
  created() {
    this.fetchUserData();
  },
    methods: {
      fetchUserData() {
      const userData = localStorage.getItem('userData'); // Retrieve user data from local storage
      if (userData) {
        this.user = JSON.parse(userData);
      }
    },

    isRouteActive(routes) {
      if (Array.isArray(routes)) {
        const isActive = routes.some(route => this.$route.path === route);
        console.log('isRouteActive:', routes, isActive);
        return isActive;
      }
      return false;
    },
    isMenuOpen(routes) {
      if (Array.isArray(routes)) {
        const isOpen = routes.some(route => this.$route.path.startsWith(route));
        console.log('isMenuOpen:', routes, isOpen);
        return isOpen;
      }
      return false;
    },
    
    },
  };

  </script>
  
  <style scoped>
  /* Sidebar component styles here */
  </style>
  