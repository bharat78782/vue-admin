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
                <h1 class="m-0">View User</h1>
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
                <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">View User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>Trident</td>
                    <td>Internet
                      Explorer 4.0
                    </td>
                    <td>Win 95+</td>
                    <td> 4</td>
                    <td>active</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="#">
                              <i class="fas fa-folder"> </i> View </a>&nbsp;
                        <a class="btn btn-danger btn-sm" href="#">
                              <i class="fas fa-trash"></i>Delete </a>
                          &nbsp;
                        <a class="btn btn-info btn-sm" href="#"><i class="fas fa-pencil-alt"> </i> Edit</a>
                    </td>
                  </tr>

                  <tr>
                    <td>Trident</td>
                    <td>Internet
                      Explorer 4.0
                    </td>
                    <td>Win 95+</td>
                    <td> 4</td>
                    <td>active</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="#">
                              <i class="fas fa-folder"> </i> View </a>&nbsp;
                        <a class="btn btn-danger btn-sm" href="#">
                              <i class="fas fa-trash"></i>Delete </a>
                          &nbsp;
                        <a class="btn btn-info btn-sm" href="#"><i class="fas fa-pencil-alt"> </i> Edit</a>
                    </td>
                  </tr>
               
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
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
    export default {
        name: 'ViewUser',
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
  