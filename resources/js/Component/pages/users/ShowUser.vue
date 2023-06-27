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
                <h1>Single User</h1>
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
                
<!-- /.col -->
            <div class="col-md-12">
            <div class="card">
          
            <div class="card-body">
                <div class="tab-content">
                

                <div class="tab-pane active" id="settings">
                    <form class="form-horizontal"  @submit.prevent="updateProfile" novalidate>
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" v-model="name"   placeholder="Name" readonly>
                           
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                        <input type="email" class="form-control" v-model="email"     placeholder="Email" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Phone Number</label>
                        <div class="col-sm-10">
                         <input type="number"  v-model="phone_number"  class="form-control"    readonly >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Country</label>
                        <div class="col-sm-10">
                            <select name="country" id="country" v-model="country" class="form-control" readonly>
                                <option disabled selected>Select</option>
                                <option value="Pakistan">Pakistan</option>
                                <option value="India">India</option>
                                <option value="China">China</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Profile</label>
                        <div class="col-sm-10">
                            <img :src="baseUrl + '/documents/profile/' + (profile ? profile : 'default-profile.png')" class="profile-user-img img-fluid img-circle" alt="User profile picture">

                        </div>
                    </div>

                 </form>
                </div>
                <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
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
      baseUrl: 'http://localhost/vuejs3/vue-admin/public/',
    };
  },




    mounted() {
      this.fetchUserData();
    },

    methods: {
        fetchUserData() {
      const userId = this.$route.params.id; 

      const token = localStorage.getItem('token');
      axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
    
      axios.get(`/api/edit-user/${userId}`)
        .then(response => {
            this.user = response.data;
            this.name = this.user.name;
            this.email = this.user.email;
            this.phone_number = this.user.phone_number;
            this.country = this.user.country;
            this.profile = this.user.profile;
            this.id = this.user.id;
          
        })
        .catch(error => {
          console.error(error);
        });
    },
    handleProfilePictureChange(event) {
      this.profileImage = event.target.files[0];
   
  },
    
   
    },
  };
  </script>
  
  <style scoped>
  /* Add component-specific styles here */
  </style>
  