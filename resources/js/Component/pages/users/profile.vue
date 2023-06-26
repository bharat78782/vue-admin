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
                <h1>Profile</h1>
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
                <div class="col-md-3">

<!-- Profile Image -->
<div class="card card-primary card-outline">
  <div class="card-body box-profile">
    <div class="text-center">
      <img class="profile-user-img img-fluid img-circle"
           src="../../dist/img/user4-128x128.jpg"
           alt="User profile picture">
    </div>

    <h3 class="profile-username text-center">{{ user ? user.name : 'Loading...' }}</h3>

    <p class="text-muted text-center">Software Engineer</p>

    <ul class="list-group list-group-unbordered mb-3">
      <li class="list-group-item">
        <b>Email</b> <a class="float-right">{{ user ? user.email : 'Loading...' }}</a>
      </li>
      <li class="list-group-item">
        <b>Phone</b> <a class="float-right">{{ user ? user.phone_number : 'N/A' }}</a>
      </li>
     
    </ul>

    
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

<!-- About Me Box -->

<!-- /.card -->
</div>
<!-- /.col -->
<div class="col-md-9">
<div class="card">
  <div class="card-header p-2">
    <ul class="nav nav-pills">
    
      <li class="nav-item"><a class="nav-link active" href="#!" data-toggle="tab">Settings</a></li>
    </ul>
  </div><!-- /.card-header -->
  <div class="card-body">
    <div class="tab-content">
    

      <div class="tab-pane active" id="settings">
        <form class="form-horizontal">
          <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="inputName" value="" placeholder="Name">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="inputEmail" placeholder="Email">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputName2" class="col-sm-2 col-form-label">Phone Number</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputName2" placeholder="Name">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputExperience" class="col-sm-2 col-form-label">Country</label>
            <div class="col-sm-10">
              <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
            </div>
          </div>
         
       
          <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
              <button type="submit" class="btn btn-primary">Update</button>
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
    export default {
        name: 'profile',
        components: {
        Sidebar,
        Navbar,
        Footers,
    
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
   
    },
  };
  </script>
  
  <style scoped>
  /* Add component-specific styles here */
  </style>
  