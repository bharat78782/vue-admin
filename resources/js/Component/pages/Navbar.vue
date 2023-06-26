<template>
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" @click.prevent="toggleSidebar" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <router-link to="/dashboard" class="nav-link">Home</router-link>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <router-link to="/contact" class="nav-link">Contact</router-link>
          </li>
        </ul>
  
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" @click.prevent="toggleSearch" href="#" role="button">
              <i class="fas fa-search"></i>
            </a>
          </li>

          <li class="nav-item">
            <router-link class="nav-link" to="profile" role="button">
              <i class="far fa-circle nav-icon"></i> Profile
            </router-link>
          </li>

          <li class="nav-item">
            <a class="nav-link" @click.prevent="logout" role="button">
              <i class="far fa-circle nav-icon"></i> Logout
            </a>
          </li>
        </ul>
      </nav>
  </template>
  
  <script>
  import axios from 'axios';
  export default {
    name: 'Navbar',
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
      logout() {
        localStorage.removeItem('token');
       this.$router.push('/login');
     },
    },
  };
  </script>
  
  <style scoped>
  /* Navbar component styles here */
  </style>