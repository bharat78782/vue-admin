<template>
    <div class="wrapper">
     

      <Navbar />
      <Sidebar />
  
      <!-- Content Wrapper -->
      <div class="content-wrapper">
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Products</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><router-link to="/dashboard">Home</router-link></li>
                  <li class="breadcrumb-item active">Dashboard</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
  
        <!-- Main content -->
        <section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-body row">
    <div class="col-5 text-center d-flex align-items-center justify-content-center">
      <div class="">
        <h2>Admin<strong>LTE</strong></h2>
        <p class="lead mb-5">123 Testing Ave, Testtown, 9876 NA<br>
          Phone: +1 234 56789012
        </p>
      </div>
    </div>
    <div class="col-7">
      <div class="form-group">
        <label for="inputName">Name</label>
        <input type="text" id="inputName" class="form-control" />
      </div>
      <div class="form-group">
        <label for="inputEmail">E-Mail</label>
        <input type="email" id="inputEmail" class="form-control" />
      </div>
      <div class="form-group">
        <label for="inputSubject">Subject</label>
        <input type="text" id="inputSubject" class="form-control" />
      </div>
      <div class="form-group">
        <label for="inputMessage">Message</label>
        <textarea id="inputMessage" class="form-control" rows="4"></textarea>
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Send message">
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
    import Sidebar from '../Sidebar.vue';
    import Navbar from '../Navbar.vue';
    import Footers from '../Footers.vue';
    import axios from 'axios';
    import toastr from 'toastr';
    import 'admin-lte/plugins/toastr/toastr.css';
    export default {
    name: 'profile',
        components: {
        Sidebar,
        Navbar,
        Footers,
    
    },
    data() {
    return {
      country: '',
      phone_number: '',
      profileImage: null,
      profileImageUrl: '',
    };
  },



    methods: {
  
    },
  };
  </script>
  
  <style scoped>
  /* Add component-specific styles here */
  </style>
  