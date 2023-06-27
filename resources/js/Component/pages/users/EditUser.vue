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
                <h1 class="m-0">Edit User</h1>
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
                    <h3 class="card-title">Edit User</h3>
                </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" @submit.prevent="UpdateUser()">
                <div class="card-body">

                 <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" v-model="name" id="name" :class="{ 'is-invalid': formErrors.name }"  placeholder="Enter Name">
                    <div class="invalid-feedback" v-if="formErrors.name">
                    {{ formErrors.name }}
                  </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone Number</label>
                    <input type="number" name="phone_number" class="form-control" v-model="phone_number" id="phone_number"  :class="{ 'is-invalid': formErrors.phone_number }"   placeholder="Enter Phone Number">
                    <div class="invalid-feedback" v-if="formErrors.phone_number">
                      {{ formErrors.phone_number }}
                   </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Country</label>
                   <select name="country" id="country" v-model="country" class="form-control"  :class="{ 'is-invalid': formErrors.country }" >
                        <option disabled selected>Select</option>
                        <option value="Pakistan">Pakistan</option>
                        <option value="India">India</option>
                        <option value="China">China</option>
                    </select>

                    <div class="invalid-feedback" v-if="formErrors.country">
                      {{ formErrors.country }}
                   </div>

                  </div>


                 <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                                <label for="exampleInputEmail1">Profile</label>
                                <input type="file" class="form-control" @change="handleProfilePictureChange">

                        </div>
                    </div>
                    <div class="col-md-6">
                        <img :src="baseUrl + '/documents/profile/' + (profile ? profile : 'default-profile.png')" class="profile-user-img img-fluid img-circle" alt="User profile picture">

                    </div>
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
    import axios from 'axios';
    import toastr from 'toastr';
    import 'admin-lte/plugins/toastr/toastr.css';
    export default {
        data() {
            return {
           
            name: '',
            phone_number: '',
            country: '',
            formErrors: {},
            message: '', // Store the success/error message
            success: false,
            profileImage: null,
            user: null,
            baseUrl: 'http://localhost/vuejs3/vue-admin/public/',

          
            };
        },
        created() {
    // Fetch the user data
            this.fetchUserData();
        },
        name: 'ViewUser',
        components: {
        Sidebar,
        Navbar,
        Footers,
    
    },
      methods: {
         

        handleProfilePictureChange(event) {
        this.profileImage = event.target.files[0];
    
        },

     

      fetchUserData() {
      const userId = this.$route.params.id; // Get the user ID from the route parameter

      const token = localStorage.getItem('token');
      axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
    
      axios.get(`/api/edit-user/${userId}`)
        .then(response => {
            this.user = response.data;
            this.name = this.user.name;
            this.phone_number = this.user.phone_number;
            this.country = this.user.country;
            this.profile = this.user.profile;
            this.id = this.user.id;
          
        })
        .catch(error => {
          console.error(error);
        });
    },

    UpdateUser()
    {
        const updateData = {
            id: this.id,
            name:this.name,
            phone_number:this.phone_number,
            country:this.country,
        };
        const token = localStorage.getItem('token');
        axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
        const formData = new FormData();
        formData.append('profile', this.profileImage);

        axios.post('/api/update-user', formData, {
            params: updateData
          })

        // axios.post('/api/update-user',formData)
        .then(response=>{
            toastr.success(response.data.message);
            this.$router.push('/view-user');
        }).catch(error=>{
            toastr.success(error.data.message);

        });
    },

      showMessage(message, success) {
      this.message = message;
      this.success = success;
      // Clear the message after a certain duration if desired
      setTimeout(() => {
        this.message = '';
        this.success = false;
      }, 5000); // Clear message after 5 seconds
    },
 

   
    },
  };
  </script>
  
  <style scoped>
  /* Add component-specific styles here */
  </style>
  