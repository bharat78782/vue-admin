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
          <div class="container-fluid">
            <div class="row">
              
                <div class="col-lg-12">
                    <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Country</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>asas</td>
                      <td>asas</td>
                      <td>asas</td>
                      <td>asas</td>
                      <td>
                        asas
                      </td>
                      <td>asas</td>
                      <td>
                        <a class="btn btn-primary btn-sm" href="#" >
                          <i class="fas fa-folder"></i> View
                        </a>
                        &nbsp;
                        <a class="btn btn-danger btn-sm" href="#" >
                          <i class="fas fa-trash"></i> Delete
                        </a>
                        &nbsp;
                        <a class="btn btn-info btn-sm" href="#" >
                          <i class="fas fa-pencil-alt"></i> Edit
                        </a>
                      </td>
                    </tr>


                
               
                  </tbody>
                 
                </table>
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
  