<template>
    <div class="wrapper">
      <!-- <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" @click.prevent="toggleSidebar" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <router-link to="/home" class="nav-link">Home</router-link>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <router-link to="/contact" class="nav-link">Contact</router-link>
          </li>
        </ul>
  
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" @click.prevent="toggleSearch" href="#" role="button">
              <i class="fas fa-search"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" @click.prevent="logout" role="button">
              <i class="far fa-circle nav-icon"></i> Logout
            </a>
          </li>
        </ul>
      </nav>
  
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="index3.html" class="brand-link">
          <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>
  
        <div class="sidebar">
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block">Alexander Pierce</a>
            </div>
          </div>
  
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <router-link to="/dashboard" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Dashboard</p>
                    </router-link>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </aside> -->

      <Navbar />
      <Sidebar />
  
      <!-- Content Wrapper -->
      <div class="content-wrapper">
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><router-link to="/">Home</router-link></li>
                  <li class="breadcrumb-item active">Dashboard</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
  
        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-6 col-6">
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3>150</h3>
                    <p>New Orders</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-6 col-6">
                <div class="small-box bg-success">
                  <div class="inner">
                    <h3>53<sup style="font-size: 20px">%</sup></h3>
                    <p>Bounce Rate</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
  
      <!-- Footer -->
    
      <Footers />
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark"></aside>
    </div>
  </template>
  
  <script>
    import Sidebar from './Sidebar.vue';
    import Navbar from './Navbar.vue';
    import Footers from './Footers.vue';
    export default {
        name: 'Dashboard',
        components: {
        Sidebar,
        Navbar,
        Footers,
    
    },
    methods: {
      toggleSidebar() {
        // Logic to toggle the sidebar
      },
      toggleSearch() {
        // Logic to toggle the search
      },
   
    },
  };
  </script>
  
  <style scoped>
  /* Add component-specific styles here */
  </style>
  