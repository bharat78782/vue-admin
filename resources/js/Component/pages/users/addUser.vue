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
              <form id="quickForm" @submit.prevent="addUser()">
                <div class="card-body">

                 <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" v-model="name" id="name" :class="{ 'is-invalid': formErrors.name }"  placeholder="Enter Name">
                    <div class="invalid-feedback" v-if="formErrors.name">
                    {{ formErrors.name }}
                  </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" v-model="email" id="email"  :class="{ 'is-invalid': formErrors.email }"  placeholder="Enter email">
                    <div class="invalid-feedback" v-if="formErrors.email">
                    {{ formErrors.email }}
                  </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" v-model="password" class="form-control" :class="{ 'is-invalid': formErrors.password }"  id="password" placeholder="Password">
                    
                    <div class="invalid-feedback" v-if="formErrors.password">
                    {{ formErrors.password }}
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


                  <div class="form-group">
                    <label for="exampleInputEmail1">Profile</label>
                    <input type="file" class="form-control" @change="handleProfilePictureChange">

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
            profile: null,
            name: '',
            email: '',
            password: '',
            phone_number: '',
            country: '',
            formErrors: {},
            message: '', // Store the success/error message
            success: false,
            profileImage: null,

          
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


      handleProfilePictureChange(event) {
      this.profileImage = event.target.files[0];
   
  },

      addUser()
      {
        const addData = {
          name: this.name,
          email: this.email,
          phone_number: this.phone_number,
          country: this.country,
          password: this.password,
        };

       
        const formData = new FormData();
        formData.append('profile', this.profileImage);
       

        axios.post('/api/register', formData, {
            params: addData
          }).then(response=>{
             this.clearFields();
             toastr.success(response.data.message);
             
        }).catch(error=>{
          if (error.response && error.response.data && error.response.data.errors) {
           
            this.formErrors = error.response.data.errors;
          } else if (error.response && error.response.data && error.response.data.message) {
           
            this.showMessage(error.response.data.message, false);
          } else {
            this.showMessage('Registration failed. Please try again.', false);
          }
        })
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
    clearFields() {
        this.name = '';
        this.email = '';
        this.password = '';
        this.phone_number = '';
        this.country = '';
        
      },

   
    },
  };
  </script>
  
  <style scoped>
  /* Add component-specific styles here */
  </style>
  