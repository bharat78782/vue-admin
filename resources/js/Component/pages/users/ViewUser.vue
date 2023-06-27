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
                    <th>Country</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr v-for="user in users" :key="user.id">
                      <td>{{ user.name }}</td>
                      <td>{{ user.email }}</td>
                      <td>{{ user.phone_number }}</td>
                      <td>{{ user.country }}</td>
                      <td>
                        <img  :src="baseUrl + 'documents/profile/' + user.profile"  class="profile-user-img img-fluid img-circle" alt="User profile picture">
                      </td>
                      <td>{{ user.status }}</td>
                      <td>
                        <a class="btn btn-primary btn-sm" href="#" @click="showUser(user.id)">
                          <i class="fas fa-folder"></i> View
                        </a>
                        &nbsp;
                        <a class="btn btn-danger btn-sm" href="#"  @click="deleteUser(user.id)">
                          <i class="fas fa-trash"></i> Delete
                        </a>
                        &nbsp;
                        <a class="btn btn-info btn-sm" href="#"  @click="editUser(user.id)">
                          <i class="fas fa-pencil-alt"></i> Edit
                        </a>
                      </td>
                    </tr>


                
               
                  </tbody>
                 
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
    import axios from 'axios';
    import toastr from 'toastr';
    import 'admin-lte/plugins/toastr/toastr.css';
    
    
    export default {
        name: 'ViewUser',
        components: {
        Sidebar,
        Navbar,
        Footers,
    
    },


    data() {
    return {
      users: [] ,
      baseUrl: 'http://localhost/vuejs3/vue-admin/public/'
    };
  },


  mounted() {
    this.viewUser();
  },
    methods: {
      
      viewUser() {
        const token = localStorage.getItem('token');
       axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

       const baseUrl = 'http://localhost/vuejs3/vue-admin/public';
       axios.get(`${baseUrl}/api/user-list`)
        .then(response => {
          this.users = response.data.data;
        })
        .catch(error => {
          // Handle the error here
          console.error(error);
        });
      },

      deleteUser(userId) {
        const confirmed = window.confirm('Are you sure you want to delete this user?');
    
      if (!confirmed) {
        return; // If not confirmed, do nothing
      }

      const token = localStorage.getItem('token');
      axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

      axios.get(`/api/user-delete/${userId}`)
        .then(response => {
          this.viewUser(); 
          toastr.success(response.data.message);
        })
        .catch(error => {
          // Handle deletion error
          toastr.error(error.message);
        });
    },
    editUser(userId) {
     
     this.$router.push({ name: 'EditUser', params: { id: userId } });
   },

   showUser(userId){
    this.$router.push({ name: 'ShowUser', params: { id: userId } });
   }
     
   
    },
   
   
  };
  </script>
  
  <style scoped>
  /* Add component-specific styles here */
  </style>
  