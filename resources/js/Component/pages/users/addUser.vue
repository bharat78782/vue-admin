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
                <h3 class="card-title">Add User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm">
                <div class="card-body">

                 <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" v-model="name" id="name" placeholder="Enter Name">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" v-model="email" id="email" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" v-model="password" class="form-control" id="password" placeholder="Password">
                  </div>


                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone Number</label>
                    <input type="number" name="phone_number" class="form-control" v-model="phone_number" id="phone_number" placeholder="Enter Phone Number">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Country</label>
                   <select name="country" id="country" v-model="country" class="form-control">
                        <option disabled selected>Select</option>
                        <option value="Pakistan">Pakistan</option>
                        <option value="India">India</option>
                        <option value="China">China</option>
                    </select>
                  </div>


                  <div class="form-group">
                    <label for="exampleInputEmail1">Profile</label>
                    <input type="file" class="form-control" @change="onFileChange">

                  </div>

                
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
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
    // import { required, email } from 'vuelidate/lib/validators';
    import Sidebar from '../Sidebar.vue';
    import Navbar from '../Navbar.vue';
    import Footers from '../Footers.vue';
    export default {
        data() {
            return {
            profile: null,
            name: '',
            email: '',
            password: '',
            phone_number: '',
            country: '',
            formErrors: {},
            message: '', // Store the success/error message
            success: false,

          
            };
        },
        name: 'ViewUser',
        components: {
        Sidebar,
        Navbar,
        Footers,
    
    },
    methods: {
        onFileChange(event) {
        this.profile = event.target.files[0];
    },

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
  